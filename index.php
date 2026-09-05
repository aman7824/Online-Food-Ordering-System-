<?php include('partials/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required autocomplete="off">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <!-- fetch data from category -->
             <?php 
                $select_category = "select * from tbl_category where featured='yes' && active='yes' order by created_at asc LIMIT 3";
                $execute_category= mysqli_query($conn, $select_category);
                if($execute_category == true){
                    $count_category = mysqli_num_rows($execute_category);
                    if($count_category > 0){
                        while($fetch_category = mysqli_fetch_assoc($execute_category)){
                            $id = $fetch_category['id'];
                            $category_image = $fetch_category['image_name'];
                            $category_name = $fetch_category['title'];
                            ?>
                                <a href="<?php echo SITEURL ?>category-foods.php?id=<?php echo $id ?>">
                                    <div class="box-3 float-container">
                                        <?php if($category_image !=""): ?>
                                            <img src="images/category/<?php echo $category_image ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php else: ?>
                                            <span>No image</span>
                                        <?php endif ?>

                                        <h3 class="float-text text-white"><?php echo $category_name ?></h3>
                                    </div>
                                </a>
                            <?php
                        }
                    }
                }else{
                    die();
                }
             ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <!-- select food from tbl_food table  -->
            <?php
                $select_food = "SELECT * FROM tbl_food WHERE active='yes' AND featured='yes' LIMIT 6";
                $execute_food = mysqli_query($conn, $select_food);
                if($execute_food){
                    $count_food = mysqli_num_rows($execute_food);
                    if($count_food > 0){
                        function getPreview($text, $word_limit = 10) {
                                $words = explode(' ', strip_tags($text));
                                if (count($words) <= $word_limit) {
                                    return implode(' ', $words);
                                }
                                return implode(' ', array_slice($words, 0, $word_limit)) . '...';
                            }
                        while($fetch_food = mysqli_fetch_assoc($execute_food)){
                            $id = $fetch_food['id'];
                            $title = $fetch_food['title'];
                            $description = $fetch_food['description'];
                            $price = $fetch_food['price'];
                            $image = $fetch_food['image_name'];
                            
                            ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php if(!empty($image)): ?>
                                        <img src="images/food/<?php echo $image ?>" alt="<?php echo htmlspecialchars($title) ?>" class="img-responsive img-curve">
                                    <?php else: ?>
                                        <span>No image</span>
                                    <?php endif ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo htmlspecialchars($title) ?></h4>
                                    <p class="food-price">$<?php echo $price ?></p>
                                    <p class="food-detail">
                                        <?php echo htmlspecialchars(getPreview($description)) ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL ?>order.php?id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            ?>

            

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php SITEURL ?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials/footer.php') ?>