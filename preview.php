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
   <title>Receipt</title>
</head>

<body>




   <div class="main-contents" style="margin-top: 3rem;">

      <!-- <main> -->

      <div class="recent-grid">
         <div class="projects">
            <div class="card print-pdf" id="print-pdf">
               <!-- <div class="card-header">
                     <h3>Receipt Preview</h3>
                  </div> -->
               <div class="card-body">

                  <?php foreach ($result as $res) { ?>
                  <form method="POST" enctype="multipart/form-data">
                     <input type="text" id="id" value="<?php echo $res['receipt_id']; ?>" hidden>
                  </form>
                  <!-- ALL CODES IN HERE -->

                  <div class="container receipt-container" id="container"
                     style="align-items:center; justify-content: center; display: flex; flex-direction: column;">

                     <div id="letter-head" style="margin-bottom: 1.5rem;">
                        <img src="./img/letter-head.PNG">
                     </div>
                     <div class="receipt-content">

                        <form action="" method="POST" id="form" name="form" enctype="multipart/form-data">

                           <div class="form-group group">
                              <div>
                                 <label>Date:</label>
                                 <input type="text" name="date" class="form-control" id="date"
                                    value="<?php echo $res['date'] ?>" readonly>
                              </div>

                              <div class="select">
                                 <div class="form-group">
                                    <label>Estate:</label>
                                    <input type="text" name="estate" class="form-control" id="estate"
                                       value="<?php echo $res['estate'] ?>" readonly>
                                 </div>
                              </div>

                           </div>

                           <div class="form-group">
                              <label>Received From:</label>
                              <input type="text" name="received_from" class="form-control" id="from"
                                 value="<?php echo $res['received_from'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label>The sum of:</label>
                              <input type="text" name="sum_of" class="form-control" id="sum"
                                 value="<?php echo $res['sum_of'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label>Mode of payment:</label>
                              <input type="text" name="payment_mode" class="form-control" id="sum"
                                 value="<?php echo $res['payment_mode'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label>Being payment for:</label>
                              <input type="text" name="payment_for" class="form-control" id="for"
                                 value="<?php echo $res['payment_for'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label>Payment in figure</label>
                              <input type="text" name="payment_figure" class="form-control" id="figure"
                                 value="<?php echo $res['payment_figure'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label>Number of unit(s):</label>
                              <input type="text" name="no_unit" class="form-control" id="figure"
                                 value="<?php echo $res['no_unit'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label for="amount_paid">Amount paid:</label>
                              <input type="text" name="amount_paid" class="form-control" id="amount_paid"
                                 value="<?php echo $res['amount_paid'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label for="total_outstanding">Total Outstanding:</label>
                              <input type="text" name="total_outstanding" class="form-control" id="outstanding"
                                 value="<?php echo $res['outstanding'] ?>" readonly>
                           </div>

                           <div class="form-group">
                              <label for="balance">Balance as today:</label>
                              <input type="text" name="balance" class="form-control" id="balance"
                                 value="<?php echo $res['balance'] ?>" readonly>
                           </div>

                        </form>
                        <p style="text-align: right; margin-top: 2rem; color: red; font-size: 1.2rem;">Serial Number:
                           <?php echo $res['serial_no'] ?></p>

                     </div>
                     <div id="letter-footer">
                        <img src="./img/letter-footer.PNG">
                     </div>

                  </div>

                  <?php } ?>



               </div>
            </div>

            <div class="share-print">
               <div>
                  <button id="printpdf" onclick="printpdf()">Print <span class="las la-print" id="las"></span></button>
               </div>
               <div>
                  <p>Share
                     <a href="#" class="btn-facebook" target="blank"><i class="lab la-facebook"></i></a>
                     <a href="#" class="btn-twitter" target="blank"><i class="lab la-twitter"></i></a>
                     <a href="#" class="btn-linkedin" target="blank"><i class="lab la-linkedin-in"></i></a>
                     <a href="#" class="btn-pinterest" target="blank"><i class="lab la-pinterest"></i></a>
                     <a href="#" class="btn-whatsapp" target="blank"><i class="lab la-whatsapp"></i></a>
                  </p>
               </div>
            </div>

         </div>
      </div>

      <!-- </main> -->
   </div>

   <script src="./functions/script.js"></script>
</body>

</html>