<!DOCTYPE html>

<?php 
    session_start();

    if(isset($_SESSION['auth'])) {
        $_SESSION['message'] = "You are already logged In";
        header('Location: Employee_Dashboard.php');
        exit();
    }
 ?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login-WorkZone</title>
        <link rel="stylesheet" href="login-style.css">
        
        <script>
            function closeAlert() {
                document.getElementById('alert').style.display = 'none';
            }
        </script>
    </head>

    <body>
        <div class="page_container">
            <?php 
            if(isset($_SESSION['message'])) {
                ?>
                <div class="alert_box" id="alert">
                    <h4><?= $_SESSION['message']; ?></h4>
                    <button type="button"><img src="res/close_icon.png" width="20px" height="20px" onclick="closeAlert()"/></button>
                </div>

                <?php
                unset($_SESSION['message']);
            }
            ?>
            <div class="box_container">
                <div class="left_box">
                    <div class="logo_container">
                        <img src="res/logo.jpg"/>
                        <h1>WorkZone</h1>
                    </div>
                    <h3>Employee Task Management System</h3>
                </div>
                <div class="right_box">
                    <form action="auth_login.php" method="post">
                        <table>
                            <tr>
                                <td align="center" colspan="2"><h1>Login</h1></td>
                            </tr>
                            <tr>
                                <td><label for="uname" class="text_label">Username</label></td>
                                <td><input type="text" id="uname" name="username" placeholder="John" required/></td>
                            </tr>
                            <tr>
                                <td><label for="pwd" class="text_label">Password</label></td>
                                <td><input type="password" id="pwd" name="password" required/></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2"><input type="submit" value="Login" class="button" name="login_submit"/></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input type="checkbox" name="login_check"/>
                                    <label>Remember Me</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2"><p>Don't have an account?</p><a href="Signup.php">Sign up</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    
    </body>
</html>