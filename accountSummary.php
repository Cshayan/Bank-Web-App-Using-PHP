<?php session_start();
error_reporting(0);
?>

<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="logo.ico" />
    <style>
       #sidenav{
    list-style-type: none;
    padding:0px;
    margin:0px;
    background-color:#2ecc71;
    width:100px;
    height:90%;
    position:fixed;
    margin-top:-20px;
}
#sidenav li a{
    text-decoration: none;
    color:white;
    display:block;
    padding:20px 20px;
}
li a:hover{
    background-color: #1abc9c;
    color:white;
    font-family: cursive;
}
.details{
    background-color:#c7ecee;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    width:70%;
   
}

</style>  
<title>Account Summary</title>  
   <meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-expand-md navbar-inverse">
   
   <div class="navbar-header">
     <a class="navbar-brand" href="homepage.php" ><img src="home.png" height="20px" width="20px"></a>
     <a class="navbar-brand" href="homepage.php">MyBank</a>
   </div>

   <ul class="nav navbar-nav">
     <li class="nav-item">
     <a class="nav-link" href="features.php">Features</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="about.php">About</a>
     </li>
    <li class="nav-item">
       <a class="nav-link" href="contact.php">Contact Us</a>
    </li>
   </ul>
   <ul class="nav navbar-nav navbar-right">
     <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
   </ul>
   <ul class="nav navbar-nav navbar-right">
     <li><a href="Userdashboard.php"><?php echo  $_SESSION["fname"]." ".$_SESSION["lname"];?></a></li>
   </ul>
  

 </nav>

<ul id="sidenav">
<li><a href="Userdashboard.php">Home</a></li>
<li><a href="addMoney.php">Add Money to your account</a></li>
<li><a href="withdrawMoney.php">Withdraw Money from account</a></li>
<li><a href="transferFunds.php">Transfer Funds</a></li>
<li><a href="transactionRecord.php">Transaction Record</a></li>
</ul>


<div style="margin-left:20%;margin-top:5%;padding:1px 16px;height:100px;">
<h3>Account Summary:</h3>
<p>This is where you can manage all your important things!</p>
<ul class="details">
<li>You can add money to your account</li>
<li>You can withdraw money from your account</li>
<li>You can transfer funds to beneficiaries</li>
<li>You can look at the last 10 transactions made through your account</li>
</ul>
<br><br>

<?php
$acno=$_SESSION["acNo"];
$sql="SELECT * FROM realtransaction WHERE remacno='$acno'";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0)
    {
      while($row=mysqli_fetch_assoc($result))
        {
           $bal=$row["updated"];
        }
    }
}
else{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}  

?>
<h1>Available balance: Rs:<?php echo $bal; ?>/-</h1>