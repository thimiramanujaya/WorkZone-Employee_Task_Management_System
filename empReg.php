<?php 

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
	
	
	$sql = "INSERT INTO Employee VALUES ('$eid', '$tele', '$name', '$email', '$design')";
	
	if(mysqli_query($conn, $sql)) {
		echo "New Employee Registered sucessfully";
		echo "<a href='Employee.html' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Register another Employee &#8594</a>";
		echo "<a href='Task.html' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Next &#8594</a>";
		echo "<a href='Home.html' style='text-decoration: none; 
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