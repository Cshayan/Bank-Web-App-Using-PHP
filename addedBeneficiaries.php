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
<title>Added Beneficiaries</title>
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

<div style="margin-left:15%;padding:1px 16px;height:100px;">
<h2>List Of Added Beneficiaries:</h2><br>
<table >
<tr>
<td><b>ID</b></td>
<td><b>Beneficairy A/C No.</b></td>
<td><b>Account Holder Name</b></td>
<td><b>Bank Name</b></td>
<td><b>Branch Name</b></td>
<td><b>IFSC</b></td>
</tr>

<?php 
$check=$_SESSION['acNo'];
$sql="SELECT * FROM bendetails WHERE remacno='$check'";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row["id"]. "</td><td>".$row["benacno"]. "</td><td>".$row["acname"]. "</td><td>".$row["bankname"].
            "</td><td>".$row["branchname"]."</td><td>".$row["ifsc"];
        }
        echo "</table>";
    }
    else{
        echo "<h2 style=\"color:red\">No beneficiary has been added yet!!</h2>";
    }
   
}      
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  $flag=$mess1="";

  if(isset($_POST["submit"]))
  {
    $ans=$_POST["id"];
  $sql="SELECT id FROM bendetails WHERE remacno='$check'";
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
}
  
  if($flag==1){
  //to delete data
  
  $ans=$_POST["id"];
        
  $check=$_SESSION["acNo"];
  $del="DELETE FROM bendetails WHERE id='$ans' AND remacno='$check'";
  if(mysqli_query($conn,$del))
   {
    echo '<script type="text/javascript">';
    echo 'window.location.href="addedBeneficiaries.php";';
    echo '</script>';
   }
  }
?>  
</table>
<br><br><br>
<h4>Enter the ID shown to delete a beneficiary details:</h4>
<div class="col-xs-3">
<form method="POST" >
<input type="number" name="id" class="form-control" min="0" oninput="validity.valid||(value='');" placeholder="Enter here" required><br>
<input type="submit" name="submit" value="Delete Beneficiary" onclick="return confirm('Are you sure, you want to delete beneficiary?');" class="btn btn-warning">
</form>
</div>
<h4 style="color:green"><?php echo $mess1;?></h4>
</div>
