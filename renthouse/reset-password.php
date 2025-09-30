<?php
session_start();

// 1. Include your config and database connection
include('config/config.php');  

// 2. Initialize variables
$error   = '';
$success = '';
$showForm = false;

// 3. Get token from URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // 4. Look up token in password_reset_temp
    $stmt = $db->prepare("SELECT email, expDate FROM password_reset_temp WHERE token = ?");
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($email, $expDate);
        $stmt->fetch();

        // 5. Check expiration
        if (new DateTime() <= new DateTime($expDate)) {
            $showForm = true;  // Token is valid and not expired
        } else {
            $error = "This reset link has expired. Please request a new one.";
        }
    } else {
        $error = "Invalid reset token.";
    }
    $stmt->close();
} else {
    $error = "No reset token provided.";
}

// 6. Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'], $_POST['confirm_password'], $_POST['token'])) {
    $password        = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $token           = $_POST['token'];

    if (empty($password) || empty($confirmPassword)) {
        $error = "Please fill out both password fields.";
        $showForm = true;
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
        $showForm = true;
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
        $showForm = true;
    } else {
        // 7. Hash the new password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // 8. Determine user type by checking tables
        $userTable = '';
        foreach (['owner', 'tenant', 'admin'] as $table) {
            $check = $db->prepare("SELECT 1 FROM {$table} WHERE email = ? LIMIT 1");
            $check->bind_param('s', $email);
            $check->execute();
            $check->store_result();
            if ($check->num_rows === 1) {
                $userTable = $table;
                $check->close();
                break;
            }
            $check->close();
        }

        if (!$userTable) {
            $error = "User account not found.";
            $showForm = true;
        } else {
            // 9. Update the correct table
            $update = $db->prepare("UPDATE {$userTable} SET password = ? WHERE email = ?");
            $update->bind_param('ss', $passwordHash, $email);
            $update->execute();

            if ($update->affected_rows === 1) {
                // 10. Delete the token so it can't be reused
                $del = $db->prepare("DELETE FROM password_reset_temp WHERE token = ?");
                $del->bind_param('s', $token);
                $del->execute();
                $del->close();

                $success = "Your password has been reset successfully. Redirecting to login…";
                header("Refresh: 3; url=http://localhost/House-Rental-System-main/House-Rental-System-main/renthouse/how-to-login.php");
                exit;
            } else {
                $error = "Failed to reset password. Please try again.";
                $showForm = true;
            }
            $update->close();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reset Password</title>
  <link rel="stylesheet" href="reset-password-style.css">
</head>
<body>
  <div class="container">
    <h3>Reset Password</h3>
    <hr>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?php echo htmlentities($error); ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="alert alert-success"><?php echo htmlentities($success); ?></div>
    <?php endif; ?>

    <?php if ($showForm): ?>
      <form method="post">
        <input type="hidden" name="token" value="<?php echo htmlentities($token); ?>">

        <div class="form-group">
          <label>New Password</label>
          <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <div class="form-group">
          <label>Confirm New Password</label>
          <input type="password" name="confirm_password" class="form-control" required minlength="6">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
