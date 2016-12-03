//Code to match wha the user is searching for from the
//text file that was created. 

<?php
$myfile = fopen("../currentRides.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
