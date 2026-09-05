<?php include('partials/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="my-3">
                <a href="<?php echo SITEURL ?>admin/add_category.php" class="btn btn-primary text-capitalize">add category</a>
            </div>

        <?php 
            if(isset($_SESSION['add_category'])){
                echo '
                    <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Category added successfully !!",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#4CAF50",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                '
                ;
                // echo $_SESSION['add_category'];
                unset($_SESSION['add_category']);
            }

            if(isset($_SESSION['delete_category'])){
                echo '
                    <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Category deleted successfully !!",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#4CAF50",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                ';
                unset($_SESSION['delete_category']);
            }
            if(isset($_SESSION['update_category'])){
                echo '
                    <script>
                    // Show a Toastify notification instead of toastr
                        Toastify({
                            text: "Category updated successfully !!",
                            duration: 5000,
                            close: true,
                            gravity: "top", // top or bottom
                            position: "right", // left, center or right
                            backgroundColor: "#4CAF50",
                            stopOnFocus: true
                        }).showToast();
                    </script>
                ';
                unset($_SESSION['update_category']);
            }
        ?>


            <!-- data table starts -->
        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "select * from tbl_category";
                    //execute the query
                    $res = mysqli_query($conn, $sql);
                    if($res == true){
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $featured = $rows['featured'];
                                $image = $rows['image_name'];
                                $active = $rows['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $title ?></td>
                                        <td>
                                            <?php if(!empty($image)): ?>
                                                <img src="<?php echo SITEURL ?>images/category/<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="Category Image" style="width: 80px; height: 80px">
                                            <?php else: ?>
                                                <span class="text-muted">No image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $featured ?></td>
                                        <td><?php echo $active ?> </td>
                                        <td>
                                            <!-- update category -->
                                            <a href="<?php echo SITEURL ?>admin/update_category.php?id=<?php echo $id ?>&image_name=<?php echo $image ?>" class="btn btn-primary">Update category</a>
                                            

                                           <!-- delete category -->
                                            <a href="<?php echo SITEURL?>admin/delete_category.php?id=<?php echo $id ?>&image_name=<?php echo $image; ?>" class="btn btn-danger" onclick="deleteCategory(event)">Delete category</a>
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
    function deleteCategory(event) {
        if (!confirm("Do you want to delete?")) {
            if (event) event.preventDefault();
            return false;
        }
        return true;
    }
</script>
<?php include('partials/footer.php') ?>