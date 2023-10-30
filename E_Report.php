
<?php

    session_start();

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

    $record = "";
    if(isset($_GET['gen_report'])) {
        $eid = mysqli_real_escape_string($conn, $_GET['emp_id']);
        if($eid != "") {
            $query = "SELECT Employee.eid, Employee.name, Employee.designation, Task.tname, Task.start_date, Task.end_date, taskactivites.activity, assign.dateassign, assign.remarks
            FROM Employee, Task, taskactivites, assign
            WHERE Employee.eid='$eid' AND Employee.eid = assign.eid AND Task.tid = assign.tid AND taskactivites.activityid = assign.activityid";

            $query_result = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_result) > 0) {
                while($result = mysqli_fetch_array($query_result)) {
                  $record = $record."<tr> <td>{$result['eid']}</td> <td>{$result['name']}</td> <td>{$result['designation']}</td> <td>{$result['tname']}</td> 
                  <td>{$result['start_date']}</td> <td>{$result['end_date']}</td> <td>{$result['activity']}</td> <td>{$result['dateassign']}</td> <td>{$result['remarks']}</td> </tr>";
                }
              }
            else {
                $_SESSION['message'] = "Error: No sufficient data to create Record";
            }
        }
        else {
            $_SESSION['message'] = "Please give a valid Employee Id";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Assigned Activities</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
    </head>

    <script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
        }
    </script>

    <body>
        <div class="e_form_container">
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
        <a href="Employee_Dashboard.php"><img src="res/back_arrow.png" width="32px" height="32px"/> Back to Dashboard</a>
            <div class="report_container">
                <h1>Assigned Activities</h1>
                <form method="get">
                    <div class="eid_box input_box">
                        <label for="eid">Your Employee id</label>
                        <input type="text" id="E_eid" name="emp_id"/>
                    </div>
                    <input type="submit" value="View Assigned Activities" name="gen_report" class="button_box" id="E_gen_report"/>
                </form>

                <table>
                    <tr>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Employee Designation</th>
                        <th>Task Assigned</th>
                        <th>Task Start Date</th>
                        <th>Task End Date</th>
                        <th>Activity</th>
                        <th>Date Assigned</th>
                        <th>Remarks</th>
                    </tr>
                    <?php echo $record; ?>
                </table>
            </div>
        </div>
    </body>
</html>