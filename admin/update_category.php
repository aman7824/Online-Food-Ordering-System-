<?php 
    include('partials/header.php');
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = intval($_GET['id']);
        $current_image = $_GET['image_name'];

        $sql = "select * from tbl_category where id=$id";
        $res = mysqli_query($conn, $sql);
        if($res == true){
            $count = mysqli_num_rows($res);
            $rows = mysqli_fetch_assoc($res);
            $id = $rows['id'];
            $title = $rows['title'];
            $current_image = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];
        }
    }

    //update category

    if (isset($_POST['submit'])) {
        $update_title = mysqli_real_escape_string($conn, $_POST['title']);
        $originalImage = $_POST['current_image'];
        $newFeatured = $_POST['featured'] ?? 'No';
        $newActive = $_POST['active'] ?? 'No';

        // Handle image upload
        if (isset($_FILES['update_image']['name']) && $_FILES['update_image']['name'] != "") {
            $image_name = $_FILES['update_image']['name'];
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_image_name = "Category_" . time() . "." . $ext;
            $source_path = $_FILES['update_image']['tmp_name'];
            $destination_path = "../images/category/" . $new_image_name;

            // Upload new image
            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['failed_img'] = "Failed to upload new image";
                header("Location: " . SITEURL . "admin/update_category.php?id=$id&image_name=$originalImage");
                exit();
            }

            // Remove old image if exists
            if ($originalImage != "" && file_exists("../images/category/" . $originalImage)) {
                unlink("../images/category/" . $originalImage);
            }

            $image_to_save = $new_image_name;
        } else {
            $image_to_save = $originalImage;
        }

        // Update category
        $update = "UPDATE tbl_category SET
            title = '$update_title',
            image_name = '$image_to_save',
            featured = '$newFeatured',
            active = '$newActive'
            WHERE id = $id
        ";
        $execute = mysqli_query($conn, $update);

        if ($execute) {
            $_SESSION['update_category'] = "Category updated successfully";
            header("Location: " . SITEURL . "admin/category.php");
            exit();
        } else {
            $_SESSION['failed_update_category'] = "Category failed to update";
            header("Location: " . SITEURL . "admin/update_category.php?id=$id&image_name=$image_to_save");
            exit();
        }
    }
    //end of footer


?>

<br><br>
<section>
    <form action="" method="POST" class="p-5 shadow rounded" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Enter title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter food title" value="<?php echo htmlspecialchars($title ?? "", ENT_QUOTES) ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Current image</label><br>
            <?php if($current_image != ""): ?>
                <img src="<?php echo SITEURL ?>images/category/<?php echo $current_image ?>" alt="" style="width: 90px; height:70px; display:block;">
            <?php else : ?>
                    <span style="color: red;">No image</span>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label text-capitalize">Upload new image</label>
            <input type="file" class="form-control" id="image" name="update_image">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Featured</label>
            <input type="radio" name="featured" class="form-check-input" value="Yes"
                <?php if(strtolower($featured ?? '') == 'yes'){
                    echo "checked";
                } ?>
            >Yes

            <input type="radio" name="featured" class="form-check-input" value="No" 
            <?php if(strtolower($featured) == 'no'){
                echo "checked";
            } ?>
            >No
        </div>


        <div class="mb-3">
            <label for="" class="form-label">Active</label>
            <input type="radio" name="active" class="form-check-input" value="Yes"
                <?php 
                    if(strtolower($active) == 'yes'){
                        echo "checked";
                    }
                ?>
            >Yes
            <input type="radio" name="active" class="form-check-input" value="No"
                    <?php 
                    if(strtolower($active) == 'no'){
                        echo "checked";
                    }
                ?>
            >No
        </div>

        


        <input type="submit" name="submit" value="update Category" class="btn btn-primary w-100 text-capitalize">
        <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
        
    </form>
</section>

<?php include('partials/footer.php');?>