<?php

$error = "";

if (isset($_POST['reg'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // CHECKS IF USER ALREADY EXISTS
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($con, $query);

    if($result) {
        if($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            if ($username == $data['username']) {
                $error = "username already exist!";
            } elseif ($email == $data['email']) {
                $error = "email already exists!";
            }
        } else {

            // SAVES TO DATABASE IF FIELDS ARE NOT EMPTY
            if (!empty($email) && !empty($username) && !empty($password)) {
                $user_id = random_num(10);
                $query = "INSERT INTO users (email, username, password, user_id) VALUES ('$email', '$username', '$password', '$user_id')";
    
                if (mysqli_query($con, $query)) {
                    header("Location: index.php");
                    die;
                } else {
                    echo "<script>alert('An error occured\nPlease try again!')</script>";
                }
            } else {
                echo "Please, enter some valid informations (><)";
            }
        }
    }
}