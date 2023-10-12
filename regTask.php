<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	$tid = $_POST['task_id'];
	$tname = $_POST['task_name'];
	$strdate = $_POST['start_date'];
	$enddate = $_POST['end_date'];
	$tnature = $_POST['task_nature'];
	
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	
	$sql = "INSERT INTO Task VALUES ('$tid', '$tname', '$strdate', '$enddate', '$tnature')";

    if(mysqli_query($conn, $sql)) {
		echo "New Task Registered sucessfully";
		echo "<a href='Task.html' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Insert another Task &#8594</a>";
		echo "<a href='Activity.php' style='text-decoration: none; 
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