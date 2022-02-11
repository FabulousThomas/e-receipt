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
      <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">
   <link rel="stylesheet" href="css/dashboard.css" />
   <title>ViewDeep E-Receipt | Login Sessions</title>
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
                  <input type="text" id="search-sessions" name="search-sessions" placeholder="Search here...">
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
               <a href="./invoice.php"><span class="las la-clipboard-list"></span>
                  <span>Invoice</span></a>
            </li>
            <li>
               <a href="./profile.php"><span class="las la-user"></span>
                  <span>Customer Profile</span></a>
            </li>
            <li>
               <a href="" class="active"><span class="las la-users"></span>
                  <span>Login Sessions</span></a>
            </li>
            <li>
               <a href="./sharing.php"><span class="las la-percentage"></span>
                  <span>Sharing</span></a>
            </li>
         </ul>
      </div>
   </div>

   <div class="main-content">
   <header>
         <h2>
            <label for="nav-toggle">
               <span class="las la-bars"></span>
            </label> <span class="name">ViewDeep</span>
         </h2>
         <form method="POST" enctype="multipart/form-data">
         <div class="search-wrapper search-desktop">
            <span class="las la-search"></span>
            <input type="text" id="search-sessions" name="search-sessions" placeholder="user id, username, date..">
         </div>
         </form>
         <div class="user-wrapper">
            <span class="las la-user"></span>
            <div>
               <h4><?php echo $user_data['username'] ?></h4>
               <!-- <small>Admin</small> -->
            </div>
            <a href="./functions/logout.php"><span class="las la-power-off"
                  style="color: red; border-color: red; margin-left: .5rem;"></span></a>
         </div>
      </header>

      <main>
         <!-- <?php include("./cards.php") ?> -->

         <div class="recent-grid">
            <div class="projects">
               <div class="card">
                  <div class="card-header">
                     <h3>Login Sessions</h3>
                     
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table width="100%">
                           <thead>
                              <tr>
                                 <td>User ID</td>
                                 <td>Username</td>
                                 <td>Date & Time</td>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($session as $ses) { ?>
                              <tr>
                                 <td><?php echo $ses['user_id'] ?></td>
                                 <td><?php echo $ses['username'] ?></td>
                                 <td><?php echo $ses['date'] ?></td>
                              </tr>
                              <?php } ?>
                           </tbody>

                           <?php if ($searchErr) { ?>
                           <td class="name"><?php echo $searchErr ?></td>
                           <?php } ?>
                        </table>
                     </div>

                  </div>
               </div>
            </div>
         </div>

      </main>
   </div>
</body>

</html>