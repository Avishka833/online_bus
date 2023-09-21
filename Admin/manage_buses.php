<?php include('partials/menu.php');?>

        <!--Main Section Starts -->
        <div class="main-Content">
        <div class="wrapper">
        <h1>Manage buses</h1>
        
        <br/><br/>
        <?php
        if(isset($_SESSION['add']))
        { 
            echo $_SESSION['add'];
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

                    if(isset($_SESSION['upload']))
                    { 
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                        }

                        if(isset($_SESSION['update']))
                    { 
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                        }
                        if(isset($_SESSION['failed-remove']))
                    { 
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                        }
        

        ?>
        <br><br>
        
        <!-- Button to add buses -->
        <a href="<?php echo SITEURL; ?>Admin/add_buses.php"class="btn-primary">Add buses</a>
<br/> <br/> <br/>

        <table class="tbl-full">
<tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>

</tr>
<?php
//Create a SQL query to get all the buses
$sql = "SELECT * FROM tbl_buses";

//Execute the query
$res = mysqli_query($conn,$sql);

//Count Rows to Check Whether we have Busess
$count =mysqli_num_rows($res);
//Create  Serial Number Variable and set default value as 1
$sn=1;
if($count>0)
{
    //We have Buses in database
    //Gets the Busess from database and display
    while($row=mysqli_fetch_assoc($res))
    {
        //Get the values from individual Columns
        $id = $row['id'];
        $title =$row['title'];
        $price =$row['price'];
        $image_name = $row['image_name'];
        $featured =$row['featured'];
        $active = $row['active'];
        ?>

<tr>
    <td><?php echo $sn++;?></td>
    <td><?php echo $title;?></td>
    <td><?php echo $price;?></td>

    <td>
    <?php 
       //Check whether the image is available or not
       if($image_name!="")
       {
            //Display the image

            ?>

            <img src="<?php echo SITEURL;?>images/buses/<?php echo $image_name; ?>" width="100px">

            <?php
       }
       else
       {
           //Display the Message
           echo " <div class='error'>Image not Added.</div>";
       }
       
       ?>
    </td>

    <td><?php echo $featured;?></td>
    <td><?php echo $active;?></td>
    <td>
        <a href="<?php echo SITEURL; ?>Admin/update_buses.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Update buses</a>
        <a href="<?php echo SITEURL; ?>Admin/delete_buses.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete buses</a>
    </td>
</tr>
        <?php
    }
}
else
{
    //Buses not Added in database
    echo "<tr> <td colspan='7' class='error'>buses Not Added Yet.</td> </tr>";
}





?>








                
      
</table>
           
</div>   
</div>      
            
        <!--Main Section Ends -->





        <?php include('partials/footer.php');?>