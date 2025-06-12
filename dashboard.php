<?php
  session_start();
  if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
      header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
   <link rel="stylesheet" href="style/dashboard.css" />
   <head>
        <div class="w-full fixed z-50">
            <ul
                class="flex items-center justify-between p-4 mx-auto bg-white/10 backdrop-blur-lg border border-white/20 shadow-lg text-black">
                <li class="text-4xl ml-20" id="Judul">BFG</li>
                <div class="flex items-center" id="bottom-nav">
                    <li class="hover:underline cursor-pointer" id="text-klik">Home</li>
                    <a href="menu.php"><li class="hover:underline cursor-pointer" id="text-klik">Menu</li></a>
                    <li class="hover:underline cursor-pointer" id="text-klik">About Us</li>
                    <li class="hover:underline cursor-pointer" id="text-klik">Contact</li>
                    <div>
                        <li id="account"><?=  $_SESSION["username"] ?></li>
                    </div>
                </div>
                <div class="flex gap-10">
                  <a href=""><li class="hover:underline cursor-pointer"><Img class="w-10" src="assets/icons8-gear-64 (1).png" id="gear-klik"></li></a>
                  <form action="dashboard.php" method="POST">
                    <li class="hover:underline cursor-pointer"><button type="image" name="logout"><Img class="w-10" src="assets/icons8-logout-100.png" id="door-klik"></button></li>
                  </form>
                </div>
            </ul>
        </div>
    </head>
</head>
<body>
  <?php include "layout/dashboard.html"?>
</body>
</html>