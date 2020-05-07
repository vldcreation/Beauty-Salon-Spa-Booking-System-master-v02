<?php
	ob_start();
	include 'header.php';
	if(!isset($_SESSION['masuk'])){
		echo "<script>alert('Silahkan Login terlebih dahulu untuk melakukan pemesanan')</script>";
    header("location: login.php");
}
$brg=mysqli_query($koneksi, "select * from barang");
$id_barang = $_GET['id_barang'];
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
$data = mysqli_fetch_array($query);
$stock = $_GET['jumlah'];
if (!isset($_SESSION['masuk'])) {
    echo "<script>alert('Anda harus login untuk memesan produk ini!'); window.location = 'login.php'</script>";
} elseif ($stock > $data['qty']) {
    echo "<script>alert('Jumlah melebihi stock!'); window.location = 'keranjang.php?kd=$id_barang'</script>";
} elseif (!isset($_GET['total_harga'])) {
    echo "<script>alert('Anda belum memilih produk!'); window.location = 'produk.php'</script>";
} else {
    $id_user = $_SESSION['id_user'];
}	
?>


<style>
	.hero-unit {
	background: #fff url(img/bg-k10.png);
	border-left: 4px solid brown;
	padding: 13px 13px 13px 15px;
	font-style: italic;
	margin: 20px auto;
	-webkit-border-radius: 0px;
     -moz-border-radius: 0px;
          border-radius: 0px;
	font-size: 14px !important;
}
.unit{
    margin-top: 20px;
}
</style>

	
<?php
	if(isset($_SESSION['masuk'])){
		$id_user = $_SESSION['id_user'];
	}
	$user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id_user") or die(mysqli_error($koneksi));
	$p = mysqli_fetch_array($user);
?>
<div id="wrapper">
    <div class="container">
        <div class="table-responsive">
            <div class="title"><h3>Form Checkout</h3></div>
            <div class="unit">
                <p>Harap isi form ini sesuai dengan tujuan pengiriman</p>
                <p style="font-style: italic;font-weight: bold;">Total Belanja Anda Rp. <?php echo number_format($_GET['total_harga']); ?>,00</p>
            </div> 
            <form id="formku" action="bukti.php" method="POST" enctype="multipart/form-data">
                <table class="table table-condensed">
                    <input type="hidden" name="total_harga" value="<?php echo abs((int) $_GET['total_harga']); ?>">
                    <input type="hidden" name="id_barang" value="<?php echo $_GET['id_barang'] ?>">
                    <input type="hidden" name="jumlah" value="<?php echo $_GET['jumlah'] ?>">
                    <tr>    
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['nama'] ?> </td>  
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $p['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea type="text" name="alamat" placeholder="Masukkan Alamat Anda" style="width: 300px; height: 100px"></textarea></td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><input type="text" name="nohp" placeholder="Masukkan Nomor Telepon" style="width: 240px;"></td>
                    </tr>
                    <tr>
                        <td><a href="index.php" class="btn btn-sm btn-primary">Kembali</a>&nbsp;<input type="submit" value="Pesan Sekarang" name="finish"  class="btn btn-sm btn-primary"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>	
</div>		

<?php
	include 'footer.php';
?>