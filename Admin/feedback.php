
<?php include('partials/menu.php');?>
    

    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Admin.css">
    
    
    
    
        
    <!--Main Section Starts -->
    <div class="main-Content" >
    <div class="wrapper">
    <h1>feedback</h1>
    <!-- Button to add order -->
    <br/><br/>
    
    <br/> <br/> <br/>
    
    <?php 
     if (isset($_SESSION['delete']))
     {
            
           echo $_SESSION['delete'];
           unset($_SESSION['delete']);
     }
    
    
    ?>
    <br><br>
    
    
     
    
    <table class="tbl-full" class="text-left">
    
    
    <?php
    //Get all the order from database
    $sql = "SELECT * FROM tbl_feedback ORDER BY id DESC"; //Display latest order in First
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
                  $nama = $row['nama'];
                  $email = $row['email'];
                  $mobile_no = $row['mobile_no'];
                  $fb =$row['fb'];
              //     $center_front = $row['center_front'];
              //     $center_back = $row['center_back'];
              //     $shoulder_length = $row['shoulder_length'];
              //     $accross_shoulder = $row['accross_shoulder'];
  
                  ?>
    
    <tr>
    <th>I.D</th>

    <th>Name</th>
    
    <th>Email</th>
    
    <th>Mobile No</th>
    
    <th>Message</th>
    
    
    
    <!-- <th>Center Front</th>
    
    <th>Center Back</th>
    </tr> -->
    
                  <tr>
     <td><?php echo $sn++; ?></td>
     
     <td><?php echo $nama; ?></td>
     
     <td><?php echo $email; ?></td>
     
     <td><?php echo $mobile_no; ?></td>
     
     <td><?php echo $fb; ?></td>
     
     
    </tr>


  
    <tr>
    
     <td>
        <a href="<?php echo SITEURL; ?>admin/delete_feedback.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>      
     </td>
    
     
    
     
    </tr>
    
    
                  <?php
           }
    }
    else
    {
           //order not Available
           echo "<tr><td colspan='12' class='error'>Feedbacks Not Available.</td></tr>";
    }
    
    ?>
    
    
    
    
    
    
    
    </table>
    
       
    </div>   
    </div> 
         
        
    <!--Main Section Ends -->
    
    <!--Footer Section Starts -->
    <?php include('partials/footer.php');?>