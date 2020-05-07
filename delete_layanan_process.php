<?php ob_start();
	include "db.php";
	
	$id = $_GET['items_id'];
    $query = "DELETE FROM layanan WHERE id_layanan='$id'";
	if($conn->query($query)==true){
		echo"<script>alert('Hapus Layanan Berhasil');</script>";
	}
    header('Refresh:0 url=layanan_admin.php');
?>