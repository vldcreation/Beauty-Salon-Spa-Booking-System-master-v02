<?php
	include 'commons/header.php'; 
	include 'db.php';
	$itemId = $_SESSION['item_id'];
	$userid = $_SESSION['id'];
	$status = $_SESSION['status'];
	$jumlah = $_POST['jumlah'];
	$catatan_khusus = $_POST['catatan_khusus'];
	
	$qgetcart = "SELECT * FROM detail_pembelian WHERE id_member = '$userid'";
	$goq = mysqli_query($conn,$qgetcart);
	$cart =mysqli_fetch_array($goq);
	if($itemId == $cart['id_product'])
	{
		$idcart = $cart['id_pembelian'];
		$jum = $cart['jumlah_product'];
		$jumak = $jumlah+$jum;
		$qup = "UPDATE detail_pembelian SET jumlah_product='$jumak' WHERE id_pembelian = '$idcart'";
		$goqup = mysqli_query($conn,$qup);
	}
	else
	{
	$query = "SELECT * FROM product WHERE id_product = $itemId";
	$exect = mysqli_query($conn,$query);
	$items = mysqli_fetch_array($exect);
	$total = $jumlah * $items['harga'];
	$add = "INSERT INTO detail_pembelian VALUES(NULL,'$userid','$itemId','$jumlah','$total', '$catatan_khusus')";
	$addto = mysqli_query($conn, $add);
	}
	header('Location:cart.php?add=1');
?>
