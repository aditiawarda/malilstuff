<?php
    require_once("config.php");
    date_default_timezone_set("Asia/Jakarta");

    if(isset($_POST['buy'])){
		$dt = date('Y-m-d H:i:s',time());
        $user_id = $_POST['user_id'];
        $fullname = $_POST['fullname'];
		$vendor_id = $_POST['vendor_id'];
        $vendorname = $_POST['vendorname'];
        $product_id = $_POST['product_id'];
        $productname = $_POST['productname'];
		$price = $_POST['price'];
		$promovalue = $_POST['promovalue'];


			$sql = "INSERT INTO transactions (dt, user_id, fullname, vendor_id, vendorname, product_id, productname, price, promovalue)
			VALUES (:dt, :user_id, :fullname, :vendor_id, :vendorname, :product_id, :productname, :price, :promovalue)";
			//echo "<img width='200px' src='upload/".$image_name."' class='preview'>";

			$stmt = $db->prepare($sql);

		    // bind parameter ke query
		    $params = array(
                ":dt"=> $dt, 
                ":user_id"=> $user_id,
		        ":fullname"=> $fullname,
                ":vendor_id"=> $vendor_id,
                ":vendorname"=> $vendorname,
                ":product_id"=> $product_id,
		        ":productname"=> $productname,
		        ":price"=> $price,
		        ":promovalue"=> $promovalue
		    );

		    // eksekusi query untuk menyimpan ke database
		    $saved = $stmt->execute($params);
            if($saved)
            header("Location: product-buy-view.php?message=success");

        }
         
?>