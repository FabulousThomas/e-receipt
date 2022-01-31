<?php

$loginErr = "";

if (isset($_POST['login_btn'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        // READ FROM DATABASE
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['id'] = $user_data['id'];
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    header("Location: ./dashbord.php");
                    die;
                }
            }
            // echo "<script>alert('Wrong username or password')</script>";
            $loginErr = "Wrong username or password";
        }
    } else {
        // echo "Please, enter some valid informations (><)";
        $loginErr = "Please, enter some valid informations (><)";
    }

}