<?php include('partials/header.php') ?>
<div class="container-fluid">
    <?php 
        if(isset($_SESSION['order_delete'])){
            echo '
                <script>
                    Toastify({
                        text: "Order deleted successfully",
                        duration: 4000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#a60404ff",
                        stopOnFocus: true
                    }).showToast();
                </script>
            ';
            unset($_SESSION['order_delete']);
        }
        
    ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- data table starts -->
        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>total</th>
                    <!-- <th>total</th> -->
                    <th>order_date</th>
                    <th>status</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>
                        Action
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $sql = "select * from tbl_order";
                 $res = mysqli_query($conn, $sql);
                 $count = mysqli_num_rows($res);
                 if($count> 0){
                    $sn=1;
                    //fetch data from database
                    while($fetch = mysqli_fetch_assoc($res)){
                        $id = $fetch['id'];
                        $food = $fetch['food'];
                        $price = $fetch['price'];
                        $qty = $fetch['qty'];
                        $total = $fetch['total'];
                        $order_date = $fetch['order_date'];
                        $status = $fetch['status'];
                        $customer_name = $fetch['customer_name'];
                        $customer_contact = $fetch['customer_contact'];
                        $customer_email = $fetch['customer_email'];
                        $customer_address = $fetch['customer_address'];
                        ?>
                         <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $food ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $qty ?></td>
                            <td><?php echo $total ?></td>
                            <td><?php echo $order_date ?></td>
                            <td><?php echo $status ?></td>
                            <td><?php echo $customer_name ?></td>
                            <td><?php echo $customer_contact ?></td>
                            <td><?php echo $customer_email ?></td>
                            <td><?php echo $customer_address ?></td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <a href="<?php echo SITEURL ?>admin/delete_order.php?id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                            </td>
                            
                        </tr>
                        <?php
                    }
                 }else{
                    echo "No order yet";
                 }
                ?>
                
            </tbody>
        </table>
            <!-- data table ends -->
        </div>
    </div>
</div>
<script>   	
    new DataTable('#example');
</script>
<?php include('partials/footer.php') ?>