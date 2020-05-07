<?php
	include 'commons/header.php'; 
	include 'db.php';
	$itemId = $_SESSION['item_id'];
	$userid = $_SESSION['id'];
	$status = $_SESSION['status'];
	$jumlah = $_POST['jumlah'];
	$catatan_khusus = $_POST['catatan_khusus'];
	$tanggal = $_POST['tanggal'];
	$tanggal = date('Y-m-d	', strtotime($tanggal));
	$waktu = $_POST['waktu'];
	$waktu = date('H:i',strtotime($waktu));
	
	$qgetcart = "SELECT * FROM detail_booking WHERE id_member = '$userid'";
	$goq = mysqli_query($conn,$qgetcart);
	$cart =mysqli_fetch_array($goq);
	if($itemId == $cart['id_layanan'])
	{
		$idcart = $cart['id_layanan'];
		$jum = $cart['durasi'];
		$jumak = $jumlah+$jum;
		$qup = "UPDATE detail_booking SET durasi='$jumak' WHERE id_pembelian = '$idcart'";
		$goqup = mysqli_query($conn,$qup);
	}
	else
	{
	$query = "SELECT * FROM layanan WHERE id_layanan = $itemId";
	$exect = mysqli_query($conn,$query);
	$items = mysqli_fetch_array($exect);
	$total = $jumlah * $items['harga'];
	$add = "INSERT INTO detail_booking VALUES(NULL,'$userid','$itemId','$tanggal','$waktu','$jumlah','$total', '$catatan_khusus','$status')";
	$addto = mysqli_query($conn, $add);
	}
	header('Location:booking.php?add=1');
?>
