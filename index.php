<div class="buses-search2">
<?php include ('partials-front\menu.php');?>
<br><br>
<link rel="stylesheet" href="css/style.css">




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
    <section class="text-center buses-search">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>buses-search.php" method="POST">
                <input class="search2" type="search" name="search" placeholder="Search for buses.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary ">
            </form>

        </div>
    </section>
    <!--Buses sEARCH Section Ends Here -->

</div>
    
    <?php 
    
    if(isset($_SESSION['order']))
              {

                  echo $_SESSION['order'];
                  unset($_SESSION['order']);

              }
    
    ?>
            
    

    <!-- routes Section Starts Here -->
    <section class="routes">
        <div class="main-menu">
            <h2 class="text-center">Explore Buses</h2>

            

            <?php
            //Create Sql Query to display routes from datapase
            $sql = "SELECT * FROM tbl_routes WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //Execute The Query
            $res = mysqli_query($conn, $sql);
            //Count Rows to Check Whether the gory is Available
            $count = mysqli_num_rows($res);
            if($count>0)
            {
               //routes Available
               while($row=mysqli_fetch_assoc($res))
               {
                //Get the values Like title ,Image_name
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
            <a href="<?php echo SITEURL; ?>routes-buses.php?routes_id=<?php echo $id; ?>">
            <div class="box-3 float-container">

            <?php 
            //Check whwther the image is available or not
            if ($image_name=="")
            {
                //Display Message
                echo "<div class='error'>image not available.</div>";
            }
            else
            {
                //Image Available
                ?>
              <img src="<?php echo SITEURL;?>images/routes/<?php echo $image_name; ?>" alt="Routes" class="img-responsive img-curve">
                <?php
            }
            
            ?>
               <br>
               <h3 class=""><?php echo $title;?></h3>
                
            </div>
           

            
            </a>
            

                <?php
               }
            }
            else{
                //routes Not Available
                echo "<div class='error'>routes Not Added.</div>";
            }
            
            ?>

           
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- routes Section Ends Here -->

    <!--Buses MEnu Section Starts Here -->
    <section class="buses-menu">
        <div class="main-menu">
            <h2 class="text-center">Buses List</h2>
            <?php 
            //getting buses From database
            //Sql Query
            $sql2 = "SELECT * FROM tbl_buses WHERE active='YES' AND featured='YES' LIMIT 6";
            //Execute the query
            $res2 = mysqli_query($conn, $sql2);
            //Count Rows
            $count2 = mysqli_num_rows($res2);
            //Check Whwther buses Available Or not
            if($count2>0)
            {
               //buses Available
               while($row=mysqli_fetch_assoc($res2))
               {
                //Get All the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>
                 <div class="buses-menu-box">
                <div class="buses-menu-img">
                <?php 
                //Check Whether The image is available or not
                if ($image_name=="")
                {
                    //Image not available 
                    echo "<div class='error'>Image not available.</div>";
                }
                else
                {

                    //Image Available
                    ?>
                    <img src="<?php SITEURL; ?>images/buses/<?php echo $image_name;?>" alt="buses" class="img-responsive img-curve">

                    <?php
                }
                ?>
                    
                </div>

                <div class="buses-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="buses-price">$<?php echo $price;?></p>
                    <p class="buses-detail">
                    <?php echo $description;?>
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
              //buses not Available
              echo "<div class='error'>buses not Available.</div>";
         
            }
            
            ?>

           

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All buses</a>
        </p>
    </section>
    <!-- buses Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>

   