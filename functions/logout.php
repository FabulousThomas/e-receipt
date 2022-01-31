<?php

session_start();

if (isset($_SESSION['id'])) {
   unset($_SESSION['id']);
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
}

header("Location: ../index.php");
die;