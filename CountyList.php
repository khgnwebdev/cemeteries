<?php 
@session_start(); 
require 'inc/hiveconn.php';


//insert passed varialbles here
//Paging var
$per_page_html = '';
$page = 1;
$start=0;
if(!empty($_POST["page"])) {
	$page = $_POST["page"];
	$start=($page-1) * 10;
}
$nextpage = $page+1;
$prevpage = $page-1;



$limit=" limit " . $start . ",20;";
$sql = "SELECT `countyname`, `coord_name` FROM `Counties` Order by `countyname`";

$sql=$sql.$limit;




try {
    // set the PDO error mode to exception
    $rconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $rconn->prepare($sql);

    $stmt->execute();
	$row_count=$stmt->rowCount();
	$stmt->bindColumn(1, $countyname);
	$stmt->bindColumn(2, $coord_name);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	


?>

<!DOCTYPE html>
<html lang="en">
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
<form name="frmRecords" action="CemListxCo.php" method="post">
<? //echo $passedFC; ?>
<table id="CoList"  >
<tr><th>County Name</th><th>Coordinator</th></tr>

<?php	
		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
            if (empty($coord_name)) {
                $coord_name = 'No Coordinator';
            }
			echo "<tr><td><input type=\"submit\" name=\"countyname\" value=$countyname /></td><td>$coord_name</td></tr>";
		}
		echo "</table></form><form name=\"frmPaging\" action=\"CountyList.php\" method=\"post\">";
			
		if(!empty($row_count)){
			echo "<div style='text-align:center;margin:20px 0px;'>";
			if($page>=2) {
				echo '<input type="submit" name="page" value="' . $prevpage . '" />';
				echo 'Current Page';
				echo '<input type="submit" name="page" value="' . $nextpage . '" />';
			} else {
				echo 'Current Page';
				echo '<input type="submit" name="page" value="' . $nextpage . '" />';
			}
			echo '</div>';
		}	
		$rconn = null;	
?>
</form>
</div></div>