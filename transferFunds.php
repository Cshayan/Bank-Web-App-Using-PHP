<?php session_start();
error_reporting(0);
?>
<?php include 'connection.php'; ?>

<?php 
  if(isset($_POST["trnfund"]))
  {
     
    $remacno=$_SESSION["acNo"];
    $spcmess="";
$sql="SELECT * FROM duptransaction WHERE type1='withdraw' AND remacno='$remacno' ";
$result=mysqli_query($conn,$sql);

$sql1="SELECT * FROM transferfunds WHERE remacno='$remacno' AND type1='dup' ";
$result1=mysqli_query($conn,$sql1);

    if(mysqli_num_rows($result) > 0 ||mysqli_num_rows($result1) > 0 )
    {
          $spcmess="You have already requested for withdrawing/transferring money. Once the bank approves your
          request, you can then transfer fund to your beneficiary! Please check the history or requests made to the bank.";
    }
  
    else{

    $flag=0;
    $benacno=$ifsc=$acname=$bankname=$remaac=$mess1=$mess2=$mess3=$mess4="";
    $amount=$_POST["amount"];

      $remac=$_SESSION["acNo"];
      $sel="SELECT * FROM bendetails WHERE remacno='$remac' ";
      $res=mysqli_query($conn,$sel);

      //selecting the data from bendetails
      if(mysqli_num_rows($res)>0)
      {
          while($row=mysqli_fetch_assoc($res))
          {
                $benacno=$row["benacno"];
                $acname=$row["acname"];
                $bankname=$row["bankname"];
                $ifsc=$row["ifsc"];
     
     //checking if bendetails data and value submitted are same or not
      if($benacno==$_POST["benacno"]&&$acname==$_POST["benname"]&&$bankname==$_POST["benbankname"]&&$ifsc==$_POST["ifsc"])
      {
           //check transfered amount is present in the account or not
           $sel1="SELECT updated FROM realtransaction WHERE remacno='$remac' ";
           $res1=mysqli_query($conn,$sel1);
           if(mysqli_num_rows($res1)>0)
           {
               while($row=mysqli_fetch_assoc($res1))
               {
                  $updated=$row["updated"];
               }
           }
          if($updated<$amount)
          {
              $mess2="You don't have sufficient balance to transfer funds";
          }
          else
          {
              $today=date("d/m/Y");
              $name=$_SESSION["fname"]." ".$_SESSION["lname"];
              $insert="INSERT INTO transferfunds (remacno,remacname,benacno,benacname,amount,date1,type1,status1)
                       VALUES ('$remac','$name','$benacno','$acname','$amount','$today','real','Request Pending') ";

               if (mysqli_query($conn, $insert)) 
                {
                   $mess3="Your request for transfering the fund has been sent to the bank.You will
                   be able to see the details in transaction record once bank approves the request";
                } 
                else 
                {
                    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
                }

                $insert="INSERT INTO transferfunds (remacno,remacname,benacno,benacname,amount,date1,type1,status1)
                VALUES ('$remac','$name','$benacno','$acname','$amount','$today','dup','Request Pending') ";
                if (mysqli_query($conn, $insert)) 
                {
                   $mess3="Your request for transfering the fund has been sent to the bank.You will
                   be able to see the details in transaction record once bank approves the request";
                   $flag=1;
                } 
                else 
                {
                    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
                }          
               

          }
           
      }
      else
        {
          $mess4=" Beneficiary must be added first to transfer funds.<a href='addedBeneficiaries.php'>Check Here</a> the added beneficiaries.";
        }
    
    }
    
}
else{
    $mess1="There is no added beneficiary in your list!!";
}


     }

 }//end of isset

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Transfer Funds</title>
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
.showdet{
    
    float:right;
    margin-right:0%;
    margin-top:-25%;
    height:100px;
    background-color:#c7ecee;
    height:130%;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    overflow:auto;
}
.showtransfer{
    float:right;
    margin-right:10%;
    margin-top:-8%;
    height:100px;
    overflow:auto;
}
.showtransfer a:visited, .showtransfer a:link{
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius:10px 10px 10px 10px;
}
.showtransfer a:hover{
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


<div style="margin-left:15%;margin-top:5%;padding:1px 16px;height:100px;">
<h3>Transfer Funds</h3>
<p>This is where you can transfer funds from your account to that of the <a href="addedBeneficiaries.php">added beneficiaries</a> of any bank.</p>
<h4>Please enter below the details to transfer funds:</h4>
<form method="POST" class="from-group">
<h5 style="color:red; font-size=22px;"><?php echo $mess1; echo $mess2; echo $mess3; echo $mess4; echo $spcmess; ?></h5>
<div class="row">               
       <div class="col-md-4">
          <label>Beneficiary A/C No:</label><span class="error">*</span>
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
          <label>IFSC:</label><span class="error">*</span>
          <input type="text" name="ifsc" placeholder="IFSC" class="form-control" maxlength="20" required>
       </div> 
</div>
<div class="row">               
       <div class="col-md-4">
          <label>Amount to transfer:</label><span class="error">*</span>
          <input type="number" name="amount"  class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter Amount" required>
       </div> 
</div>   

<br>
<div class="row">
   <div class="col-md-4">
       <input type="submit" name="trnfund" value="Transfer Fund" class="btn btn-primary">
   </div>
</div>   
</form>

<div class="showdet">
1.Please note that all the * marked fields are mandatory to fill.<br>
2.The beneficiary must be your 'Added Beneficiary' list to be able to transfer the funds<br>
3.Once you have transfer the funds, it will be first approved by your bank and<br> then the transaction details 
will be shown.
</div>

<div class="showtransfer">
<a href="historytrnFund.php">History of transfer funds</a>
</div>


