<!DOCTYPE html>

<?php session_start(); 

    $hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

    $record = "";
    $query = "SELECT Employee.eid, Employee.name, Task.tname, taskactivites.activity, assign.dateassign 
              FROM Employee, Task, taskactivites, assign
              WHERE Employee.eid = assign.eid AND Task.tid = assign.tid AND taskactivites.activityid = assign.activityid";

	$query_result = mysqli_query($conn, $query);

	if(mysqli_num_rows($query_result) > 0) {
		while($result = mysqli_fetch_array($query_result)) {
			$record = $record."<tr> <td>{$result['eid']}</td> <td>{$result['name']}</td> <td>{$result['tname']}</td> 
            <td>{$result['activity']}</td> <td>{$result['dateassign']}</td> </tr>";
		}
	}
    else {
        $record = $record."<tr> <td colspan=5 align='center'> No sufficient data to display an overview </td> </tr>" ;
    }
        

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
        <title>Dashboard-Manager</title>
        <link rel="stylesheet" href="dashboard-style.css">
        
        <script>
            function closeAlert() {
                document.getElementById('alert').style.display = 'none';
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
                    <a href="M_Employee.php">Register New Employee</a>
                    <a href="M_Task.php">Insert New Task</a>
                    <a href="M_Activity.php">Insert New Activity</a>
                    <a href="M_AssignIndex.php">Assign New Task to Employee</a>
                    <a href="M_Report.php">Show Detailed Report</a>
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
                        <a href="#">
                            <img src="res/user-icon.png" alt="user-logo"/>
                        </a>
                    </div>
                </div>
                <div class="dashcontent_container">
                    <h1>Employee Task Management System</h1>
                    <h3>Manager Dashboard</h3>
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
                        <?php echo $record; ?>
                    </table>
                </div>

            </div>
        </div>
    </body>
</html>