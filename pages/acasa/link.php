<?php
print '<link rel="stylesheet" href="../../css/main_design.css" />';

//Ordinea dupa titlu in care is facute linkurile
// 1 - Adresa clubului
// 2 - Infintarea clubului
// 3 - Link-uri utile
// 4 - Membrii Clublui


$link1 = file_get_contents('adresa_club.html');
$link2 = file_get_contents('infintarea_club.html');
$link3 = file_get_contents('bridge online.html');
$link4 = file_get_contents('bridge offline.html');
$link5 = file_get_contents('invatati bridge.html');
$link6 = file_get_contents('bridgelinks.html');
$link7 = file_get_contents('suppliers.html');
$link8 = file_get_contents('cluburi si federatii.html');
$link9 = file_get_contents('membrii_clubului.html');
$link10 = file_get_contents('2%.html');



$p = $_GET['p'];
if (!isset($p)) { $p = 1 ;};

switch ($p) {
case 1: print $link1; break;
case 2: print $link2; break;
case 3: print $link3; break;
case 4: print $link4; break;
case 5: print $link5; break;
case 6: print $link6; break;
case 7: print $link7; break;
case 8: print $link8; break;
case 9: print $link9; break;
case 10: print $link10; break;

}
?>