<?php
include "database.php";

if (isset($_GET['id'])) {
  $id_users = $_GET['id'];
  $db->query("DELETE FROM user WHERE id_users=$id_users");
}

header("Location: user.php");
exit;
?>
