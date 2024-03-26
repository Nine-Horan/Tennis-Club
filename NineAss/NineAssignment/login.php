<!DOCTYPE html>
<html>
<head>
 <meta charset = 'utf-8'>
 <title>TMC Student Club</title>
 <link rel="stylesheet" type="text/css" href="style3.css"/>
 <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  

<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />


  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
<center>
<img src="images/TMC.jpeg" margin="auto" width="100px" height="100px"></img>
<p>
<nav>
 <div class="topnav" id="myTopnav">
 <a href="home.html">Home</a>
 <a href="about.html">About</a>
 <a href="events.html">Events</a>
 </div>
</nav>
</p>
</center>
<div class="wrapper">
        <div class="title"><span>Admin Login</span></div>
        <form action="#" method="POST" id="loginform">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="user" placeholder="Name" required id="login">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="pass" id="login" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Login" name="submit" id="butt"> 
        
  </div>
</center>
<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
 $user=$_POST['user'];
 $pass=$_POST['pass'];
 $con=mysqli_connect('localhost','root','','assignment') or die(mysql_error());
 $query=mysqli_query($con,"SELECT * FROM nine WHERE name='".$user."' AND password='".$pass."'");
 $numrows=mysqli_num_rows($query);
 if($numrows!=0)
 {
 while($row=mysqli_fetch_assoc($query))
 {
 $dbusername=$row['name'];
 $dbpassword=$row['password'];
 }
 if($user == $dbusername && $pass == $dbpassword)
 {
 session_start();
$_SESSION['sess_user']=$user;
 header("Location: AdminWelcome.php");
 }
 } else {
 echo "Invalid username or password!";
 }
} else {
 echo "All fields are required!";
}
}
?>
</body>
</html>