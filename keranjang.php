<?php
  include 'db.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Dashboard</title>
	  <link rel="shortcut icon" href="images/4.jpg">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	  <link rel="stylesheet" href="css/animate.css">
	  <link rel="stylesheet" href="css/jquery.bxslider.css">
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
<?php
   include 'commons/header.php';
?>

<style>
</style>
	<div id="page-title" style="margin-top: 50px; background: grey;border-bottom: 5px solid grey;">
	            <h2 style="margin-left:20px;"><i class="ico-shopping-cart ico-white"></i>Keranjang</h2>
	        </div>
	    

  <div class="container">
	<div class="check">	 
		<div class="col-md-9 cart-items" style="margin-top: -40px;">
                    <ul class="back" style="text-align: center;">
                	  <li style="font-size: 16px; margin-left: -13px;"><i class="back_arrow"> </i>Pesan lagi di<a href="produk.php" style="color: purple;"> Halaman Produk</a></li>
                    </ul>
			            
                        <?php
                $total = 0;
                if (isset($_SESSION['items'])) {
                    foreach ($_SESSION['items'] as $key => $val) {
                        $query = mysqli_query($conn, "SELECT * FROM product WHERE id_product = '$key'");
                        $data = mysqli_fetch_array($query);
                        $jumlah_harga = $data['harga'] * $val;
                        $total += $jumlah_harga;
                        $produk = $data['id_product'];
                        $jumlah = $val;
                        if (isset($_SESSION['username'])) {
                            $id_user = $_SESSION['id_member'];
                            $nama = $_SESSION['nama'];
                        }
                        ?>
			 <div class="cart-header">
                             <a onclick="if(confirm('Apakah anda yakin ingin menghapus pesanan ini ??')){ 
                             	location.href='tambahkanbarang.php?act=del&amp;id_product=<?php echo $key; ?>&amp;ref=keranjang.php';}"><div class="close1"> </div></a>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
                                                    <img src="images/<?=$data['gambar']?>" class="img-responsive" alt="" style="height: 190px; width: 170px;"/>
						</div>
					   <div class="cart-item-info">
                                               <h3><a href="beli_produk.php?id=<?=$data['id_product']?>"><h3><?=$data['nama']?>
						<ul class="qty">
							<li><h3>Jumlah : <?=$jumlah?></h3></li>
                                                        <li><a href="tambahkanbarang.php?act=min&amp;id_product=<?php echo $key; ?>&amp;ref=keranjang.php" class='btn btn-danger'>Kurang</a></li>
                                                        <li><a href="tambahkanbarang.php?act=plus&amp;id_product=<?php echo $key; ?>&amp;ref=keranjang.php" class='btn btn-success'>Tambah</a></li>
						</ul>	
						<div class="delivery">
                                                    <h3><p> Rp. <?= number_format($jumlah_harga, 2, ",", ".")?></p></h3>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>	
                         <?php
                        }
                    }
                  ?>
		 </div>
		 <div class="col-md-5 cart-total">
				 <div class="price-details" style="font-size: 20px;">
				 <h3>Detail Harga</h3>
				 <span>Total</span>
                                 <span class="total1">Rp. <?= number_format($total, 2, ",", ".")?></span>
				 <span>Diskon</span>
				 <span class="total1">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4 style="font-size: 15px;">TOTAL</h4></li>	
                           <li class="last_price"><span style="font-size: 15px;">Rp. <?= number_format($total, 2, ",", ".")?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
		 <a class="continue" href="pembayaran.php?total_harga=<?=$total?>&jumlah=<?=$jumlah?>&id_product<?=$produk?>">Continue</a>
			</div>
	 </div>
</div>

<?php
	include 'commons/footer.php';
?>
</body>
</html>