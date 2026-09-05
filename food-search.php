<?php include('partials/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php $search = mysqli_real_escape_string($conn, $_POST['search']); ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php 
    
    $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    $res = mysqli_query($conn, $sql);
    $num= mysqli_num_rows($res);
    if($num > 0){
        while($fetch = mysqli_fetch_assoc($res)){
            $id = $fetch['id'];
            $title = $fetch['title'];
            $price = $fetch['price'];
            $image_name = $fetch['image_name'];
            $description = $fetch['description'];
            ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php if(!empty($image_name)): ?>
                        <img src="<?php echo SITEURL ?>images/food/<?php echo $image_name ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php
        } 
    }else{
        echo "<span>Food doesn't exist</span>";
    }
?>
            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

      <?php include('partials/footer.php') ?>