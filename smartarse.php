<?php
 header('Content-Type: text/html; charset=UTF-8');
 include ("tzphp-0.1.3/tz.php");
 include ("cc.php");
 /* this bit generates the gmt modifier */
 $rawdateH = gmdate(H);
 if ($rawdateH == 0){
  $dateH = 24;
 }else{
  $dateH = $rawdateH;
 };

 $desiredOffset = 17-$dateH;

 if ($desiredOffset > 12){
  $desiredOffset = $desiredOffset - 24;
 };

 if ($desiredOffset > -1){
  $gmtMod = "+" . $desiredOffset;
 }else{
  $gmtMod = $desiredOffset;
 };

/* this bit generates the number of seconds until the next round fifteen minutes, for auto-refreshing */

$seconds_until_refresh = (((15 - (gmdate(i) % 15)) - 1) * 60) + (60 - gmdate(s));


 /* here on in makes the array of countries where the local time is between 5pm and 6pm */
 $timezone_identifiers = DateTimeZone::listIdentifiers();
 /** takes a place and returns true if it's 5pm there, otherwise returns false
 *
 */
 function is5pm($place){
  $rtime = tz_localtime(time(), $place);
  if ($rtime[2] == 17){
   return True;
  };
 };
 
 $where5 = array_filter($timezone_identifiers, "is5pm");
 /*TODO: 
 * stretch: alter all of this so that stuff like individual USA states can be represented 
 */
 /* takes an string in the format eg "Africa/Abidjan" and returns the two-letter country code of that location 
 *  
 */
 function getcc($location){
  $tz = new DateTimeZone($location);
  $foo = $tz->getLocation();
  $tzcc = $foo[country_code]; 
  return $tzcc;
 };
 /* takes an array of timezone identifier placenames and returns an array of two-letter country codes for those places
 *
 */
 function tz_place_to_cc($input_arr){
  $out_i = -1;
  $out_arr = array();
  foreach($input_arr as $value){
   $out_i++;
   $out_arr[$out_i] = getcc("$value");
  };
  return $out_arr;
 };
 $potato = tz_place_to_cc($where5);
 $places = [];
 foreach ($potato as $value){
  array_push($places, $cc_arr[$value]);
 };
 $unique_places = array_unique($places);  
 $placestr = implode(" - ", $places);
 $placestr = rtrim($placestr, "- ");
?> 
