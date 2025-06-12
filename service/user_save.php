<?php
include "database.php";

if (isset($_POST['save'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];

  $sql = "INSERT INTO user (username, password, alamat, role) VALUES ('$username', '$password', '$alamat', 'user')";
  $db->query($sql);
  header("Location: user.php");
  exit;
}

if (isset($_POST['update'])) {
  $id_users = $_POST['id_users'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];

  $sql = "UPDATE user SET username='$username', password='$password', alamat='$alamat' WHERE id_users=$id_users";
  $db->query($sql);
  header("Location: user.php");
  exit;
}
?>
