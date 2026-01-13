<?php
require_once "auth_guard.php";
require_role(['admin']);
require_once "../db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $pass = password_hash("12345678", PASSWORD_BCRYPT); // default password

  $stmt = $pdo->prepare("INSERT INTO users (full_name,email,password_hash,role) VALUES (?,?,?,?)");
  $stmt->execute([$name,$email,$pass,$role]);
  echo "User created successfully!";
}
?>
<form method="POST">
  Name: <input name="full_name"><br>
  Email: <input name="email"><br>
  Role: <select name="role">
    <option value="student">Student</option>
    <option value="teacher">Teacher</option>
    <option value="admin">Admin</option>
  </select><br>
  <button type="submit">Create</button>
</form>