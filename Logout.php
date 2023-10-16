<?php

    session_start();

    if(isset($_SESSION['auth'])) {

        unset($_SESSION['auth']);
        unset($_SESSION['username']);
        $_SESSION['message'] = "Logged out Successfully";
    }
    header('Location: Login.php');
?>