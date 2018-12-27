<?php

require_once("config.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['detect'])){

    // filter data yang diinputkan
    $dt = date('Y-m-d H:i:s',time());
    $fullname = $_POST['fullname'];
    $user_id = $_POST['user_id'];
    $type = $_POST['type'];
    $tone = $_POST['tone'];
    $undertone = $_POST['undertone'];

    $concern_acne = $_POST['concern_acne'];
    $concern_acne_scars = $_POST['concern_acne_scars'];
    $concern_black_white_heads = $_POST['concern_black_white_heads'];
    $concern_large_pores = $_POST['concern_large_pores'];
    $concern_dullness_skin = $_POST['concern_dullness_skin'];
    $concern_wrinkles = $_POST['concern_wrinkles'];

    // menyiapkan query
    $sql = "INSERT INTO skin (dt, fullname, user_id, type, tone, undertone, concern_acne, concern_acne_scars, concern_black_white_heads, concern_large_pores, concern_dullness_skin, concern_wrinkles) 
            VALUES (:dt, :fullname, :user_id, :type, :tone, :undertone, :concern_acne, :concern_acne_scars, :concern_black_white_heads, :concern_large_pores, :concern_dullness_skin, :concern_wrinkles)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":dt"=> $dt,
        ":fullname"=> $fullname, 
        ":user_id"=> $user_id,
        ":type"=> $type,
        ":tone"=> $tone,
        ":undertone"=> $undertone,
        ":concern_acne"=> $concern_acne,
        ":concern_acne_scars"=> $concern_acne_scars,
        ":concern_black_white_heads"=> $concern_black_white_heads,
        ":concern_large_pores"=> $concern_large_pores,
        ":concern_dullness_skin"=> $concern_dullness_skin,
        ":concern_wrinkles"=> $concern_wrinkles
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) 
    header("Location: featur-skin-detection.php?message=success");
}

?>