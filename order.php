<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bus Reservation</title>
   
    
    <!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


<!-- [ Boot STYLESHEET ]
    
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">


</head>
<body>

<div class="buses-search2">
<?php include ('C:\xampp\htdocs\online_bus\partials-front\menu.php');?>

<?php 
//Check whether the buses id is set or not
if(isset($_GET['buses_id']))
{
    //Get the buses id and details of the selected buses
    $buses_id = $_GET['buses_id'];
    //Get the details of the selected buses
    $sql = "SELECT * FROM tbl_buses WHERE id=$buses_id";
    //Execute the query
    $res = mysqli_query($conn, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //Check Whether the data is available or not
    if($count==1)
    {
      //We have Data 
      //Get the data from database
      $row = mysqli_fetch_assoc($res);
      $title = $row['title'];
      $price = $row['price'];
      $image_name = $row['image_name'] ;
    }
    else
    {
     //buses not Available
     //Redirrect to homepage
     header('location:'.SITEURL);
    }
}
else
{
    //Redirrect to Home page
    header('location:'.SITEURL);
}

?>

<section class="">
        <div class="main-content">
            
            <h2 class="text-center">Fill this form to confirm your order.</h2>
            
            <form action="" method="POST" class="order ">
            <legend>Selected buses</legend>
            <fieldset class="order-form text-blue">
                    
     <div class="buses-menu-img ">
                        <?php
                        //Check whether thge image is available or not
                        if($image_name=="")
                        {
                            //Image not Available
                            echo "<div class='error'>Image not Available</div>";
                        }
                        else
                        {
                            //Image is available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/buses/<?php echo $image_name ?>" alt="Shirts" class="img-responsive img-curve">

                            <?php
                        }
                        
                        
                        ?>
                   
                    </div>
                             <div class=" main-Content  ">
                    <div class="">
                        <h3><?php echo $title; ?></h3>

                        <input name="buses" value="<?php echo $title; ?>">
                        
                        <p class="buses-price">$<?php echo $price; ?></p>
                        
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Sheats</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                   <div>

                
                <fieldset class="menu-container main-Content ">
                    <legend>order Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Avishka wijerathne" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g.077*******" class="input-responsive" required>
                    
                    <div class="order-label">E mail</div>
                    <input type="email" name="customer_email" placeholder="avishkavipulsara11@gmail.." class="input-responsive" required>

                    <div class="order-label">Arriving point</div>
                    <input type="text" name="arriving_point" placeholder="E.g. Balangoda" class="input-responsive" required>

                    <div class="order-label">Departure point</div>
                    <input name="departure_point"  placeholder="E.g. Colombo" class="input-responsive" required></input>

                    
                    <input  type="submit" name="submit" value="Confirm order" class="btn btn-primary">
                    
                    
                   

                </fieldset>
                </form>

                <?php 
            //Check Whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the details from the foarm
                $buses = $_POST['buses'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty; //total = price * Qty
                $order_date = date("y-m-d h:i:sa");//order Date

                $status = "ordered"; //ordered, On delivery, Cancelled

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['customer_email'];
                $arriving_point = $_POST['arriving_point'];
                $departure_point =$_POST['departure_point'];

                //Save the order in database
                //Create Sql to save the database
                $sql2 ="INSERT INTO tbl_order SET
                buses = '$buses',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                arriving_point ='$arriving_point',
                departure_point='$departure_point'
                ";
                //Execute the query
                $res2 = mysqli_query($conn, $sql2);
                //Check Whether query executed successfully or not
                if($res2==true)
                {
                    echo "order Details Submitted";

                }
                else
                {
                    echo "order Details Are Not Submitted";

                }

            }
            
            ?>
             </div>
           </div>
        </div>
    </section>

    <?php include('partials-front\footer.php');?>
                </div>
    
</body>
</html>