<?php 
    include('../config/constants.php');
    $errors = [];
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
        $password = md5($_POST['password']);
        //select username and password from database
        $sql = "select * from tbl_admin where username = '$username' and password = '$password'";
        //execute the query
        $res = mysqli_query($conn, $sql);
        if($res == true){
            $rows = mysqli_num_rows($res);
            if($rows === 1){
                $_SESSION['login'] = "Login successfully";
                $_SESSION['user'] = $username;
                header("Location:" . SITEURL. "admin/");
            }else{
                $errors[] = "user doesn't exist" . mysqli_error($conn);
            }
        }
    }
?>
<?php if(!empty($errors)): ?>
        <div class="alert alert-danger" role="alert" id="errors">
            <?php foreach ($errors as $error) {
                echo $error . '<br>';
            } ?>
        </div>
<?php endif ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>
    <section>
        
        <form action="" method="POST" class="shadow p-5 rounded">
            <h5 class="text-center text-capitalize" id="logIn" style="color: red;">
                <?php 
                    if(isset($_SESSION['not-logged-in'])){
                        echo $_SESSION['not-logged-in'];
                        unset($_SESSION['not-logged-in']);
                    }
                ?>
            </h5>
            <table>
                <tr>
                    <td>
                        <label for="">Username</label>
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter username" id="" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Password</label>
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter password" id="password" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="checkbox" onclick="showPassword()">
                    </td>
                    <td>
                        <label for="checkbox">Show password</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>

<script>
    const checkbox = document.getElementById('checkbox');
    const password = document.getElementById('password');
    function showPassword(){
        password.type = password.type === "password" ? "text" : "password";
    };

    const errors = document.getElementById('errors');
    setTimeout(() => errors.remove(), 2000);

    //clear login message
    const logIn = document.getElementById('logIn');
    setTimeout(() => logIn.remove(), 2000);
</script>