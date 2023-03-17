<?php
    session_start();
    include('server.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <title>Red-Store Login</title>
</head>
<body>
    <div class="container-login" style="height:67.5rem;background-image: url('https://wallpaperaccess.com/full/1437631.jpg');">
        <div class="nav">
            <li>
                <a href="index.php"><img src="/img/logo-white.png" width="150;" style="margin-top:3.125rem; margin-left:3.125rem;"></a>
            </li>
        </div>
        <div class="container">
            <div class="borders" style="width: 31.6875rem; height: 37.9375rem; border-radius: 5px; margin-top:3.125rem;">
            <div class="login">
                    <div class="border">
                        <div class="logo">
                            <div class="titel">
                                <p1>Sing in</p1><br>
                                <p2>Use Your Accout</p2>
                            </div>
                        </div>
                        <div class="input">
                            <form class="form-container" action="login_db.php" method="post">
                                <input type="email" name="email" placeholder="E-mail or Phone" autocomplete="off" />
                                    <div class="cath">
                                        <?php include('error.php'); ?>
                                            <?php if (isset($_SESSION['error_e'])) : ?>
                                                <div class="error_email">
                                                    <p>
                                                        <?php
                                                            echo $_SESSION['error_e'];
                                                            unset($_SESSION['error_e']);
                                                        ?>
                                                    </p>
                                                </div>
                                        <?php endif ?>
                                    </div>
                                <input type="password" name="password" placeholder="Enter Your Password"autocomplete="off" />
                                    <div class="cath">
                                        <?php include('error.php'); ?>
                                            <?php if (isset($_SESSION['error_p'])) : ?>
                                            <div class="error_password">
                                                <p>
                                                    <?php
                                                        echo $_SESSION['error_p'];
                                                        unset($_SESSION['error_p']);
                                                    ?>
                                                </p>
                                            </div>
                                        <?php endif ?>

                                        <?php include('error.php'); ?>
                                            <?php if (isset($_SESSION['error_log'])) : ?>
                                                <div class="error_log">
                                                    <p>
                                                        <?php
                                                            echo $_SESSION['error_log'];
                                                            unset($_SESSION['error_log']);
                                                        ?>
                                                    </h3>
                                                </p>
                                        <?php endif ?>
                                    </div>
                                    <div class="next">
                                        <button type="submit" name="login">Login</button>
                                    </div>
                                    <div class="create">
                                        <a href="register.php">Create Accout?</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="help" style="margin-left:90%;margin-top:10px;">
            <a href="help.php"style="color:#dadce0;text-decoration:none;" >ช่วยเหลือ</a>
        </div>
    </div>
    
</body>
</html>