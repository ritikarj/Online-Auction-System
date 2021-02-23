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
.col{
    float:left;
    width:40%;
    width:500px;
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
<?php
 require('db.php');
 session_start();
$query = "SELECT username,create_datetime FROM users" ;
$result = mysqli_query($db, $query);

while($row=mysqli_fetch_assoc($result))

{
 
 $values[] = array(
    'username'=> $row['username'],
    'create_datetime'=> $row['create_datetime'],
);
}
?>
</div> 
<center><h3 style="margin-top:30px;">To add items:<br><a href="AddItems.php">Add Items</a></h3>

<h3>To delete items:<br><a href="DeleteItems.php">Delete Items</a></h3>

<h3>To bid for items:<br><a href="BidItems.php">Bid for Items</a></h3>
<p class='link'>Click here to <a href='changepassword.php'>Change Password</a><br>Click here to 
<a href='resetpassword.php'>Reset Password</a><br><a href='logout.php'>Log Out</a></p></div>

</center>
<div class="row">
    <div class="col">
        <h3>List of users</h3>
        <table>
        <tr>
                            <th>Username</th>
                            <th>Date and time</th>
                        </tr>
        <?php
        foreach($values as $v){
        echo '
        <tr>
            <td>'.$v['username'].'</td>
            <td>'.$v['create_datetime'].'</td>
        </tr>
        ';
        }
        ?>
        </table>
    </div>
    <div class="col">
    <h3>List of Items</h3>
    <table>
    <tr>
                        <th>Item Name</th>
                        <th>Closing Time</th>
                        <th>Bid Amount</th>
                    </tr>
    <?php
    $con = mysqli_connect("localhost","root","","auction");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query1 = "SELECT ItemName,Amount, Closingdate FROM auction" ;
    $result1 = mysqli_query($con, $query1);

    while($row1=mysqli_fetch_assoc($result1))

    {
    
    $values1[] = array(
        'Itemname'=> $row1['ItemName'],
        'Closingdate'=> $row1['Closingdate'],
        'Amount'=> $row1['Amount'],
    );
    }
    foreach($values1 as $v1){
    echo '
    <tr>
        <td>'.$v1['Itemname'].'</td>
        <td>'.$v1['Closingdate'].'</td>
        <td>'.$v1['Amount'].'</td>
    </tr>
    ';
    }
    ?>
    </div>
</div>


</body>
</html>