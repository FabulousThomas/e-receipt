<?php
   $query = "SELECT SUM(amount_paid) AS total FROM e_receipt";
   $total = mysqli_query($con, $query);

   $query = "SELECT SUM(outstanding) AS total_out FROM e_receipt";
   $outstanding = mysqli_query($con, $query);

   $query = "SELECT count(receipt_id) AS counts FROM e_receipt";
   $count = mysqli_query($con, $query);

   $query = "SELECT count(user_id) AS counts FROM users";
   $users = mysqli_query($con, $query);

?>

<div class="cards">
            <div class="card-single">
               <div>
               <?php foreach($count as $co) { ?> 
                     <h1><?php echo $co['counts'] ?></h1>
                     <?php } ?>
                  <span>Customers</span>
               </div>
               <div>
                  <span class="las la-users"></span>
               </div>
            </div>

            <div class="card-single">
               <div>
               <?php foreach($count as $co) { ?> 
                     <h1><?php echo $co['counts'] ?></h1>
                     <?php } ?>
                  <span>Invoice</span>
               </div>
               <div>
                  <span class="las la-clipboard-list"></span>
               </div>
            </div>

            <div class="card-single">
               <div>
               <?php foreach($users as $user) { ?> 
                     <h1><?php echo $user['counts'] ?></h1>
                     <?php } ?>
                  <span>Users</span>
               </div>
               <div>
                  <span class="las la-user-circle"></span>
               </div>
            </div>

            <div class="card-single main-color">
               <div>
                  <?php foreach($outstanding as $out) { ?> 
                     <h1>NGN <?php echo $out['total_out'] ?></h1>
                     <?php } ?>
                  
                  <span>Outstanding</span>
               </div>
               <div>
                  <span class="lab la-google-wallet"></span>
               </div>
            </div>

            <div class="card-single">
               <div>
                  <?php foreach($total as $to) { ?> 
                     <h1>NGN <?php echo $to['total'] ?></h1>
                     <?php } ?>
                  
                  <span>Total Income</span>
               </div>
               <div>
                  <span class="lab la-google-wallet"></span>
               </div>
            </div>

         </div>