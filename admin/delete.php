<?php 
include('../config/constants.php');
 if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = intval($_GET['id']);
    $image = $_GET['image_name'];

    if(!empty($image) && file_exists('../images/food/'.$image)){
        unlink('../images/food/'.$image);
    }

    $sql = "delete from tbl_food where id=$id";
    //execute the query
    $res = mysqli_query($conn, $sql);
    if($res == true){
        $_SESSION['delete_food'] = "food deleted successfully";
        header('Location:'.SITEURL.'admin/food.php');
    }
   
 }else{
    header('Location:'.SITEURL.'admin/food.php');
 }
?>