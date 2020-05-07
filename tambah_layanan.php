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
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<!-- Heaader-->
		<?php	
			include 'commons/header_admin.php';
		?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product">
							<h3 align="right">Tambah Layanan</h3><hr class="pg-titl-bdr-bte"></hr>

							<form action="tambah_layanan_process.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<p>Nama Layanan</p>
									<input type="text" name="nama" class="form-control" required />
								</div>
								<div class="form-group">
									<p>Harga Layanan</p>
									<input type="text" name="harga" class="form-control" required />
								</div>
								<div class="form-group">
									<p>Gambar</p>
									<input type="file" name="gambar" accept="img/*" class="btn btn-primary">
								</div>
								<div class="text-center"><button name="tambah" type="submit" class="btn btn-komentar btn-lg">Tambah</button></div>
							</form>

						</div>
					</div>
				</div>
			</div>
			<!-- Footer-->
		<a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>
</html>
