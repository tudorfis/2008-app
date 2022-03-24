<?php

//Galerie Foto

//Header
define(SITE_TITLE, "Galerie Foto");
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
 }

//Afisarea linkului in care este prezent
if ($link1) { $left_links.='<font color="#990000"><u>Cupa Unirii 2008</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="galerie.php?p=1">Cupa Unirii 2008</a><br /><hr noshade="noshade" />';}

if ($link2) { $left_links.='<font color="#990000"><u>Cupa Unirii 2009</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="galerie.php?p=2">Cupa Unirii 2009</a><br /><hr noshade="noshade" />';}

if ($link4) { $left_links.='<font color="#990000"><u>Cupa Unirii 2011</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="galerie.php?p=4">Cupa Unirii 2011</a><br /><hr noshade="noshade" />';}

if ($link3) { $left_links.='<font color="#990000"><u>Poze Locale</u></font><br /><hr noshade="noshade" />';}
else { $left_links.='<a class="left_links" href="galerie.php?p=3">Poze Locale</a><br /><hr noshade="noshade" />';}

define(LEFT_LINKS,$left_links); //Definirea linkurilor
define(IN_FORUM, false);
include("include/links_left.php");

/////////////////////////////////////////////////////////

//Links Main
define(SITE_PAGE,3);
define(IN_FORUM, false);
include("include/links_main.php");

//Footer
define(MAIN_IFRAME,"<iframe width=\"100%\" height=\"1031\" name=\"inside_id\" id=\"inside_id\" src=\"pages/galerie/link.php?p=$p\" scrolling=\"auto\" style=\"border-width:0px;\"></iframe>");
define(IN_FORUM, false);
include("include/footer.php");


//////////////////////////////
?>
