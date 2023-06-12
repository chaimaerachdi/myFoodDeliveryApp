<?php
include('../admin/partials/config/constants.php');

// destroy the sesiion
session_destroy();
// redirect to login page
        // define('SESSIONURL','http://localhost/myFoodDeliveryApp/');
header('location:'.SESSIONURL.'admin/login.php');

?>