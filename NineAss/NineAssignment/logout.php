<?php
 session_start();
if(isset($_SESSION["sess_user"])){
 session_destroy();
header('Location: login.php');
 }
 else{
 header('Location: home.html');
 }
?>