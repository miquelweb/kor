<?php
session_start();
require_once('Connections/kor.php');
mysql_select_db($database_kor, $kor); 
if(isset($_POST["camptempsafegit"])){
	
	$query2 = "SELECT * FROM vehicles LEFT JOIN estacionaments ON vehicles.codivehicle=estacionaments.vehicle where empresa='".$_SESSION["usuari"]."' order by estacionaments.codi desc LIMIT 1";
$detall2=mysql_query($query2, $kor) or die(mysql_error());
$dades2 = mysql_fetch_assoc($detall2);
$total2=mysql_num_rows($detall2);
	$temps=substr($_POST["camptempsafegit"],0,2)*60+substr($_POST["camptempsafegit"],3,2);
if($_POST["accio"]=="nouestacionament"){
		$resultat=mysql_query('insert into estacionaments(vehicle, durada,coordenades) values ("'.$dades2["codivehicle"].'","'.$temps.'","'.$_POST["pos"].'")' , $kor) or die(mysql_error());
}
else{
	
	$resultat=mysql_query('update estacionaments set durada=durada+"'.$temps.'" where codi="'.$dades2["codi"].'"' , $kor) or die(mysql_error());
}
$resultat=mysql_query('update empreses set saldo=saldo-"'.str_replace(",",".",$_POST["campdespesa"]).'" where codiempresa="'.$_SESSION["usuari"].'"' , $kor) or die(mysql_error());
$query2 = "SELECT * FROM vehicles LEFT JOIN estacionaments ON vehicles.codivehicle=estacionaments.vehicle where empresa='".$_SESSION["usuari"]."' order by estacionaments.codi desc LIMIT 1";
$detall2=mysql_query($query2, $kor) or die(mysql_error());
$dades2 = mysql_fetch_assoc($detall2);
$total2=mysql_num_rows($detall2);
}
else{
	//$_SESSION["usuari"]=$dades["empresa"];
	$query2 = "SELECT * FROM vehicles LEFT JOIN estacionaments ON vehicles.codivehicle=estacionaments.vehicle where empresa='".$_SESSION["usuari"]."' order by estacionaments.codi desc LIMIT 1";
$detall2=mysql_query($query2, $kor) or die(mysql_error());
$dades2 = mysql_fetch_assoc($detall2);
$total2=mysql_num_rows($detall2);
}


$to_time=strtotime("now");
$from_time=strtotime($dades2["entrada"]);
$dif=round(($from_time - $to_time) / 60,2)+$dades2["durada"];

$date_r = getdate($from_time);
$sortida = date("h:i", mktime(($date_r["hours"]),($date_r["minutes"]+$dades2["durada"])));

//$sortida=$from_time+$dades2["durada"];
$hora=str_pad(floor(abs($dif/60)), 2, "0", STR_PAD_LEFT).':'.str_pad(round(abs($dif)-(floor(abs($dif/60))*60)), 2, "0", STR_PAD_LEFT);
$plana="nouestacionament";
if($dif>15){
$resultat="ok";	
$icona="ok";

//$temps='<p id="temps" style="color:#C5D8E1">'.$hora.'</p>';
$temps=$hora;
$plana="afegirtemps";
}
else if($dif>0){
	$resultat="alerta";	
	$icona="alerta";
//$temps='<p id="temps" style="color:#EDC97A">'.$hora.'</p>';
$temps=$hora;
$plana="afegirtemps";
}
else if($dif<-200){
	$resultat="no";	
	$icona="ok";
//$temps='<p id="temps" style="color:#C5D8E1">--:--</p>';
$temps="--:--";
$plana="nouestacionament";
}
else{
	$resultat="pasat";	
	$icona="pasat";	
//$temps='<p id="temps" style="color:#FF0000">'.$hora.'</p>';
$temps="-".$hora;
$plana="afegirtemps";
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

<script language="javascript" src="js/jquery-1.5.1.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script language="javascript" src="js/infobox.js"></script>
</head>

<body><form name="principal" method="post" action="principal.php">

</form>
<div id="contingut">
<div id="infovehicle">
<div id="botonstipuszona"> <a onclick="document.forms['principal'].submit();return false;"><img src="img/boto_enrera.png" width="65" height="30" /></a></div>
<div id="dadesvehicle">
    <p id="matricula"><?php echo $dades2["matricula"];?></p>
    <p id="adreca"></p>
</div>
<div id="botonsopcions"></div>

</div>
<img src="img/config_temp.png" width="320" height="370" />
<div id="dadesestacionament">
  <form name="formafegirtemps" method="post" action="afegirtemps.php">
</form>
<form name="formnouestacionament" method="post" action="mapa.php">
<input type="hidden" id="camppos" name="pos" value="" />
</form>
<img src="img/icon_<?php echo $icona;?>.png" width="24" style="margin-top:7px; margin-left:6px;margin-right:5px;" /><img src="img/icona_rellotge.png" /><p>SORTIDA<br /><?php echo $sortida;?></p><img src="img/icon_crono.png" width="24" height="28" /><p>RESTANT<br /><?php echo $temps;?></p></div>
</div>
<script type="text/javascript">
function onSuccessGeolocating(position)
		{
			var latlng = new google.maps.LatLng(position.coords.latitude, 
 			                                          position.coords.longitude);

			

			var myOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
	var txt=new String(latlng);
	document.forms["formnouestacionament"].camppos.value=txt.substr(1,txt.length-2);
	var marker = new google.maps.Marker({
		  position: latlng,
		  map: map,
		  icon: "img/marcador.png"
	  });
	  if (geocoder) {
		  
    

      geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[1]) {
			  
            document.getElementById("adreca").innerHTML=results[0].address_components[1].long_name+" "+results[0].address_components[0].long_name;
            document.getElementById("adreca2").innerHTML=results[0].address_components[1].long_name+" "+results[0].address_components[0].long_name;
          }
		}
      });
    }
		}
	
function onErrorGeolocating(position){
}
  var geocoder = new google.maps.Geocoder();
   var infowindow = new google.maps.InfoWindow();
	<?php if($resultat=="no"){?>
	if(navigator.geolocation)  {
		navigator.geolocation.getCurrentPosition(onSuccessGeolocating,  
                                         onErrorGeolocating ); 
	}
	else{
    var latlng = new google.maps.LatLng(32,20);
	var myOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
	var marker = new google.maps.Marker({
		  position: latlng,
		  map: map,
		  icon: "img/marcador.png"
	  });
	  if (geocoder) {
		  
    

      geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[1]) {
            document.getElementById("adreca").innerHTML=results[0].address_components[1].long_name+" "+results[0].address_components[0].long_name;
            document.getElementById("adreca2").innerHTML=results[0].address_components[1].long_name+" "+results[0].address_components[0].long_name;
          }
		}
      });
    }
	}
	<?php }
	else{ ?>
    var latlng = new google.maps.LatLng(<?php echo $dades2["coordenades"]; ?>);
	var myOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
	var marker = new google.maps.Marker({
		  position: latlng,
		  map: map,
		  icon: "img/marcador.png"
	  });
	  if (geocoder) {
		  
    

      geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[1]) {
            document.getElementById("adreca").innerHTML=results[0].address_components[1].long_name+" "+results[0].address_components[0].long_name;
            document.getElementById("adreca2").innerHTML=results[0].address_components[1].long_name+" "+results[0].address_components[0].long_name;
          }
        }
      });
    }
    <?php } ?>
	





</script>
</body>
</html>