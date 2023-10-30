<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$eid = mysqli_real_escape_string($conn, $_POST['eid']);
	$tele = mysqli_real_escape_string($conn, $_POST['telephone']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$design = mysqli_real_escape_string($conn, $_POST['designation']);
	
	
	$check_primary_key = "SELECT eid FROM Employee WHERE eid='$eid' OR tel='$tele' OR email='$email'";
	$primary_key_result = mysqli_query($conn, $check_primary_key);

	if(mysqli_num_rows($primary_key_result) > 0) {
		$_SESSION['message'] = "This employee has been already Registered<br/>Please try again";
		header('Location: S_Employee.php');							 
	}
	else {
		$sql = "INSERT INTO Employee VALUES ('$eid', '$tele', '$name', '$email', '$design')";
	
		if(mysqli_query($conn, $sql)) {
			$_SESSION['message'] = "New Employee Registered Successfully";
        	header('Location: S_Task.php');								 
		}
		else {
			echo "Error:".$sql."<br/>".mysqli_error($conn); 
		}
	}
	
	//close connection
	mysqli_close($conn);
	
?>