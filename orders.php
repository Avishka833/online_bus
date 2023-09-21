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
<br><br>
<!- Buses sEARCH Section Starts Here -->
<section class="buses-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>buses-search.php" method="POST">
                <input class="search2" type="search" name="search" placeholder="Search for buses.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
</div>
    <!-- Buses sEARCH Section Ends Here -->
    








    
<!--Main Section Starts -->
<div class="main-Content" >
<div class="wrapper">
<h1 class="text-center">Manage orders</h1>
<!-- Button to add orders -->
<br/><br/>

<br/> <br/> <br/>

<?php 
 if (isset($_SESSION['delete']))
 {
        
       echo $_SESSION['delete'];
       unset($_SESSION['delete']);
 }

if(isset($_SESSION['update']))
{
       echo $_SESSION['update'];
       unset($_SESSION['update']);
}

?>
<br><br>


 

<table class="tbl-full" class="text-left">


<?php
//Get all the orders from database
$sql = "SELECT * FROM tbl_order ORDER BY id DESC"; //Display latest order in First
//Execute query
$res = mysqli_query($conn, $sql);
//Count the Rows
$count = mysqli_num_rows($res);

$sn = 1; //Create a serial number and set its initial value as 1


if($count>0)
{
       //order Available
       while($row=mysqli_fetch_assoc($res))
       {
              //Get all the order details
              $id = $row['id'];
              $buses = $row['buses'];
              $price = $row['price'];
              $qty = $row['qty'];
              $total = $row['total'];
              $order_date = $row['order_date'];
              $status = $row['status'];
              $customer_name = $row['customer_name'];
              $customer_contact = $row['customer_contact'];
              $customer_email = $row['customer_email'];
               $arriving_point= $row['arriving_point'];
               $departure_point= $row['departure_point'];

              ?>

<tr>
<th>I.D</th>

<th>buses </th>

<th>Price</th>

<th>Qty.</th>

<th>Total</th>

<th>order Date</th>

<th>Status</th>
</tr>

              <tr>
 <td><?php echo $sn++; ?></td>
 
 <td><?php echo $buses; ?></td>
 
 <td><?php echo $price; ?></td>
 
 <td><?php echo $qty; ?></td>
 
 <td><?php echo $total; ?></td>
 
 <td><?php echo $order_date; ?></td>

 <td>
       <?php 
       //orderd on delvery,Delivered,Canceled
       if($status=="ordered")
       {
              echo "<label>$status</label>";
       }
       elseif($status=="on delivery")
       {
              echo "<label style='color:orange;'>$status</label>";
       }
       elseif($status=="delivered")
       {
              echo "<label style='color:green;'>$status</label>";
       }
       elseif($status=="canceled")
       {
              echo "<label style='color:red;'>$status</label>";
       }
       ?>
</td>
</tr>
<tr>
<th>Customer Name</th>

<th>Contact</th>

<th>Email</th>

<th>Arriving Point</th>

<th>Departure Point</th>
</tr>
<tr>
 <td><?php echo $customer_name; ?></td>
 
 <td><?php echo $customer_contact; ?></td>

 <td><?php echo $customer_email; ?></td>

 <td><?php echo $arriving_point; ?></td>

 <td><?php echo $departure_point; ?></td>

 <td>
 <a href="<?php echo SITEURL; ?>update_order.php?id=<?php echo $id;?>"class="btn-primary">Update </a>
</td>
       <td>
        <a href="<?php echo SITEURL; ?>delete-order.php?id=<?php echo $id; ?>"class="btn-danger">Delete </a>           
 </td>
</tr>


              <?php
       }
}
else
{
       //order not Available
       echo "<tr><td colspan='12' class='error'>orders Not Available.</td></tr>";
}

?>







</table>

   
</div>   
</div> 
     
    
<!--Main Section Ends -->

<!--Footer Section Starts -->
<?php include('partials-front\footer.php');?>