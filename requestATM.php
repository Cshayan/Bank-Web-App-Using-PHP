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
.details{
    
    float:right;
    margin-right:10%;
    margin-top:-5%;
    height:100px;
    font-family:cursive;
    background-color:#c7ecee;
    height:130%;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    overflow:auto;
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
<title>Request ATM</title>  
<link rel="shortcut icon" href="logo.ico" />
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
<li><a href="personaldetails.php">Personal Details</a></li>
<li><a href="addBeneficiary.php">Add Beneficiary</a></li>
<li><a href="accountSummary.php">Account Summary</a></li>
<li><a href="transactionRecord.php">Transaction Record</a></li>
<li><a href="requestATM.php">Request ATM Card</a></li>
</ul>


<div style="margin-left:20%;margin-top:5%;padding:1px 16px;height:100px;">
<h3>Here the user can request ATM card from the bank for one time only.<h3>
<h4>Once the request is made, the user has to wait for the confirmation from the bank. If the bank approves the 
request, the user can collect the ATM card from their respective branch</h4>

<h3>Check the current status for the issue of ATM card: </h3>
<table>
<tr>
<td>A/C No.</td>
<td>Name</td>
<td>Status of ATM Card</td>
</tr>

<?php 
$acno=$_SESSION["acNo"];
$sel="SELECT * FROM atmrequest WHERE remacno='$acno' ";
$result = mysqli_query($conn, $sel);
if(mysqli_num_rows($result) > 0)
{
    while($row=mysqli_fetch_assoc($result))
    {
      echo "<tr><td>".$row["remacno"]."</td><td>".$row["name1"]."</td><td>".$row["status1"];
    }
    echo "</table>";
}
else
{
     echo "Error: " . $sel . "<br>" . mysqli_error($conn);
}
?>


<?php 
$mess1="";
if(isset($_POST["atm"]))
{
    // at first checking the current status of atm card
   $sql1="SELECT status1 FROM atmrequest WHERE remacno='$acno' ";
   $result = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result) > 0)
  {
    while($row=mysqli_fetch_assoc($result))
    {
         $sta=$row["status1"];
    }     
  }
else
{
     echo "Error1: " . $sql1 . "<br>" . mysqli_error($conn);
}

//if the user has not requested
  if($sta=="Not Requested Yet")
  {
      $upd="UPDATE atmrequest SET status1='Request Pending' WHERE remacno='$acno' ";
      if (mysqli_query($conn, $upd))
       {
          echo '<script type="text/javascript">';
          echo 'window.location.href="requestATM.php";';
          echo '</script>';
       } 
    else
    {
        echo "Error updating record: " . mysqli_error($conn);
    }
  }
  if($sta=="Request Pending")
  {
      $mess1="You have already requested for an ATM card. Wait for the confirmation from the bank for your  
      request to approve. Check the 'Status' Column of the table!";
  }
  if($sta=="Request Approved")
  {
      $mess1="Your request for ATM card has already been approved successfully!!Reach out to your branch
      to collect the ATM card. Check the 'Status' Column of the table!";
  }
}

?>
<?php
$mess2="";
 $sql1="SELECT status1 FROM atmrequest WHERE remacno='$acno' ";
   $result = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result) > 0)
  {
    while($row=mysqli_fetch_assoc($result))
    {
         $sta=$row["status1"];
    }     
  }
else
{
     echo "Error1: " . $sql1 . "<br>" . mysqli_error($conn);
}
if($sta=="Request Pending")
{
    $mess2="Your request for the ATM card has been sent to the bank.";
}
?>

<br><br><br>
<h4>If you haven't requested your ATM card yet, click the 'Request ATM' button below</h4>
<div class="col-xs-3">
<form method="POST" >
<input type="submit" name="atm" value="Request ATM" onclick="return confirm('Are you sure, you want to request ATM card?');" class="btn btn-success">
</form>
</div>
<br><br>
<h4 style="color:green; background-color:lightblue;"><?php echo $mess1; $mess2; ?></h4>
