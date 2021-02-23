<html>
    <head>
    <title>Change Password</title>
    </head>
    <body>
    <?php
        session_start();
        include("db.php");
        if(isset($_POST['Submit']))
        {
        $oldpass=md5($_POST['opwd']);
        $username=$_SESSION['username'];
        $newpassword=md5($_POST['npwd']);
        $sql=mysqli_query($db,"SELECT password FROM users where password='$oldpass' && username='$username'");
        $num=mysqli_num_rows($sql);
        if($num==1)
        {
        $db=mysqli_query($db,"update users set password=' $newpassword' where username='$username'");
        $_SESSION['msg1']="Password Changed Successfully !!";
        }
        else
        {
        $_SESSION['msg1']="Old Password not match !!";
        }
        }
    ?>
    <p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
    <form name="chngpwd" action="" method="post" onSubmit="return valid();">
    <table align="center">
    <tr height="50">
    <td>Old Password :</td>
    <td><input type="password" name="opwd" id="opwd"></td>
    </tr>
    <tr height="50">
    <td>New Passoword :</td>
    <td><input type="password" name="npwd" id="npwd"></td>
    </tr>
    <tr height="50">
    <td>Confirm Password :</td>
    <td><input type="password" name="cpwd" id="cpwd"></td>
    </tr>
    <tr>
    <td><a href="index.php">Back to login Page</a></td>
    <td><input type="submit" name="Submit" value="Change Passowrd" /></td>
    </tr>
    </table>
    </form>
    <script >
        function valid()
        {
        if(document.chngpwd.opwd.value=="")
        {
        alert("Old Password Filed is Empty !!");
        document.chngpwd.opwd.focus();
        return false;
        }
        else if(document.chngpwd.npwd.value=="")
        {
        alert("New Password Filed is Empty !!");
        document.chngpwd.npwd.focus();
        return false;
        }
        else if(document.chngpwd.cpwd.value=="")
        {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.cpwd.focus();
        return false;
        }
        else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cpwd.focus();
        return false;
        }
        return true;
        }
    </script>
    </body>
</html>