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
    <title>Account</title>
</head>
<body style="background:whitesmoke;">
       <div class="dashboard">
                <div class="col">
                        <div class="container" style=" margin-top:2%; ">
                            <form  action="upload.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="mb-3">
                                    <div style=" background:white;" >
                                    <br><br>
                                    <a href="account_edit.php" target="blank"  style="text-decoration: none;color: #555;margin-left:90%;">
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
                                                        <h6>ที่อยู่:</h6>
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
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 5%;margin-top:20px;">
                                                        <h6>รหัสผ่าน:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: 25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT password FROM customer WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <p><?php echo $book[$key]["password"] ?></p>
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
    
</body>
</html>