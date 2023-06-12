<?php include('../admin/partials/menu.php');?><!--comment part =menu +footer -->
<div class="main_content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>

        <form action="" method="POST">

            <?php
                if( isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            
            ?>
            <table class="tbl-30">
                <tr >
                    <td>Full Name: <br></td>
                    <td><input placeholder="Enter Your Full Name"
                        type="text" name="full_name" required>
                    </td>
                </tr>   

                <tr>   <td>User Name: <br></td>
                    <td><input placeholder="Enter Your Name"
                        type="text" name="user_name" required>
                    </td>
                </tr>

                <tr>           
                    <td>Password: <br></td>
                    <td><input placeholder="Enter Your Password"
                        type="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn-secondary" type="submit" name="submit" value="Add Admin" required>
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
        // btn clicked
        // echo'button clicked';
        // echo"welcom";
        // let's store the variables set frombthe user nto our inputs in the form
        $full_name=$_POST['full_name'];
        $user_name=$_POST["user_name"];
        $password=md5($_POST['password']);//pw encryption
        // echo "hello  :full_name: ". $full_name ."user_name : " .$user_name."password : ".$password;

        // check wherther the fields are empty or not
        // if they are empty => no neeed to connect to db to check whether this user exists or not
        if (!empty($full_name) && !empty($user_name)&&!empty($password)) {
            // echo "fields are not empty";
            $sql="
                INSERT INTO tbl_admin
                (full_name,user_name,pw)
                values('$full_name','$user_name','$password')
            ";
            // echo $sql;
        }      
// *
        $res=mysqli_query($conn,$sql) or die("error in query execution ");
        // check wether data is inseted and display a msg for the user 
        if($res){
            // echo'data is inserted correctly  bravo';
            // dispalay a msg to the to inform it thatthe operatioin has been complited succedflly
            // i will use the session variable => i will hold user info +it is accessible from all page
            // if the admin added succefully iwill redirect the user to manage-admin.php =>display tje added admin in the table
            // else redirect it to the add-admin.php =>give it an other chance
            // a commun part is to start the session => add this part in constants.php =wich is included in menu.php =wich is also a part of this page
            $_SESSION['add']="admin added successfully  ";
            // redirect he user to the manage-admin.php page
            header("location:".SESSIONURL.'admin/manage-admin.php');//SESSIONURL=cantant in constants.php
            
        }
        else{
            // echo'data is not inserted correctly  sorry';
            $_SESSION['add']="failed to add admin  ";
            // redirect he user to the add-admin.php page
            header('location:'.SESSIONURL.'admin/add-admin.php');//SESSIONURL=cantant in constants.php
        }
    }
    else{
        // btn not clicked
        // echo'button not clicked';
        // echo"try again";
    }



?>
<!-- * -->
<!-- // // create a connection o our database:
        // // o create a conn to db we need( serverName+ userName +password+ dbName)=>create constants to store them because they do not change
        // $server_name='localhost';
        // $user_name='root';
        // $password='';
        // $db_name='mydb';

        // // create a connection o our database:

        // $conn=mysqli_connect($server_name,$user_name,$password,$db_name);
     
        // // this is a commun part between all pages needs to connect to db
        // // $db_select=mysqli_select_db($conn,$sql) or die("        db not selected  ".mysqli_connect_error());//sellect db


        // // to check the connection
        // // if($conn){
        // //     echo'connected succefully';
        // // }else{
        // //     die('failed to connect to db'.mysqli_connect_error());
        // // } -->