<?php

$loginErr = "";

if (isset($_POST['login_btn'])) {

    $user_id = "";
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        // READ FROM DATABASE
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['user_id'];

                if ($row['username'] == $username && $row['password'] == $password) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();

                    $insert = "INSERT INTO login_sessions (username, user_id) VALUES ('$username', '$user_id')";
                    mysqli_query($con, $insert);

                    // GET CURRENT DATE AND TIME
                    // $date = date('Y-m-d H:i:s');
                    // $update = "UPDATE $logintb SET date = '$date' WHERE username = '$username'";
                    // mysqli_query($con, $update);
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