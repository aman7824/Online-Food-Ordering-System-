<?php include('partials/header.php') ?>
<div class="container-fluid">
    <?php 
        if(isset($_SESSION['food_added'])){
            echo '
                <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Food added successfully !!",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#4CAF50",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                ';
            unset($_SESSION['food_added']);
        };
        if(isset($_SESSION['delete_food'])){
            echo '
                <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Food deleted successfully",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#820000ff",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                ';
            unset($_SESSION['delete_food']);
        };
        //image failed to upload
        if(isset($_SESSION['image_failed'])){
            echo '
                <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Image failed to upload",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#820000ff",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                ';
            unset($_SESSION['image_failed']);
        };
        //updated food
        if(isset($_SESSION['updated_food'])){
            echo '
                <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Food updated successfully",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#003809ff",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                ';
            unset($_SESSION['updated_food']);
        };
    ?>
    <div class="row">
        <div class="col-lg-12">
        <div class="my-3">
            <a href="<?php echo SITEURL?>admin/add_food.php" class="btn btn-primary text-capitalize">add food</a>
        </div>
            <!-- data table starts -->
        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image_name</th>
                    <th>Category_id</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "select * from tbl_food";
                    $res = mysqli_query($conn, $sql);
                    if($res == true){
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $description = $rows['description'];
                                $price = $rows['price'];
                                $image = $rows['image_name'];
                                $category_id = $rows['category_id'];
                                $featured = $rows['featured'];
                                $active = $rows['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php echo $price ?></td>
                                        <td>
                                            <?php if($image != ""): ?>
                                                <img src="../images/food/<?php echo $image ?>" alt="" srcset="" width="100px">
                                            <?php else: ?>
                                                <span class="text-mute">No image </span>
                                            <?php endif ?>
                                        </td>
                                        <td><?php echo $category_id ?></td>
                                        <td><?php echo $featured ?></td>
                                        <td><?php echo $active ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL ?>admin/delete.php?id=<?php echo $id ?>&image_name=<?php echo urlencode($image) ?>" onclick="return confirm('Do you want to delete food?')" class="btn btn-small btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                            <a href="<?php echo SITEURL ?>admin/update_food.php?id=<?php echo $id ?>" class="btn btn-small btn-primary ">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                    }
                ?>
                 
            </tbody>
        </table>
            <!-- data table ends -->
        </div>
    </div>
</div>
<script>   	
    new DataTable('#example');
</script>
<?php include('partials/footer.php') ?>