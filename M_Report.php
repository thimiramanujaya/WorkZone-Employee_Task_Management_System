
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
            $query = "SELECT Employee.eid, Employee.name, Employee.designation, Task.tname, Task.start_date, Task.end_date, taskactivites.activity, assign.dateassign, assign.remarks
            FROM Employee, Task, taskactivites, assign
            WHERE Employee.eid = assign.eid AND Task.tid = assign.tid AND taskactivites.activityid = assign.activityid";

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
        
    }


?>
<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Report</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
        <link text="stylesheet" rel="stylesheet" href="dashboard-style.css">

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
    </head>


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
                    <a href="M_Task.php" class="opt_link" value="2" onclick="activeOption()">Insert New Task</a>
                    <a href="M_Activity.php" class="opt_link" value="3" onclick="activeOption()">Insert New Activity</a>
                    <a href="M_AssignIndex.php" class="opt_link" value="4" onclick="activeOption()">Assign New Task to Employee</a>
                    <a href="M_Report.php" class="opt_link active_option" value="5" onclick="activeOption()">Show Detailed Report</a>
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
                <div class="report_container">
                    <h1>Report</h1>
                    <form method="get">
                    <div class="eid_box input_box">
                        <label for="eid">Employee id</label>
                        <input type="text" id="eid" name="emp_id"/>
                    </div>
                        <input type="submit" value="Generate New Report" name="gen_report" class="button_box" />
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
        </div>
    </body>
</html>