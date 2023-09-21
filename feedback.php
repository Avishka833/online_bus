
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
    <br><br><br><br>
       
            <div >
            
            <h2 class="text-center">Give Us your Feedbacks</h2>



            <form action="" method="POST" class="order">
           
            <legend class="text-white">Your Feedback</legend>
                
            <fieldset class="text-blue order-form " >
                    
                    <div class="order-label">Name</div>
                    <input type="text" name="nama" placeholder="Eg:Avishka" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="text" name="email" placeholder="Eg:avishkavipulsara@gmail.com" class="input-responsive" required>

                    

                    <div class="order-label">Mobile No</div>
                    <input type="value" name="mobile_no" placeholder="077..." class="input-responsive" required>

                    <div class="order-label">Your Feedback</div>
                    <textarea type="text" name="fb" class="input-responsive" required></textarea>

                    

                    
                    <input type="submit" name="submit" value="SEND" class="btn btn-primary">
                </fieldset>
            </form>

            <?php 
            //Check Whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $mobile_no = $_POST['mobile_no'];
                $fb = $_POST['fb'];
            
                // Save the order in the database
                // Create SQL query to save the data
                $sql2 = "INSERT INTO tbl_feedback (nama, email, mobile_no, fb) VALUES ('$nama', '$email', '$mobile_no', '$fb')";
                
                // Execute the query
                if(mysqli_query($conn, $sql2))
                {
                    // Query executed successfully, handle success case
                    echo "Feedback Submitted.";
                }
                else
                {
                    // Query execution failed, handle error case
                    echo "Error: " . mysqli_error($connection);
                }
            }
            ?>

        </div>
    <!-- buses SEARCH Section Ends Here -->
    <?php include('partials-front\footer.php');?>








   