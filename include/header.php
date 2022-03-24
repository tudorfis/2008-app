<?php

//gestionarea erorilor
ini_set('display_errors',1);
error_reporting(E_ERROR);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="<?php if (IN_FORUM) { print '../'; } ?>favicon.ico" type="image/ico" /> 

<meta name="description" content="Bridge Club Apullum Situat in Alba Iulia organizeaza concursuri, evenimente, cursuri
si alte activitati care tin de jocul de Bridge. Clubul este situat pe B-dul Victoriei, 
in curte la societatea de transport Intertrans, situata vis-a-vis de Mobexpert. " />
<meta name="keywords" content="Bridge, Alba, Iulia, Alba-Iulia, Apullum, Club" />
<meta name="author" content="Todorescu Tudor" />
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />

<title>.:: Bridge Club Apullum - Alba Iulia - <?php print SITE_TITLE ?> ::.</title>

<link rel="stylesheet" href="<?php if (IN_FORUM) { print '../'; } ?>css/main_design.css" />
<script type="text/javascript" src="<?php if (IN_FORUM) { print '../'; } ?>popup_imgbox.js"></script>
<script type="text/javascript">

var remembervalues_days=60 //Remember text input values for how many days?
var dyncookiename=encodeURI(window.location.pathname) //Name of cookie. Changes depending on the page.

var recallinput=function(){
var cookienamevalue=rememberinput.getCookie(dyncookiename).split("##")
for (var i=0; i<cookienamevalue.length; i++){
var cookiename=cookienamevalue[i].split("#")[0]
var cookievalue=cookienamevalue[i].split("#")[1]
if (document.getElementById(cookiename)!=null && document.getElementById(cookiename).type=="text") //if this text field has a stored value
document.getElementById(cookiename).value=decodeURI(cookievalue)
}
}

var rememberinput=function(){
var rememberit=""
for (var i=0; i<arguments.length; i++){
if (document.getElementById(arguments[i]).type=="text" && document.getElementById(arguments[i]).value!="") //if this is a form text INPUT and not empty
rememberit+=arguments[i]+"#"+encodeURI(document.getElementById(arguments[i]).value)+"##"
}
rememberinput.setCookie(dyncookiename, rememberit, remembervalues_days)
}

rememberinput.getCookie=function(Name){ //get cookie value
var re=new RegExp(Name+"=[^;]+", "i"); //construct RE to search for target name/value pair
if (document.cookie.match(re)) //if cookie found
return document.cookie.match(re)[0].split("=")[1] //return its value
return ""
}

rememberinput.setCookie=function(name, value, days){ //set cookie value
var expireDate = new Date()
//set "expstring" to either future or past date, to set or delete cookie, respectively
var expstring=expireDate.setDate(expireDate.getDate()+parseInt(days))
document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+";";
}

if (window.addEventListener)
window.addEventListener("load", recallinput, false)
else if (window.attachEvent)
window.attachEvent("onload", recallinput)
else if (document.getElementById)
window.onload=recallinput
</script>
<!-- LightBox -->
<script type="text/javascript" src="http://www.bridge-apullum.ro/js/jquery.js"></script>
<script type="text/javascript" src="http://www.bridge-apullum.ro/js/lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.bridge-apullum.ro/css/lightbox.css" media="screen" />
</head>

<body class="main">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="vertical-align:top" id="main_t">
  <tr>
    <td width="184" height="83" valign="bottom"><img src="<?php if (IN_FORUM) { print '../'; } ?>images/brg_01.jpg" width="332" height="150" /></td>
    <td width="100%" height="150" rowspan="1" valign="top" style="background-color:#86C127;" align="center">
 <img src="<?php if (IN_FORUM) { print '../'; } ?>images/brg_02.jpg" width="668" height="100" style="margin-top:30px;" />  </td>
  </tr>
