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
   <link rel="stylesheet" href="css/dashboard.css" />
   <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">
   <title>ViewDeep E-Receipt | Invoice</title>
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
               <a href="" class="active"><span class="las la-clipboard-list"></span>
                  <span>Invoice</span></a>
            </li>
            <li>
               <a href="./profile.php"><span class="las la-user"></span>
                  <span>Customer Profile</span></a>
            </li>
            <li>
               <a href="./sessions.php"><span class="las la-users"></span>
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
      <?php require_once "./header.php" ?>

      <main>


         <div class="recent-grid">
            <div class="projects">
               <div class="card">
                  <div class="card-header">
                     <h3>Invoice</h3>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table width="100%">
                           <thead>
                              <tr>
                                 <td>Serial No.</td>
                                 <td>User Id</td>
                                 <td>Dates</td>
                                 <td>Customers</td>
                                 <td>Amounts</td>
                                 <!-- <td>Users</td> -->
                                 <td>Edit</td>
                                 <td>Delete</td>
                                 <td>View</td>
                              </tr>
                           </thead>
                           <tbody>

                              <?php foreach ($result as $res) { ?>
                              <form method="POST" enctype="multipart/form-data">
                                 <input type="text" hidden id="id" value="<?php echo $res['id']; ?>">
                              </form>

                              <tr class="name">
                                 <td><?php echo $res['serial_no'] ?></td>
                                 <td class="name"><?php echo $res['user_id'] ?></td>
                                 <td><?php echo $res['date'] ?></td>
                                 <td><?php echo $res['received_from'] ?></td>
                                 <td>NGN <?php echo $res['amount_paid'] ?></td>
                                 <!-- <td class="name"><?php echo $res['username'] ?></td> -->
                                 <td><a href="./update.php?id=<?php echo $res['id'] ?>"><span
                                          class="las la-edit" id="las"></span></a></td>
                                 <td>
                                    <form method="POST" enctype="multipart/form-data">
                                       <input type="text" hidden name="id" value="<?php echo $res['id']; ?>">
                                       <button name="delete_btn" style="border: none; background: transparent;"><span
                                             class="las la-trash" id="las"></span></button>
                                    </form>
                                 </td>
                                 <td><a href="./preview.php?id=<?php echo $res['id'] ?>" target="_blank"><span
                                          class="las la-clipboard-list" id="las"></span></a></td>
                              </tr>
                              <?php } ?>
                           </tbody>

                           <?php if ($searchErr) { ?>
                           <td class="name"><?php echo $searchErr ?></td>
                           <?php } ?>

                        </table>
                     </div>
                  </div>
                  <!-- card-body END -->
               </div>
            </div>

         </div>
      </main>
   </div>
   <script src="./functions/script.js"></script>
</body>

</html>