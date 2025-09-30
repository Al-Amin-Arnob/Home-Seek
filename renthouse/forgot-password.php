<?php
session_start();
include("config/config.php"); // your database connection script
include("owner-engine.php");  // if this contains helper functions

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        // 1. Determine which user table (owner, tenant, admin) the email exists in
        $userTable = '';
        foreach (['owner', 'tenant', 'admin'] as $table) {
            $check = $db->prepare("SELECT 1 FROM {$table} WHERE email = ? LIMIT 1");
            $check->bind_param("s", $email);
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
            $error = "No account found with that email.";
        } else {
            // 2. Generate token and expiry
            $token  = bin2hex(random_bytes(50));
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

            // 3. Store in password_reset_temp
            $stmt = $db->prepare(
                "INSERT INTO password_reset_temp (email, token, expDate) 
                 VALUES (?, ?, ?) 
                 ON DUPLICATE KEY UPDATE token = VALUES(token), expDate = VALUES(expDate)"
            );
            $stmt->bind_param("sss", $email, $token, $expiry);
            $stmt->execute();
            $stmt->close();

            // 4. Send reset email
            $resetLink = "http://localhost/House-Rental-System-main/House-Rental-System-main/renthouse/reset-password.php?token=$token";
            $subject   = "Password Reset Request";
            $message   = "
                <p>We received a password reset request for your {$userTable} account.</p>
                <p>Click this link to reset your password:</p>
                <p><a href='{$resetLink}'>{$resetLink}</a></p>
                <p>This link will expire in 1 hour.</p>
            ";
            $headers   = "MIME-Version: 1.0\r\n"
                       . "Content-type: text/html; charset=UTF-8\r\n"
                       . "From: no-reply@yourdomain.com\r\n";

            mail($email, $subject, $message, $headers);
            $success = "If that email address exists in our system, you’ll receive a reset link shortly.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot-password-style.css">
</head>
<body>
  <div class="forgot-container">
    <h3>Forgot Password</h3>

    <?php if(!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlentities($error) ?></div>
    <?php endif; ?>
    <?php if(!empty($success)): ?>
      <div class="alert alert-success"><?= htmlentities($success) ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input 
          type="email" 
          name="email" 
          id="email" 
          class="form-control" 
          required
        />
      </div>

      <button type="submit" class="btn">Send Reset Link</button>
    </form>
  </div>
</body>
</html>
