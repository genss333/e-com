<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController(); 
include 'server.php';
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
    <title>Slip</title>
</head>
<body style="background:black;">
        <div class="content">
            <div class="container"style="margin:2% 35%;">
                <?php 
                if(isset($_GET['order_id'])){
                    $id = $_GET['order_id'];
                    $order = $db_handle->runQuery("SELECT cart.pay,cart.product_name,cart.firstname,cart.lastname,cart.address,cart.tel,cart.price totalprice,cart.number,
                    product.image
                    FROM cart
                    INNER JOIN product ON cart.product_id=product.product_id
                    WHERE cart.id ='$id'");
                        if(!empty($order)){
                            foreach($order as $key => $value){?>
                                <div class="card" style="width: 35%;">
                                    <img src="/e-com/slip/<?php echo $order[$key]["pay"] ?>" width="50%"style="margin:15px 25%;">
                                    <div class="card-body">
                                        <p>รายละเอียด</p>
                                        <div class="row">
                                            <div class="col">
                                                <img src="/e-com/product/<?php echo $order[$key]["image"] ?>" style="width: 20%;margin:0 5%;">
                                                <p><?php echo $order[$key]["product_name"] ?></p>
                                                <p><?php echo $order[$key]["number"]." ชิ้น" ?></p>
                                                <p>฿<?php echo number_format($order[$key]["totalprice"]) ?></p>
                                            </div>
                                            <div class="col">
                                               <p><?php echo $order[$key]["firstname"]." ".$order[$key]["lastname"] ?></p>
                                                <p><?php  echo $order[$key]["tel"] ?></p>
                                                <p><?php  echo $order[$key]["address"] ?></p> 
                                            </div>
                                        </div>
                                        <a href="seller_order.php" class="btn btn-primary">กลับไปหน้ายืนยันสินค้า</a>
                                    </div>
                                </div>
                <?php 
                        }
                    }
                }
                ?>
                <?php 
                if(isset($_GET['pro_id'])){
                    $id = $_GET['pro_id'];
                    $order = $db_handle->runQuery("SELECT product.image,product_promoted.count_date,product_promoted.slip,product_promoted.price,product_promoted.shop,product.number,product.name 
                    FROM product_promoted 
                    INNER JOIN product ON product_promoted.product_id=product.product_id
                    WHERE product_promoted.id='$id' ");
                        if(!empty($order)){
                            foreach($order as $key => $value){?>
                                <div class="card" style="width: 35%;">
                                    <img src="<?php echo $order[$key]["slip"] ?>" width="50%"style="margin:15px 25%;">
                                    <div class="card-body">
                                        <p>รายละเอียด</p>
                                        <div class="row">
                                            <div class="col">
                                                <img src="/e-com/product/<?php echo $order[$key]["image"] ?>" style="width: 20%;margin:0 5%;">
                                                <p><?php echo $order[$key]["name"] ?></p>
                                                <p><?php echo $order[$key]["number"]." ชิ้น" ?></p>
                                                <p>฿<?php echo number_format($order[$key]["price"]) ?></p>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <a href="admin_advertise.php" class="btn btn-primary">กลับไปหน้ายืนยันสินค้า</a>
                                    </div>
                                </div>
                <?php }
                }
            }
                ?>
            </div>
        </div>
                   
</body>
</html>