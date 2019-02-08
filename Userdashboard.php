<?php session_start();
error_reporting(0);


include 'connection.php';

$conn=mysqli_connect($servername,$username,$pd,$dbname);

if(!$conn)
{
    die ("Connection failed".mysqli_connect_error());
}
 
   
   $check=$_SESSION["email"];

   $sql="SELECT * FROM dtbase WHERE email='$check'";
   $result=mysqli_query($conn,$sql);
   
   $row=mysqli_fetch_assoc($result);
   $_SESSION["fname"]= $row["firstname"];
   $_SESSION["lname"]= $row["lastname"];
   $_SESSION["acNo"]=$row["acNo"];
   $_SESSION["gender"]= $row["gender"];
   $_SESSION["country"]= $row["country"];
   $_SESSION["dob"]=$row["dob"];


?>
<!DOCTYPE html>
<html lang="en">
<head>  
<title>Welcome, User</title>
<link rel="shortcut icon" href="logo.ico" />
   <meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="styleUserDashBoard.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-expand-md navbar-inverse">
   
   <div class="navbar-header">
     <a class="navbar-brand " href="homepage.php" ><img src="home.png" height="20px" width="20px"></a>
     <a class="navbar-brand " href="homepage.php">MyBank</a>
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
<li><a href="personaldetails.php">Personal Details</a></li>
<li><a href="addBeneficiary.php">Add Beneficiary</a></li>
<li><a href="accountSummary.php">Account Summary</a></li>
<li><a href="transactionRecord.php">Transaction Record</a></li>
<li><a href="requestATM.php">Request ATM Card</a></li>
</ul>
<div style="margin-left:10%;padding:1px 16px;height:100px;">
<h3>Welcome!!<?php echo  $_SESSION["fname"]." ".$_SESSION["lname"];?></h3>
<p>
    This is your personalised online bank account.<br><br>
    Here's the thing that you can do from this account:
<ul class="details">
        <li>The user can view the personal details and can update his/her email or password if required.</li>
        <li>The user can check the record of transactions made through his/her account.</li>
        <li>The user can request the bank for adding money to their account</li>
        <li>The user can request the bank for withdrawing money from their account</li>
        <li>The user can add required beneficiary names in his/her bank account</li>
        <li>The user can transfer funds from his bank account to that of the beneficiaries.</li>
        <li>The user can request an ATM card from the bank for once.</li>
</ul>
<br>
All these features are available in online banking and all these can be maintained through your bank account.
All you need to do is to press the links given on the left and explore it!!<br><br><br><br><br><br>
<div style="font-size:20px"><center>Thank you for choosing our bank. We will do our best in service.</center></div>
</p>
<br>
<p id="p1"> &copy;onlinebankingsystem2018</p>
</div>



