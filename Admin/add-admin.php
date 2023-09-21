
        <!--Menu Section Starts -->
        <?php include('partials/menu.php');?>
        
        <!--Menu Section Ends -->


 <!--Main Section Starts -->
 <div class="main-Content">
        <div class="wrapper">
        <h1>Add Admin</h1>
        <?php
        if(isset($_SESSION['add']))
        {
              echo $_SESSION['add'];//Displaying session message
              unset($_SESSION['add']);//Removing session message
        }

        ?>
        <form action="" method="POST">
                <table class="tbl-30"> 
<tr>
        <td>Full Name:</td>
        <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
</tr>
<tr>
        <td>User Name:</td>
        <td><input type="text" name="username" placeholder="Enter User Name"></td>
</tr>
<tr>
        <td>Password:</td>
        <td><input type="password" name="password" placeholder="Enter Your Password"></td>
</tr>
<tr>
        <td colspan="2">
<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
        </td>
</tr>


                </table>


        </form>
        
        <?php 
        //Process the value from form and save it in database
        //Check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
                echo "Submitted";
                //Get the data from form
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);//Password Encryption with md5

                //SQL query to insert data into database
                $sql="INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
                ";
                //3.Execute query and save data in databse
                $res=mysqli_query($conn,$sql) or die (mysqli_error());
                //4.Check whether the (Query is executed) data is inserted or not and display appopriated message
         if ($res==TRUE){
        //Data inserted
        //echo "Data inserted";
        //Create a session variable to Display a message
        $_SESSION['add']="Admin Aded Successfully";
        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage_admin.php');
                        }
                        
         else{
         //Failed to insert
         //echo "Data not inserted"; 
         //Create a session variable to Display a message
        $_SESSION['add']="Failed to add admin";
        //Redirect  page to add admin
        header("location".SITEURL.'admin/add-admin.php');
                      
                        }
}
        ?>              
</div>
</div>
        <!--Main Section Ends -->


        <!--Footer Section Starts -->
        <?php include('partials/footer.php');?>
        
        <!--Footer Section Ends -->
       