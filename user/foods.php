<?php include('partials_front/menu_user.php');?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foods</title>
    <style>
        .categories{
            padding:4% 0;
            margin:3%;
        }
        .box-3{
            /* border:1px solid black; */
            width:28%;
            float:left;
            margin:1%;
        }
        .float-container{
            position: relative;

        }
        .float-text{
            position: absolute;
            bottom: 0%;
        }
        h3{
            color:white;
            font-size:1.5rem;
        }
        div{
            margin:2%;
            /* border:1px solid black; */

        }

        h3{
            margin-left:33%;
        }

        .food-menu{
            width:20%;
            float:left;
            border:1px solid black;
            border-radius:2%;
            padding:2%;

        }
        img{
            border-radius:20%;
            width:100%;
            float:left;
            /* margin: 0%; */
        }

        .food-menu-desc{
            width:70%%;
            float:left;
            margin-left:8%;
        } 
        .food-price{
            font-size:1.2rem;
        }
        .food-detail{
            font-size:1rem;
            color:#747d8c;
        }
        .btn{
            margin-top:14%;
            padding: 0%;
            font-size:130%;
        }

</style>


</head>
<body>
  <div class="categories">
    <div class="container">
        <h2 class="text-center">Menu</h2><br><br>


        <!-- getting foods from database -->

        <?php
            $sql="SELECT * from tbl_food where active='yes'and  featured='yes' LIMIT 6";
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
                    $desc=$row['description'];
                    $price=$row['price'];
                    // echo $title;
                    ?>




                    <div class="food-menu">
                        <div class="food-menu-img">
                        <?php
                            if($image_name==""){

                                echo "<div class='error'>img not available</div>";  
                            }
                            else{
                                ?>
                                <img src="<?php echo SESSIONURL;?>img/category/<?php echo $image_name; ?>" alt="">
                                <?php
                            }
                        ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">$<?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $desc ;?>
                            </p>
        
                            <a href="<?php echo SESSIONURL;?>user/order.php?food_id=<?php echo $id?>" class="btn btn-danger">Order Now</a>
                        </div>
                    </div> 
                    <?php
                }             
            }
            else{
                // categ not available
              echo "<div class='error'>foods not available</div>";
            }

        ?>

        

            
           


    </div>
  </div><br>
</body>
</html>
