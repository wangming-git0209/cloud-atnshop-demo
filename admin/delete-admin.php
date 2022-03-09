<?php 

    include("../config/constants.php");

    // get value of id form Database by GET method. 
    // Because when we click DELETE button it's will delete ==> We should use GET method to pass id value into URL 
    // example: http://localhost/food-order/admin/delete-admin.php?id=24 
    
    $id= $_GET['id']; 

    $sql = "DELETE FROM tbl_admin WHERE id=$id"; 

    $res = mysqli_query($conn, $sql);

    if ($res==true) 
    {
        // echo "da xoa"; 
        // Create Session Variable to Display message 
        $_SESSION['delete'] = 'Admin Delete Successfully';

        // redirect to Manager Admin Page
        header('LOCATION:'.SITEURL.'admin/manager-admin.php');

    }
    else
    {
        // Create Session Variable to Display message 
        $_SESSION['delete'] = 'Fail to Delete Admin';
        header('LOCATION:'.SITEURL.'admin/manager-admin.php');


        
    }

?> 