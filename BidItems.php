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
<form class="form" action="" method="post">
        <h1 class="login-title">Bid for an Item</h1>
        <label>
        <center><input type="text" class="login-input" name="bidname" placeholder="Bidder Name" required />
        <input type="text" class="login-input" name="name" placeholder="Item Name" required />
        <input type="text" class="login-input" name="bid" placeholder="Bid Amount">
        <input type="submit" name="submit" value="Enter" class="login-button"></center>
        <p class='link'>Click here to <a href='changepassword.php'>Change Password</a><br>Click here to 
        <a href='resetpassword.php'>Reset Password</a><br><a href='logout.php'>Log Out</a></p></div>

</center>
</form>

    <table>
        <h1>Previous Record</h1>
    <tr>
                        
    <th>Item Id</th>
    <th>Item Name</th>
    <th>Owner</th>
    <th>Closing Time</th>
    <th>Amount</th>
    <th>Description</th>
    <th>Bid Amount</th>
    <th>Bidder Name</th>
</tr>

<?php
$con = mysqli_connect("localhost","root","","auction");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $bidname="";
    $itemname="";
    $bid="";
    $bidamount="";
    $biddername="";
    if (isset($_POST['submit'])) {
        $bidname = mysqli_real_escape_string($con, $_POST['bidname']);
        $itemname = mysqli_real_escape_string($con, $_POST['name']);
        $bid = mysqli_real_escape_string($con, $_POST['bid']);
        $query1 = "SELECT * FROM `auction` WHERE ItemName= '$itemname'" ;
        $result = mysqli_query($con, $query1);

while($row=mysqli_fetch_assoc($result))

{
 
 $values[] = array(
    'itemid'=> $row['ItemId'],
    'itemname'=> $row['ItemName'],
    'Owner'=> $row['Owner'],
    'date'=> $row['Closingdate'],
    'amount'=> $row['Amount'],
    'des'=> $row['Description'],
    'bidin'=> $row['BidAmount'],
    'bidname'=> $row['BidderName']
);
}
foreach($values as $v1){
    echo '
    <tr>
        <td>'.$v1['itemid'].'</td>
        <td>'.$v1['itemname'].'</td>
        <td>'.$v1['Owner'].'</td>
        <td>'.$v1['date'].'</td>
        <td>'.$v1['amount'].'</td>
        <td>'.$v1['des'].'</td>
        <td>'.$v1['bidin'].'</td>
        <td>'.$v1['bidname'].'</td>
    </tr>
    ';
    }
 $bidamount=$v1['bidin'];
 if($bid>$bidamount){
    $query="UPDATE auction SET BidAmount='$bid', BidderName='$bidname' WHERE ItemName= '$itemname'" ;
    if(mysqli_query($con,$query)){
        echo "<div class='success'>Congratulations $bidname! You are the highest bidder for the Item $itemname;Record Updated</div>";
    }
}else{
        echo "<div class='error'>Your Bid is not counted for the amount is lower than the highest bid or does not exceed the starting bid<br>Record not updated</div>";
    }
}
?>
<table>
        <h1>Updated Record</h1>
    <tr>
                        
    <th>Item Id</th>
    <th>Item Name</th>
    <th>Owner</th>
    <th>Closing Time</th>
    <th>Amount</th>
    <th>Description</th>
    <th>Bid Amount</th>
    <th>Bidder Name</th>
</tr>
<?php
if (isset($_POST['submit'])) {
$query1 = "SELECT * FROM `auction` WHERE ItemName= '$itemname'" ;
$result = mysqli_query($con, $query1);

while($row=mysqli_fetch_assoc($result))

{

$values[] = array(
'itemid'=> $row['ItemId'],
'itemname'=> $row['ItemName'],
'Owner'=> $row['Owner'],
'date'=> $row['Closingdate'],
'amount'=> $row['Amount'],
'des'=> $row['Description'],
'bidin'=> $row['BidAmount'],
'bidname'=> $row['BidderName']
);
}
foreach($values as $v1){
echo '
<tr>
<td>'.$v1['itemid'].'</td>
<td>'.$v1['itemname'].'</td>
<td>'.$v1['Owner'].'</td>
<td>'.$v1['date'].'</td>
<td>'.$v1['amount'].'</td>
<td>'.$v1['des'].'</td>
<td>'.$v1['bidin'].'</td>
<td>'.$v1['bidname'].'</td>
</tr>
';
}
}
?>
</body>
</html>