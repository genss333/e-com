<?php 
  session_start();
  require_once("dbcontroller.php");
  $db_handle = new DBController(); 

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
                    <div >
                        <div class="card card-body" style="width:10%; height:100%; background:white; align-items: center;">
                        <a href="index.php"><img src="/img/logo.png" width="100%;" style="margin-top:50px;"></a>
                            <a  class="btn btn-primary" href="seller.php" style="margin-top:35px; background:none; border:none; color:#555;">
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
                               <h3 style="color: #555;" >Home/Product</h3>  
                                <br>
                                <div class="mb-3">
                                    <form  action="seller_db.php" method="post" enctype="multipart/form-data" >
                                        <div style=" background:white;" >
                                            <br>
                                            <div class="text" style="margin-left:5%;margin-right:5%;">
                                                <h4>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                                    </svg>
                                                    Product
                                                </h4><br>
                                                    <p>Add Product</p>
                                                    <p>Basic Information</p>
                                                    <p>Product Images
                                                    This is the main image of your product page. Multiple images can be uploaded at once. Maximum 8 pictures. Size between 330x330 and<br> 5000x5000 px. Obscene image is strictly prohibited.</p>
                                                    <p>Link Image</p>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                                </svg> อัพโหลดรูปภาพ
                                                            </label>
                                                            <input class="form-control" type="file" id="formFile" name="image[]" style="color:#555;" />
                                                        </div><br>
                                                    <p>Product Name</p>
                                                    <input type="text"  name="pd_name" style="border:1px solid #555; border-radius:3px; width:70%;height:40px;padding: 15px;" 
                                                    placeholder="EX.  Sony ZV-1 Compact Camera Black"autocomplete="off" />
                                                    <input type="number" name="number" style="border:1px solid #555; border-radius:3px;padding: 15px; width:70px;height:40px;" value="1" min="1"autocomplete="off" />  ชิ้น
                                                    <br><br>
                                                    <p>Product Title</p>
                                                    <textarea  name="title" style="border:1px solid #555; border-radius:3px; width:70%;height:80px;padding: 15px;" 
                                                    placeholder="EX.  Sony ZV-1 Compact Camera Black"></textarea><br><br>
                                                    <p>Price/Category</p>
                                                    <input type="number" name="price" style="border:1px solid #555; border-radius:3px;padding: 15px; width:200px;height:40px;" placeholder="10000" min="1"autocomplete="off" />  บาท  
                                                    <select name="category" id="" style="border:1px solid #555; border-radius:3px; width:30%;height:40px;margin-left:5%;">
                                                        <option >สินค้าอิเล็กทรอนิกส์</option>
                                                        <option >เสื้อผ้าเครื่องแต่งกาย</option>
                                                        <option >เครื่องประดับ</option>
                                                    </select>
                                                    <br><br>
                                            </div>
                                        </div>
                                            <div style="background:white; margin-top:35px;">
                                                <button type="submit" name="Add_product" class="btn btn-primary" style="margin: 25px 0;   margin-left: 80%; background: none; border: none; color:black;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"></path>
                                                        </svg>
                                                        เพิ่มสินค้า
                                                </button>
                                            </div>
                                      </form>
                                        <br>
                                        <div style="background:white; margin-top:35px;">
                                            <br>
                                            <div class="text" style="margin-left:5%;margin-right:5%;">
                                                <h4>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                                    </svg>
                                                    Product
                                                </h4><br>
                                                    <p>Product List/รายการสินค้า</p><br>
                                                <table class="tbl-cart" cellpadding="10" cellspacing="1"  style="margin-left:10%;margin-right:10%;">
                                                <br>
                                                    <tbody>
                                                    <tr>
                                                    <th style="text-align:left;" width="10%">รหัสสินค้า</th>
                                                    <th style="text-align:left;" width="35%">ชื่อสินค้า</th>
                                                    <th style="text-align:center;"width="15%">ราคาสินค้า</th>
                                                    <th style="text-align:center;"width="15%">จำนวนสินค้า</th>
                                                    <th style="text-align:center;"width="15%">ทำรายการเพิ่มเติม</th>
                                                    <th style="text-align:center;"width="15%">ลบสินค้า</th>
                                                    </tr>
                                                <?php 
                                                    $product = $db_handle->runQuery("SELECT * FROM product  WHERE email ='".$_SESSION['member']."'   ORDER BY product_id ASC ");
                                                    if(!empty($product)){
                                                        foreach($product as $key2 => $value2){
                                                        $p_id= $product[$key2]["product_id"];
                                                            ?>
                                                        <tr>
                                                        <td  style="text-align:left;"><?php echo $product[$key2]["product_id"]; ?></td>
                                                        <td><img src="/e-com/product/<?php echo $product[$key2]["image"]; ?>" class="cart-item-image" /><?php echo $product[$key2]["name"]; ?></td>
                                                        <td style="text-align:center;"><?php echo $product[$key2]["price"]; ?></td>
                                                        <td style="text-align:center;"><?php if($product[$key2]["number"] <= 0 ){
                                                                                                echo "สินค้าหมด";
                                                                                            }else{
                                                                                                echo $product[$key2]["number"]."   ชิ้น"; 
                                                                                            } ?></td>
                                                        <td style="text-align:center;"> <a href="seller_product_detail.php?p_id=<?php echo $p_id ?>"style="text-decoration:none;font-size:12px;">รายละเอียดสินค้า</a></td>
                                                        <td style="text-align:center;"> <a href="seller_db.php?act=delete&p_id=<?php echo $p_id ?>"> <img src="icon-delete.png" alt=""></a></td>
                                                    <?php
                                                            }
                                                        }
                                            
                                                    ?> 
                                                </table>
                                                <br><br>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
       </div>
    
</body>
</html>