<?php
    include("partials/header.php");
    if(isset($_GET['id'])){
        $id = intval($_GET['id']); // Sanitize input
        $sql = "DELETE FROM tbl_order WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $res = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($res){
            $_SESSION['order_delete'] = "Order deleted successfully";
            header("Location:".SITEURL.'admin/order.php');
            exit();
        } else {
            $_SESSION['order_delete'] = "Failed to delete order";
            header("Location:".SITEURL.'admin/order.php');
            exit();
        }
    } else {
        header("Location:".SITEURL.'admin/order.php');
        exit();
    }
?>