
<?php include('./config/constants.php'); ?> 
<html>
    <head>
        <title>Login - Food Order Customer</title>
        <link rel="stylesheet" href="./css/admin.css">
    </head>

    <div class="login">
        <div class="wrapper">
            <h1>Register</h1> <br> <br>

            <form action="" method="POST">
                Full Name: <br> 
                <input type="text" name="full_name" placeholder="Enter Full Name"> <br><br>

                Username: <br> 
                <input type="text" name="username" placeholder="Enter User Name"> <br><br>

                Password: <br> 
                <input type="password" name="password" placeholder="Enter Password"> <br> <br>

                Confirm Password: <br> 
                <input type="password" name="confirm-password" placeholder="Confirm Password"> <br> <br>
                
                <input type="submit" name="register" value="Register" class="btn-primary text-center"> <br> <br>

                

            </form>
                  
        </div>

</html>

            <?php 
                   if (isset($_POST['register'])) 
                   {
                       $full_name = $_POST['full_name'];
                       $username = $_POST['username'];
                       $password = md5($_POST['password']);
                       $confirm_password = md5($_POST['confirm-password']);

                       if($confirm_password == $password)
                       {
                        // Check whether Username & Password Exist or Not 
                       $sql_register = "INSERT INTO tbl_customer SET 
                       full_name ='$full_name',
                       username='$username',
                       password='$password'
                       ";

                        // Execute Query 
                        $res_register = mysqli_query($conn,$sql_register);
                        

                            if ($res_register==TRUE) 
                                {
                                    // echo 'Database Inserted';
                                    // Display when Add data into Database Success
                                    $_SESSION['register'] = "Customer Added Successfully";

                                        
                                    header("Location:".SITEURL.'index.php');
                                }
                       }
                       else
                       {
                           echo "<div class='error'>Confirm Password & Password not match</div>"; 
                       }
           
                       
                       
                   }

            ?>
        </div>
    </div>


<?php include('partials-front/footer.php'); ?> 