<?php
	require_once("config.php");

	if(isset($_POST['deal'])){

			$id = $_POST['id'];
			$stock = $_POST['stock'];

			if ($stock > -1) {

				$sql = "UPDATE product SET stock='$stock' WHERE id='$id' ";

				//echo "<img width='200px' src='upload/".$image_name."' class='preview'>";

				$stmt = $db->prepare($sql);

			    // bind parameter ke query
			    $params = array(
			        ":stock"=> $stock
			    );

			    // eksekusi query untuk menyimpan ke database
			    $saved = $stmt->execute($params);

				if($saved)
				header("Location: product-buy-success.php?message=success");
			} else

			header("Location: product-buy-success.php?message=failed");
	}

?>