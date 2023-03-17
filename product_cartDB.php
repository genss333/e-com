<?php 
session_start();
include 'server.php';
require_once("dbcontroller.php");
$db_handle = new DBController();
$member = $_SESSION['member'];
$errors =array();
$file = mysqli_real_escape_string($conn,$_POST['submit']);
    $_SESSION["fileup"] = $file;
    $output_dir = "slip/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];

	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	if (empty($ImageName)) {
        array_push($errors, "image is requried");
        $_SESSION['requrie'] = "image is requried";
        header("location:product_cart.php?");
    }
	

	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}
	move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
if(isset($_POST['submit'])){
    $p_id = $_GET['p_id'];
	  if(count($errors)==0){
            if(!empty($_SESSION["member"])){
                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");

                $customer = $db_handle->runQuery("SELECT customer.firstname,customer.lastname,book.tel,book.address
                FROM customer
                INNER JOIN book ON customer.email=book.email
                WHERE customer.email='".$_SESSION['member']."'");

                $itemArray =array($productByCode[0]["product_id"]=>array('product_name'=>$productByCode[0]["name"], 'product_id'=>$productByCode[0]["product_id"],
                            'price'=>$productByCode[0]["price"],'shop'=>$productByCode[0]["email"]));

                $cusArray =array($customer[0]["email"]=>array('firstname'=>$customer[0]["firstname"], 'lastname'=>$customer[0]["lastname"],
                            'address'=>$customer[0]["address"],'tel'=>$customer[0]["tel"]));
                $qty = $_SESSION['qty'];
                $sql = "INSERT INTO `cart` (`id`, `product_id`, `product_name`, `customer_email`, `firstname`, `lastname`, `address`, `tel`, `number`, `price`, `pay`, `status`, `shop`) 
                        VALUES (NULL, '".$productByCode[0]["product_id"]."', '".$productByCode[0]["name"]."',
                        '".$_SESSION['member']."', '".$customer[0]["firstname"]."', '".$customer[0]["lastname"]."', '".$customer[0]["address"]."', '".$customer[0]["tel"]."', '$qty',
                        '".$productByCode[0]["price"] * $qty."', '$NewImageName', 'ยังไม่ยืนยัน', '".$productByCode[0]["email"]."')";
                $query =  mysqli_query($conn,$sql);
                unset($_SESSION['cart'][$p_id]);
                $_SESSION['complate'] = "complate";
                header("location:product_cart.php");           
            }
        }
	  }else if(isset($_POST['submit_all'])){
        if(count($errors)==0){
            $p_id = $_GET['p_id']; 
                if(!empty($_SESSION["member"])){
                    foreach($_SESSION['cart'] as $p_id=>$qty){
                        $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE product_id='$p_id'");

                        $customer = $db_handle->runQuery("SELECT customer.firstname,customer.lastname,book.tel,book.address
                        FROM customer
                        INNER JOIN book ON customer.email=book.email
                        WHERE customer.email='".$_SESSION['member']."'");
        
                        $itemArray =array($productByCode[0]["product_id"]=>array('product_name'=>$productByCode[0]["name"], 'product_id'=>$productByCode[0]["product_id"],
                                    'price'=>$productByCode[0]["price"],'shop'=>$productByCode[0]["email"]));
        
                        $cusArray =array($customer[0]["email"]=>array('firstname'=>$customer[0]["firstname"], 'lastname'=>$customer[0]["lastname"],
                                    'address'=>$customer[0]["address"],'tel'=>$customer[0]["tel"]));
        
                        $sql = "INSERT INTO `cart` (`id`, `product_id`, `product_name`, `customer_email`, `firstname`, `lastname`, `address`, `tel`, `number`, `price`, `pay`, `status`, `shop`) 
                                VALUES (NULL, '".$productByCode[0]["product_id"]."', '".$productByCode[0]["name"]."',
                                '".$_SESSION['member']."', '".$customer[0]["firstname"]."', '".$customer[0]["lastname"]."', '".$customer[0]["address"]."', '".$customer[0]["tel"]."', '$qty',
                                '".$productByCode[0]["price"] * $qty."', '$NewImageName', 'ยังไม่ยืนยัน', '".$productByCode[0]["email"]."')";
                        $query =  mysqli_query($conn,$sql);
                        unset($_SESSION['cart'][$p_id]);
                        $_SESSION['complate'] = "complate";
                        header("location:product_cart.php");
                    }           
                }
            }
      }

?>