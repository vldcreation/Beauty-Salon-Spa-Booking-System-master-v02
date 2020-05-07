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
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php
      require_once 'commons/header.php'; 
    ?>
    <section class="product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center><h1>Produk</h1><hr></center>
            <?php
              $query = "SELECT * FROM product";
              $item = mysqli_query($conn, $query);
              while($items = mysqli_fetch_array($item)){
            ?>
            <div class="col-md-3">
             <div class="card">
              <?php echo '<a href="beli_produk.php?items_id='.base64_encode($items['id_product']).'"><img src="images/'.$items['gambar'].'"alt="Avatar" style="width: 100%;height: 250px;" ></a>' ?>
              <h3><?=$items['nama_product']?></h3>
               <p class="price">Rp <?=number_format($items['harga_product'])?>.00</p>
               <h4><b>Stock : <?=$items['stock']?></b></h4>
               <p><a href="beli_produk.php?items_id=<?=base64_encode($items['id_product'])?>"><button><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbspBeli</button></a></p>
            </div>
            </div>
          <?php }; ?>
          </div>
        </div>
      </div>
    </section><hr>
    <?php
      require_once 'commons/footer.php';
    ?>
</body>
</html>
