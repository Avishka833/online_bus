<?php include('partials/menu.php');?>


<!-- Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Add routes</h1>
<br><br>
<?php 
 if(isset($_SESSION['add']))
 {
       echo $_SESSION['add'];
       unset($_SESSION['add']);
 }
 if(isset($_SESSION['upload']))
 {
       echo $_SESSION['upload'];
       unset($_SESSION['upload']);
 }



?>
<br><br>


<!-- Add routes Form Starts-->

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
    <tr>
<td>Title:</td>
<td>
    <input type="text" name="title" placeholder="routes Tittle">
</td>

    </tr>

<tr>
    <td>Select Image</td>
    <td>
        <input type="file" name="image">
    </td>
</tr>



    <tr>
        <td>Featured</td>
        <td>
            <input type="radio" name="featured" value="Yes"> Yes
            <input type="radio" name="featured" value="No"> No
        </td>
    </tr>
    <tr>
        <td>Active</td>
        <td>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="Add routes" class="btn-secondary">
        </td>
    </tr>


</table>
</form>
<!-- Add routes Form Ends-->
<?php 
//Check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Clicked";

    // 1. Get the value from form
    $title =$_POST['title'];

    //For radio input we need to check whether the button is selected or not
    if(isset($_POST['featured'])){

        //Get the value from form
        $featured = $_POST['featured'];
    }
    else
    {
        //Set the default value
        $featured = "No";

    }

if(isset($_POST['active']))
{
    $active = $_POST['active'];
}
else
{
$active ="No";
}


//Check whether the image is selected or not and set the value for image name accordingly
//print_r($_FILES['image']);


//die();//Break the code here
if(isset($_FILES['image']['name']))
{
    $image_name = $_FILES['image']['name'];

    //Upload the image only if image is selected
    if($image_name !="")
    {

        //Auto rename our image
//create the extention of our image
$ext = end(explode('.',$image_name));
//rename the image 
$image_name="buses_routes_".rand(000,999).'.'.$ext;//e.g Buses_routes_223.jpg

   

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path ="../images/routes/".$image_name;


    //Finally Upload the image
$upload = move_uploaded_file($source_path, $destination_path);

//Check whether the image is uploaded or not
//And if the image is not uploaded then will stop the process and redirrect with error message
if($upload==false)
{
    //Set message
    $_SESSION['upload']="<div class='error'> Failed to upload the image.</div>";
    //Redirrect to add routes page 
    header('location:' .SITEURL.'Admin/add_routes.php');
    //sop the prosess
    die();
}
}
}
else
{
    $image_name="";


}



// 2. Create sql query to insert routes into database
$sql = "INSERT INTO tbl_routes SET
title = '$title',
image_name='$image_name',
featured='$featured',
active ='$active'




";
//3.Execute the query and save in databse
$res = mysqli_query($conn,$sql);


//4.Check whether the query is executed or not and data aded or not
if($res==true)
{
    //Query Executed and routes Aded
    $_SESSION['add'] = "<div class='success'> routes Aded Successfully.</div>";
    //Redirrect to Manage routes Page
    header('location:' .SITEURL.'Admin/manage_routes.php');
}
else
{
    //Failed to add routes
    $_SESSION['add'] = "<div class='error'> Failed to add routes.</div>";
    //Redirrect to Manage routes Page
    header('location:' .SITEURL.'Admin/manage_routes.php');
}

}






?>
</div>
</div>







<?php include('partials/footer.php');?>