<HTML>
<HEAD>
<TITLE>My first PHP script</TITLE>
</HEAD>
<BODY>

<?php
require_once 'phoogle.php';

    $today = date("Y-m-d");

    PRINT "<CENTER>Today is: $today.</CENTER>";

$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'valeskea-db';
$dbuser = 'valeskea-db';
$dbpass = 'VWFWBiiWuv6jO2GG';

$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
    or die("Error connecting to database server");

mysql_select_db($dbname, $mysql_handle)
    or die("Error selecting database: $dbname");

echo 'Successfully connected to database!';

?>
<?php
$map = new PhoogleMap;
$map->setAPIKey("ABQIAAAAGYwFkpdaYyi3hz3D0h0C1xTnX0qiHJ9giTmjT5mM5nirbePHmRTMcmV7k3U4mBC44zQ57Nvqk1K3_w");
$map->printGoogleJS();
$sql = 'SELECT longitude, latitude FROM `PlacesVisited`';
$result=mysql_query($sql,$mysql_handle);
while($row=mysql_fetch_array($result)){
$longitude=$row['longitude'];
$latitude=$row['latitude'];
$map->addGeoPoint($latitude,$longitude);
}
$map->showMap();

mysql_close($mysql_handle);
?>
</BODY>
</HTML>
