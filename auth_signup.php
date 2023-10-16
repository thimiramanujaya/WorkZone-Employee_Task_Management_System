<?php

    session_start();

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);


    if(isset($_POST['signup_submit'])){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $login_check = $_POST['login_check'];

        // check if username and email already registered

        $check_user_query = "SELECT uname FROM user WHERE uname='$name'";
        $check_user_result = mysqli_query($conn, $check_user_query);

        $check_email_query = "SELECT email FROM user WHERE email='$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);
        
        if(mysqli_num_rows($check_user_result) > 0) {
            $_SESSION['message'] = "User has already registered";
            header('Location: Signup.php');
        }

        else if(mysqli_num_rows($check_email_result) > 0) {
            $_SESSION['message'] = "Email has already registered";
            header('Location: Signup.php');
        }
        else {
            if($password == $c_password) {
                $insert_query = "INSERT INTO user(uname, email, password) VALUES ('$name', '$email', '$password')";
                $insert_result = mysqli_query($conn, $insert_query);

                if($insert_result) {
                    $_SESSION['message'] = "Registered Sucessfully!";
                    header('Location: Login.html');
                }
                else {
                    $_SESSION['message'] = "Something went wrong!";
                    header('Location: Signup.php');
                }
            }
            else {
                $_SESSION['message'] = "Passwords are not matched!";
                header('Location: Signup.php');
            }

        }

       
    }
?>