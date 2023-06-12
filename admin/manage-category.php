<?php include('../admin/partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE CATEGORY</h1>
        <br><br><br><br>
        <!-- btn to add admmin -->
        <a class="btn-primary" href="add-category.php">add category</a>
                <br><br><br><br>
             
                <?php
                    if( isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                
                ?><br><br>

                <?php
                    if( isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                
                ?><br><br>
            
                <?php
                    if( isset( $_SESSION['upload'])){
                        echo  $_SESSION['upload'];
                        unset( $_SESSION['upload']);
                    }
                
                ?><br><br>
                <table width="100%" > 
                    <tr>
                        <th>Serial Number(S.N)</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    // recupere de la bdd  tous les admins
                    $sql="SELECT * FROM tbl_category";
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
                                $img=$row['image_name'];
                                $featured=$row['featured'];
                                $active=$row['active'];
                                // I have to indsert html code here so I need to go from =>php to html to php again to complete the process
                                ?>
                                <!-- here html where I will use also php inside pour recupere les valuers ds variables $id... -->
                               <tr><!--when i will add code i will dispaly them from db-->
                                    <td><?php echo $sn;?></td>
                                    <td><?php echo  $title;?></td>
                                    <td>
                                        <?php
                                            //  echo  $img
                                            // check wether img name is available
                                            if($img!=""){

                                                // display the img
                                                ?>
                                                    <img 
                                                        src="<?php echo SESSIONURL;?>/img/category/<?php echo $img;?>" 
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
                                        <a href="<?php echo SESSIONURL;?>admin/update-category.php?id=<?php echo $id?>&image_name=<?php echo $img;?>" class="btn-secondary">update category</a><br><br>
                                        <a href="<?php echo SESSIONURL;?>admin/delete-category.php?id=<?php echo $id?>&image_name=<?php echo $img;?>"  class="btn-danger">delete category</a>
                                    </td>
                                </tr>
                                <?php $sn=$sn+1;
                            }
                        }
                        else
                        {
                            // pas d' admins dans la bdd
                            echo'no categories in bdd';
                        }
                    }
                    else
                    {
                        // il n'a pas pu recupere les admins de dbb
                        echo'can\'t  recuperatecategories from dbb\n';
                    }
                    ?>
                    
                </table>   
    </div>
</div>
<?php include('../admin/partials/footer.php');?>