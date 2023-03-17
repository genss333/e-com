<?php
    session_start();
    include('server.php');
    require_once("dbcontroller.php");
    $db_handle = new DBController(); 
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['member']);
        header("location: index.php");
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['admin']);
        header("location: index.php");
      }
    error_reporting(0);

?>
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
            line-height:30px;
	        height:30px;
	        overflow:hidden;
        }
    </style>
    <title>Red-Store || Ecommrese</title>
</head>
<body >
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
                    if(!empty($_SESSION['admin'])){?>
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
                                    <li><a class="dropdown-item" href="account.php">จัดการบัญชีผู้ใช้</a></li>
                                    <li><a class="dropdown-item" href="product_order.php">ดูประวัติการสั่งซื้อ</a></li>
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
    <div class="add-blog"style="margin-top:50px;">
            <!------------carousel------------------->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                     <?php 
                        $add = $db_handle->runQuery("SELECT * FROM add_blog WHERE id = 1 ");
                            foreach($add as $key=>$values){?>
                            <div class="carousel-item active"style="background:<?php echo $add[$key]["background"] ?>;">
                                    <img src="<?php echo $add[$key]["image"] ?>" style="width:60%;margin-left: 18%;">
                            </div>
                        <?php   
                            }
                        ?> 
                     <?php 
                        $add = $db_handle->runQuery("SELECT * FROM add_blog WHERE id > 1 ");
                            foreach($add as $key=>$values){?>
                            <div class="carousel-item"style="background:<?php echo $add[$key]["background"] ?>;">
                                    <img src="<?php echo $add[$key]["image"] ?>" style="width:60%;margin-left: 18%;">
                            </div>
                        <?php   
                            }
                        ?> 
                </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>               
                </div>
                <!------------carousel end---------------->
    </div>
    <div class="container-index"style="background:whitesmoke;">
        <br><br><br><br>
        <div class="container">
            <div class="text" > 
            <img src="https://image.makewebeasy.net/makeweb/0/UFcJmr8CU/images/shcAB005.png" width="20%">
            </div><br><br><br>
        </div>
        <div class="container"style="background:white;">
            <!------------product promote----------------->
            <div class="row"style="margin-left:10%;margin-right:10%;">
                <?php 
                     $product = $db_handle->runQuery("SELECT product.product_id,product.image,product.name,product.price product_price
                     FROM product 
                     INNER JOIN product_promoted ON product.product_id=product_promoted.product_id 
                     WHERE product.status='promoted' AND product.number > 0 ORDER BY product_promoted.price DESC LIMIT 6");
                        foreach($product as $key=>$values){?>
                            <div class="col" style="margin:20px 0% 5% 20px;">
                                <a href="product_detail.php?p_id=<?php echo $product[$key]["product_id"]?>" style="color:#555;text-decoration: none;margin-left:70%;font-size:14px;">
                                    <div class="card" style="width: 25rem;border:none;">
                                        <img src="/e-com/product/<?php echo $product[$key]["image"] ?>"style="margin-left:15%;margin-right:15%;width:65%;" >
                                            <div class="card-body">
                                                <p class="card-title"><?php echo $product[$key]["name"] ?></p>
                                                <p class="card-text" style="color: orangered;">฿<?php echo number_format($product[$key]["product_price"]) ?></p>
                                            </div>
                                    </div>
                                </a>
                            </div>
                                <?php       }
                                ?>
                  <div class="row"style="margin:50px 5% 10% 50px;">
                    <div class="d-grid gap-2 col-6 mx-auto" style="width:100%;">
                        <a class="btn btn-primary" href="product.php?promoted"
                        style="background:none;color:#555;border:1px solid #dadce0;">ดูเพิ่มเติม
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                        </a>
                    </div>
                  </div>
            </div>
        </div><br><br>
    </div>
</body>
</html>