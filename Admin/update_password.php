<?php include('partials/menu.php');?>


<div class="main-Content">
<div class="wrapper">
<h1>Change Password</h1>
<br><br>
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
?>
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Current Password:</td>
            <td>
                <input type="password" name="current_password" placeholder="Current Password">
            </td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td>
                <input type="password" name="new_password" placeholder="New Password">
            </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>
                <input type="password" name="confirm_password" placeholder="Confirm Password">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="change password" class="btn-primary">

            </td>
        </tr>

    </table>


</form>
</div>
</div>
<?php 
//Check whether the submit button is clicked or not
if(isset($_POST['submit'])){
//Echo "Clicked";

//1.Get the data from form
$id=$_POST['id'];
$current_password = md5($_POST['current_password']);
$new_password = md5($_POST['new_password']);
$confirm_password = md5($_POST['confirm_password']);

//2.Check whether the user with current password Exist or not
$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password = '$current_password'";

//Execute the query
$res = mysqli_query($conn, $sql);

if($res==true){

    //Check whether the data is available or not
    $count=mysqli_num_rows($res);
    if($count==1){

        //User exist and password can be changed
        //echo "User Found";
        //Check whether the new password and confirm password match or not
        if($new_password==$confirm_password)
        {
             //Update the password
            // echo "Password Matched";
            $sql2 = "UPDATE tbl_admin SET
            password='$new_password'
            WHERE id=$id
            ";
            //Execute the sqlQuery
            $res2 = mysqli_query($conn,$sql2);
            //Check whether the query executed or not
            if($res2==true){
                //Display Success mesage
                $_SESSION['change-pwd']="<div class='success'>Password Changed successfully. </div>";
            //Redirrect the user
            header('location:'.SITEURL.'admin/manage_admin.php');
            }
            else{
                //display error message
                
                $_SESSION['change-pwd']="<div class='error'>Failed to change password. </div>";
            //Redirrect the user
            header('location:'.SITEURL.'admin/manage_admin.php');
            }
        }
        else
        {
            //Redirrect to manage admin page with error mesage 
            $_SESSION['pwd-not-match']="<div class='error'>Password did not match. </div>";
            //Redirrect the user
            header('location:'.SITEURL.'admin/manage_admin.php');

        }
    }
    else{

        //User does not Exist set Message and Redirrect
        $_SESSION['user-not-found']="<div class='error'>User not Found. </div>";
        //Redirrect the user
        header('location:'.SITEURL.'admin/manage_admin.php');
    }
}



}
?>



<?php include('partials/footer.php'); ?>