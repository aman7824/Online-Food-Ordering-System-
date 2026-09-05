<?php include('partials/header.php') ?>
<?php 
    if(isset($_GET['id'])){
        $category_id = $_GET['id'];
        $select = "select title from tbl_category where id=$category_id";
        $execute = mysqli_query($conn, $select);
        $fetch = mysqli_fetch_assoc($execute);
    }else{
        header("Location:". SITEURL);
    }
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php  ?>
            <h2>Foods on <a href="#" class="text-white">"<?php echo $fetch['title'] ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
                $sql = "select * from tbl_food where category_id=$category_id";
                $res = mysqli_query($conn, $sql);
                if($res){
                    $count = mysqli_num_rows($res);
                    if($count>0){
                        while($fetch = mysqli_fetch_assoc($res)){
                            $food_id = $fetch['id'];
                            $price = $fetch['price'];
                            $description = $fetch['description'];
                            $title = $fetch['title'];
                            $image = $fetch['image_name'];
                            ?>
                                <div class="food-menu-box">
                                    <div class="food-menu-img">
                                        <?php if(!empty($image)): ?>
                                            <img src="<?php echo SITEURL ?>images/food/<?php echo $image ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php endif ?>
                                    </div>

                                    <div class="food-menu-desc">
                                        <h4><?php echo $title ?></h4>
                                        <p class="food-price"><?php echo $price ?></p>
                                        <p class="food-detail">
                                            <?php echo $description ?>
                                        </p>
                                        <br>

                                        <a href="<?php echo SITEURL ?>order.php?id=<?php echo $food_id ?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            <?php
                        }
                    }else{
                        echo "No food category found";
                    }
                }else{
                    die("Failed to query" . mysqli_error($conn));
                }
            ?>
            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

      <?php include('partials/footer.php') ?>