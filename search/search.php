<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>QShare - Search for Rides</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link href="search.css" type= "text/css" rel="stylesheet" >
      	<link rel="stylesheet" href="./normalize.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--Code to match what the user is searching for from the-->
        <!--text file that was created.-->

        <?php

        $searchDeparture = $_POST["departure"];
        $searchDestination = $_POST["destination"];
        $searchDate = $_POST["date"];
        $searchStartTime = $_POST["startTime"];
        $searchEndTime = $_POST["endTime"];
        $searchCost = $_POST["cost"];


        $myfile = fopen("../currentRides.txt", "r") or die("Unable to open file!");
        // Output one line until end-of-file


        while(!feof($myfile)) {
          $array = explode("|", $myfile);
          $departure = $array[0];
          $destination = $array[1];
          $date = $array[2];
          $startTime = $array[3];
          $endTime = $array[4];
          $cost  = $array[5];
          $carType = $array[6];
          $seatsLeft = $array[7];
          $shotgun = $array[8];
          $additionalInfo = $array[9];

          if ($departure == $searchDeparture &&
              $destination == $searchDestination &&
              $date ==  $searchDate &&
              $endTime <= $searchEndTime &&
              $startTime >= $searchStartTime &&
              $seatsLeft > 0) {
              //if all these are true, then the line is a match.
              //we then need to create a bubble to show the user.
              echo "<section class = 'loginform cf'>";
              echo "<form name = 'pickCar' action = 'confirm.html' method='post' accept-charset='utf-8' enctype='multipart/form-data'> ";
              echo "<ul>";
              echo "<li><label for 'departure'>" . $departure . "</label>";
              echo "<li><label for 'destination'>" . $destination . "</label>";
              echo "<li><label for 'date'>" . $Date . "</label>";
              echo "<li><label for 'Travel Window'>" . $searchStartTime . "'to'" . $searchEndTime . "</label>";
              echo "<li><label for 'Cost'>" . $searchCost . "</label>";
              echo "<input type = 'submit' value = 'Book Car'";
              }
        }
        fclose($myfile);
        ?>


        <!-- Add your site or application content here -->
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
</html>
