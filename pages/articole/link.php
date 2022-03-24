<?php
print '<link rel="stylesheet" href="../../css/main_design.css" />';

$link1 = file_get_contents('art1.html');
$link2 = file_get_contents('art2.html');
$link3 = file_get_contents('art3.html');
$link4 = file_get_contents('art4.html');
$link5 = file_get_contents('art5.html');
$link6 = file_get_contents('art6.html');
$link7 = file_get_contents('art7.html');
$link8 = file_get_contents('art8.html');
$link9 = file_get_contents('art9.html');


$p = $_GET['p'];
if (!isset($p)) { $p = 1 ;};

switch ($p) {
 case 1: print $link1;break;
 case 2: print $link2;break;
 case 3: print $link3;break;
 case 4: print $link4;break;
 case 5: print $link5;break;
 case 6: print $link6;break;
 case 7: print $link7;break;
 case 8: print $link8;break;
 case 9: print $link9;break;
}
?>