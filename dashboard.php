<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form"><br><br>
        <h1><center>WELCOME, <?php echo $_SESSION['username']; ?>!</center></h1><br><br>
        <h1><center>You Have Succesfully Logged-In........</center></h1><br><br>
        <h2><center><a href="form.html">Click Here To Enter The SGPA</a></center></h2><br><br>
        <h2><center><a href="logout.php">Logout</a></center></h2><br>
        <br><br><br><br><br><br><br><br><br><br><br>
    </div>
</body>
</html>