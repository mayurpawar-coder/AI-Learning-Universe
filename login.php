<?php
session_start();
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email=? AND status='active'");
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['name'] = $user['full_name'];

    if ($user['role'] === 'admin') {
      header("Location: admin/index.php");
    } else {
      echo "Login successful! (Redirect to student/teacher dashboard)";
    }
    exit;
  } else {
    $error = "Invalid email or password!";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h2>Login</h2>
  <?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
  <form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>
//add