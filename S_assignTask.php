<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "INSERT INTO taskactivites(activityid, tid, activity) SELECT temp_activityid, temp_tid, temp_activity FROM temp_taskactivites";

    	if(mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "New Activities Recordeded Successfully";
            header('Location: S_AssignIndex.php');
            $empty_table_query = "TRUNCATE TABLE temp_taskactivites";
            mysqli_query($conn, $empty_table_query);	
		}
		else {
			echo "Error:".$sql."<br/>".mysqli_error($conn); 
		}
	
	
	//close connection
	mysqli_close($conn);
	
?>