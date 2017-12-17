<?php
@session_start(); 
require 'inc/hiveconn.php';
/**
 * KHGN Cemetery Committee 
 * @copyright 2017
 */
//insert passed varialbles here
/*

/*

            <td>
                <input name="CemName" value="Absher" cemetery="" type="submit">
                <input name="Cem_ID" value="4" type="hidden">
                <input name="cem_lat" value="37.17284310" type="hidden">
                <input name="cem_long" value="-85.24162680" type="hidden">
            </td>
*/


//Paging var$per_page_html = '';
/*
$page = 1;
$start=0;
if(!empty($_POST["page"])) {
	$page = $_POST["page"];
	$start=($page-1) * 10;
}
$nextpage = $page+1;
$prevpage = $page-1;



$limit=" limit " . $start . ",20;";
*/

$sql = "SELECT `CemName`,`cem_lat`,`cem_long`,`CountyName` FROM `Cemeteries` where `Cem_ID`='" . $_POST["Cem_ID"] . "';";

//$sql=$sql.$limit;

try {
    // set the PDO error mode to exception
    $stmt = $rconn->query($sql);
    $row_count = $stmt->rowCount();
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
$row = $stmt->fetch(PDO::FETCH_ASSOC)


?>

<!DOCTYPE html>
<html>
  <head>
<title>Kentucky Cemetery Project</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="inc/KHGNStyles.css">
  </head>
  <body>
  <div class="sidenav">
  <a href="CemList.php">Browse Cemeteries</a>
  <a href="CountyList.php">Browse Counties</a>
  <a href="#">Search</a>
  <a href="#">Help</a>
</div>
<div class="content">
  <h2><a href="index.php">Kentucky Cemetery Project</a></h2>
  <p>A work in progress.  Stay tuned for updates!!!</p>

<div class="databox">
    <h3>Map of <? echo $row['CemName'] ?> in <? echo $row['CountyName'] ?></h3>
    <h5>Click "Google" in bottom left of map to visit on Google Maps and get directions. ***Need to send marker to gmaps***</h5>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: <? echo $row['cem_lat'] ?>, lng: <? echo $row['cem_long'] ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvUO2HVusFUqi3XUqBogQu6slzRVOAa6I&callback=initMap">
    </script>
  </body>
</html>