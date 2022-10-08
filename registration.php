<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style1.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<br><br><div class='form'><br><br><br><br><br><br><br><br>
                  <h1><center>You Are Registered Successfully</center></h1><br><br>
                  <p class='link'><center>Click here to <a href='login.php'>Login</a></center></p><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing ?</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
    <div class="header">
        <h1 class="login-title"><center>REGISTER</center</h1>
        </div>
        <div class="input-group">
        <label>Username</label>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        </div>
        <div class="input-group">
        <label>Email</label>
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        </div>
        <div class="input-group">
        <label>Password</label>
        <input type="password" class="login-input" name="password" placeholder="Password">
        </div>
        <div class="login_button">
        <input type="submit" name="submit" value="Register" class="btn">
        </div>
        <div class="sb">
            <br>
        <p class="link"><a href="login.php">Click to Login</a></p>
    </div>
    </form>
	<br>
<?php
    }
?>
</body>
</html>