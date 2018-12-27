<?php
	require_once("config.php");
	date_default_timezone_set("Asia/Jakarta");

	if(isset($_POST) && !empty($_FILES['image']['name'])){
		$name = $_FILES['image']['name'];
		$productname = $_POST['productname'];
		$vendor_id = $_POST['vendor_id'];
		$vendorname = $_POST['vendorname'];
		$stock = $_POST['stock'];
		$price = $_POST['price'];
		$promovalue = $_POST['promovalue'];
		$description = $_POST['description'];
		$efficacy = $_POST['efficacy'];
		$phone = $_POST['phone'];
		$dt = date('Y-m-d H:i:s',time());

		list($txt, $ext) = explode(".", $name);
		$image_name = time().".".$ext;
		$tmp = $_FILES['image']['tmp_name'];

		if(move_uploaded_file($tmp, 'product/'.$image_name)){
			$sql = "INSERT INTO product (image, productname, vendor_id, vendorname, stock, price, promovalue, description, efficacy, phone, dt)
			VALUES (:image, :productname, :vendor_id, :vendorname, :stock, :price, :promovalue, :description, :efficacy, :phone, :dt)";
			//echo "<img width='200px' src='upload/".$image_name."' class='preview'>";

			$stmt = $db->prepare($sql);

		    // bind parameter ke query
		    $params = array(
		        ":image"=> $image_name, 
		        ":productname"=> $productname,
		        ":vendor_id"=> $vendor_id,
		        ":vendorname"=> $vendorname,
		        ":stock"=> $stock,
		        ":price"=> $price,
		        ":promovalue"=> $promovalue,
				":description"=> $description,
				":efficacy"=> $efficacy,
				":phone"=> $phone,
				":dt"=> $dt
		    );

		    // eksekusi query untuk menyimpan ke database
		    $saved = $stmt->execute($params);


		}else{
		 header("Location: vendor-profile.php?message=failed");
		}
		 header("Location: vendor-profile.php?message=success");
	}
?>