
<?php include('partials/menu.php');?>

    
    
       
    
<!--Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Manage routes</h1>
<!-- Button to add routes -->

<?php 
 
     if(isset($_SESSION['add']))
 {  echo $_SESSION['add'];
       unset($_SESSION['add']);
 }
 if(isset($_SESSION['remove']))
 {
       echo $_SESSION['remove'];
       unset($_SESSION['remove']);
 }
 if(isset($_SESSION['delete']))
 {
       echo $_SESSION['delete'];
       unset($_SESSION['delete']);
 }
 if(isset($_SESSION['no_routes_found']))
 {
       echo $_SESSION['no_routes_found'];
       unset($_SESSION['no_routes_found']);
 }
 if(isset($_SESSION['update']))
 {
       echo $_SESSION['update'];
       unset($_SESSION['update']);
 }
 if(isset($_SESSION['upload']))
 {
       echo $_SESSION['upload'];
       unset($_SESSION['upload']);
 }
 if(isset($_SESSION['failed-remove']))
 {
       echo $_SESSION['failed-remove'];
       unset($_SESSION['failed-remove']);
 }


?>
<br><br>
<a href="<?php echo SITEURL; ?>Admin/add_routes.php" class="btn-primary">Add routes</a>
<br/> <br/> <br/>

<table class="tbl-full">
<tr>
<th>I.D</th>
<th>Title</th>
<th>Image</th>
<th>Featured</th>
<th>Active</th>
<th>Actions</th>
</tr>
<?php 
//Query to Get all routes from Database
$sql = "SELECT * FROM tbl_routes";

//Execute Query
$res = mysqli_query($conn,$sql);
//count rows
$count = mysqli_num_rows($res);

//Create serial number variable and assign value as 1
$sn =1;


//Check whether we have data in database or not
if($count>0)
{
       //We have data in database
       //Get the data and display
       while($row=mysqli_fetch_assoc($res))
       {
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];

              ?>
              <tr>
 <td><?php echo $sn++ ?></td>
 <td><?php echo $title ?></td>

 <td>
       <?php 
       //Check whether the image is available or not
       if($image_name!="")
       {
            //Display the image

            ?>

            <img src="<?php echo SITEURL;?>images/routes/<?php echo $image_name; ?>" width="100px">

            <?php
       }
       else
       {
           //Display the Message
           echo " <div class='error'>Image not Added.</div>";
       }
       
       ?>
</td>

 <td><?php echo $featured ?></td>
 <td><?php echo $active ?></td>
 
 <td>
 <a href="<?php echo SITEURL;?>Admin/update_routes.php?id=<?php echo $id; ?>" class="btn-secondary">Update routes</a>
        <a href="<?php echo SITEURL; ?>Admin/delete_routes.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete routes</a>
        
        
 </td>
</tr>


              <?php
       }
}
else
{
       //We do not have data
       //We will display the message inside table
       ?>
       <tr>
              <td colspan="6"><div class="error"> No routes Added</div></td>
       </tr>

       <?php
}

?>







</table>
   
</div>   
</div>      
    
<!--Main Section Ends -->

<!--Footer Section Starts -->
<?php include('partials/footer.php');?>