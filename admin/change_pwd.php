<?php 
    $errors = [];
    include('partials/header.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
    }

    $sql = "select * from tbl_admin where id=$id";
    $res = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($res);

    if(isset($_POST['submit'])){
        $password = $fetch['password'];
        $current_password = md5($_POST['current_password']);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if($password === $current_password){
            $hasLowercase = preg_match('@[a-z]@', $new_password);
            $hasUppercase = preg_match('@[A-Z]@', $new_password);
            $hasNumbers = preg_match('@[0-9]@', $new_password);
            $hasSymbols = preg_match('@[\W_]@', $new_password);
            if($hasLowercase && $hasUppercase && $hasNumbers && $hasSymbols){
                $newPassword = md5($new_password);
                $confirmPassword = md5($confirm_password);
                if($newPassword === $confirmPassword){
                    //update databse
                    $update = "update tbl_admin SET
                        password = '$newPassword'
                        where id= $id;
                    ";
                    $execute = mysqli_query($conn, $update);
                    if($execute){
                        $_SESSION['update_password'] = "password updated successfully";
                        // header("Location: ".SITEURL. "admin/admin.php");
                        header("Location: ".SITEURL. "admin/admin.php");
                    }
                }else{
                    $errors[] = "password don't match";
                }
            }else{
                $errors[] = "Password should contain uppercase, lowercase, number, and symbol.";
            }
        }else{
            $errors[] = "passwords do not match" . mysqli_error($conn);
            // return;
        }
    }
?>
<!-- alert message starts -->
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger" role="alert" id="error">
    <?php 
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
    ?>
    </div>
<?php endif ?>
<!-- alert message ends -->
<form action="" method="POST">
    <div class="container m-5">
        <div class="row">
            <div class="col-6 p-5 shadow rounded">
                <div class="mb-3">
                    <span>Hello <b><?php echo $fetch['username'] ?></b>, fill the fields below to change your password</span>
                </div>
                <div class="mb-3">
                    <label for="current_password" class="form-label">Enter current password:</label>
                    <input type="password" class="form-control shadow-none pswd" id="current_password" placeholder="Enter current password" name="current_password">
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Enter new password:</label>
                    <input type="password" class="form-control shadow-none pswd" id="new_password" placeholder="Enter new password" name="new_password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Enter confirm password:</label>
                    <input type="password" class="form-control shadow-none pswd" id="confirm_password" placeholder="confirm password" name="confirm_password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input shadow-none" id="check_password">
                    <label class="form-check-label" for="check_password">Show Password</label>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Change Password</button>
                
            </div>
        </div>
    </div>
</form>
<script>
    
    let check_password = document.getElementById('check_password');
    check_password.addEventListener('click', ()=>{
        let passwords =  document.querySelectorAll('.pswd');
        passwords.forEach(password=>{
            password.type = password.type === "password" ? "text": "password";
        })
    })

</script>
<?php include('partials/footer.php') ?>
<script>
    const error = document.getElementById('error');
    if(error){
        setTimeout(() => error.remove(), 2000);
    }
</script>
    


