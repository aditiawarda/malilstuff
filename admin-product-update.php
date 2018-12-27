<?php
	require_once("config.php");

	if(isset($_POST['update'])){

		if(isset($_POST) && !empty($_FILES['image']['name'])){
			$id = $_POST['id'];
			$name = $_FILES['image']['name'];
			$productname = $_POST['productname'];
			$vendor_id = $_POST['vendor_id'];
			$vendorname = $_POST['vendorname'];
			$stock = $_POST['stock'];
			$price = $_POST['price'];
			$promovalue = $_POST['promovalue'];
			$description = $_POST['description'];
			$efficacy = $_POST['efficacy'];

			list($txt, $ext) = explode(".", $name);
			$image_name = time().".".$ext;
			$tmp = $_FILES['image']['tmp_name'];

			if(move_uploaded_file($tmp, 'product/'.$image_name)){

				$sql = "UPDATE product SET image='$image_name', productname='$productname', vendor_id='$vendor_id', vendorname='$vendorname', stock='$stock', price='$price', promovalue='$promovalue', description='$description', efficacy='$efficacy' WHERE id='$id' ";

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
					":efficacy"=> $efficacy
			    );

			    // eksekusi query untuk menyimpan ke database
			    $saved = $stmt->execute($params);

				if($saved)
	    		header("Location: admin-product.php?message=success-update");
  			
			}
		}
	}
?>