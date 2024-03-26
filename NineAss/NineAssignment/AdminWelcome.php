<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'assignment');
$sql= "SELECT * FROM event";
$result = mysqli_query ($con,$sql);

if(!isset($_SESSION["sess_user"])){
 header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Welcome Form</title> 
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet" />

  <link href="css/responsive.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    #logout button{
      position: fixed;
      bottom:5%;
left:50%;
      transform: translateY(-50%);
      background-color: #f00; 
      padding: 10px;
      color: #fff; 
      text-decoration: none;
      border-radius: 5px;
      cursor: pointer;
    }
    #logout button:hover {
      background-color: #d00;
    }
  </style>
 </head>
<body>

<div class="hero_area">
  
    
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand mr-5" href="index.html">
            <img src="images/TMC.jpeg" alt="">
            <span>
              TMC Admin View 
            </span>
          </a>
</nav>
          
    </div>
    <a href="logout.php" id="logout"><button>Logout</button></a>
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <h6 class="display-10 text-center">Welcome, <?php echo ($_SESSION["sess_user"])?></h6>
            <h4 class="display-6 text-center">Event Registered Users</h4>            
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <tr class="bg-dark text-white">
                <th>Register id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>BirthDate</th>
                <th>Address</th>
                <th>Event name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              <tr>
                <?php
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['birth']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['events']; ?></td>
                <td><a href="update.php?updateid=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
                <td><a href="delete.php?deleteid=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
              </tr>
                <?php
                }
                ?>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</div>
<script src="../js/logout.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>