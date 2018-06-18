<?php 
session_start();
unset($_SESSION['PERSONA']);
header('location: ../login.php');

 ?>