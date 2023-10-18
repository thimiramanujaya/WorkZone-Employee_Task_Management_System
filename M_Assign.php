<?php 

    session_start();

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
		$_SESSION['message'] = "New Task Assigned to Employee Successfully";
        header('Location: M_Report.php');	
	}
	else {
		echo "Error:".$sql."<br/>".mysqli_error($conn); 
	}
	
	//close connection
	mysqli_close($conn);
	
?>