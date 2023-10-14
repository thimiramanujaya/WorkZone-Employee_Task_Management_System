
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

    $record = "";
    if(isset($_GET['gen_report'])) {
        $query = "SELECT eid, name, tname, activity, dateassign 
                  FROM Employee, Task, taskactivites, assign";

		$query_result = mysqli_query($conn, $query);

		if(mysqli_num_rows($query_result) > 0) {
			while($result = mysqli_fetch_array($query_result)) {
				$record = $record."<tr> <td>{$result['eid']}</td> <td>{$result['name']}</td> <td>{$result['tname']}</td> 
                <td>{$result['activity']}</td> <td>{$result['dateassign']}</td> </tr>";
			}
		}
        else {
            echo '<script>alert("Error: No Sufficient data to create Record")</script>';
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Assigned Activities</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
    </head>

    <body>
        <div class="e_form_container">
            <div class="report_container">
                <h1>Assigned Activities</h1>
                <form method="get">
                    <input type="submit" value="View Assigned Activities" name="gen_report" class="button_box" />
                </form>

                <table>
                    <tr>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Task Assigned</th>
                        <th>Activity</th>
                        <th>Date Assigned</th>
                    </tr>
                    <?php echo $record; ?>
                </table>
            </div>
        </div>
    </body>
</html>