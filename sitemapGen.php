<?php 
include("top.php");
$date = date("Y-m-d");
unlink('sitemap.xml');
$result1=mysql_query("SELECT songURL FROM songs");
$result2=mysql_query("SELECT activityName FROM activities");
$result3=mysql_query("SELECT personStageName FROM persons");
$result4=mysql_query("SELECT labelName FROM labels");

$xml = new DOMDocument("1.0","UTF-8");
$xml->formatOutput=true;

	$urlset = $xml -> createElement("urlset");
	$xml -> appendChild($urlset);

while($row1=mysql_fetch_array($result1)){
	extract($row1);
		$url = $xml -> createElement("url");
		$urlset -> appendChild($url);
		
			$loc = $xml -> createElement("loc", "http://www.gbngr.com/archive/track-".$songURL);
			$url -> appendChild($loc);
			
			$lastmod = $xml -> createElement("lastmod", $date);
			$url -> appendChild($lastmod);

			$changefreq = $xml -> createElement("changefreq","weekly");
			$url -> appendChild($changefreq);
			
			$priority = $xml -> createElement("priority","0.5");
			$url -> appendChild($priority);
}
while($row2=mysql_fetch_array($result2)){
	extract($row2);
		$url = $xml -> createElement("url");
		$urlset -> appendChild($url);
		
			$loc = $xml -> createElement("loc", "http://www.gbngr.com/archive/article-".$activityName);
			$url -> appendChild($loc);
			
			$lastmod = $xml -> createElement("lastmod", $date);
			$url -> appendChild($lastmod);

			$changefreq = $xml -> createElement("changefreq","weekly");
			$url -> appendChild($changefreq);
			
			$priority = $xml -> createElement("priority","0.5");
			$url -> appendChild($priority);
}
while($row3=mysql_fetch_array($result3)){
	extract($row3);
		$url = $xml -> createElement("url");
		$urlset -> appendChild($url);
		
			$loc = $xml -> createElement("loc", "http://www.gbngr.com/archive/person-".$personStageName);
			$url -> appendChild($loc);
			
			$lastmod = $xml -> createElement("lastmod", $date);
			$url -> appendChild($lastmod);

			$changefreq = $xml -> createElement("changefreq","weekly");
			$url -> appendChild($changefreq);
			
			$priority = $xml -> createElement("priority","0.5");
			$url -> appendChild($priority);
}
while($row4=mysql_fetch_array($result4)){
	extract($row4);
		$url = $xml -> createElement("url");
		$urlset -> appendChild($url);
		
			$loc = $xml -> createElement("loc", "http://www.gbngr.com/archive/label-".$labelName);
			$url -> appendChild($loc);
			
			$lastmod = $xml -> createElement("lastmod", $date);
			$url -> appendChild($lastmod);

			$changefreq = $xml -> createElement("changefreq","weekly");
			$url -> appendChild($changefreq);
			
			$priority = $xml -> createElement("priority","0.5");
			$url -> appendChild($priority);
}
echo "<xmp>".$xml -> saveXML()."</xmp>";
$xml -> save("sitemap.xml");



?>