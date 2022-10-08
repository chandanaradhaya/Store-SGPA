<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>LOGIN</title>
    <link rel="stylesheet" href="style1.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<br><br><br><br><br><br><div class='form'><br><br><br>
                  <h1><center>Incorrect Username or Password</center></h1><br><br><br>
                  <p class='link'><center>Click here to <a href='login.php'>Login</a> again</center></p><br><br><br><br><br><br><br><br><br><br><br><br>
                  </div>";
        }
    } else {
?>
    <div class="header">
  	<h2>LOGIN</h2>
  </div>
	 
  <form class="form" method="post" name="login">
  	
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" class="login-input" name="password" placeholder="Password"/>
  	</div>
  	<div class="login_button">
      <input type="submit" value="Login" name="submit" class="btn"/>
  	</div>
  	<p class="c">
        <br>
      <p class="link"><a href="registration.php">New Registration</a></p>
  	</p>
  </form>
  <br><br><br>
  <br>
  <marquee behavior="style" direction="right" style="color:aquamarine;font-size:30px">WELCOME TO LOGIN PAGE</marquee><br><br>
</body>
</html>
<?php
    }
?>
</body>
</html>