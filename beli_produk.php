<?php
  include 'db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Detail Product</title>
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
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>

    <style>
      .card1 img{
      height: 100%;
      width: 100%;
      border-radius: 5px;
    }
    .pesan{
      display:block;
      margin: 0 0 0 0;
      background: #f2f2f2;
      width:100%;
      padding:20px;
      border-radius:5px;
    }      
    </style>    
  </head>
  <body>
    <?php
      include 'commons/header.php';
    ?>
    <?php
        $sid = session_id();
        unset($_SESSION['item_id']);
        
        $idProdukDec =  base64_decode($itemId = $_GET['items_id']);

        
        $query = "SELECT * FROM product WHERE id_product = $idProdukDec";
        $exect = mysqli_query($conn,$query);
        $items = mysqli_fetch_array($exect);
        $_SESSION['item_id'] = $idProdukDec;
    ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card1">
        <?php echo '<img src="images/'.$items['gambar'].'"alt="Avatar" class="img-responsive">' ?>
      </div>
    </div>
  
  
    <div class="col-md-6">
      <div class="pesan">
        <h3><b>Nama Produk</b></h3>
        <h4><?=$items['nama']?></h4>
        <h3><b>Harga Produk</b></h3>
        <h4>Rp <?=number_format($items['harga'])?>.00</h4>
        <h3><b>Stock</b></h3>
        <h4><?=$items['stock']?></h4>
      <br>
    </div>

      <?php
        $idCart = base64_encode(1);
      ?>

      <form action="add_to_cart_process.php?add=1" method="post" role="form">
        <div class="form-group">
          <br><p>Jumlah Pesanana</p>
          <input type="number" min="1" max="<?=$items['stock']?>" name="jumlah" value="1" class="form-control" required />
        </div>
        <br>
        <div class="text-center"><button type="submit" class="btn btn-komentar btn-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah ke keranjang</button></div>

    </div>
  </div><br>

    <p>Catatan Khusus <font color="red">*</font></p>
    <textarea name="catatan_khusus" class="form-control" rows="7" placeholder="ketik disini.."></textarea><br>
   </form>
  </div>



<br>
<?php
  include 'commons/footer.php';
?>

<!-- Scroll Up Button -->
<a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>
</body>
</html>
