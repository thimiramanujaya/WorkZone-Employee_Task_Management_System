<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(isset($_POST['submit'])) {

		$check_temp_ta = "SELECT * FROM temp_taskactivites";
		$result_temp_ta = mysqli_query($conn, $check_temp_ta);

		if(mysqli_num_rows($result_temp_ta) > 0) {

			$sql = "INSERT INTO taskactivites(activityid, tid, tname, activity) SELECT temp_activityid, temp_tid, temp_tname, temp_activity FROM temp_taskactivites";

			if(mysqli_query($conn, $sql)) {
				$_SESSION['message'] = "New Activities Recordeded Successfully";
				header('Location: S_AssignIndex.php');
				$empty_table_query = "TRUNCATE TABLE temp_taskactivites";
				mysqli_query($conn, $empty_table_query);	
			}
			else {
				echo "Error:".$sql."<br/>".mysqli_error($conn); 
			}
		}
		else {
			$_SESSION['message'] = "Oops!! Please add some new activities first";
			header('Location: S_Activity.php');
		}
	}
	
	
	//close connection
	mysqli_close($conn);
	
?>