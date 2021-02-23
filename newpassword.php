<html>
<head>
</head>
<body>
<?php
session_start();
include("db.php");
if(isset($_POST['Submit']))
{
    $newpassword=md5($_POST['npwd']);
    $username=$_SESSION['username'];
    $sql=mysqli_query($db,"SELECT password FROM users where  username='$username'");
        $num=mysqli_num_rows($sql);
        if($num==1)
        {
        $db=mysqli_query($db,"update users set password=' $newpassword' where username='$username'");
        $_SESSION['msg1']="Password Changed Successfully !!";
        }
        }
        ?>
    <p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
    <form name="chngpwd" action="" method="post" onSubmit="return valid();">
    <table align="center">
    <tr height="50">
    <td>New Passoword :</td>
    <td><input type="password" name="npwd" id="npwd"></td>
    </tr>
    <tr height="50">
    <td>Confirm Password :</td>
    <td><input type="password" name="cpwd" id="cpwd"></td>
    </tr>
    <td><input type="submit" name="Submit" value="Change Passowrd" /></td>
    </tr>
    </table>
    </form>
    <script >
        function valid()
        {
        
         if(document.chngpwd.npwd.value=="")
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