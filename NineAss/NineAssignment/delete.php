<?php
$con = mysqli_connect('localhost', 'root', '', 'assignment');
if(isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];
  $query = "DELETE FROM event where id = $id";
  $result = mysqli_query($con,$query);
  if($result) {
    header('Location:AdminWelcome.php');
  } else {
    echo "delete process failed";
  }
}
?>