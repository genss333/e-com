<?php
session_start();
include('server.php');
$errors = array();
$member = $_SESSION['member'];
if (isset($_POST['upload'])) {
	$file = mysqli_real_escape_string($conn, $_POST['submit']);
	$_SESSION["fileup"] = $file;
	$output_dir = "upload/"; /* Path for file upload */
	$RandomNum = time();
	$ImageName = str_replace(' ', '-', strtolower($_FILES['image']['name'][0]));
	$ImageType = $_FILES['image']['type'][0];

	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt = str_replace('.', '', $ImageExt);
	$ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
	$ret[$NewImageName] = $output_dir . $NewImageName;

	if (empty($ImageName)) {
		array_push($errors, "image is requried");
		$_SESSION['error_l'] = "image is requried";
		header("location:account_edit.php?image");
	}

	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir)) {
		@mkdir($output_dir, 0777);
	}
	move_uploaded_file($_FILES["image"]["tmp_name"][0], $output_dir . "/" . $NewImageName);

	if (count($errors) == 0) {
		$sql = "INSERT INTO image(member,image)VALUES ('$member','$NewImageName')";

		if (mysqli_query($conn, $sql)) {
			echo "successfully !";
			$select = "SELECT image FROM image WHERE member = '$member' ORDER BY id DESC LIMIT 1";
			$result = mysqli_query($conn, $select);
			if (mysqli_num_rows($result) == 1) {
				header("location: account_edit.php?");
			}

		}
		else {
			echo "Error: " . $sql . "" . mysqli_error($cn);
		}
	}
}

elseif (isset($_POST['submit'])) {
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	if (empty($firstname)) {
		array_push($errors, "first name is requried");
		$_SESSION['error_f'] = "First name is requried";
		header("location:edit.php?firstname");
	}
	if (empty($lastname)) {
		array_push($errors, "lastname is requried");
		$_SESSION['error_l'] = "Lastname is requried";
		header("location: edit.php?lastname");
	}

	if (empty($tel)) {
		array_push($errors, "tel is requried");
		$_SESSION['error_f'] = "Tel is requried";
		header("location:account_edit.php?tel");
	}
	if (empty($address)) {
		array_push($errors, "address is requried");
		$_SESSION['error_l'] = "Address is requried";
		header("location:account_edit.php?address");
	}

	if (count($errors) == 0) {
		$query = "UPDATE `book` SET `address` = '$address', `tel` = '$tel' WHERE `book`.`email` = '$member'";
		if (mysqli_query($conn, $query)) {
			$query = "UPDATE `customer` SET `firstname` = '$firstname', `lastname` = '$lastname' WHERE `customer`.`email` = '$member'";
			$result = mysqli_query($conn, $query);
			header("location:account_edit.php");
		}

	}
}

?>
