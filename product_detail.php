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
    <title>Red-Store || Product Detail</title>
    <style>
        .card{
            padding:35px;
            border:none;
        }
        .card-title{
            line-height:20px;
	        height:20px;
	        overflow:hidden;
        }
        .product-quantity{
            margin-left: 12%;
            width: 50px;
            height: 45px;
            border:1px solid #dedce5;
            padding-left:10px ;
            border-radius: 3px;
        }
         #add{
            margin-left: 10%;
            background:orangered;
            border:none;
            border-radius: 4px;
            height: 45px;
            width: 150px;
            color: white;
        }
        .btn:hover{
            color: white;
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
    <div class="container-index">
        <div class="container-fluid"style="margin-top:50px;background:white;">
            <div class="row"style="margin-left:2%;margin-right: 2%;">
                <div class="col">
                        <!------------carousel------------------->
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin: 50px 0 0 0;">
                        <div class="carousel-indicators"style="margin-left:100%;margin-top:;20%">
                                <?php 
                                    $p_id = $_GET['p_id'];
                                    $product = $db_handle->runQuery("SELECT image,order_img FROM pd_detail WHERE product_id ='$p_id' ORDER BY order_img ASC LIMIT 1 ");
                                        foreach($product as $key=>$values){?>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $product[$key]["order_img"] ?>" class="active" aria-current="true" style="margin-left:20.5rem;">
                                                <img src="<?php echo $product[$key]["image"] ?>" class="" style="width: 100px" >
                                        </button>
                                <?php   }
                                    $product = $db_handle->runQuery("SELECT image,order_img FROM pd_detail WHERE product_id ='$p_id' AND order_img >0 ORDER BY order_img ASC LIMIT 4 ");
                                    foreach($product as $key=>$values){?>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $product[$key]["order_img"] ?>" aria-current="true"  style="margin-left:9.375rem;">
                                            <img src="<?php echo $product[$key]["image"] ?>" class="" style="width: 100px;" >
                                    </button>
                                <?php  }
                                    
                                ?>
                        </div>
                        <div class="carousel-inner">
                            <?php 
                            if(isset($_GET['p_id'])){
                                $p_id = $_GET['p_id'];
                                $product = $db_handle->runQuery("SELECT product.name,product.price,product.number,pd_detail.image 
                                FROM product 
                                INNER JOIN pd_detail ON product.product_id=pd_detail.product_id 
                                WHERE product.product_id='$p_id' ORDER BY pd_detail.order_img ASC LIMIT 1; ");
                                    foreach($product as $key=>$value){ ?>
                                    <div class="carousel-item active">
                                            <div class="card" style="width: 30rem;margin-left:35%;border:none;">
                                                <img src="<?php echo $product[$key]["image"] ?>" alt="">
                                            </div>
                                    </div>
                            <?php }
                                $product = $db_handle->runQuery("SELECT product.name,product.price,product.number,pd_detail.image 
                                FROM product 
                                INNER JOIN pd_detail ON product.product_id=pd_detail.product_id 
                                WHERE product.product_id='$p_id' AND order_img >0 ORDER BY pd_detail.order_img ASC LIMIT 4");
                                    foreach($product as $key=>$value){ ?>
                                    <div class="carousel-item ">
                                            <div class="card" style="width: 30rem;margin-left:35%;border:none;">
                                                <img src="<?php echo $product[$key]["image"] ?>" alt="">
                                            </div>
                                    </div>
                            <?php }
                                }
                            ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col"style="margin:0% 10px 0% 0%;">
                    <div class="detail" style="width: 30rem;height: 40rem;">
                        <?php 
                            $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                                foreach($product as $key=>$value){?>
                                    <div class="text" style="margin:30% 0% 0% 0%;">
                                        <h5 style='margin-left: 10%;'><?php echo $product[$key]["name"] ?></h5><br>
                                        <p style='margin-left: 10%; color: #555;'>
                                            <?php 
                                                    echo $product[$key]["title"]
                                            ?>    
                                        </p>
                                        <p style='margin-left: 10%;'>฿<?php echo number_format($product[$key]["price"]) ?></p>
                                        <p>
                                            <?php 
                                                if($product[$key]["number"] == 0){
                                                    echo "<p style='margin-left: 10%;'>สินค้าหมด</p>";
                                                }else{
                                                    echo "<p style='margin-left: 10%;'>เหลือ ".$product[$key]["number"]." ชิ้น</p>";
                                                }
                                            ?>
                                        </p><br>
                                    </div>
                                    <form  class="add-to-cart" method="post" action="product_cart.php?act=add&p_id=<?php echo $p_id; ?>">
                                        <div class="row">
                                                <input type="number" class="product-quantity" name="quantity" value="1" min="1" max="<?php echo $product[$key]["number"]?>" size="2" />
                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" name="submit" class="btn" id="add" value="Add to Cart" class="btnAddAction">เพิ่มสินค้า</button>
                                        </div>
                                    </form>
                        <?php   }
                        ?>
                    </div>
                </div>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                style="background:none;color:#555;">
                 ดูรีวิว
            </button>
            <div class="collapse" id="collapseExample"style="margin-top:10px;">
                <div class="card card-body">
                    <?php 
                    if(isset($_GET['p_id'])){
                        $p_id = $_GET['p_id'];
                        $review = $db_handle->runQuery("SELECT review.text,review.customer_email email,customer.firstname,customer.lastname
                        FROM review INNER JOIN customer ON review.customer_email=customer.email
                        WHERE review.product_id ='$p_id'");
                        foreach($review as $key=>$value){
                            ?>
                             <div class="row" style="margin-top:20px;">
                                 <?php
                                     $image = $db_handle->runQuery("SELECT image FROM image WHERE member='".$review[$key]['email']."' ORDER BY id DESC LIMIT 1 ");
                                        foreach($image as $key2 => $value2){?>
                                            <img src="/e-com/upload/<?php echo $image[$key2]["image"] ?>" style="width:5%;border-radius:50%;">
                                <?php }?>
                                    <p><?php echo $review[$key]["firstname"]." ".$review[$key]["lastname"] ?></p><br>
                                    <div class="row" style="border: 1px solid #dadce0;max-width: 50%;">
                                        <p style="padding: 20px;"><?php echo $review[$key]["text"] ?></p>
                                    </div>
                             </div>
                    <?php }
                    }
                    ?>
                </div>
            </div> 
            </div>
            <br><br>
            <br><br>                             
        </div>
        
    </div>
    
</body>
</html>