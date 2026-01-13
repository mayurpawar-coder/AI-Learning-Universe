<?php
session_start();
function require_role($roles = []) {
  if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $roles)) {
    header("Location: ../login.php");
    exit;
  }
}
?>