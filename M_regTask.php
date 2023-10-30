<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$tid = mysqli_real_escape_string($conn, $_POST['task_id']);
	$tname = mysqli_real_escape_string($conn, $_POST['task_name']);
	$strdate = mysqli_real_escape_string($conn, $_POST['start_date']);
	$enddate = mysqli_real_escape_string($conn, $_POST['end_date']);
	$tnature = mysqli_real_escape_string($conn, $_POST['task_nature']);
	

	$check_primary_key = "SELECT tid FROM Task WHERE tid='$tid' OR tname='$tname'";
	$primary_key_result = mysqli_query($conn, $check_primary_key);

	if(mysqli_num_rows($primary_key_result) > 0) {
		$_SESSION['message'] = "This Task has already been Registered<br/>Please try again";
		header('Location: M_Task.php');
				
	}
	else {
		$sql = "INSERT INTO Task VALUES ('$tid', '$tname', '$strdate', '$enddate', '$tnature')";

    	if(mysqli_query($conn, $sql)) {
			$_SESSION['message'] = "New Task Registered Successfully";
        	header('Location: M_Activity.php');	
		}
		else {
			echo "Error:".$sql."<br/>".mysqli_error($conn); 
		}
	}

	
	//close connection
	mysqli_close($conn);
	
?>