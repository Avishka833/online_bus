<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bus Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <!-- Navbar Section Starts Here -->
    
    <section class="navbar">
        <div class="menu-container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <!-- <img src="images/logo.jpg" alt="Restaurant Logo" class="img-responsive"> -->
        
                </a>
            </div>
            <br><br>
            <h1 class="text-center">S.L.T.B Balangoda</h1>

            <div class="menu text-center">
                <ul>
                    <li >
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li >
                        <a href="<?php echo SITEURL; ?>routes.php">Routes</a>
                    </li>
                    <li >
                        <a href="<?php echo SITEURL; ?>buses.php">Buses</a>
                    </li>
                    <li >
                    
                    <a href="<?php echo SITEURL; ?>orders.php">Bookings</a>
                        
                    </li>
                    <li >
                    
                    <a href="<?php echo SITEURL; ?>feedback.php">Feedback</a>
                        
                    </li>
                   
                    
                    <li >
                    <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                       
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->