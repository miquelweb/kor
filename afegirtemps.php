<?php
session_start();
require_once('Connections/kor.php');
mysql_select_db($database_kor, $kor); 
$query3 = "SELECT * FROM empreses where codiempresa='".$_SESSION["empresa"]."'";
$detall3=mysql_query($query3, $kor) or die(mysql_error());
$dades3 = mysql_fetch_assoc($detall3);
$total3=mysql_num_rows($detall3);
$query2 = "SELECT * FROM vehicles LEFT JOIN estacionaments ON vehicles.codivehicle=estacionaments.vehicle where codivehicle='".$_SESSION["vehicle"]."' order by estacionaments.codi desc LIMIT 1";
$detall2=mysql_query($query2, $kor) or die(mysql_error());
$dades2 = mysql_fetch_assoc($detall2);
$total2=mysql_num_rows($detall2);
$to_time=strtotime("now");
$from_time=strtotime($dades2["entrada"]);
$dif=round(($from_time - $to_time) / 60,2)+$dades2["durada"];
$hora=str_pad(floor(abs($dif/60)), 2, "0", STR_PAD_LEFT).':'.str_pad(round(abs($dif)-(floor(abs($dif/60))*60)), 2, "0", STR_PAD_LEFT);
if($dif>15){
$resultat="ok";	
$icona="ok";

$temps='<p id="temps" style="color:#C5D8E1">'.$hora.'</p>';
}
else if($dif>0){
	$resultat="alerta";	
	$icona="alerta";
$temps='<p id="temps" style="color:#EDC97A">'.$hora.'</p>';
}
else if($dif<-200){
	$resultat="no";	
	$icona="ok";
$temps='<p id="temps" style="color:#C5D8E1">--:--</p>';
}
else{
	$resultat="pasat";	
	$icona="pasat";	
$temps='<p id="temps" style="color:#FF0000">'.$hora.'</p>';
}

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
<div id="infovehicle">
<div id="dadesvehicle" style="width:320px;">
    <p id="matricula" style="width:320px;"><?php echo $dades2["matricula"];?></p>
</div>
<div id="ladata"></div>
<div id="textafegirtemps">AFEGIR TEMPS</div>
<div id="tempsafegit">0:00</div>
<div id="fletxes"><a href="#" onclick="pujartempsnou();return false;"><img src="img/fletxaamunt.png" width="25" /></a><a href="#" onclick="baixartempsnou();return false;"><img src="img/fletxaavall.png"  width="25"/></a></div>
<img src="img/tarifes_temp.png" width="68" height="65" style="margin-top:10px;margin-left:10px;float:left" />
<div id="textentrada">ENTRADA</div><div id="textnovahora">SORTIDA</div>
<div id="horaentrada"><?php echo substr($dades2["entrada"],11,5);?></div><div id="novahora">00:00</div>
<img src="img/text_zonablava_temp.png" width="280" height="65" style="margin-top:5px; margin-left:20px;" />
<div id="textdespesa">DESPESA</div>
<div id="despesa">0,00<span style="font-size:30px;">&euro;</span></div>
<div id="caixasaldo">
<div id="textsaldo">SALDO</div>
<div id="saldo"><?php echo str_replace(".",",",$dades3["saldo"]);?><span style="font-size:15px;">&euro;</span></div>
</div>
<div id="botook"><a href="#" onclick="document.forms['formafegirtemps'].submit();return false;"><img src="img/botook.png" width="130" height="33" /></a><a href="#" onclick="document.forms['principal'].submit();return false;"><img src="img/botoanula.png" width="130" height="33" /></a></div>
<form name="principal" method="post" action="principal.php">
</form>
<form name="formafegirtemps" method="post" action="principal.php">
<input type="hidden" name="camptempsafegit" id="camptempsafegit" value="00:00" />
<input type="hidden" name="campdespesa" id="campdespesa" value="0" />
<input type="hidden" name="accio" value="afegirtemps" />
</form>
</div>
</div>
<script language="javascript">
$("#novahora").html(ladata);
</script>
</body>
</html>