<?php include('../admin/partials/menu.php');?><!--comment part =menu +footer -->

<!-- here only changing part iss inserted  -->
        <!-- main contenet section  stars -->
        <div class="main_content">
            <div class="wrapper">
                <h1>MANAGE ORDER</h1>
                <!-- btn to add admmin -->
                <?php
                    if( isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }                
                ?>
                <?php
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
                <br><br><br>
                <a class="btn-primary" href="add-order.php">add order</a>
                <br><br><br><br>
                <table width="100%" > 
                <!-- <tr>
                    <th>Serial Number(S.N)</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>status</th>
                    <th>Custumer Name</th>
                    <th>Custumer Contact</th>
                    <th>Custumer Email</th>
                    <th>Custumer Address</th>
                </tr> -->



                <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                
                <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['statuus'];
                                $customer_name = $row['custumer_name'];
                                $customer_contact = $row['custumer_contact'];
                                $customer_email = $row['custumer_email'];
                                $customer_address = $row['custumer_address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SESSIONURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

                </table>
   
            </div>   
        </div>
        <!-- main contenet section  ends -->

<?php include('../admin/partials/footer.php');?>                   
