<?php

// $host = "localhost:3306";
// $user = "viewdee1_viewdeep";
// $pass = "viewdeep12345";
// $db = "viewdee1_receipt_db";
$host = "localhost:3306";
$user = "root";
$pass = "";
$db = "receipt_db";
$tbname = "users";
$logintb = "login_sessions";
$e_receipt = "e_receipt";
$id = "";


if (!$con = mysqli_connect($host, $user, $pass)) {
   die("Failed to Connect to Database!");
}

// CREATE DATABASE AND TABLE QUERIES
$createdb = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($con, $createdb)) {

   $con = mysqli_connect($host, $user, $pass, $db);

   // CREATE TABLE USERS
   $createtb = "CREATE TABLE IF NOT EXISTS $tbname ( 
      `id` INT NOT NULL AUTO_INCREMENT , 
      `user_id` INT NOT NULL , 
      `username` VARCHAR(225) NOT NULL , 
      `email` VARCHAR(225) NOT NULL , 
      `password` VARCHAR(225) NOT NULL , 
      `date` TIMESTAMP NOT NULL , 
      PRIMARY KEY (`id`)) ENGINE = InnoDB";

   if (!mysqli_query($con, $createtb)) {
      echo "Error creating table USERS: " . mysqli_error($con);
   }

   // // CREATE TABLE LOGIN_SESSIONS
   $createtb = "CREATE TABLE IF NOT EXISTS `login_sessions` ( 
      `id` INT NOT NULL AUTO_INCREMENT , 
      `user_id` INT NOT NULL , 
      `username` VARCHAR(225) NOT NULL , 
      `date` TIMESTAMP NOT NULL , 
      PRIMARY KEY (`id`)) ENGINE = InnoDB";

   mysqli_query($con, $createtb);

   // CREATE TABLE E_RECEIPT
   $createtb = "CREATE TABLE IF NOT EXISTS `e_receipt` (
       `receipt_id` INT NOT NULL AUTO_INCREMENT , 
       `serial_no` INT NOT NULL , 
       `date` DATE NOT NULL , 
       `estate` VARCHAR(50) NOT NULL , 
       `received_from` VARCHAR(225) NOT NULL , 
       `sum_of` VARCHAR(225) NOT NULL , 
       `payment_mode` VARCHAR(50) NOT NULL , 
       `payment_for` VARCHAR(225) NOT NULL , 
       `payment_figure` FLOAT NOT NULL , 
       `no_unit` VARCHAR(50) NOT NULL , 
       `amount_paid` FLOAT NOT NULL , 
       `outstanding` FLOAT NOT NULL , 
       `balance` FLOAT NOT NULL , 
       PRIMARY KEY (`receipt_id`)) ENGINE = InnoDB";

   if (!mysqli_query($con, $createtb)) {
      echo "Error creating table E_RECEIPT: " . mysqli_error($con);
   }
}

// ALTER TABLE login_sessions TO ADD A FOREIGN KEY CONSTRAINT
$alter = "ALTER TABLE $logintb 
ADD FOREIGN KEY (id) REFERENCES users(id)";
mysqli_query($con, $alter);

if (isset($_POST['login_btn'])) {
   // INSERT INTO TABLE
   $user_id = "";
   $username = $_POST['username'];

   $query = "SELECT user_id FROM users WHERE username = '$username' LIMIT 1";
   $result = mysqli_query($con, $query);

   if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $user_id = $row['user_id'];
      }
   }

   $insert = "INSERT INTO login_sessions (username, user_id) VALUES ('$username', '$user_id')";
   mysqli_query($con, $insert);

   // GET CURRENT DATE AND TIME
   $date = date('Y-m-d H:i:s');
   $update = "UPDATE $logintb SET date = '$date' WHERE username = '$username'";
   mysqli_query($con, $update);
}

// INSERT INTO E_RECEIPT
if (isset($_POST['submit_form'])) {

   $date = $_POST['date'];
   $estate = $_POST['estate'];
   $received_from = $_POST['received_from'];
   $sum_of = $_POST['sum_of'];
   $payment_mode = $_POST['payment_mode'];
   $payment_for = $_POST['payment_for'];
   $payment_figure = $_POST['payment_figure'];
   $no_unit = $_POST['no_unit'];
   $amount_paid = $_POST['amount_paid'];
   $total_outstanding = $_POST['total_outstanding'];
   $balance = $_POST['balance'];

   $serial_no = random_num(10);
   $query = "INSERT INTO e_receipt (serial_no, date, estate, received_from, sum_of, payment_mode, payment_for, payment_figure, no_unit, amount_paid, outstanding, balance) VALUES ('$serial_no', '$date', '$estate', '$received_from', '$sum_of', '$payment_mode', '$payment_for', '$payment_figure', '$no_unit', '$amount_paid', '$total_outstanding', '$balance')";

   if (!mysqli_query($con, $query)) {
      echo "<script>alert('Error inserting table E_RECEIPT:')</script> " . mysqli_error($con);
   } else {
      header("Location: ./dashbord.php");
   }
}

// JOIN USERS TABLE COLUMN(USER_ID) TO LOGIN_SESSIONS TABLE
// $query = "SELECT username FROM login_sessions"

$query = "SELECT * FROM e_receipt";
$result = mysqli_query($con, $query);

if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];

   $query = "SELECT * FROM e_receipt WHERE receipt_id = '$id' LIMIT 1";
   $result = mysqli_query($con, $query);
}

// UPDATE RECORDS FROM e_receipt TABLE
if (isset($_POST['submit_update'])) {
   $date = $_POST['date'];
   $estate = $_POST['estate'];
   $received_from = $_POST['received_from'];
   $sum_of = $_POST['sum_of'];
   $payment_mode = $_POST['payment_mode'];
   $payment_for = $_POST['payment_for'];
   $payment_figure = $_POST['payment_figure'];
   $no_unit = $_POST['no_unit'];
   $amount_paid = $_POST['amount_paid'];
   $outstanding = $_POST['outstanding'];
   $balance = $_POST['balance'];

   $query = "UPDATE e_receipt SET estate = '$estate', received_from = '$received_from', sum_of = '$sum_of', payment_mode = '$payment_mode', payment_for = '$payment_for', payment_figure = '$payment_figure', no_unit = '$no_unit', amount_paid = '$amount_paid', outstanding = '$outstanding', balance = '$balance' WHERE receipt_id = '$id' LIMIT 1";

   if (mysqli_query($con, $query)) {
      echo "<script>alert('Record updated successfully!')</script>";
      header("Location: ./dashbord.php");
   }
}

// DELETE RECORDS
if (isset($_REQUEST['delete_btn'])) {
   $id = $_REQUEST['id'];

   $query = "DELETE FROM e_receipt WHERE receipt_id = '$id' LIMIT 1";
   if (mysqli_query($con, $query)) {
      echo "<script>alert('Record Deleted successfully!')</script>";
      header("Location: ./dashbord.php");
   }
}

// SEARCH FUNCTION
$searchErr = "";
if (isset($_POST['search-input'])) {
   $term = $_POST['search-input'];
   $term = preg_replace("#[^0-9a-z]#i", "", $term);

   if (!empty($term)) {
      $query = "SELECT * FROM e_receipt WHERE serial_no LIKE '%$term%' OR received_from LIKE '%$term%' OR amount_paid LIKE '%$term%'";
      $result = mysqli_query($con, $query);
   } else {
      echo "<script>alert('Type a receipt serial number to search!')</script>";
   }
   $searchErr = 'Your search result!';
}

// RANDOM NUMBER FUNCTION
function random_num($length)
{
   $text = "";
   if ($length < 5) {
      $length = 5;
   }
   $len = rand(4, $length);

   for ($i = 0; $i < $len; $i++) {
      $text .= rand(0, 9);
   }
   return $text;
}
