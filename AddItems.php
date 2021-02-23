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
    margin-left: 20px;
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
        </style>
</head>
<body>
<div class="row">
<div class="col1">
<form class="form" action="" method="post">
<h3>Add your own items!</h3>
<input type="text" class="login-input" name="Owner" placeholder="Owner(same as username)" required />
<input type="text" class="login-input" name="ItemName" placeholder="Enter Item Name" required />
<input type="text" class="login-input" name="Description" placeholder="Description">
<input type="Date" class="login-input" name="ClosingDate" placeholder="Closing Date(yyyy-mm-dd)">
<input type="Number" class="login-input" name="Amount" placeholder="Amount">
<input type="text" class="login-input" name="Bidamount" placeholder="Bid Amount">
<input type="text" class="login-input" name="Biddername" placeholder="Name">
<input type="submit" value="Submit" name="submit" class="login-button"/>
</form>
</div>
<div class="col">
<h3>To delete items: <br><a href="DeleteItems.php">Delete Items</a></h3>

<h3>To bid for items: <br><a href="BidItems.php">Bid for Items</a></h3>

</div>
</div>
<?php

$con = mysqli_connect("localhost","root","","auction");

// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
    if (isset($_POST['submit'])) {
    $owner = mysqli_real_escape_string($con, $_POST['Owner']);
    $item = mysqli_real_escape_string($con, $_POST['ItemName']);
    $des = mysqli_real_escape_string($con, $_POST['Description']);
    $amount = mysqli_real_escape_string($con, $_POST['Amount']);
    $date = mysqli_real_escape_string($con, $_POST['ClosingDate']);
    $bid = mysqli_real_escape_string($con, $_POST['Bidamount']);
    $name = mysqli_real_escape_string($con, $_POST['Biddername']);
    
    $query    = "INSERT into `auction` (Owner, ItemName, Description, Amount, Closingdate, BidAmount, BidderName) VALUES ('$owner', '$item', '$des', '$amount', '$date','$bid','$name')";
    $result   = mysqli_query($con, $query);
        if ($result) {
            echo "
               <div class='success' ><h3>Successfully added an item.</h3><br/></div>";
    $_SESSION[' Owner'] = $owner;
    $_SESSION['success'] = "Succesfully added an item!";
        }
}
    ?>
</body>
<html>
