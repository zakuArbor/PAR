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

	$class_id = htmlspecialchars($_GET['class_id']); //htmlspecialchars prevents script injection
	if (empty($class_id)) {
		header ('Location: /allClasses.php');
	}

	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");


	include ($_SERVER['DOCUMENT_ROOT'] . "/php/teacher-security.php"); //prevents other teachers to have access to other teacher's classes
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
				
				include($_SERVER['DOCUMENT_ROOT'] . "/includes/toolbar.php");
				include($_SERVER['DOCUMENT_ROOT'] . "/includes/optionsTab.php");
				
			?>
			
			<center>
			
				<div class="subtitle">
				
					<p id="sClass" class="subtitle_title">
		
						<?php echo $class; ?>
					
					</p>
					<!-- <form name ="print" action="/php/pdf/print_class_pdf.php" method = "POST"> -->
					<form name ="print" action="/php/pdf/test/generate_class_pdf_report.php" method = "POST">
						<input type = "hidden" name = 'class_id' value = '<?php echo $class_id?>'>
						<button type="submit" class = "mobile" id="printButton"></button>
					</form>
					
				
				</div>
				
				<div class="content">
		
					<p id="allClasses">
						
						<div id="S_title"><b> STUDENTS</b></div>
							<?php
								if ($teacher_security_valid == 1) {

										#need script to auto create student reports for all students who don't have one but are enrolled
										
										include ($_SERVER['DOCUMENT_ROOT'] . "/php/create_reports.php"); //retrieves  students in a specific class
										
										include ($_SERVER['DOCUMENT_ROOT'] . "/php/student_class_list.php"); //retrieves  students in a specific class
										if (count($students) >= 1 and !empty($students)) {
											foreach ($students as $item) {
												if ($item['level_id'] != 1) {
													echo "<div id='student_names'><a class='S_names' href = 'student_report.php?stud_id=$item[student_id]&class=$class_id'>&#10004;" . $item['last_name'] . ", " . $item['first_name'] . "</a></div>";
												}
												else{
													echo "<div id='student_names'><a class='S_names' href = 'student_report.php?stud_id=$item[student_id]&class=$class_id'>" . $item['last_name'] . ", " . $item['first_name'] . "</a></div>";
												}
											}
										}
									else {
										echo "No students currently entolled in the class";
									}
								}
								
								else {
									echo "You do not have permission to edit students in this class";
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
