<?php
session_start();
require_once('Connections/kor.php');
mysql_select_db($database_kor, $kor); 
$query3 = "SELECT * FROM empreses where codiempresa='".$_SESSION["empresa"]."'";
$detall3=mysql_query($query3, $kor) or die(mysql_error());
$dades3 = mysql_fetch_assoc($detall3);
$total3=mysql_num_rows($detall3);
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
var d=new Date();
var zeroo1="";
var zeroo2="";
var saldo=<?php echo $dades3["saldo"];?>;

	if(d.getHours().toString().length==1){zeroo1="0";}
	if(d.getMinutes().toString().length==1){zeroo2="0";}
var ladata=zeroo1+d.getHours()+":"+zeroo2+d.getMinutes();
</script>
<script language="javascript" src="js/funcions.js"></script>
<style type="text/css"></style></head>

<body>
<div id="contingut">
<div id="alertadenuncia">
  <div id="dadesdenuncia">
        <p id="titol" style="width:320px;">VEHICLE DENUNCIAT</p>
        <p id="matricula2" style="width:320px;font-size:10px; margin-top:3px;">DES D'AQUESTA PANTALLA ES POT ANULAR LA DEN&Uacute;NCIA</p>
  </div>
</div>
<div id="denuncia">
<p id="titolcurt">ID</p><p id="titolcurt">CODI</p>
<p id="dadacurta">00943862</p><p id="dadacurta">00943862</p>
<p id="titolllarg">CONCEPTE</p>
<p id="dadallarga">Manca de comprovant horari</p>
<p id="titolcurt">AGENT</p><p id="titolcurt">HORA</p>
<p id="dadacurta">00943862</p><p id="dadacurta">21:35</p>
<p id="titolllarg">ADRE&Ccedil;A</p>
<p id="dadallarga">c/Pasqual i Prats, 22</p>
<p id="dadallarga" style="margin-top:20px;">Girona</p>
<p id="titolllarg">ANULACIÓ</p>
<p id="cost">6,20<span class="euro">&euro;</span></p>
<div id="caixasaldo">
<div id="textsaldo">SALDO</div>
<div id="saldo"><?php echo str_replace(".",",",$dades3["saldo"]);?><span style="font-size:15px;">&euro;</span></div>
</div>
<form name="anuladenuncia" method="post" action="principal.php">
<input type="hidden" name="accio" value="anuladenuncia" />
</form>
<form name="anulapagament" method="post" action="principal.php">
<input type="hidden" name="accio" value="anulapagament" />
</form>
<div id="botook" ><a href="#" onclick="document.forms['anuladenuncia'].submit();return false;"><img src="img/boto_pagadenuncia.png" width="130" height="33" style="margin-left:10px;" /></a><a href="#" onclick="document.forms['anulapagament'].submit();return false;"><img src="img/boto_anulapagament.png" width="130" height="33" style="margin-left:10px;" /></a></div>
</div>
</body>
</html>