<?php session_start();
error_reporting(0);
?>
<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>  
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
table {
    border-collapse: collapse;
    width:95%;
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
    <title>History-Transfer Funds</title>
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
<div class="col-xs-3">
<h4>Account Number:</h4>
<input type="text" class="form-control" value="<?php  echo $_SESSION["acNo"]; ?>" disabled>
</div>
<div class="col-xs-3">
<h4>Account Holder Name:</h4>
<input type="text" class="form-control" value="<?php  echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>" disabled>
</div>


<br><br><br><br><br>
<h3>Below are the details of transferred funds to beneficiaries:</h3>
<table>
<tr>
<td>Date</td>
<td>Beneficiary A/C No</td>
<td>Beneficiary Name</td>
<td>Amount transfered(Rs.)</td>
<td>Status</td>
</tr>
<?php 
$mess="";
$acno=$_SESSION["acNo"];
$sql="SELECT * FROM transferfunds where remacno='$acno' AND type1='real' ";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          echo "<tr><td>". $row["date1"]."</td><td>".$row["benacno"]."</td><td>".$row["benacname"]."</td><td>".$row["amount"]."</td><td>".$row["status1"];
        }
        echo "</table>";
    }
    else
    {
        echo "<h2 style=\"color:red\">No funds has been transferred yet!!</h2>";
    }

}          
else
{
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>        
