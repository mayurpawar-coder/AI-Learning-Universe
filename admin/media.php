<?php
require_once "auth_guard.php";
require_role(['admin','teacher']);
require_once "../db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $type  = $_POST['type'];
  $file  = $_FILES['file'];

  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $name = uniqid() . "." . $ext;
  $path = "../uploads/" . ($type=="image"?"images/":"videos/") . $name;
  move_uploaded_file($file['tmp_name'], $path);

  $stmt = $pdo->prepare("INSERT INTO media (title,type,file_path,uploaded_by) VALUES (?,?,?,?)");
  $stmt->execute([$title,$type,$path,$_SESSION['user_id']]);
  echo "Uploaded successfully!";
}
?>
<h2>Upload Media</h2>
<form method="POST" enctype="multipart/form-data">
  Title: <input name="title"><br>
  Type: <select name="type">
    <option value="image">Image</option>
    <option value="video">Video</option>
  </select><br>
  File: <input type="file" name="file"><br>
  <button type="submit">Upload</button>
</form>