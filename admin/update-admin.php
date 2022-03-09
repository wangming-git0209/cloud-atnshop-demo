

<?php include('patials/menu.php'); ?>


        <div class="main-content">
            <div class="wrapper">
                <h1>Update Admin</h1>

                <?php 
                    // 1. Get the ID of my Selected Admin
                    $id = $_GET['id'];

                    // 2. Create SQL Query to get Detail In4
                    $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                    // 3. Execute the Query 
                    $res = mysqli_query($conn,$sql);

                    // Check Query execute or not 
                    if ($res == true) 
                        {
                            $count = mysqli_num_rows($res);
                            
                            if ($count == 1) 
                                {
                                    $row = mysqli_fetch_assoc($res);

                                    $id = $row['id'];
                                    $full_name = $row['full_name'];
                                    $username = $row['username'];

                                }

                            else 
                                {
                                    // Redirect to Manager Admin Page 
                                    header('location:'.SITEURL.'/admin/manager-admin.php');
                                }



                        }
                    else
                        {
                            echo "Query can execute";
                        }
                    
                


                
                
                ?> 


                <form action="" method="POST">

                        <table class="tbl-30">
                            <tr>
                                <td>Full Name</td>
                                <td> 
                                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                            </td>

                            </tr>

                            <tr>
                                <td>User Name</td>
                                <td> 
                                <input type="text" name="username" value="<?php echo $username; ?>" >
                                </td>    

                            </tr>


                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                            </td>
                                


                            </tr>

                        </table>

                </form>
            </div>

        </div>

        <?php 
            
                if (isset($_POST['submit'])) 
                {
                    // Get all data from Form
                     $id = $_POST['id'];
                     $full_name = $_POST['full_name']; 
                     $username = $_POST['username'];

                    //  Create a Query to Update 

                    $sql = "UPDATE tbl_admin SET 
                    full_name= '$full_name',
                    username = '$username'
                    WHERE id= '$id'
                    ";
                    // Execute Query 
                    $res = mysqli_query($conn,$sql);

                    if ($res==true) 
                        {
                            
                            // Create Session Variable to Display message 
                            $_SESSION['update'] = 'UPDATE Successfully';

                            // redirect to Manager Admin Page
                            header('LOCATION:'.SITEURL.'admin/manager-admin.php');

                        }
                        else
                        {
                            // Create Session Variable to Display message 
                            $_SESSION['update'] = 'Fail to UPDATE';
                            header('LOCATION:'.SITEURL.'admin/manager-admin.php');


                            
                        }
                }
        
        
        
        ?> 
                


<?php include('patials/footer.php'); ?>



