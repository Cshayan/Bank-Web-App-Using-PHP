<?php session_start();
error_reporting(0);
?>
<?php include 'connection.php'; ?>
<?php 
$benacno=$remacno=$acname=$bankname=$branchname=$ifsc=$mess=$fnameErr="";
$flag=0;

function test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  

$sql="SELECT benacno,remacno FROM bendetails";
$result = mysqli_query($conn, $sql);
if(isset($_POST["addben"]))
{ 
    $fname=test($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["benname"])) 
    {
      $fnameErr = "Only letters and white spaces allowed in names";
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["benbankname"])) 
    {
      $fnameErr = "Only letters and white spaces allowed in names";
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["benbankbranchname"])) 
    {
      $fnameErr = "Only letters and white spaces allowed in names";
    }
  else
   {
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if(($row["benacno"]==$_POST["benacno"])&&($row["remacno"]==$_SESSION['acNo']))// both ben and rem acno are same
            {
                $mess="Beneficiary with this A/C no already exists!";
                $flag=1;
            }
        }
    }
  }
}//end of isset  
if($flag==0)
{
if(isset($_POST["addben"]))
   {
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["benname"])) 
    {
      $fnameErr = "Only letters and white spaces allowed in names";
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["benbankname"])) 
    {
      $fnameErr = "Only letters and white spaces allowed in names";
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["benbankbranchname"])) 
    {
      $fnameErr = "Only letters and white spaces allowed in names";
    }
    else{   
     $benacno=test($_POST["benacno"]);
     $remacno=test($_SESSION['acNo']);
     $acname=test($_POST["benname"]);
     $bankname=test($_POST["benbankname"]);
     $branchname=test($_POST["benbankbranchname"]);
     $ifsc=test($_POST["ifsc"]);

     $insert="INSERT INTO bendetails (benacno,remacno,acname,bankname,branchname,ifsc)
              VALUES ('$benacno','$remacno','$acname','$bankname','$branchname','$ifsc')";

      if(mysqli_query($conn,$insert))
      {
          $mess="Beneficiary added successfully!!";
      }      
      else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }  
   }
 }// end of isset 
}// end of if containing flag




?>


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
    
    float:right;
    margin-right:10%;
    margin-top:-5%;
    height:100px;
    background-color:#c7ecee;
    height:130%;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    overflow:auto;
}
.mess{
    
    float:right;
    margin-top:20%;
    height:100px;
    font-weight:bold;
    font-size:18px;
    color:#2ecc71;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    overflow:auto;
}
.showben{
    float:right;
    margin-right:10%;
    margin-top:-12%;
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



    </style>   
    <title>Add Beneficiary</title> 
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


<div style="margin-left:20%;padding:1px 16px;height:100px;">
<form class="from-group">
<h3>Remitter Details:</h3>
<div class="row">               
       <div class="col-md-4">
          <label>Bank's A/C No:</label><span class="error">*</span>
          <input type="text"   class="form-control" maxlength="11" value="<?php echo $_SESSION['acNo'];?>" disabled>
       </div> 
</div>       
<div class="row">               
       <div class="col-md-4">
          <label>User Name:</label><span class="error">*</span>
          <input type="text"  class="form-control" maxlength="20" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>" disabled>
       </div> 
</div>       
<div class="row">               
       <div class="col-md-4">
          <label>Bank's Name:</label><span class="error">*</span>
          <input type="text"  class="form-control" maxlength="20" value="MyBank" disabled>
       </div> 
</div>     
</form>
<div class="details">
 <h4>You can add here the beneficiary details</h4>
 <ul>
     <li>All the * marked fields are mandatory to fill.</li>
     <li>Make sure to fill up the form correctly</li>
     <li>Please ensure to enter the correct Beneficiary A/C No.</li>
     <li>Correctly fill up field for IFSC code of Beneficiary.</li>
</ul>    
</div>


<form class="from-group" action="#" method="POST">
<h3>Beneficiary Details:</h3>  
<div class="row">               
       <div class="col-md-4">
          <label>Bank's A/C No:</label><span class="error">*</span>
          <input type="text" name="benacno" placeholder="Beneficiary A/C No" class="form-control" maxlength="11" required>
       </div> 
</div>       
<div class="row">               
       <div class="col-md-4">
          <label>Account Holder Name:</label><span class="error">*</span>
          <input type="text" name="benname" placeholder="Beneficiary Account Holder Name" class="form-control" maxlength="20" required>
       </div> 
</div>       
<div class="row">               
       <div class="col-md-4">
          <label>Bank's Name:</label><span class="error">*</span>
          <input type="text" name="benbankname" placeholder="Beneficiary Bank Name" class="form-control" maxlength="20" required>
       </div> 
</div>       
<div class="row">               
       <div class="col-md-4">
          <label>Bank's Branch Name:</label><span class="error">*</span>
          <input type="text" name="benbankbranchname" placeholder="Beneficiary Bank Branch Name" class="form-control" maxlength="20" required>
       </div> 
</div>       
<div class="row">               
       <div class="col-md-4">
          <label>Account's IFSC Code:</label><span class="error">*</span>
          <input type="text" name="ifsc" placeholder="IFSC Code" class="form-control" maxlength="15" required>
       </div> 
</div>       
<br>
<div class="row">
   <div class="col-md-4">
   <input type="submit" name="addben" value="Add Beneficiary"  class="btn btn-primary">
   </div>
</div>   
</div>
<div class="showben">
<a href="addedBeneficiaries.php">See added beneficiaries</a>
</div>

<div class="mess">
<?php echo $mess; ?>
<h3 style="color:red"><?php echo $fnameErr; ?></h3>
</div>
