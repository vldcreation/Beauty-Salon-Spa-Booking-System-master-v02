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
			require_once 'commons/header.php'; 
		?>
		<div class="main-slider">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: -20px;">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
		      <div class="item active">
		        <img src="images/cor4.jpg" alt="Image" >
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
						<div class="flex-caption">
							<h4>MARIA BEAUTY SALON & SPA</h4>
							<p>Melayani dengan sepenuh hati</p>
						</div>
					</div> 
		      </div>

		      <div class="item">
		        <img src="images/cor2.jpg" alt="Image">
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
						<div class="flex-caption">
							<h4>MARIA BEAUTY SALON & SPA</h4>
							<p>Spa dengan tenaga ahli profesional</p>
						</div>
					</div>    
		      </div>

		      <div class="item">
		        <img src="images/cor3.jpg" alt="Image">
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
						<div class="flex-caption">
							<h4>MARIA BEAUTY SALON & SPA</h4>
							<p>Alat-alat yang lengkap dan Fasilitas yang memadahi</p>
						</div>
					</div>   
		      </div>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		</div>
		</div>
		
	 	<div class="container" style="margin-top: 1%;">    
          <section class="main-produk">
            <div class="container">
              <div class="row">
	              <h3>Layanan</h3><hr class="pg-titl-bdr-btms"></hr>
              <?php
                $query = "SELECT * FROM layanan";
                $item = mysqli_query($conn, $query);
                $no = 1;
                while($items = mysqli_fetch_array($item)){
                  if($no == 4){
                    echo'
                    <div class="col-md-3">
	                    <div class="card">
						  <a href="booking_layanan.php?items_id='.base64_encode($items['id_layanan']).'">
						  <img src="images/'.$items['gambar'].'"  alt="Avatar" style="width: 100%;height: 250px;"></a>
						  <h3>'.$items['nama'].'</h3>
						  <p class="price">Rp '.number_format($items['harga']).'.00</b></p>						  
						  <a href="booking_layanan.php?items_id='.base64_encode($items['id_layanan']).'"><button><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbspBooking</button></a>
						</div>
					</div>';
                      break;
                  }else{
                    echo'
                    <div class="col-md-3">
	                    <div class="card">
						  <a href="booking_layanan.php?items_id='.base64_encode($items['id_layanan']).'"><img src="images/'.$items['gambar'].'"  alt="Avatar" style="width: 100%;height: 250px;"></a>
						  <h3>'.$items['nama'].'</h3>
						  <p class="price">Rp '.number_format($items['harga']).'.00</b></p>						  
						  <a href="booking_layanan.php?items_id='.base64_encode($items['id_layanan']).'"><button><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbspBooking</button></a>
						</div>
					</div>';
                  }
                  $no++;
              ?>

                <?php }; ?>
              </div>
              <br>
              <center><p><a href="layanan.php"><button class="more">More &raquo</button></a></p></center>
            </div>
          </section><hr>
          
          <section class="main-produk">
            <div class="container">
              <div class="row">
              <h3>Produk</h3><hr class="pg-titl-bdr-btms"></hr>
              <?php
                $query = "SELECT * FROM product";
                $item = mysqli_query($conn, $query);
                $no = 1;
                while($items = mysqli_fetch_array($item)){
                  if($no == 4){
                    echo'
                    <div class="col-md-3">
	                    <div class="card">
						  <a href="beli_produk.php?items_id='.base64_encode($items['id_product']).'"><img src="images/'.$items['gambar'].'"  alt="Avatar" style="width: 100%;height: 250px;"></a>
						  <h3>'.$items['nama'].'</h3>
						  <p class="price">Rp '.number_format($items['harga']).'.00</b></p>
						  <h3>'.$items['stock'].'</h3>
						   <a href="beli_produk.php?items_id='.base64_encode($items['id_product']).'"><button><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbspBeli</button></a>
						</div>
					</div>';
                      break;
                  }else{
                    echo'
                    <div class="col-md-3">
	                    <div class="card">
						  <a href="beli_produk.php?items_id='.base64_encode($items['id_product']).'"><img src="images/'.$items['gambar'].'"  alt="Avatar" style="width: 100%;height: 250px;"></a>
						  <h3>'.$items['nama_product'].'</h3>
						  <p class="price">Rp '.number_format($items['harga_product']).'.00</b></p>
						  <h3>'.$items['stock'].'</h3>
						  <a href="beli_produk.php?items_id='.base64_encode($items['id_product']).'"><button><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbspBeli</button></a>
						</div>
					</div>';
                  }
                  $no++;
              ?>

                <?php }; ?>
              </div>
              <br>
              <center><p><a href="layanan.php"><button class="more">More &raquo</button></a></p></center>
            </div>
          </section><hr>
      	</div>
          <section class="box">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.4s">
							<div class="services">
								<div class="icons">
									<a href="aboutPengiriman.php"><i class="fa fa-plane fa-2x" aria-hidden="true"></i></a>
								</div><br>
								<h4><b>PENGIRIMAN</b></h4>
								<p>
									Menyediakan produk perlengkapan salon & bahan-bahan perawatan tubuh yang siap untuk dikirimkan
									keseluruh wilayah Indonesia.
								</p>
							</div>
						</div>
						<hr>
					</div>
					<div class="col-md-4">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.8s">
							<div class="services">
								<div class="icons">
									<a href="AboutDeveloper.php"><i class="fa fa-users fa-2x" aria-hidden="true"></i></i></a>
								</div><br>
								<h4><b>DEVELOPER</b></h4>
								<p>
									Website ini dibuat oleh Mahasiswa Institut teeknologi del
									jurausan D3 Teknik Informatika 2018 Fakultas Tenik informatika dan Elektro.
								</p>
							</div>
						</div>
						<hr>
					</div>
					<div class="col-md-4">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.2s">
							<div class="services">
								<div class="icons">
									<a href="AboutMaria.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
								</div><br>
								<h4><b>MARIA BEAUTY SALON & SPA</b></h4>
								<p>
									Produk yang disediakan merupakan bahan original
									yang kualitasnya terjamin.
								</p>
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</section>

		<?php
			require_once 'commons/footer.php';
		?>
		<a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.singlePageNav.js"></script>
		<script src="js/jquery.flexslider.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/wow.min.js"></script>
		<script>wow = new WOW({}).init();</script>
		<script>
			$('.carousel').carousel({			//Waktu Carousel
				interval: 3000
			})
		</script>
	</body>
</html>
