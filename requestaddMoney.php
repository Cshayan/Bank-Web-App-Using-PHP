<?php session_start();
error_reporting(0);
?>
<?php include 'connection.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>History Add Money</title>
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
.showben{
    float:right;
    margin-right:10%;
    margin-top:-12%;
    height:100px;
    font-family:cursive;
    overflow:auto;
}
table {
    border-collapse: collapse;
    width:70%;
    height:70%;
    font-size:20px;

}
table,td{    
    border: 1px solid #ddd;
}
td {
    height:90%;
    width:20%;
    text-align:center;

}
tr:hover {background-color: #bdc3c7;}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(even):hover {background-color: #bdc3c7;}

</style>    
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
<li><a href="accountSummary.php">Home</a></li>
<li><a href="addMoney.php">Add Money to your account</a></li>
<li><a href="withdrawMoney.php">Withdraw Money from account</a></li>
<li><a href="transferFunds.php">Transfer Funds</a></li>
<li><a href="transactionRecord.php">Transaction Record</a></li>
</ul>

<div style="margin-left:20%;margin-top:5%;padding:1px 16px;height:100px;">
<p>This page shows the requests made by the user to their bank for adding certain amount of money to their account</p>
<h3>Requests made to the bank for adding money:</h3>
<table>
<tr>
<td>Requested Money</td>
<td>Date</td>
</tr>
<?php
$acno=$_SESSION["acNo"];

$sql="SELECT * FROM duptransaction WHERE remacno='$acno' AND type1='add' ";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
   if(mysqli_num_rows($result) > 0)
   {
      while($row=mysqli_fetch_assoc($result))
      {
          echo "<tr><td>".$row["credit"]."</td><td>".$row["date1"];
      }
      echo "</table>";
   }
   else
   {
    echo "<h2 style=\"color:red\">No requests have been made yet!!</h2>";
   }   
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }




?>
<br>NOTE:This record is shown in this page as the bank has still not approved your request. Once bank approves,
<br>this details won't be shown here.
