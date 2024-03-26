<?php
// Check if updateid is set in the URL
if (isset($_GET['updateid'])) {
    $updateId = $_GET['updateid'];

    // Retrieve the record with the given regis_id
    $con = mysqli_connect('localhost', 'root', '', 'assignment');
    $sql = "SELECT * FROM event WHERE id = $updateId";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle the error, for example, by displaying a message and redirecting back to admin.php
        echo "Error: Unable to retrieve the record for updating.";
        header("Location: AdminWelcome.php");
        exit;
    }
} else {
    echo "Error: Missing updateid parameter.";
    header("Location: AdminWelcome.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedName = mysqli_real_escape_string($con, $_POST['name']);
    $updatedEmail = mysqli_real_escape_string($con, $_POST['email']);
    $updatedPhone = mysqli_real_escape_string($con, $_POST['phone']);
    $updatedGender= mysqli_real_escape_string($con, $_POST['gender']);
    $updatedAddress = mysqli_real_escape_string($con, $_POST['address']);
    $updatedEvent = mysqli_real_escape_string($con, $_POST['events']);
    $updatedBirth = mysqli_real_escape_string($con, $_POST['Birth']);

    $updateSql = "UPDATE event SET
                  name = '$updatedName',
                  email = '$updatedEmail',
                  phone= '$updatedPhone',
                  gender = '$updatedGender',
                  address = '$updatedAddress',
                  events = '$updatedEvent',
                  birth ='$updatedBirth'
                  WHERE id = $updateId";
    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        
        header("Location: AdminWelcome.php");
        exit;
    } else {
        
        echo "Error: Unable to update the record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {background-color: #2C2A2A;}
    * {color: #fff;}
    .main-form {
      margin: auto;
      width: 45%;
    }
    #logout {
      position: fixed;
      top:5%;
      right:5%;
      transform: translateY(-50%);
      background-color: #f00; 
      padding: 10px;
      color: #fff; 
      text-decoration: none;
      border-radius: 5px;
      cursor: pointer;
    }
    #logout:hover {
      background-color: #d00;
    }
    #updatebtn {
      position:relative;
left:35%
}
  </style>
</head>
<body>
<a href="logout.php" id="logout">Logout</a>
    <form method="POST" class="main-form">
        <label for="name" class="form-label mt-5"> Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control"><br>

        <label for="email" class="form-label">Email Address:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control"><br>

        <label for="phone" class="form-label">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control"><br>

        <label for="gender" class="form-label">Gender:</label>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control"><br>
       
        <label for="Birth" class="form-label">Birth:</label>
        <input type="text" name="Birth" value="<?php echo $row['birth']; ?>" class="form-control"><br>

        <label for="address" class="form-label">Address:</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control"><br>

        <label for="events" class="form-label">Events</label>
        <input type="text" name="events" value="<?php echo $row['events']; ?>" class="form-control"><br>

       

        <input type="submit" value="Update" class="btn btn-light" id="updatebtn">
    </form>
    <script src="../js/logout.js"></script>
</body>
</html>

