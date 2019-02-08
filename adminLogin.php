<?php session_start(); 


include 'connection.php';

$flag=0;
$messErr=$mess="";


$flag=0;
$mess="";
  
$conndb="SELECT email,psword,status1 FROM dtbase";
$result=$conn->query($conndb);

if(isset($_POST["submit"]))
{
  if($result->num_rows>0)
  {
    while($row=$result->fetch_assoc()) 
    {
        if($_POST["email"]=="admin@gmail.com" && $_POST["pwd"]=="admin123")
         {
               $flag=1;
               $_SESSION["email"]=$_POST["email"];
              header("Location:adminDashboard.php");
         }
    }
    if($flag==0)
    {
        $mess="Invalid email or password combination!";
    }
  }
}    

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <style>
.container{
    
    text-align: center;
    margin: 0 auto;
    background-color:rgba(223, 230, 233,0.8);
    width:100px;
    margin-top: 150px;
}
#b1{
    background-image:url("2.jpg");
    background-attachment:cover;
    background-repeat:no-repeat;
    background-size:1500px;
}
.heading{
    width:30%;
    margin:40px;
    color:white;
    background:#2ecc71;
    text-align:center;
    border:3px solid orange;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding:10px;
    margin-left:450px;
}

.container img{
    width:150px;
    height:150px;
    margin-top: -60px;
}
input[type="email"],input[type="password"]{
    margin-top: 20px;
    width: 30%;
     padding: 5px 5px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 4px;
    border: 2px solid #ccc;
    padding-left: 30px;
}
#p1{
    background-color:black;
    color:white;
    padding:15px;
    text-align:center;
}
    </style>    
    <title>Admin Login</title>
    <link rel="shortcut icon" href="logo.ico" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body id="b1">
     
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
       <li><a href="Register.php"><span class="glyphicon glyphicon-log-in"></span> SignUp</a></li>
   </ul>
   
 </nav>

<div class="heading"><h3>Admin Login</h3></div>

 <div class="container">
    <center><img src="admin.jpg" class="img-responsive img-circle"></center>
    <p style="font-weight:bold;"><?php echo $mess; ?></p>
    <form method="POST" action="#">
    <div class="form-input">
           <input type="email" name="email" placeholder="Email"> 
    </div>
    <div class="form-input">
           <input type="password" name="pwd" placeholder="Password">
    </div>
    <input type="submit" class="btn btn-success" name="submit" value="LOGIN">
    </form>
 </div>
 <br><br><br><br>
 <p id="p1"> &copy;onlinebankingsystem2018</p>
</body>  
</html>

