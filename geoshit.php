<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eagle Eye</title>
</head>

<body>
<button onclick="show()">show ip addresses n shits</button>
<?php
$ipAddress=$_SERVER['REMOTE_ADDR'];
//The client MAC address will not be available to you except in one special circumstance: if the client is on the same ethernet segment as the server.
$macAddr=false;

$arp='arp -a $ipAddress';
$lines=explode("\n", $arp);

foreach($lines as $line)
{
   $cols=preg_split('/\s+/', trim($line));
   if ($cols[0]==$ipAddress)
   {
       $macAddr=$cols[1];
   }
}
echo "<div id='ip'>User IP address: $ipAddress</div>";
echo "<div id='mac'>User MAC address: $macAddr</div>";




require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
// If we wanted to change the base currency, we would uncomment the following line
// $geoplugin->currency = 'EUR';
 
$geoplugin->locate();
 
echo 
	"<div id='city'>

Geolocation results for {$geoplugin->ip}: <br />\n.
	City: {$geoplugin->city} <br />\n.
	Region: {$geoplugin->region} <br />\n.
	Area Code: {$geoplugin->areaCode} <br />\n.
	DMA Code: {$geoplugin->dmaCode} <br />\n.
	Country Name: {$geoplugin->countryName} <br />\n.
	Country Code: {$geoplugin->countryCode} <br />\n.
	Longitude: {$geoplugin->longitude} <br />\n.
	Latitude: {$geoplugin->latitude} <br />\n.
	Currency Code: {$geoplugin->currencyCode} <br />\n.
	Currency Symbol: {$geoplugin->currencySymbol} <br />\n.
	Exchange Rate: {$geoplugin->currencyConverter} <br />\n;

</div>"
 
?>

<script>
window.onload= function(){
	document.getElementById("city").style.visibility = 'hidden';
	document.getElementById("ip").style.visibility = 'hidden';
	document.getElementById("mac").style.visibility = 'hidden';
	document.getElementById("loc").style.visibility = 'hidden';
	}
function show(){
	document.getElementById("ip").style.visibility = 'visible';
	document.getElementById("city").style.visibility = 'visible';
	document.getElementById("mac").style.visibility = 'visible';
	document.getElementById("loc").style.visibility = 'visible';
	}
</script>
</body>
</html>