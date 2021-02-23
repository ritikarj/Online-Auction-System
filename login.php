<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>

<link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style type="text/css">
            body{
                background-color: rgba(0,136,169,0.05);
                color: #24252A;
            }
            .form {
        margin: 50px auto;
        width: 400px;
        padding: 30px 25px;
        background: white;
        }
h1.login-title {
    color: #666;
    margin: 0px auto 25px;
    font-size: 30px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    font-size: 20px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 40px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}
h3 {
    font-weight: normal;
    text-align: center;
}
.error {
    width: 92%; 
    margin: 0px auto; 
    padding: 10px; 
    border: 1px solid #a94442; 
    color: #a94442; 
    background: #f2dede; 
    border-radius: 5px; 
    text-align: left;
  }
  .success {
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    margin-bottom: 20px;
  }
        </style>
        </head>
<body>
<?php
    require('db.php');
    session_start();
    $errors = array(); 
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password']);
        if (empty($username)) {
          array_push($errors, "Username is required");
        }
        if (empty($password_1)) {
          array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) {
          $query    = "SELECT * FROM `users` WHERE username='$username' AND  password='" . md5($password_1) . "'";
          $results = mysqli_query($db, $query);
          $rows = mysqli_num_rows($results);
            if ($rows == 1)  {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            echo "<div class='form'>
                 <h3>You are now logged in<br> Welcome $username!</h3><br/>
                </div>";
                header('location: auction.php');
          }else{
            array_push($errors, "Wrong username/password combination");
          }
        }
      }
?>
    <form class="form" method="post" name="submit">
        <?php include('errors.php'); ?>
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register.php">New Registration</a></p></div> <p class='link'>Click here to <a href='changepassword.php'>Change Password</a><br>Click here to 
<a href='resetpassword.php'>Reset Password</a>
  </form>

</body>
</html>