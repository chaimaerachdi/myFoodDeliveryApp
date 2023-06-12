<!-- authorization -access control -->
<!-- check wether the user is loged in or not -->
<?php
    if(!isset($_SESSION['user'])){

        // user ids not loed in
        // redirect to login page with msg
        $_SESSION['noLoginMsq']="<div class='error'>Pleaze login to access admin panel </div>";
        header('location:'.SESSIONURL."admin/login.php");
        
    }
?>