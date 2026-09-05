<?php 
    include('partials/header.php');
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $select = "select * from tbl_food where id=$id";
        $query = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($query);

    }else{
        header("Location:".SITEURL.'admin/food.php');
    };

    //working on update functionality
    if(isset($_POST['submit'])){
        $id = intval($_POST['new_id']);
        $title =htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, "UTF-8");
        $current_image = $_POST['current_img'];
        $price = $_POST['price'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        //uploading image new
        if(isset($_FILES['new_image']['name']) && $_FILES['new_image']['name'] != "") {
            $image_name = $_FILES['new_image']['name'];
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_image_name = "food_" . rand(100,999) . '.' . $ext;
            $image_source = $_FILES['new_image']['tmp_name'];
            $image_destination = '../images/food/' . $new_image_name;
            $upload = move_uploaded_file($image_source, $image_destination);
            if($upload == false){
            $_SESSION['image_failed'] = "Image failed to upload";
            header("Location: ". SITEURL. 'admin/food.php');
            exit();
            }

            // Remove original image if exists
            if(!empty($current_image) && file_exists('../images/food/' . $current_image)){
            unlink('../images/food/' . $current_image);
            }
        } else {
            $new_image_name = $current_image;
        }

        //upload and remove image are all done
        //updating database
        $sql = "Update tbl_food Set
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$new_image_name',
            featured = '$featured',
            active = '$active'
            WHERE id = $id
        ";
        //executing the query
        $res = mysqli_query($conn, $sql);
        if($res == true){
            $_SESSION['updated_food'] = "food update";
            header("Location: ".SITEURL. 'admin/food.php');
        }else{
            $_SESSION['failed_updated_food'] = "food failed to upload";
            header("Location: ".SITEURL. 'admin/food.php');
        }

    }

?>
<div class="container my-5">
    <div class="row">
        <div class="col-6">
            <form action="" method="POST" class="p-5 shadow rounded" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Enter title</label>
                    <input type="text" name="title" class="form-control shadow-none" id="title" placeholder="Enter food title" value="<?php echo htmlspecialchars($row['title']) ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Enter Description</label>
                    <textarea name="description" placeholder="Enter food description" id="description" class="form-control"><?php echo htmlspecialchars($row['description']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Enter Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="<?php echo $row['price'] ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Current Image</label><br>
                    <?php if(!empty($row['image_name'])): ?>
                        <img src="../images/food/<?php echo htmlspecialchars($row['image_name']); ?>" class="img-fluid" alt="Food Image" width="100" height="100">
                    <?php else: ?>
                        <span class="text-muted">No image</span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-capitalize">Upload new image</label>
                    <input type="file" class="form-control" id="image" name="new_image">
                </div>

                <label for="" class="form-label">Choose Category ID</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <!-- <option selected>Open this select menu</option> -->
                     <option value="">food 1</option>
                     <option value="">food 1</option>
                    
                </select>

                <br>
                <div class="mb-3">
                    <label for="" class="form-label">Featured</label>
                    <input type="radio" name="featured" class="form-check-input" value="Yes" <?php echo (strtolower($row['featured']) == 'yes') ? 'checked' : ''; ?>>Yes
                    <input type="radio" name="featured" class="form-check-input" value="No" <?php echo (strtolower($row['featured']) == 'no') ? 'checked' : ''; ?>>No
                </div>
               
                <div class="mb-3">
                    <label for="" class="form-label">Active</label>
                    <input type="radio" name="active" class="form-check-input" value="Yes" <?php echo(strtolower($row['active'])=='yes' ? 'checked' : '') ?> >Yes
                    <input type="radio" name="active" class="form-check-input" value="No" <?php echo (strtolower($row['active']) == 'no' ? 'checked' :'') ?>>No
                </div>
                <input type="submit" name="submit" value="Update Food" class="btn btn-primary w-100">
                <!-- inserting current image in hidden input -->
                 <input type="hidden" name="current_img" value="<?php echo $row['image_name'] ?>">
                 <!-- new id -->
                  <input type="hidden" name="new_id" value="<?php echo $id ?>">
                
            </form>
        </div>
    </div>
</div>

<?php include('partials/footer.php') ?>