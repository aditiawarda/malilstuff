<?php
	include("config.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	mysqli_query($config,"update users set name='$name', gender='$gender', username='$username', email='$email', password='$password'  where id='$id'");

	header("location:user-profile.php");
?>