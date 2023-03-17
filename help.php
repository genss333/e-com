<?php
    session_start();
?>
<?php if(isset($_SESSION['complate'])) : ?>
    <script>
        alert("ส่งคำร้องเรียนเสร็จเรียบร้อย รอการดำเนินการ");
    </script>
    <?php unset($_SESSION['complate']) ?>
<?php endif ?>
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
    <title>ศูนย์ช่วยเหลือผู้ใช้งาน</title>
</head>
<body style="background-image: url('https://img.lovepik.com/photo/50115/7953.jpg_wh860.jpg');">
        <div class="help">
        <div class="nav">
            <li>
                <a href="index.php"><img src="/img/logo-white.png" width="150;" style="margin-top:3.125rem; margin-left:3.125rem;"></a>
            </li>
        </div>
            <div class="container" style="background:white;height:300px;width: 30%; margin-top:10%;">
                <form action="help_db.php" method="POST">
                    <div class="mb-3 row"style="margin-left:5%;margin-right:5%;">
                        <p style="margin-top:10%;font-size: 14px;">โปรดระบุบัญชีที่ต้องการร้องเรียน.</p><br>
                        <p style="font-size: 12px;">อีเมล์ของคุณ</p>
                        <div class="input-group mb-3">
                            <input type="email"  name="email" class="form-control" placeholder="ป้อนอีเมล์ของคุณ" autocomplete="off">
                        </div>
                    </div>
                    <div class="row"style="margin-left:5%;">
                        <div class="col">
                            <a href="login.php" style="color:#555;text-decoration:none;font-size: 12px;">กลับไป</a>
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <button type="submit" name="submit" class="btn btn-primary">ส่งคำร้องเรียน</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
</body>
</html>