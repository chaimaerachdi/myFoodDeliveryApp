<!-- <h1>add Food</h1> -->
<?php
include('../admin/partials/menu.php');
?>
<div class="main_content">
    <div class="wrapper">
        <h1>ADD FOOD</h1>

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
            <?php
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>      
            <?php
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <table class="tbl-30">
                <tr >
                    <td>Title: <br></td>
                    <td><input placeholder="Enter category title"
                        type="text" name="title" required>
                    </td>
                </tr>  
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="descrip"  cols="30" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price(DH): </td>
                    <td>
                        <input type="number" name="price" >
                    </td>
                </tr>
                <tr>
                    <td>Select Image : </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" id="">
        
                        <!-- select categories auto from the data base  -->
                        <?php
                        // red=ccupetrate them 
                        $sql="SELECT * FROM tbl_category where active='Yes'";
                        $res=mysqli_query($conn,$sql);
                        if($res){
                            $count=mysqli_num_rows($res);
                            if($count>0){
                                // $sn=1;
                                while($row=mysqli_fetch_assoc($res)){
                                    $title=$row['title'];
                                    $id=$row['id'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $title?></option>
                                    <?php
                                    // $sn++;
                                }
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <td>Featured: <br></td>
                        <td>
                            <input  type="radio" name="featured" value="Yes">Yes
                            <input  type="radio" name="featured" value="No">No
                
                        </td> 
                <tr>
                <td>Active: <br></td>
                            <td>
                                <input  type="radio" name="active" value="Yes">Yes
                                <input  type="radio" name="active" value="No">No                        
                        </td>
                </tr>
               
                </tr>
                    <td colspan="2">
                        <input class="btn-secondary" type="submit" name="submit" value="Add Food" required>
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
</div>

<?php
include('../admin/partials/footer.php');
// insert date form into db
if(isset($_POST['submit'])){

    // add the food into dbb
    // 1-get the date 
    $title=$_POST['title'];
    $descrip=$_POST['descrip'];
    $price=$_POST['price'];
    // $image=$_POST['image'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    // 2-upload the image if selected
    if(isset($_FILES['image']['name'])){

        $image_name=$_FILES['image']['name'];
        if($image_name!=""){
            // img is sellected
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path='../img/category/'.$image_name;
    
            $upload=move_uploaded_file($source_path,$destination_path);
            if($upload){
                $_SESSION['upload']="<div class='success'>food img uploaded successfully</div>";
                header('location:'.SESSIONURL.'admin/manage-food.php');
            }
            else{
                $_SESSION['upload']="<div class='error'>food img not uploaded successfully</div>";
                header('location:'.SESSIONURL.'admin/add-food.php');
                die();
            }
    
        }       
    }
    else{
        $image_name="";
    }
    // 3-insert it into dbb
    $sql2="INSERT INTO tbl_food
            (title,description,price,image_name,category_id,featured,active)
            values('$title','$descrip',$price,'$image_name',$category,'$featured','$active')
         ";

    $res2=mysqli_query($conn,$sql2);
    if($res2){
        echo "inserted";
    }
}
?>
