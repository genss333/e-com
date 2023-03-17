<?php
	session_start();
	include 'server.php';
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    error_reporting(0);
    include('error.php');
    if(isset($_GET['remove'])){
        if(!empty($_GET['c_id'])){
            $c_id = $_GET['c_id'];
            $sql = "DELETE FROM cart WHERE id='$c_id' AND status = 'ยังไม่ยืนยัน' ";
            if(mysqli_query($conn,$sql)){
                $sql = "SELECT * FROM cart WHERE id='$c_id'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)==0){
                    header("location:product_order.php");
                }else{ 
                    header("location:product_order.php");
                }  
            }
       }
    }elseif(isset($_GET['submit'])){
        if(!empty($_GET['c_id'])){
            $c_id = $_GET["c_id"];
            $order = $db_handle->runQuery("SELECT * FROM cart  WHERE id = '$c_id' ");
                    if(!empty($order)){
                        foreach($order as $key => $value){
                            $number =$order[$key]["number"];
                            $p_id = $order[$key]["product_id"];
                                $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id= '$p_id' ORDER BY product_id ASC ");
                                    if(!empty($product)){
                                        foreach($product as $key2 => $value2){
                                            echo $have = $product[$key2]["number"];
                                            $upstock = $have - $number;
                                            $sql = "UPDATE `product` SET `number` = '$upstock' WHERE `product`.`product_id` = '$p_id'";
                                            mysqli_query($conn,$sql);
                                        }
                                    }
                        }
            }
                    $sql = "UPDATE `cart` SET `status` = 'จัดส่งแล้ว' WHERE `cart`.`id` = '$c_id'";
                        if(mysqli_query($conn,$sql)){
                            $sql = "SELECT * FROM cart WHERE id='$c_id'";
                            $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)==1){
                                $_SESSION['complate'] = "complate";
                                header("location:product_order.php");
                            } 
                        }
        }
    }elseif(isset($_POST['review'])){
        if(!empty($_GET['p_id'])){
            $text = mysqli_real_escape_string($conn,$_POST['text']);
            if(empty($text)){
                array_push($errors,"text_requrie");
            }
            if(count($errors)==0){
                $p_id=$_GET['p_id'];
                $sql = "INSERT INTO `review` (`id`, `product_id`, `text`, `customer_email`) VALUES (NULL, '$p_id', '$text', '".$_SESSION['member']."')";
                mysqli_query($conn,$sql);
                header("location:product_detail.php?p_id=$p_id");
            }
        }
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
    <title>Red-Store || Order History</title>
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
      <table>
        <tr>
          <th>รายการสินค้า</th>
          <th style="width:10%;">จำนวนสินค้า</th>
          <th style="width:10%;">สถานะสั่งซื้อ</th>
          <th style="width:10%;">ตอบรับสินค้า</th>
          <th style="width:10%;">ยกเลิกสินค้า</th>
        </tr>
        <?php 
                $product = $db_handle->runQuery("SELECT cart.id,cart.product_name name,cart.product_id,cart.number,cart.price,cart.status,product.image 
                FROM cart INNER JOIN product ON cart.product_id=product.product_id 
                WHERE customer_email='".$_SESSION['member']."'");
                foreach($product as $key=>$item){?>  
                <tr>
                    <td>
                        <div class="cart-info">
                        <img src="/e-com/product/<?php echo $product[$key]["image"] ?>"style="width:15%;height:15%;margin-top:1%;">
                        <div class="info">
                            <p><?php echo $product[$key]["name"] ?></p>
                            <small>ราคารวมสุทธิ: ฿<?php echo number_format($product[$key]["price"]) ?></small><br>
                           <?php if($product[$key]["status"]=="จัดส่งแล้ว"){?>
                                <form action="product_order.php?p_id=<?php echo $product[$key]["product_id"] ?>" method="post">
                                    <p style="font-size: 12px;">รีวิวสินค้า</p>
                                    <textarea name="text" id="" rowa= "20" cols="50" size"100" style="font-size: 12px;" placeholder="รีวิวสินค้า"></textarea><br>
                                    <button type="submit" name="review" style="margin-top:5px;margin-bottom:5px;
                                                    border:1px solid #dadce0;border-radius:5px;width:80px;height:30px;font-size:13px;">
                                                submit
                                    </button>
                                </form>
                            <?php }?>
                        </div>
                        </div>
                    </td>
                    <td style="text-align: center;"> <?php echo $product[$key]["number"]." ชิ้น";?> </td>
                        <td style="text-align: center;font-size: 13px;">
                            <?php  
                                if($product[$key]["status"]=="ยังไม่ยืนยัน"){
                                    echo "<p style='color:orangered;'>รอการตรวจสอบ</p>";
                                }elseif($product[$key]["status"]=="ยืนยันแล้ว"){
                                    echo "<p style='color:green;'>กำลังจัดส่งสินค้า</p>";
                                }elseif($product[$key]["status"]=="จัดส่งแล้ว"){
                                    echo "<p style='color:green;'>จัดส่งแล้ว</p>";
                                }
                            ?> 
                        </td>
                        <td style="text-align: center;">
                            <?php  
                                if($product[$key]["status"]=="ยืนยันแล้ว"){?>
                                        <a  href="product_order.php?c_id=<?php echo $product[$key]["id"] ?>&&submit&&p_id=<?php echo $product[$key]["product_id"] ?>" style="border:none;background:none" > 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                        </a>
                                <?php } 
                                    
                                ?>   
                        </td>
                        <td>
                        <?php  
                            if($product[$key]["status"]=="ยังไม่ยืนยัน"){?>
                                <a href="product_order.php?c_id=<?php echo $product[$key]["id"] ?>&&remove">
                                <img src="icon-delete.png">
                            </a>
                                <?php }else{
                                } 
                        ?> 
                        </td>
                    </tr>
        <?php 
                }
        ?>
      </table>
    </div>
</body>

</html>