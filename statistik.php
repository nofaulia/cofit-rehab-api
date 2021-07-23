<?php

header("Content-Type:application/json");
include('connection.php');

if (isset($_GET['startdate']) && isset($_GET['enddate']) && 
	$_GET['enddate']!="" && $_GET['enddate']!="") {

	$startdate = $_GET['startdate'];
	$enddate = $_GET['enddate'];
	
	$query = "SELECT * FROM `latihan_pasien` WHERE tanggal>='$startdate' AND tanggal<='$enddate'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$customerData['id'] = $row['id'];
	$customerData['nama'] = $row['nama'];
	$customerData['kode'] = $row['kode'];
	$customerData['email'] = $row['email'];
	
	$response["status"] = "true";	
	$response["message"] = "Customer Details";
	$response["customers"] = $customerData;
	
} else{
	$response["status"] = "false";
	$response["message"] = "No customer(s) found!";
}

echo json_encode($response); exit;
