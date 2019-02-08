<?php session_start();
error_reporting(0);
?>

<?php include 'connection.php'; ?>

<?php 
$acno=$_SESSION["acNo"];
$sel="SELECT * FROM dtbase WHERE acNo='$acno' ";
$result = mysqli_query($conn, $sel);
if(mysqli_num_rows($result) > 0)
  {
    while($row=mysqli_fetch_assoc($result))
    { 
         $fname=$row["firstname"];
         $lname=$row["lastname"];
         $email=$row["email"];
         $ac=$row["acNo"];
         $dob=$row["dob"];
         $country=$row["country"];
         $gender=$row["gender"];
    }
  }
 else
  {
       echo "Error1: " . $sel . "<br>" . mysqli_error($conn);
  }



?>

<!DOCTYPE html>
<head>
<title>Personal Details</title>
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
table {
    border-collapse: collapse;
    width: 70%;
}

table,td,th{    
    border: 1px solid #ddd;
}
td {
    height:70px;
    width:40%;
    text-align:center;

}
th {
    height:70px;
    width:40%;
    text-align:center;

}
tr:hover {background-color: #bdc3c7;}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(even):hover {background-color: #bdc3c7;}
.showben{
    margin-left:14%;
    margin-top:7%;
    height:100px;
    overflow:auto;
}
.showben a:visited, .showben a:link{
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius:10px 10px 10px 10px;
}
.showben a:hover{
    text-decoration:none;
    color:white;
    background-color: red;
    border-radius:10px 10px 10px 10px;
}
#showben1{
    margin-left:45%;
    margin-top:-10%;
    height:100px;
    overflow:auto;
}
#showben1 a:visited, #showben1 a:link{
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius:10px 10px 10px 10px;
}
#showben1 a:hover{
    text-decoration:none;
    color:white;
    background-color: red;
    border-radius:10px 10px 10px 10px;
}


 </style>
<meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
     <li><a href="Userdashboard.php"><?php echo  $_SESSION["fname"]." ".$_SESSION["lname"] ;?></a></li>
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

<div style="margin-left:20%;padding:1px 16px;height:100px;">
<h3>Personal Details:-</h3>
  <h5>Check here all the details carefully. For any discrepancies in your details, kindly contact your bank.<br>
  <b style="color:green;">You can also change your email-id and password if required from here.</b></h5>
<table>
<tr>
    <td><b>First Name:</b></th>
    <td><?php echo $fname; ?></td>
</tr>    
<tr>
    <td><b>Last Name:</b></th>
    <td><?php echo $lname; ?></td>
</tr>
<tr>
    <td><b>A/C No:</b></th>
    <td><?php echo $ac; ?></td>
</tr>  
<tr>
    <td><b>Registered Email-ID:</b></th>
    <td><?php echo $email; ?></td>
</tr>    
<tr>
    <td><b>Date of Birth:</b></th>
    <td><?php echo $dob; ?></td>
</tr>    
<tr>
    <td><b>Gender:</b></th>
    <td><?php echo $gender; ?></td>
</tr>    
<tr>
    <td><b>Country:</b></th>
    <td><?php echo $country; ?></td>
</tr>    
</table>  

<div class="showben">
<a href="updateMail.php">Update Email</a>
</div>
<div id="showben1">
<a href="updatePassword.php">Update Password</a>
</div>
</div>



