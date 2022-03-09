

<?php include('patials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <br>

           
                    <!-- Button to ADD Food -->
                    <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
                    <br/> <br/> <br/>
                
                <?php

                    if (isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                
                ?>
                <table class="tbl-full ">
                    <tr>
                        <th>Serial Num</th>
                        <th>Full Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                    
                            $sql = "SELECT * FROM tbl_food";

                            $res = mysqli_query($conn, $sql);

                            // Count Rows 
                            $count = mysqli_num_rows($res);

                            $sn = 1;
                            if ($count>0) 
                                {
                                    
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $price = $row['price'];
                                        $image_name = $row['image_name'];
                                        $featured = $row['featured'];
                                        $active = $row['active'];

                                    ?> 

                                        <tr>
                                            <td><?php echo $sn++; ?>.</td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td>
                                                <?php

                                                    // check img name have or not 
                                                    if ($image_name != "") 
                                                    {
                                                        ?>
                                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">

                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        echo "<div class='error'> Image Not Added </div>";
                                                    }
                                            
                                                ?>
                                            </td>
                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td>
                                                <a href="#" class="btn-secondary">Update Food</a> 
                                                <a href="#" class="btn-danger">Delete Food</a> 
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                }
                                else 
                                {

                                }

                    ?> 

                    

                </table>

        </div>    
    </div>

<?php include('patials/footer.php'); ?>  