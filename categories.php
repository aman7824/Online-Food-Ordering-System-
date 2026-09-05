<?php include('partials/header.php') ?>

<div class="container">
    <div class="row">
        <?php 
        $sql = "select * from tbl_category where active='yes'";
        $res = mysqli_query($conn, $sql);
        if($res == true){
            $rows = mysqli_num_rows($res);
            if($rows> 0){
                while($fetch = mysqli_fetch_assoc($res)){
                    $id = $fetch['id'];
                    $title = $fetch['title'];
                    $image_name = $fetch['image_name'];
                    ?>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <a href="<?php echo SITEURL ?>category-foods.php?id=<?php echo $id ?>">
                            <div class="card">
                                <?php if(!empty($image_name)): ?>
                                    <img src="<?php echo SITEURL ?>images/category/<?php echo $image_name ?>" class="card-img-top" alt="...">
                                <?php else: ?>
                                    <span>No Image</span>
                                <?php endif ?>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $title ?></h5>
                            </div>
                            </div>
                        </a>
        </div>
                    <?php
                }
            }
        }
        ?>
        
    </div>
</div>
   


<?php include('partials/footer.php') ?>
    