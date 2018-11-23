<?php
	
	$db_connection = mysqli_connect("localhost", "root", "", "mobile_db");
	$purchase_ID = $_POST['purchaseID'];

	$query = "SELECT cell_phone_brand, cell_phone_model FROM new_purchase WHERE purchase_id = '$purchase_ID'";

	$result = mysqli_query($db_connection, $query);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row);	
?>