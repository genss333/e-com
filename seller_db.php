<?php 
    session_start();    
    include 'server.php';
    $errors = array();
    $member = $_SESSION['member'];
    $file = mysqli_real_escape_string($conn,$_POST['Add_product']);
    $_SESSION["fileup"] = $file;
    $output_dir = "product/";/* Path for file upload */
        $RandomNum   = time();
        $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
        $ImageType      = $_FILES['image']['type'][0];
    
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt       = str_replace('.','',$ImageExt);
        $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
        $ret[$NewImageName]= $output_dir.$NewImageName;
        if (!file_exists($output_dir))
        {
            @mkdir($output_dir, 0777);
        }
        move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	
	if (empty($ImageName)) {
        array_push($errors, "image is requried");
        $_SESSION['error_l'] = "image is requried";
        header("location:seller_product.php?image");
    }
    if(isset($_POST['Add_product'])){
      $name = mysqli_real_escape_string($conn,$_POST['pd_name']);
      $price = mysqli_real_escape_string($conn,$_POST['price']);
      $num = mysqli_real_escape_string($conn,$_POST['number']);
      $title = mysqli_real_escape_string($conn,$_POST['title']);
      $category = mysqli_real_escape_string($conn,$_POST['category']);
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
            if(count($errors)==0){
              $sql = "INSERT INTO `product` (`image`, `name`, `title`,`type`, `price`, `number`,`email`, `status`) VALUES ('$NewImageName', '$name', '$title', '$category', '$price', '$num','$member','none promoted')";
              mysqli_query($conn,$sql);
              header("location:seller_product.php");
            }
    }

    if(isset($_GET['act'])=="delete"){
      $p_id = $_GET['p_id'];
      $sql = "DELETE FROM pd_detail WHERE product_id='$p_id'";
      if(mysqli_query($conn,$sql)){
      $sql2 = "DELETE FROM product WHERE product_id='$p_id'";
      mysqli_query($conn,$sql2);
      header("location:seller_product.php");
      }
    }
    
?>