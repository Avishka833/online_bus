<?php 

//Include Constants file
include('../config/constants.php');

//echo "Delete Page";
//Check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get the value and delete
    //echo "Get value and Delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //Remove the physical image file if available
    if($image_name != "")
    {
        //Image is available.So remove it
     $path="../images/buses/".$image_name;
     //Remove the image
     $remove = unlink($path);
     //If failed to remove image then add an error message and stop the proces
     if($remove==false)
     {
         //set the session Message 
         $_SESSION['remove']="<div class='error'> failed to remove buses image.</div>";
         //Redirrect to manageroutes page
         header('location:'.SITEURL.'Admin/manage_buses.php');
         //stop the process
         die();

     
    
     }
       
    }
    

    //Delete data from database
    //SQL query to delete the data from database
    $sql = "DELETE FROM tbl_buses  WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check whwthe the data is deleted from database or not
    if($res==true)
    {
          //set Success message and Redirrect
          $_SESSION['delete']="<div class='success'> buses Deleted Succesfully.</div>";
          //Redirrect to manageroutes
          header('location:'.SITEURL.'Admin/manage_buses.php');

    }
    else
    {
          //Set fail message and Redirrect
          $_SESSION['delete']="<div class='error'> Failed to delete buses.</div>";
          //Redirrect to manageroutes
          header('location:'.SITEURL.'Admin/manage_buses.php');

    }

    }


else
{
     
    //Redirrect to the manage routes page 
    header('location:'.SITEURL.'Admin/manage_buses.php');
}

?>