<!DOCTYPE html>
<html>
  <head>
    <title>About Maria Beauty Salon</title>
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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31891.977750238682!2d99.07332532467!3d2.33793417109797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e04f5620d4385%3A0xb1d1eddc21f7f25f!2sMARIA+SALON!5e0!3m2!1sen!2sid!4v1558918469256!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen style="margin-top: -10%;"></iframe>
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
	        <h2>blabla bla</h2>   
	      </div>
	    </div>
	  </div><hr>    
    <?php
    	include 'commons/footer.php';
    ?>
</body>
</html>