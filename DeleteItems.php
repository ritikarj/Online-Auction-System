<html>
    <head>
    <link rel="stylesheet" href="style.css"/>

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
        width: 700px;
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
    width: 400px;
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
    width: 400px;
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
    width:500px;

    
  }
  .col{
    float:left;
    width:30%;
    width:400px;
    margin-left:100px;
    
}
.col1
{
    float:left;
    width:60%;
    width:600px;
    margin-left:100px;
}
.row{
    margin-top:60px;
    content: "";
    display: table;
    clear: both;
}
table {
                display: flex;
                flex-direction: column;
                place-items: center;
                background-color: white;
                width: 100%;
                border: 1px ridge black;
}
th , td{
                border: 1px ridge black;
                padding: 10px;
                
            }
            </style>
    </head>
<body>
    <h3  class="login-title">Items added by this user<h3>
<?php
require('db.php');
session_start();

    $con = mysqli_connect("localhost","root","","auction");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query1 = "SELECT ItemName FROM auction WHERE Owner= '".$_SESSION['username']."' " ;
    $result1 = mysqli_query($con, $query1);
    while($row1=mysqli_fetch_assoc($result1))
    {   $values1[] = array(
        'Itemname'=> $row1['ItemName']
    );
    }
        foreach($values1 as $v1){
      echo'<center><div class="success"> '.$v1['Itemname'].'</div></center>';
        }
        
        

        if(isset($_POST['submit']))
        {
            $item=mysqli_real_escape_string($con, $_POST['Item']);
            $sql= "DELETE FROM auction WHERE ItemName= '$item'";
            if(mysqli_query($con, $sql))
            {
                echo'<div class="success" style="margin-left=400px;">Successfully deleted the record!</div>';
            }
        }
        ?>
        <form class="form" method="POST">
        <h1 class="login-title">Delete Item</h1>
        <center><input type="text" class="login-input" name="Item" placeholder="Item to delete" required />
        <input type="submit" value="Delete" name="submit" class="login-button"/></center>
        <p class='link'>Click here to <a href='changepassword.php'>Change Password</a><br>Click here to 
        <a href='resetpassword.php'>Reset Password</a><br><a href='logout.php'>Log Out</a></p></div>
    </body>
</html>