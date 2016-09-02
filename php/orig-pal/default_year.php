<?php
/********************************************************************
Purpose: Changes the current database year
********************************************************************/
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {

$sql = "SELECT * FROM year"; //Retrieve all year entree
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL query
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
	$years[] = array('year_id' => $item['year_id'], 'year_start' => $item['year_start'], 'year_end' => $item['year_end'],'sem' => $item['sem'], 
					 'default' => $item['default']);
}
$sql = "SELECT * FROM year WHERE year.default = 1";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL query
$default = $results -> fetch(PDO::FETCH_ASSOC);
?>
<form action="update_year.php" method = "POST">
	<select name = 'year_id'>
	<?php
	$year_counter = 0;
	foreach ($years as $year) {
		if ($default['year_id'] == $year['year_id']) {
			echo "<option value = '$year[year_id]' selected>" . $year['year_start'] . "-" . $year['year_end'] . " sem." . $year['sem'] . "</option>";
		}
		else { 
		echo "<option value = '$year[year_id]'>" . $year['year_start'] . "-" . $year['year_end'] . " sem." . $year['sem'] . "</option>";
		}
		$year_counter++;
	}
	echo "<input type = 'hidden' name = 'year_count' value = '$year_counter'>";
	echo "<input type = 'hidden' name = 'current_default' value = '$default[year_id]'>";
	?>
</select>
<input type = 'submit' value = 'Change Year'>
</form>
<?php endif;

