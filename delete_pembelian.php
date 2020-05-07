<?php ob_start();
	include 'db.php';
	$id = $_GET['items_id'];
 	$query = "DELETE FROM detail_booking WHERE id_booking ='$id'";
	$exect = mysqli_query($conn,$query);
  header('location:booking.php?add=1');
?>
