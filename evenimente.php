<?php

//Acasa

//Header
define("SITE_TITLE", "Evenimente");
define("IN_FORUM", false);
include("include/header.php");

//Links Left
$p = $_GET['p'];
if (!isset($p)) { $p = 2 ;}

switch ($p) { //stabilirea paginii de navigatie
 case 1: $link1 = true;break;
 case 2: $link2 = true;break;
 case 3: $link3 = true;break;
 case 4: $link4 = true; $p = 'procesare_inscriere_cupa_unirii.php'; break;
 case 5: $link5 = true;break;
 case 6: $link6 = true;break;
 case 7: $link7 = true;break;
 case 8: $link8 = true;break;
 case 9: $link9 = true;break;
 case 10: $link10 = true;break;
 case 11: $link11 = true;break;
 case 12: $link12 = true;break;
 case 13: $link13 = true;break;
 case 14: $link14 = true; $p = 'inscrisi_cupa_unirii.php'; break;
 case 15: $link15 = true;break;
 case 16: $link16 = true;break;
 case 17: $link17 = true;break;
 case 18: $link18 = true;break;
 case 19: $link19 = true;break;
 case 20: $link20 = true;break;
 case 21: $link21 = true;break;
 case 22: $link22 = true;break;
 case 23: $link23 = true;break;
 case 24: $link24 = true;break;
 case 25: $link25 = true;break;
 case 26: $link26 = true;break;
 case 27: $link27 = true;break;
 case 28: $link28 = true;break;
 case 29: $link29 = true;break;
 case 30: $link30 = true;break;
 case 31: $link31 = true;break;
 case 32: $link32 = true;break;
 case 32: $link32 = true;break;
 case 33: $link33 = true;break;
 case 34: $link34 = true;break;
 case 35: $link35 = true;break;
 case 36: $link36 = true;break;
 case 37: $link37 = true;break;
 case 38: $link38 = true;break;
 case 39: $link39 = true;break;
 }

//Afisarea linkului in care este prezent


//CUPA UNIRII 2013
$left_links.='<hr noshade="noshade" /><font color="#006600"><b>Cupa Unirii 2013</b></font><br />';

if ($link2) { $left_links.='<center><font color="#990000"><u>Program</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=2">Program</a></center>';}

if ($link3) { $left_links.='<center><font color="#990000"><u>Regulament</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=3">Regulament</a></center>';}

if ($link4) { $left_links.='<center><font color="#990000"><u>Inscrieri</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=4">Inscrieri</a></center>';}

if ($link10) { $left_links.='<center><font color="#990000"><u>Cazari</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=10">Cazari</a></center>';}

if ($link14) { $left_links.='<center><font color="#990000"><u>Inscrisi</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=14">Inscrisi</a></center><br />';}

if ($link33) { $left_links.='<center><font color="#990000"><u>Inscrisi</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=33">  </a></center><br />';}




//Campionatul national
$left_links.='<hr noshade="noshade" /><font color="#006600"><center><b>Campionatul National<br />de Echipe</b></font></center>';

//Calificari Divizia C
if ($link13) { $left_links.='<center><font color="#990000"><u>Calificari Divizia C</u></font></center></br>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=13">Calificari Divizia C</a></center></br>';}





//CUPA UNIRII 2008
$left_links.='<hr noshade="noshade" /><font color="#006600"><center><b>Cupa Unirii 2008<br />Rezultate</b></font></center>';

//Divizia A
if ($link1) { $left_links.='<center><font color="#990000"><u>Divizia A</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=1">Divizia A</a></center>';}

//Divizia B
if ($link7) { $left_links.='<center><font color="#990000"><u>Divizia B</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=7">Divizia B</a></center>';}

//Divizia C1
if ($link8) { $left_links.='<center><font color="#990000"><u>Divizia C1</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=8">Divizia C1</a></center>';}

//Divizia C2
if ($link9) { $left_links.='<center><font color="#990000"><u>Divizia C2</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=9">Divizia C2</a></center><br />';}







//CUPA UNIRII 2009
$left_links.='<hr noshade="noshade" /><font color="#006600"><center><b>Cupa Unirii 2009<br />Rezultate</b></font></center>';

//Divizia A
if ($link15) { $left_links.='<center><font color="#990000"><u>Divizia A</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=15">Divizia A</a></center>';}

//Divizia B
if ($link16) { $left_links.='<center><font color="#990000"><u>Divizia B</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=16">Divizia B</a></center>';}

//Divizia C1
if ($link17) { $left_links.='<center><font color="#990000"><u>Divizia C1</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=17">Divizia C1</a></center>';}

//Divizia C2
if ($link18) { $left_links.='<center><font color="#990000"><u>Divizia C2</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=18">Divizia C2</a></center><br />';}







//CUPA UNIRII 2010
$left_links.='<hr noshade="noshade" /><font color="#006600"><center><b>Cupa Unirii 2010<br />Rezultate</b></font></center>';

//Divizia A
if ($link23) { $left_links.='<center><font color="#990000"><u>Divizia A</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=23">Divizia A</a></center>';}

//Divizia B
if ($link24) { $left_links.='<center><font color="#990000"><u>Divizia B</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=24">Divizia B</a></center>';}

//Divizia C1
if ($link25) { $left_links.='<center><font color="#990000"><u>Divizia C1</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=25">Divizia C1</a></center>';}

//Divizia C2
if ($link26) { $left_links.='<center><font color="#990000"><u>Divizia C2</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=26">Divizia C2</a></center><br />';}







//CUPA UNIRII 2011
$left_links.='<hr noshade="noshade" /><font color="#006600"><center><b>Cupa Unirii 2011<br />Rezultate</b></font></center>';

//Divizia A
if ($link27) { $left_links.='<center><font color="#990000"><u>Divizia A</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=27">Divizia A</a></center>';}

//Divizia B
if ($link28) { $left_links.='<center><font color="#990000"><u>Divizia B</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=28">Divizia B</a></center>';}

//Divizia C
if ($link29) { $left_links.='<center><font color="#990000"><u>Divizia C</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=29">Divizia C</a></center>';}

//Divizia D
if ($link30) { $left_links.='<center><font color="#990000"><u>Divizia D</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=30">Divizia D</a></center><br />';}






//CUPA UNIRII 2012
$left_links.='<hr noshade="noshade" /><font color="#006600"><center><b>Cupa Unirii 2012<br />Rezultate</b></font></center>';

//Divizia A
if ($link34) { $left_links.='<center><font color="#990000"><u>Divizia A</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=34">Divizia A</a></center>';}

//Divizia B
if ($link35) { $left_links.='<center><font color="#990000"><u>Divizia B</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=35">Divizia B</a></center>';}

//Divizia C
if ($link36) { $left_links.='<center><font color="#990000"><u>Divizia C</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=36">Divizia C</a></center>';}

//Divizia D
if ($link37) { $left_links.='<center><font color="#990000"><u>Divizia D</u></font></center><br />';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=37">Divizia D</a></center><br />';}








//REZULTATELE 08-09
$left_links.='<hr noshade="noshade" /><font color="#006600"><b> Rezultate \'08-\'09</b></font><br />'; 

$left_links.='<div style="padding-bottom:5px;">';
if ($link5) { $left_links.='<center><font color="#990000"><u>Rezultate Club</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=5">Rezultate Club</a></center>';}
$left_links.='</div>';

if ($link6) { $left_links.='<center><font color="#990000"><u>Clasament<br /> Apullum \'08-\'09</u></font></center><br />
';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=6">Clasament<br /> Apullum \'08-\'09</a></center><br />';} 




//REZULTATELE 09-10
$left_links.='<hr noshade="noshade" /><font color="#006600"><b> Rezultate \'09-\'10</b></font><br />'; 

$left_links.='<div style="padding-bottom:5px;">';
if ($link11) { $left_links.='<center><font color="#990000"><u>Rezultate Club</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=11">Rezultate Club</a></center>';}
$left_links.='</div>';

if ($link12) { $left_links.='<center><font color="#990000"><u>Clasament<br /> Apullum \'09-\'10</u></font></center><br />
';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=12">Clasament<br /> Apullum \'09-\'10</a></center><br />';} 






//REZULTATELE 2010-2011
$left_links.='<hr noshade="noshade" /><font color="#006600"><b> Rezultate \'10-\'11</b></font><br />'; 

$left_links.='<div style="padding-bottom:5px;">';
if ($link19) { $left_links.='<center><font color="#990000"><u>Rezultate Club</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=19">Rezultate Club</a></center>';}
$left_links.='</div>';

if ($link20) { $left_links.='<center><font color="#990000"><u>Clasament<br /> Apullum \'10-\'11</u></font></center><br />
';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=20">Clasament<br /> Apullum \'10-\'11</a></center><br />';} 








//REZULTATELE 2011-2012
$left_links.='<hr noshade="noshade" /><font color="#006600"><b> Rezultate \'11-\'12</b></font><br />'; 

$left_links.='<div style="padding-bottom:5px;">';
if ($link21) { $left_links.='<center><font color="#990000"><u>Rezultate Club</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=21">Rezultate Club</a></center>';}
$left_links.='</div>';

if ($link22) { $left_links.='<center><font color="#990000"><u>Clasament<br /> Apullum \'11-\'12</u></font></center><br />
';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=22">Clasament<br /> Apullum \'11-\'12</a></center><br />';} 




//REZULTATELE 2012-2013
$left_links.='<hr noshade="noshade" /><font color="#006600"><b> Rezultate \'12-\'13</b></font><br />'; 

$left_links.='<div style="padding-bottom:5px;">';
if ($link31) { $left_links.='<center><font color="#990000"><u>Rezultate Club</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=31">Rezultate Club</a></center>';}
$left_links.='</div>';

if ($link32) { $left_links.='<center><font color="#990000"><u>Clasament<br /> Apullum \'12-\'13</u></font></center><br />
';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=32">Clasament<br /> Apullum \'12-\'13</a></center><br />';} 






//REZULTATELE 2013-2014
$left_links.='<hr noshade="noshade" /><font color="#006600"><b> Rezultate \'13-\'14</b></font><br />'; 

$left_links.='<div style="padding-bottom:5px;">';
if ($link38) { $left_links.='<center><font color="#990000"><u>Rezultate Club</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=38">Rezultate Club</a></center>';}
$left_links.='</div>';

if ($link39) { $left_links.='<center><font color="#990000"><u>Clasament<br /> Apullum \'13-\'14</u></font></center><br />
';}
else { $left_links.='<center><a class="left_links" href="evenimente.php?p=39">Clasament<br /> Apullum \'13-\'14</a></center><br />';} 


$left_links.='<hr noshade="noshade" />';



define(LEFT_LINKS,$left_links); //Definirea linkurilor
define(IN_FORUM, false);
include("include/links_left.php");

/////////////////////////////////////////////////////////



//Links Main
define(SITE_PAGE,2);
define(IN_FORUM, false);
include("include/links_main.php");



if ($link4 || $link14) { 
    define(MAIN_IFRAME,"<iframe width=\"100%\" height=\"2000\" name=\"inside_id\" id=\"inside_id\" src=\"pages/evenimente/$p\" scrolling=\"auto\" style=\"border-width:0px\"></iframe>");
}

else { define(MAIN_IFRAME, "<iframe width=\"100%\" height=\"2000\" name=\"inside_id\" id=\"inside_id\" src=\"pages/evenimente/link.php?p=$p\" scrolling=\"auto\" style=\"border-width:0px\"></iframe>");
}

define(IN_FORUM, false);
include("include/footer.php");


//////////////////////////////
?>