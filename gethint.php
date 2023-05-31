<?php

// get the q parameter from URL
// $q = $_REQUEST["q"];

date_default_timezone_set('Asia/Manila');
$datename = date('Y-F-d');
$time = date('h:i:s a');

echo $time;
echo "<br>";
echo $datename;
?>