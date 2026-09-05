<?php include("partials/header.php") ?>
<section>
    <form action="" method="POST" class="p-5 shadow rounded" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Enter title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter food title">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Featured</label>
            <input type="radio" name="featured" class="form-check-input" value="Yes">Yes
            <input type="radio" name="featured" class="form-check-input" value="No">No
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Active</label>
            <input type="radio" name="active" class="form-check-input" value="Yes">Yes
            <input type="radio" name="active" class="form-check-input" value="No">No
        </div>
        <input type="submit" name="submit" value="Add Category" class="btn btn-primary w-100">
        
    </form>
</section>
<?php 
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        //featured
        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }else{
            $featured = "No";
        }
        //active
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "No";
        }
        //image upload starts
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
            $image = $_FILES['image']['name'];
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $image = "food_category_" . uniqid() . "." . $ext;
            $source = $_FILES['image']['tmp_name'];
            $image_destination = "../images/category/" . $image;

            // Optional: check file type
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            if(!in_array(strtolower($ext), $allowed)){
                echo '
                <script>
                // Show a Toastify notification instead of toastr
                    Toastify({
                        text: "please upload an image",
                        duration: 5000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#4CAF50",
                        stopOnFocus: true
                    }).showToast();

                </script>
                ';
                // header("Location:". SITEURL . "admin/add_category.php");
                die();
            }

            $img_upload = move_uploaded_file($source, $image_destination);
            if(!$img_upload){
                $_SESSION['failed_image'] = "Image failed to upload";
                header("Location:". SITEURL . "admin/add_category.php");
                die();
            }
        } else {
            $image = "";
        }

        //image upload ends

        if(!empty($title) && is_string($title)){
            $sql = "insert into tbl_category set
                title = '$title',
                image_name = '$image',
                featured = '$featured',
                active = '$active'
            ";
            $res = mysqli_query($conn, $sql);
            if($res == true){
                $_SESSION['add_category'] = "Category added successfully";
                header("Location:". SITEURL. "admin/category.php");
            }
        }else{
            echo '
                <script>
                    Toastify({
                        text: "Title can not be empty",
                        duration: 5000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#7d1816",
                        stopOnFocus: true
                    }).showToast();
                </script>
            ';
        }
    }
?>