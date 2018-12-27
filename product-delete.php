<?php

require_once("config.php");

$id = $_GET['id'];

    // menyiapkan query
    $sql = "DELETE FROM product where id='$id'";

    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":id" => $id
    );

    // eksekusi query untuk menyimpan ke database
    $deleted = $stmt->execute($params);


    if ($deleted) {
    header('location: product-view.php?message=success-delete');
    }
?>