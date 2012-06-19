<?php
session_start();
require_once('Connections/kor.php');
mysql_select_db($database_kor, $kor); 
$query = "SELECT * FROM contenidors";
$detall=mysql_query($query, $kor) or die(mysql_error());
$dades = mysql_fetch_assoc($detall);
$total=mysql_num_rows($detall);


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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script language="javascript" src="js/infobox.js"></script>
<script language="javascript">


</script>
<script language="javascript" src="js/funcions.js"></script>
<style type="text/css"></style></head>

<body>
<div id="contingut">

<form name="principal" action="principal.php"></form>
<div id="barrasuperior"> <a  href="#" onclick="document.forms['principal'].submit();return false;"><img src="img/icon_enrera.png" width="42" height="31" /></a>
  <h3>MAPA</h3>
  <img src="img/icon_centrar.png" width="34" height="30" />
  </div>

<div id="mapa">
</div>
<div id="barraflotantmapa">
  <img src="img/iconbarramapa0.png" width="36" height="36" />
  <img src="img/iconbarramapa1.png" width="36" height="36" />
  <img src="img/iconbarramapa2.png" width="36" height="36" />
  <img src="img/iconbarramapa3.png" width="36" height="36" />
  <img src="img/iconbarramapa4.png" width="36" height="36" />
  <img src="img/iconbarramapa5.png" width="36" height="36" />
  </div> 	
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
	var marker = new google.maps.Marker({
		  position: latlng,
		  map: map,
		  icon: "img/marcador.png"
	  });
	  
	 
			
<?php
$n=0;
 do{
	$n++;
	
	?>
var latlng<?php echo $n;?> = new google.maps.LatLng(<?php echo $dades['posicio'];?>);
var marker<?php echo $n;?> = new google.maps.Marker({
		  position: latlng<?php echo $n;?>,
		  map: map,
		  icon: "img/iconmapa<?php echo $dades['tipuscontenidor'];?>.png"
	  });
	var infowindow<?php echo $n;?> = new google.maps.InfoWindow({
    content: "<p id='llegendamapa'><?php echo $dades['adreca'];?></p>"
	});
google.maps.event.addListener(marker<?php echo $n;?>, 'click', function() {
  infowindow<?php echo $n;?>.open(map,marker<?php echo $n;?>);
});
	
	  <?php }while($dades = mysql_fetch_assoc($detall));?>
		}
	
function onErrorGeolocating(position){
	//alert("error");
}
  var geocoder = new google.maps.Geocoder();
   var infowindow = new google.maps.InfoWindow();
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
		  
    

     
    }
	}
	
 
 
	  
	  
	  
	</script>
</body>
</html>