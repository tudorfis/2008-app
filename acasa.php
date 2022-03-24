<?php

//Acasa

//Header
define('SITE_TITLE', "Acasa"); //Definirea Titlului
define('IN_FORUM', false);
include("include/header.php");



//Links Left
$p = $_GET['p'];
if (!isset($p)) { $p = 1 ;}

switch ($p) { //stabilirea paginii de navigatie
 case 1: $link1 = true;break;
 case 2: $link2 = true;break;
 case 3: $link3 = true;break;
 case 4: $link4 = true;break;
 case 5: $link5 = true;break;
 case 6: $link6 = true;break;
 case 7: $link7 = true;break;
 case 8: $link8 = true;break;
 case 9: $link9 = true;break;
 case 10: $link10 = true;break;
 
 }

//Afisarea linkului in care este prezent
if ($link1) { $left_links.='<font color="#990000"><u>Adresa Clubului</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=1">Adresa Clubului</a><br /><hr noshade="noshade" />';}

if ($link2) { $left_links.='<font color="#990000"><u>Infintarea Clubului</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=2">Infintarea Clubului</a><br /><hr noshade="noshade" />';}


$left_links .= '<font color="#006600"><b>Linkuri Utile:</b></font><br /><center>';

if ($link3) { $left_links.='<font color="#990000"><u>Bridge Online</u></font><br />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=3">Bridge Online</a><br />';}

if ($link4) { $left_links.='<font color="#990000"><u>Bridge Offline</u></font><br />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=4">Bridge Offline</a><br /';}

if ($link5) { $left_links.='<font color="#990000"><u>Invatati Bridge</u></font><br />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=5">Invatati Bridge</a><br />';}

if ($link6) { $left_links.='<font color="#990000"><u>Bridge Links</u></font><br />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=6">Bridge Links</a><br />';}

if ($link7) { $left_links.='<font color="#990000"><u>Suppliers</u></font><br />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=7">Suppliers</a><br />';}

if ($link8) { $left_links.='<font color="#990000"><u>Cluburi si Federatii</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=8">Cluburi si federatii</a></center><hr noshade="noshade" />';}



if ($link9) { $left_links.='<font color="#990000"><u>Membrii Clubului</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=9">Membrii Clubului</a><br /><hr noshade="noshade" />';}



if ($link10) { $left_links.='<font color="#990000"><u>Doi la suta - 2%</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="acasa.php?p=10">Doi la suta - 2%</a><br /><hr noshade="noshade" />';}


define(LEFT_LINKS,$left_links); //Definirea linkurilor
define(IN_FORUM, false);
include("include/links_left.php");

/////////////////////////////////////////////////////////



//Links Main
define(SITE_PAGE,1); //Definirea paginii curente
define(IN_FORUM, false);
include("include/links_main.php");


//Footer
define(MAIN_IFRAME,"<iframe width=\"100%\" height=\"1031\" name=\"inside_id\" id=\"inside_id\" src=\"pages/acasa/link.php?p=$p\" scrolling=\"auto\" style=\"border-width:0px\"></iframe>");
define(IN_FORUM, false);
include("include/footer.php");


//////////////////////////////
?>



