<html>
<?php include ('C:\xampp\htdocs\online_bus\partials-front\menu.php');?>

<head>



    <!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


    <!-- [ Boot STYLESHEET ]
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">


</head>


<?php 
//Check Whether the id is passed or not
if(isset($_GET['routes_id']))
{
    //routes id is set and get the id
    $routes_id = $_GET['routes_id'];
    //Get the routes title based on routes ID
    $sql = "SELECT title  FROM tbl_routes WHERE id=$routes_id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Get the value from Database
    $row = mysqli_fetch_assoc($res);

    //Get the title
    $routes_title = $row['title'];
}
else
{
    //routes not passed
    //Redirrect to home page
    header('location:'.SITEURL);
}


?>
<br><br><br><br>
    <!-- buses sEARCH Section Starts Here -->
    <section class=" text-center">
        <div class="container">
            
            <h2>Buses on<a href="#" class="text-white">"<?php echo $routes_title; ?>"</a></h2>

        </div>
    </section>
    <!-- buses sEARCH Section Ends Here -->



    <!-- buses MEnu Section Starts Here -->
    <section class="buses-menu">
        <div class="">
            <h2 class="text-center">Buses Menu</h2>

            <?php 
            //Create SQL Query to Get buses based on selected routes
            $sql2 = "SELECT * FROM tbl_buses WHERE routes_id=$routes_id";
            //Execute the query
            $res2 = mysqli_query($conn,$sql2);
            //count The rows
            $count2 = mysqli_num_rows($res2);
            //Check Whether buses is available or not
            if($count2>0)
            {
                //buses is available
                while($row2=mysqli_fetch_assoc($res2))
                {   $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                    <div class="buses-menu-box">
                <div class="buses-menu-img">
                    <?php 
                    if($image_name=="")
                    {
                        //Image Not available
                        echo "<div class='error'>Image Not Available</div>";
                    }
                    else
                    {
                        //Image Available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/buses/<?php echo $image_name; ?>" alt="C.T.B" class="img-responsive img-curve">

                        <?php
                    }
                    
                    ?>
                    
                </div>

                <div class="buses-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="buses-price">$<?php echo $price; ?></p>
                    <p class="buses-detail">
                    <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?buses_id=<?php echo $id; ?>" class="btn btn-primary">Book Now</a>
                </div>
            </div>


                    <?php
        
                }
            }
            else
            {
                //buses not available
                echo "<div class='error'>buses Not Available</div>";
            }
            
            ?>

            

            


            <div class="clearfix"></div>

            

        </div>
        </div>

    </section>
    <!-- buses Menu Section Ends Here -->
    
    <?php include('partials-front\footer.php');?>
        
        </html>
   