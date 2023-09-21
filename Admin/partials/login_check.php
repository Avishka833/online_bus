<?php
//Authorization - access control


//Check whether the user is logged in or not
if(isset($_SESSION['user']))// User swssion is not set 
{


}
else{
    //user is not loged in
//Redirrect to login page with message
$_SESSION['no-login-message'] = "<div class ='error text-center'>Please Login To Access Admin Pannel.</div>";
//Redirrect to login page
header('location:'.SITEURL.'Admin/login.php');

}



?>