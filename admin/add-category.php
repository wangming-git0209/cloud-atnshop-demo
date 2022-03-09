<?php include('patials/menu.php'); ?> 


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1> <br> <br>

            <?php 
                if (isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            
            ?> 

            <!-- Add Category Start -->
                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="tbl-30"> 
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="title" placeholder="Category title">
                            </td>
                        </tr>

                        <tr>
                            <td>Select Image: </td>
                            <td>
                                <input type="file" name="image">
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
                                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                            </td>
                        </tr>
                    </table>

                </form>

            <!-- Add Category End -->

            <?php 
                if(isset($_POST['submit']))
                {
                    $title = $_POST['title'];

                    // Check whether user selected or Not 
                    if (isset($_POST['featured'])) 
                    {
                        $featured = $_POST['featured']; 
                    }
                        else 
                        {
                            // Set Default Value
                            $featured = "No";
                        }

                    if (isset($_POST['active'])) 
                    {
                        $active = $_POST['active']; 
                    }
                        else 
                        {
                            // Set Default Value
                            $active = "No";
                        }


                    // Check whether the image is selected or Not and Set the value for image name accordingly  

                    if (isset($_FILES['image']['name'])) // Get the name of image
                    {
                        $image_name = $_FILES['image']['name'];

                        /* 
                            Because if we upload same img it will replace old img & we don't want it happen
                            ==> we will change img name when we upload by auto add number after name
                        */

                        $ext = end(explode('.', $image_name)); // get the extension of img e.g PNG, JPG, ... 

                        // Rename image by rand() 
                        $image_name = "Food-Category_".rand(000,999).'.'.$ext;
                        
                        

                        
                        $file_client_path= $_FILES['image']['tmp_name'];

                        $file_server_path= "../images/category/".$image_name;

                        

                        $upload = move_uploaded_file($file_client_path, $file_server_path);

                        if ($upload ==false) {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                            header('location:'.SITEURL.'admin/add-category.php');
                            // Stop the Process 
                            die();
                           
                        }

                    }
                    else
                    {
                        $image_name ="";
                    }

                    // 2. Create the Query to Insert Category into Database 
                    $sql = "INSERT INTO tbl_category SET
                            title= '$title',
                            image_name = '$image_name',
                            featured= '$featured',
                            active= '$active' 
                            ";

                    // 3. Execute Query 
                    $res = mysqli_query($conn, $sql);

                    // 4. Check whether the query executed or not 
                    if ($res == true) 
                    {
                        $_SESSION['add'] = "<div class='success'> Add Category Successfully </div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                    else
                    {
                        $_SESSION['add'] = "<div class='error'> Add Category Fail </div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                    }
                }
            
            ?> 

        </div>
    </div>


<?php include('patials/footer.php'); ?> 
