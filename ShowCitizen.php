<?php 
@session_start(); 
require 'inc/hiveconn.php';

//var_dump($_POST);


$sql = "SELECT * FROM `BlackCitizens` WHERE `FamilyCode`='" . $_POST["FC"] . "';";

//echo "                                 " . $sql;
//$sql=$sql.$limit;




try {
    // set the PDO error mode to exception
    $rconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $rconn->prepare($sql);

    $stmt->execute();
	$stmt->bindColumn(1, $LN);
	$stmt->bindColumn(2, $FN);
	$stmt->bindColumn(3, $AKA);
	$stmt->bindColumn(4, $FC);
	$stmt->bindColumn(5, $County);
	$stmt->bindColumn(6, $Color);
	$stmt->bindColumn(7, $Sex);
	$stmt->bindColumn(8, $Birthyr);
	$stmt->bindColumn(9, $Birthday);
	$stmt->bindColumn(10, $Bornin);
	$stmt->bindColumn(11, $Diedyr);
	$stmt->bindColumn(12, $Dieddate);
	$stmt->bindColumn(13, $Occup);
	$stmt->bindColumn(14, $Owner1);
	$stmt->bindColumn(15, $Owner1first);
	$stmt->bindColumn(16, $Owner1Code);
	$stmt->bindColumn(17, $Owner1AltCode);
	$stmt->bindColumn(18, $YearTrans);
	$stmt->bindColumn(19, $Transfercode);
	$stmt->bindColumn(20, $Owner2);
	$stmt->bindColumn(21, $Owner2first);
	$stmt->bindColumn(22, $Owner2Code);
	$stmt->bindColumn(23, $Owner2AltCode);
	$stmt->bindColumn(24, $YearTrans2);
	$stmt->bindColumn(25, $Transfercode2);
	$stmt->bindColumn(26, $Owner3);
	$stmt->bindColumn(27, $Owner3first);
	$stmt->bindColumn(28, $Owner3Code);
	$stmt->bindColumn(29, $Owner3AltCode);
	$stmt->bindColumn(30, $YearTrans3);
	$stmt->bindColumn(31, $Transfercode3);
	$stmt->bindColumn(32, $Owner4);
	$stmt->bindColumn(33, $Owner4first);
	$stmt->bindColumn(34, $Owner4Code);
	$stmt->bindColumn(35, $Owner4AltCode);
	$stmt->bindColumn(36, $YearTrans4);
	$stmt->bindColumn(37, $Transfercode4);
	$stmt->bindColumn(38, $Owner5);
	$stmt->bindColumn(39, $Owner5first);
	$stmt->bindColumn(40, $Owner5Code);
	$stmt->bindColumn(41, $Owner5AltCode);
	$stmt->bindColumn(42, $YearTrans5);
	$stmt->bindColumn(43, $Transfercode5);
	$stmt->bindColumn(44, $Owner6);
	$stmt->bindColumn(45, $Owner6first);
	$stmt->bindColumn(46, $Owner6Code);
	$stmt->bindColumn(47, $Owner6AltCode);
	$stmt->bindColumn(48, $YearTrans6);
	$stmt->bindColumn(49, $Transfercode6);
	$stmt->bindColumn(50, $Owner7);
	$stmt->bindColumn(51, $Owner7first);
	$stmt->bindColumn(52, $Owner7Code);
	$stmt->bindColumn(53, $Owner7AltCode);
	$stmt->bindColumn(54, $YearTrans7);
	$stmt->bindColumn(55, $Transfercode7);
	$stmt->bindColumn(56, $Owner8);
	$stmt->bindColumn(57, $Owner8first);
	$stmt->bindColumn(58, $Owner8Code);
	$stmt->bindColumn(59, $Owner8AltCode);
	$stmt->bindColumn(60, $Motherfirst);
	$stmt->bindColumn(61, $Motherlast);
	$stmt->bindColumn(62, $MotherFC);
	$stmt->bindColumn(63, $Fatherfirst);
	$stmt->bindColumn(64, $Fatherlast);
	$stmt->bindColumn(65, $FatherFC);
	$stmt->bindColumn(66, $Married);
	$stmt->bindColumn(67, $Spousefirst);
	$stmt->bindColumn(68, $Spouselast);
	$stmt->bindColumn(69, $Spousecode);
	$stmt->bindColumn(70, $Marrydate);
	$stmt->bindColumn(71, $Marryyr);
	$stmt->bindColumn(72, $Marryloc);
	$stmt->bindColumn(73, $Marrydec);
	$stmt->bindColumn(74, $Marrydecdate);
	$stmt->bindColumn(75, $Namelast);
	$stmt->bindColumn(76, $Diedofdisease);
	$stmt->bindColumn(77, $Cod);
	$stmt->bindColumn(78, $Purchyr1);
	$stmt->bindColumn(79, $Purchdate1);
	$stmt->bindColumn(80, $Purchpr1);
	$stmt->bindColumn(81, $PurchMult1);
	$stmt->bindColumn(82, $Purchyr2);
	$stmt->bindColumn(83, $Purchdate2);
	$stmt->bindColumn(84, $Purchpr2);
	$stmt->bindColumn(85, $PurchMult2);
	$stmt->bindColumn(86, $Purchyr3);
	$stmt->bindColumn(87, $Purchdate3);
	$stmt->bindColumn(88, $Purchpr3);
	$stmt->bindColumn(89, $PurchMult3);
	$stmt->bindColumn(90, $Removed);
	$stmt->bindColumn(91, $Removedto);
	$stmt->bindColumn(92, $Notes);
	$stmt->bindColumn(93, $Baptised);
	$stmt->bindColumn(94, $Baptisedon);
	$stmt->bindColumn(95, $Baptisedat);
	$stmt->bindColumn(96, $NewName);
	$stmt->bindColumn(97, $Religion);
	$stmt->bindColumn(98, $Census1850);
	$stmt->bindColumn(99, $Census1860);
	$stmt->bindColumn(100, $Census1870);
	$stmt->bindColumn(101, $Emancipated);
	$stmt->bindColumn(102, $Emanyr);
	$stmt->bindColumn(103, $Emandate);
	$stmt->bindColumn(104, $Desc);
	$stmt->bindColumn(105, $Height);
	$stmt->bindColumn(106, $Weight);
	$stmt->bindColumn(107, $SkinColor);
	$stmt->bindColumn(108, $RCProperty);	
	
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
<link rel="stylesheet" href="inc/KHSFLRS.css">

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

<table id="HiliteField">

<?php	
		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			
			//5 cells across
			
			echo "<tr><td><b>First Name:</b> $FN</td><td><b>Last Name:</b> $LN</td><td><b>ID Code:</b> $FC</td><td><b>County:</b> $County</td><td><b>Name1866:</b> $Namelast</td></tr>";
			echo "<tr><td><b>Color:</b> $Color</td><td><b>Sex:</b> $Sex</td><td><b>Birth Year:</b> $Birthyr</td><td><b>Birth Date:</b> $Birthday<td><b>Died Year:</b> $Diedyr</td><td><b>Died Date:</b> $Dieddate</td><tr>";
			echo "<tr><td><b>Mother:</b> $Motherfirst $Motherlast</td><td><b>ID:</b> $MotherFC</td><td colspan=\"2\"><b>Religion:</b></td></tr>";
			echo "<tr><td><b>Father:</b> $Fatherfirst $Fatherlast</td><td><b>ID:</b> $FatherFC</td></tr>";
			echo "<tr></tr>";
			echo "<tr><td><b>Owner1:</b> $Owner1 $Owner1first</td><td><b>ID:</b> $Owner1code</td><td><b>Year Transferred:</b> $Yeartrans1</td><td><b>Trans Code:</b> $Transfercode1</td></tr>";
			echo "<tr><td><b>Owner2:</b> $Owner2 $Owner2first</td><td><b>ID:</b> $Owner2code</td><td><b>Year Transferred:</b> $Yeartrans2</td><td><b>Trans Code:</b> $Transfercode2</td></tr>";
			echo "<tr><td><b>Owner3:</b> $Owner3 $Owner3first</td><td><b>ID:</b> $Owner3code</td><td><b>Year Transferred:</b> $Yeartrans3</td><td><b>Trans Code:</b> $Transfercode3</td></tr>";
			echo "<tr><td><b>Owner4:</b> $Owner4 $Owner4first</td><td><b>ID:</b> $Owner4code</td><td><b>Year Transferred:</b> $Yeartrans4</td><td><b>Trans Code:</b> $Transfercode4</td></tr>";
			echo "<tr><td><b>Owner5:</b> $Owner5 $Owner5first</td><td><b>ID:</b> $Owner5code</td><td><b>Year Transferred:</b> $Yeartrans5</td><td><b>Trans Code:</b> $Transfercode5</td></tr>";
			echo "<tr><td><b>Owner6:</b> $Owner6 $Owner6first</td><td><b>ID:</b> $Owner6code</td><td><b>Year Transferred:</b> $Yeartrans6</td><td><b>Trans Code:</b> $Transfercode6</td></tr>";
			echo "<tr><td><b>Owner7:</b> $Owner7 $Owner7first</td><td><b>ID:</b> $Owner7code</td><td><b>Year Transferred:</b> $Yeartrans7</td><td><b>Trans Code:</b> $Transfercode7</td></tr>";
			echo "<tr><td><b>Owner8:</b> $Owner8 $Owner8first</td><td><b>ID:</b> $Owner8code</td></tr>";
			echo "<tr></tr>";
			echo "<tr><td><b>Year Bought1:</b> $Purchyr1</td><td><b>Purchase Date1:</b> $Purchdate1</td><td><b>Part of a Multi Purchase1</b> $PurchMult1</td></tr>";
			echo "<tr><td><b>Year Bought2:</b> $Purchyr2</td><td><b>Purchase Date2:</b> $Purchdate2</td><td><b>Part of a Multi Purchase2</b> $PurchMult2</td></tr>";
			echo "<tr></tr>";	
			echo "<tr><td><b>Baptised:</b> $Baptised</td><td><b>When</b> $Baptisedon</td><td><b>Where</b> $Baptisedat</td></tr>";
			echo "<tr><td><b>Died of Disease</b> $Diedofdisease</td><td><b>Cause of Death:</b> $Cod</td><td></tr>";
			echo "<tr><td><b>Married:</b> $Married</td><td><b>When:</b> $Marrydate</td><td><b>Where:</b> $Marryloc</td><td><b>Occupation:</b> $Occup</td></tr>";
			echo "<tr><td><b>Spouse:</b> $Spousefirst $Spouselast</td><td><b>ID:</b> $Spousecode</td></tr>";
			echo "<tr><td><b>Emancipated:</b> $Emanicpated</td><td><b>Year:</b> $Emanyr</td><td><b>Date:</b> $Emandate</td></tr>";
			echo "<tr></tr>";
			echo "<tr><td><b>1850 Census</b> $Census1850</td><td><b>1860 Census</b> $Census1860</td><td><b>1870 Census</b> $Census1870</td></tr>";
			echo "<tr><td colspan=\"4\"><b>Notes:</b> $Notes</td></tr>";
			echo "<tr><td colspan=\"4\"><b>Physical Description:</b> $Desc</td></tr>";
		}
		echo "</table>";	
		/*
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
		}<*/	
$rconn = null;			
?>

</div></div>
*/