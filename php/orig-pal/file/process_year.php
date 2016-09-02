<?php
/*Adds a year entree if there is an unknown year entry***************/
$sql = "SELECT school_year, semester FROM temp_classes";
include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php'); 
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
  $years[] = array('year' => $item['school_year'], 'sem' => $item['semester']);
}
foreach ($years as $year) { 
	$year_start = substr($year['year'], 0, 4);
	$year_end = substr($year['year'], 4, 8);
	$sql = "SELECT year_start, year_end, sem FROM year 
			WHERE  year_start = $year_start AND year_end = $year_end AND sem = $year[sem]";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php'); 
	//echo "<p>$sql</p>";
	if ($count_affected == 0 && $year['sem'] != "NULL") {
		//exit();
		$sql = "INSERT INTO year (year_start, year_end, sem, default) VALUES ('$year_start', '$year_end', '$year[sem]', '0')";
		include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');
		//echo "<p><h3>$sql</h3></p>";
	}
}
/********************************************************************/
header ('Location: process_class.php');
?>