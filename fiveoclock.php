<?php
 include "smartarse.php";
 echo"
 <html>
  <head>
   <title>
    It's five o'clock...
   </title>
   <link rel=\"stylesheet\" type=\"text/css\" href=\"drink.css\">
   <link rel=\"icon\" type=\"image/x-icon\" href=\"favicon.ico\">
   <meta http-equiv=\"refresh\" content=\"$seconds_until_refresh\">
  </head>
  <body>
   <div id=\"content\">
    <p class=\"topline\">it's five o clock in...</p>
    <p class=\"whereFive\" id=\"whereFive\">GMT $gmtMod</p>
    <p class=\"countries\" id=\"countries\">
    <span class=\"place\"> " . $placestr . "</span>
    </p>
    <p class=\"sodrink\">so drink...</p>
    <p class=\"drinks\" id=\"drinks\"></p>
   </div>
  </body>
 </html>
";
?>
