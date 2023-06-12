<?php include('config/constants.php');
      include('login-check.php');
?>
<html lang="en">
    <head>
        <title>myApp</title>
        <meta charset="URF-8">
        <link rel="stylesheet" type="text/css" href="../../css/admin.css"/>
    </head>
    <body>
        <!-- menu section stars -->
        <!-- <div class="menu text-center">
            <div class="navbar">
                <ul>
                    <li><a href="index.php">HOME</a></li>
  
                </ul>
            </div>
        </div>    
-->
        <header>
            <a href="index.php" class="logo">Foods</a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php ">Admins</a></li>
                <li><a href="manage-category.php">Categories</a></li>
                <li><a href="manage-food.php ">Food</a></li>
                <li><a href="manage-order.php ">Order</a></li>
                <li><a href="logout.php ">Logout</a></li>
            </ul>
        </header>

    
        <!-- menu section  ends -->
<!-- <style>

            /* *{
    padding:0 ;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
} */
.wrapper{
    margin:  0 auto ;
    width: auto;
    padding: 5%;
}
.text-center{
    text-align: center;
}
/* css for footer  */
.footer{
    background-color: #ff4757;
    color: white;
}
/* css for menu */
.menu{
    border-bottom: 1px solid gray;
    /* background-color: black; */
}
.menu ul {
    list-style-type: none;
}
.menu ul li{
    display: inline;
    padding: 1%;
}
.menu ul li a{
    font-weight: bold;
    color:#ff6b81;
}
.menu ul li a:hover{
    color: #ff4757;
}
/* css for main content */
.main_content{
   background-color: #f1f2f6;
   padding:11% 0;
   padding-bottom: 4%;
}

/* css for cards  */
.col-3{
    width: 12%;
    background-color: #fff;
    margin: 2%;
    padding: 2%;
    float: left;
}
.row{
    display: inline;
}
/* I will use media query to  be sure that my  my website will be responsive */
.flex-container{
    display: flex;
}
/* now css for manage-admin page */
/* .tbl-full{
    /* to make any table with this class added full width */
   /* width: 100%; */
/* } */
table{
    margin: auto;
    margin-bottom: 50%;
}
table tr th{
    border-bottom:  2px solid black;
    padding: 1%;
    text-align: left;
} 
table tr td{
    padding: 1%;
}
/* create add button's style manually */
.btn-primary{
    background-color:#1e90ff ;
    border-radius: 20%;
    /* margin: 100%; */
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-primary:hover{
    background-color:#3742fa ;
}
/* create add button's style manually */
.btn-secondary{
    background-color:#7bed9f ;
    border-radius: 20%;
    padding: 2%;
    color: black;
    text-decoration: none;
    font-weight: bold;
}
.btn-secondary:hover{
    background-color:#2ed573 ;
}
/* create delete button's style manually */
.btn-danger{
    background-color:#ff6b81 ;
    border-radius: 20%;
    padding: 2%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-danger:hover{
    background-color:#ff4757 ;
}
.tbl-30{
    /* this is to apply a 30 per cent width on a tablee */
    width: 30%;

}
/* design for inputs */
input{
    border-radius: 20%;
    padding: 1%;
}
table tr{
    margin: 20%;
}

/* 
*/

.success{
    color: #2ed573 ;
}
.error{
    color: #ff4757;
}
</style>
 -->


 <style>

*{
    padding : 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
    list-style: none;
    text-decoration: none;
}

:root{
   --main-color: #ff702a;
   --text-color:#fff;
   --bg-color:#1e1c2a;
   --big-font:7rem;
   --h2-font:2.25rem;
   --p-font:0.9rem;
}
*::selection{
    background: var(--main-color);
    color: #fff;
}

body{

    color: var(--text-color);
    background: var(--bg-color);
}
header{
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 170px;
    background: var(--bg-color);
   
}
.logo{
    color: var(--main-color);
    font-weight: 600;
    font-size: 2.4rem;
}
.navbar{
    display: flex;
}
.navbar a{
    color: var(--text-color);
    font-size: 1.1rem;
    padding: 10px 20px;
    font-weight: 500;
}
.navbar a:hover{
    color: var(--main-color);
    transition: .4s;
    font-size: 1.5rem;
}
#user-icon{
    font-size: 1.5rem;
    cursor: pointer;
    
}
#user-icon:hover{
    color: var(--main-color);
    transition: .4s;
    font-size: 1.7rem;
}
#menu-icon{
    font-size: 2rem;
    cursor: pointer;
    display: none;
}

section{
    padding: 70px 17%;
}
.home{
    width: 100%;
    min-height: 90vh;
    display: grid;
    grid-template-columns: repeat(2,1fr);
    grid-gap:1.5rem;
    align-items: center;
}
.home-img img{
    max-width: 100%;
    width: 600px;
    height: auto;
}
.home-text h1{
    font-size: var(--big-font);
    color: var(--main-color);
}
.home-text h2{
    font-size: var(--h2-font);
    margin: 1rem 0 2rem;
}
.btn{
    display: inline-block;
    padding: 20px  30px;
    background: var(--main-color);
    color: #fff;
    border-radius: 0.5rem;
    font-size:200%;
}
.btn:hover{
    transform: scale(1.2) translateY(10px);
    transition: .4s;
    font-size:200%;
}

.about{
    display: grid;
    grid-template-columns: repeat(2,2fr);
    grid-gap:1.5rem;
    align-items: center;
}
.about-img img{
    max-width: 100%;
    width: 480px;
    height: auto;
}
.about-text span{
    color: var(--main-color);
    font-weight: 600;
}
.about-text h2{
    font-size: var(--h2-font); 
}
.about-text p{
    margin: 0.8rem 0 1.8rem;
    line-height: 1.7;
}

.heading{
    text-align: center;
}
.heading span{
    color: var(--main-color);
    font-weight: 700;
}
.heading h2{
    font-size: var(--h2-font);
}
.menu-container{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(220px,auto));
    grid-gap:1.5rem;
    align-items: center;
}
.box{
    position: relative;
    margin-top:4rem;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background:#feeee7 ;
    padding: 20px;
    border-radius: 0.5rem;
}
.box-img{
    width: 220px;
    height: 220px;
}
.box-img img{
    width: 100%;
    height: 100%;
}
.box h2{
    font-size: 1.3rem;
    color: var(--bg-color);
}
.box h3{
    color: var(--bg-color);
    font-size: 1rem;
    font-weight: 400;
    margin: 4px 0 10px;
}
.box span{
    font-size: var(--p-font);
    color: var(--main-color);
    font-weight: 600;
}

.box .bx{
    background: var(--main-color);
    position: absolute;
    right: 0;
    top: 0;
    font-size: 20px;
    padding: 7px 10px;
    border-radius: 0 0.5rem 0 0.5rem;
}
.service-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, auto));
    grid-gap: 1.5rem;
    margin-top: 4rem;
}
.s-box{
    text-align: center;
    padding:20px 30px;
}
.s-box img{
    width: 90px;
}
.s-box h3{
    margin: 4px 0 10px;
    color: var(--main-color);
    font-size: 1.2rem;
}
.s-box p{
    line-height: 1.7;
}
.cta{
    background: #feeee7;
    padding: 70px 0;
    text-align: center;
    width: 66%;
    margin: 100px auto;
    border-radius: 10px;
}
.cta h2{
    font-size: 2rem;
    color: var(--bg-color);
    margin-bottom: 30px;
}
.main{
    display: flex;
    flex-wrap: wrap;
}
.footer{
    padding: 10px 0;
}
.footer  p{
	color: #fff;
    margin-bottom: -20px;
	margin-top: 40px;
	text-align: center;
}
.col{
    width: 25%;
}
.col h4{
    font-size: 1.2rem;
    color: var(--text-color);
    margin-bottom: 25px;
    position: relative;
}
.col h4::before{
    content: "";
    position: absolute;
    height: 2px;
    width: 50px;
    left: 0;
    bottom: -8px;
    background: var(--main-color);
}
.col ul li:not(last-child){
    margin-bottom: 15px;
}
.col ul li a{
    color: #9897a9;
    font-size: 1.1rem;
    display: block;
    text-transform: capitalize;
    transition: .4s;
}
.col ul li a:hover{
    color: var(--text-color);
    transform: translateX(-12px);

}
.col .social{
    width: 220px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.col .social a{
    height: 40px;
    width: 40px;
    background: var(--main-color);
    color: var(--text-color);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    border-radius: 50%;
    transition: .4s;
}
.col .social a:hover{
    transform: scale(1.2);
    color: var(--bg-color);
    background: var(--text-color);
}
@media (max-width: 1560px){
    header{
        padding: 15px 40px;
    }
    :root{
        --big-font:3.5rem;
        --h2-font:2rem;
    }
}
@media (max-width: 1140px){
    section{
        padding: 50px 8%;
    }
    #menu-icon{
        display: initial;
        color: var(--text-color);
    }
    header .navbar{
        position: absolute;
        top: -400px;
        left: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        text-align: center;
        background: #2b2640;
        transition: .3s;
    }
    header .navbar.active{
        top: 70px;
    }
    .navbar a{
        padding: 1.5rem;
        display: block;
    }
    .col{
        width: 50%;
        margin-bottom: 10px;
    }
}
@media (max-width: 720px){
    header{
        padding: 10px 16px;
    }
    .home{
        grid-template-columns: 1fr;
        text-align: center;
    }
    .about{
        grid-template-columns: 1fr;
        text-align: center;
    }
    .about-img{
        order: 2;
    }
    section{
        padding: 100px 7%;
    }
}
@media (max-width: 575px){
    .col{
        width: 100%;
    }
}




/* style admin.css */
.wrapper{
    margin:  0 auto ;
    width: auto;
    padding: 5%;
}
.text-center{
    text-align: center;
}
.text-center{
    text-align: center;
}
/* css for menu */
.menu{
    border-bottom: 1px solid gray;
    background-color: black;
}
.menu ul {
    list-style-type: none;
}
.menu ul li{
    display: inline;
    padding: 1%;
}
.menu ul li a{
    font-weight: bold;
    color:#ff6b81;
}
.menu ul li a:hover{
    color: #ff4757;
}
/* css for main content */
.main_content{
   /* background-color: #f1f2f6; */
   padding:11% 0;
   padding-bottom: 4%;
}

/* css for cards  */
.col-3{
    width: 12%;
    /* background-color: #fff; */
    margin: 2%;
    padding: 2%;
    float: left;
}
.row{
    display: inline;
}
/* I will use media query to  be sure that my  my website will be responsive */
.flex-container{
    display: flex;
}
/* now css for manage-admin page */
/* .tbl-full{
    /* to make any table with this class added full width */
   /* width: 100%; */
/* } */
table{
    margin: auto;
    margin-bottom: 50%;
}
table tr th{
    border-bottom:  2px solid black;
    padding: 1%;
    text-align: left;
} 
table tr td{
    padding: 1%;
}
/* create add button's style manually */
.btn-primary{
    background-color:#1e90ff ;
    border-radius: 20%;
    /* margin: 100%; */
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-primary:hover{
    background-color:#3742fa ;
}
/* create add button's style manually */
.btn-secondary{
    background-color:#7bed9f ;
    border-radius: 20%;
    padding: 2%;
    color: black;
    text-decoration: none;
    font-weight: bold;
}
.btn-secondary:hover{
    background-color:#2ed573 ;
}
/* create delete button's style manually */
.btn-danger{
    background-color:#ff6b81 ;
    border-radius: 20%;
    padding: 2%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-danger:hover{
    background-color:#ff4757 ;
}
.tbl-30{
    /* this is to apply a 30 per cent width on a tablee */
    width: 30%;

}
/* design for inputs */
input{
    border-radius: 20%;
    padding: 1%;
}
table tr{
    margin: 20%;
}
.success{
    color: #2ed573 ;
}
.error{
    color: #ff4757;
}
/* added */
 </style>