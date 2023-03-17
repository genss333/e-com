<?php 
  session_start();
  require_once("dbcontroller.php");
  $db_handle = new DBController(); 
  include 'server.php';
  if(isset($_POST['addorder'])){
    echo $c_id = $_GET["c_id"];
        $order = $db_handle->runQuery("SELECT * FROM cart  WHERE id = '$c_id' ");
                if(!empty($order)){
                    foreach($order as $key => $value){
                        $sql2 = "UPDATE `cart` SET `status` = 'ยืนยันแล้ว' WHERE `cart`.`id` = '$c_id' ";
                            $query2 = mysqli_query($conn,$sql2);
                            header("location:seller_order.php");
                                    }
                                }   
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
    <title>ขายสินค้ากับเรา</title>
</head>
<body style="background:whitesmoke;">
       <div class="dashboard">
            <div class="row align-items-start">
            <div class="col" style="margin-top: 30px;" >
                <a   data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="collapseWidthExample"
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
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_acount.php"  >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                                Account
                            </a>
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_product.php"  >
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
                        <div class="container-fluid" style=" margin-top:5%; width: 85%;">
                                <h3 style="color: #555;" >Home/Order</h3>  
                                    <br>
                                <div class="mb-3">
                                    <div style=" background:white;" >
                                        <br>
                                        <div class="text" style="margin-left:5%;">
                                            <h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                             Product/Order
                                            </h4>



                                        </div>
                                        <table class="tbl-cart" cellpadding="10" cellspacing="1"  style="margin: 50px auto;margin-left:5%;margin-right:5%;font-size: 12px; ">
                                            <tbody>
                                                <tr>
                                                <th style="text-align:left;" width="7%">รหัส</th>
                                                <th style="text-align:left;" width="7%">รหัสสินค้า</th>
                                                <th style="text-align:left;" width="25%">สินค้า</th>
                                                <th style="text-align:left;"width="10%">อีเมล</th>
                                                <th style="text-align:left;"width="7%">ชื่อ</th>
                                                <th style="text-align:left;"width="7%"">นามสกุล</th>
                                                <th style="text-align:center;"width="5%">เบอร์โทร</th>
                                                <th style="text-align:left;" width="5%">จำนวน</th>
                                                <th style="text-align:left;" width="5%">ราคา</th>
                                                <th style="text-align:leftt;" width="5%" >ราคารวม</th>
                                                <th style="text-align:leftt;" width="5%" >ดูสลิป</th>
                                                <th style="text-align:left;" width="5%">status</th>
                                                <th style="text-align:right;" width="5%">Confirm</th>
                                                
                                                 </tr>
                                                <?php 
                                                $order = $db_handle->runQuery("SELECT * FROM cart  WHERE shop='".$_SESSION['member']."' ORDER BY id ASC ");
                                                if(!empty($order)){
                                                    foreach($order as $key => $value){?>
                                                        <form  class="add-to-cart" method="post" action="seller_order.php?c_id=<?php echo $order[$key]["id"]; ?>">
                                                                    <?php   $order[$key]["product_id"];
                                                                        $p_id = $order[$key]["product_id"];
                                                                                $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id= '$p_id' AND email='".$_SESSION['member']."' ORDER BY product_id ASC ");
                                                                                if(!empty($product)){
                                                                                    foreach($product as $key2 => $value2){
                                                                                    $order_id = $order[$key]["id"];
                                                                                    $p_id = $order[$key]["product_id"]
                                                                                        ?>
                                                                <tr>
                                                                <td  style="text-align:left;"><?php echo $order[$key]["id"]; ?></td>
                                                                <td  style="text-align:left;"><?php echo $order[$key]["product_id"]; ?></td>
                                                                <td><img src="/e-com/product/<?php echo $product[$key2]["image"]; ?>" class="cart-item-image" /><?php echo $product[$key2]["name"]; ?></td>
                                                                <td style="text-align:left;"><?php echo $order[$key]["customer_email"]; ?></td>
                                                                <td style="text-align:center;"><?php echo $order[$key]["firstname"]; ?></td>
                                                                <td style="text-align:left;"><?php echo $order[$key]["lastname"]; ?></td>
                                                                <td style="text-align:center;"><?php echo $order[$key]["tel"]; ?></td>
                                                                <td style="text-align:center;"><?php echo $order[$key]["number"];?></td>
                                                                <td style="text-align:left;"><?php echo number_format($product[$key2]["price"]);?></td>
                                                                <td  style="text-align:left;"><?php echo number_format($order[$key]["price"]); ?></td>
                                                                <td  style="text-align:left;">
                                                                    <a  href="slip.php?order_id=<?php echo $order[$key]["id"] ?>" class="btn btn-primary" style="font-size: 10px;">สลิป</a>                
                                                                </td>
                                                                <td  style="text-align:left;"><?php echo $order[$key]["status"]; ?></td>
                                                                <td  style="text-align:right;"> 
                                                                <?php  if($order[$key]["status"] == "ยืนยันแล้ว"){
                                                                           
                                                                        }elseif($order[$key]["status"] == "จัดส่งแล้ว"){
                                                                        }else{?>
                                                                            <button type='submit'  name='addorder' class='btnAddAction'>ยืนยัน</button>
                                                                </td>
                                                                <?php } 
                                                                
                                                                                }
                                                                            }?>
                                                        </form> 
                                                                <?php   
                                                                        }
                                                                    }
                                                                ?>
                                                        
                                            </tbody> 
                                        </table>                          
                                            <br><br>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
       </div>

</body>
</html>