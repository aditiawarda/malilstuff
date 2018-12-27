<?php
	require_once("config.php");

	if(isset($_POST['register'])){

		if(isset($_POST) && !empty($_FILES['image']['name'])){
			$name = $_FILES['image']['name'];
			$vendorname = filter_input(INPUT_POST, 'vendorname', FILTER_SANITIZE_STRING);
	    	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	    	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

			list($txt, $ext) = explode(".", $name);
			$image_name = time().".".$ext;
			$tmp = $_FILES['image']['tmp_name'];

			if(move_uploaded_file($tmp, 'vendor/'.$image_name)){
				$sql = "INSERT INTO vendors (image, vendorname, username, password, email)
				VALUES (:image, :vendorname, :username, :password, :email)";
				//echo "<img width='200px' src='upload/".$image_name."' class='preview'>";

				$stmt = $db->prepare($sql);

			    // bind parameter ke query
			    $params = array(
			        ":image"=> $image_name, 
			        ":vendorname"=> $vendorname,
			        ":username"=> $username,
			        ":password"=> $password,
			        ":email"=> $email
			    );

			    // eksekusi query untuk menyimpan ke database
			    $saved = $stmt->execute($params);

			     if($saved) {
				    header("Location: vendor-login.php");
				    header("Location: vendor-login.php?message=success-regist");			
				}
			}
		}
	}
?>
