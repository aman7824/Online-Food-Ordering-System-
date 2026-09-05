<?php include("partials/header.php") ?>
<?php
    //fetch category number
    $select_category = "SELECT COUNT(*) AS total FROM tbl_category";
    $execute_query = mysqli_query($conn, $select_category);
    $row = mysqli_fetch_assoc($execute_query);
    $category_count = $row['total'];
    //fetch admin
    $fetch_admin = "SELECT count(*) As total from tbl_admin";
    $execute_admin = mysqli_query($conn, $fetch_admin);
    $fetch_all_admin = mysqli_fetch_assoc($execute_admin);
    $admin_count = $fetch_all_admin['total'];
    //fetch food
    $select_food = "SELECT count(*) as total from tbl_food";
    $execute_food = mysqli_query($conn, $select_food);
    $fetch_food = mysqli_fetch_assoc($execute_food);
    $count_food = $fetch_food['total'];
    //fetch order
    $select_order = "SELECT count(*) as total from tbl_order";
    $execute_order = mysqli_query($conn, $select_order);
    $fetch_order = mysqli_fetch_assoc($execute_order);
    $count_order = $fetch_order['total'];
?>

<div class="container">
    <div class="row">
        <h2 class="text-capitalize py-4">dashboard</h2>

        <div class="col-3 text-center shadow rounded py-5 mx-1">

            <h3>
                <?php if($category_count >= 5): ?>
                    <span><?php echo $category_count ?></span>
                <?php else: ?>
                    <span style="color: red;"><?php echo $category_count ?></span>
                <?php endif ?>
            </h3>
            <p>Categories</p>
        </div>
        <div class="col-3 text-center shadow rounded py-5 mx-1">
            <h3><?php echo $count_food ?></h3>
            <p>Foods</p>
        </div>
        <div class="col-3 text-center shadow rounded py-5 mx-1">
            <h3><?php echo $admin_count ?></h3>
            <p>Admins</p>
        </div>
        <div class="col-2 text-center shadow rounded py-5 mx-1">
            <h3><?php echo $count_order ?></h3>
            <p>Orders</p>
        </div>
    </div>
</div>

<?php include("partials/footer.php") ?>
<script>
// Show a Toastify notification instead of toastr
    Toastify({
        text: "Login successfully",
        duration: 5000,
        close: true,
        gravity: "top", // top or bottom
        position: "right", // left, center or right
        backgroundColor: "#4CAF50",
        stopOnFocus: true
    }).showToast();
</script>