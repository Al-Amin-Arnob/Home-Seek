<?php
session_start();
if (! isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

include 'navbar.php';
include 'config/config.php';

// 1) owner_id must be passed via GET or POST
if (isset($_GET['owner_id'])) {
    $owner_id = (int) $_GET['owner_id'];
} elseif (isset($_POST['owner_id'])) {
    $owner_id = (int) $_POST['owner_id'];
} else {
    die('Error: no owner selected.');
}

// 2) look up tenant_id from session
$u_email = mysqli_real_escape_string($db, $_SESSION['email']);
$sql = "SELECT tenant_id, full_name 
        FROM tenant 
        WHERE email = '$u_email'
        LIMIT 1";
$res = mysqli_query($db, $sql);
if (! $res || mysqli_num_rows($res) === 0) {
    die('Error: tenant not found.');
}
$tenant = mysqli_fetch_assoc($res);
$tenant_id = $tenant['tenant_id'];

// 3) handle message send a POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $msg = mysqli_real_escape_string($db, trim($_POST['message']));
    if ($msg !== '') {
        $ins = "INSERT INTO chat (sender_id, receiver_id, message) 
                VALUES ($tenant_id, $owner_id, '$msg')";
        mysqli_query($db, $ins);
    }
    // refresh to avoid form resubmission
    header("Location: chatpage.php?owner_id=$owner_id");
    exit;
}

// 4) fetch chat history
$sql1 = "SELECT c.*, 
                t.full_name AS sender_name 
           FROM chat AS c
           JOIN tenant AS t 
             ON c.sender_id = t.tenant_id
          WHERE c.sender_id   = $tenant_id
            AND c.receiver_id = $owner_id
          ORDER BY c.sent_at ASC";
$query1 = mysqli_query($db, $sql1);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Chat with Owner</title>
  <style>
    .container { margin: 3% auto; width: 60%; padding: 0 10%; }
    .display-chat {
      height: 300px; background: #f0f0f0; overflow-y: auto;
      padding: 15px; margin-bottom: 20px;
    }
    .message {
      background: #673ab7cc; color: white;
      padding: 8px; border-radius: 5px; margin-bottom: 10px;
    }
    .message small { display: block; color: #eee; font-size: 0.8em; }
  </style>
</head>
<body>
  <div class="container">
    <h3>Chat with Owner #<?php echo $owner_id; ?></h3>
    <div class="display-chat">
      <?php if (mysqli_num_rows($query1) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($query1)): ?>
          <div class="message">
            <strong><?php echo htmlspecialchars($row['sender_name']); ?></strong><br>
            <?php echo nl2br(htmlspecialchars($row['message'])); ?>
            <small><?php echo $row['sent_at']; ?></small>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="message">
          <em>No previous chat available.</em>
        </div>
      <?php endif; ?>
    </div>

    <form method="POST" action="">
      <textarea name="message" class="form-control"
                placeholder="Type your message here..." required></textarea>
      <input type="hidden" name="owner_id" value="<?php echo $owner_id; ?>">
      <br>
      <button type="submit" class="btn btn-primary">Send</button>
      <button type="button" class="btn btn-success" onclick="history.back()">Go Back</button>
    </form>
  </div>
</body>
</html>
