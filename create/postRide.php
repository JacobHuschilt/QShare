<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>QShare - Create Ride</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="img/QShare_Favicon.ico">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="../css/create.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Source+Sans+Pro:400,700" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
      <?php
        $price = $_POST["price"];
        $departure = $_POST["departure"];
        $destination = $_POST["destination"];
        $date = $_POST["date"];
        $min = $_POST["min"];
        $max = $_POST["max"];
        $car = $_POST["car"];
        $seats = $_POST["seats"];
        $info = $_POST["info"];
        $shotgun = $_POST["shotgun"];


        //Seating order, Passenger(Shotgun)/backLeft/backRight
        if ($shotgun == "1") {
          if ($seats == "1") {
            $seatArray = "1|0|0";
          }
          elseif ($seats == "2") {
            $seatArray = "1|1|0";
          }
          else {
            $seatArray = "1|1|1";
          }
        }
        else {
          if ($seats == "1") {
            $seatArray = "0|1|0";
          }
          else {
            $seatArray = "0|1|1";
          }
        }
        //Testing the input reading
        //echo $departure. "|" .$destination. "|" .$date. "|" .$min. "|" .$max. "|" .$price. "|" .$car. "|" .$seats. "|" .$shotgun. "|" .$info;

        //Not enough time to learn SQL + Databases + set it up, so we use text files as backend for now
        $rideFile = fopen("../currentRides.txt", "a") or fopen("../currentRides.txt", "w");
        $newRide = $departure. "|" .$destination. "|" .$date. "|" .$min. "|" .$max. "|" .$price. "|" .$car. "|" .$seats. "|" .$shotgun. "|" .$info;
        $newRide = $newRide. "|" .$seatArray. "\r\n";
        fwrite($rideFile, $newRide);
        fclose($rideFile);

        header("location:../index.html");
      ?>

        <nav class="navbar">

        </nav>
        <section class="main">

        </section>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
