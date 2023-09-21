<?php include('partials/menu.php');?>

<!--Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Update routes</h1>
<!-- Button to add order -->
<br/><br/>
<?php 
//Check whether the id is set or not
if(isset($_GET['id']))
{
    //echo "Getting data";
    //Get the id and all other details

    $id = $_GET['id'];
    //Create sql query to get all other details
    $sql="SELECT * FROM tbl_routes WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);
    //Count the rows to check whether id is valid or not
    $count = mysqli_num_rows($res);
    if($count==1)
    {
          //Get all the data
          $row = mysqli_fetch_assoc($res);
          $title = $row['title'];
          $current_image = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];
    }
    else
    {
        //Redirrect to manage routes with session message
        $_SESSION['no_routes_found']="<div class='error'>routes not found.</div>";
        header('location:'.SITEURL.'Admin/manage_routes.php');
    }
}
else
{
    //Redirrect to manage routes
    header('location:'.SITEURL.'Admin/manage_routes.php');
}



?>





<form action="" method="POST" enctype="multipart/form-data">


<table class="tbl-30">
    <tr>
        <td>Title:</td>
        <td>
            <input type="text" name="title" value="<?php echo $title;?>">
        </td>
    </tr>
    <tr>
        <td>Current Image:</td>
        <td>
            <?php 
            if($current_image !="")
            {
                //Display the image
                ?>
                <img src="<?php echo SITEURL;?>images/routes/<?php echo $current_image;?>" width="150px">

                <?php
            }
            else
            {
                //display Message
                echo "<div class='error'>Image Not found.</div>";
            }
            
            ?>
        </td>

    </tr>
    <tr>
        <td>New Image</td>
        <td>
            <input type="file" name="image">
        </td>
    </tr>
    <tr>
        <td>Features:</td>
        <td>
            <input <?php  if($featured=="Yes"){ echo "Checked";}?> type="radio" name="featured" value="Yes"> Yes

            <input <?php  if($featured=="No"){ echo "Checked";}?> type="radio" name="featured" value="No"> No
        </td>
    </tr>
    <tr>
        <td>Active</td>
        <td>
        <input <?php  if($active=="Yes"){ echo "Checked";}?> type="radio" name="active" value="Yes"> Yes

            <input  <?php  if($active=="No"){ echo "Checked";}?> type="radio" name="active" value="No"> No
           
        </td>
    </tr>
    <tr>
        <td>
            <input type="hidden" name="current_image" value=" <?php echo $current_image;?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update routes" class="btn-secondary">
        </td>
    </tr>

</table>
</form>
<?php 


if(isset($_POST['submit']))
{
    //echo "Clicked";
    //1.Get all the values from our form
    $title =$_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
// 2.Updating New Image idf selected 
//Check whether the image is selected or not
if(isset($_FILES['image']['name']))
{
    
     //Image available
            // A.Upload the new Image
             //Auto rename our image
//create the extention of our image
$extention = end(explode('.',$image_name));
//rename the image 
$image_name="buses_routes_".rand(0000,9999).'.'.$extention;//e.g buses_routes_223.jpg

   

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path ="../images/routes/".$image_name;


    //Finally Upload the image
$upload = move_uploaded_file($source_path, $destination_path);

//Check whether the image is uploaded or not
//And if the image is not uploaded then will stop the process and redirrect with error message
if($upload!=false)
{
    //Set message
    $_SESSION['upload']="<div class='error'> Failed to upload the image.</div>";
    //Redirrect to add routes page 
    header('location:' .SITEURL.'Admin/add_routes.php');
    //sop the prosess
    die();
}
//B.Remove the current image if available
if($current_image!="")
{
    $remove_path ="../images/routes/".$current_image;

    $remove = unlink($remove_path);
    
    //Check whether the image image is removed or not
                    //if failled to remove then display message and stop the process
                    if($remove==false)
                {
                 //Failed to remove the current image
                 $_SESSION['failed-remove'] = "<div class='error'> Failed to remove current image.</div>";
                 header('location:' .SITEURL.'Admin/manage_routes.php');
                 die();//stop the procces
    
    
    
                }


}


}






else
{

    $image_name = $current_image;
}



// 3. Update the database
$sql2 = "UPDATE tbl_routes SET 
    title = '$title',
    image_name ='$image_name',
    featured = '$featured',
    active ='$active'
    WHERE id=$id
    ";
    //Execute the query
    $res2 = mysqli_query($conn, $sql2);
    


//4.Redirrected to Manage Ctegories with Message
    //Check whether executed or not

    if($res2==true)
    {
        //routes Updated
        $_SESSION['update'] = "<div class='success'> routes updated succesfully.</div>";
        header('location:' .SITEURL.'Admin/manage_routes.php');
    }
    else
    {
        //Failed to update routes
        $_SESSION['update'] = "<div class='error'> Failed to Update the routes.</div>";
        header('location:' .SITEURL.'Admin/manage_routes.php');
    }
}

?>
       
</div>
    </div>


<?php include('partials/footer.php');?>