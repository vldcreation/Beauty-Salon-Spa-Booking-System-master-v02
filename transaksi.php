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
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card1">
        <?php echo '<img src="images/'.$items['gambar'].'"alt="Avatar" class="img-responsive">' ?>
      </div>
    </div>
  
  
    <div class="col-md-6">
      <div class="pesan">

      </div>
    </div>
    
  <?php
    include 'commons/footer.php';
  ?>

<!-- Scroll Up Button -->
<a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>
</body>
</html>
