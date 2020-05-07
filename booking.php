<?php
include 'db.php';
?> 
<?php
$_SESSION['status'] = 0;
?>  
<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="images/4.jpg">
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
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>
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
        <h3>DAFTAR BOOKINGAN ANDA</h3>
      </div>
      <a href="Layanan.php">
      <button class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
       Tambah Bookingan</button></a><hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Layanan</th>
                  <th>Harga</th>
                  <th>Tanggal</th>
                  <th>Waktu Mulai</th>
                  <th>Duraasi(/Jam)</th>
                  <th>Total Harga</th>
                  <th>Catatan Khusus</th>
                  <th>Status</th>
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
  $qget = "SELECT * FROM detail_booking WHERE id_member = $userid";
  $exect = mysqli_query($conn,$qget);
  while($items = mysqli_fetch_array($exect))
  {
    $produk_id = $items['id_layanan'];
    $qprod = "SELECT * FROM layanan WHERE id_layanan = $produk_id";
    $jln = mysqli_query($conn,$qprod);
    while($produk = mysqli_fetch_array($jln))
    {
  ?>

  <?php
    $date = $items['tanggal'];
    $date = date('Y-m-d', strtotime($date));
    $waktu = $items['waktu'];
    $waktu = date('H:i',strtotime($waktu));
  ?>

            <tbody>
              <tr>
                <td><?=$produk['id_layanan']?></td>
                <td><?=$produk['nama']?></td>
                <td>Rp <?=number_format($produk['harga'])?>.00</td>
                <td><?=$date?></td>
                <td><?=$waktu?></td>
                <td><?=$items['durasi']?></td>
                <td>Rp <?=number_format($items['total_booking'])?>.00</td>
                <td><?=$items['catatan_khusus']?></td>
                <td>
                  <?php
                   if ($items['status'] == 0){
                      echo '<span class=text-warning>Menuggu</span>';
                   } elseif ($items['status'] == 1) {
                      echo '<span class=text-success>Diterima</span>';
                    }
                  ?> 
                </td>
                <?php $total = $total + $items['total_booking'];?>
                <td colspan="2">
                  <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-gears"></i></button></a>
                  <!-- Modal -->
                    <div id="myModal" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
               
                          <h3>UPDATE BOOKINGAN</h3>
                          </div>

                          <div class="modal-body">
                            <table class="table">
                              <tr>
                                <td><h4>Nama Layanan</h4></td>
                                <td><h4><?=$produk['nama']?></h4></td>
                              </tr>
                              <tr>
                                <td><h4>Harga Layanan</h4></td>
                                <td><h4>Rp <?=number_format($produk['harga'])?>.00</h4></td>
                              </tr>
                              <tr>
                                <td><h4>Durasi</h4></td>
                                <form action="update_booking.php?cart_id=<?=$items['id_booking']?>" method="post">
                                  <?php
                                  unset($_SESSION['harga']);
                                  $_SESSION['harga'] = $produk['harga'];?>
                                    <td><input type="number" min="1" value="1" class="form-control" name="jumlah"></td>
                                    <tr>
                                      <td><h4>Tanggal</h4></td>
                                      <td>
                                        <input type="text" name="tanggal" class="input-tanggal form-control" id="datepicker" placeholder="yyyy-mm-dd" required>                                       
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Waktu</td>
                                      <td><input type="text" class="input-waktu form-control" name="waktu"></td>
                                    </tr>
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
                  <a href="delete_booking.php?items_id=<?=$items['id_booking']?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
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
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.singlePageNav.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/wow.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.input-tanggal').datepicker();   
      });
    </script>
    <script type="text/javascript">
                $(document).ready(function() {
                    $('.input-waktu').timepicker({
                        showPeriodLabels: false
                    });
                  });
    </script>
  </body>
</html>
