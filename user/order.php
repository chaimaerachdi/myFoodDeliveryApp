<?php include('../user/partials_front/menu_user.php');?>

<?php
// check food id is set or not 
if(isset($_GET['food_id'])){
    // get the food id and details 
    $food_id=$_GET['food_id'];
    $sql="SELECT * FROM tbl_food WHERE id=$food_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        // we have data =>get data from database to displqy it to our form
        $row=mysqli_fetch_assoc($res);

        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
        echo $image_name;


        // get thedata 
        
        
    }
    else{
        // redirect to home page
        header('location:'.SESSIONURL);
    }
}
else{
    // redirect to home page
    header('location:'.SESSIONURL);
}
  
?>

 
  <!-- fOOD sEARCH Section Starts Here -->
  <section class="food-search">
        <div style="margin:10%; padding:2%;"  class="container">
            
            <h2  class="text-center text-white">Fill this form to confirm your order.</h2>
            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img box-3">

                    <?php
                            if($image_name==""){

                                echo "<div class='error'>img not available</div>";  
                            }
                            else{
                                ?>
                                <img style="width: 100%;" src="<?php echo SESSIONURL;?>img/category/<?php echo $image_name; ?>" alt="">
                                <?php
                            }
                        ?>
                    </div>
    
                    <div class="box-3">
                        <h3  style="margin-left:1%;" ><?php echo $title; ?></h3>
                        <input  style="margin-left:1%;"  type="hidden" name="food" value="<?php echo $title; ?>">

                        <p  style="margin-left:1%;"  class="food-price">$<?php echo $price; ?></p>
                        <input style="margin-left:1%;" type="hidden" name="price" value="<?php echo $price; ?>">

                        <div style="margin-left:1%;" class="order-label">Quantity</div>
                        <input style="margin-left:1%;" type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset style="text-align:center;" >
                    <legend>Delivery Details</legend>
                    <div  class="order-label">Full Name</div>
                    <input style="width: 65%;"  type="text" name="full-name" placeholder="E.g. RACHDI CHAIMAE" class="input-responsive" required>

                    <div  class="order-label">Phone Number</div>
                    <input style="width: 65%;"  type="tel" name="contact" placeholder="E.g. 06........" class="input-responsive" required>

                    <div  class="order-label">Email</div>
                    <input style="width: 65%;" type="email" name="email" placeholder="E.g. chaimaer659@gmail.com" class="input-responsive" required>

                    <div  class="order-label">Address</div>
                    <textarea   style="width: 65%;" name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>


                <br><br><br><br>
                    <input  style="width:75%;" type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    <br><br><br><br>
                </fieldset>

            </form>

            <?php
                // check wether submit is clicked
                if(isset($_POST['submit'])){
                    // get details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];



                     //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        statuus = '$status',
                        custumer_name = '$customer_name',
                        custumer_contact = '$customer_contact',
                        custumer_email = '$customer_email',
                        custumer_address = '$customer_address'
                    ";



                   //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SESSIONURL.'/user');
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SESSIONURL.'/user');
                    }



                }
            ?>
 

