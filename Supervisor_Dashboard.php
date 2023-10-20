<!DOCTYPE html>

<?php session_start(); 

    $greeting = "";
    $datetime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $date = $datetime->format('H');
    if($date < 12) {
        $greeting = $greeting."<h4>Good Morning !</h4>";
    }
    else if ($date < 15) {
        $greeting = $greeting."<h4>Good Afternoon !</h4>";
    }
    else if ($date < 19) {
        $greeting = $greeting."<h4>Good Evening !</h4>";
    }
    else {
        $greeting = $greeting."<h4>Good Night !</h4>";
    }
?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard-Supervisor</title>
        <link rel="stylesheet" href="dashboard-style.css">
    </head>

    <script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
        }
    </script>

    <body>
        <div class="page_container">
            <div class="sidebar_container">
                <a href="Supervisor_Dashboard.php">
                    <div class="logo_container">
                        <img src="res/logo.jpg"/>
                        <h1>WorkZone</h1>
                    </div>
                </a>
                <div class="optionlist_container">
                    <span>Preferences</span>
                    <a href="S_Employee.php">Register New Employee</a>
                    <a href="S_Activity.php">Insert New Activity</a>
                    <a href="S_AssignIndex.php">Assign New Task to Employee</a>
                    <a href="S_Report.php">Show Detailed Report</a>
                    <a href="Logout.php">Logout</a>
                </div>

            </div>
            <div class="dashview_container">
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
                <div class="header_container">
                    <div class="greeting_container">
                        <?php echo $greeting; ?>
                        <h1>Welcome <?= $_SESSION['username'] ?></h1>
                    </div>
                    <div class="accountlogo_container">
                        <img src="res/user-icon.png"/>
                    </div>
                </div>
                <div class="dashcontent_container">
                    <h1>Employee Task Management System</h1>
                    <h3>Supervisor Dashboard</h3>
                </div>
                <div class="table_container">
                    <table>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Task Assigned</th>
                            <th>Activity</th>
                            <th>Date Assigned</th>
                        </tr>
                        
                    </table>
                </div>

            </div>
        </div>
    </body>
</html>