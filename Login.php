<?php 
session_start();
?>
<?php include 'connection.php'; ?>
<?php
$messErr=$mess=$spcmess="";
$flag=0;
$conndb="SELECT email,psword,status1 FROM dtbase";
$result=$conn->query($conndb);
if(isset($_POST["submit"]))
{

  if($result->num_rows>0)
  {
    while($row=$result->fetch_assoc()) 
    {
        if($row["email"]==$_POST["email"] && base64_decode($row["psword"])==$_POST["pwd"])  //decoding the password
         {
           $status=$row["status1"];
           if($status=="allowed")
           {
             $flag=1;
             $_SESSION["email"]=$_POST["email"];
             header("Location:Userdashboard.php");
           }
           else
           {
             $spcmess="Your account has been blocked. Kindly contact your bank to access your account.";
             $flag=2;
           }
         }
    }
  }
  if($flag==0)
  {
      $messErr="Invalid email or password combination";
  }

}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Login</title>
<link rel="shortcut icon" href="logo.ico" />
   <meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <style>
        #p1{
            color: white;
            background-color:black;
            text-align:center;
            padding:10px;
        }
    </style>    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="styleLogin.css">
</head>

<body id="b1">
     
<nav class="navbar navbar-expand-md navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand active" href="homepage.php" ><img src="home.png" height="20px" width="20px"></a>
      <a class="navbar-brand active" href="homepage.php">MyBank</a>
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
        <li><a href="Register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
    </ul>
  </nav>





<div class="container">
    <center><img src="employee-login.jpg" class="img-responsive img-circle"></center>
    <span style="color:white"><?php echo $messErr; echo $mess; echo $spcmess;?></span>
   <form method="POST" action="#">
    <div class="form-input">
           <input type="email" name="email" placeholder="Email"> 
    </div>
    <div class="form-input">
           <input type="password" name="pwd" placeholder="Password">
    </div>
     <p id="p2">Don't have an account?<a href="Register.php">Register Here!</a></p>
    <input type="submit" class="btn btn-success" name="submit" value="LOGIN">
    </form>
 </div>
 <br><br><br><br>
 <p id="p1"> &copy;onlinebankingsystem2018</p>
</body>  
</html>

