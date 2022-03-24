<?php
//Stabilirea in ce pagina se afla cu navigarea
 switch (SITE_PAGE) {
  case 1: $ac_link = true;break;
  case 2: $ev_link = true;break;
  case 3: $ga_link = true;break;
  case 4: $ar_link = true;break;
  case 5: $co_link = true;break;
  case 6: $fo_link = true;break;
  }
					
?>
  <tr>
    <td width="100%" height="33" background="<?php if (IN_FORUM) { print '../'; } ?>images/brg_05.jpg">
	<div class="links_main"><center>
  
  <?php 
   //Afisarea paginii curente in care se afla navigatorul
  if (IN_FORUM) { 
  $ac = "../acasa.php";
  $ev = "../evenimente.php";
  $ga = "../galerie.php";
  $ar = "../articole.php";
  $co = "../contact.php";
  }
  else { 
  $ac = "acasa.php";
  $ev = "evenimente.php";
  $ga = "galerie.php";
  $ar = "articole.php";
  $co = "contact.php";
   }
  
   
   if ($ac_link) { print '<font color="#990000"><u>Acasa</u></font> | ';}
   else { print '<a class="main_links" href="' . $ac . '">Acasa</a> | ';} 
   
   if ($ev_link) { print '<font color="#990000"><u>Evenimente</u></font> | ';}
   else {print '<a class="main_links" href="' . $ev . '">Evenimente</a> | ';}

   if ($ga_link) { print '<font color="#990000"><u>Galerie Foto</u></font> | ';}
   else {print '<a class="main_links" href="' . $ga . '">Galerie Foto</a>  | ';}
   
   if ($ar_link) { print '<font color="#990000"><u>Articole</u></font> | ';}	
   else {print '<a class="main_links" href="' . $ar . '">Articole</a> | ';}
   
   if ($co_link) { print '<font color="#990000"><u>Contact</u></font> | ';}
   else { print '<a class="main_links" href="' . $co . '">Contact</a> | ';}
   
   if ($fo_link) { print '<font color="#990000"><u>Forum</u></font> ';}
   else { print '<a class="main_links" href="forum/forum.php">Forum</a>' ;}
   ?>
   	
	</center>
	</div>
	</td>
  </tr>