<?php 
    include('partials/header.php');
    //submitting form to database
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        // $image = $_POST['image']
        $category_id = $_POST['category_id'];
        $featured = $_POST['featured'] ?? "No";
        $active = $_POST['active'] ?? "No";

        
        //working on the image
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] !=""){
            
            $image_name = $_FILES['image']['name'];
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_image_name = 'food_'.rand(000, 999). '.'.$ext;
            //image source
            $image_src = $_FILES['image']['tmp_name'];
            //image destination
            $image_destination = '../images/food/'.$new_image_name;
            //upload image
            $upload_image = move_uploaded_file($image_src, $image_destination);
            if($upload_image == false){
                echo "image failed";
                // header("Location:".SITEURL.'admin/add_food.php');
                die();
            }

        }else{
            $new_image_name = "";
        }


        //insert into database
        function isOnlyLetters($title) {
            return preg_match('/^[a-zA-Z\s]+$/', $title);
        }
        if(isOnlyLetters($title)){

            $sql = "insert into tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$new_image_name',
                category_id = $category_id,
                featured = '$featured',
                active = '$active'
            ";
            //execute the query
            $res = mysqli_query($conn, $sql);
            if($res == true){
                $_SESSION['food_added'] = "food added";
                header("Location: ".SITEURL. 'admin/food.php');
            }
        }else{
            echo '
                <script>
                    // Show a Toastify notification instead of toastr
                    Toastify({
                        text: "food title can only have letters",
                        duration: 5000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#9b0202ff",
                        stopOnFocus: true
                    }).showToast();
                </script>
            ';
        }


    }
    
?>
<div class="container my-5">
    <div class="row">
        <div class="col-6"> 
            <form action="" method="POST" class="p-5 shadow rounded" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Enter title</label>
                    <input type="text" name="title" class="form-control shadow-none" id="title" placeholder="Enter food title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Enter Description</label>
                    <textarea name="description" placeholder="Enter food description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Enter Price</label>
                    <input type="number" name="price" class="form-control" id="price" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <label for="" class="form-label">Choose Category ID</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <!-- <option selected>Open this select menu</option> -->
                     <?php
                        $select = "select id, title from tbl_category WHERE active='yes'";
                        $execute = mysqli_query($conn, $select);
                        $count = mysqli_num_rows($execute);
                        if($count > 0){
                            while($rows = mysqli_fetch_assoc($execute)){
                                $id = $rows['id'];
                                $title = $rows['title'];
                                ?>
                                    <option value="<?php echo $id ?>"><?php echo $title ?></option>
                                <?php
                            }
                        }
                      ?>
                    
                </select>

                <br>
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
                <input type="submit" name="submit" value="Add Food" class="btn btn-primary w-100">
                
            </form>
        </div>
    </div>
</div>

<?php include('partials/footer.php') ?>