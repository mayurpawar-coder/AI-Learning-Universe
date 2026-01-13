<?php
require_once "auth_guard.php";
require_role(['admin']);

?><!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <!-- ✅ Copy-paste this link -->
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <aside class="sidebar">
    <h2>Admin Panel</h2>
    <a href="index.php">Dashboard</a>
    <a href="users.php">Manage Users</a>
    <a href="media.php">Manage Media</a>
    <a href="documents.php">Manage Documents</a>
    <a href="../logout.php">Logout</a>
  </aside>

  <main class="content">
    <h1>Dashboard</h1>
    <div class="cards">
      <div class="card">Total Users</div>
      <div class="card">Documents</div>
      <div class="card">Media</div>
    </div>
    <p>Welcome to your admin dashboard!</p>
  </main>
</body>
</html>