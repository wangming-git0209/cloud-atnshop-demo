<!-- 
<?php include('../config/constants.php'); ?> 
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <!-- <?php 
                if (isset($_SESSION['login'])) 
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
                
                if (isset($_SESSION['no-login-message'])) 
                {
                    echo $_SESSION['no-login-message'];
                    unset ($_SESSION['no-login-message']);
                }
            ?>  -->
            <br> <br>
            <!-- Login form Start -->
            <form action="" method="POST">
                Username: <br> 
                <input type="text" name="username" placeholder="Enter Admin User Name"> <br><br>

                Password: <br> 
                <input type="password" name="password" placeholder="Enter Admin Password"> <br>
                
                <input type="submit" name="submit" value="Login" class="btn-primary text-center">

            </form>




            <!-- Login form End -->

            <p class="text-center">Create by Quang Minh</p>
        </div>

</html>


<?php 

    if (isset($_POST['submit'])) 
        {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            // Check whether Username & Password Exist or Not 
            $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

            // Execute Query 
            $res = mysqli_query($conn,$sql);
            

            // Count row to check whether the user exist or not 
            $count = mysqli_num_rows($res);

            if ($count == 1) 
            {
                $_SESSION['login'] = "<div class='success'> Login Successful.</div>";
                $_SESSION['user'] = $username; // To check whether the user is logged in or Not and then Logout will destroy it

                header('location:'.SITEURL.'admin/');
            }
            else { 
                $_SESSION['login'] = "Username or Password Not Match";
                header('location:'.SITEURL.'admin/login.php');
            }


        }



?> -->