<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE ADMIN</h1>
        <br><br><br><br><br><br><br>
        <?php   
            include('../admin/partials/menu.php');
            $id=$_GET['id'];

            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            $res=mysqli_query($conn,$sql);

            if($res){
                $count=mysqli_num_rows($res);
                if($count==1){

                    // get the detailes
                    // echo 'admin availabel';
                    $row=mysqli_fetch_assoc($res);
                    $user_name=$row['user_name'];
                    $full_name=$row['full_name'];
                }
                else{
                    // redirect to manage-admin 
                    header('location:'.SESSIONURL.'admin/manage-admin.php');
                }     
            }
            else{
                echo 'echec';
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr >
                    <td>Full Name: <br></td>
                    <td><input  value="<?php echo $full_name;?>"
                        type="text" name="full_name" required>
                    </td>
                </tr>   

                <tr>   
                    <td>User Name: <br></td>
                    <td><input  value="<?php echo  $user_name;?>"
                        type="text" name="user_name" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <!-- to pass id from the form -->
                        <input type="hidden"  name="id" value="<?php echo $id;?>">
                        <input class="btn-secondary" type="submit" name="submit" value="Update Admin" required>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    // reccuperate data about user to be deleted
   echo $id=$_POST['id'];
   echo $user_name=$_POST['user_name'];
    echo $full_name=$_POST['full_name'];

    // create query to update
    $sql="UPDATE tbl_admin SET user_name='$user_name' , full_name='$full_name' WHERE id=$id";
    // execute
    $res=mysqli_query($conn,$sql);
    // redirect
    if($res){
        $_SESSION['update']="<div class='success'> updated successfully";
        header('location:'.SESSIONURL."admin/manage-admin.php");
    }
    else{
        $_SESSION['update']="<div class='success'> error while updating ";
        header('location:'.SESSIONURL."admin/manage-admin.php");
    }
}
?>

<?php include('../admin/partials/footer.php');?>