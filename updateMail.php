<?php session_start();
error_reporting(0);
?>

<?php include 'connection.php'; ?>

<?php 


if(isset($_POST["update"]))
{

    function test($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
$acno=$_SESSION["acNo"];
$oldmail=$newmail="";
$givemail=test($_POST["oldmail"]);
$newmail=test($_POST["newmail"]);

$sql="SELECT * FROM dtbase WHERE acNo='$acno' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
  {
    while($row=mysqli_fetch_assoc($result))
    { 
         $oldmail=$row["email"];
    }
  }
 else
  {
       echo "Error1: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  if(empty($givemail)||empty($newmail))
  {
      $mess3="All the fields must be filled up!!";
  }
  else if(!filter_var($givemail, FILTER_VALIDATE_EMAIL)||!filter_var($newmail, FILTER_VALIDATE_EMAIL))
  {
      $mess4="Email format is not matching! Please enter correct email id.";
  }
  else{
  //checks if oldmail matching with the given mail
  if($givemail!=$oldmail)
  {
      $mess1="Please enter the correct registered email-id to update the details!";
  }
  else
  {
       $upd="UPDATE dtbase SET email='$newmail' WHERE acNo='$acno' ";
       if (mysqli_query($conn, $upd))
       { 
          $mess2="Your email has been updated successfully!!";
       } 
    else
    {
        echo "Error updating record: " . mysqli_error($conn);
    }
  }
} 


}  
  
   

?>




<!DOCTYPE html>
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
.showben{
    margin-left:70%;
    margin-top:15%;
    height:100px;
    font-family:cursive;
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
    color:black;
    border: 2px solid black;
    background-color: white;
    border-radius:10px 10px 10px 10px;
}


</style>
<title>Update Mail</title>
<link rel="shortcut icon" href="logo.ico" />
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
</head>
<ul id="sidenav">
<li><a href="Userdashboard.php">Home</a></li>
<li><a href="personaldetails.php">Personal Details</a></li>
<li><a href="addBeneficiary.php">Add Beneficiary</a></li>
<li><a href="accountSummary.php">Account Summary</a></li>
<li><a href="transactionRecord.php">Transaction Record</a></li>
<li><a href="requestATM.php">Request ATM Card</a></li>
</ul>

<div style="margin-left:20%;padding:1px 16px;height:100px;margin-top:5%; background-color:rgba(132, 129, 122,0.3);">
<h3>Here you can update your email-id if required.</h3>
<p>Fill up the details below to update your email id:</p>
<form method="POST" class="form-input">
<div class="col-xs-4" style="margin-left:20%;padding:1px 16px;height:100px;font-family:cursive;margin-top:5%;">
<h4 style="color:red"><?php echo $mess1; echo $mess3; echo $mess4; ?></h4>
<h4 style="color:green"><?php echo $mess2; ?></h4>
<input type="email"  name="oldmail" placeholder="Enter your registered email here" class="form-control" ><br>
<input type="email"  name="newmail" placeholder="Enter your new email here" class="form-control"><br>
<input type="submit" name="update" value="Update Email" onclick="return confirm('Are you sure, you want to update your email?');" class="btn btn-success">
</div>
</div>
<div class="showben">
<a href="personaldetails.php">Back</a>
</div>
