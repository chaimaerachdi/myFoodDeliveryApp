<?php
    include('../admin/partials/config/constants.php');

    if(isset($_POST['submit'])){
        // recuperer les data entre par user dans les champs
        if(!empty($_POST['user_name']) && !empty($_POST['pw'])){
            $user_name=$_POST['user_name'];
            // $full_name=$_POST['full_name'];
            $pw=$_POST['pw'];
    
            // check if this user is in dbb or not create the query
    
            $sql="SELECT * FROM tbl_admin WHERE user_name='$user_name' and pw='$pw' ";
    
            // execute
            $res= mysqli_query($conn,$sql);
    
                if($res){
                    // combie a recupere d'elts
                    $count= mysqli_num_rows($res);
    
                    if($count==1){
                        $_SESSION['login']="<div class='success'>logged in successfully</div>";
                        // to check if the user is loged in or not 
                        $_SESSION['user']=$user_name;
    
                        header('location:'.SESSIONURL.'admin/');
                    }
                    else{
                        $_SESSION['login']="<div class='error'>login  failed  </div>";
                        header('location:'.SESSIONURL.'admin/login.php');
                    }
                }
                else{
                    $_SESSION['login']="error : can not connect with database";
                    header('location:'.SESSIONURL."admin/login.php");
                }
        }  
        else{
            $_SESSION['login']= "<div class='error'>fill all the form pleaze </div>";
            header('location:'.SESSIONURL.'admin/login.php');
        }  
    }
      
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- <link rel="stylesheet" href="/css/style.css"> -->
    <title>login</title>
</head>
<body>

    <div class="login" style=" text-align:center; margin: 10% 30% 10% 30%; border-radius:10%; border:2px solid #ff702a; padding:2% 0% 2% 0%;">
        <h1 style="text-align:center;">Login</h1><br><br><br>


        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
            }
            if(isset($_SESSION['noLoginMsq'])){

                echo $_SESSION['noLoginMsq'];
                unset($_SESSION['noLoginMsq']);
            }
        ?><br><br> 
        <!-- login form starts here  -->
        <form action="" method="POST" >
             User Name : <input type="text" name="user_name" placeholder="User Name"><br><br>
              <!-- Full Name  : <input type="text" name="full_name" placeholder="Full Name"><br><br> -->
              Password :  <input type="password" name="pw" placeholder="Password"><br><br>
              <input class="btn" type="submit" name="submit" value="Login" style=" margin:5%; padding: 25px 50px; border-radius:25%;  ">
        </form>     
    </div>
    <p  style="text-align:center;" >all@ copyrights saved by <a href="#">CHAIMAE RACHDI</a></p>
</body>
</html>

