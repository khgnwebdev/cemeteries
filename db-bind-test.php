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
$sql = "SELECT `CemName`, `Cem_ID`, `cem_lat`,`cem_long`,`CountyName` FROM `Cemeteries` Order by `CemName`";

$sql=$sql.$limit;
/*
$stmt = $rconn->query('SELECT * FROM Cemeteries');


 $row_count = $stmt->rowCount();
echo $row_count.' rows selected';


while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['CemName'].' '.$row['CountyName']; //etc...
}
*/

try {
    // set the PDO error mode to exception
    $stmt = $rconn->query($sql);
    $row_count = $stmt->rowCount();
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
<form name="frmRecords" action="ViewCem.php" method="post">
<? //echo $passedFC; ?>
<table id="CemList"  >
<tr><th>Cemetery Name</th><th>County</th></tr>

<?php

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td><input type=\"submit\" name=\"CemName\" value=\"";
            echo $row['CemName'];
            echo "\"/><input type=\"hidden\" name=\"Cem_ID\" value=" . $row['Cem_ID'] . " />
                <input type=\"hidden\" name=\"cem_lat\" value=" . $row['cem_lat'] . " />
                <input type=\"hidden\" name=\"cem_long\" value=" . $row['cem_long'] . " />
            </td>
            <td>" . $row['CountyName'] . "</td></tr>";
		}
		echo "</table></form><form name=\"frmPaging\" action=\"db-bind-test.php\" method=\"post\">";
			
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

