<?php
require_once "auth_guard.php";
require_role(['admin']);
require_once "../db.php";

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>
<h2>Users</h2>
<a href="user_create.php">Add New User</a>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>
<?php foreach($users as $u): ?>
<tr>
  <td><?= $u['user_id'] ?></td>
  <td><?= $u['full_name'] ?></td>
  <td><?= $u['email'] ?></td>
  <td><?= $u['role'] ?></td>
</tr>
<?php endforeach; ?>
</table>