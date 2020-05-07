<?php ob_start();
	include "db.php";
	
	$id = $_GET['items_id'];
    $query = "DELETE FROM product WHERE id_product='$id'";
	if($conn->query($query)==true){
		echo"<script>alert('Hapus Layanan Berhasil');</script>";
	}
    header('Refresh:0 url=produk_admin.php');
?>