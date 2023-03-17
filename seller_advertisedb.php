<?php
    session_start();
    include('server.php');
    $errors =array();
    
    if(isset($_POST['submit'])){
        $files = array_filter($_FILES['image']['name']); //something like that to be used before processing files.
        $p_id = mysqli_real_escape_string($conn,$_POST['pd_id']);
        $number_date = mysqli_real_escape_string($conn,$_POST['number_date']);
        if (empty($files)) {
            array_push($errors, "image is requried");
            $_SESSION['requrie']= "image is requried";
            header("location:seller_advertise.php?image");
        }
        if (empty($p_id)) {
            array_push($errors, "image is requried");
            $_SESSION['requrie']= "image is requried";
            header("location:seller_advertise.php?id");
        }
        if (empty($number_date)) {
            array_push($errors, "image is requried");
            $_SESSION['requrie']= "image is requried";
            header("location:seller_advertise.php?date");
        }
    
        // Count # of uploaded files in array
        $total = count($_FILES['image']['name']);
    
        // Loop through each file
        for ($i = 0; $i < $total; $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['image']['tmp_name'][$i];
    
            //Make sure we have a file path
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = "./slip/" . $_FILES['image']['name'][$i];
    
                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    if (count($errors) == 0) {
                        $price = 500*$number_date;
                        $sql = "INSERT INTO `product_promoted` (`id`, `product_id`, `count_date`, `slip`, `price`, `shop`) 
                        VALUES (NULL, '$p_id', '$number_date', '$newFilePath', '$price', '".$_SESSION['member']."')";
                        $query = mysqli_query($conn, $sql);
                        $_SESSION['complate'] = "complate";
                        header("location:seller_advertise.php?complate");
                    }else{
                        $_SESSION['requrie']= "image is requried";
                        header("location:seller_advertise.php"); 
                    }
                }
            }
        }
    }

?>