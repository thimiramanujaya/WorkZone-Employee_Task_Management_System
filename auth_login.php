<?php

    session_start();

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(isset($_POST['login_submit'])){
        $name = $_POST['username'];
        $password = $_POST['password'];

        $manager_check_query = "SELECT uname, password FROM user WHERE role='manager'";
        $manager_check_result = mysqli_query($conn, $manager_check_query);
        $manager_uname_set = mysqli_fetch_array($manager_check_result);

        $supervisor_check_query = "SELECT uname, password FROM user WHERE role='supervisor'";
        $supervisor_check_result = mysqli_query($conn, $supervisor_check_query);
        $supervisor_uname_set = mysqli_fetch_array($supervisor_check_result);

        $login_query = "SELECT * FROM user WHERE uname='$name' AND password='$password'";
        $login_query_result = mysqli_query($conn, $login_query);

        if(mysqli_num_rows($login_query_result) > 0) {

            if($manager_uname_set['uname'] == $name && $manager_uname_set['password'] == $password) {
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $name;
                $_SESSION['message'] = "Logged in Successfully";
                header('Location: Manager_Dashboard.php');
            }

            else if($supervisor_uname_set['uname'] == $name && $supervisor_uname_set['password'] == $password) {
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $name;
                $_SESSION['message'] = "Logged in Successfully";
                header('Location: Supervisor_Dashboard.php');
            }
            else {
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $name;
                $_SESSION['message'] = "Logged in Successfully";
                header('Location: Employee_Dashboard.php');
            }
        }
        else {
            $_SESSION['message'] = "Invaild username or password";
            header('Location: Login.php');
        }
    }

?>