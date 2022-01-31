<?php

session_start();
require_once "./functions/connection.php";
require_once "./functions/function.php";
require_once "./functions/login.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>E-Receipt Generator | Login</title>
</head>

<body>
    <div class="container">

        <form action="" method="post" class="form" id="form" enctype="multipart/form-data">
            <div class="bank-logo">
                <h5>VIEWDEEP E-RECEIPT GENERATOR</h5>
            </div>
            <div class="form-group">

                <input type="text" name="username" class="form-control" id="username" placeholder="USERNAME" spellcheck="false" required autocomplete="off" maxlength="50">
                <small>USERNAME</small>
            </div>
            <div class="form-group">

                <input type="password" name="password" required class="form-control" id="password" placeholder="PASSWORD" maxlength="50">
                <small>PASSWORD</small>
            </div>
            <div class="form-group">
                <button type="submit" name="login_btn" class="form-control" id="submit">Login</button>
            </div>
            <div class="form-group">
                <?php if ($loginErr) { ?>
                    <div style="color: red;"><?php echo $loginErr; ?></div>
                <?php } ?>
            </div>
            <div id="account">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>