<html>
<head>
</head>
<body>
<?php
session_start();
include("db.php");
if(isset($_POST['submit']))
{
    $username = "";
    $username1 = "";
    $email = "";
    $username=$_POST['username'];
    $email=$_POST['email'];
    $username1=$_SESSION['username'];
    $sql=mysqli_query($db,"SELECT email FROM users WHERE  USERNAME='$username1'");
    $num=mysqli_num_rows($sql);
    if($username === $username1 && $email === $num){}
        echo "You can change the password now.<br>Click here to <a href='newpassword.php'>Enter new Password</a>";}
?>
<form method="POST">
<input type="text" class="login-input" name="username" placeholder="Username" required />
<input type="email" class="login-input" name="email" placeholder="Enter Email">
<input type="submit" value="Submit" name="submit" class="login-button"/>
</form>
</body>
</hhtml>