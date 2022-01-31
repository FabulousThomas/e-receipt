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
   <title>ViewDeep E-Receipt | Update</title>
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
               <a href="./form.php" class="active"><span class="las la-receipt"></span>
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
      <?php include("./header.php") ?>

      <main>
         <?php include("./cards.php") ?>

         <div class="recent-grid">
            <div class="projects">
               <div class="card">
                  <div class="card-header">
                     <h3>E-Receipts Form | Update </h3>
                  </div>
                  <div class="card-body">

                     <form action="" method="POST" id="form" name="form" enctype="multipart/form-data">

                        <?php foreach ($result as $res) { ?>

                        <div class="form-group group">
                           <div>
                              <label for="date">Date</label>
                              <input type="date" name="date" class="form-control" id="date"
                                 value="<?php echo $res['date'] ?>" required>
                           </div>

                           <div class="select">
                              <label for="drop-down">Estate</label>
                              
                              <?php 
                              
                              $query = "SELECT estate FROM e_receipt LIMIT 1";
                              if($outcome = mysqli_query($con, $query)) {
                                 if(mysqli_num_rows($outcome) > 0) {
                                    while($row = mysqli_fetch_array($outcome)) { 
                                       $dbselected = $row['estate'];
                                    }
                                    mysqli_free_result($outcome);
                                 } 
                              } else {
                                 echo "ERROR: Could not exeute $query." .mysqli_error($con);
                              }

                              $options = array('Select option', 'Honour Court', 'Kings Court', 'Eden Pride', 'Distinction');
                              $dbselected = $options[0];

                              echo "<select name='estate'>";
                              foreach ($options as $option) {

                                 if ($dbselected === $option) {
                                    echo "<option select='selected' value='$option'>$option</option>";
                                 } else {
                                    echo "<option value='$option'>$option</option>";
                                 }
                              }
                              echo "</select>";
                              
                              ?>

                           </div>

                        </div>

                        <div class="form-group">
                           <label for="received_from">Received From</label>
                           <input type="text" name="received_from" class="form-control" id="from"
                              value="<?php echo $res['received_from'] ?>" required>
                        </div>

                        <div class="form-group">
                           <label for="sum_of">The sum of</label>
                           <input type="text" name="sum_of" class="form-control" id="sum"
                              value="<?php echo $res['sum_of'] ?>" required>
                        </div>

                        <div class="form-group">
                           <label>Mode of payment: </label>
                           <label><input type="checkbox" name="payment_mode" class="form-control" id="mode"
                                 value="Cheque" checked> Cheque
                           </label>

                           <label><input type="checkbox" name="payment_mode" class="form-control" id="mode"
                                 value="Bank Transfer">
                              Bank Transfer
                           </label>

                           <label><input type="checkbox" name="payment_mode" class="form-control" id="mode"
                                 value="Cash">
                              Cash
                           </label>

                        </div>

                        <div class="form-group">
                           <label for="payment_for">Being payment for</label>
                           <input type="text" name="payment_for" class="form-control" id="for"
                              value="<?php echo $res['payment_for'] ?>" required>
                        </div>

                        <div class="form-group">
                           <label for="payment_figure">Payment in figure</label>
                           <input type="text" name="payment_figure" class="form-control" id="figure"
                              value="<?php echo $res['payment_figure'] ?>" required
                              onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57">
                        </div>

                        <div class="form-group">
                           <label for="drop-down">Number of unit(s)</label>
                           <?php

                              $options = array('Select option', 'half plot', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20');
                              $selected = $options[0];

                              echo "<select name='no_unit'>";
                              foreach ($options as $option) {

                                 if ($selected === $option) {
                                    echo "<option select='selected' value='$option'>$option</option>";
                                 } else {
                                    echo "<option value='$option'>$option</option>";
                                 }
                              }
                              echo "</select>";
                              ?>
                        </div>

                        <div class="form-group">
                           <label for="amount_paid">Amount paid</label>
                           <input type="text" name="amount_paid" class="form-control" id="amount_paid"
                              value="<?php echo $res['amount_paid'] ?>" required
                              onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57">
                        </div>

                        <div class="form-group">
                           <label for="outstanding">Total Outstanding</label>
                           <input type="text" name="outstanding" class="form-control" id="outstanding"
                              value="<?php echo $res['outstanding'] ?>"
                              onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57">
                        </div>

                        <div class="form-group">
                           <label for="balance">Balance as today</label>
                           <input type="text" name="balance" class="form-control" id="balance"
                              value="<?php echo $res['balance'] ?>" readonly>
                        </div>

                        <div class="form-group">
                           <button type="submit" name="submit_update" class="btn" id="cal">Submit</button>

                        </div>

                        <?php } ?>
                     </form>


                  </div>
               </div>
            </div>
         </div>

      </main>
   </div>

   <script src="./functions/script.js"></script>
</body>

</html>