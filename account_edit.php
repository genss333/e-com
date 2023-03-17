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
  if(isset($_GET['cus_email'])){
      $email = $_GET['cus_email'];
      $sql = "DELETE FROM book WHERE email='$email'";
      if(mysqli_query($conn,$sql)){
        $sql = "DELETE FROM customer WHERE email='$email'";
        $query=mysqli_query($conn,$sql);
        header("location:index.php?logout");
      }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Edit Account</title>
</head>
<body style="background:whitesmoke; ">
       <div class="dashboard">
                <div class="col">
                        <div class="container">
                            <form  action="upload.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="mb-3">
                                  <div style=" background:white;" >
                                    <br>
                                        <div class="text" style="margin-left:5%;">
                                            <br><br>
                                            <div class=" account" style="margin-left: 10%; margin-right:10%;">
                                                <h1 style="font-size: 25px; text-align: center;">ข้อมูลส่วนบุคคล</h1>
                                                <p style="text-align: center;">ข้อมูลพื้นฐาน เช่น ชื่อและรูปภาพที่คุณใช้ในบริการต่างๆ</p>
                                                <br>
                                                <div class="row">
                                                    <div class="col"style="margin-left: 38%; margin-right:37%;">
                                                        <?php
                                                            $member = $_SESSION['member'];
                                                            $select = "SELECT image FROM image WHERE member = '$member' ORDER BY id DESC LIMIT 1";
                                                            $query =  $conn->query($select);
                                                            if($query->num_rows > 0){
                                                              while ($row = $query->fetch_assoc()) {?>
                                                              <img src="/e-com/upload/<?php echo $row["image"]; ?>"style="width:200px;border-radius:100%;" >
                                                          <?php
                                                                }
                                                              }
                                                          ?>
                                                          <br>
                                                    </div>
                                                 </div>
                                                 <div class="row"style="margin-left: 40%;margin-top:5%;">
                                                     <div class="col" >
                                                         <div class="file">
                                                            <label class="file-label">
                                                                <input class="file-input" type="file" name="image[]" />
                                                                <span class="file-cta">
                                                                <span class="file-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                                </svg>
                                                                </span>
                                                                <span class="file-label">
                                                                    Choose a file…
                                                                </span>
                                                                </span>
                                                                
                                                            </label>
                                                          </div>
                                                          <div class="row">
                                                            <button type="submit" name="upload" style="margin-top: 15px;margin-bottom: 25px; margin-left:5%;
                                                                    border:1px solid #dadce0;border-radius:5px;width:20%;height:30px;font-size:13px;">
                                                                Upload
                                                            </button>
                                                        </div>
                                                      </div>
                                                     
                                                 </div>
                                                 <div class="row"style="margin-top:35px;">
                                                   <div class="col">
                                                     <h4>ข้อมูลพื้นฐาน</h4>
                                                   </div>
                                                 </div>
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 25%;margin-top:25px;" >
                                                        <h6>ชื่อ:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: -30%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT firstname FROM customer WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <input type="text" name="firstname" value="<?php echo $book[$key]["firstname"]?>"
                                                                        style="width:350px;height:50px;padding:15px;border: 1px solid #dadce0; ;border-radius: 5px;"autocomplete="off" />
                                                             <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col"style="margin-left: 25%;margin-top:25px;" >
                                                            <h6>นามสกุล:</h6>
                                                        </div>
                                                        <div class="col">
                                                            <div class="data" style="margin-left: -25%;font-size: 16px;margin-top:20px;">
                                                                <?php 
                                                                    $book = $db_handle->runQuery("SELECT lastname FROM customer WHERE email='".$_SESSION['member']."'");
                                                                        foreach($book as $key=>$value){?>
                                                                            <input type="text" name="lastname" value="<?php echo $book[$key]["lastname"]; ?>"
                                                                            style="width:350px;height:50px;padding:15px;border: 1px solid #dadce0; ;border-radius: 5px;"autocomplete="off" />
                                                                <?php }
                                                                ?>
                                                            </div>
                                                        </div>
                                                 </div>
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 25%;margin-top:25px;">
                                                        <h6>อีเมล:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: -25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT email FROM customer WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <p><?php echo $book[$key]["email"]; ?></p>
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
                                                     <div class="col"style="margin-left: 25%;margin-top:25px;">
                                                        <h6>ที่อยู่:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: -25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT address FROM book WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                    <input type="text" name="address" value="<?php echo $book[$key]["address"]; ?>"
                                                                        style="width:350px;height:50px;padding:15px;border: 1px solid #dadce0; ;border-radius: 5px;"autocomplete="off" />
                                                             <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="row" >
                                                     <div class="col"style="margin-left: 25%;margin-top:25px;">
                                                        <h6>เบอร์โทร:</h6>
                                                     </div>
                                                    <div class="col">
                                                        <div class="data" style="margin-left: -25%;font-size: 16px;margin-top:20px;">
                                                            <?php 
                                                                $book = $db_handle->runQuery("SELECT tel FROM book WHERE email='".$_SESSION['member']."'");
                                                                    foreach($book as $key=>$value){?>
                                                                        <input type="text" name="tel" value="<?php echo $book[$key]["tel"]; ?>"
                                                                        style="width:350px;height:50px;padding:15px;border: 1px solid #dadce0; ;border-radius: 5px;"autocomplete="off" />
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
                                <div style="background:white; margin-top: 50px;">
                                   <div class="row">
                                    <div class="col" style="margin-top: 25px;">
                                            <a href="account_edit.php?cus_email=<?php echo $_SESSION['member']?>"style="margin-left:10%;color:red;font-size:13px;">ยกเลิกสมาชิก</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" name="submit" style="margin-top: 25px;margin-bottom: 25px; margin-left:80%;
                                                    border:1px solid #dadce0;border-radius:5px;width:80px;height:30px;font-size:13px;">
                                                submit
                                            </button>
                                        </div>
                                   </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
       </div>
       <br><br>
</body>
</html>