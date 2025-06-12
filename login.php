<?php
    include "service/database.php";
    session_start();

    if(isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $sql =  "SELECT* FROM user WHERE username='$username' AND password='$password'";
      $result = $db->query($sql);
      
      if($result->num_rows > 0 ){
        $data = $result->fetch_assoc();
        $_SESSION["username"] =  $data["username"];
        $_SESSION["Login"] = true;
        echo "<script>alert('Cuss Pilih Dahareun')</script>";
        header("location: dashboard.php");

        if($data["role"] === 'admin'){
          header("location: service/user.php");
          echo "<script>alert('Selamat Datang Admin')</script>";
        }else{
          echo "<script>alert('Username & Password salah')</script>";
        }
      }else{
        echo "<script>alert('Username & Password salah')</script>";
      }
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Log In</title>
  <link rel="stylesheet" href="style/style.css" />
</head>
<body>
 <?php include "layout/login.html"?>
</body>
</html>

