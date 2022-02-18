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

   <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
   <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">
   <link rel="stylesheet" href="css/dashboard.css" />
   <link rel="stylesheet" href="css/share.css" />
   <title>ViewDeep E-Receipt | Dashboard</title>
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
                  <input type="text" id="search-sharing" name="search-sharing" placeholder="Search here...">
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
               <a href="./sessions.php"><span class="las la-users"></span>
                  <span>Login Sessions</span></a>
            </li>
            <li>
               <a href="" class="active"><span class="las la-percentage"></span>
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
            </label> <span class="name">Sharing</span>
         </h2>

         <div class="user-wrapper">
            <span class="las la-user"></span>
            <div>
               <h4><?php echo $user_data['username'] ?></h4>
               <!-- <small>Admin</small> -->
            </div>
            <a href="./functions/logout.php"><span class="las la-power-off" style="color: red; border-color: red; margin-left: .5rem;"></span></a>
         </div>
      </header>



      <main>

         <div class="container">
            <form action="" method="post" class="form" id="form" enctype="multipart/form-data">

               <div class="bank-logo">
                  <img src="./img/viewdeep-logo.png" width="120px" height="120px">
                  <h2>SALES VALUE</h2>
               </div>

               <div class="form-group">
                  <input type="currency" name="amount" class="form-control" id="sales-input" placeholder="ENTER VALUE" spellcheck="false" required autocomplete="off"  onkeyup="sharePercentage(this.value);" onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57">
               </div>

               <div class="form-group">
                  <p>Sales Commission Share</p>
                  <label>Direct Commission<span>(17%)</span></label>
                  <input type="currency" name="dircom" readonly class="form-control" id="dircom" placeholder="0">
               </div>

               <div class="form-group">
                  <label>1st Level Commission<span>(2%)</span></label>
                  <input type="currency" name="level-one" readonly class="form-control" id="level-one" placeholder="0">
               </div>

               <div class="form-group">
                  <label>2nd Level Commission<span>(1%)</span></label>
                  <input type="currency" name="level-two" readonly class="form-control" id="level-two" placeholder="0">
               </div>

               <div class="form-group">
                  <p>Loan Repayment Account</p>
                  <label>Business Re-Investment<span>(30%)</span></label>
                  <input type="currency" name="business-invest" readonly class="form-control" id="business-invest" placeholder="0">
               </div>

               <div class="form-group">
                  <label>Office Operational Cost<span>(10%)</span></label>
                  <input type="currency" name="office-cost" readonly class="form-control" id="office-cost" placeholder="0">
               </div>

               <div class="form-group">
                  <label>Business Savings<span>(5%)</span></label>
                  <input type="currency" name="business-savings" readonly class="form-control" id="business-savings" placeholder="0">
               </div>

               <div class="form-group">
                  <label>Directors Share<span>(2.5%)</span></label>
                  <input type="currency" name="director-share" readonly class="form-control" id="director-share" placeholder="0">
               </div>

               <div class="form-group">
                  <p>Management Sharing (32.5%)</p>
                  <label>Chief Executive Officer<span>(17%)</span></label>
                  <input type="currency" name="ceo" readonly class="form-control" id="ceo" placeholder="0">
               </div>

               <div class="form-group">
                  <label>General Manager<span>(4.5%)</span></label>
                  <input type="currency" name="gm" readonly class="form-control" id="gm" placeholder="0">
               </div>

               <div class="form-group">
                  <label>Managing Director<span>(11%)</span></label>
                  <input type="currency" name="md" readonly class="form-control" id="md" placeholder="0">
               </div>

               <div class="form-group">
                  <button type="submit" name="share-btn">Save Data</button>
               </div>
            </form>
         </div>

         <div class="recent-grid">
            <div class="projects">
               <div class="card">
                  <div class="card-header">
                     <h3>Shares</h3>

                     <form method="POST">
                        <div class="search-wrapper search-desktop">
                           <span class="las la-search"></span>
                           <input type="text" id="search-sharing" name="search-sharing" placeholder="Id, amount & date-time...">
                        </div>
                     </form>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table width="100%">
                           <thead>
                              <tr>
                                 <td>Id</td>
                                 <td>Date</td>
                                 <td>Amount</td>
                                 <td>Dir Comm</td>
                                 <td>1st Level</td>
                                 <td>2nd Level</td>
                                 <td>Bus Re-In</td>
                                 <td>Office Opera</td>
                                 <td>Bus Sav</td>
                                 <td>Dir Share</td>
                                 <td>CEO</td>
                                 <td>General Man</td>
                                 <td>Managing Dir</td>
                              </tr>
                           </thead>
                           <tbody>

                              <?php foreach ($share as $res) { ?>
                                 <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="text" hidden id="id" value="<?php echo $res['share_id']; ?>">
                                 </form>

                                 <tr>
                                    <td><?php echo $res['share_id'] ?></td>
                                    <td><?php echo $res['date'] ?></td>
                                    <td><?php echo $res['amount'] ?></td>
                                    <td><?php echo $res['direct_com'] ?></td>
                                    <td><?php echo $res['level_one'] ?></td>
                                    <td><?php echo $res['level_two'] ?></td>
                                    <td><?php echo $res['business_invest']; ?></td>
                                    <td><?php echo $res['office_cost']; ?></td>
                                    <td><?php echo $res['business_savings']; ?></td>
                                    <td><?php echo $res['director_share']; ?></td>
                                    <td><?php echo $res['ceo']; ?></td>
                                    <td><?php echo $res['general_man']; ?></td>
                                    <td><?php echo $res['managing_direct']; ?></td>
                                 </tr>
                              <?php } ?>
                           </tbody>

                        </table>
                     </div>
                  </div>
                  <!-- Card-body END -->
               </div>
            </div>

         </div>
      </main>
   </div>


   <!-- JS -->
   
   <script src="./functions/script.js"></script>
   <script src="./functions/currency.js"></script>
</body>

</html>