<?php
        ob_start();
        // start the sessioon here 
        session_start();

         // create a connection o our database:
        // o create a conn to db we need( serverName+ userName +password+ dbName)=>create constants to store them because they do not change
        // $server_name='localhost';
        // $user_name='root';
        // $password='';
        // $db_name='mydb';
        define('LOCALHOST','localhost');
        define('USERNAME','root');
        define('PASSWORD','');
        define('DBNAME','mydb');
        // constant
        define('SESSIONURL','http://localhost/myFoodDeliveryApp/');
        // create a connection o our database:
        $conn=mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DBNAME);
        // $conn=mysqli_connect($server_name,$user_name,$password,$db_name)
        // this is a commun part between all pages needs to connect to db
        // $db_select=mysqli_select_db($conn,$sql) or die("        db not selected  ".mysqli_connect_error());//sellect d
        // to check the connection
        // if($conn){
        //     echo'connected succefullyyyyy';
        // }else{
        //     die('failed to connect to db'.mysqli_connect_error());
        // }
    ?>