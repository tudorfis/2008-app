<?php
print '<link rel="stylesheet" href="../../css/main_design.css" />';
//print '<script type="text/javascript" src="../../include/popup_imgbox.js"></script>';

//<!-- LightBox -->
echo '<script type="text/javascript" src="http://www.bridge-apullum.ro/js/jquery.js"></script>
<script type="text/javascript" src="http://www.bridge-apullum.ro/js/lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.bridge-apullum.ro/css/lightbox.css" media="screen" />';


//Galerie Cupa Unirii 2008
$link1 = file_get_contents('cupa_unirii_2008_gal.html');
$link1 .= '<div class="gallery" onmouseover="$(\'.gallery a\').lightBox();">';
for ($i=3;$i<=24;$i++) { $link1.= '
<a href="http://www.bridge-apullum.ro/pages/galerie/cupa_unirii_2008/big/'.$i.'.JPG" title="www.bridge-apullum.ro" target="_blank">
                <img src="http://www.bridge-apullum.ro/pages/galerie/cupa_unirii_2008/thumbails/'.$i.'.JPG" style="width:150px;height:110px;" border="0" />
            </a>';}


//Galerie Cupa Unirii 2009
$link2 = file_get_contents('cupa_unirii_2009_gal.html');


//Galerie Cupa Unirii 2011
$link4 = file_get_contents('Cupa Unirii 2011.html');
$link4 .= '<div class="gallery" onmouseover="$(\'.gallery a\').lightBox();">';
for ($i=4;$i<=172;$i++) { $link4.= 
'<a href="http://www.bridge-apullum.ro/pages/galerie/cupa_unirii_2011/big/'.$i.'.jpg" title="www.bridge-apullum.ro" target="_blank">
                <img src="http://www.bridge-apullum.ro/pages/galerie/cupa_unirii_2011/thumbails/'.$i.'.jpg" style="width:150px;height:110px;" border="0" />
            </a>';}
$link4.= '</div></div>';


//Poze Locale
$link3 = file_get_contents('poze_locale.html');



$p = $_GET['p'];
if (!isset($p)) { $p = 1 ;};

$p = $_GET['p'];
if (!isset($p)) { $p = 4 ;};


switch ($p) {
case 1: print $link1; break;
case 2: print $link2; break;
case 3: print $link3; break;
case 4: print $link4; break;
}
?>