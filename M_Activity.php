<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";


	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	$query = "SELECT tid FROM Task";
	$result_set = mysqli_query($conn, $query);

	$options = "";
	while ($result = mysqli_fetch_array($result_set)) {
		$options = $options."<option>{$result['tid']}</option>";    //$options .= "<option>{$result['tid']}</option>"
	}

	//$row = "";
	$record = "";
	if(isset($_GET["insert_activity"])) {
		$tid = $_GET['tid_list'];
		$activityid = $_GET['activity_id'];
		$activity = $_GET['activity_name'];

		$sql = "INSERT INTO temp_taskactivites VALUES ('$activityid', '$tid', '$activity')";
		if(mysqli_query($conn, $sql)) {
			$query_record = "SELECT * FROM temp_taskactivites";
			$result_set2 = mysqli_query($conn, $query_record);

			if(mysqli_num_rows($result_set2) > 0) {
				while($result2 = mysqli_fetch_array($result_set2)) {
					$record = $record."<tr> <td>{$result2['temp_tid']}</td> <td>{$result2['temp_activityid']}</td> <td>{$result2['temp_activity']}</td> </tr>";
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
        <link text="stylesheet" rel="stylesheet" href="dashboard-style.css">
        <link text="stylesheet" rel="stylesheet" href="form-style.css">

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
    </head>
    
    <body>
        <div class="page_container">
            <div class="sidebar_container">
                <a href="Manager_Dashboard.html">
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
                </div>
            </div>
            <div class="form_container">
			    <div class="form_box">
				    <form method="get"> 	
					    <table align="center" class="input_box">
						    <tr>
							    <td align="center" colspan="3"><h1>Insert Activity</h1></td>
						    </tr>
						    <tr>	
    							<td>Task Id</td>
	    						<td>
								    <select name="tid_list" id="tidList">
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
    				<form action="assignTask.php" method="post">
					    <table id="displayTable" align="center" class="input_box">
    						<tr>
							    <th>Task Id</th>
							    <th>Activity Id</th>
							    <th>Activity</th>
            
						    </tr>
							    <!-- <?php echo $row; ?>  -->
						    	<?php echo $record; ?>
						    <tr class ="btn_row">
    							<td align="center" colspan="3">
	    							<!--<input type="button" value="Delete Record" onclick="removeRow()">-->
								    <input type="submit" value="Save to DB" name="submit" class="button_box"/>
							    </td>
						    </tr>
					    </table>
				    </form>
			    </div>
		    </div>
        </div>
		
    </body>
</html>