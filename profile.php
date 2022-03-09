<?php include('partials-front/menu.php'); ?> 

<?php  
    if(isset($_SESSION['user']))
    {
        ?> 
        <div class="main-content">
            <div class="wrapper">
                <h1>Your Profile</h1> 
                <br> <br/>

                <br> <br/>

                
                <table class="tbl-full ">
                    <tr>
                        <th>Serial Num</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        
                    </tr>

                        <?php
                            $id = $_GET['id'];  
                        
                            $sql = "SELECT * FROM tbl_customer WHERE id=$id";
                        
                        // Execute the Query 
                            $res = mysqli_query($conn,$sql);

                        // Check whether the Query is Execute or NOT 
                        if ($res == true) 
                        {
                            
                            // Count Row to check whether we have database or not 
                            $count = mysqli_num_rows($res);
                            $sn =1;  
                        


                            // Check the num of row     
                            if ($count==1) 
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
                                       
                                    </tr>
                                    
                                   
                                <?php

                                }
                            }
                            
                        }
                                ?>
                </table>

            </div>
        </div>

        <?php
    }
    else
    {
        ?>
        <div class="main-content">
            <div class="wrapper">
                <h2>No Have User Here. Please Login</h2>
            </div>
        </div>
        <?php
        
    }


?>





<?php include('partials-front/footer.php'); ?> 