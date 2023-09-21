
<?php include('partials/menu.php');?>

    
    
       
    
<!--Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Manage order</h1>
<!-- Button to add order -->
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

<table class="tbl-full">
<tr>
<th>I.D</th>
<th>buses</th>
<th>Price</th>
<th>Qty.</th>
<th>Total</th>
<th>order Date</th>
<th>Status</th>
<th>Customer Name</th>
<th>Contact</th>
<th>Email</th>
<th>Address</th>
<th>Actions</th>
</tr>
<?php
//Get all the order from database
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
              $customer_address = $row['customer_address'];

              ?>
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

 <td><?php echo $customer_name; ?></td>
 <td><?php echo $customer_contact; ?></td>
 <td><?php echo $customer_email; ?></td>
 <td><?php echo $customer_address; ?></td>
 <td>
        <a href="<?php echo SITEURL; ?>admin/update_order.php?id=<?php echo $id;?>" class="btn-secondary">Update order</a>
        <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id; ?>" class="btn-danger">Delete order</a>      
 </td>
</tr>


              <?php
       }
}
else
{
       //order not Available
       echo "<tr><td colspan='12' class='error'>order Not Available.</td></tr>";
}

?>







</table>
   
</div>   
</div>      
    
<!--Main Section Ends -->

<!--Footer Section Starts -->
<?php include('partials/footer.php');?>