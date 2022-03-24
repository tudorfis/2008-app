<?php
//Includes Session

//Forum
$x = $_COOKIE['phpbb3_5rg97_sid'];

//Header
define(SITE_TITLE, "Forum");
include("include/header.php");



//Links Left
$p = $_GET['p'];
if (!isset($p)) { $p = 4 ;}

switch ($p) { //stabilirea paginii de navigatie
 
 case 1: $link1 = true;$p = 'ucp.php?mode=login';break;
 case 2: $link2 = true;$p = 'ucp.php?mode=register';break;
 case 3: $link3 = true;$p = 'search.php';break;
 
 case 4: $link4 = true;$p = 'viewforum.php?f=2';break;
 case 5: $link5 = true;$p = 'viewforum.php?f=11';break;
 case 6: $link6 = true;$p = 'viewforum.php?f=4';break;
 case 7: $link7 = true;$p = 'viewforum.php?f=5';break;
 case 8: $link8 = true;$p = 'viewforum.php?f=6';break;
 case 9: $link9 = true;$p = 'viewforum.php?f=7';break;
 case 10: $link10 = true;$p = 'viewforum.php?f=8';break;
 case 11: $link11 = true;$p = 'viewforum.php?f=10';break;
 case 12: $link12 = true;$p = 'ucp.php?mode=logout&sid=' . $x ;break;
 case 13: $link13 = true;$p = 'ucp.php';break;
 
}


//Accesare
  $left_links.='<font color="#006600"><center><b>Acceseaza:</b></font></center><hr noshade="noshade" />';
  
if ($link1)  { $left_links.='<center><font color="#990000"><u>Logare</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=1">Logare</a></center>';} 

if ($link2) { $left_links.='<center><font color="#990000"><u>Inregistrare</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=2">Inregistrare</a></center>';} 

if ($link13) { $left_links.='<center><font color="#990000"><u>-Panou Comanda-</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=13">- Panou Comanda -</a></center>';} 

if ($link12) { $left_links.='<center><font color="#990000"><u>[Delogare]</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=12">[ Delogare ]</a></center>';} 

if ($link3) { $left_links.='<center><font color="#990000"><h3><img border="0" src="images/search.png" style="vertical-align:middle;" /><u> Cautare</u></h3></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=3"><h3><img border="0" src="images/search.png" style="vertical-align:middle;" /> Cautare</h3></a></center>';} 




//Navigare
  $left_links.='<font color="#006600"><center><b>Navigare Rubrica:</b></font></center><hr noshade="noshade" />';

if ($link4) { $left_links.='<center><font color="#990000"><u>Bun Venit!</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=4">Bun Venit!</a></center>';}

if ($link5) { $left_links.='<center><font color="#990000"><u>Reguli & Anunturi</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=5">Reguli & Anunturi</a></center>';}

if ($link6) { $left_links.='<center><font color="#990000"><u>Concursuri & Rez.</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=6">Concursuri & Rez.</a></center>';}

if ($link7) { $left_links.='<center><font color="#990000"><u>Stiri</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=7">Stiri</a></center>';}

if ($link8) { $left_links.='<center><font color="#990000"><u>Articole</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=8">Articole</a></center>';}

if ($link9) { $left_links.='<center><font color="#990000"><u>Imagini & Video</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=9">Imagini & Video</a></center>';}

if ($link10) { $left_links.='<center><font color="#990000"><u>Discutii Done</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=10">Discutii Done</a></center>';}

if ($link11) { $left_links.='<center><font color="#990000"><u>Offtopic & Fun</u></font></center>';}
else { $left_links.='<center><a class="left_links" href="forum.php?p=11">Offtopic & Fun</a></center>';}



define(LEFT_LINKS,$left_links);
include("include/links_left.php");

//Links Main
define(SITE_PAGE,6);
include("include/links_main.php");


//Footer
define(MAIN_IFRAME,"<iframe width=\"100%\" height=\"1031\" name=\"inside_id\" id=\"inside_id\" src=\"forum/$p\" scrolling=\"auto\" style=\"border-width:0px;padding-left:10px;padding-top:10px;padding-bottom:10px; margin-right:10px\"></iframe>");
include("include/footer.php");


//////////////////////////////
?>
