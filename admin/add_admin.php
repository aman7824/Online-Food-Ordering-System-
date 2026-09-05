<?php include("partials/header.php") ?>
<div class="container my-5 ">

    <?php 
        $errors = [];
        if(isset($_POST['submit'])){
            $fullname = trim($_POST['fullname']);
            $username = trim($_POST['username']);
            if(!empty($_POST['password'])){
                $password_raw = $_POST['password'];
            }else{
                $errors[] = "passoword can't be empty" . mysqli_error($conn);
            }
            

            if(!empty($fullname) && !empty($username) && !empty($password_raw)){
                $hasLowercase = preg_match('@[a-z]@', $password_raw);
                $hasUppercase = preg_match('@[A-Z]@', $password_raw);
                $hasNumbers = preg_match('@[0-9]@', $password_raw);
                $hasSymbols = preg_match('@[\W_]@', $password_raw);

                if($hasLowercase && $hasNumbers && $hasUppercase && $hasSymbols){
                    $password_hash = md5($password_raw);
                    $user = "select * from tbl_admin where username = '$username'";
                    $execute = mysqli_query($conn, $user);
                    $count = mysqli_num_rows($execute);
                    if($count === 0){
                        // Use password_hash instead of md5 for better security
                        $sql = "INSERT INTO tbl_admin SET
                            full_name = '".mysqli_real_escape_string($conn, $fullname)."',
                            username = '".mysqli_real_escape_string($conn, $username)."',
                            password = '$password_hash'
                        ";

                        $res = mysqli_query($conn, $sql);
                        if($res){
                            $_SESSION['add_admin'] = "Admin added successfully";
                            header("Location: admin.php");
                            exit();
                        } else {
                            $errors[] = "Data failed to insert: " . mysqli_error($conn);
                        }
                    }else{
                        $errors[] = "username already exists" . mysqli_error($conn);
                    }
                } else {
                    $errors[] = "Password should contain uppercase, lowercase, number, and symbol.";
                }
            } else {
                $errors[] = "All fields are required.";
            }
        }
    ?>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger" role="alert" id="errors">
            <?php foreach($errors as $error): ?>
                <?php echo htmlspecialchars($error) . '<br>'; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-5 shadow p-5 rounded">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" name="fullname" placeholder="Enter fullname" class="form-control shadow-none" id="fullname" autocomplete="off" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" placeholder="Enter username" class="form-control shadow-none" id="username" autocomplete="off" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none" placeholder="Enter password" name="password" id="password" autocomplete="off">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input shadow-none" id="check_password" onclick="togglePassword()">
                    <label class="form-check-label" for="check_password">Show Password</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
            </form>
        </div>
    </div>
</div>
<?php include("partials/footer.php") ?>

<script>
function togglePassword() {
    var pwd = document.getElementById("password");
    pwd.type = pwd.type === "password" ? "text" : "password";
}
//error disappear
const errors = document.getElementById('errors');
setTimeout(() => {errors.remove()}, 3000);
</script>

<script src="../js/app.js"></script>