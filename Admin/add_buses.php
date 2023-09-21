<?php include('partials/menu.php');?>

 <!--Main Section Starts -->
 <div class="main-Content">
        <div class="wrapper">
        <h1>Add buses</h1>
        
        <br/><br/>
        <?php
        if(isset($_SESSION['upload']))
          {  
            echo $_SESSION['upload'];
           unset($_SESSION['upload']);
        }
       ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr> 
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of the buses">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Description of the buses"></textarea>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>
            <tr>
                <td>Select Image :</td>
                <td>
                    <input type="file" name="image">
            </td>
            </tr>
            <tr>
                <td>routes:</td>
                <td>
                    <select name="routes">
                        <?php
                        //Create PHP code to display routes from database
                        //1. Create SQL to get all active routes from database

                        $sql ="SELECT * FROM tbl_routes WHERE active='yes'";
                        //Executing the query
                        $res =mysqli_query($conn,$sql);
                        //Count rows to Check whether we have routes or not
                        $count = mysqli_num_rows($res);
                        //If count is greater than zero, we have routes else we do not have routes
                        if($count>0)
                        {
                            //We have routes
                           while($row=mysqli_fetch_assoc($res))
                           {
                            //Get the details of routes
                            $id = $row['id'];
                            $title = $row['title'];
                            ?>

                            <option value="<?php echo $id; ?>"> <?php echo $title;?></option>

                            <?php
                           }
                    
                        }
                        else
                        {
                            //We do not have routes
                            ?>
                         <option value="0">No routes Found</option>
                            <?php
                        }

                        //IF
                        //2.Display on dropdown
                        ?>
    
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="add buses" class="btn-secondary">
                </td>
            </tr>


        </table>
        </form>

        <?php 
        //Check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
            //Add the Buses in Database
            //echo "Clicked";
            //1. Get the dat from Form
            $title = $_POST['title'];
            $description =$_POST['description'];
            $price = $_POST['price'];
            $routes = $_POST['routes'];

            //Check whether radio button for featured and active are checked or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No"; //Setting the default value
            }





            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active ="No";
            }


            
            //2.Upload the image is selected
            //Check whether the select image is clicked or not and upload the image only if the image is selected
            if(isset($_FILES['image']['name']))
            {
                //Get the details of the selected image
                $image_name =$_FILES['image']['name'];
                //Check whether the image is selected or not and upload image only if selected 
                if($image_name!="")
                {
                    //Image is selected
                    //A.Rename the image
                    //Get the extention of selected image
                    $ext = end(explode('.', $image_name));
                    //Create new name for Image
                    $image_name ="buses-name-".rand(0000,9999).".".$ext;//New image name may be"buses_name_"


                    //B. Upload the image

                    //Get the source path destination path

                    //Source path is the current location of the image
                    $source_path = $_FILES['image']['tmp_name'];
                    //Destination path for thrr image to be uploaded
                    $distination_path = "../images/buses/".$image_name;

                    //Finally Upload the buses image
                    $upload = move_uploaded_file( $source_path, $distination_path);

                    //Check whether image uploaded or not
                    if($upload==false)
                    {
                      //failed to upload the image
                      //Redirrected to the add Buses page with error mesage
                      $_SESSION['upload'] ="<div class='error'> Failed to upload the image.</div>";
                      header('location:'.SITEURL.'Admin/add_buses.php');
                      //Stop the process
                      Die();

                    }
                }
            }
            else
            {
                $image_name="";//Setting default value as blank
            }

            //3.Insert into Database
            //Create a sql query to Save or add Buses
            //For numerical we dont need pas value inside '' but string value it is compulsary to add uote ''
            $sql2 = "INSERT INTO tbl_buses SET
            title ='$title',
            description = '$description',
            price =$price,
            image_name = '$image_name',
            routes_id =$routes,
            featured = '$featured', 
            active ='$active'
            ";
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
            //Check whether data inserted or not
            
            //4.Redirrect with message to Manage Buses page
            // if($res2== true)
            // {
            //        //Data inserted successfully

            //        $_SESSION['add'] = "<div class='success'>buses Added Successfully.</div>";
            //        header('location:'.SITEURL.'Admin/manage_buses.php');
            // }
            // else
            // {
            //        //Failed to insert data
            //        $_SESSION['add'] = "<div class='error'>Failed to added the buses.</div>";
            //        header('location:'.SITEURL.'Admin/manage_buses.php');
            // }
             
        }
       
        
        
        ?>
</div>
</div>


<?php include('partials/footer.php');?> 