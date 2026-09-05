<?php include('partials/header.php') ?>
<!-- submit data to database -->

<?php 
    if(isset($_POST['submit'])){
        $full_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['full-name']));
        $contact = mysqli_real_escape_string($conn, htmlspecialchars($_POST['contact']));
        $qty = mysqli_real_escape_string($conn, intval($_POST['qty']));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        $address = mysqli_real_escape_string($conn, htmlspecialchars($_POST['address']));
        $price = mysqli_real_escape_string($conn, floatval($_POST['price']));
        $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
        $date = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));
        $total = $price * $qty;
        $status = "order";

        // Validate name: only letters and spaces
        if(preg_match('/^[a-zA-Z\s]+$/', $full_name)){
            if(!empty($full_name) && !empty($address)){
                $stmt = $conn->prepare("INSERT INTO tbl_order (food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sdidssssss", $title, $price, $qty, $total, $date, $status, $full_name, $contact, $email, $address);
                $res2 = $stmt->execute();

                if($res2){
                    echo '
                        <script>
                            Toastify({
                                text: "Order submitted successfully",
                                duration: 4000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#4CAF50",
                                stopOnFocus: true
                            }).showToast();
                        </script>
                    ';
                }
                $stmt->close();
            }else{
                echo '
                <script>
                    Toastify({
                        text: "Fullname and address can"/t be empty",
                        duration: 4000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#a60404ff",
                        stopOnFocus: true
                    }).showToast();
                </script>
            ';
            }
        }else{
            echo '
                <script>
                    Toastify({
                        text: "Name should contain only letters and spaces",
                        duration: 4000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#a60404ff",
                        stopOnFocus: true
                    }).showToast();
                </script>
            ';
        }
    }
?>
<body style="background-color: rgba(27, 123, 164, 1);">
    

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "select * from tbl_food where id=$id";
                $res = mysqli_query($conn, $sql);
                $fetch = mysqli_fetch_assoc($res);
            }else{
                header("Location:".SITEURL);
            }
                
            ?>
            <form action="#" class="order" method="post">
                <fieldset>
                    <legend>Selected Food</legend>
                    <?php if(!empty($fetch['image_name'])): ?>
                        <div class="food-menu-img">
                            <img src="<?php echo SITEURL ?>images/food/<?php echo $fetch['image_name']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        </div>
                    <?php endif ?>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $fetch['title'] ?></h3>
                        <p class="food-price">$<?php echo $fetch['price'] ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    <input type="hidden" name="price" value="<?php echo $fetch['price'] ?>">
                    <input type="hidden" name="title" value="<?php echo $fetch['title'] ?>">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
</body>
    <?php include('partials/footer.php') ?>