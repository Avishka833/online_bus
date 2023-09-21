<div class="buses-search2">
<?php include ('C:\xampp\htdocs\online_bus\partials-front\menu.php');?>
<br><br>
<head>



    <!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


    <!-- [ Boot STYLESHEET ]
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">


</head>

    <!--Buses sEARCH Section Starts Here -->
    <section class="buses-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>buses-search.php" method="POST">
                <input class="search2" type="search" name="search" placeholder="Search for buses.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
</div>
    <!--Buses sEARCH Section Ends Here -->



    <!--Buses MEnu Section Starts Here -->
    <section class="buses-menu">
        <div class="main-Content">
            <h2 class="text-center">buses Menu</h2>
            <?php 
            //DisplayBusess that Are  Active
            $sql = "SELECT * FROM tbl_buses WHERE active='Yes'";

            //Execute the query$res=
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check whther the buses are available or not
            if($count>0)
            {
                //buses Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the value
                    $id = $row['id'];
                    $title=$row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name =$row['image_name'];
                    ?>

                <div class="buses-menu-box">
                <div class="buses-menu-img">
                <?php 
                //Check whether the image is available or not
                if($image_name=="")
                {
                    //Image Not available
                    echo "<div class='error'>Image Not Available</div>";
                }
                else
                {
                    ?>
                      <img src="<?php echo SITEURL;?>images/buses/<?php echo $image_name  ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
                }
                
                ?>
                    
                </div>

                <div class="buses-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="buses-price">$<?php echo $price ?></p>
                    <p class="buses-detail">
                    <?php echo $description ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?buses_id=<?php echo $id; ?>" class="btn btn-primary">order Now</a>
                </div>
            </div>

                    <?php
                }
            }
            else
            {
                //buses not available
                echo "<div class='error'>buses Not Found.</div>";
            }
            
            
            ?>

           

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!--Buses Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>