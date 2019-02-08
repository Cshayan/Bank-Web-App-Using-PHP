<!DOCTYPE html>
<head>
<title>MyBank- Official Home Page</title>
<link rel="shortcut icon" href="logo.ico" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, intial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.navbar{
    border: 0;
    border-radius: 0;
    background-color:black;
    color: #FFF;
    padding:10px;
    font-size:16px;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    border-bottom:5px solid orange;
    
}
.navbar-brand{
    float:left;
    min-height: 55px;
}
.navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus, .navbar-inverse .navbar-nav .active a:hover{
    color: #FFF;
    background-color: black;
}
.navbar-inverse .navbar-nav li a{
    color:#D5D5D5;
} 
.carousel-slide .carousel-inner .image{
    background-position:center;
}
.carousel-caption{
    top:50%;
}
.btn{
    background-color:black;
    color:#FFF;
    padding:12px 22px;
    border:3px solid white;
}
.btn:hover{
    background-color:black;
    color:#FFF;
    padding:12px 22px;
    border:2px solid white;
    box-shadow:5px 5px #ecf0f1;

}
.container{
    margin:4% auto;
}
#icon{
  max-width:200px;
  margin: 1% auto;
}
.footer{
width:100%;
background-color:black;
padding:20px;
color:#FFF;

}
.fa{
    padding:10px;
    font-size:30px;
    color:#FFF;
}
.fa:hover{
    color:#D5D5D5;
    text-decoration:none;
}
body{
    position:relative;
}
</style>

</head>
<body data-spy="scroll" data-target="#myNavbar" data-offset="50">
<nav class="navbar navbar-expand-md navbar-inverse navbar-fixed-top">
   <div class="container-fluid">

     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand " href="homepage.php" ><img src="logo.png" height="90px" width="140px"></a>
     </div>

     <ul class="nav navbar-nav">
         <li class="active"><a href="homepage.php">Home</a></li>
         <li><a href="features.php">Features</a></li>
         <li><a href="about.php">About-FAQs</a></li>
         <li><a href="contact.php">Contact Us</a></li>
         <li><a href="safetytips.php">Safety Banking Tips</a></li>
     </ul>   

     <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
        <li><a style="font-size:16px;background-color:white;color:black;border-radius:10px 10px 10px 10px;" href="adminLogin.php" class="fa fa-sign-in"> Admin Login</a></li>    
        <li><a href="Login.php">Login</a></li>
        <li><a  style="font-size:16px" href="Register.php" class="fa fa-registered"> Sign Up</a></li>
        </ul>
     <div>

  </div>
 </nav>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
          <div class="carousel-inner" role="listbox">
                <div class="item active">
                <center><img src="img1.jpg"  width="800px" height="500px"></center>
                 <div class="carousel-caption">
                   <h1>Welcome to MyBank</h1>
                   <br>  
                   <form action="Login.php">
                     <button type="submit" class="btn btn-default">Login</button>
                   </form>
                  </div>
                </div>
              <div class="item">
              <div class="carousel-caption">
                   <h1>Beware of Malacious Websites</h1>
              </div>   
              <center><img src="img2.jpg"  width="800px" height="500px"></center>
              </div>
              <div class="item">
              <div class="carousel-caption">
                   <h1>Use yours Cards Wisely</h1>
              </div>   
              <center><img src="img3.jpg"  width="800px" height="500px"></center>
              </div>    
          </div>   
          <!--start slider -->
     <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
     </a>        
     <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
     </a>
</div>  <!--end of slider -->           

     <div class="container text-center">
         <h2>What can you do by registering here?</h2>
         <div class="row">
             <div class="col-sm-3">
                <img src="addmoney.jpg" id="icon">
               <h4>Add Money</h4>
             </div>   
             <div class="col-sm-3">
                <img src="withmoney.png" id="icon">
               <h4>Withdraw Money</h4>
             </div>
             <div class="col-sm-3">
                <img src="trnfund.png" id="icon">
               <h4>Transfer Funds</h4>
             </div>
             <div class="col-sm-3">
                <img src="atm.png" id="icon">
               <h4>Request ATM Card</h4>
             </div>
        </div> 
</div>   
        
      <div class="container">
          <div class="row">
              <div class="col-md-6">
          <h2>Features of online banking</h2>  
            <p style="font-size:18px;">The benefits of online banking cannot be merely described in few words.
               Ever wondered, the things you can do from home sitting in front of your PC without even 
               standing in queue for long hours? With the advent of online banking, things have got much easier.
               Be it requesting for adding money, withdrawing money, transferring of funds,
               taking a look at the transaction records or for requesting of ATM
               card, everything can be maintained here.
            </p>
              </div>
              <div class="col-md-6">
            <img src="features.jpg" class="img-responsive">
              </div>                
     </div> 
</div>
     
  <center><button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo">Contact Us</button></center>
     
     <div id="demo" class="collapse">
         <div class="row">
             <div class="col-sm-4">
               <h3>Kolkata Branch</h3>
               <label>Address: </label> Globsyn Buisness School, IBRAD buisness school, Keshtopur, Kolkata.<br>
               <label>Tel: </label> 033-456892/12<br>
               <label>Email: </label> kolkatabranch@mybank.ac.in
             </div>
             <div class="col-sm-4">
             <h3>Delhi Branch</h3>
             <label>Address: </label>Globsyn Buisness School, Sector V-A , Malviya Nagar, Delhi.<br>
             <label>Tel: </label> 013-456856/32<br>
             <label>Email: </label> delhibranch@mybank.ac.in
             </div> 
             <div class="col-sm-4">
             <h3>Mumbai Branch</h3>
             <label>Address: </label>Globsyn Buisness School, Near City Center, Kamarthalli, Mumbai<br>
             <label>Tel: </label> 013-456856/45<br>
             <label>Email: </label> mumbaibranch@mybank.ac.in
             </div>
        </div>   
     </div>     

  <div class="footer">
      <div class="row">
      <div class="col-sm-4">
          <h4>Must Read</h4>
          <ul>
              <li style="display:inline-block;"><a style="color:white;text-decoration:none;" href="safetytips.php">Safety Banking Tips</a></li>
          </ul>    
         </div>
          <div class="col-sm-4">
              <h4>Connect with Us</h4>    
              <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
              <a href="https://twitter.com/login" class="fa fa-twitter"></a>
              <a href="https://www.google.co.in/" class="fa fa-google"></a>
              <a href="https://www.instagram.com/?hl=en" class="fa fa-instagram"></a>
              <a href="https://www.linkedin.com/uas/login?_l=en" class="fa fa-linkedin"></a>
              <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
           </div>   
           <div class="col-sm-4">
               <h4><a style="color:white;text-decoration:none;" href="homepage.php">&copy;MyBank_2018</a><h4>
            </div>
    </div>
</div>
</body>    
</html>


   