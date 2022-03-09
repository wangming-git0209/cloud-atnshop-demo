<?php include('patials/menu.php'); ?>  

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br> <br>

        <?php 
            if (isset($_GET['id'])) 
            {
                $id= $_GET['id'];
            }

        ?> 

        <form action="" method="POST">
            <table class="tbl-30">
                    <tr>
                        <td>Old Password</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Current-password">

                        </td>
                    </tr>

                    <tr>
                    <td>New Password</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New-password">

                        </td>
                    </tr>

                    <tr>
                    <td>Confirm Password</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm-password">

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>
            </table>
        </form>
    
    </div>
</div>

<?php 
        if (isset($_POST['submit'])) 
        {
            // 1. Get data from Form
            $id = $_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            // 2. Check whether the user WITH current ID and current Password exist or Not 

            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                // Execute Query
                $res = mysqli_query($conn, $sql);

                // Check whether Query execute or Not 
                if ($res == true) 
                {
                    $count = mysqli_num_rows($res);    
                    
                    if ($count == 1) 
                    { 

                        // Check whether New Password and Current Password match or Not 
                        if ($new_password==$confirm_password) 
                        {

                           // Change password 
                           $sql_update = "UPDATE tbl_admin SET 
                                        password = '$new_password'
                                        WHERE id=$id    
                                            ";
            
                            // Execute Query

                            $res1 = mysqli_query($conn,$sql_update);

                            if ($res1 == true) {

                                $_SESSION['change-pass'] = "UPDATE successfully";
                                header('location:'.SITEURL.'admin/manager-admin.php');
                            }

                            else{
                                $_SESSION['change-pass-fail'] = "UPDATE Not successfully";
                                header('location:'.SITEURL.'admin/manager-admin.php');
                            }

                            
                        }
                        else 
                        {
                            $_SESSION['pass-not-match'] = "New Password & Confirm Password Not match";
                            header('location:'.SITEURL.'admin/manager-admin.php');
                        }
                    
                        
                    }
                    else 
                    {
                        $_SESSION['user-not-found'] = "User Not Found/ Current Password Not Correct";
                        header('location:'.SITEURL.'admin/manager-admin.php');
                    }
                }


            
        }


?>




<?php include('patials/footer.php'); ?>  