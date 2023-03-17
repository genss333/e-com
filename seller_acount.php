<?php 
   session_start();
  require_once("dbcontroller.php");
  $db_handle = new DBController(); 
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
                    <div class="l" id="">
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
                            <a class="btn btn-primary"style="margin-top:55px; background:none; border:none;color:#555;" href="seller_order.php"  >
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
                <div class="col" style="margin-left:-90%;">
                        <div class="container" style=" margin-top:2%; ">
                            <form  >
                                <br>
                                <div class="mb-3">
                                    <div style=" background:white;" >
                                    <br><br>
                                    <a href="account_edit.php" target="blank"  style="text-decoration: none;color: #555;margin-left:90%;font-size: 13px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>แก้ไข้ข้อมูล
                                    </a>
                                    <br>
                                        <div class="text" style="margin-left:5%;">
                                            <br><br>
                                            <div class=" account" style="margin-left: 10%; margin-right:10%;">
                                                <h1 style="font-size: 25px; text-align: center;">ข้อมูลส่วนบุคคล</h1>
                                                <p style="text-align: center;">ข้อมูลพื้นฐาน เช่น ชื่อและรูปภาพที่คุณใช้ในบริการต่างๆ</p>
                                                <br>
                                                <div class="row">
                                                    <div class="col"
                                                    style="margin-left: 37%; margin-right:37%;">
                                                        <?php
                                                            $member = $_SESSION['member'];
                                                            $select = "SELECT image FROM image WHERE member = '$member' ORDER BY id DESC LIMIT 1";
                                                            $query =  $conn->query($select);
                                                            if($query->num_rows > 0){
                                                              while ($row = $query->fetch_assoc()) {?>
                                                              <img src="/e-com/upload/<?php echo $row["image"]; ?>"style="width:200px;border-radius:200px;" >
                                                          <?php
                                                                }
                                                              }
                                                          ?>
                                                    </div>
                                                 </div>
                                                 <div class="row"style="margin-top:35px;">
                                                   <div class="col">
                                                     <h4>ข้อมูลพื้นฐาน</h4>
                                                   </div>
                                                 </div>
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 5%;margin-top:20px;" >
                                                        <h6>ชื่อ-สกุล:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: 25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT firstname,lastname FROM customer WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <p><?php echo $book[$key]["firstname"]." ",$book[$key]["lastname"]; ?></p>
                                                             <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 5%;margin-top:20px;">
                                                        <h6>อีเมล:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: 25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT email FROM customer WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <p><?php echo $book[$key]["email"] ?></p>
                                                             <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="row">
                                                   <div class="col">
                                                     <h4>ข้อมูลการติดต่อ</h4>
                                                   </div>
                                                 </div>
                                                 
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 5%;margin-top:20px;">
                                                        <h6>ที่อยู่:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: 25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT address FROM book WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <p><?php echo $book[$key]["address"] ?></p>
                                                             <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 5%;margin-top:20px;">
                                                        <h6>เบอร์โทร:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: 25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT tel FROM book WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <p><?php echo $book[$key]["tel"] ?></p>
                                                             <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                            <br><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
            </div>
       </div>
    
</body>
</html>