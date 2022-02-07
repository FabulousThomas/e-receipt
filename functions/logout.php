<?php

session_start();
session_destroy();

if (isset($_SESSION['id'])) {
   unset($_SESSION['id']);
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
}

header("Location: ../index.php");
die;