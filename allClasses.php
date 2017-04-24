<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {

	$teach_id = $_SESSION['id'];
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/progress_functions.php");
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");

?>

<html>

	<title>My Classes</title>		<!-- Name of site page in tab -->
	
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
				
					<p class="subtitle_title">
		
						My Classes 
					
					</p>
				
					
				
				</div>
				
				<div class="content">
		
					<p id="allClasses">
						
						<?php 
							

							include($_SERVER["DOCUMENT_ROOT"]."/php/teacher_class.php"); 
						
							if (count($classes) >= 1) { 
								foreach ($classes as $class) {
									echo "<div id='class_names'><a class='S_names' href = 'class_students.php?class_id=$class[class_id]'>$class[course_code]</a></div>";
								}
							}
							else {
								echo "Teacher has no registered class";
								
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
