<?php include('patials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            
            <?php 
                if (isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            
            ?> <br> <br>    

                <br>
                    <!-- Button to ADD admin -->
                    <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
                <br/> <br/> <br/>
                
                <table class="tbl-full ">
                    <tr>
                        <th>Serial Num</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_category";

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
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                            ?> 

                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php

                                            // check img name have or not 
                                            if ($image_name != "") 
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">

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
                                        <a href="#" class="btn-secondary">Update Category</a> 
                                        <a href="#" class="btn-danger">Delete Category</a> 
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