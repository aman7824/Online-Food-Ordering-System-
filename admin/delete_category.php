<?php 
    include('../config/constants.php');
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = intval($_GET['id']);
        $image = $_GET['image_name'];

        // Remove image if exists
        if($image != ""){
            $image_path = "../images/category/" . $image;
            if(file_exists($image_path)){
                $remove = unlink($image_path);
                if($remove == false){
                    $_SESSION['image_failed'] = "Image failed to delete";
                    header("Location:". SITEURL. '/admin/category.php');
                    exit();
                }
            }
        }

        // Delete category from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res == true){
            $_SESSION['delete_category'] = "Category deleted successfully";
        } else {
            $_SESSION['delete_category'] = "Failed to delete category";
        }
        header("Location:". SITEURL. '/admin/category.php');
        exit();
    } else {
        header("Location:". SITEURL. '/admin/category.php');
        exit();
    }
?>