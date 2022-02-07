<?php

session_start();

require_once "./functions/connection.php";
require_once "./functions/function.php";
include "./functions/timeout.php";

$user_data = check_login($con);



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

   <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

   <link rel="stylesheet" href="css/share.css" />
   <link rel="stylesheet" href="css/dashboard.css" />

   <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">
   <title>ViewDeep E-Receipt | Sharing</title>
</head>

<body>

   <input type="checkbox" name="" id="nav-toggle">
   <div class="sidebar">
      <div class="sidebar-brand">
         <h2><span class="lab la-accusoft"></span> <span>E-Receipt</span></h2>
      </div>
      <div class="sidebar-menu">
         <ul>
            <form method="POST">
               <div class="search-wrapper search-mobile">
                  <span class="las la-search"></span>
                  <input type="text" id="search-input" name="search-input" placeholder="Search here...">
               </div>
            </form>
            <li>
               <a href="./dashbord.php"><span class="las la-igloo"></span>
                  <span>Dashboard</span></a>
            </li>
            <li>
               <a href="./form.php"><span class="las la-receipt"></span>
                  <span>New Receipt</span></a>
            </li>
            <li>
               <a href=""><span class="las la-clipboard-list"></span>
                  <span>Invoice</span></a>
            </li>
            <li>
               <a href="./sessions.php"><span class="las la-users"></span>
                  <span>Login Sessions</span></a>
            </li>
            <li>
               <a href="./sharing.php" class="active"><span class="las la-percentage"></span>
                  <span>Sharing</span></a>
            </li>

         </ul>
      </div>
   </div>

   <?php require_once "./header.php" ?>

   <div class="container">
      <form action="" method="post" class="form" id="form" enctype="multipart/form-data">

         <div class="bank-logo">
            <img src="./img/viewdeep-logo.png" width="120px" height="120px">
            <h2>SALES VALUE</h2>
         </div>

         <div class="form-group">
            <input type="text" name="username" class="form-control" id="sales-input" placeholder="ENTER VALUE"
               spellcheck="false" required autocomplete="off" maxlength="50"
               onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57"
               onkeyup="sharePercentage(this.value);">
         </div>

         <div class="form-group">
            <p>Sales Commission Share</p>
            <label>Direct Commission<span>(17%)</span></label>
            <input type="text" name="dircom" readonly class="form-control" id="dircom" placeholder="0" maxlength="50">
         </div>

         <div class="form-group">
            <label>1st Level Commission<span>(2%)</span></label>
            <input type="text" name="level-one" readonly class="form-control" id="level-one" placeholder="0"
               maxlength="50">
         </div>

         <div class="form-group">
            <label>2nd Level Commission<span>(1%)</span></label>
            <input type="text" name="level-two" readonly class="form-control" id="level-two" placeholder="0"
               maxlength="50">
         </div>

         <div class="form-group">
            <p>Loan Repayment Account</p>
            <label>Business Re-Investment<span>(30%)</span></label>
            <input type="text" name="business-invest" readonly class="form-control" id="business-invest" placeholder="0"
               maxlength="50">
         </div>

         <div class="form-group">
            <label>Office Operational Cost<span>(10%)</span></label>
            <input type="text" name="office-cost" readonly class="form-control" id="office-cost" placeholder="0"
               maxlength="50">
         </div>

         <div class="form-group">
            <label>Business Savings<span>(5%)</span></label>
            <input type="text" name="business-savings" readonly class="form-control" id="business-savings"
               placeholder="0" maxlength="50">
         </div>

         <div class="form-group">
            <label>Directors Share<span>(2.5%)</span></label>
            <input type="text" name="director-share" readonly class="form-control" id="director-share" placeholder="0"
               maxlength="50">
         </div>

         <div class="form-group">
            <p>Management Sharing (32.5%)</p>
            <label>Chief Executive Officer<span>(17%)</span></label>
            <input type="text" name="ceo" readonly class="form-control" id="ceo" placeholder="0" maxlength="50">
         </div>

         <div class="form-group">
            <label>General Manager<span>(4.5%)</span></label>
            <input type="text" name="gm" readonly class="form-control" id="gm" placeholder="0" maxlength="50">
         </div>

         <div class="form-group">
            <label>Managing Director<span>(11%)</span></label>
            <input type="text" name="md" readonly class="form-control" id="md" placeholder="0" maxlength="50">
         </div>
      </form>
   </div>
   <script src="./functions/script.js"></script>
</body>

</html>