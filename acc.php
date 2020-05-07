<?php
// koneksi database
include 'db.php';
 
// menangkap data yang di kirim dari form
$no = $_GET['items_id'];
// update data ke database

mysqli_query($conn,"UPDATE detail_booking SET status='1' WHERE id_booking='$no'");
// mengalihkan halaman kembali ke loker.php
 header("Location:daftar_booking.php");
 
?>