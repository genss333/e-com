<?php
	session_start();
	include 'server.php';
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    error_reporting(0);
	if(!empty($_GET["act"])){
        $act = $_GET['act'];
        if(!empty($_GET['p_id'])){
        $p_id = $_GET['p_id']; 
            if($act=='add' && !empty($p_id)){
                if(isset($_SESSION['cart'][$p_id])){
                    if(!empty($_POST["quantity"])){
                        $_SESSION['cart'][$p_id]+=$_POST["quantity"];
                    }
                }
                else{
                    if(!empty($_POST["quantity"])){
                        $_SESSION['cart'][$p_id]=$_POST["quantity"];
                    }
                }
            }
           
            if($act=='remove' && !empty($p_id)){
                unset($_SESSION['cart'][$p_id]);
            }   
    }
    if($act == "empty"){
        unset($_SESSION['cart']);
    }
}
if (isset($_SESSION['requrie'])) : ?>
    <script>
        alert("ทำรายการไม่สำเร็จ โปรดแนบสลิป");
    </script>
    <?php unset($_SESSION['requrie']); ?>
<?php endif ?>

<?php if(isset($_SESSION['complate'])) : ?>
    <script>
        alert("สั่งซื้อเรียบร้อย");
    </script>
    <?php unset($_SESSION['complate']); ?>
<?php endif ?>
<?php if($_SESSION["fail"]) : ?>
    <script>
        alert("กรุณาล็อกอินสมาชิกก่อน");
    </script>
    <?php unset($_SESSION['fail']) ?>
<?php endif ?>
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
    <link rel="stylesheet" href="cart.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <style>
        #add{
            margin-bottom: 15px;
            background:none;
            border:1px solid #dadce0;
            border-radius: 4px;
            height: 45px;
            width: 100%;
            color: #555;
        }
        .btn:hover{
            color: white;
        }
    </style>
    <title>Red-Store || Cart</title>
</head>
<body>
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
    <div class="small-container cart-page">
        <a id="btnEmpty" href="product_cart.php?act=empty">Empty Cart</a>
      <table>
        <tr>
          <th>รายการสินค้า</th>
          <th style="width:10%;">จำนวนสินค้า</th>
          <th style="width:10%;">สั่งซื้อสินค้า</th>
          <th style="width:10%;">ลบสินค้า</th>
        </tr>
        <?php 
        $total = 0;
            if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $p_id=>$qty){
                    $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                    foreach($product as $key=>$item){?>  
                    <tr>
                        <td>
                            <div class="cart-info">
                            <img src="/e-com/product/<?php echo $product[$key]["image"] ?>"style="width:15%;height:15%;margin-top:1%;">
                            <div class="info">
                                <p><?php echo $product[$key]["name"] ?></p>
                                <small>ราคาสินค้า: <?php echo number_format($product[$key]["price"]) ?></small><br>
                                <small>ราคารวมสุทธิ: ฿
                                    <?php 
                                    if($qty > $product[$key]["number"]){
                                        echo number_format($product[$key]["price"] * $product[$key]["number"]);
                                    }else{
                                        echo number_format($product[$key]["price"] * $qty);
                                    }
                                     ?>
                                </small>
                            </div>
                            </div>
                        </td>
                        <td style="text-align: center;"> <?php 
                                if($qty>$product[$key]["number"]){
                                    echo $product[$key]["number"]." ชิ้น";
                                    $_SESSION["total"] = $product[$key]["number"];
                                }else{
                                    echo $qty." ชิ้น";
                                    $_SESSION["total"] = $qty;
                                }
                            ?> 
                         </td>
                        <td style="text-align: center;">
                        <form action="product_confirm.php?p_id=<?php echo $p_id?>" method="POST">
                            <button  style="border:none;background:none" type="submit" name="add_order" > 
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                </svg>
                            </button>
                        </form>
                        </td>
                        <td>
                            <a href="product_cart.php?p_id=<?php echo $p_id?>&act=remove">
                                <img src="icon-delete.png">
                            </a>
                        </td>
                    </tr>
        <?php       }
                }?>
        <?php    }
        ?>
      </table>
    
</body>
</html>