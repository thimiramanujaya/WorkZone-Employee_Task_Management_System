
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

    $record = "";
    if(isset($_GET['gen_report'])) {
        $query = "SELECT eid, name, tname, activity, dateassign 
                  FROM Employee, Task, taskactivites, assign";

		$query_result = mysqli_query($conn, $query);

		if(mysqli_num_rows($query_result) > 0) {
			while($result = mysqli_fetch_array($query_result)) {
				$record = $record."<tr> <td>{$result['eid']}</td> <td>{$result['name']}</td> <td>{$result['tname']}</td> 
                <td>{$result['activity']}</td> <td>{$result['dateassign']}</td> </tr>";
			}
		}
        else {
            echo '<script>alert("Error: No Sufficient data to create Record")</script>';
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
                    <a href="M_Employee.html">Register New Employee</a>
                    <a href="M_Task.html">Insert New Task</a>
                    <a href="M_Activity.php">Insert New Activity</a>
                    <a href="M_AssignIndex.php">Assign New Task to Employee</a>
                    <a href="M_Report.php">Show Detailed Report</a>
                    <a href="Logout.php">Logout</a>
                </div>
            </div>

            <div class="form_container">
                <div class="report_container">
                    <h1>Report</h1>
                    <form method="get">
                        <input type="submit" value="Generate New Report" name="gen_report" class="button_box" />
                    </form>

                    <table> 
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Task Assigned</th>
                            <th>Activity</th>
                            <th>Date Assigned</th>
                        </tr>
                        <?php echo $record; ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>