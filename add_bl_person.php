<?php 
session_start();

include("db.php"); 


if (isset($_POST['phone_bl'])) {
	$phone_black_listed = $_POST['phone_bl'];

	$description = $_POST['comment']; 
	$date = date("Y-m-d"); 
	// $description = utf8_encode($description);
	$query = "INSERT INTO records(phone, description, date_added) VALUES ('$phone_black_listed ', '$description ', '$date ')"; 
	$query_new_phone = mysqli_query($connection, $query); 
	
	if (!$query_new_phone) {
		die("query failed"); 
	}

	$_SESSION["msg"]='Добавлена запись в черный список';
	header("Location: index.php");
	exit(); 
	 
}
 ?>
