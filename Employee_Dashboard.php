<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard-Employee</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
    </head>

    <script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
        }
    </script>
    
    <body>
        <div class="container_home">
            <?php 
                if(isset($_SESSION['message'])) {
                    ?>
                    <div class="index_alert_box" id="alert">
                        <h4><?= $_SESSION['message']; ?></h4>
                        <button type="button"><img src="res/close_icon.png" width="20px" height="20px" onclick="closeAlert()"/></button>
                    </div>

                    <?php
                    unset($_SESSION['message']);
                }
            ?>
            <div class="e_dash_header">
                <a href="Employee_Dashboard.php">
                    <div class="logo_container">
                        <img src="res/logo.jpg"/>
                        <h1>WorkZone</h1>
                    </div>
                </a>
                <h3>Welcome <?= $_SESSION['username'] ?></h3>
                <div class="accountlogo_container">
                    <a href="#">
                        <img src="res/user-icon.png" alt="user-logo"/>
                    </a>
                </div>
            </div>
            <div class="box_container">
                <h1>Employee Task Management System</h1>
                <a href="E_Employee.html">Register New Employee</a>
                <a href="E_Report.php">View Assigned Activities</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
    
    </body>
</html>