<?php

session_start();
require_once "./functions/connection.php";
require_once "./functions/function.php";
require_once "./functions/reg.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/css.css">
    <title>ViewDeep E-Receipt | Register</title>
</head>

<body>
    <div class="container">

        <form action="" method="post" class="form" id="form" enctype="multipart/form-data">
            <div class="bank-logo">
            <img src="./img/viewdeep-logo.png" width="130px" height="130px">
                <h5>VIEWDEEP E-RECEIPT GENERATOR</h5>
            </div>
            <div class="form-group">

                <input type="email" name="email" class="form-control" id="email" placeholder="EMAIL" required spellcheck="false" autocomplete="off" maxlength="50">
                <small>EMAIL</small>
            </div>
            <div class="form-group">

                <input type="text" name="username" class="form-control" id="username" placeholder="USERNAME" required spellcheck="false" autocomplete="off" maxlength="50">
                <small>USERNAME</small>
            </div>
            <div class="form-group">

                <input type="password" name="password" class="form-control" id="password" placeholder="PASSWORD" required maxlength="50">
                <small>PASSWORD</small>
            </div>
            <div class="form-group">
                <button type="submit" name="reg" class="form-control" id="reg">Register</button>
            </div>
            <div class="form-group">
                <?php if ($error) { ?>
                    <div style="color: red;"><?php echo $error; ?></div>
                <?php } ?>
            </div>
            <div id="account">
                <p>Already have an account? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>