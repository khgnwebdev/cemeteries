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



$limit=" limit " . $start . ",10;";
$sql="SELECT `BlackCitizens`.`FirstName`, `BlackCitizens`.`LastName`, `BlackCitizens`.`FamilyCode`, `County`.`CountyName` FROM BlackCitizens LEFT JOIN County ON `BlackCitizens`.`County` = `County`.`CountyCode`";

$sql=$sql.$limit;




try {
    // set the PDO error mode to exception
    $rconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $rconn->prepare($sql);

    $stmt->execute();
	$row_count=$stmt->rowCount();
	$stmt->bindColumn(1, $FN);
	$stmt->bindColumn(2, $LN);
	$stmt->bindColumn(3, $FC);
	$stmt->bindColumn(4, $CN);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Lemon's Slave Registry</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="inc/KHGNStyles.css">

</head>
<body>
<div class="sidenav">
  <a href="PersonList.php">Browse</a>
  <a href="#">Search</a>
  <a href="#">Help</a>
</div>
<div class="content">
  <h2><a href="index.php">Lemons Slave Registry</a></h2>
  <p>This project is about creating a relational 
 and searchable database of the people who were held in bondage in the Commonwealth of Kentucky, as well as the people who held them. The register will contain as much information as is available from public and private records and will, hopefully, be expanded to include all of the states which had slavery.</p>

<div class="databox">
<form name="frmRecords" action="ShowCitizen.php" method="post">
<? //echo $passedFC; ?>
<table id="PersonList">
<tr><th>First Name</th><th>Last Name</th><th>Family Code</th><th>County</th></tr>

<?php	
		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			echo "<tr><td>$FN</td><td>$LN</td><td><input type=\"submit\" name=\"FC\" value=$FC /></td><td>$CN</td></tr>";
		}
		echo "</table></form><form name=\"frmPaging\" action=\"PersonList.php\" method=\"post\">";
			
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