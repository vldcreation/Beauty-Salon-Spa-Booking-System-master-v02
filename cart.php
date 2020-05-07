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
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

  <!--Header-->
  <?php
    include 'commons/header.php';
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="about">
            <div class="panel panel-heading">
        <h3>KERANJANG BELANJA ANDA</h3>
      </div>
      <a href="Product.php">
      <button class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
       Tambah Product</button></a><hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                  <th>Catatan Khusus</th>
                  <th>Operasi</th>
                </tr>
              </thead>
<?php
if(isset($_SESSION['is_logged_in']))
{
include 'db.php';
$userid = $_SESSION['id'];
$total = 0;
if(isset($_GET['add']) && isset($_SESSION['is_logged_in']))
{
  $qget = "SELECT * FROM detail_pembelian WHERE id_member = $userid";
  $exect = mysqli_query($conn,$qget);
  while($items = mysqli_fetch_array($exect))
  {
    $produk_id = $items['id_product'];
    $qprod = "SELECT * FROM product WHERE id_product = $produk_id";
    $jln = mysqli_query($conn,$qprod);
    while($produk = mysqli_fetch_array($jln))
    {
  ?>

            <tbody>
              <tr>
                <td><?=$produk['id_product']?></td>
                <td><?=$produk['nama']?></td>
                <td>Rp <?=number_format($produk['harga'])?>.00</td>
                <td><?=$items['jumlah_product']?></td>
                <td>Rp <?=number_format($items['total_pembelian'])?>.00</td>
                <td><?=$items['catatan_khusus']?></td>
                <?php $total = $total + $items['total_pembelian'];?>
                <td colspan="2">
                  <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-gears"></i></button></a>
                  <!-- Modal -->
                    <div id="myModal" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
               
                          <h3>UPDATE BELANJA</h3>
                          </div>

                          <div class="modal-body">
                            <table class="table">
                              <tr>
                                <td><h4>Nama Produk</h4></td>
                                <td><h4><?=$produk['nama']?></h4></td>
                              </tr>
                              <tr>
                                <td><h4>Harga Produk</h4></td>
                                <td><h4>Rp <?=number_format($produk['harga'])?>.00</h4></td>
                              </tr>
                              <tr>
                                <td> <h4>Jumlah Produk</h4></td>
                                <form action="update_cart.php?cart_id=<?=$items['id_pembelian']?>" method="post">
                                  <?php
                                  unset($_SESSION['harga']);
                                  $_SESSION['harga'] = $produk['harga'];?>
                                <td><input type="number" min="1" value="1" class="form-control" name="jumlah"></td>
                                <tr>
                                  <td></td>
                                  <td><input type="submit" class="btn btn-primary" value="Update"></td>
                                </tr>
                                </form>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- /Modal -->
                  <a href="delete_cart.php?items_id=<?=$items['id_pembelian']?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
              </tr>
            </tbody>

<?php
  };
};
};
$_SESSION['total_harga'] = $total;
?>
</table>
</div>
</div>
<center>
  <button class="btn btn-success btn-lg"  data-toggle="modal" data-target="#myModal2"><i class="fa fa-share"></i> Lanjutkan</button>
</center><br>
  <!-- Modal -->
    <div id="myModal2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
      <h3>DATA PENGIRIMAN</h3>
          </div>

          <div class="modal-body">
            <form action="prbli.php?trans=1" method="post">
              <h3>Nama</h3>
              <h3><input type="text" name="identitas" class="form-control"  required></h3>
              <h3>Alamat</h3>
              <input type="text" name="alamat"  class="form-control"  required>
              <h3>Tujuan</h3>
              <input type="text" name="tujuan"  class="form-control"  required>
              <h3>Nomor Telepon</h3>
              <h3><input type="text" name="no_telp" class="form-control"  required></h3>
              <h5><input type="checkbox" required> Saya yakin ingin melakukan transaksi</h5><br>
              <center>
                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-share"></i> Lanjutkan</button>
              </center>
           </form>
          </div>
        </div>
      </div>
    </div>
  <!-- /Modal -->
</div>
</div> 
<?php
};
if(!isset($_SESSION['is_logged_in'])) {
 header('Location:LoginMember.php');
};
?>
  
  <?php
    include 'commons/footer.php';
  ?> 
    <!-- Scroll Up Button -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.singlePageNav.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>
  </body>
</html>
