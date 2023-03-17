<?php
    session_start();
    require_once("dbcontroller.php");
    $db_handle = new DBController(); 
    include 'server.php';
    error_reporting(0);

?>
<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        
    </script>
    <title>Red-Store || Product</title>
    <link rel="stylesheet" href="">
    <style>
        .card{
            padding:35px;
            border:none;
            transition: transform 0.5s;
        }
        .card:hover{
            transform: translateY(-15px);
        }
        .card-title{
            line-height:20px;
	        height:20px;
	        overflow:hidden;
        }
    </style>
</head>
<body style="background:whitesmoke;" >
    <div class="add-blog" style="height: 6.25rem;background: #01bfa6;">
        <div class="container">
            <img src="https://icms-image.slatic.net/images/ims-web/c3259ddf-fbef-4119-9c02-f47a000c55d3.jpg" alt="">
        </div>
        <div style="background:whitesmoke;">
            <ul class="nav justify-content-end" style="margin-top: 15px; font-size: 12px;margin-right:10%;">
                <li class="nav-item">
                    <a class="nav-link" style="color: #555;" href="seller.php">ขายสินค้ากับเรา</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"style="color: #555;" href="login.php">ล็อกอิน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #555;"href="register.php">สมัครสมาชิก</a>
                </li>
                <?php 
                    if(isset($_SESSION['admin'])){?>
                        <li class="nav-item">
                             <a class="nav-link" style="color: #555;"href="admin.php">Admin Maneger</a>
                        </li> 
                <?php }else{?>
                        <li class="nav-item">
                            <div class="dropdown" style="margin-top: 7px;">
                                <button class="" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                style="border:none;background:none;color:#555;">
                                  <p style="font-size: 12px;">บัญชีผู้ใช้
                                    <?php 
                                        if(isset($_SESSION["account_name"])){
                                            echo "ของ ".$_SESSION["account_name"];
                                        }
                                    ?>
                                  </p>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 12px;">
                                    <li><a class="dropdown-item" href="#">จัดการบัญชีผู้ใช้</a></li>
                                    <li><a class="dropdown-item" href="#">ดูประวัติการสั่งซื้อ</a></li>
                                    <li><a class="dropdown-item" href="index.php?logout">ออกจากระบบ</a></li>
                                </ul>
                            </div>
                        </li>  
                <?php }?>
            </ul>
        </div>
    </div>
    <div class="container-index">
        <div class="container-fluid" style="width:78%;">
            <ul class="nav justify-content-center" style="margin-top: 40px;"> 
                <li>
                    <a href="index.php"><img src="/img/logo.png" width="125px;" style="margin-left:-150px ;" ></a>
                </li>
                <li>
                <form class="d-flex" style="width: 45rem;" id="form1" action="product.php" method="post">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" width="50px" autocomplete="off" / >
                    <button class="btn btn-primary" type="submit" name="submit" style="background: orangered;border:none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #555;"href="product_cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-index">
        <div class="container"style="margin-top:50px;margin-bottom:50px;background:white;">
            <div class="row"style="margin-left:10%;margin-right:10%;">
                <!-------Where Search------------->
                <?php 
                if(isset($_POST['submit'])){
                   if(!empty($_POST['search'])){
                        $product = $db_handle->runQuery("SELECT * FROM product WHERE  number > 0  AND name LIKE '%".$_POST['search']."%'");
                            foreach($product as $key=>$value){ ?>
                    <div class="col" style="margin:20px 0% 5% 20px;">
                        <a href="product_detail.php?p_id=<?php echo $product[$key]["product_id"]?>" style="color:#555;text-decoration: none;margin-left:70%;font-size:14px;">
                            <div class="card" style="width: 25rem;border:none;">
                                <img src="/e-com/product/<?php echo $product[$key]["image"] ?>"style="margin-left:15%;margin-right:15%;width:60%;" >
                                <div class="card-body">
                                    <p class="card-title"><?php echo $product[$key]["name"] ?></p>
                                    <p class="card-text" style="color: orangered;margin-left:8%;">฿<?php echo number_format($product[$key]["price"]) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
                    }
                  }
                ?>
                <!-----------------Where promoted-------------->
                <?php 
                if(isset($_GET['promoted'])){?>
                <?php   $product = $db_handle->runQuery("SELECT product.product_id,product.image,product.name,product.price product_price
                     FROM product 
                     INNER JOIN product_promoted ON product.product_id=product_promoted.product_id 
                     WHERE product.status='promoted' AND product.number > 0 ORDER BY product_promoted.price DESC");
                        foreach($product as $key=>$value){ ?>
                    <div class="col" style="margin:20px 5% 5% 20px;">
                        <a href="product_detail.php?p_id=<?php echo $product[$key]["product_id"]?>" style="color:#555;text-decoration: none;margin-left:70%;font-size:14px;">
                            <div class="card" style="width:25rem;border:none;">
                                <img src="/e-com/product/<?php echo $product[$key]["image"] ?>"style="margin-left:15%;margin-right:15%;width:60%;" >
                                <div class="card-body">
                                    <p class="card-title"><?php echo $product[$key]["name"] ?></p>
                                    <p class="card-text" style="color: orangered;margin-left:8%;">฿<?php echo number_format($product[$key]["product_price"]) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
                  }
                ?>
            </div>
        </div>
    </div>
</body>
</html>