<?php include('../admin/partials/menu.php');?><!--comment part =menu +footer -->
<div class="main_content">
    <div class="wrapper">
        <h1>ADD CATEGORY</h1>

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
                    <td><input placeholder="Enter category title"
                        type="text" name="title" required>
                    </td>
                </tr>  
                <tr>
                    <td>Select Image : </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
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
                        <input class="btn-secondary" type="submit" name="submit" value="Add Category" required>
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
</div>





<?php include('../admin/partials/footer.php');?>
<!-- now we will add code to process data from our form and saeve it to database  -->
<?php
    // check wether the btn is clicked or not 
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $featured=$_POST["featured"];
        $active=$_POST['active'];
        // check wheteher img is selected or not
        
        // print_r($_FILES['image']);

        // if img is not empty===>then upload the img
        if(isset($_FILES['image']['name'])){
            // upload the img
            // to do we need: img name +sourcePath +destination
            $image_name=$_FILES['image']['name'];
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../img/category/".$image_name;


            // finally uppload it
            $upload=move_uploaded_file($source_path,$destination_path);

            // check wether the img is uploaded
            // if not then we will stop the process and redirect with errro msg
            if($upload==false){
                $_SESSION['add']="<div class='error'>failed to upload image </div>";
                header('location:'.SESSIONURL."admin/add-category.php");
                // to stop the process
                die();
            }
        }
        else{
            // don't upload the img & set img value as balank
            $image_name="";
        }    
        if (!empty($title) && !empty($featured)&&!empty($active)) {
            // echo "fields are not empty";
            // ifthe image is uploaded successfully
            $sql="
                INSERT INTO tbl_category
                (title,image_name,featured,active)
                values('$title','$image_name','$featured','$active')
            ";
            // echo $sql;
        }   
        $res=mysqli_query($conn,$sql) or die("error in query execution ");
        // check wether data is inseted and display a msg for the user 
        if($res){
            $_SESSION['add']="<div class='success'>category added successfully  </div>";
            // redirect he user to the manage-admin.php page
            header("location:".SESSIONURL.'admin/manage-category.php');//SESSIONURL=cantant in constants.php
            
        }
        else{
            // echo'data is not inserted correctly  sorry';
            $_SESSION['add']="<div class='error'>failed to add category </div> ";
            // redirect he user to the add-admin.php page
            header('location:'.SESSIONURL.'admin/add-category.php');//SESSIONURL=cantant in constants.php
        }
    }
?>