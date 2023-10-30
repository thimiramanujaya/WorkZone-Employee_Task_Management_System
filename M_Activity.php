<?php

	session_start();

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";


	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	// displaying task names in dropdown which are fetched from db
	$query = "SELECT tname FROM Task";
	$result_set = mysqli_query($conn, $query);

	$options = "";
	while ($result = mysqli_fetch_array($result_set)) {
		$options = $options."<option>{$result['tname']}</option>";    //$options .= "<option>{$result['tid']}</option>"
	}

	// inserting given activity data into a temporary table
	//$row = "";
	$record = "";
	if(isset($_GET["insert_activity"])) {
		$tname = mysqli_real_escape_string($conn, $_GET['tname_list']);
		$activityid = mysqli_real_escape_string($conn, $_GET['activity_id']);
		$activity = mysqli_real_escape_string($conn, $_GET['activity_name']);

		$tid_query = "SELECT tid FROM task WHERE tname='$tname'";
		$tid_result_array = mysqli_query($conn, $tid_query);
		$tid_result = mysqli_fetch_array($tid_result_array);
		$tid = $tid_result['tid'];

		

		$sql = "INSERT INTO temp_taskactivites VALUES ('$activityid', '$tid', '$tname', '$activity')";
		if(mysqli_query($conn, $sql)) {
			$query_record = "SELECT * FROM temp_taskactivites";
			$result_set2 = mysqli_query($conn, $query_record);

			if(mysqli_num_rows($result_set2) > 0) {
				while($result2 = mysqli_fetch_array($result_set2)) {
					$record = $record."<tr> <td>{$result2['temp_tname']}</td> <td>{$result2['temp_activityid']}</td> <td>{$result2['temp_activity']}</td> </tr>";
				}
			}

		}
		else {
			echo "Error:".$sql."<br/>".mysqli_error($conn); 
		}


		/*$row = $row."<tr> <td>{$tid}</td> <td>{$activityid}</td> <td>{$activity}</td </tr>";*/

	}

?>

<!DOCTYPE html>



<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Activity</title>
		<link text="stylesheet" rel="stylesheet" href="form-style.css">
        <link text="stylesheet" rel="stylesheet" href="dashboard-style.css">

		<!--
		<script>
			function insertRow() {
				var tid = document.getElementById('tidList').value;
				var activityid = document.getElementById('aid').value;
				var activity = document.getElementById('aname').value;

				var table = document.getElementById('displayTable');

				var newRow = table.insertRow(table.rows.length-1);

				var cel1 = newRow.insertCell(0);
				var cel2 = newRow.insertCell(1);
				var cel3 = newRow.insertCell(2);

				cel1.innerHTML = tid;
				cel2.innerHTML = activityid;
				cel3.innerHTML = activity;
			}
			
			var index;
			var table = document.getElementById('displayTable');

			for(var i=1; i<table.rows.length; i++) {
				table.rows[i].cells[1].onclick =  function() {
					index = this.rowIndex;
					table.deleteRow(index);

				};
				

			}  
		
		</script> -->

		<script type="text/javascript">
			function clearTable() {
				var rowCount = displayTable.rows.length;
				for(var i= rowCount-2; i>0; i--) {
					displayTable.deleteRow(i);
				}
			}
		</script>
    </head>

	<script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
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
                    <a href="M_Employee.php">Register New Employee</a>
                    <a href="M_Task.php">Insert New Task</a>
                    <a href="M_Activity.php">Insert New Activity</a>
                    <a href="M_AssignIndex.php">Assign New Task to Employee</a>
                    <a href="M_Report.php">Show Detailed Report</a>
					<a href="Logout.php">Logout</a>
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
				    <form method="get"> 	
					    <table align="center" class="input_box">
						    <tr>
							    <td align="center" colspan="3"><h1>Insert Activity</h1></td>
						    </tr>
						    <tr>	
    							<td>Task Name</td>
	    						<td>
								    <select name="tname_list" id="tidList">
									    <?php echo $options; ?>
								    </select>
							    </td>
                    		    <td></td>
						    </tr>
						    <tr>
							    <td>Activity Id</td>
							    <td><input type="text" id="aid" name="activity_id" required></td>
							    <td></td>
						    </tr>
						    <tr>
							    <td>Activity</td>
							    <td><input type="text" id="aname" name="activity_name" required></td>
							    <td><input type="submit" value="ADD" name="insert_activity" onclick="insertRow()" class="button_box"></td>
						    </tr>
					    </table>
				    </form>
			    </div>

			    <div class="form_box">
    				<form action="M_assignTask.php" method="post">
					    <table id="displayTable" align="center" class="input_box">
    						<tr>
							    <th>Task Name</th>
							    <th>Activity Id</th>
							    <th>Activity</th>
            
						    </tr>
							    <!-- <?php echo $row; ?>  -->
						    	<?php echo $record; ?>
						    <tr class ="btn_row">
    							<td align="center" colspan="3">
								    <input type="submit" value="Save to Database" name="submit" class="button_box"/>
							    </td>
						    </tr>
					    </table>
				    </form>
					<?php 
						if(isset($_GET['clear'])) {
							//echo "<script>if(confirm('Do you really want to clear table?') == true){alert('Table Cleared!');} else{alert('Cancelled');}</script>";
							$empty_table_query = "TRUNCATE TABLE temp_taskactivites";
            				mysqli_query($conn, $empty_table_query);	
							exit();
							$_SESSION['message'] = "Table Cleared";
							header('Location: M_Activity.php');
						}
					?>
					<form method="get">
						<input type="submit" value="Clear Table" name="clear" onclick="clearTable()" class="clear_button_box">
					</form>
			    </div>
		    </div>
        </div>
		
    </body>
</html>