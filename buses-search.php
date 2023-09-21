<div class="buses-search2">
<head>



<!-- [ FONT-AWESOME ICON ] 
    
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


<!-- [ Boot STYLESHEET ]
    
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">


</head>

<?php include ('C:\xampp\htdocs\online_bus\partials-front\menu.php');?>

    <!-- Buses sEARCH Section Starts Here -->
    <section class="buses-search text-center">
        <div class="container">
        <?php
             //Get the search Keyword
             $search = $_POST['search'];
            
            ?>
            
            <h2>Buses on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
</div>
    <!-- Buses sEARCH Section Ends Here -->



    <!-- Buses MEnu Section Starts Here -->
    <section class="buses-menu">
        <div class="main-Content">
            
            <h2 class="text-center">Buses Menu</h2>

            <?php 
           
            //Sql Query to get Buses based on search keyword
            $sql ="SELECT * FROM tbl_buses WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check Whether Buses available or not
            if($count>0)
            {
               //buses Available
               while($row=mysqli_fetch_assoc($res))
               {
                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

                ?>
                <div class="buses-menu-box">
                <div class="buses-menu-img">
                    <?php 
                    //Check whether the image name is available or not
                    if($image_name=="")
                    {
                        //Image not available
                        echo "<div class ='error'>Image not available.</div>";
                        
                    }
                    else
                    {
                        //Image available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/buses/<?php echo $image_name; ?>"alt="Chicke Hawain Pizza" class="img-responsive img-curve"> 

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

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>

                <?php

               }
            }
            else
            {
                //buses Not Available
                echo "<div class='error'>buses Not Found </div>";

            }
            
            ?>

            

           
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Buses Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>