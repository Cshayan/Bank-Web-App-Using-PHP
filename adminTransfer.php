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
    margin-top:20%;
}
table {
    border-collapse: collapse;
    width:100%;
    height:70%;
    font-size:20px;

}
table,td{    
    border: 1px solid #ddd;
}
td {
    height:50%;
    width:15%;
    text-align:center;

}
tr:hover {background-color: #bdc3c7;}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(even):hover {background-color: #bdc3c7;}



    </style>
    <title>Admin Request Transfer</title>
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
<p> This page shows the requests made by the users of the bank to transfer funds to the beneficiary accounts</p> 
<h3><caption>Requests made for transferring funds</caption></h3>
<table>
<tr>
<td>CodeNo</td>
<td>Date</td>
<td>Remitter A/C No</td>
<td>Remitter Name</td>
<td>Beneficiary A/C No</td>
<td>Beneficiary Name</td>
<td>Amount Requested(Rs.)</td>
</tr>
<?php 
$mess="";
$acno=$_SESSION["acNo"];
$sql="SELECT * FROM transferfunds WHERE type1='dup' ";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          echo "<tr><td>".$row["id"]."</td><td>". $row["date1"]."</td><td>".$row["remacno"]."</td><td>".$row["remacname"]."</td><td>".$row["benacno"]."</td><td>".$row["benacname"]."</td><td>".$row["amount"];
        }
        echo "</table>";
    }
    else
    {
        echo "<h2 style=\"color:red\">No requests yet!!</h2>";
    }

}          
else
{
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>     
<?php 
  if(isset($_POST["approve"]))
  {
    $code=$_POST["id"];
    $remacno="";
    $flag=0;

    $sql="SELECT id FROM transferfunds WHERE type1='dup' ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if($code==$row["id"])
            {
            $flag=1;
            break;
            }
            else
            {
                 $mess1="No such ID exists in the table!!Please enter the correct ID.";
                $flag=0;
            }
        }
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    
if($flag==1)
 {      
$sql="SELECT * FROM transferfunds WHERE id='$code' AND type1='dup'  ";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $amount=$row["amount"];
            $remacno=$row["remacno"];
        }
    }
}
else
{
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//here code updates the credit of realtransaction table where acno mathches with that of user account  
$sel="SELECT updated FROM realtransaction WHERE remacno='$remacno' ";
$result1=mysqli_query($conn,$sel);
if(mysqli_query($conn,$sel))
{
 if(mysqli_num_rows($result1) > 0)
 {
     while($row=mysqli_fetch_assoc($result1))
     {
         $upd=$row["updated"];
     }
 }
}
$upd1=$upd-$amount;
$sql="UPDATE realtransaction SET debit='$amount' , updated='$upd1' WHERE remacno='$remacno'";
if (mysqli_query($conn, $sql))
{
  $mess="Request approved successfully";
} 
else 
{
  echo "Error updating record: " . mysqli_error($conn);
}
//inserts the values into transactionrecord
$add=0;
$today=date("d/m/Y");

$insert="INSERT INTO transactionrecord (remacno,credit,debit,updated,details,date1)
         VALUES ('$remacno','$add','$amount','$upd1','DEBIT(TRN Fund)','$today')";
         if (mysqli_query($conn, $insert)) 
         {
            $f=1;
        }
         else 
         {
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }
$code1=$code-1;
 $upd1="UPDATE transferfunds SET status1='Request Approved' WHERE id='$code1' AND type1='real' ";   
 if (mysqli_query($conn, $upd1))
{
  $mess="Request approved successfully";
} 
else 
{
  echo "Error updating record: " . mysqli_error($conn);
}
    

   
    $del="DELETE FROM transferfunds WHERE id='$code' AND type1='dup' ";
    if(mysqli_query($conn,$del))
    {
      echo '<script type="text/javascript">';
    echo 'window.location.href="adminTransfer.php";';
    echo '</script>';
    } 
  }
}  
?>

<br><br><br>
<h4>Enter the Code No shown to approve the User's request:</h4>
<div class="col-xs-3">
<form method="POST" >
<input type="number" name="id" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter here" required><br>
<input type="submit" name="approve" value="Approve" onclick="return confirm('Are you sure, approve the request?');" class="btn btn-warning">
</form>
<h5 style="color:red"><?php echo $mess1; ?></h5>
</div>

