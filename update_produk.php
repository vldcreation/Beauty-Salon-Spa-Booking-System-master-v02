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
		<?php 
			$id = $_GET['items_id'];
			
			$show = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id'");
			
			if(mysqli_num_rows($show)==0){
				echo '<script>window.history.back()</script>';
			}else{
				$data = mysqli_fetch_array($show);
			}
		?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product">
						
							<h3>Edit Produk</h3><hr class="pg-titl-bdr-bte"></hr>
							
							<form action="update_produk_process.php?id_product=<?php echo $id ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<p>Nama Produk</p>
									<input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" required />
								</div>
								<div class="form-group">
									<p>Harga Produk</p>
									<input type="number" name="harga" value="Rp <?php echo number_format($data['harga']) ?>.00" class="form-control" required />
								</div>
								<div class="form-group">
									<p>Jumlah Stok</p>
									<input type="number" min="0" name="stock" value="<?php echo $data['stock'] ?>" class="form-control" required />
								</div>
								<div class="form-group">
									<p>Gambar</p>
									<input type="file" name="gambar" accept="img/*"class="btn btn-primary"/>
								</div>
								<div class="text-center"><button name="edit" type="submit" class="btn btn-komentar btn-lg">Edit</button></div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
			<!-- Footer-->
		<?php
			include 'commons/footer.php';		?>

		<!-- Scroll Up Button -->
		<a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-3.1.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>