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
var re=new RegExp(Name+"=[^;]+", "i"); /
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
