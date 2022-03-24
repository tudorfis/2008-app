<?php

//Contact

//Header
define(SITE_TITLE, "Contact");
define(IN_FORUM, false);
include("include/header.php");

//Links Left
define(LEFT_LINKS,' ');
define(IN_FORUM, false);
include("include/links_left.php");

//Links Main
define(SITE_PAGE,5);
define(IN_FORUM, false);
include("include/links_main.php");

//Footer
$contact = '<div class="title_main">Cum puteti lua legatura cu noi</div>
<div class="text_main"><pre>
    <font size="+2"><b>Adrese mail:</b></font>

        office@bridge-apullum.ro
        presedinte@bridge-apullum.ro
        secretar@bridge-apullum.ro
        concurs@bridge-apullum.ro


    <font size="+2"><b>Telefoane de contact:</b></font>

<b>Presedinte:</b> Monica Garneata - tel.: +40740 078 331
<b>Probleme organizatorice:</b> Marius Orosan - tel.: +40745 636 596
</pre><br />
<a href="sendmail.php" style="margin-left:30px"><font size="+1"><b>Click aici pentru a trimite un mail siteului!</b></font></a><br /><br />
<a href="sendmail.php"><img src="images/mail.gif" height="80" width="80" border="0" style="margin-left:140px" /></a>
</div>';


define(MAIN_IFRAME,$contact);
define(IN_FORUM, false);
include("include/footer.php");


//////////////////////////////
?>
