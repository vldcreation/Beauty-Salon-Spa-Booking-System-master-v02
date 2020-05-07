<?php
	include 'db.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Produk</title>
	  <link rel="shortcut icon" href="images/4.jpg">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<!-- Heaader-->
		<?php
			include 'commons/header_admin.php';
		?>
		<section class="product">
			<div class="container">
				<div class="row">
					<h3>Daftar Produk Maria Beuaty Salon & Spa</h3><hr class="pg-titl-bdr-btad"></hr>
					<a href="tambah_produk.php">
						<button class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Tambah Produk</button>
					</a><hr>
					<div class="col-md-12">
					<?php
					$query = "SELECT * FROM product";
					$item = mysqli_query($conn, $query);
					while($items = mysqli_fetch_array($item)){
					?>
					<div class="col-md-3">
						 <div class="card">
						  <a href="#"><img src="images/<?=$items['gambar']?>" class="img-thumbnail" alt="Avatar" style="width: 100%;height: 250px;"></a>
							<h3 style="margin-top: 5px;"><b><?=$items['nama_product']?></b></h3>
							<h4>Rp <?=number_format($items['harga_product'])?>.00</h4>
							<h4>Stock <?=$items['stock']?></h4><br>
						</div>
					<center><br>
						<a href="update_produk.php?items_id=<?=$items['id_product']?>"><button class="btn btn-primary">Edit</button></a>
						<a href="delete_produk_process.php?items_id=<?= $items['id_product']?>"><button class="btn btn-danger">Hapus</button></a>
					</center><br>
					</div>
					<?php }; ?>
					</div>
				</div>
			</div>
		</section><hr>

		<!-- Footer-->
		<?php
			include 'commons/footer.php';
		?>
	</body>
</html>
