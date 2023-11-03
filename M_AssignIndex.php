<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";


	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	$query1 = "SELECT name FROM Employee";
	$result_set1 = mysqli_query($conn, $query1);

	$query2 = "SELECT tname FROM task";
	$result_set2 = mysqli_query($conn, $query2);

	$query3 = "SELECT activity FROM taskactivites";
	$result_set3 = mysqli_query($conn, $query3);

	$option1 = "";
	while ($result1 = mysqli_fetch_array($result_set1)) {
		$option1 = $option1."<option>{$result1['name']}</option>";    
	}

	$option2 = "";
	while ($result2 = mysqli_fetch_array($result_set2)) {
		$option2 = $option2."<option>{$result2['tname']}</option>";   
	}

	$option3 = "";
	while ($result3 = mysqli_fetch_array($result_set3)) {
		$option3 = $option3."<option>{$result3['activity']}</option>";   
	}

?>

<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assign Task</title>
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
                    <a href="M_AssignIndex.php" class="opt_link active_option" value="4" onclick="activeOption()">Assign New Task to Employee</a>
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
				    <form action="M_Assign.php" method="post"> 
					    <table align="center"class="input_box">
						    <tr>
							    <td align="center" colspan="2"><h1>Assign Task</h1></td>
						    </tr>
						    <tr>
							    <td>Employee Name</td>
							    <td>
                        		    <select name="ename_list" id="eidList">
									    <?php echo $option1; ?>
								    </select>
                    		    </td>
						    </tr>
						    <tr>
    							<td>Task Name</td>
	    						<td>
	                        	    <select name="tname_list" id="tidList">
									    <?php echo $option2; ?>
								    </select>
                    		    </td>
						    </tr>
						    <tr>
    							<td>Activity </td>
		    					<td>
                            		<select name="activity_list" id="activityList">
				    					<?php echo $option3; ?>
								    </select>
                    		    </td>
						    </tr>
						    <tr>
    							<td>Date Assigned</td>
	    						<td><input type="date" id="dateAssign" name="date_assign" required></td>
						    </tr>
						    <tr>
							    <td>Remarks</td>
							    <td><input type="text" id="remarks" name="remarks" required></td>
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