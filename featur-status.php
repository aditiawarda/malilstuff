<?php

require_once("config.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['status'])){

    // filter data yang diinputkan
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $dt = date('Y-m-d H:i:s',time());
    $testi = filter_input(INPUT_POST, 'testi', FILTER_SANITIZE_STRING);

    if (empty($testi)) {

         header("Location: user-profile.php?message=failed");

    } else {
    // menyiapkan query
    $sql = "INSERT INTO testimoni (fullname, dt, testi) 
            VALUES (:fullname, :dt, :testi)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":fullname" => $fullname,
        ":dt" => $dt,
        ":testi" => $testi
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) 
    header("Location: user-profile.php");
    header("Location: user-profile.php?message=success");
}
}
?>