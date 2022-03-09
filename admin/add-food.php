
<?php include('patials/menu.php'); ?>  

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1> <br> <br>

                <?php

                    if (isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                
                ?>

                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="tbl-30">
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="title" placeholder="Tile of Food">
                            </td>
                            
                        </tr>

                        <tr>
                            <td>Description:</td>
                            <td>
                                <textarea name="description" cols="30" rows="5" placeholder="Description of the Food"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Price</td>
                            <td>
                                <input type="number" name="price"> 
                            </td>
                        </tr>

                        <tr>
                            <td>Select Image: </td>
                            <td>
                                <input type="file" name="image">

                            </td>
                        </tr>

                        <tr>
                            <td>Category:</td>
                            <td>
                                <select name="category">

                                    <?php 

                                        // Create PHP code to display categories from Database
                                        // 1. Create SQL to get all active from database
                                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                        // 2. Execute code
                                        $res = mysqli_query($conn, $sql);

                                        // 3. Count Rows whether data have or not
                                        $count = mysqli_num_rows($res);

                                        if ($count > 0 ) 
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            { 
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                

                                                ?> 
                                                    <option value="<?php echo $id; ?>"> <?php echo $title; ?></option>

                                                <?php 
                                            }

                                        }
                                        else 
                                        {
                                            ?> 
                                                <option value="0">No have Category</option>

                                            <?php 
                                        }

                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Featured:</td>
                            <td>
                                <input type="radio" name="featured" value="Yes"> Yes
                                <input type="radio" name="featured" value="No"> No
                            </td>
                        </tr>

                        <tr>
                            <td>Active:</td>
                            <td>
                                <input type="radio" name="active" value="Yes"> Yes
                                <input type="radio" name="active" value="No"> No
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                            </td>
                        </tr>

                    </table>
                </form>

                <?php 
                        if (isset($_POST['submit'])) 
                        {
                            // 1. Get data from Form
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $category = $_POST['category'];

                            if (isset($_POST['featured'])) {
                                $featured = $_POST['featured'];
                            }
                            else 
                            {
                                $featured = "No";
                            }

                            if (isset($_POST['active'])) {
                                $active = $_POST['active'];
                            }
                            else 
                            {
                                $active = "No";
                            }
                            
                            
                            // 2. Upload the image if selected 
                            // Check whether selected click or Not 

                            if (isset($_FILES['image']['name'])) 
                            {
                                $image_name = $_FILES['image']['name'];

                                if ($image_name != "") 
                                {
                                    
                                    $ext = end(explode('.', $image_name)); // get the extension of img e.g PNG, JPG, ... 

                                    // Rename image by rand() 
                                    $image_name = "Food-Name_".rand(000,999).'.'.$ext;

                                    $file_client_path= $_FILES['image']['tmp_name'];
                                    $file_server_path= "../images/food/".$image_name;   
    
                                    
    
                                    $upload = move_uploaded_file($file_client_path, $file_server_path);

                                    if ($upload == false) 
                                    {
                                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                                        header('location:'.SITEURL.'admin/add-food.php');
                                        // Stop the Process 
                                        die();
                                    }
                                }


                            }
                            else 
                            {
                                $image_name = "";
                            }

                            // 3. Insert into Database 
                            $sql_insert = "INSERT INTO tbl_food SET 
                                            title = '$title',
                                            description = '$description',
                                            price = $price,
                                            image_name = '$image_name',
                                            category_id = $category,
                                            featured = '$featured',
                                            active = '$active'
                                            ";
                            $res_insert = mysqli_query($conn, $sql_insert);

                            if ($res_insert == true) 
                            {
                                $_SESSION['add'] = "<div class='success'>Food Added Successfully </div>";

                                // header('location:'.SITEURL.'admin/manage-food.php');
                                echo("<script>location.href = '".SITEURL."admin/manage-food.php?msg=$msg';</script>");
                                
                            }
                            else
                            {
                                $_SESSION['add'] = "<div class='error'>Food Added Fail </div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                            }


                             
                        }

                ?>
        </div>
    </div>



<?php include('patials/footer.php'); ?>  