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
table {
    border-collapse: collapse;
    width:100%;
    height:70%;
    font-size:16px;
    padding:15px;

}
table,td{    
    border: 1px solid #ddd;
    padding:15px;
}
td {
    height:50%;
    width:10%;
    text-align:center;
    padding:15px;

}
tr:hover {background-color: #bdc3c7;}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(even):hover {background-color: #bdc3c7;}


</style>
<title>User Registered</title>
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


<div style="margin-left:12%;margin-top:5%;padding:1px 16px;height:80px;">
<p> Here the admin can see the details of all the users who have registered for online banking
and also has the right to block any user who violates any rule of online banking</p>
<h3> Details of Registered Users:</h3>
<table>
<tr>
<td>CodeNo.</td>
<td>First Name</td>
<td>Last Name</td>
<td>Email</td>
<td>A/C No.</td>
<td>D.O.B</td>
<td>Gender</td>
<td>Country</td>
<td>Status</td>
</tr>
<?php 
$sql="SELECT * FROM dtbase";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["email"]
          ."</td><td>".$row["acNo"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["country"]."</td><td>".$row["status1"];
        }
        echo "</table>";
    }
    else
    {
        echo "<h2 style=\"color:red\">No user registered yet!!</h2>";
    }   
}
?>

<?php 
if(isset($_POST["block"]))
{
    $code=$_POST["idblock"];
    $flag=0;
    $sel1="SELECT id FROM dtbase WHERE status1='allowed' ";
    $result=mysqli_query($conn,$sel1);
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
                 $mess1="No such ID exists in the table!! Maybe the user is already blocked.Please enter the correct ID.";
                 $flag=0;
            }
        }
    }
    else{
        echo "Error: " . $sel1 . "<br>" . mysqli_error($conn);
      }
    
if($flag==1)
 {  
    $upd="UPDATE dtbase SET status1='blocked' WHERE id='$code' ";
    if (mysqli_query($conn, $upd))
  {
    echo '<script type="text/javascript">';
    echo 'window.location.href="adminuserdetails.php";';
    echo '</script>';
  } 
  else 
 {
  echo "Error updating record: " . mysqli_error($conn);
  }
 
 }

}//end of isset

?>

<?php 
if(isset($_POST["unblock"]))
{
    $code=$_POST["idunblock"];
    $flag=0;
    $sel1="SELECT id FROM dtbase WHERE status1='blocked' ";
    $result=mysqli_query($conn,$sel1);
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
                 $mess2="No such ID exists in the table. Maybe the user is already unblocked.!!Please enter the correct ID.";
                 $flag=0;
            }
        }
    }
    else{
        echo "Error: " . $sel1 . "<br>" . mysqli_error($conn);
      }
    
if($flag==1)
 {  
    $upd="UPDATE dtbase SET status1='allowed' WHERE id='$code' ";
    if (mysqli_query($conn, $upd))
  {
     echo '<script type="text/javascript">';
    echo 'window.location.href="adminuserdetails.php";';
    echo '</script>';
  } 
  else 
 {
  echo "Error updating record: " . mysqli_error($conn);
  }
 
  }

} //end of isset


?>


</div>
<div style="margin-left:20%;margin-top:5%;font-family:cursive;">
<br><br><br>
<h4>Enter the Code No shown to block any user:</h4>
<div class="col-xs-3">
<form method="POST" >
<input type="number" name="idblock" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter here" required><br>
<input type="submit" name="block" value="Block" onclick="return confirm('Are you sure, you want to block the user?');" class="btn btn-warning">
</form>
<h5 style="color:red"><?php echo $mess1; ?></h5>
</div>
</div>

<div style="margin-left:60%;margin-top:-2%;font-family:cursive;">
<h4>Enter the Code No shown to Un-block any user:</h4>
<div class="col-xs-6">
<form method="POST" >
<input type="number" name="idunblock" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter here" required><br>
<input type="submit" name="unblock" value="Unblock" onclick="return confirm('Are you sure, you want to unblock the user?');" class="btn btn-warning">
</form>
<h5 style="color:red"><?php echo $mess2; ?></h5>
</div>
</div>

