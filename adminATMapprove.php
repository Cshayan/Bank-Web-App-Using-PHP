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
    <title>Admin Request ATM Card</title>
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
<p> This page shows the information about the requests made by the user of this bank for their 
respective ATM cards</p>
<h3>Requests from the user for ATM cards:</h3>
<table>
<tr>
<td>CodeNo</td>
<td>A/C No.</td>
<td>Name</td>
<td>Status of ATM Card</td>
</tr>
<?php 
$sel="SELECT * FROM atmrequest WHERE status1='Request Pending' ";
$result = mysqli_query($conn, $sel);
if(mysqli_query($conn,$sel))
{
   if(mysqli_num_rows($result) > 0)
  {
    while($row=mysqli_fetch_assoc($result))
    {
      echo "<tr><td>".$row["id"]."</td><td>".$row["remacno"]."</td><td>".$row["name1"]."</td><td>".$row["status1"];
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
     echo "Error: " . $sel . "<br>" . mysqli_error($conn);
}
?>


<?php 

if(isset($_POST["approve"]))
{
    $flag=0;
    $ans=$_POST["id"];
  $sql="SELECT id FROM atmrequest WHERE status1='Request Pending' ";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
      while($row=mysqli_fetch_assoc($result))
      {
          if($row["id"]==$ans)
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
   
  if($flag==1)
  {
    $upd="UPDATE atmrequest SET status1='Request Approved' WHERE id='$ans' ";
    if (mysqli_query($conn, $upd))
     { 
        echo '<script type="text/javascript">';
    echo 'window.location.href="adminATMapprove.php";';
    echo '</script>';
     } 
  else
  {
      echo "Error updating record: " . mysqli_error($conn);
  }
}

}



?>
<br><br><br>
<h4>Enter the Code No shown to approve the User's request of ATM card:</h4>
<div class="col-xs-3">
<form method="POST" >
<input type="number" name="id" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter here" required><br>
<input type="submit" name="approve" value="Approve" onclick="return confirm('Are you sure, you want to approve the request?');" class="btn btn-warning">
</form>
</div>
<br><br>
<h4 style="color:red"><?php echo $mess1; ?></h4> 


