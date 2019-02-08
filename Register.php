<?php 

 include 'connection.php'; 

$fnameErr=$lnameErr=$genderErr=$passErr=$emailErr=$repassErr=$dobErr=$countryErr=$commErr=$acErr="";
$fname=$lname=$gender=$pass=$email=$repass=$dob=$country=$conndb=$result=$acNo="";
$messRegister=$show="";
$flag= 0;



function test($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$conndb="SELECT email,acNo FROM dtbase";
$result=$conn->query($conndb);



if(isset($_POST["submit"]))
{
  if($result->num_rows>0)
  {
    while($row=$result->fetch_assoc()) 
    {
      if(($row["email"]==$_POST["email"])||($row["acNo"]==$_POST["acNo"]))
        {
          $messRegister="You have already registered";
          $flag= 1;
        }
    }   
  }
  if($flag==0)
  {

   if(empty($_POST["firstname"]))
    {
        $fnameErr="First name is reqired"; 
    }
    else{
      $fname=test($_POST["firstname"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $fnameErr = "Only letters and white space allowed";
      }
    }
    

    if(empty($_POST["lastname"])){
        $fnameErr="Last name is required"; 
    }
    else{
      $lname=test($_POST["lastname"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $fnameErr = "Only letters and white space allowed"; 
        
    }
  }  

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
      }
    }

    if(empty($_POST["acNo"])){
      $acErr= "A/C no is required";
    }
    else{
      $acNo=trim($_POST["acNo"]);

    }

    if(empty($_POST["pwd"])){
      $passErr="Password is required";
    } 
    else{
      $pass=$_POST["pwd"];
    }  
    
    if($_POST["repwd"]!=$_POST["pwd"])
    {
      $repassErr="The two passwords do not match ";
    }
    else
    {
      $repass=$_POST["repwd"];
    }

    if(($_POST["gen"]!="CG")){
      $gender=$_POST["gen"];
    }
    else{
         $genderErr="Gender is required";
    }

    if(empty($_POST["DOB"])){
      $dobErr="Date of birth is required";
    }
    else{
      $td=$_POST["DOB"];
      $td=date('Y-m-d',strtotime($td));
      $dob=$td;
    }

    if(empty($_POST["country"])){
      $countryErr="Country Name is reqiured";
    }
    else{
      $country=$_POST["country"];
    }

if(empty($fnameErr)&&empty($lnameErr)&&empty($emailErr)&&empty($repassErr)&&empty($repassErr)&&empty($genderErr)&&empty($dobErr)&&empty($countryErr)&&empty($acErr)){
   
  $hashed=base64_encode($pass); //encrypting the password before storing it in the database

   $sql="INSERT INTO dtbase(firstname,lastname,email,psword,dob,country,gender,acNo,status1)
      VALUES ('$fname','$lname','$email','$hashed','$dob','$country','$gender','$acNo','allowed')";

      $today=date("d/m/Y");

$sql1="INSERT INTO realtransaction(remacno,credit,debit,updated,date1)
VALUES ('$acNo','0','0','0','$today')";
if($conn->query($sql1)===TRUE)
{
   $f=1;

}
else
{
   echo "Error ". $conn->error;
}
$name=$fname." ".$lname;
$sql2="INSERT INTO atmrequest(remacno,name1,status1)
VALUES ('$acNo','$name','Not Requested Yet')";
if($conn->query($sql2)===TRUE)
{
   $f=1;

}
else
{
   echo "Error ". $conn->error;
}


 if($conn->query($sql)===TRUE)
 {
    $show="Successfully Registered!! Login in to your account with registered email and password";

 }
 else
 {
    echo "Error ". $conn->error;
 }
}
else{
  if(empty($repassErr)){
  $commErr="Please select a gender";}
  
} 

}


  }  //end of isset() 





$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>SignUp</title>
<link rel="shortcut icon" href="logo.ico" />
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, intial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="styleRegister.css">
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



<center><h1 id="heading">Sign Up</h1></center>

  <div class="container">
  
     <div class="row">
       <div class="col-lg-3"></div>
       
       <div class="col-lg-6">
         <div id="ui">
            
    <span class="error">*Required: <?php echo $commErr; echo $repassErr; echo $acErr?></span>  
    <span style="color:white;font-weight:bold;font-size:20px;"><?php echo $messRegister; ?></span>    
    <span style="color:white;font-weight:bold;font-size:14px;"><?php echo $show; ?></span>
  <form class="form-group" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

     <div class="row">               
       <div class="col-lg-6">
          <label>FirstName:</label><span class="error">*</span>
          <input type="text" name="firstname" placeholder="Firstname" class="form-control" maxlength="20" required>
       </div> 
                     
       <div class="col-lg-6">
          <label>LastName:</label><span class="error">*</span>
          <input type="text" name="lastname" placeholder="Lastname" class="form-control" maxlength="20" required>
       </div> 
     </div>
    
     <label>E-mail:</label><span class="error">*</span>
        <input type="email" name="email" placeholder="Email here" class="form-control" required>

      <label>Bank A/C No:</label><span class="error">*</span>
        <input type="text" name="acNo" placeholder="Bank A/C No here" class="form-control" maxlength="11" required>
   
  <div class="row">          
       <div class="col-lg-6">
         <label>Password:</label><span class="error">*</span>
           <input type="password" name="pwd" placeholder="Password" class="form-control" required>
       </div>                    
      <div class="col-lg-6">
        <label>Re-enter Password:</label><span class="error">*</span>
          <input type="password" name="repwd" placeholder="Re-enter" class="form-control" required>
      </div>  
  </div>    
      
      <label>Gender:</label><span class="error">*</span>
      <select class="form-control" name="gen" required>
        <option value="CG">Choose gender..</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
      </select>

      <div class="row">               
          <div class="col-lg-6">
             <label>Date Of Birth:</label><span class="error">*</span>
             <input type="date" name="DOB" class="form-control" required>
          </div> 
                        
          <div class="col-lg-6">
             <label>Country:</label><span class="error">*</span>
             <input type="text" name="country" placeholder="Your country" class="form-control" maxlength="20" required>
          </div>

    </div>
    <br>
    <p id="p2">Already have an account?<a href="Login.php"><b>Login</b></a></p>
    <br>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="alreadyRegistered">
            </form>
          </div>
       </div>
       <div class="col-lg-3"></div>
     </div>
  </div>

    </body>
</html>

<?php include 'footer.php'; ?>