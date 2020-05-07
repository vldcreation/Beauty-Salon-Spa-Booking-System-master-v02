<?php
session_start();
  include 'db.php';
  $itemId = $_GET['cart_id'];
  $jumlah = $_POST['jumlah'];
  $tanggal =$_POST['tanggal'];
  $waktu = $_POST['waktu'];
  if(!isset($_SESSION['harga']))
  {
    echo "fak";
  }
  else {


  $harga = $_SESSION['harga'];
  $total = $jumlah * $harga;
  $query = "UPDATE detail_booking SET tanggal='$tanggal',waktu='$waktu',durasi='$jumlah', total_booking ='$total' WHERE id_booking = $itemId";
  $exe = mysqli_query($conn,$query);
  unset($_SESSION['harga']);
  header('Location:booking.php?add=1');
}
?>
