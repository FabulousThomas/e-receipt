<?php

session_start();

require_once "./functions/connection.php";
require_once "./functions/function.php";

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
            <form method="POST">
               <div class="search-wrapper search-mobile">
                  <span class="las la-search"></span>
                  <input type="text" id="search-input" name="search-input" placeholder="Search here...">
               </div>
            </form>
            <li>
               <a href="" class="active"><span class="las la-igloo"></span>
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
               <a href="./login_sessions.php"><span class="las la-clipboard"></span>
                  <span>Login Sessions</span></a>
            </li>
         </ul>
      </div>
   </div>

   <div class="main-content">
      <?php require_once "./header.php" ?>

      <main>
         <?php require_once "./cards.php" ?>

         <div class="recent-grid">
            <div class="projects">
               <div class="card">
                  <div class="card-header">
                     <h3>Invoice</h3>

                     <form action="./invoice.php">
                        <button>See all <span class="las la-arrow-right"> </span></button>
                     </form>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table width="100%">
                           <thead>
                              <tr>
                                 <td>Serial No.</td>
                                 <td>Dates</td>
                                 <td>Customers</td>
                                 <td>Amounts</td>
                                 <!-- <td>Print</td> -->
                                 <td>Edit</td>
                                 <td>Delete</td>
                                 <!-- <td>Share</td> -->
                                 <td>View</td>
                              </tr>
                           </thead>
                           <tbody>

                              <?php foreach ($result as $res) { ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                 <input type="text" hidden id="id" value="<?php echo $res['receipt_id']; ?>">
                              </form>

                              <tr>
                                 <td class="name"><?php echo $res['serial_no'] ?></td>
                                 <td class="name"><?php echo $res['date'] ?></td>
                                 <td class="name"><?php echo $res['received_from'] ?></td>
                                 <td class="name">NGN <?php echo $res['amount_paid'] ?></td>
                                 <td><a href="./update.php?id=<?php echo $res['receipt_id'] ?>"><span
                                          class="las la-edit" id="las"></span></a></td>
                                 <td>
                                    <form method="POST" enctype="multipart/form-data">
                                       <input type="text" hidden name="id" value="<?php echo $res['receipt_id']; ?>">
                                       <button name="delete_btn" style="border: none; background: transparent;"><span
                                             class="las la-trash" id="las"></span></button>
                                    </form>
                                 </td>
                                 <td><a href="./preview.php?id=<?php echo $res['receipt_id'] ?>" target="blank"><span
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
                  <!-- Card-body END -->
               </div>
            </div>

         </div>
      </main>
   </div>

   <script src="./functions/script.js"></script>
</body>

</html>