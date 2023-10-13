<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	
	
	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "INSERT INTO taskactivites(activityid, tid, activity) SELECT temp_activityid, temp_tid, temp_activity FROM temp_taskactivites";

    	if(mysqli_query($conn, $sql)) {
			echo "New Activities Recordeded sucessfully";
			echo "<a href='Activity.php' style='text-decoration: none; 
										 background: linear-gradient(135deg, #155799, #159957 );
										 border-radius: 3px;
										 cursor: pointer;
										 margin: 5px;
										 padding: 5px;
										 color: azure;'>Insert another Activity &#8594</a>";
			echo "<a href='assignIndex.php' style='text-decoration: none; 
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