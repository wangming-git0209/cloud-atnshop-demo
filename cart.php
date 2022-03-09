<?php include('partials-front/menu.php'); ?> 

<?php 
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        ?> 
        <section class="cart">
        <div class="container">
            <h2>Your Cart</h2>
                <table class="tbl-full">
                    <tr>
                        <td>S.N</td>
                        <td>Food</td>
                        <td>Image</td>
                        <td>Price</td>
                        <td>Numbers</td>
                        <td>Total</td>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_food WHERE id=$id";

                        $res = mysqli_query($conn,$sql);
                        $row= mysqli_fetch_assoc($res);

                        $count = mysqli_num_rows($res);
                            
                            $item = [
                                'id' => $row['id'],
                                'title'=> $row['title'],
                                'price'=> $row['price'],    
                                'image_name'=> $row['image_name'],
                                'quantity' => 1

                            ];

                           

                            if (isset($_SESSION['cart'][$id ])) 
                                    {
                                        $_SESSION['cart'][$id]['quantity'] +=1;
                                    }
                                    else
                                    {
                                        $_SESSION['cart'][$id] = $item;    
                                    }

                                $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

                              
                                foreach($cart as $key => $value): ?> 
                                <tr>
                                <td>S.N</td>
                                <td><?php echo $value['title'] ?></td>
                                <td>
   
                                    <img src="images/food/<?php echo $value['image_name'] ?>" width="100px">
                                </td>
                                <td><?php echo $value['price']?> </td>
                                <td>
                                   <?php echo $value['quantity'];?>

                                </td>
                                <td><?php echo $_SESSION['cart'][$id]['quantity']* $value['price'] ?></td>
                                   
                                <?php endforeach ?>
                        
                    </tr>


                </table>
                
        </div>
    </section>


        <?php 
       
    }
    else
    {
        ?>
        <div class="main-content">
            <div class="wrapper">
                <h2>No Have Food </h2>
                
            </div>
        </div>

        <?php
    }


?> 

    



<?php include('partials-front/footer.php'); ?> 