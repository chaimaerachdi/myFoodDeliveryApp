
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
            margin:5% 10% 5% 10%;


        }

        h3{
            margin-left:33%;
        }

        img{
            border-radius:20%;
            height: 45%;
            width:30%;
        }
</style>


</head>
<body>
  <div class="categories">
    <div class="container">
        <h2 class="text-center">Menu</h2><br><br>
           
        <?php
            $sql="SELECT * from tbl_category where active='yes'";
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
        

            


    </div>
  </div><br>
</body>
</html>


