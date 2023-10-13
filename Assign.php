<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	$eid = $_POST['eid_list'];
	$tid = $_POST['tid_list'];
	$activityid = $_POST['activity_list'];
	$d_assign = $_POST['date_assign'];
	$remark = $_POST['remarks'];
	
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	
	$sql = "INSERT INTO assign VALUES ('', '$eid', '$tid', '$activityid', '$d_assign', '$remark')";

    if(mysqli_query($conn, $sql)) {
		echo "New Task Assigned to Employee sucessfully";
		echo "<a href='assignIndex.php' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Assign New Task &#8594</a>";
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