<?php
session_start();
include 'server.php';
$errors = array();
require_once("dbcontroller.php");
$db_handle = new DBController();

$member = $_SESSION['member'];
if (isset($_POST['Edit_product'])) {
    $file = mysqli_real_escape_string($conn, $_POST['Edit_product']);
    $_SESSION["fileup"] = $file;
    $output_dir = "product/"; /* Path for file upload */
    $RandomNum = time();
    $ImageName = str_replace(' ', '-', strtolower($_FILES['image']['name'][0]));
    $ImageType = $_FILES['image']['type'][0];
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.', '', $ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
    $ret[$NewImageName] = $output_dir . $NewImageName;
    if (!file_exists($output_dir)) {
        @mkdir($output_dir, 0777);
    }
    move_uploaded_file($_FILES["image"]["tmp_name"][0], $output_dir . "/" . $NewImageName);

    if (empty($ImageName)) {
        array_push($errors, "image is requried");
        $_SESSION['error_l'] = "image is requried";
        header("location:seller_product.php?image");
    }
    $name = mysqli_real_escape_string($conn, $_POST['pd_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $num = mysqli_real_escape_string($conn, $_POST['number']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    if (empty($category)) {
        array_push($errors, "category is requried");
        $_SESSION['error_l'] = "category is requried";
        header("location:seller_product.php?category");

    }
    if (empty($name)) {
        array_push($errors, "product name is required");
        $_SESSION['error_name'] = "product name is required";
        header("location:seller_product.php?nmae");
    }
    if (empty($price)) {
        array_push($errors, "price is required");
        $_SESSION['error_price'] = "price is required";
        header("location:seller_product.php?price");
    }

    if (empty($num)) {
        array_push($errors, "num name is required");
        $_SESSION['error_num'] = "num name is required";
        header("location:seller_product.php?num");
    }
    if (empty($title)) {
        array_push($errors, "title is required");
        $_SESSION['error_num'] = "title is required";
        header("location:seller_product.php?title");
    }
    if (count($errors) == 0) {
        $sql = "UPDATE `product` SET `image` = '$NewImageName',
               `name` = '$name', `title` = '$title', `type` = '$category', `price` = '$price', `number` = '$num', `status` = 'none promoted' WHERE `product`.`product_id` ='" . $_GET['p_id'] . "' ";
        mysqli_query($conn, $sql);
        header("location:seller_product.php");
    }
}
else if (isset($_POST['upload_detail'])) {
    $files = array_filter($_FILES['detail']['name']); //something like that to be used before processing files.

    // Count # of uploaded files in array
    $total = count($_FILES['detail']['name']);

    // Loop through each file
    for ($i = 0; $i < $total; $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['detail']['tmp_name'][$i];

        //Make sure we have a file path
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "./product_detail/" . $_FILES['detail']['name'][$i];

            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                if (empty($files)) {
                    array_push($errors, "image is requried");
                    $_SESSION['error_l'] = "image is requried";
                    header("location:seller_product_detail.php?image");
                }
                if (count($errors) == 0) {
                    $p_id = $_GET['p_id'];
                    $sql = "INSERT INTO `pd_detail` (`id`, `product_id`, `image`, `order_img`) VALUES (NULL, '$p_id', '$newFilePath', '$i')";
                    $query = mysqli_query($conn, $sql);
                    header("location:seller_product_detail.php?p_id=$p_id");
                }
            }
        }
    }
}
elseif(isset($_POST['edit_detail'])){
    $files = array_filter($_FILES['detail']['name']); //something like that to be used before processing files.

    // Count # of uploaded files in array
    $total = count($_FILES['detail']['name']);

    // Loop through each file
    for ($i = 0; $i < $total; $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['detail']['tmp_name'][$i];

        //Make sure we have a file path
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "./product_detail/" . $_FILES['detail']['name'][$i];

            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                if (empty($files)) {
                    array_push($errors, "image is requried");
                    $_SESSION['error_l'] = "image is requried";
                    header("location:seller_product_detail.php?image");
                }
                if (count($errors) == 0) {
                    $p_id = $_GET['p_id'];
                    $id = $_GET['id'];
                    $sql = "UPDATE `pd_detail` SET `image` = '$newFilePath'WHERE `pd_detail`.`id` = $id";
                    $query = mysqli_query($conn, $sql);
                    header("location:seller_product_detail.php?p_id=$p_id");
                }
            }
        }
    }
}

?>