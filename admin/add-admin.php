<?php include('patials/menu.php'); ?> 


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <?php 
                if (isset($_SESSION['add'])) 
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']); // Remove message session after 1 time display
                }

                

            
            ?> 

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name</td>
                        <td> 
                            <input type="text" name="full_name" placeholder="Enter Your Name">
                       </td>

                    </tr>

                    <tr>
                        <td>User Name</td>
                         <td> 
                         <input type="text" name="username" placeholder="Enter User Name">
                         </td>    

                    </tr>

                    <tr>
                        <td>Password</td>
                         <td> 
                         <input type="password" name="password" placeholder="Enter Password">
                         </td>    

                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                         

                    </tr>

                </table>

            </form>
        </div>

    </div>


<?php include('patials/footer.php') ?> 

<?php
    // Process the value from FORM and Save it in Database
    // Check whether the submit button click or not 
        
    
            if (isset($_POST['submit'])) 
            {
                        // 1. Get Data from Form 
                        $full_name = $_POST['full_name'];
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);  // Password Encryption with MD5 


                        // 2. SQL query to save data into Database 
                        $sql = "INSERT INTO tbl_admin SET 
                        full_name ='$full_name',
                        username = '$username',
                        password = '$password'
                        ";
                        
                        
                        // 3. Execute Query and Save it in Database 
                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                        // 4. 

                        if ($res==TRUE) 
                        {
                            // echo 'Database Inserted';
                            // Display when Add data into Database Success
                            $_SESSION['add'] = "Addmin Added Successfully";

                             // Move to Mânger admin page 
                            header("Location:".SITEURL.'admin/manager-admin.php');
                        }
                        else 
                        {
                            // echo 'Insert Database Fail';
                            // Display when Add data into Database FAIL
                             
                             $_SESSION['add'] = "Addmin Added Unsuccessfully";

                             // Move to add admin page 
                             header("Location:".SITEURL.'admin/add-admin.php');
                        }
                           
                         

                        
            
            }

?>