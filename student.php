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
	
	$student_id = $_GET['stud_id'];
?>
<html>
	<title>Student Info</title>		<!-- Name of site page in tab -->
	<head>
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/includes/head_includes.php"); ?>	
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/javascript/color.php"); ?>
		<style>
			iframe {
				width: 70%;
				height: 100%;
				border:none;
			}
		</style>
	
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
						
						<?php 
							#retrieve student name##########################################################
							$sql = "SELECT first_name, last_name FROM students
									WHERE student_id = :student_id";
							$student = null;
							$student = single_return_prepare_select ($sql, $pdo, ['student_id' => $student_id]);
							################################################################################
							echo $student['last_name'] . ", " . $student['first_name'];
		 
							?>
					
					</p>
					<form name ="print" action="/php/pdf/student_pdf_report_card.php" method = "GET">
						<input type = "hidden" name = 'stud_id' value = '<?php echo $_GET['stud_id']; ?>'>
						<button type="submit" class="studProg" id="printButton"></button>
					</form>
				
				
				</div>
			
				<div class="content">
				
					<p id="home">
					<?php
					if (empty($student)) {
						echo "ERROR: STUDENT DOES NOT EXIST";
						exit();
					}
					else {
						include ($_SERVER['DOCUMENT_ROOT'] . "/php/student_report_cards.php"); //fetches a student class id for all of their classes
						if ($class_valid == 1) {?>
							<iframe src = "/php/pdf/student_pdf_report_card.php?stud_id=<?php echo $student_id; ?>" scrolling="auto"></iframe>
						<?php 
						}
						else {
							echo "STUDENT IS NOT REGISTERED IN ANY CLASSES";
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

<?php

}

?>
