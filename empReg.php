<?php 

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
	
	
	$sql = "INSERT INTO Employee VALUES ('$eid', '$tele', '$name', '$email', '$design')";
	
	if(mysqli_query($conn, $sql)) {
		echo "New Employee Registered sucessfully";
		echo "<a href='E_Employee.html' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Register another Employee &#8594</a>";
		echo "<a href='E_Report.php' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Next &#8594</a>";
		echo "<a href='Employee_Dashboard.php' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Home</a>";									 
	}
	else {
		echo "Error:".$sql."<br/>".mysqli_error($conn); 
	}
	
	//close connection
	mysqli_close($conn);
	
?>