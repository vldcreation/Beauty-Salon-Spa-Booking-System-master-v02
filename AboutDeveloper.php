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

    <style>

    .flip-card {
      background-color: transparent;
      width: 300px;
      height: 300px;
      perspective: 1000px;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }

    .flip-card-front {
      background-color: #bbb;
      color: black;
    }

    .flip-card-back {
      background-color: #2980b9;
      color: white;
      transform: rotateY(180deg);
    }
    </style>
  </head>
  <body>
  <!-- Header-->
    <?php
      include 'commons/header.php';
    ?>
  
  <div style="text-align:center;">
    <h2>Developer</h2>
    <hr class="pg-titl-bdr-btt"></hr>
  </div>
  <div class="container">
    <div class="col-md-6" >       
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/5.png" alt="Avatar" style="width: 100%;">
          </div>
          <div class="flip-card-back">
            <h1>John Doe</h1> 
            <p>Architect & Engineer</p> 
            <p>We love that guy</p>
          </div>
        </div>
      </div>        
    </div>
    
    <div class="konten">
      <div class="col-md-6" > 
        <h2>Simon Mangasi Hutajulu</h2>   
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="konten">
      <div class="col-md-6" > 
        <h2>Richie Calvin Manik</h2>       
      </div>
    </div>  
    <div class="col-md-6" > 
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/5.png" alt="Avatar" style="width: 100%;">
          </div>
          <div class="flip-card-back">
            <h1>John Doe</h1> 
            <p>Architect & Engineer</p> 
            <p>We love that guy</p>
          </div>
        </div>
      </div>      
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="col-md-6" >       
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/5.png" alt="Avatar" style="width: 100%;">
          </div>
          <div class="flip-card-back">
            <h1>John Doe</h1> 
            <p>Architect & Engineer</p> 
            <p>We love that guy</p>
          </div>
        </div>
      </div>          
    </div>
    <div class="konten">
      <div class="col-md-6" > 
        <h2>Melva Panjaitan</h2>       
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="konten">
      <div class="col-md-6" > 
        <h2>Richie Calvin Manik</h2>       
      </div>
    </div>  
    <div class="col-md-6" > 
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/5.png" alt="Avatar" style="width: 100%;">
          </div>
          <div class="flip-card-back">
            <h1>John Doe</h1> 
            <p>Architect & Engineer</p> 
            <p>We love that guy</p>
          </div>
        </div>
      </div>      
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="col-md-6" >       
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/5.png" alt="Avatar" style="width: 100%;">
          </div>
          <div class="flip-card-back">
            <h1>John Doe</h1> 
            <p>Architect & Engineer</p> 
            <p>We love that guy</p>
          </div>
        </div>
      </div>        
    </div>    
    <div class="konten">
      <div class="col-md-6" > 
        <h2>Simon Mangasi Hutajulu</h2>   
      </div>
    </div>
  </div>
  <hr>
  
  
  
  <!-- Footer-->
    <?php
      require_once(dirname(__FILE__).'/commons/footer.php');
    ?>

    <!-- Scroll Up Button -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/custom.js"></script>
    
</body>
</html>