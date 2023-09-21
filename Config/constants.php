
<head>



    <!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


    <!-- [ Boot STYLESHEET ]
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<?php
//start the session
session_start();
//create constants to store non repeating values
define('SITEURL',"http://localhost/online_bus/");
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','online_bus');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD)or die(mysqli_error());//Database connection
$db_select = mysqli_select_db($conn,DB_NAME)or die(mysqli_error());//Selecting database

?>