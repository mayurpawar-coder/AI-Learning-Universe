<?php
require_once "auth_guard.php";
require_role(['admin','teacher']);
require_once "../db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $file  = $_FILES['file'];

  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  if ($ext !== "pdf") die("Only PDF allowed");

  $name = uniqid() . ".pdf";
  $path = "../uploads/docs/" . $name;
  move_uploaded_file($file['tmp_name'], $path);

  $stmt = $pdo->prepare("INSERT INTO documents (title,file_path,file_type,uploaded_by) VALUES (?,?,?,?)");
  $stmt->execute([$title,$path,"pdf",$_SESSION['user_id']]);
  echo "PDF uploaded successfully!";
}
?>
<h2>Upload Document</h2>
<form method="POST" enctype="multipart/form-data">
  Title: <input name="title"><br>
  File: <input type="file" name="file"><br>
  <button type="submit">Upload</button>
</form>