<?php 
  require_once("dbcontroller.php");
  $db_handle = new DBController(); 
 error_reporting(0);
    session_start();
    include('server.php');

  if(!isset($_SESSION['member'])){
    header("location: login.php");
  }
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['member']);
    header("location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>ขายสินค้ากับเรา</title>
</head>
<body style="background:whitesmoke;">
       <div class="dashboard">
            <div class="row align-items-start">
            <div class="col" style="margin-top: 30px;" >
                <a  data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"
                style="width:125px; border:none;background:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" style="color:orangered;margin-left:20px;"> 
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </a>
                    <div class="" id="">
                        <div class="card card-body" style="width:10%; height:100%; background:white; align-items: center;">
                        <a href="index.php"><img src="/img/logo.png" width="100%;" style="margin-top:50px;"></a>
                            <a type="button" class="btn btn-primary" href="seller.php" style="margin-top:35px; background:none; border:none; color:#555;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                </svg>
                                Home/Dashboard
                            </a>
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_product.php"  >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                Product
                            </a>
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_acount.php" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                                Account
                            </a>
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_order.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            </svg>
                                Order
                            </a>
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_advertise.php"  >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-badge-ad-fill" viewBox="0 0 16 16">
                                <path d="M11.35 8.337c0-.699-.42-1.138-1.001-1.138-.584 0-.954.444-.954 1.239v.453c0 .8.374 1.248.972 1.248.588 0 .984-.44.984-1.2v-.602zm-5.413.237-.734-2.426H5.15l-.734 2.426h1.52z"/>
                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm6.209 6.32c0-1.28.694-2.044 1.753-2.044.655 0 1.156.294 1.336.769h.053v-2.36h1.16V11h-1.138v-.747h-.057c-.145.474-.69.804-1.367.804-1.055 0-1.74-.764-1.74-2.043v-.695zm-4.04 1.138L3.7 11H2.5l2.013-5.999H5.9L7.905 11H6.644l-.47-1.542H4.17z"/>
                            </svg>
                                Advertise
                            </a>
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none; color:#555;" href="index.php?logout" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col"style="margin-left:-90%">
                        <div class="container" style=" margin-top:5%; ">
                            <form  action="seller_db.php" method="post" enctype="multipart/form-data">
                               <h3 style="color: #555;" >Home/Dashboard</h3>  
                                <br>
                                <div class="mb-3">
                                    <div style=" background:white;" >
                                    <br>
                                        <div class="text" style="margin-left:5%;">
                                            <h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                                </svg>
                                                Product/ยอดขายสินค้า
                                            </h4>
                                        </div>
                                            <table class="tbl-cart" cellpadding="10" cellspacing="1"  style="margin-left:5%;">
                                            <br>
                                                <tbody>
                                                <tr>
                                                <th style="text-align:left;" width="8%">รหัสสินค้า</th>
                                                <th style="text-align:left;" width="35%">ชื่อสินค้า</th>
                                                <th style="text-align:center;"width="8%">จำนวนสินค้า</th>
                                                <th style="text-align:center;"width="10%">รีวิวสินค้า</th>
                                                <th style="text-align:left;"width="8%">ขายแล้ว</th>
                                                <th style="text-align:left;"width="10%">จัดส่งสินค้าแล้ว</th>
                                                <th style="text-align:left;"width="8%">รายได้สุทธิ</th>
                                                <th style="text-align:left;"width="10%">สถานะ</th>
                                                </tr>
                                            <?php 
                                                $product = $db_handle->runQuery("SELECT * FROM product WHERE email='".$_SESSION['member']."'  ORDER BY product_id ASC ");
                                                    if(!empty($product)){
                                                        foreach($product as $key => $value){
                                                            $p_id= $product[$key]["product_id"];
                                                            $cart = $db_handle->runQuery("SELECT SUM(number) number,SUM(number*price) income FROM cart WHERE product_id ='$p_id'AND shop='".$_SESSION['member']."' AND status ='จัดส่งแล้ว'");
                                                            foreach($cart as $key2 => $value2){?>
                                                                <tr>
                                                                <td  style="text-align:left;"><?php echo $product[$key]["product_id"]; ?></td>
                                                                <td><img src="/e-com/product/<?php echo $product[$key]["image"]; ?>" class="cart-item-image" /><?php echo $product[$key]["name"]; ?></td>
                                                                <td style="text-align:center;"><?php if($product[$key]["number"] <= 0 ){
                                                                                                    echo "สินค้าหมด";
                                                                                                    }else{
                                                                                                        echo $product[$key]["number"]."   ชิ้น"; 
                                                                                                    } ?></td>
                                                                <td style="text-align:center;">
                                                                    <a  href="product_detail.php?p_id=<?php echo $product[$key]["product_id"]?>" class="btn btn-primary"style="font-size: 12px;height: 27px;">
                                                                    ดูรีวิว
                                                                    </a>
                                                                </td>
                                                                <td style="text-align:left;"><?php echo number_format($cart[$key2]["number"])."  ชิ้น" ?></td>
                                                                <td style="text-align:left;"><?php echo number_format($cart[$key2]["number"])."  ชิ้น" ?></td>
                                                                <td style="text-align:left;"><?php echo number_format($cart[$key2]["income"]) ?></td>
                                                                <td style="text-align:left;font-size: 12px;"><a href="seller_advertise.php?p_id=<?php echo $product[$key]["product_id"] ?>">โปรโมทสินค้า</a></td>
                                            <?php
                                                                }
                                                            }
                                                    }
                                            ?>
                                            </table>
                                            <br><br>
                                    </div>
                                    <div class="row" style="margin-top: 50px; margin-bottom:50px;">
                                        <div class="col">
                                            <div style=" background:white; " ><br>
                                                    <div class="text" style="margin-left:15%;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                                    </svg>
                                                         <h5  style="margin-top: 10px;">รายการสินค้าทั้งหมด</h5> 
                                                           <?php 
                                                                $product = $db_handle->runQuery("SELECT count(*)number FROM product WHERE email='".$_SESSION['member']."'");
                                                                if(!empty($product)){
                                                                    foreach($product as $key => $value){
                                                                        echo number_format($product[$key]["number"])."  รายการ";
                                                                    }
                                                                }
                                                           ?>
                                                    </div>
                                                    <br>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div style=" background:white; " ><br>
                                                    <div class="text" style="margin-left:15%;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                                                    </svg>
                                                         <h5  style="margin-top: 10px;">จำนวนสินค้าในคลัง</h5> 
                                                           <?php 
                                                                $product = $db_handle->runQuery("SELECT SUM(number) number FROM product WHERE email='".$_SESSION['member']."'");
                                                                if(!empty($product)){
                                                                    foreach($product as $key => $value){
                                                                        echo number_format($product[$key]["number"])."  ชิ้น";
                                                                    }
                                                                }
                                                           ?>
                                                    </div>
                                                    <br>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div style=" background:white; " ><br>
                                                    <div class="text" style="margin-left:15%;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                                    </svg>
                                                         <h5  style="margin-top: 10px;">ขายแล้ว</h5> 
                                                           <?php 
                                                                $cart = $db_handle->runQuery("SELECT SUM(number) number FROM cart WHERE shop='".$_SESSION['member']."' AND status='จัดส่งแล้ว'");
                                                                if(!empty($cart)){
                                                                    foreach($cart as $key => $value){
                                                                        echo number_format($cart[$key]["number"])."  ชิ้น";
                                                                    }
                                                                }
                                                           ?>
                                                    </div>
                                                    <br>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div style=" background:white; " ><br>
                                                    <div class="text" style="margin-left:15%;">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                            <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                                        </svg>
                                                         <h5  style="margin-top: 10px;">รายได้รวมสุทธิ</h5> 
                                                           <?php 
                                                                $cart = $db_handle->runQuery("SELECT SUM(price*number) income FROM cart WHERE shop='".$_SESSION['member']."' AND status='จัดส่งแล้ว'");
                                                                if(!empty($cart)){
                                                                    foreach($cart as $key => $value){
                                                                        echo number_format($cart[$key]["income"])."  บาท";
                                                                    }
                                                                }
                                                           ?>
                                                    </div>
                                                    <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
       </div>
    
</body>
</html>