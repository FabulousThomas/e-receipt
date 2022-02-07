<?php

function check_login($con)
{
   if (isset($_SESSION['id'])) {
      $id = $_SESSION['id'];
      $query = "SELECT * FROM users WHERE id = '$id' limit 1";

      $result = mysqli_query($con, $query);

      if ($result && mysqli_num_rows($result) > 0) {
         $user_data = mysqli_fetch_assoc($result);
         return $user_data;
      }
   }

   // Redirect to Login page
   header("Location: index.php");
   die;
}

if (isset($_REQUEST['search-sessions'])) {
   $term = $_REQUEST['search-sessions'];
   $term = preg_replace("#[^0-9a-z]#i", "", $term);

   if (!empty($term)) {
      $query = "SELECT * FROM login_sessions WHERE user_id LIKE '%$term%' OR username LIKE '%$term%' OR date LIKE '%$term%' ORDER BY id DESC";
      $session = mysqli_query($con, $query);
   } else {
      echo "<script>alert('Type something to search!')</script>";
   }
   $searchErr = 'Your search result!';
}


