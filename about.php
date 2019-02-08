<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="logo.ico" />
<title>About-FAQs</title>
<style>
.ques{
    background-color:#c7ecee;
    color:black;
    border-radius:10px 10px 10px 10px;
    padding:20px 20px;
    width:70%;
    margin-left:0%; 
}
.ans{
    background-color:#2ecc71;
    color:white;
    border-radius:10px 10px 10px 10px;
    padding:10px 10px;
    width:70%;
    margin-left:0%;
    border:2px solid white;
}
#p1{
    width:100%;
    padding:10px;
    margin-top:40%;
}



</style>


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


<h2 style="color:green;text-align:center;">Some common FAQs about Online Banking: </h2>
<div style="margin-left:20%;margin-top:5%;padding:1px 16px;height:100px;">

<div class="ques">
<b style="font-size:18px;">1.What is online banking ?</b>
<button class="btn btn-warning" style="float:right;" type="button" onclick="document.getElementById('q1').style.display='block'">Show</button>
</div>
<div class="ans">
<p id="q1" style="display:none">Online banking is the Internet banking service provided by MyBank, 
one of the largest bank in India.<br><br>
<button class="btn btn-warning" type="button" onclick="document.getElementById('q1').style.display='none'">Hide</button></p>
</div>

<br>

<div class="ques">
<b style="font-size:18px;">2. What is special about Internet banking?</b>
<button class="btn btn-warning" style="float:right;" type="button" onclick="document.getElementById('q2').style.display='block'">Show</button>
</div>
<div class="ans">
<p id="q2" style="display:none">Internet banking is the most convenient way to bank- anytime, any place, 
at your convenience.<br><br>
<button class="btn btn-warning"  type="button" onclick="document.getElementById('q2').style.display='none'">Hide</button></p>
</div>

<br>

<div class="ques">
<b style="font-size:18px;">3. I do not have a PC. How can I do online banking?</b>
<button class="btn btn-warning" style="float:right;" type="button" onclick="document.getElementById('q3').style.display='block'">Show</button>
</div>
<div class="ans">
<p id="q3" style="display:none">Even if you don't have a PC, you can still do Online Banking with any mobile
having active internet connection.<br><br>
<button class="btn btn-warning"   type="button" onclick="document.getElementById('q3').style.display='none'">Hide</button></p>
</div>

<br>

<div class="ques">
<b style="font-size:18px;">4. How can I do online banking? Can everyone do it?</b>
<button class="btn btn-warning" style="float:right;" type="button" onclick="document.getElementById('q4').style.display='block'">Show</button>
</div>
<div class="ans">
<p id="q4" style="display:none">Anyone who is having an account in any of the branches of MyBank can do 
online banking. The user while registering for the online banking only have to submit their A/C No. which
is provided by the MyBank at the time of opening of account. <br><br>
<button class="btn btn-warning" type="button" onclick="document.getElementById('q4').style.display='none'">Hide</button></p>
</div>

<br>

<div class="ques">
<b style="font-size:18px;">5. I do not have an account with the bank. What can I do?</b>
<button class="btn btn-warning" style="float:right;" type="button" onclick="document.getElementById('q5').style.display='block'">Show</button>
</div>
<div class="ans">
<p id="q5" style="display:none">It's simple. Visit any of our branches in person and open an account in MyBank.
It hardly takes 3-4 hours for opening an account. Happy Banking!!<br><br>
<button class="btn btn-warning" type="button" onclick="document.getElementById('q5').style.display='none'">Hide</button></p>
</div>

</div>
<p id="p1"> &nbsp; &nbsp;</p>

</body>
</html>