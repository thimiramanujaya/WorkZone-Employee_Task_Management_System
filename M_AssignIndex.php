<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";


	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	$query1 = "SELECT eid FROM Employee";
	$result_set1 = mysqli_query($conn, $query1);

	$query2 = "SELECT tid FROM task";
	$result_set2 = mysqli_query($conn, $query2);

	$query3 = "SELECT activityid FROM taskactivites";
	$result_set3 = mysqli_query($conn, $query3);

	$option1 = "";
	while ($result1 = mysqli_fetch_array($result_set1)) {
		$option1 = $option1."<option>{$result1['eid']}</option>";    
	}

	$option2 = "";
	while ($result2 = mysqli_fetch_array($result_set2)) {
		$option2 = $option2."<option>{$result2['tid']}</option>";   
	}

	$option3 = "";
	while ($result3 = mysqli_fetch_array($result_set3)) {
		$option3 = $option3."<option>{$result3['activityid']}</option>";   
	}

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assign Task</title>
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
			    <div class="form_box">
				    <form action="Assign.php" method="post"> 
					    <table align="center"class="input_box">
						    <tr>
							    <td align="center" colspan="2"><h1>Assign Task</h1></td>
						    </tr>
						    <tr>
							    <td>Employee Id</td>
							    <td>
                        		    <select name="eid_list" id="eidList">
									    <?php echo $option1; ?>
								    </select>
                    		    </td>
						    </tr>
						    <tr>
    							<td>Task Id</td>
	    						<td>
	                        	    <select name="tid_list" id="tidList">
									    <?php echo $option2; ?>
								    </select>
                    		    </td>
						    </tr>
						    <tr>
    							<td>Activity Id</td>
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
    							<td align="center" colspan="2"><input type="submit" name="submit" value="SUBMIT" class="button_box"></td>
						    </tr>
					    </table>
				    </form>
			    </div>
		    </div>
        </div>
		
    
    </body>
</html>