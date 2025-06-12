<?php
include "service/database.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO user (username, password, alamat, role) VALUES ('$username', '$password', '$alamat', 'user')";

    if ($db->query($sql)) {
        echo "<script>alert('Registrasi berhasil silahkan Login')</script>";
        header('location: login.php');
    } else {
        echo "<script>alert('ERROR')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In</title>
  <link rel="stylesheet" href="style/register.css" />
</head>
<body>
 <?php include "layout/register.html"?>
</body>
</html>

