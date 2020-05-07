<?php ob_start();

	include 'db.php';
	$id = $_GET['items_id'];
  $query = "DELETE FROM detail_pembelian WHERE id_pembelian ='$id'";
	$exect = mysqli_query($conn,$query);
  header('location:cart.php?add=1');
?>
