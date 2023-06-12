<?php

    include('../admin/partials/config/constants.php');
    // get id of the admin to be delited 
    $id=$_GET['id'];
    // create sql queryto delete adm

    $sql="DELETE FROM tbl_admin WHERE id=$id";
    // excute it
    $res=mysqli_query($conn,$sql);

    // redirect the user to the manage-admin.php with a  message of delited succefully /not deleted (using $_SESSION variable wich allows us to recuperate data from an other page delete-admin.php in this case)
    if($res){
        $_SESSION['delete']="<div class='success'>deleted successfully";
        // redirect
        header('location:'.SESSIONURL."admin/manage-admin.php");
    }
    else{
        $_SESSION['delete']="<div class='error'>not deleted successfully";
        header('location:'.SESSIONURL."admin/manage-admin.php");
    }
?>