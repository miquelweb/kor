<?php
session_start();
require_once('Connections/kor.php');
mysql_select_db($database_kor, $kor); 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta name="apple-mobile-web-app-capable" content="yes" />  
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />  
        <link rel="apple-touch-icon" href="img/icon.png"/> 
<title>K.O.R. - King of recycling</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estils.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="js/jquery-1.5.1.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script language="javascript" src="js/infobox.js"></script>
</head>

<body>
<div id="contingut">
<div id="menu">
<form name="mapa" action="mapa.php"></form>
<form name="recicla" action="recicla.php"></form>
<form name="estadistiques" action="estadistiques.php"></form>
<a href="#" onclick="document.forms['recicla'].submit();return false;"><img src="img/menu_recicla.png" width="134" height="141" /></a>
<a href="#"><img src="img/menu_bossa.png" width="139" height="141" /></a>
<a href="#"><img src="img/menu_historial.png" width="133" height="147" /></a>
<a href="#" onclick="document.forms['mapa'].submit();return false;"><img src="img/menu_mapa.png" width="140" height="147" /></a>
<a href="#" onclick="document.forms['estadistiques'].submit();return false;"><img src="img/menu_medalles.png" width="133" height="148" /></a>
<a href="#"><img src="img/menu_perfil.png" width="140" height="148" /></a>
</div>
</body>
</html>