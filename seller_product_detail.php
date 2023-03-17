<?php 
  session_start();
  error_reporting(0);
  require_once("dbcontroller.php");
  $db_handle = new DBController(); 
  $errors = array();
  $p_id = $_GET['p_id'];

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
                <a   data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="collapseWidthExample"
                style="width:125px; border:none;background:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" style="color:orangered;margin-left:20px;"> 
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </a>
                    <div >
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
                <div class="col"style="margin-left:-80%;">
                        <div class="container" style=" margin-top:5%; ">
                               <h3 style="color: #555;" >Home/Product</h3>  
                                <br>
                                <div class="row"style="background:white;margin-bottom:50px;">
                                    <div class="col"style="background:white;">
                                        <!------------carousel------------------->
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                                                            <img src="<?php echo $product[$key]["image"] ?>" width="60%"style="margin-left:20%;">
                                                        </div>
                                                <?php }
                                                    $product = $db_handle->runQuery("SELECT product.name,product.price,product.number,pd_detail.image 
                                                    FROM product 
                                                    INNER JOIN pd_detail ON product.product_id=pd_detail.product_id 
                                                    WHERE product.product_id='$p_id' AND order_img >0 ORDER BY pd_detail.order_img ASC LIMIT 4");
                                                        foreach($product as $key=>$value){ ?>
                                                        <div class="carousel-item ">
                                                            <img src="<?php echo $product[$key]["image"] ?>" width="60%;"style="margin-left:20%;">
                                                        </div>
                                                <?php }
                                                    }
                                                ?>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span  aria-hidden="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16"style="color:#555;">
                                                        <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                                                    </svg>
                                                </span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span  aria-hidden="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16" style="color:#555;">
                                                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                                                    </svg>
                                                </span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <!-------upload file------>
                                        <form action="seller_product_detaildb.php?p_id=<?php echo $p_id?>" method="POST" enctype="multipart/form-data">
                                            <div class="row" style="margin-left:1%;">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">อับโหลดรูปภาพ(ได้มากว่า1ภาพ)</label>
                                                    <input class="form-control" type="file" id="formFile" name="detail[]" multiple="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" name="upload_detail" class="btn btn-primary" style="margin: 25px 0; margin-left:30%;background:orangered; border: none; color:white;">
                                                        อัพโหลดรูปภาพ
                                                    </button>
                                                </div>
                                        </form>
                                                <div class="col">
                                                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalToggleLabel">แก้ไขสินค้า</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php 
                                                                    $card = $db_handle->runQuery("SELECT image,id FROM pd_detail WHERE product_id='$p_id'");
                                                                    foreach($card as $key=>$value){?>
                                                                    <form action="seller_product_detaildb.php?p_id=<?php echo $p_id?>&&id=<?php echo $card[$key]["id"] ?>" method="POST" enctype="multipart/form-data">
                                                                       <div class="row align-items-start"style="margin-left:15%;">
                                                                           <div class="col">
                                                                            <div class="card" style="width: 18rem;">
                                                                                <img src="<?php echo $card[$key]["image"] ?>" class="card-img-top" alt="...">
                                                                                <div class="card-body">
                                                                                    <div class="row" style="margin-left:1%;">
                                                                                        <div class="mb-3">
                                                                                            <label for="formFile" class="form-label">อับโหลดรูปภาพ</label>
                                                                                            <input class="form-control" type="file" id="formFile" name="detail[]" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <button type="submit" name="edit_detail" class="btn btn-primary" style="margin: 5px 0; background:orangered; border: none; color:white;">
                                                                                            อัพโหลดรูปภาพ
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                               </div>
                                                                           </div>
                            
                                                                       </div>
                                                                    </form>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="margin: 25px 0;margin-left:20%;">แก้ไขสินค้า</a>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col"style="background:white;margin-left:5%;margin-right:2%;">
                                    <form action="seller_product_detaildb.php?p_id=<?php echo $p_id?>" method="POST" enctype="multipart/form-data">
                                        <?php 
                                            $product = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");
                                                foreach($product as $key=>$value){?>
                                                    <div class="text" style="margin:10% 0% 0% 0%;">
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
                                                    <div class="text" style="margin-left:5%;margin-right:5%;">
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
                                                            </select>
                                                            <div style="background:white; margin-top:35px;">
                                                                <button type="submit" name="Edit_product" class="btn btn-primary" style="margin: 25px 0;   margin-left: 30%; background: none; border: none; color:black;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"></path>
                                                                        </svg>
                                                                        เเก้ไขสินค้า
                                                                </button>
                                                            </div>
                                                            <br><br>
                                                    </div>
                                            <?php   }
                                            ?>
                                       </form>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    
</body>
</html>