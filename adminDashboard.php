<?php session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>  
    <style>

    #sidenav{
    list-style-type: none;
    padding:0px;
    margin:0px;
    background-color:#2ecc71;
    width:120px;
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
}
.details{
    background-color:#c7ecee;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    width:70%;
   
}
#p1{
    background-color: black;
    color:white;
    text-align: center;
    width:90%;
    padding:10px;
    margin-top:17%;
}

    </style>
    <title>Admin</title>
    <link rel="shortcut icon" href="logo.ico" />
   <meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
     <li><a href="adminDashboard.php"><?php echo  $_SESSION["email"]; ?></a></li>
   </ul>
  
</nav>
<ul id="sidenav">
<li><a href="adminDashboard.php">Home</a></li>
<li><a href="adminuserdetails.php">Registered Users</a></li>
<li><a href="adminAddMoney.php">Approve Money to User Account</a></li>
<li><a href="adminWithMoney.php">Approve Withdrawal of Money</a></li>
<li><a href="adminTransfer.php">Approve Transfer of Funds</a></li>
<li><a href="adminATMapprove.php">ATM Card Requests</a></li>
</ul>

<div style="margin-left:17%;margin-top:5%;padding:1px 16px;height:100px;">
<h3>Welcome, Admin!!</h3>
<p>Admin is the one who has the control over every user registering for the online bank application.
    <br>The things that the admin can do:
    <ul class="details">
      <li>Admin can view the details of all the registered users</li>
      <li>Admin can block any user if he/she is found to violate any laws.</li>
      <li>Admin can unblock any user if required upon the request of the customer.</li>
      <li>Admin can approve the request to the users who want to add money to their account.</li>
      <li>Admin can approve the request to the users who want to withdraw money from their account</li>
      <li>Admin can also give permission for the approval of transfer of funds by their users.</li>
      <li>Admin has the right to give the users their ATM cards</li>
    </ul>  
    <br>
<p id="p1"> &copy;onlinebankingsystem2018</p>
</div>  