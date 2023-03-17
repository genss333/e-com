<?php
    session_start();
    include('server.php');
    require_once("dbcontroller.php");
    $db_handle = new DBController(); 
    error_reporting(0);
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['member']);
        header("location: index.php");
    }
    if(empty($_SESSION["member"])){
        $_SESSION["fail"] = "none login";
        header("location:product_cart.php");
    }

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
    <link rel="stylesheet" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <title>Red-Store || Cart Confrim</title>
</head>
<body style="background:whitesmoke">
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
        <div class="container">
            <div class="row"style="margin-bottom:50px;">
                <div class="col">
                    <div class="row"style="background:white;margin-top:50px;">
                        <?php 
                            $member = $db_handle->runQuery("SELECT customer.firstname,customer.lastname, book.address,book.tel 
                            FROM customer INNER JOIN book ON customer.email=book.email 
                            WHERE customer.email='".$_SESSION['member']."'");
                                foreach($member as $key=>$value){?>
                                    <div class="data"style="margin:5% 5% 5% 5%;">
                                        <p>ที่อยู่ในการจัดส่ง</p>
                                        <p style="font-size: 14px;color#555;"><?php echo $member[$key]["firstname"]." ",$member[$key]["lastname"]."   ",$member[$key]["tel"] ?></p>
                                        <p style="margin-right: 15%;font-size: 14px;color#555;"><?php echo $member[$key]["address"] ?></p>
                                    </div>
                        <?php }?>
                    </div>
                    <div class="row"style="background:white;margin-top:50px;">
                            <p style="margin:5% 5% 5% 5%;">รายการสินค้า</p>
                        <?php 
                             if(isset($_POST['add_order'])){
                                 $p_id = $_GET['p_id'];
                                 $qty = $_SESSION["total"];
                                if(!empty($_SESSION['cart'])){
                                        $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                                            foreach($product as $key=>$item){?>
                                                <div class="data"style="margin:0% 5% 5% 5%;">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="/e-com/product/<?php echo $product[$key]["image"] ?>" style="width: 60%;margin-left:30%;">
                                                        </div>
                                                        <div class="col"style="margin-right: 20%;">
                                                            <p style="margin-right: 5%;margin-top:10%;font-size: 14px;color#555;"><?php echo $product[$key]["name"] ?></p>
                                                            <p style="font-size: 12px;color:orangered;">฿ <?php echo $product[$key]["price"]?></p>
                                                            <p style="font-size: 12px;color:#555;"><?php echo $qty." ชิ้น"?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                            <?php           }
                                        }
                            }else{?>
                                <?php 
                                    foreach($_SESSION['cart'] as $p_id=>$qty){
                                        $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                                            foreach($product as $key=>$item){?>
                                                <div class="data"style="margin:0% 5% 5% 5%;">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="/e-com/product/<?php echo $product[$key]["image"] ?>" style="width: 60%;margin-left:30%;">
                                                        </div>
                                                        <div class="col"style="margin-right: 20%;">
                                                            <p style="margin-right: 5%;margin-top:10%;font-size: 14px;color#555;"><?php echo $product[$key]["name"] ?></p>
                                                            <p style="font-size: 12px;color:orangered;">฿ <?php echo $product[$key]["price"]?></p>
                                                            <p style="font-size: 12px;color:#555;"><?php echo $qty." ชิ้น"?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                            <?php           }
                                        }
                        
                            }
                        ?>
                    </div>
                </div>
                <div class="col"style="margin-top:50px;margin-left:5%;background:white;">
                    <div class="row"style="margin:5% 5% 0;border:1px solid #dadce0;margin-bottom:5%;">
                            <h6 style="margin: 10% 30%;">สรุปรายการสั่งซื้อ</h6>
                            <?php
                            $total = 0;
                            $sum_qty = 0; 
                            if(isset($_POST['add_order'])){
                                $qty = $_SESSION["total"];
                                    $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                                        foreach($product as $key=>$item){
                                                $p_id = $_GET['p_id'];
                                              ?>
                        <form  action="product_cartDB.php?act=add_order&&p_id=<?php echo $p_id?>" method="post" enctype="multipart/form-data">
                                                <div class="row"style="margin-bottom:10px;border:">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                            </svg> แนบสลิปการโอนเงิน
                                                        </label>
                                                        <input class="form-control" type="file" id="formFile" name="image[]" style="color:#555;" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>สินค้าทั้งหมด</p>
                                                    </div>
                                                    <div class="col">
                                                    <p style="text-align: right;"><?php echo $qty." ชิ้น"; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>ยอดรวม</p>
                                                    </div>
                                                    <div class="col">
                                                    <p style="text-align: right;">฿ <?php echo number_format($qty * $product[$key]["price"]);
                                                        $_SESSION['qty'] = $qty;
                                                    ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>ค่าส่ง</p>
                                                    </div>
                                                    <div class="col">
                                                        <p style="text-align: right;">฿ <?php echo $to = 30; ?></p>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>ราคารวมสุทธิ </p>
                                                    </div>
                                                    <div class="col">
                                                        <p style="text-align: center;"><?php  echo number_format( $to + $qty * $product[$key]["price"])." บาท";  ?></p>
                                                    </div>
                                                </div>
                                                        <button type="submit" name="submit" class="btn" id="add" value="Add to Cart" class="btnAddAction">สั่งซื้อสินค้า</button>
                        </form>
                                <?php           
                                                }
                                }else {
                                        foreach($_SESSION['cart'] as $p_id=>$qty){
                                            $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                                                foreach($product as $key=>$item){
                                                    $sum = $qty * $product[$key]["price"];
                                                    $total += $sum;
                                                    $sum_qty += $qty;
                                        }
                                    } ?>
                                    <form  action="product_cartDB.php?act=add_order&&p_id=<?php echo $p_id?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col">
                                                    <p>สินค้าทั้งหมด</p>
                                                </div>
                                                <div class="col">
                                                    <p style="text-align: right;"><?php echo $sum_qty." ชิ้น"; ?></p>
                                                </div>
                                            </div>
                                            <div class="row"style="margin-bottom:10px;border:">
                                                <div class="mb-3">
                                                        <label for="formFile" class="form-label">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                            </svg> แนบสลิปการโอนเงิน
                                                        </label>
                                                        <input class="form-control" type="file" id="formFile" name="image[]" style="color:#555;" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>ยอดรวม</p>
                                                </div>
                                                <div class="col">
                                                    <p style="text-align: right;">฿ <?php echo number_format($total)  ?></p>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>ค่าส่ง</p>
                                                    </div>
                                                    <div class="col">
                                                        <p style="text-align: right;">฿ <?php echo $to = 30; ?></p>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>ราคารวมสุทธิ </p>
                                                    </div>
                                                    <div class="col">
                                                        <p style="text-align: right;"><?php echo number_format($total+ $to)  ?></p>
                                                    </div>
                                                </div>
                                                <button type="submit" name="submit_all" class="btn" id="add" value="Add to Cart" class="btnAddAction">สั่งซื้อสินค้า</button>
                                    </form>
                            <?php       
                                    }
                                ?>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>