<?php

//sendmail.php

//Header
define("SITE_TITLE", "Send Mail");
define("IN_FORUM", false);
include("include/header.php");

//Links Left
define("LEFT_LINKS",' ');
define("IN_FORUM", false);
include("include/links_left.php");

//Links Main
define("SITE_PAGE",5);
define("IN_FORUM", false);
include("include/links_main.php");


$sendmail .= '<div style="overflow-y:auto; width: 100%; height: 998px;"><br />';


////////////////////////////////////////////////


if (isset($_REQUEST['submit'])) { 

  $nume = $_REQUEST['numele'];
  $email = $_REQUEST['email'];
  $catre = $_REQUEST['catre'];
  $subiect = $_REQUEST['subiect'];
  $continut = $_REQUEST['continut'];
  
  $corect = true;
  
  
  //Verificarea datelor introduse
  ///////////////////////////////
  
  //numele
  if (!$nume || strlen($nume = trim($nume)) == 0){
         $sendmail.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numele nu a fost introdus!</font><br />'; $corect = false;
      }
  
  
  //adresa vizitatorului
  if (!$email || strlen($email = trim($email)) == 0){
         $sendmail.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa dvs. nu a fost introdusa!</font><br />'; $corect = false;
      }
      else{  
	  $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$"; 
         if(!eregi($regex,$email)){ $sendmail.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa dvs. nu este corecta!</font><br />'; $corect = false; }
	  
	        }
		
    //catre
	if (!$catre) { $sendmail.= '<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Precizati catre cine trimite-ti mailul!</font><br />';}
	
	
	//Subiectul
	if (!$subiect || strlen($subiect = trim($subiect)) == 0){
         $sendmail.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Subiectul nu a fost introdus!</font><br />'; $corect = false;
      }

	  
	  //Continutul
	if (!$continut || strlen($continut = trim($continut)) == 0){
         $sendmail.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Continutul nu a fost introdus!</font><br />'; $corect = false;
      }
      else{ 
	  if($continut == '- textul dumneavoastra aici -') {  $sendmail.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Continutul nu a fost introdus!</font><br />'; $corect = false;
	  
	  			}
      } 		
		
//SFARSITUL VERIFICARII DATELOR INTRODUSE		
		
			
			
									} //incheierea verificarii pt submit

    

  if (!$corect) {  //Cazul in care datele nu sunt corecte
  
$sendmail.= '
<div class="text_main">
<form action="sendmail.php" method="post"><pre>
Numele:      <input size="40" maxlength="50" type="text" name="numele" /><br>
Adresa dvs.: <input size="40" maxlength="50" type="text" name="email" /><br>
Catre:       <select name="catre" size="1">
<option value="">- Selectati adresa -</option>
<option value="1">office@bridge-apullum.ro</option>
<option value="2">presedinte@bridge-apullum.ro</option>
<option value="3">secretar@bridge-apullum.ro</option>
<option value="4">concurs@bridge-apullum.ro</option>
<option value="5">admin@bridge-apullum.ro</option>
</select><br>
Subiect:     <input size="40" maxlength="50" type="text" name="subiect" /><br>
Continut:    <textarea name="continut" rows="9" cols="60" wrap="soft" style="vertical-align:top;">- textul dumneavoastra aici -</textarea>

<center><input type="submit" name="submit" value="Trimitere" /> <a href="contact.php"><input type="button" value="Revino" /></center></a>
</pre>
</form>


 ';


$sendmail .= "</div>";
}

else {  //Trimiterea Mailului



switch ($catre) {
 case '1': $catre = 'office@bridge-apullum.ro';break;
 case '2': $catre = 'presedinte@bridge-apullum.ro';break;
 case '3': $catre = 'secretar@bridge-apullum.ro';break;
 case '4': $catre = 'concurs@bridge-apullum.ro';break;
 case '5': $catre = 'admin@bridge-apullum.ro';break;
 } 

$subiect = trim($subiect);
$subiect .= '   <' . $nume . '>';
$email = trim($email);


if (@mail ($catre, $subiect, $continut, 'From:' . $email)) { 
$sendmail .= '<div class="title_main">Mail-ul a fost trimis cu succes. Echipa bridge-apullum.ro v? va contacta cat de curand cu putinta. </div> <br />';}

else { $sendmail .= '<div class="title_main">Ne pare rau dar mail-ul nu s-a putut trimite momentan, va rugam sa incercati mai tarziu. </div> <br />' ;}

	} //Sfaristul else-ului


$sendmail .= '</div>';

//Footer
define(MAIN_IFRAME,$sendmail);
define(IN_FORUM, false);
include("include/footer.php");




//////////////////////////////
?>