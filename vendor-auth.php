<?php

session_start();
if(!isset($_SESSION["vendor"])) header("Location: vendor-login.php");

?>
