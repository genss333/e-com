<?php
    session_start();
    include 'server.php';
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register Accout</title>
    <link rel="stylesheet" href="register.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap');
</style>
  </head>
  <body>
    <div class="register" style="height:67.5rem;background-image: url('https://www.andamen.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/a/n/andamen-3.0-indus-1611.jpg');">
        <div class="nav">
            <li>
                <a href="index.php"><img src="/img/logo-white.png" width="150;" style="margin-top:3.125rem; margin-left:3.125rem;"></a>
            </li>
        </div>
      <div class="container" style="border:1px solid #dadce0;background: white;width: 650px;height: 650px;border-radius: 8px;margin-left: 55%;"">
        <div class="logo">
        <p>Create Your Accout</p>
        </div>
        <form class="form-container" action="register_db.php" method="post">
          <div class="row-1">
            <input type="text" name="firstname" placeholder="First name"autocomplete="off" />
            <input type="text" name="lastname" placeholder="Last name"autocomplete="off" />
            <!------errors session------>
                <div class="catch">
                <?php include('error.php'); ?>
                    <?php if (isset($_SESSION['error_f'])) : ?>
                        <div class="error_firstname">
                            <p>
                                <?php
                                    echo $_SESSION['error_f'];
                                    unset($_SESSION['error_f']);
                                ?>
                            </p>
                        </div>
                    <?php endif ?>
                </div>
        <!------errors session------>
        <div class="catch">
            <?php include('error.php'); ?>
            <?php if (isset($_SESSION['error_l'])) : ?>
                <div class="error_lastname">
                    <p>
                        <?php
                            echo $_SESSION['error_l'];
                            unset($_SESSION['error_l']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
        </div>
          </div>

          <div class="row-2">
            <input type="text" name="email" placeholder="E-mail"autocomplete="off" />
            <div class="catch">
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
          </div>
          <div class="row-3">
            <input type="password" name="password1" placeholder="Password"autocomplete="off" />
            <input type="password" name="password2" placeholder="Confirm"autocomplete="off" />
            <div class="catch">
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
            </div>
          </div>
          <div class="singin" style="text-decoration: underline;">
              <a href="login.php">Sing in instead?</a>
          </div>
          <div class="btn">
              <button type="submit" name="register">Register</button>
          </div>
        </form>
      </div>

    </div>


  </body>
</html>
