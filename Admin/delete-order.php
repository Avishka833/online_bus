<?php

//include constants.php file here
include('../config/constants.php');

// 1.get the ID of Admin to be deleted
$id = $_GET['id'];

// 2.Create SQL Query to delete admin
$sql = "DELETE FROM tbl_order WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

//check whether the query executed successfully
if($res==true)
{   
    //Query Executed Successfully and admin deleted
    //echo "Admin Deleted";
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'>order Deleted Successfully.</div>";
    //Redirrect to manage admin page
    header('location:'.SITEURL.'admin/manage_orders.php');
}
else
{
    //Failed to delete admin
   //echo "Failed to delete admin";
   $_SESSION['delete']="<div class='error'>Failed to delete order. Try again Later.</div>";
   header('location:'.SITEURL.'admin/manage_orders.php');

}

//3. Redirrect to manage Admin page with message(success/error)

?>