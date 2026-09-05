<?php include("partials/header.php") ?>
<!-- tables start here -->
 <div class="container">
    <div class="row">
        <!-- adding admin starts -->
        
        <?php
            if(isset($_SESSION['add_admin'])){
                echo '
                    <script>
                // Show a Toastify notification instead of toastr
                    Toastify({
                        text: "Admin added successfully",
                        duration: 5000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#4CAF50",
                        stopOnFocus: true
                    }).showToast();

                </script>
                ';
                unset($_SESSION['add_admin']);
            }
        ?>
        
        <!-- adding admin ends -->
        <!-- deleting admin starts -->
        <?php
            if(isset($_SESSION['delete_admin'])){
                echo '
                    <script>
                // Show a Toastify notification instead of toastr
                    Toastify({
                        text: "admin deleted succesfully",
                        duration: 4000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#4CAF50",
                        stopOnFocus: true
                    }).showToast();

                </script>
                ';
                unset($_SESSION['delete_admin']);
            }
        ?>

        <!-- adding admin ends -->
            <?php 
                if(isset($_SESSION['update_admin'])){
                    echo '
                        <script>
                // Show a Toastify notification instead of toastr
                    Toastify({
                        text: "Admin updated successfully",
                        duration: 5000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#4CAF50",
                        stopOnFocus: true
                    }).showToast();

                </script>
                    ';
                    unset($_SESSION['update_admin']);
                }
            ?>
        
        <!-- updating admin ends -->

        <!-- updating password starts -->
        <?php 
            if(isset($_SESSION['update_password'])){
                echo '
                    <script>
                // Show a Toastify notification instead of toastr
                    Toastify({
                        text: "password deleted succesfully",
                        duration: 5000,
                        close: true,
                        gravity: "top", // top or bottom
                        position: "right", // left, center or right
                        backgroundColor: "#4CAF50",
                        stopOnFocus: true
                    }).showToast();

                </script>
                ';
                unset($_SESSION['update_password']);
            }
        ?>
        <!-- updating password ends -->

        <div class="col-12">
            <a href="add_admin.php" class="btn btn-primary text-capitalize my-3">add admin</a>
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //select data from database
                        $sql = "select * from tbl_admin";
                        //execute the query
                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if($res){
                            $rows = mysqli_num_rows($res);
                            if($rows > 0){
                                $sn = 1;
                                while($fetch = mysqli_fetch_assoc($res)){
                                    $id = $fetch['id'];
                                    $full_name =  $fetch['full_name'];
                                    $username = $fetch['username'];
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $full_name ?></td>
                                            <td><?php echo $username ?></td>
                                            <td>
                                                <a type="button" class="btn btn-primary" href="<?php echo SITEURL ?>admin/edit_admin.php?id=<?php echo $id ?>">Edit</a>

                                                <a type="button" class="btn btn-danger" onclick="return confirm('Do you want to delete admin?')" href="<?php echo SITEURL?>admin/delete_admin.php?id=<?php echo $id ?>">Delete</a>

                                                <a type="button" class="btn btn-secondary text-capiltaize" href="<?php echo SITEURL ?>admin/change_pwd.php?id=<?php echo $id ?>">Change Password</a>
                                            </td>
                                            
                                        </tr>
                                    <?php
                                }
                            }
                        }
                    ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
 </div>

<script>
    new DataTable('#example');
</script>
<!-- tables end here -->

<?php include("partials/footer.php") ?>
<script >
    const add_admin = document.getElementById('add_admin');
    window.addEventListener('DOMContentLoaded', ()=>{
        add_admin.classList.add('active');
        setTimeout(() => {add_admin.remove()}, 2000);
    })
    const delete_admin = document.getElementById('delete_admin');
    window.addEventListener('DOMContentLoaded', ()=>{
        delete_admin.classList.add('active');
        setTimeout(() => {delete_admin.remove()}, 2000);
    })
    const update_admin = document.getElementById('update_admin');
    window.addEventListener('DOMContentLoaded', ()=>{
        update_admin.classList.add('active');
        setTimeout(() => {update_admin.remove()}, 2000);
    })
    const update_password = document.getElementById('update_password');
    window.addEventListener('DOMContentLoaded', ()=>{
        update_password.classList.add('active');
        setTimeout(() => {update_password.remove()}, 2000);
    })
</script>

