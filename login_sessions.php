<?php

session_start();

include("./functions/connection.php");
include("./functions/function.php");

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
   <link rel="stylesheet" href="css/dashboard.css" />
   <title>ViewDeep E-Receipt Admin</title>
</head>

<body>

<input type="checkbox" name="" id="nav-toggle">
   <div class="sidebar">
      <div class="sidebar-brand">
         <h2><span class="lab la-accusoft"></span> <span>E-Receipt</span></h2>
      </div>
      <div class="sidebar-menu">
         <ul>
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
               <a href="./login_sessions.php" class="active"><span class="las la-clipboard"></span>
                  <span>Login Sessions</span></a>
            </li>
         </ul>
      </div>
   </div>

   <div class="main-content">
      <?php include("./header.php") ?>

      <main>
         <?php include("./cards.php") ?>

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
                                 <td>ID</td>
                                 <td>User ID</td>
                                 <td>Username</td>
                                 <td>Date & Time</td>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($loginSession as $login) { ?>
                              <tr>
                              <td><?php echo $login['id'] ?></td>
                                 <td><?php echo $login['user_id'] ?></td>
                                 <td><?php echo $login['username'] ?></td>
                                 <td><?php echo $login['date'] ?></td>
                              </tr>
                              <?php } ?>
                           </tbody>
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