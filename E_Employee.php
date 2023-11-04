<!DOCTYPE html>

<?php 
	session_start(); 
	
    if(!isset($_SESSION['auth'])) {
        header('Location: Login.php');
    }
?>

<html lang="en">

	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Employee</title>
		<link text="stylesheet" rel="stylesheet" href="form-style.css">

		<script>
			function closeAlert() {
				document.getElementById('alert').style.display = 'none';
			}
    	</script>
	</head>
	
	<body>
		
		<div class="e_form_container">
			<?php 
                    if(isset($_SESSION['message'])) {
                ?>
                        <div class="index_alert_box" id="alert">
                            <h4><?= $_SESSION['message']; ?></h4>
                            <button type="button"><img src="res/close_icon.png" width="20px" height="20px" onclick="closeAlert()"/></button>
                        </div>

                <?php
                        unset($_SESSION['message']);
                    }
            ?>
			<a href="Employee_Dashboard.php"><img src="res/back_arrow.png" width="32px" height="32px"/> Back to Dashboard</a>
			<div class="e_form_box">
				<form action="empReg.php" method="post"> 
					<table align="center" class="input_box">
						<tr>
							<td align="center" colspan="2"><h1>Employee</h1></td>
						</tr>
						<tr>
							<td>1. Eid</td>
							<td><input type="text" id="eid" name="eid" required></td>
						</tr>
						<tr>
							<td>2. Telephone</td>
							<td><input type="number" id="tel" name="telephone"></td>
						</tr>
						<tr>
							<td>3. Name</td>
							<td><input type="text" id="ename" name="name" required></td>
						</tr>
						<tr>
							<td>4. Email</td>
							<td><input type="email" id="eemail" name="email" required></td>
						</tr>
						<tr>
							<td>5. Designation</td>
							<td><input type="text" id="edesgn" name="designation"></td>
						</tr>
						<tr>
							<td align="center" colspan="2">
								<input type="reset" name="reset" value="RESET" class="clear_button_box">
								<input type="submit" name="submit" value="SUBMIT" class="button_box">
							</td>
						</tr>
					</table>
					
					<!--
					<table>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
					</table> -->
				</form>
			</div>
		</div>
	</body>

</html>