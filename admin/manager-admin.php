

<?php include('patials/menu.php'); ?>

        <!-- Main Content Section Start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manager Admin</h1> 
                <br> <br/>

                <?php  
                    if (isset($_SESSION['add'])) 
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); // Remove message session after 1 time display
                    }

                    if (isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                ?> 

                    
                <?php  
                    if (isset($_SESSION['update'])) 
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']); // Remove message session after 1 time display
                    }

                    if (isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if (isset($_SESSION['user-not-found'])) 
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if (isset($_SESSION['pass-not-match'])) 
                    {
                        echo $_SESSION['pass-not-match'];
                        unset($_SESSION['pass-not-match']);
                    }

                    if (isset($_SESSION['change-pass'])) 
                    {
                        echo $_SESSION['change-pass'];
                        unset($_SESSION['change-pass']);
                    }

                    if (isset($_SESSION['change-pass-fail'])) 
                    {
                        echo $_SESSION['change-pass-fail'];
                        unset($_SESSION['change-pass-fail']);
                    }

                ?> 

                <br> <br/>

                <br>
                    <!-- Button to ADD admin -->
                    <a href="add-admin.php" class="btn-primary">Add admin</a>
                <br/> <br/> <br/>
                
                <table class="tbl-full ">
                    <tr>
                        <th>Serial Num</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>

                        <?php
                        // Query to GET all Admin
                           $sql = "SELECT * FROM tbl_admin";
                        
                        // Execute the Query 
                            $res = mysqli_query($conn,$sql);

                        // Check whether the Query is Execute or NOT 
                        if ($res == true) 
                        {
                            
                            // Count Row to check whether we have database or not 
                            $count = mysqli_num_rows($res);
                            $sn =1;  
                        


                            // Check the num of row     
                            if ($count>0) 
                            {
                                
                                // mysqli_fetch_assoc() will find and return a row of the results of a certain MySQL query as an associative array
                                while ($rows= mysqli_fetch_assoc($res)) 
                                {
                                    /* 
                                        Using WHILE loop to get all data from Database 
                                        And WHILE loop will run as long as we have data in database
                                    */

                                    // Get each data 
                                      $id = $rows["id"];
                                      $full_name = $rows["full_name"];
                                      $username = $rows["username"];
                                      

                                      
                        ?>
                                    
                                    
                                    <tr>
                                        <td> <?php echo $sn++; ?> </td>
                                        <td> <?php echo $full_name;  ?> </td> 
                                        <td> <?php echo $username; ?> </td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Update Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?> " class="btn-danger">Delete Admin</a> 
                                        </td>
                                    </tr>
                                    
                                   
                                <?php

                                }
                            }
                            else 
                            {
                                echo "No have any Admin";
                            }
                        }
                        


                                ?>

                    

                    

                </table>

            </div>
        </div>
        <!-- Main Content Section End -->


<?php include('patials/footer.php'); ?>  