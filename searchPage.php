<!DOCTYPE html>
<?php
/*
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item == "teacher" OR $item == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {

$sql = "SELECT * FROM students ORDER BY last";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
foreach ($results as $item) {
	$students[] = array ("stud_id" => $item['student_id'], "l_name" => $item['last'], "f_name" => $item['first']);
}
*/
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {


	include ($_SERVER['DOCUMENT_ROOT'] . "/php/progress_functions.php");
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");


?>
<html>
<title>Search</title>		<!-- Name of site page in tab -->
	<head>
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/includes/head_includes.php"); ?>	
		
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/javascript/color.php"); ?>
	
	</head>

	<body>
	
		<p> 	
			
			<?php 
				
				include('includes/toolbar.php');
				include('includes/optionsTab.php');
	
			?>
			
			<center>	
			
				<div class="subtitle">
				
					<p id="searchTitle" class="subtitle_title">
					
						Search
						
					</p>
					
					<?php
						include('search/livesearch.php');
					?>
					
				</div>
			
				<div class="content">
				
					<p id="searchPage">
					
						
						
					<?php
					$sql = "SELECT students.student_id, students.first_name, students.last_name FROM students";
					$students = array_prepare_select ($sql, $pdo, []);			
					foreach ($students as $item) {
						echo "<div id='student_names'><a class='S_names' href = 'student.php?stud_id=$item[student_id]'>" . $item['last_name'] .', '. $item['first_name'] . "</a></div>";
					}
					
				
					?>
					</p>	
				
				</div>
				
			</center>	
			
		</p>
		
	</body>

</html>

<?php

}

?>
