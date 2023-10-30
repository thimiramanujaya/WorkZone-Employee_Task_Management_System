<?php 

    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$ename = mysqli_real_escape_string($conn, $_POST['ename_list']);
	$tname = mysqli_real_escape_string($conn, $_POST['tname_list']);
	$activity = mysqli_real_escape_string($conn, $_POST['activity_list']);
	$d_assign = mysqli_real_escape_string($conn, $_POST['date_assign']);
	$remark = mysqli_real_escape_string($conn, $_POST['remarks']);
	


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
        header('Location: M_Report.php');	
	}
	else {
		echo "Error:".$sql."<br/>".mysqli_error($conn); 
	}
	
	//close connection
	mysqli_close($conn);
	
?>