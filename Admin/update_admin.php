
<?php include('partials/menu.php');?>

<!--Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Update Admin</h1>
<br><br>
<?php 
//1.Get the id of selected Admin
$id=$_GET['id'];
//2.Create sql query to Get the details
$sql="SELECT * FROM tbl_admin WHERE id=$id";

//execute the query
$res=mysqli_query($conn, $sql);
//Check whther the query is executed or not
if($res==true){

    $count = mysqli_num_rows($res);
    if($count==1){

        //echo "Admin Available";
        $row=mysqli_fetch_assoc($res);
        $full_name = $row['full_name'];
        $username = $row['username'];

    }


else{
    header ('location:'.SITEURL.'admin/manage_admin.php');
   // echo ;
}
}

?>
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Full Name</td>
            <td>
                <input type="text" name="full_name" value="<?php echo $full_name;?>">
</td>
</tr>
<tr>
    <td>Username</td>
    <td>

    <input type="text" name="username" value="<?php echo $username;?>" >
</td>
</tr>
<tr>
    <td colspan="2">
        <input type ="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" name="submit" value="Update Admin" class="btn-secondary"> 
    </td>
</tr>
</table>
</form>

</div>
</div>

<?php 
//Check whether the submit button is clicked or not
if(isset($_POST['submit'])){

    //echo "Button Clicked";
    //Get all the values from form to update 
    $id = $_POST['id'];
     $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    //Create a sql query to update admins
    $sql="UPDATE tbl_admin SET
    full_name = '$full_name',
    username ='$username'
    WHERE id='$id'
    ";

    //Execute the query
    $res = mysqli_query($conn,$sql);

    //Check Whwther the query executed successfully or not
    if($res==true){

        //Query Executed and Admin Updated
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
        //Redirrect to Manage admin page
        header('location:'.SITEURL.'admin/manage_admin.php');
    }

    else{
        //Failed to update admin
        $_SESSION['update'] = "<div class='eror'>Failed to delete admin.</div>";
        //Redirrect to Manage admin page
        header('location:'.SITEURL.'admin/manage_admin.php');
    }
}
?>


<?php include('partials/footer.php');?>