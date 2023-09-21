<?php include('partials/menu.php');?>

    <!--Main Section Starts -->
    <div class="main-Content">
    <div class="wrapper">
        <h1>DASH BOARD</h1>

        <br><br>
        <?php 

              if(isset($_SESSION['login']))
              {

                  echo $_SESSION['login'];
                  unset($_SESSION['login']);

              }

              ?>
              <br><br>
        <div class = "col-4 text-center">
            <?php 
            //SQL Query
            $sql = "SELECT * FROM tbl_routes";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);
            
            
            ?>
            <h1><?php echo $count; ?></h1>
</br>
            routes
            
            
            
            
        </div>
        <div class = "col-4 text-center">
        <?php 
            //SQL Query
            $sql2 = "SELECT * FROM tbl_buses";
            //Execute Query
            $res2 = mysqli_query($conn, $sql2);
            //Count Rows
            $count2 = mysqli_num_rows($res2);
              
        ?>
            <h1><?php echo $count2; ?></h1>
</br>
           buses
            
            
            
            
        </div>
        <div class = "col-4 text-center">
        <?php 
            //SQL Query
            $sql3 = "SELECT * FROM tbl_order";
            //Execute Query
            $res3 = mysqli_query($conn, $sql3);
            //Count Rows
            $count3 = mysqli_num_rows($res3);
            
            
        ?>
            <h1><?php echo $count3; ?></h1>
</br>
            Total order
            
            
            
            
        </div>
        <div class = "col-4 text-center">
            <?php 
            //Create SQL Query to Get total Revenue Generated
            //Aggregate Function in SQL
            $sql4 = "SELECT sum(total) AS Total FROM tbl_order WHERE status='delivered'";
            //Execute the query
            $res4 = mysqli_query($conn, $sql4);
            //Get the Value
            $row4 = mysqli_fetch_assoc($res4);
            //Get the total revenue
            $total_revenue = $row4['Total'];
    
            ?>
            <h1>$<?php echo $total_revenue; ?></h1>
</br>
            Revenue Generated
            
            
            
            
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    <!--Main Section Ends -->

    <?php include('partials/footer.php');?>