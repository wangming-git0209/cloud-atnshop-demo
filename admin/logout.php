<?php 

    include('../config/constants.php');
    // 1. Destroy all Session. Because we logout and we don't need old session of old user

    session_destroy();

    // 2. Redirect to Login Page 
    header('location:'.SITEURL.'admin/login.php');


?> 