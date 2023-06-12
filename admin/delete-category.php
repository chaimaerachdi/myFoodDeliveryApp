<?php
    // echo "delete category";
    include('../admin/partials/config/constants.php');
        // get id of the admin to be delited 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        // create sql queryto delete adm
        // remove the physical  image file  if is available

        if($image_name!=""){
        // img is available =>so remove it(we ned her path)
            $path="../img/category/".$image_name;
            // remove
            $remove=unlink($path);
            // if failaed to remove img =>stop the proces
            if($remove==false){
                $_SESSION['remove']="<div class='error'>failed to remove category image </div>";
                header('location:'.SESSIONURL.'admin/manage-category.php');
                die();
            }

            // else delete data from db 
            $sql="DELETE FROM tbl_category WHERE id=$id";
            // excute it
            $res=mysqli_query($conn,$sql);
        
            // redirect the user to the manage-admin.php with a  message of delited succefully /not deleted (using $_SESSION variable wich allows us to recuperate data from an other page delete-admin.php in this case)
            if($res){
                $_SESSION['delete']="<div class='success'>category deleted successfully";
                // redirect
                header('location:'.SESSIONURL."admin/manage-category.php");
            }
            else{
                $_SESSION['delete']="<div class='error'>category not deleted successfully";
                header('location:'.SESSIONURL."admin/manage-category.php");
            }
        }


            // just delete data
            //  delete data from db 
            $sql2="DELETE FROM tbl_category WHERE id=$id";
            // excute it
            $res2=mysqli_query($conn,$sql2);
        
            // redirect the user to the manage-admin.php with a  message of delited succefully /not deleted (using $_SESSION variable wich allows us to recuperate data from an other page delete-admin.php in this case)
            if($res2){
                $_SESSION['delete']="<div class='success'>category deleted successfully";
                // redirect
                header('location:'.SESSIONURL."admin/manage-category.php");
            }
            else{
                $_SESSION['delete']="<div class='error'>category not deleted successfully";
                header('location:'.SESSIONURL."admin/manage-category.php");
            }


}
?>