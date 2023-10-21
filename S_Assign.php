<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	$ename = $_POST['ename_list'];
	$tname = $_POST['tname_list'];
	$activity = $_POST['activity_list'];
	$d_assign = $_POST['date_assign'];
	$remark = $_POST['remarks'];
	
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$get_eid = "SELECT eid FROM Employee WHERE name='$ename'";
	$eid_result_array = mysqli_query($conn, $get_eid);
	$eid_result = mysqli_fetch_array($eid_result_array);
	$eid = $eid_result['eid'];

	$get_tid = "SELECT tid FROM Task WHERE tname='$tname'";
	$tid_result_array = mysqli_query($conn, $get_tid);
	$tid_result = mysqli_fetch_array($tid_result_array);
	$tid = $tid_result['tid'];

	$get_activityid = "SELECT activityid FROM taskactivites WHERE activity='$activity'";
	$activityid_result_array = mysqli_query($conn, $get_activityid);
	$activityid_result = mysqli_fetch_array($activityid_result_array);
	$activityid = $activityid_result['activityid'];
	
	
	$sql = "INSERT INTO assign VALUES ('', '$eid', '$tid', '$activityid', '$d_assign', '$remark')";

    if(mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "New Task Assigned to Employee Successfully";
        header('Location: S_Report.php');	
	}
	else {
		echo "Error:".$sql."<br/>".mysqli_error($conn); 
	}
	
	//close connection
	mysqli_close($conn);
	
?>