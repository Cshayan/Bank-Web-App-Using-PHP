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
#c1{
    background-color:#c7ecee;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    width:70%;
    margin-left:-25%; 
}
#c2{
    background-color:#33d9b2;
    color:white;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    width:70%;
   float:right;
   margin-top:2%;
}
#c3{
    background-color:#ffb142;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    width:70%;
    margin-top:22%;
    margin-left:-25%;

}



</style>
<title>Contact Us</title>
<link rel="shortcut icon" href="logo.ico" />
<meta charset="utf-8">
   <meta name="viewport" content="width=1024">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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
        <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </nav>



<center><h2 style="color:green">Need any help? Contact us anytime!</h2></center>
<div style="margin-left:20%;padding:1px 16px;height:100px;">

<div id="c1">
<h3>Kolkata Branch</h3>
<label>Address: </label> Globsyn Buisness School, IBRAD buisness school, Keshtopur, Kolkata.<br>
<label>Tel: </label> 033-456892/12<br>
<label>Email: </label> kolkatabranch@mybank.ac.in
</div>

<div id="c2">
<h3>Delhi Branch</h3>
<label>Address: </label>Globsyn Buisness School, Sector V-A , Malviya Nagar, Delhi.<br>
<label>Tel: </label> 013-456856/32<br>
<label>Email: </label> delhibranch@mybank.ac.in
</div>

<div id="c3">
<h3>Mumbai Branch</h3>
<label>Address: </label>Globsyn Buisness School, Near City Center, Kamarthalli, Mumbai<br>
<label>Tel: </label> 013-456856/45<br>
<label>Email: </label> mumbaibranch@mybank.ac.in
</div>
</div>
