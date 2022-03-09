
<?php include('config/constants.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php SITEURL; ?>index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <?php 
                         $sql_cust = "SELECT * FROM tbl_customer";
                         $res_cust = mysqli_query($conn,$sql_cust);

                         if($res_cust == TRUE)
                         {
                             $count_cust = mysqli_num_rows($res_cust);
                             if($count_cust > 0)
                             {
                                 while ($rows= mysqli_fetch_assoc($res_cust)) 
                                 {
                                     $id_cust = $rows['id'];

                                 }
                             }
                         } 

                         $sql_food = "SELECT * FROM tbl_food";
                         $res_food = mysqli_query($conn,$sql_food);

                         if($res_food == TRUE)
                         {
                             $count_food = mysqli_num_rows($res_food);
                             if($count_food > 0)
                             {
                                 while ($rows= mysqli_fetch_assoc($res_food)) 
                                 {
                                     $id = $rows['id'];

                                 }
                             }
                         } 

                         ?>
                        <a href="<?php SITEURL; ?>profile.php?id=<?php echo $id_cust; ?>">Profile</a>
                    </li>
                    <li>
                        <a href="<?php SITEURL; ?>cart.php">Cart</a>
                    </li>
                    <li>
                        <?php 
                            if(!isset($_SESSION['user']))
                            {
                                ?>
                                    <a href="<?php SITEURL; ?>login.php">Login</a>
                                <?php 

                            }
                            else 
                            {
                                ?>
                                    <a href="<?php SITEURL; ?>logout.php">Logout</a>
                                <?php 
                            }
                        ?>
                        
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    