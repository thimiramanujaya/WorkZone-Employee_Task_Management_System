<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">

	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Employee</title>
        <link text="stylesheet" rel="stylesheet" href="form-style.css">
        <link text="stylesheet" rel="stylesheet" href="dashboard-style.css">
		
        <script>
            function closeAlert() {
                document.getElementById('alert').style.display = 'none';
            }

            var opt_link = document.getElementsByClassName("opt_link");
            currentVal = 1;

            function activeOption() {
                for(p of opt_link) {
                    p.classList.remove("active_option");
                }
                event.target.classList.add("active_option");
                currentVal = event.target.value;
            }
        </script>
	</head>

	
	<body>
		
		<div class="page_container">
            <div class="sidebar_container">
                <a href="Manager_Dashboard.php">
                    <div class="logo_container">
                        <img src="res/logo.jpg"/>
                        <h1>WorkZone</h1>
                    </div>
                </a>
                <div class="optionlist_container">
                    <span>Preferences</span>
                    <a href="M_Employee.php" class="opt_link active_option" value="1" onclick="activeOption()">Register New Employee</a>
                    <a href="M_Task.php" class="opt_link" value="2" onclick="activeOption()">Insert New Task</a>
                    <a href="M_Activity.php" class="opt_link" value="3" onclick="activeOption()">Insert New Activity</a>
                    <a href="M_AssignIndex.php" class="opt_link" value="4" onclick="activeOption()">Assign New Task to Employee</a>
                    <a href="M_Report.php" class="opt_link" value="5" onclick="activeOption()">Show Detailed Report</a>
                    <a href="Logout.php" class="opt_link" value="6" onclick="activeOption()">Logout</a>
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
                    <form action="M_empReg.php" method="post"> 
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