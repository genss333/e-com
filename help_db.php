<?php
    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        if (empty($email)) {
            array_push($errors, "email is required");
            $_SESSION['error_e'] = "Email is required";
            header("location: help.php");
        }
        if(count($errors)==0){
            $sql = "INSERT INTO `help_customer` (`id`, `email`, `help_satus`) VALUES (NULL, '$email', 'ยังไม่ยืนยัน')";
            mysqli_query($conn,$sql);
            $_SESSION['complate'] = "complate";
            header("location:help.php");
        }
    }
?>