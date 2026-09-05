<?php include('partials/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                $sql = "select * from tbl_food where active='yes'";
                $res = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($res);
                if($num > 0){
                    while($fetch = mysqli_fetch_assoc($res)){
                        $id = $fetch['id'];
                        $title = $fetch['title'];
                        $image = $fetch['image_name'];
                        $price = $fetch['price'];
                        $description = $fetch['description']
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php if(!empty($image)): ?>
                                        <img src="<?php echo SITEURL ?>images/food/<?php echo $image ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php else: ?>
                                        <span>No Image</span>
                                    <?php endif ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title ?></h4>
                                    <p class="food-price">$<?php echo $price ?></p>
                                    <p class="food-detail">
                                        <?php echo $description ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL ?>order.php?id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    echo "<span>No Image</span>";
                }
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

     <?php include('partials/footer.php') ?>