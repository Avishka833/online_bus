<html>
<div class="buses-search2">
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

 <!-- Buses sEARCH Section Starts Here -->
 <br><br>
 <section class="buses-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>buses-search.php" method="POST">
                <input class="search2" type="search" name="search" placeholder="Search for buses.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Buses sEARCH Section Ends Here -->
</div>

    <!-- routes Section Starts Here -->
    <section class="routes">
        <div class="main-Content ">
            <h2 class="text-center">Routes</h2>

            <?php 
            
           //Display all the routes that are active
           //sql query
           $sql = "SELECT * FROM tbl_routes WHERE active='yes'";
           //Execute the query
           $res = mysqli_query($conn, $sql);
           //Count Rows
           $count = mysqli_num_rows($res);
           //Check Whether routes Available or not
           if($count>0)
           {
            //routes Available
            while($row=mysqli_fetch_assoc($res))
            {
                //Get The values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                 <a href="<?php echo SITEURL; ?>routes-buses.php?routes_id=<?php echo $id; ?>">
            <div class=" box-3  float-container">
                <?php 
                if($image_name=="")
                {
                    //image not available
                    echo "<div class='error'>Image not found.</div>";
                }
                else
                {
                    //image Available
                   ?> 
                   <img src="<?php echo SITEURL; ?>images/routes/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                   <?php
                }
                
                ?>
                
                  <br>
                <h3 class="text-black"><?php echo $title; ?></h3>
            </div>
            </a>

                <?php
            }
           }
           else
           {
            //routes not available
            echo "<div class='error'> routes not found.</div>";
           }
            
            ?>

           

<div class="clearfix">

</div>
  </div>
   </div>
    </section>
    <!-- routes Section Ends Here -->

         <!--Footer Section Starts -->
    <?php include('partials-front\footer.php');?>
    </html>