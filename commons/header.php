<?php
session_start();
if (isset($_GET['out'])) {
    session_start();
    session_destroy();
    header('location: index.php');
}
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><img src="images/nav.jpg" href="index.php" class="img-circle" alt="Cinque Terre" style="width: 70px;height: 50px;"></a>
    </div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="Layanan.php"><span class="glyphicon glyphicon-tasks"></span> Layanan</a></li>
      <li><a href="Product.php"><span class="glyphicon glyphicon-shopping-cart"></span> Product</a></li>
      <li><a href="AboutMaria.php"><span class="glyphicon glyphicon-user"></span> About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
      if (!isset($_SESSION['is_logged_in'])) {
        echo '<li><a href="Registrasi.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="LoginMember.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        }else{
          echo '
            <li class="grid">
              <a class="dropdown-toggle" data-toggle="dropdown" style="font-size: 16px;"><i class="fa fa-user-circle" aria-hidden="true" style=""></i>&nbsp' . $_SESSION['nama'] .'<b class="caret"></b>
                <ul class="dropdown-menu">
                  <li style="font-size: 15px;"><a href="cart.php?add=1"><span class="glyphicon glyphicon-shopping-cart"></span> Pembelian</a></li>
                  <li style="font-size: 15px;"><a href="booking.php?add=1"><span class="glyphicon glyphicon-check"></span> Bookingan</a></li>
                  <li style="font-size: 15px;"><a href="index.php?out"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
              }
    ?>
    </ul>
    </div>
  </div>
</nav>