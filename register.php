<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style type="text/css">
            body{
                background-color: rgba(0,136,169,0.05);
                color: #24252A;
            }
            header{
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                background-color: #24252A;
            }
            header{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 30px 10%;
                }
            .nav__links{
                list-style:none;
                text-decoration:none;
            }

            .nav__links li{
                display: inline-block;
                padding: 0 20px;
            }

            .nav__links li {
                list-style:none;
                text-decoration:none;
                color: aliceblue;
                transition: all 0.3s ease 0s;

            }

            .nav__links li :hover{
                color: #0088a9;
            }
            button{
                padding: 9px 25px;
                background-color: rgba(0,136,169,1);
                border: none;
                border-radius: 50px;
                cursor: pointer;
                transition: all 0.3s ease 0s;
            }
            
            button:hover{
                background-color: rgba(0,136,169,0.8);
            }
            *{
                font-family: "Montserrat", sans-serif;
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
    margin-left: 500px;
    width:500px;
  }
        </style>
</head>
<body>
<?php
    session_start();
    require('db.php');
    $username = "";
    $email    = "";
    $errors = array(); 
    if (isset($_POST['submit'])) {

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password']);
      $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
      
      if (empty($username)) { array_push($errors, "Username is required"); }
      if (preg_match('/[^a-z_\-0-9]/i', $username)) { array_push($errors, "Only alphabets and numbers allowed in username"); }
      if (empty($email)) { array_push($errors, "Email is required"); }
      if (empty($password_1)) { array_push($errors, "Password is required"); }
      if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password_1)) { array_push($errors, "Special character not allowed"); }
      if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
      }
    
      
      $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      $create_datetime = date("Y-m-d H:i:s");
      
      if ($user) { 
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
    
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
      }
    
      if (count($errors) == 0) {
    
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password_1) . "', '$email', '$create_datetime')";
        $password=md5($password_1);
        $result   = mysqli_query($db, $query);
        if ($result) {
            echo "<div class='success'>
              <center>  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p></div></center>";
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
        }
      }
    }
?>
    <form class="form" action="" method="post">
    <?php include('errors.php'); ?>
        <h1 class="login-title">Registration</h1>
        <label>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="password" class="login-input" name="password_2" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p>Already a member? <a href="login.php">Sign in</a></p>
        <div class="error">By Ritika Raj 18BCE2246</div>
    </form>

</body>
</html>