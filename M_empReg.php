<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	$eid = $_POST['eid'];
	$tele = $_POST['telephone'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$design = $_POST['designation'];
	
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);


	$check_primary_key = "SELECT eid FROM Employee WHERE eid='$eid' OR tel='$tele' OR email='$email'";
	$primary_key_result = mysqli_query($conn, $check_primary_key);

	if(mysqli_num_rows($primary_key_result) > 0) {
		$_SESSION['message'] = "This employee has been already Registered<br/>Please try again";
		header('Location: M_Employee.php');
				
	}
	else {
		$sql = "INSERT INTO Employee VALUES ('$eid', '$tele', '$name', '$email', '$design')";
	
		if(mysqli_query($conn, $sql)) {
			$_SESSION['message'] = "New Employee Registered Successfully";
        	header('Location: M_Task.php');								 
		}
		else {
			echo "Error:".$sql."<br/>".mysqli_error($conn); 
		}
	}

	
	//close connection
	mysqli_close($conn);
	
?>