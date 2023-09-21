<?php 
include('C:\xampp\htdocs\online_bus\Config\constants.php');

?>



<div class="main-Content login">
        <div class="wrapper">

<html>
    <head>
        <title>Login - S.L.T.B Balangoda</title>
        <link rel="stylesheet" href="../css/Admin.css">
    </head>
    <body>
        <div   class="login" >
            <h1 class="text-center">SLTB Balangoda</h1>
            <h2 class="text-center">Admin Login</h2>

              <?php 

              if(isset($_SESSION['login'])){

                  echo $_SESSION['login'];
                  unset($_SESSION['login']);

              }
              if(isset($_SESSION['no-login-message']))
              {

               echo $_SESSION['no-login-message'];
               unset ($_SESSION['no-login-message']);
        
              }

             

              ?>
              
           
            <!-- Login form starts here -->
            <form action="" method="POST" class="text-center"></form>
            <form action="" method="POST" class="text-center">
                Username:<br>
                <input type="text" name="username" placeholder="Enter User Name"><br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter Your Password"><br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>

            <!-- Login form Ends here -->
            <p class="text-center">Created by- <a href="#">HNDIT</a></p>
        </div>
            </div>
    </body>
</html>
<?php
//Check Whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //Process for Login
    //1.Get data from login foarm
     $username = $_POST['username'];
     $password = md5($_POST['password']);

     //2.SQL to check whether the user with username and password exists or not
     $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
     
     //3.Execute the Query
     $res = mysqli_query($conn, $sql);

     //4.Count rpes to check whether the user exist or not
     $count = mysqli_num_rows($res);

     if($count==1){
          //User available and loging success
          $_SESSION['login']="<div class='success text-center' >Login Succesfull.</div>";
          $_SESSION['user']=$username; //To check whether the user is logged in or not and logout will unset it
          //Redirrect to home page/dashboard
          header('location:'.SITEURL.'Admin/');

     }
     else{

        
        
          //User not Available and Login Fail
          $_SESSION['login']="<div class='error text-center'>Login Failed.</div>";
          //Redirrect to home page/dashboard
          header('location:'.SITEURL.'admin/login.php');



     }


     }




?>
</div>
</div>