<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Register</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
        <link text="stylesheet" rel="stylesheet" href="dashboard-style.css">
    </head>

    <script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
        }

        var opt_link = document.getElementsByClassName("opt_link");
        currentVal = 1;

        function activeOption() {
            for(p of opt_link) {
                p.classList.remove("active_option");
            }
            event.target.classList.add("active_option");
            currentVal = event.target.value;
        }
    </script>
    
    <body>
        <div class="page_container">
            <div class="sidebar_container">
                <a href="Manager_Dashboard.php">
                    <div class="logo_container">
                        <img src="res/logo.jpg"/>
                        <h1>WorkZone</h1>
                    </div>
                </a>
                <div class="optionlist_container">
                    <span>Preferences</span>
                    <a href="M_Employee.php" class="opt_link" value="1" onclick="activeOption()">Register New Employee</a>
                    <a href="M_Task.php" class="opt_link active_option" value="2" onclick="activeOption()">Insert New Task</a>
                    <a href="M_Activity.php" class="opt_link" value="3" onclick="activeOption()">Insert New Activity</a>
                    <a href="M_AssignIndex.php" class="opt_link" value="4" onclick="activeOption()">Assign New Task to Employee</a>
                    <a href="M_Report.php" class="opt_link" value="5" onclick="activeOption()">Show Detailed Report</a>
                    <a href="Logout.php" class="opt_link" value="6" onclick="activeOption()">Logout</a>
                </div>
            </div>

            <div class="form_container">
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
                <div class="form_box">
                    <form action="M_regTask.php" method="post"> 
                        <table align="center" class="input_box">
                            <tr>
                                <td align="center" colspan="2"><h1>Task Register</h1></td>
                            </tr>
                            <tr>
                                <td>Task Id</td>
                                <td><input type="text" id="tid" name="task_id" required></td>
                            </tr>
                            <tr>
                                <td>Task Name</td>
                                <td><input type="text" id="tname" name="task_name" required></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td><input type="date" id="strdate" name="start_date" required></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td><input type="date" id="enddate" name="end_date" required></td>
                            </tr>
                            <tr>
                                <td>Task Nature</td>
                                <td><input type="text" id="tnature" name="task_nature" required></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input type="reset" name="reset" value="RESET" class="clear_button_box">
                                    <input type="submit" name="submit" value="SUBMIT" class="button_box">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>