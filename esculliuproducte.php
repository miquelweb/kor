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

$(function(){
	 $("#llistaproducte p").click(function(){
		
		document.forms["productecorrecte"].submit();
	 })
 })
</script>
<script language="javascript" src="js/funcions.js"></script>
<style type="text/css"></style></head>

<body>
<div id="contingut">

<form name="principal" action="principal.php"></form>
<form name="productecorrecte" action="productecorrecte.php"></form>
<div id="barrasuperior"> <a  href="#" onclick="document.forms['principal'].submit();return false;"><img src="img/icon_enrera.png" width="42" height="31" /></a>
  <h3>Escull el producte</h3>
  </div>
  <input type="text" id="cercarproducte" />
  <div id="llistaproducte">
  <p>Aerosols i esprais</p>
<p>Ampolles de cava</p>
<p>Ampolles de vidre</p>
<p>Aparells el�ctrics i electr�nics</p>
<p>Bateries de cotxe</p>
<p>Bol�grafs</p>
<p>Bosses d'infusi� (sense grapa)</p>
<p>Bolquers</p>
<p>Bosses de paper</p>
<p>Bosses de pl�stic</p>
<p>Brics</p>
<p>Burilles</p>
<p>Cabells</p>
<p>Cables</p>
<p>Caixes de cartr�</p>
<p>Cartr� de grans dimensions</p>
<p>Cal�at</p>
<p>C�psules de caf� monodosi</p>
<p>Cartutxos de tinta i t�ners</p>
<p>CD i DVD</p>
<p>Cintes de v�deo</p>
<p>Closques d'ou</p>
<p>Complements de vestir</p>
<p>Compreses</p>
<p>Cosm�tics</p>
<p>Cot�</p>
<p>Diaris</p>
<p>Envasos de cartr�</p>
<p>Envasos de iogurt</p>
<p>Envasos de vidre</p>
<p>Excrements d'animals</p>
<p>Electrodom�stics grans: rentadores, frigor�fics�</p>
<p>Fibrociment amb amiant </p>
<p>Film transparent</p>
<p>Ferralla dom�stica de petites dimensions</p>
<p>Fitosanitaris, herbicides i pesticides</p>
<p>Flors seques</p>
<p>Fluorescents i Bombetes</p>
<p>Folis</p>
<p>Fruita</p>
<p>Filtres de vehicles</p>
<p>Fruita seca</p>
<p>Fusta, trastos i mobles: persianes, sof�s�</p>
<p>Garrafes de pl�stic</p>
<p>Llaunes d'acer</p>
<p>Llaunes d'alumini</p>
<p>Llapis usats</p>
<p>Marr� de caf�</p>
<p>Llibretes sense espiral met�l�lica</p>
<p>Marisc</p>
<p>Matalassos</p>
<p>Metalls: alumini, acer inoxidable, plom�</p>
<p>Olis de cuina</p>
<p>Olis de motor</p>
<p>Pa</p>
<p>Paper d'alumini</p>
<p>Paper de cuina</p>
<p>Paper de regal</p>
<p>Peix</p>
<p>Piles</p>
<p>Pintures, coles, vernissos, dissolvents�</p>
<p>Pl�stic: galledes, garrafes...</p>
<p>Pneum�tics petits</p>
<p>Porexpan net</p>
<p>Radiografies</p>
<p>Restes d'escombrar</p>
<p>Restes de carn</p>
<p>Restes de poda i jardineria</p>
<p>Restes de productes de neteja</p>
<p>Revistes</p>
<p>Roba</p>
<p>Runa</p>
<p>Safates de porexpan</p>
<p>Sobres</p>
<p>Tapes de metall</p>
<p>Taps de suro</p>
<p>Televisors i monitors</p>
<p>Term�metres</p>
<p>Tovallons tacats d'oli</p>
<p>Verdura</p>
<p>Vidre pla, miralls, finestres...</p>
<p>Xapes de metall</p>


  </div>
</div>

</body>
</html>