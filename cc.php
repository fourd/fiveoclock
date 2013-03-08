<?php
header('Content-Type: text/html; charset=UTF-8');
$cc_arr = array();
/** turns the csv into an associative array where the 2 letter code is the key and the name is the value
*
*/
if (($handle = fopen("cclist.csv", "r")) !== FALSE) {
 while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
  $cc_arr[$data[1]] = $data[0];
 } 
 fclose($handle);
} 
?>
