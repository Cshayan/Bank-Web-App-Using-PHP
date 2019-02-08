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
<title>Add Money</title>
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
<li><a href="accountSummary.php">Account Summary</a></li>
<li><a href="addMoney.php">Add Money to your account</a></li>
<li><a href="withdrawMoney.php">Withdraw Money from account</a></li>
<li><a href="transferFunds.php">Transfer Funds</a></li>
<li><a href="transactionRecord.php">Transaction Record</a></li>
</ul>
<div style="margin-left:20%;margin-top:5%;padding:1px 16px;height:100px;">
<?php 
 if(isset($_POST["addmoney"]))
 {
     $spcmess="";
     $acno=$_SESSION["acNo"];
   $sql="SELECT * FROM duptransaction WHERE type1='add' AND remacno='$acno' ";
   $result=mysqli_query($conn,$sql);
   
       if(mysqli_num_rows($result) > 0)
       {
             $spcmess="You have already requested for adding money. Once the bank approves your
             request, you can then add money to your account!";
       }
    else 
    {   

     if($_POST["value"]>40000)
     {
         $mess="You cannot add more than Rs.40,000";
     }
 
 else{
     $ans=$_POST["value"];
     $remacno=$_SESSION["acNo"];
     $today=date("d/m/Y");
     $sql="SELECT updated FROM duptransaction where remacno='$remacno'";
     $result=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql))
    {
       if(mysqli_num_rows($result) > 0)
       {
          while($row=mysqli_fetch_assoc($result))
          {
             $upd=$row["updated"];      
          }
       }
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    
    $upd=$upd+$ans;   
    $name=$_SESSION["fname"]." ".$_SESSION["lname"];    
     $insert="INSERT INTO  duptransaction (remacno,name1,credit,debit,updated,date1,type1)
              VALUES ('$remacno','$name','$ans','0','$upd','$today','add')";
      if(mysqli_query($conn,$insert))
      {
          $mess="Your request for adding the money has been sent to the bank. You will be able to see the updated
          balance in your account once it has been approved by the Bank";
      }      
      else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }  
   }

   }
 }

?>

<h3>Enter the money to add to your account:</h3>
<p>Enter only numbers[0-9]
<form method="POST">
    <div class="col-xs-3">
    <input type="number" name="value"  class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter Amount" required><br>
    <input type="submit" name="addmoney" value="Add Money" class="btn btn-success"> 
    <br><br><br>
    <p style="color:red"><?php echo $mess; echo $spcmess; ?></p>
    </div>
<form>   

    <br><br><br>
<i>NOTE:- Rs.40,000 is the highest amount that can be added one at a time</i>
</div>

<div class="showben">
<a href="requestaddMoney.php">See requests made for adding money</a>
</div>

