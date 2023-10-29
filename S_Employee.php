<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">

	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Employee</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
        <link text="stylesheet" rel="stylesheet" href="dashboard-style.css">
	</head>

    <script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
        }
    </script>
	
	<body>
		
		<div class="page_container">
            <div class="sidebar_container">
                <a href="Supervisor_Dashboard.php">
                    <div class="logo_container">
                        <img src="res/logo.jpg"/>
                        <h1>WorkZone</h1>
                    </div>
                </a>
                <div class="optionlist_container">
                    <span>Preferences</span>
                    <a href="S_Employee.php">Register New Employee</a>
                    <a href="S_Activity.php">Insert New Activity</a>
                    <a href="S_AssignIndex.php">Assign New Task to Employee</a>
                    <a href="S_Report.php">Show Detailed Report</a>
                    <a href="Logout.php">Logout</a>
                </div>
            </div>

            <div class="form_container">
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
                <div class="form_box">
                    <form action="S_empReg.php" method="post"> 
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
			
		</div>
	</body>

</html>