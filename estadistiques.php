<?php
session_start();
require_once('Connections/kor.php');


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
<script language="javascript" src="js/jquery-1.5.js"></script>
<script language="javascript">


</script>
<script language="javascript" src="js/funcions.js"></script>
<style type="text/css"></style></head>

<body>
<div id="contingut">

<form name="principal" action="principal.php"></form>
<div id="barrasuperior"> <a  href="#" onclick="document.forms['principal'].submit();return false;"><img src="img/icon_enrera.png" width="42" height="31" /></a>
  <h3>Recicla!</h3>
  </div>
<img src="img/estadistiques.png" width="291" height="395" style="margin-top:10px;margin-left:10px;" /></div>

</body>
</html>