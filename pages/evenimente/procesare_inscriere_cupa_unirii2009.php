<?php 

    //gestionarea erorilor
    ini_set('display_errors',0);
    error_reporting(E_ALL & ~E_NOTICE);

    //Conectarea la baza de date!
    include("config.php");


    print '<link rel="stylesheet" href="../../css/main_design.css" />';

    ////////////////////// VERIFICARE CNP /////////////////////

    function vercnp($cnp_primit)
    {

        $rez = true;
        $cnp['cnp primit'] = $cnp_primit;
        $cnp['sex'] = $cnp['cnp primit']{0};        
        $cnp['an'] = $cnp['cnp primit']{1}.$cnp['cnp primit']{2};              
        $cnp['luna']    = $cnp['cnp primit']{3}.$cnp['cnp primit']{4};      
        $cnp['zi']    = $cnp['cnp primit']{5}.$cnp['cnp primit']{6};                                 
        $cnp['judet'] = $cnp['cnp primit']{7}.$cnp['cnp primit']{8};                                             
        $cnp['suma de control'] = $cnp['cnp primit']{0} * 2 + $cnp['cnp primit']{1} * 7 + 
        $cnp['cnp primit']{2} * 9 + $cnp['cnp primit']{3} * 1 + $cnp['cnp primit']{4} * 4 + 
        $cnp['cnp primit']{5} * 6 + $cnp['cnp primit']{6} * 3 + $cnp['cnp primit']{7} * 5 + 
        $cnp['cnp primit']{8} * 8 + $cnp['cnp primit']{9} * 2 + $cnp['cnp primit']{10} * 7 + 
        $cnp['cnp primit']{11} * 9;
        $cnp['rest'] = fmod($cnp['suma de control'], 11);

        if($cnp['sex'] != 1 && $cnp['sex'] != 2 && $cnp['sex'] != 5 && $cnp['sex'] != 6)
            $rez = false;

        if($cnp['luna'] > 12 || $cnp['luna'] == 0)
            $rez = false;

        if($cnp['zi'] > 31 || $cnp['zi'] == 0)
            $rez = false;

        if (is_numeric($cnp['luna']) && is_numeric($cnp['zi']) && is_numeric($cnp['an']))
        {
            if (!checkdate($cnp['luna'],$cnp['zi'],$cnp['an']))
                $rez = false;
        }

        if($cnp['judet'] > 52 || $cnp['judet'] == 0)
            $rez = false;




        return $rez;
    }

    /////////////////////////////////////////////////////////////////////////////////////


    ////////////////////////////// MEMORAREA DATELOR IN COOKIE //////////////////////////

    $remember_data_jscript = '<script type="text/javascript">

    var remembervalues_days=60 
    var dyncookiename=encodeURI(window.location.pathname) 

    var recallinput=function(){
    var cookienamevalue=rememberinput.getCookie(dyncookiename).split("##")
    for (var i=0; i<cookienamevalue.length; i++){
    var cookiename=cookienamevalue[i].split("#")[0]
    var cookievalue=cookienamevalue[i].split("#")[1]
    if (document.getElementById(cookiename)!=null && document.getElementById(cookiename).type=="text") 
    document.getElementById(cookiename).value=decodeURI(cookievalue)
    }
    }

    var rememberinput=function(){
    var rememberit=""
    for (var i=0; i<arguments.length; i++){
    if (document.getElementById(arguments[i]).type=="text" && document.getElementById(arguments[i]).value!="")
    rememberit+=arguments[i]+"#"+encodeURI(document.getElementById(arguments[i]).value)+"##"
    }
    rememberinput.setCookie(dyncookiename, rememberit, remembervalues_days)
    }

    rememberinput.getCookie=function(Name){ 
    var re=new RegExp(Name+"=[^;]+", "i"); 
    if (document.cookie.match(re))
    return document.cookie.match(re)[0].split("=")[1] 
    return ""
    }

    rememberinput.setCookie=function(name, value, days){ 
    var expireDate = new Date()

    var expstring=expireDate.setDate(expireDate.getDate()+parseInt(days))
    document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+";";
    }

    if (window.addEventListener)
    window.addEventListener("load", recallinput, false)
    else if (window.attachEvent)
    window.attachEvent("onload", recallinput)
    else if (document.getElementById)
    window.onload=recallinput
    </script>';

    ///////////////////////////////////////////////////////////////////////////////////

    /*  onSubmit="rememberinput(\'nume1_id\', \'nume2_id\', \'prenume1_id\', \'prenume2_id\', \'cnp1_id\', \'cnp2_id\', \'oras1_id\', \'oras2_id\', \'mail1_id\', \'mail2_id\', \'telefon1_id\', \'telefon2_id\')" onLoad="recallinput(\'nume1_id\', \'nume2_id\', \'prenume1_id\', \'prenume2_id\', \'cnp1_id\', \'cnp2_id\', \'oras1_id\', \'oras2_id\', \'mail1_id\', \'mail2_id\', \'telefon1_id\', \'telefon2_id\')" */


    $the_head = '
    <html>
    <head>
    <title>.</title>' . $remeber_data_jscript . '
    </head>
    <body onLoad="recallinput">

    <div class="title_main"><center>Cupa Unirii '.date('Y').' - Inscrieri</center></div><br />
    <div class="text_main">
    Inscrierile se fac pe axe. Va rugam sa va introduceti datele dumneavoastra si ale partenerului. Daca doriti sa primiti stiri sau informatii legate de desfasurarea concursului, va puteti activa mai jos optiunea care realizeaza acest lucru. Informatii in legatura cu cazarea gasiti -<a href="../../evenimente.php?p=10" target="_blank">aici</a>-.<br /><br /><i>Pentru orice nelamurire puteti trimite un mail -<a href="../../sendmail.php" target="_blank">aici</a>-, la adresa <b>office@bridge-apullum.ro</b>. Raspunsul il veti primi in cel mai scurt timp posibil.</i><br /><br /><hr /><font color="#FF0000"><b>ATENTIE!</b></font> Adresa de mail si numarul de telefon al celui de-al doilea inscris nu sunt necesare. Este suficienta doar o persoana de contact.</div><hr />';


    $the_form = '<form action="procesare_inscriere_cupa_unirii2009.php" method="post" name="the_form" id="the_form">
    <table width="640" border="0" align="left" cellpadding="2" cellspacing="0" bordercolor="#666666" class="text_main" style="margin-left:0px;margin-top:15px;margin-bottom:15px;maring-right:15px">
    <tr><td valign="top" align="left" width="55px"><b>Nume, prenume:</b> </td><td valign="top" align="left">
    <input id="nume1_id" type="text" name="nume1" maxlength="30" size="30" title="Introduceti Numele." value="' . $_POST ['nume1'] . '" /> <input id="prenume1_id" type="text" name="prenume1" maxlength="30" size="30" title="Introduceti Prenumele." value="' . $_POST ['prenume1'] . '" /></td>
    <td valign="top" align="left" width="55px"><b>Nume, prenume:</b> </td><td valign="top" align="left">
    <input id="nume2_id" type="text" name="nume2" maxlength="30" size="30" title="Introduceti Numele." value="' . $_POST ['nume2'] . '" /> <input id="prenume2_id" type="text" name="prenume2" maxlength="30" size="30" title="Introduceti Prenumele." value="' . $_POST ['prenume2'] . '" /></td></tr>
    <tr><td valign="top" align="left" width="55px"><b>CNP:</b> </td><td valign="top" align="left">
    <input id="cnp1_id" type="text" name="cnp1" maxlength="30" size="30" title="Introduceti CNP-ul." value="' . $_POST ['cnp1'] . '" /> </td>
    <td valign="top" align="left" width="55px"><b>CNP:</b> </td><td valign="top" align="left">
    <input id="cnp2_id" type="text" name="cnp2" maxlength="30" size="30" title="Introduceti CNP-ul." value="' . $_POST ['cnp2'] . '" /> </td></tr>
    <tr><td valign="top" align="left" width="55px"><b>Oras:</b> </td><td valign="top" align="left">
    <input id="oras1_id" type="text" name="oras1" maxlength="30" size="30" title="Introduceti Orasul." value="' . $_POST ['oras1'] . '" /> </td>
    <td valign="top" align="left" width="55px"><b>Oras:</b> </td><td valign="top" align="left">
    <input id="oras2_id" type="text" name="oras2" maxlength="30" size="30" title="Introduceti Orasul." value="' . $_POST ['oras1'] . '" /> </td></tr>
    <tr><td valign="top" align="left" width="55px"><b>Mail:</b> </td><td valign="top" align="left">
    <input id="mail1_id" type="text" name="mail1" maxlength="30" size="30" title="Introduceti Adresa de Mail." value="' . $_POST ['mail1'] . '" /> </td>
    <td valign="top" align="left" width="55px"><b>Mail:</b> </td><td valign="top" align="left">
    <input id="mail2_id" type="text" name="mail2" maxlength="30" size="30" title="Introduceti Adresa de Mail." value="' . $_POST ['mail2'] . '" /> </td></tr>

    <tr>
    <td valign="top" align="left" width="55px"><b>Telefon:<br />40123456789</b> </td><td valign="top" align="left">
    <input id="telefon1_id" type="text" name="telefon1" maxlength="30" size="30" title="Introduceti Numarul de Telefon." value="' . $_POST ['telefon1'] . '" /> </td>

    <td valign="top" align="left" width="55px"><b>Telefon:<br />40123456789</b> </td><td valign="top" align="left">
    <input id="telefon2_id" type="text" name="telefon2" maxlength="30" size="30" title="Introduceti Numarul de Telefon." value="' . $_POST ['telefon2'] . '" /> </td></tr>

    '; ////////////////// fb /////////////////////// 
    $the_form .= '<tr>




    </tr>'; ////////////////////////////////////////

    $the_form .= '
    <tr><td colspan="4">&nbsp;</td></tr>
    <tr>
    <td align="center" colspan="4"><hr /><input id="abonare1_id" type="checkbox" name="abonare1" title="Informatii Referitoare La Concurs Pe Mail?" /><b> Doriti sa primti mail-uri cu informatii legate de concurs? </b> <input id="abonare2_id" type="checkbox" name="abonare2" title="Informatii Referitoare La Concurs Pe Mail?" /><hr /></td>
    </tr>

    <tr><td align="center" colspan="2">
    <img id="imgCaptcha_id" style="margin-right:15px;margin-top:5px;vertical-align:bottom;" src="../../include/create_image.php" border="0" /> <input id="captcha_id" type="text" name="captcha" maxlength="5" size="10" title="Confirmati Codul din Imagine." value="" style="veritcal-align:top;"/><hr /></td>
    <td valign="bottom" align="left" colspan="2">
    <input type="submit" name="submit" value="Inscriere" style="margin-left:30px" /> <input type="reset" value="Resetare" /><hr /></td></tr>
    </table></form>
    </body>
    </html>
    ';







    if (isset($_REQUEST['submit'])) { //(DACA S-A DAT SUBMIT)


        //PRELUAREA VARIABILELOR
        ///////////////////////////

        $nume1 = $_REQUEST['nume1'];$nume1 = strtolower($nume1);$nume1 = ucfirst($nume1);
        $prenume1 = $_REQUEST['prenume1'];$prenume1 = strtolower($prenume1);$prenume1 = ucfirst($prenume1);
        $cnp1 = $_REQUEST['cnp1'];
        $oras1 = $_REQUEST['oras1'];$oras1 = strtolower($oras1);$oras1 = ucwords($oras1);
        $mail1 = $_REQUEST['mail1'];$mail1 = strtolower($mail1);
        $telefon1 = $_REQUEST['telefon1'];
        $abonare1 = $_REQUEST['abonare1'];;
        $aceasi = $_REQUEST['aceasi'];

        $nume2 = $_REQUEST['nume2'];$nume2 = strtolower($nume2);$nume2 = ucfirst($nume2);
        $prenume2 = $_REQUEST['prenume2'];$prenume2 = strtolower($prenume2);$prenume2 = ucfirst($prenume2);
        $cnp2 = $_REQUEST['cnp2'];
        $oras2 = $_REQUEST['oras2'];$oras2 = strtolower($oras2);$oras2 = ucwords($oras2);
        $mail2 = $_REQUEST['mail2'];$mail2 = strtolower($mail2);
        $telefon2 = $_REQUEST['telefon2'];
        $abonare2 = $_REQUEST['abonare2'];
        $captcha = $_REQUEST['captcha']; 
        $key = $_COOKIE['key']; 
        $corect = true;

        //Cazarea ///////// fb //////////////
        $alba1 = $_REQUEST['alba1']; $alba2 = $_REQUEST['alba2'];

        if ($alba1 != 'true') {
            $hotel1 = $_REQUEST['hotel1'];
            $nr_cam1= $_REQUEST['nr_cam1'];
            $tip_cam1 = $_REQUEST['tip_cam1'];
        } 
        elseif ($alba1 == 'true') {$hotel1 = '------';}

        if ($alba2 != 'true') {   
            $hotel2 = $_REQUEST['hotel2'];
            $nr_cam2= $_REQUEST['nr_cam2'];
            $tip_cam2 = $_REQUEST['tip_cam2'];
        }   
        elseif ($alba2 == 'true') { $hotel2 = '------';}

        if ($aceasi == 'true') { $hotel2 = 'Camera lui '.$nume1.' '.$prenume1 ;} 
        ///////////////////////////////////////

        //Abonarea
        if ($abonare1) { $abonare1 = 1;}
        else { $abonare1 = 0;}
        if ($abonare2) { $abonare2 = 1;}
        else { $abonare2 = 0;}

        //Inscris site
        $inscris_site = 1;

        //Achitat taxa
        $achitat_taxa = 0;

        //unique identification
        $uid = rand(100000,999999);   


        //The IP
        $ip_adress = $_SERVER['REMOTE_ADDR'];

        //Date Entered
        $date_entered = date("F j, Y, g:i a");

        ///////////////////////////////////////////////////////


        //Verificarea datelor introduse
        ///////////////////////////////

        //Primul inregistrat
        //////////////////////// 
        //numele 
        if (!$nume1 || strlen($nume1 = trim($nume1)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numele primului inscris nu a fost introdus!</font><br />'; $corect = false;
        }

        //prenumele 
        if (!$prenume1 || strlen($prenume1 = trim($prenume1)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Prenumele primului inscris nu a fost introdus!</font><br />'; $corect = false;
        }

        $regex = "^[0-9]{13}$";
        $rezultat = vercnp($cnp1);
        //cnp
        if (!$cnp1 || strlen($cnp1 = trim($cnp1)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul primului inscris nu a fost introdus!</font><br />'; $corect = false;
        }
        elseif (!eregi($regex,$cnp1)) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul primului inscris nu este format din 13 cifre sau nu este numeric!</font><br />'; $corect = false; }

        else { if (!$rezultat) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul primului inscris nu este corect!</font><br />'; $corect = false; } }      

        //orasul 
        if (!$oras1 || strlen($oras1 = trim($oras1)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Orasul primului inscris nu a fost introdus!</font><br />'; $corect = false;
        }

        //adresa vizitatorului
        if (!$mail1 || strlen($mail1 = trim($mail1)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa mail a primului inscris nu a fost introdusa!</font><br />'; $corect = false;
        }
        else{  
            $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
            ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
            ."\.([a-z]{2,}){1}$"; 
            if(!eregi($regex,$mail1)){ $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa mail a primului inscris nu este corecta!</font><br />'; $corect = false; }
        }

        //telefon
        if (!$telefon1 || strlen($telefon1 = trim($telefon1)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de telefon a primului inscris nu a fost introdus!</font><br />'; $corect = false;
        }
        else  { $regex = "^[0-9]{11}"; if (!eregi($regex,$telefon1)) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de telefon a primului inscris nu este corect! (ATENTIE, formatul pentru telefon este: 40258111111)</font><br />'; $corect = false; }
        }

        ///////////////////////if ($alba1 != 'true') {  
        //Hotel
        /////////////////////if ($hotel1 == '') {
        ////////////////////$mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Hotelul primului inscris nu a fost selectat!</font><br />'; $corect = false;} 

        //Nr Cam
        //////////////////////if ($nr_cam1 == '') {
        /////////////////////$mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de camere primului inscris nu a fost selectat!</font><br />'; $corect = false;} 

        //Tip Cam
        ////////////////////if ($tip_cam1 == '') {
        ////////////////////////$mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Tipul camerei(lor) primului inscris nu a fost selectat!</font><br />'; $corect = false;} 
        //////////////////////////}



        //Al doilea inregistrat
        ///////////////////////
        //numele 
        if (!$nume2 || strlen($nume2 = trim($nume2)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numele celui de-al doilea inscris nu a fost introdus!</font><br />'; $corect = false;
        }

        //prenumele 
        if (!$prenume2 || strlen($prenume2 = trim($prenume2)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Prenumele celui de-al doilea inscris nu a fost introdus!</font><br />'; $corect = false;
        }


        $regex = "^[0-9]{13}$";
        $rezultat = vercnp($cnp2);
        //cnp
        if (!$cnp2 || strlen($cnp2 = trim($cnp2)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul celui de-al doilea inscris nu a fost introdus!</font><br />'; $corect = false;                     }

        elseif (!eregi($regex,$cnp2)) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul celui de-al doilea inscris nu este format din 13 cifre sau nu este numeric!</font><br />'; $corect = false; }




        //orasul 
        if (!$oras2 || strlen($oras2 = trim($oras2)) == 0){
            $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Orasul celui de-al doilea inscris nu a fost introdus!</font><br />'; $corect = false;
        }

        //adresa vizitatorului
        /* if (!$mail2 || strlen($mail2 = trim($mail2)) == 0){
        $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa mail a celui de-al doilea inscris nu a fost introdusa!</font><br />'; $corect = false;
        }
        else{ */  
        $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
        ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
        ."\.([a-z]{2,}){1}$"; 
        if ($mail2) { if(!eregi($regex,$mail2)){ $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa mail a celui de-al doilea inscris nu este corecta!</font><br />'; $corect = false; }
        }
        /*       } */

        //telefon
        /*    if (!$telefon2 || strlen($telefon2 = trim($telefon2)) == 0){
        $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de telefon al  celui de-al doilea inscris nu a fost introdus!</font><br />'; $corect = false;
        }
        else  { */ $regex = "^[0-9]{11}$"; 

        if ($telefon2) { if (!eregi($regex,$telefon2)) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de telefon al celui de-al doilea inscris nu este corect! (ATENTIE, formatul pentru telefon este: 40258111111)</font><br />'; $corect = false; } }

        if ($alba2 != 'true' && $aceasi != 'true') {
            //Hotel
            ////////////////////////////////////if ($hotel2 == '') {
            ///////////////////////////////////$mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Hotelul celui de-al doilea inscris nu a fost selectat!</font><br />'; $corect = false;} 

            //Nr Cam
            /////////////////////////////////////if ($nr_cam2 == '') {
            ////////////////////////////////////$mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de camere a celui de-al doilea inscris nu a fost selectat!</font><br />'; $corect = false;} 

            //Tip Cam
            ///////////////////////////////////if ($tip_cam2 == '') {
            /////////////////////////////////////$mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Tipul camerei(lor) celui de-al doilea inscris nu a fost selectat!</font><br />'; $corect = false;} 
        }

        /* } */

        //////////////////////////////

        //imaginea de confirmare
        if ($captcha != $key) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Codul de confirmare nu coincide cu imaginea!</font><br />'; $corect = false; };

        //Verificare daca datele nu sunt cumva la fel la ambii inregistrati
        if ( ((strlen($cnp1) != 0) && (strlen($cnp2) != 0)) && $cnp1 == $cnp2) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-urile ambilor inscrisi trebuie sa fie diferite!</font><br />'; $corect = false; };

        /* if ( ((strlen($mail1) != 0) && (strlen($mail2) != 0)) && $mail1 == $mail2) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Mailurile ambilor inscrisi trebuie sa fie diferite!</font><br />'; $corect = false; };

        if ( ((strlen($telefon1) != 0) && (strlen($telefon2) != 0)) && $telefon1 == $telefon2) { $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numerele de telefon ale ambilor inscrisi trebuie sa fie diferite!</font><br />'; $corect = false; };
        */










        //Verificarea daca cnp-ul, adresa de mail sau numarul de telefon exista deja
        $query = 'SELECT * FROM `participanti_cu_'.date('Y').'` ORDER BY time_stamp DESC';
        $problem_cnp1 = false; $problem_mail1 = false; $problem_telefon1; $x1 = false; $y1 = false; $z1 = false;
        $problem_cnp2 = false; $problem_mail2 = false; $problem_telefon2; $x2 = false; $y2 = false; $z2 = false;

        if ($r = @mysqli_query($dbc, $query)) {
            while ($row = mysqli_fetch_array($r)) {

                if ($cnp1 == $row['cnp'])  { $problem_cnp1 = true;}
                if ($mail1 == $row['mail']) { $problem_mail1 = true; }
                if ($telefon1 == $row['telefon']) { $problem_telefon1 = true; }
                if ($cnp2 == $row['cnp'])  { $problem_cnp2 = true;}
                if ($mail2) { if ($mail2 == $row['mail']) { $problem_mail2 = true; } }
                if ($telefon2) { if ($telefon2 == $row['telefon']) { $problem_telefon2 = true; } }                                

            } 
        }

        if ($problem_cnp1) {  $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul primului inscris a mai fost odata introdus!</font><br />';$corect = false; };

        if ($problem_mail1) {  $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa de mail al primului inscris a mai fost odata introdusa!</font><br />';$corect = false;};

        if ($problem_telefon1) {  $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de telefon al primului inscris a mai fost odata introdus!</font><br />';$corect = false;};

        if ($problem_cnp2) {  $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* CNP-ul celui de-al doilea inscris a mai fost odata introdus!</font><br />';$corect = false;};

        if ($problem_mail2) {  $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Adresa de mail a celui de-al doilea inscris a mai fost odata introdusa!</font><br />';$corect = false;};

        if ($problem_telefon2) {  $mesaj.='<font style="color:#FF0000;padding-left:15px;margin-top:15px;">* Numarul de telefon a celui de-al doilea inscris a mai fost odata introdus!</font><br />';$corect = false;};



        if (!$corect) {
            print $the_head;
            print $mesaj;
            print $the_form;
        }

        else { 


            //Pentru Baza de date
            $nume1 = $nume1 . ' ' . $prenume1;
            $nume2 = $nume2 . ' ' . $prenume2;

            $query1 = "INSERT INTO `participanti_cu_".date("Y")."` (nume, cnp, oras, mail, telefon, hotel, nr_cam, tip_cam, abonare, inscris_site, achitat_taxa, uid, ip_adress, date_entered, time_stamp) VALUES ('$nume1', '$cnp1', '$oras1', '$mail1', '$telefon1', '$hotel1', '$nr_cam1', '$tip_cam1', '$abonare1', '$inscris_site', '$achitat_taxa', '$uid', '$ip_adress', '$date_entered', NOW())";

            $query2 = "INSERT INTO `participanti_cu_".date("Y")."` (nume, cnp, oras, mail, telefon, hotel, nr_cam, tip_cam, abonare, inscris_site, achitat_taxa, uid, ip_adress, date_entered, time_stamp) VALUES ('$nume2', '$cnp2', '$oras2', '$mail2', '$telefon2', '$hotel2', '$nr_cam2', '$tip_cam2', '$abonare2', '$inscris_site', '$achitat_taxa', '$uid', '$ip_adress', '$date_entered', NOW())";


            //Pentru trimitere de mail
            if ($abonare1 == 1) { $extra_cont1 = 'Ati ales optiunea pentru a fii abonat pentru primire de mail-uri <br />cu ultimele stiri si informatii legate de concurs<br />'; }
            elseif ($abonare1 == 0) { $extra_cont1 = 'Nu ati ales optiunea pentru a fii abonat pentru primire de mail-uri <br />cu ultimele stiri si informatii legate de concurs<br />'; }

            if ($abonare2 == 1) { $extra_cont2 = 'Ati ales optiunea pentru a fii abonat pentru primire de mail-uri <br />cu ultimele stiri si informatii legate de concurs<br />'; }
            elseif ($abonare2 == 0) { $extra_cont2 = 'Nu ati ales optiunea pentru a fii abonat pentru primire de mail-uri <br />cu ultimele stiri si informatii legate de concurs<br />'; }



            $mime_boundary = "----Bridge_Club_Apullum----".md5(time());
            $dela = "From: Bridge Apullum <concurs@bridge-apullum.ro>\n";
            $dela .= "Reply-To: Bridge Apullum <concurs@bridge-apullum.ro>\n";
            $dela .= "MIME-Version: 1.0\n";
            $dela .= "Content-Type: text/html; boundary=\"$mime_boundary\"\n"; 


            //Primul inscris
            $catre1 = $mail1;
            $subiect1 = 'Inscriere "Cupa Unirii '.date('Y').'" - bridge-apullum.ro';
            $continut1 = ' Ati fost inscris cu succes la concursul de bridge, "Cupa Unirii '.date('Y').'", organizat la Alba-Iulia. <br />Pentru orice nelamurire, detalii legate de concurs trimite-ti un mail la adresa: <b>concurs@bridge-apullum.ro</b>.<br /><br />  
            Datele introduse sunt: <br />

            <table border="0" cellpadding="2" cellspacing="0" align="left" style="margin-left:10px;">
            <tr><td align="left"><b>Numele</b>: </td><td align="left"> ' . $nume1 . '</td></tr>
            <tr><td align="left"><b>CNP</b>: </td><td align="left"> ' . $cnp1 . '</td></tr>
            <tr><td align="left"><b>Oras</b>: </td><td align="left">' . $oras1 . '</td></tr>
            <tr><td align="left"><b>Mail</b>: </td><td align="left">' . $mail1 . '</td></tr>
            <tr><td align="left"><b>Telefon</b>: </td><td align="left">' . $telefon1 . '</td></tr>
            <tr><td align="left"><b>Partener</b>: </td><td align="left"> ' . $nume2 . '</td></tr>

            <tr><td align="left"><font size="+1"><b>Cazare AXA</b></font>: </td><td align="left">&nbsp;</td></tr>
            <tr><td align="left"><b>Hotel</b>: </td><td align="left">' . $hotel1 . '</td></tr>
            <tr><td align="left"><b>Nr. si tipul de camere(a)</b>: </td><td align="left">' . $nr_cam1.' '.$tip_cam1.'</td></tr>
            <tr><td align="left">&nbsp;</td><td align="left">&nbsp;</td></tr>
            <tr><td colspan="2">' . $extra_cont1 . '</td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

            <b>Daca datele introduse nu sunt corecte trimite-ti un reply-mail pentru ca acestea sa fie inlocuite.</b><br /><br />
            <font size="+1"><i>Multumim, echipa bridge-apullum.ro</i></font>';

            //Al doilea inscris
            if (isset($mail2)) {
                $catre2 = $mail2;
                $subiect2 = 'Inscriere "Cupa Unirii '.date('Y').'" - bridge-apullum.ro';
                $continut2 = ' Ati fost inscris cu succes la concursul de bridge, "Cupa Unirii '.date('Y').'", organizat la Alba-Iulia. <br />Pentru orice nelamurire, detalii legate de concurs trimite-ti un mail la adresa: <b>concurs@bridge-apullum.ro</b>.<br /><br />  
                Datele introduse sunt: <br />

                <table border="0" cellpadding="2" cellspacing="0" align="left" style="margin-left:10px;">
                <tr><td align="left"><b>Numele</b>: </td><td align="left"> ' . $nume2 . '</td></tr>
                <tr><td align="left"><b>Partener</b>: </td><td align="left"> ' . $nume1 . '</td></tr>
                <tr><td align="left"><b>CNP</b>: </td><td align="left"> ' . $cnp2 . '</td></tr>
                <tr><td align="left"><b>Oras</b>: </td><td align="left">' . $oras2 . '</td></tr>';

                if (isset($mail2)) { $continut2 .= '<tr><td align="left"><b>Mail</b>: </td><td align="left">' . $mail2 . '</td></tr>';}
                if (isset($telefon2)) { $continut2 .= '<tr><td align="left"><b>Telefon</b>: </td><td align="left">' . $telefon2 . '</td></tr>';}

                $continut2 .= '
                <tr><td align="left"><font size="+1"><b>Cazare AXA</b></font>: </td><td align="left">&nbsp;</td></tr>
                <tr><td align="left"><b>Hotel</b>: </td><td align="left">' . $hotel2 . '</td></tr>
                <tr><td align="left"><b>Nr. si tipul de camere(a)</b>: </td><td align="left">' . $nr_cam2.' '.$tip_cam2.'</td></tr>
                <tr><td align="left">&nbsp;</td><td align="left">&nbsp;</td></tr>
                <tr><td colspan="2">' . $extra_cont2 . '</td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

                <b>Daca datele introduse nu sunt corecte trimite-ti un reply-mail pentru ca acestea sa fie inlocuite.</b><br /><br />
                <font size="+1"><i>Multumim, echipa bridge-apullum.ro</i></font>';
            }

            //Trimiterea mail-urilor
            /*if (@mail ($catre1, $subiect1, $continut1, $dela)) { 
            $mesaj = '<div class="title_main">Mail-ul a fost trimis cu succes primului inscris. </div> <br />';}
            else { $mesaj = '<div class="title_main">Ne pare rau dar mail-ul nu s-a putut trimite momentan primului inscris, va rugam sa incercati mai tarziu. </div> <br />' ;}

            if (@mail ($catre2, $subiect2, $continut2, $dela)) { 
            $mesaj .= '<div class="title_main">Mail-ul a fost trimis cu succes celui de-al doilea inscris.<br /><br /><font size="+3"><i> Va asteptam cu drag la Alba-Iulia. </i></font> </div> <br />';}
            else { $mesaj .= '<div class="title_main">Ne pare rau dar mail-ul nu s-a putut trimite momentan celui de-al doilea inscris, va rugam sa incercati mai tarziu. </div> <br />' ;}
            */


            //Efectuarea inregistrarii in baza de date si trimiterea mailurilor
                                    
            if (@mysqli_query($dbc, $query1) && @mysqli_query($dbc, $query2) && @mail($catre1, $subiect1, $continut1, $dela)) {

                if (isset($mail2)) { @mail($catre2, $subiect2, $continut2, $dela) ;} 

                print '<div class="title_main">Inscrierea s-a realizat cu succes!</div><br /> <div class="text_main"> Veti primi un  mail curand la adresele mentionate. <i>Administratia</i><br /><br />
                <center>[ Pentru a reveni click <a href="../../evenimente.php?p=2" target="_parent">aici</a>! ]</center> 
                </div>';
            }


            else { print '<div class="title_main">INSCRIEREA NU S-A PUTUT REALIZA!</div><br /><div class="text_main">  Momentan inscrierile sunt indisponibile, va rugam sa reveniti mai tarziu.<br /> <i>Multumim pentru intelgere, administratia</i><br /><br />
                <center>[ Pentru a reveni click <a href="../../evenimente.php?p=2" target="_parent">aici</a>! ]</center>
                </div>'; print 'eroare: '.mysqli_error($dbc);
                @mail('admin@bridge-apullum.ro', 'ATENTIE! Cupa Unirii 2009 - defect', 'Vezi ca ai probleme cu Cupa Unirii 2009 inscrierile, fa ceva in privinta asta! fishboneZ (ciudat suna :)) )', 'From: admin@bridge-apullum.ro');
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////
        }

    }  //End of SUBMIT IF.. 

    else {
        print $the_head;
        print $the_form;
    }


?>