<?php include('../admin/partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE FOOD</h1>
        <!-- btn to add admmin -->
        <br><br>
        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        
        <?php
            if( isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
        
        ?><br><br>

        <?php
            if( isset($_SESSION['failed-remove'])){
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?><br><br>

        <br><br>
        <a class="btn-primary" href="<?php echo SESSIONURL;?>admin/add-food.php">add food</a>
                <br><br><br><br>
                <table width="100%" > 
                    <tr>
                        <th>Serial Number(S.N)</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    // create query to get foods from db
                    // recupere de la bdd  tous les admins
                    $sql="SELECT * FROM tbl_food";
                    $res=mysqli_query($conn,$sql);
                    if($res)
                    {
                        // il a pas pu recupere les admins de dbb
                        // echo'il a pu recupere les admins de dbb\n';
                        // s'il y'a des elts da la bdd
                        $count=mysqli_num_rows($res);//echo $count;
                        if($count>0)
                        {
                            // exist des admins dans la bdd
                            // dans ce cas je recupere elt par elt
                            $sn=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $title=$row['title'];
                                // $descrip=$row['image_name'];
                                $price=$row['price'];
                                $image_name=$row['image_name'];
                                // $category_id=$row['category'];
                                $featured=$row['featured'];
                                $active=$row['active'];
                                // I have to indsert html code here so I need to go from =>php to html to php again to complete the process
                                ?>
                                <!-- here html where I will use also php inside pour recupere les valuers ds variables $id... -->
                               


                                <tr><!--when i will add code i will dispaly them from db-->
                                    <td><?php echo $sn;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $price;?>($)</td>
                                <!--               -->
                                    <td>
                                        <?php
                                            //  echo  $img
                                            // check wether img name is available
                                            if($image_name!=""){

                                                // display the img
                                                ?>
                                                    <img 
                                                        src="<?php echo SESSIONURL;?>/img/category/<?php echo $image_name;?>" 
                                                        alt=""
                                                        width="150px"
                                                    >
                                                <?php
                                            }
                                            else{
                                                // just display a msg
                                                echo "<div class='error'>image not added .</div>";
                                            }

                                        ?>
                                    </td>


                                    <td><?php echo  $featured?></td>
                                    <td><?php echo  $active?></td>
                                    <td>
                                        <a href="<?php echo SESSIONURL;?>admin/update-food.php?id=<?php echo $id?>&image_name=<?php echo $image_name;?>" class="btn-secondary">update food</a><br><br>
                                        <a href="<?php echo SESSIONURL;?>admin/delete-food.php?id=<?php echo $id?>&image_name=<?php echo $image_name;?>"  class="btn-danger">delete food</a>
                                    </td>
                                </tr>
                                <?php $sn=$sn+1;
                            }
                        }
                        else
                        {
                            // pas d' foods dans la bdd
                            echo'no foods in bdd';
                        }
                    }
                    else
                    {
                        // il n'a pas pu recupere les foods de dbb
                        echo'can\'t  recuperate foods from dbb\n';
                    }
                    ?>
            
  
                </table>
    </div>
</div>
<?php include('../admin/partials/footer.php');?>