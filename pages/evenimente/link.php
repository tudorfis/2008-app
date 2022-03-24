<?php
print '<link rel="stylesheet" href="../../css/main_design.css" />';



//CUPA UNIRII
$link2 = file_get_contents('Cupa Unirii/cupa_unirii_program.html');
$link3 = file_get_contents('Cupa Unirii/cupa_unirii_regulament.html');
$link4 = file_get_contents('Cupa Unirii/cupa_unirii_inscrieri.html');
$link10 = file_get_contents('Cupa Unirii/cazari.html');




//CUPA UNIRII 2008
$link1 = file_get_contents('Cupa Unirii 2008/divizia_A_2008.html');
$link7 = file_get_contents('Cupa Unirii 2008/divizia_B_2008.html');
$link8 = file_get_contents('Cupa Unirii 2008/divizia_C1_2008.html');
$link9 = file_get_contents('Cupa Unirii 2008/divizia_C2_2008.html');



//CUPA UNIRII 2009
$link15 = file_get_contents('Cupa Unirii 2009/Divizia_A_2009.html');
$link16 = file_get_contents('Cupa Unirii 2009/Divizia_B_2009.html');
$link17 = file_get_contents('Cupa Unirii 2009/Divizia_C1_2009.html');
$link18 = file_get_contents('Cupa Unirii 2009/Divizia_C2_2009.html');




//CUPA UNIRII 2010
$link23 = file_get_contents('Cupa Unirii 2010/Divizia_A_2010.html');
$link24 = file_get_contents('Cupa Unirii 2010/Divizia_B_2010.html');
$link25 = file_get_contents('Cupa Unirii 2010/Divizia_C1_2010.html');
$link26 = file_get_contents('Cupa Unirii 2010/Divizia_C2_2010.html');




//CUPA UNIRII 2011
$link27 = file_get_contents('Cupa Unirii 2011/Divizia A 2011.html');
$link28 = file_get_contents('Cupa Unirii 2011/Divizia B 2011.html');
$link29 = file_get_contents('Cupa Unirii 2011/Divizia C 2011.html');
$link30 = file_get_contents('Cupa Unirii 2011/Divizia D 2011.html');




//CUPA UNIRII 2012
$link34 = file_get_contents('Cupa Unirii 2012/Divizia A 2012.html');
$link35 = file_get_contents('Cupa Unirii 2012/Divizia B 2012.html');
$link36 = file_get_contents('Cupa Unirii 2012/Divizia C 2012.html');
$link37 = file_get_contents('Cupa Unirii 2012/Divizia D 2012.html');




//REZULTATE '08-'09

//Rezultate club
$link5 = file_get_contents('2008-2009/rezultate_zilnice_08_09.html');

//Clasament 08-09
$link6 = file_get_contents('2008-2009/clasamente_08_09.html');




//REZULTATE '09-'10

//Rezultate club
$link11 = file_get_contents('2009-2010/rezultate_zilnice_09_10.html');

//Clasament 09-10
$link12 = file_get_contents('2009-2010/clasamente_09_10.html');




//REZULTATE '2010-'2011

//Rezultate club
$link19 = file_get_contents('2010-2011/rezultate_2010-2011.html');

//Clasament 10-11
$link20 = file_get_contents('2010-2011/clasamente_2010-2011.html');







//REZULTATE '2011-'2012

//Rezultate club
$link21 = file_get_contents('2011-2012/rezultate_2011-2012.html');

//Clasament 2011-2012
$link22 = file_get_contents('2011-2012/clasamente_2011-2012.html');





//REZULTATE '2012-'2013

//Rezultate club
$link31 = file_get_contents('2012-2013/rezultate_2012-2013.html');

//Clasament 2012-2013
$link32 = file_get_contents('2012-2013/clasamente_2012-2013.html');




//REZULTATE '2013-'2014

//Rezultate club
$link38 = file_get_contents('2013-2014/rezultate_2013-2014.html');

//Clasament 2013-2014
$link39 = file_get_contents('2013-2014/clasamente_2013-2014.html');



//Calificari Divizia C
$link13 = file_get_contents('Calificari Echipe/calificari Divizia C.html');



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
case 11: print $link11; break;
case 12: print $link12; break;
case 13: print $link13; break;
case 14: print $link14; break;
case 15: print $link15; break;
case 16: print $link16; break;
case 17: print $link17; break;
case 18: print $link18; break;
case 19: print $link19; break;
case 20: print $link20; break;
case 21: print $link21; break;
case 22: print $link22; break;
case 23: print $link23; break;
case 24: print $link24; break;
case 25: print $link25; break;
case 26: print $link26; break;
case 27: print $link27; break;
case 28: print $link28; break;
case 29: print $link29; break;
case 30: print $link30; break;
case 31: print $link31; break;
case 32: print $link32; break;
case 33: print $link33; break;
case 34: print $link34; break;
case 35: print $link35; break;
case 36: print $link36; break;
case 37: print $link37; break;
case 38: print $link38; break;
case 39: print $link39; break;
}
?>