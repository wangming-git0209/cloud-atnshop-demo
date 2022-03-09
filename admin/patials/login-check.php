<?php 
    // Authentication Access control
    // Check whether user is logged or not 

    if (!isset($_SESSION['user'])) 
    {
        // Mean User not login 
        // Redirect to Login Page

        $_SESSION['no-login-message'] = "<div class='error text-center'> Please Login to Access Admin Control Panel</div>";
        header('location:'.SITEURL.'admin/login.php');

    }


?> 