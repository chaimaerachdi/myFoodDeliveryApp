<?php include('../user/partials_front/menu_user.php');?> 
<!-- ********************************************************** -->

<div class="food-search text-center">
    <div class="container">
        <br><br><br><br>
        <form action="<?php echo SESSIONURL;?>user/food_search.php" method="POST">
            <input type="search"  name="search" placeholder="Search for food..." style="width:75%;" required>
            <input type="submit" name="submit" class="btn btn-secondary" style="padding:10px; font-size:22px;">
        </form>
    </div>
</div>
<?php
    echo"";
    if(isset($_SESSION['order'])){
    echo $_SESSION['order'];
    unset($_SESSION['order']);
    }
?>
  <!-- --home start---->
  <section class="home" id="home">
        <div class="home-text">
            <h1>Full Website</h1><br><br><br>
            <h2>Food The <br>Most Precious Things</h2>
            <a href="#menu" class="btn">Today's Menu</a>
        </div>
        <div class="home-img">
            <img src="../img/home.png" style="width: 900%; height:900%;" alt="home.png">
        </div>
    </section>
     <!----about start---->
     <section class="about" id="about">
        <div class="about-img">
            <img src="../img/about.png" style="width: 80%; height:80%;" alt="about..png">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>We speak the good <br>food language</h2>
            <p>There are many variation passages of Lorem Ipsum available, but the majority have suffered alteration in form,
                by injected humour randomised words which don't look even slightly belieavle.
            </p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>
    <!----menu start---->
    <section  id="menu">
         <div class="heading">
            <span>Food menu</span>
            <h2>Fresh taste and great price</h2>
        </div>
       <!-- <div class="menu-container">
            <div class="box">
                <div class="box-img">
                    <img src="../img/food1.png" alt="food1.png">
                </div>
                <h2>Chicken Burger</h2>
                <h3>Tasty Food</h3>
                <span>$11.00</span>
                <i class='bx bx-cart-alt'></i>
            </div> 
             <div class="box">
                <div class="box-img">
                    <img src="../img/food2.png" alt="food2.png">
                </div>
                <h2>Special Beef Burger</h2>
                <h3>Tasty Food</h3>
                <span>$11.00</span>
                <i class='bx bx-cart-alt'></i>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="../img/food3.png" alt="food3.png">
                </div>
                <h2>Chicken free pack</h2>
                <h3>Tasty Food</h3>
                <span>$11.00</span>
                <i class='bx bx-cart-alt'></i>
            </div>
        </div> -->


        <!-- display just 3 categories here -->

        <?php
            $sql="SELECT * from tbl_category WHERE featured='yes' AND active='yes' LIMIT 3";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            if($count>0){
                // categ avialable
                while($row=mysqli_fetch_assoc($res)){

                    // reccupeere  img +title
                    $id=$row['id'];
                    $image_name=$row['image_name'];
                    // echo $image_name;
                    $title=$row['title'];
                    // echo $title;

                    ?>

                    <div class="box-3 float-container">
                        <?php
                            if($image_name==""){
                              echo "<div class='error'>img not available</div>";  
                            }
                            else{
                                // img available
                                ?>
                        <img style="width:100%;" src="<?php echo SESSIONURL;?>img/category/<?php echo $image_name; ?>" alt="">
                                <?php
                            }
                        ?>
                    <br> <a href="<?php echo SESSIONURL;?>user/category_foods.php?category_id=<?php echo $id?>"><h3 class="float-text text-white"><?php echo $title;?></h3> </a>               
                    </div>

                    <?php
                }
            }
            else{
                // categ not available
              echo "<div class='error'>category not available</div>";
            }
            ?>
    </section>

     <!-- main contenet section  ends -->


         <!----service start---->
    <section class="menu" style="margin-top:20%;" class="services" id="services">
        <div class="heading">
            <span>Services</span>
            <h2>We provide best quality food</h2>
        </div>
        <div class="service-container">
            <div class="s-box">
                <img src="../img/s1.png" alt="s1.png">
                <h3>Order</h3>
                <p>There are many variation of passages of Lorem Ipsum available but majority have suffred alteration 
                injection humour </p>
            </div>
            <div class="s-box">
                <img src="../img/s2.png" alt="s2.png">
                <h3>Shipping</h3>
                <p>There are many variation of passages of Lorem Ipsum available but majority have suffred alteration 
                injection humour </p>
            </div>
            <div class="s-box">
                <img src="../img/s3.png" alt="s3.png">
                <h3>Delivered</h3>
                <p>There are many variation of passages of Lorem Ipsum available but majority have suffred alteration 
                injection humour </p>
            </div>

        </div>
    </section> 
    <!----call to action---->
    <section class="cta">
        <h2>We make quality food <br>Everyday</h2>
        <a href="#" class="btn">Let's talk</a>
    </section>

<?php include('../admin/partials/footer.php');?>

      