<?php
include('dbconn.php');
session_start();
$a=array("Karnataka","Kerala","Hyderabad");
$q = $_REQUEST["q"];
$hint = "";
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name)
  {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= "</br> $name";
      }
    }
  }
}
echo $hint === "" ? "no suggestion" : $hint;
?>