<?php

$expiry = 1800; //session expiry required after 30 mins (30 * 60);
    if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
        session_unset();
        session_destroy();
        echo "<script>alert('Time has expired!')</script>";
    }
    $_SESSION['LAST'] = time();