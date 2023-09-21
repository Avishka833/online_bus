<?php 
//Include constats.php for SITEURL
include('../Config/constants.php');

//.destroy the sesion 
session_destroy(); //Unset $_SESSION['user']



//Redirrect to login page
header('location:' .SITEURL.'admin/login.php');



?>