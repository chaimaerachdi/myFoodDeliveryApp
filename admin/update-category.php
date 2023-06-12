<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE CATEGORY</h1>
        <br><br><br><br><br><br><br>
        <?php   
            include('../admin/partials/menu.php');

            if(isset($_GET['id'])&& isset($_GET['image_name'])){
                $id=$_GET['id'];
                $current_image=$_GET['image_name'];
    
                $sql="SELECT * FROM tbl_category WHERE id=$id";
    
                $res=mysqli_query($conn,$sql);
    
                if($res){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                        // get the detailes
                        // echo 'categ availabel';
                        $row=mysqli_fetch_assoc($res);

                        $title=$row['title'];
                        $current_image=$row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
    
                    }
                    else{
                        // redirect to manage-admin 
                        header('location:'.SESSIONURL.'admin/manage-category.php');
                    }     
                }
                else{
                    echo 'echec conn a bdd';
                }
            }
            else{
                header('location:'.SESSIONURL.'admin/manage-category.php');

            }
        ?>
      <form action="" method="POST" enctype="multipart/form-data" >
            <!-- add  a property wich allows us tom uupload our image  -->

            <?php
                if( isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            
            ?>
            <?php
                if( isset($_SESSION['add-img'])){
                    echo $_SESSION['add-img'];
                    unset($_SESSION['add-img']);
                }
            ?>
            <table class="tbl-30">
                <tr >
                    <td>Title: <br></td>
                    <td><input type="text" name="title" value="<?php echo $title?>">
                    </td>
                </tr>  
                <tr>
                    <td>Current Image : </td>
                    <td>
                        <?php
                        if($current_image!=""){

                            ?>
                            <img 
                                src="<?php echo SESSIONURL?>img/category/<?php echo $current_image?>" 
                                alt=""
                                width="150px"
                            >
                            
                            <?php
                        }
                        else{
                            echo "<div class='error'>Image not added</div>";
                        }

                        ?>
                    </td>
                </tr>

                <tr>
                <tr>
                    <td>New Image : </td>
                    <td><input type="file" name="image" ></td>
                </tr>
                <td>Featured: <br></td>
                        <td>
                            <input  type="radio" <?php if($featured=="Yes"){echo "checked";}?> name="featured" value="<?php echo $featured?>">Yes
                            <input  type="radio" <?php if($featured=="No"){echo "checked";}?>  name="featured" value="<?php echo $featured;?>">No
                
                        </td> 
                <tr>
                <td>Active: <br></td>
                            <td>
                                <input  type="radio" <?php if($active=="Yes"){echo "checked";}?>  name="active" value="<?php echo $active;?>">Yes
                                <input  type="radio"  <?php if($active=="NO"){echo "checked";}?> name="active" value="<?php echo $active;?>">No                        
                        </td>
                </tr>
               
                </tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input class="btn-secondary" type="submit" name="submit" value="Update Category" required>
                    </td>
                </tr>
                
            </table>
        </form>
<!-- process the form -->
<?php
    if(isset($_POST['submit'])){
            // reccuperate data about user to be deleted
         $id=$_POST['id'];
         $title=$_POST['title'];
         $current_image=$_POST['current_image'];
         $featured=$_POST['featured'];
         $active=$_POST['active'];

        if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];
            if($image_name!=""){
                // A-get image -upload the new image  
                
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../img/category/".$image_name;
    
                $upload=move_uploaded_file($source_path,$destination_path);
                if($upload==false){
                    $_SESSION['upload']="<div class='error'>failed to upload image </div>";
                    header('location:'.SESSIONURL."admin/manage-category.php");
                    // to stop the process
                    die();
                }
                // B- remove the previous img
                $path="../img/category/".$current_image;
                $remove=unlink($path);
                // check wether image is removed -if failed to remove dsaplay a msg and stop the proccess
                if($remove==false){
                    // failed to remove

                    $_SESSION['failed-remove']="<div class='error'>Failed to remove current img </div>";
                    header('location:'.SESSIONURL.'admin/manage-category.php');
                    // stop the proccess
                    die();
                }
                else{
                    // removed
                }
           }
           else{
                // no img is selected => keep the previous img
                $image_name=$current_image; 
           }
        }
        else{
            $image_name=$current_image;
        }

        if(!empty($title) && !empty($featured)&& !empty($active)){
                        // create query to update
            $sql="UPDATE tbl_category 
                 SET title='$title' 
                ,image_name='$image_name'
                , featured='$featured'
                , active='$active' 
                WHERE id=$id
        
            ";
            // execute
            $res=mysqli_query($conn,$sql);
            // redirect
            if($res){
                $_SESSION['update']="<div class='success'> updated successfully";
                header('location:'.SESSIONURL."admin/manage-category.php");
            }
            else{
                $_SESSION['update']="<div class='error'> error while updating ";
                header('location:'.SESSIONURL."admin/manage-category.php");
            }
        }   
    }
?>

<?php include('../admin/partials/footer.php');?>