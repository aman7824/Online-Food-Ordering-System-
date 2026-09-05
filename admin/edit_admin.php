<?php
    include("partials/header.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "select * from tbl_admin where id=$id";
    $res  = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($res);
    // var_dump($fetch);

?>

<form action="" class="my-5" method="post">
    <div class="container">
        <div class="row">
            <div class="col-6 shadow p-5 rounded">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" name="fullname" class="form-control shadow-none" id="fullname" value="<?php echo $fetch['full_name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" name="username" class="form-control shadow-none" id="username" value="<?php echo $fetch['username']?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Edit Admin</button>
            </div>
        </div>
    </div>
</form>

<?php include("partials/footer.php") ?>

<?php
    
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        //update the table
        $update = "update tbl_admin SET
            full_name = '$fullname',
            username = '$username'
            where id = $id;
        ";
        //execute the query
        $execute = mysqli_query($conn, $update) or die(mysqli_error($conn));
        if($execute){
            $_SESSION['update_admin'] = "admin updated successfully";
            header("Location: " . SITEURL . 'admin/admin.php');
            exit;
        }else{
            return;
        } 
    }
?> 