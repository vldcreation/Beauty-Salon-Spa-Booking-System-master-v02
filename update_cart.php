<?php
session_start();
  include 'db.php';
  $itemId = $_GET['cart_id'];
  $jumlah = $_POST['jumlah'];
  if(!isset($_SESSION['harga']))
  {
    echo "fak";
  }
  else {


  $harga = $_SESSION['harga'];
  $total = $jumlah * $harga;
  $query = "UPDATE detail_pembelian SET jumlah_product='$jumlah', total_pembelian ='$total' WHERE id_pembelian = $itemId";
  $exe = mysqli_query($conn,$query);
  unset($_SESSION['harga']);
  header('Location:cart.php?add=1');
}
?>
