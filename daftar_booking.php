
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
    <?php
        include 'commons/header_admin.php';
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="about">
            <div class="panel panel-heading">
              <h3>Daftar Keranjang</h3>
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id_Booking</th>
                  <th>Id_Member</th>
                  <th>Id_Product</th>
                  <th>Tanggal</th>
                  <th>Waktu Mulai</th>
                  <th>Duraasi(/Jam)</th>
                  <th>Total Booking</th>
                  <th>Catatan Khusus</th>
                  <th>Status</th>
                  <th>Operasi</th>
                </tr>
              </thead>
    <?php 
    include 'db.php';
    $data = mysqli_query($conn,"SELECT * FROM  detail_booking");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tbody>
      <tr>
        <td><?php echo $d['id_booking'] ?></td>
        <td><?php echo $d['id_member'] ?></td>
        <td><?php echo $d['id_layanan'] ?></td>
        <td><?php echo $d['tanggal']; ?></td>
        <td><?php echo $d['waktu']; ?></td>
        <td><?php echo $d['durasi']; ?></td>
        <td><?php echo $d['total_booking']; ?></td>
        <td><?php echo $d['catatan_khusus']; ?></td>
        <td><?php
                   if ($d['status'] == 0){
                      echo '<span class=text-warning>Menuggu</span>';
                   } elseif ($d['status'] == 1) {
                      echo '<span class=text-success>Diterima</span>';
                    }
                  ?>                   
        </td>
        <td>
          <a href="acc.php?items_id=<?=$d['id_booking']?>"><button class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i></button></a>
          <a href="delete_booking.php?items_id=<?=$d['id_booking']?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
          
        </td>
      </tr>
    </tbody>
      <?php 
         }
      ?>
        </table>
      </div>
    </div>
  </div>
</div>

<!--     <?php
        include 'commons/footer.php';
    ?> -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.singlePageNav.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>
  </body>
</html>