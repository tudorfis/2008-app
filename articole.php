<?php

//Articole

//Header
define(SITE_TITLE, "Articole");
define(IN_FORUM, false);
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
 
 }

//Afisarea linkului in care este prezent
if ($link1) { $left_links.='<font color="#990000"><u>Articole</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=1">Articole</a><br />';}

/*
if ($link2) { $left_links.='<font color="#990000"><u>Articol 2</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=2">Articol 2</a><br />';}

if ($link3) { $left_links.='<font color="#990000"><u>Articol 3</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=3">Articol 3</a><br />';}

if ($link4) { $left_links.='<font color="#990000"><u>Articol 4</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=4">Articol 4</a><br />';}

if ($link5) { $left_links.='<font color="#990000"><u>Articol 5</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=5">Articol 5</a><br />';}

if ($link6) { $left_links.='<font color="#990000"><u>Articol 6</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=6">Articol 6</a><br />';}

if ($link7) { $left_links.='<font color="#990000"><u>Articol 7</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=7">Articol 7</a><br />';}

if ($link8) { $left_links.='<font color="#990000"><u>Articol 8</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=8">Articol 8</a><br />';}

if ($link9) { $left_links.='<font color="#990000"><u>Articol 9</u></font><br />';}
else { $left_links.='<a class="left_links" href="articole.php?p=9">Articol 9</a><br />';}
*/





define(LEFT_LINKS,$left_links); //Definirea linkurilor
define(IN_FORUM, false);
include("include/links_left.php");

/////////////////////////////////////////////////////////

//Links Main
define(SITE_PAGE,4);
define(IN_FORUM, false);
include("include/links_main.php");

//Footer
define(MAIN_IFRAME,"<iframe width=\"100%\" height=\"1031\" name=\"inside_id\" id=\"inside_id\" src=\"pages/articole/link.php?p=$p\" scrolling=\"auto\" style=\"border-width:0px\"></iframe>");
define(IN_FORUM, false);
include("include/footer.php");


//////////////////////////////
?>
