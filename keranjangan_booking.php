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
<section class="content" style="background-color: grey; margin: 10px; border-radius: 10px;">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">               
                <div class="box-body">                   
                    <a href="Layanan.php" style="margin:10px;" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah</a>
                    <div class="table-responsive">
                      <center>
                        <fieldset>
                        <table class="table text-center" style="color: white;">
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>                       
                                    <th>Harga</th>
                                    <th>Gambar</th>                                  
                                    <th>Status</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $id = $_SESSION['item_id'];
                                $no =1 ;
                                  $query = "SELECT * FROM layanan WHERE id_layanan='$id'";
                                  $item = mysqli_query($conn, $query);
                                  while($row = mysqli_fetch_array($item)){
                                  
                              ?>
                                <tr>
                                  <th><?php echo $no; ?></th>
                                  <th><?php echo $row['nama']; ?></th>
                                  <th>Rp<?=number_format($row['harga'])?>.00</th>
                                  <th><img src="images/'.$row['gambar'].'" alt="Avatar" style="width: 100%;height: 250px;" ></th>
                                  <th><?php
                                                if ($row['status'] == 0){
                                                    echo '<span class=text-warning>Menunggu</span>';
                                                } elseif ($row['status'] == 1) {
                                                    echo '<span class=text-success>Sudah Diterima</span>';
                                                }
                                               ?> </th>
                                  <th><a href="editLoker.php?no=<?php echo $row['no']; ?>" class="btn btn-warning">Lihat</a>&nbsp;&nbsp;&nbsp;<a href="ambil.php?no=<?php echo $row['no']; ?>" class="btn btn-danger">Hapus</a></th>  
                                </tr>
                              <?php 
                                $no++; } 
                              ?> 
                            </tbody>
                        </table>
                        </fieldset>
                      </center>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
     <!--                                                                      
     <td>        
       <a  href="#"><span data-placement='top' data-toggle='tooltip' title='Hapus'><button   class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button></span></a>
          </td>
       -->

</section>
<?php
  include 'commons/footer.php';
?>
</body>
</html>