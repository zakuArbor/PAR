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
$stud_id = htmlspecialchars($_GET['stud_id']); //htmlspecialchars prevents script injection
$class_id = htmlspecialchars($_GET['class']); //htmlspecialchars prevents script injection
$teach_id = $_SESSION['id'];

#include ($_SERVER["DOCUMENT_ROOT"] . "/php/report_info.php"); //gathers all revelant student information about their progress report card


include ($_SERVER['DOCUMENT_ROOT'] . "/php/progress_functions.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");

include ($_SERVER['DOCUMENT_ROOT'] . "/php/teacher-security.php"); //prevents other teachers from editing student's report card

?>
<!DOCTYPE html>

<html>
	<title>Student Info</title>		<!-- Name of site page in tab -->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=0.4, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="/HomePage.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="/javascript/optionsTab.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
		
		
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/javascript/color.php"); ?>
	
		<style>
			input[type="checkbox"]:disabled {
		    	visibility: hidden;
			}
		</style>

		<script>
		//CREDIT FOR CHECKBOX LIMITATION BASIC CODE TO http://jsfiddle.net/jaredhoyt/Ghtbu/1/
		jQuery(function(){
    		var max = 3;
    		var checkboxes = $('input[type="checkbox"]');
                       
		    checkboxes.change(function(){
		        var current = checkboxes.filter(':checked').length;
		        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
		        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
		    });
		});
		</script>
	</head>

	<body> 
	
		<p> 	
			
			<?php //This displays the menu 
				
				include($_SERVER['DOCUMENT_ROOT'] . "/includes/toolbar.php");
				include($_SERVER['DOCUMENT_ROOT'] . "/includes/optionsTab.php");
				
			?>
			
			<center>
			
			

				<div class="subtitle">
					<div id ="bfButton">
					<?php if ($teacher_security_valid == 1) { ?>
					<?php 
						#LINK TO PREVIOUS & NEXT STUDENT###################################################
						include ($_SERVER['DOCUMENT_ROOT'].'/php/gather_class_student.php');
						$i = 0;
						foreach ($students as $student) {
							if ($student['student_id'] == $stud_id) {
								$len = count($students);
								if ($i != 0) { #not the first student in the list
									$prev_id = $students[$i-1]['student_id'];
									echo "<div id = 'bButton'><a href = 'student_report.php?stud_id=$prev_id&class=$class_id'>Back</a></div>";	
								}
								if ($i != $len) {#not last student on the list
									$next_id = $students[$i+1]['student_id'];
									echo "<div id= 'fButton'><a href = 'student_report.php?stud_id=$next_id&class=$class_id'>Next</a></div>";
								}
							}
							$i+=1;
						}
						########################################################################

							
					?>
					<?php } ?>
					</div>
						<?php if ($teacher_security_valid == 1) { ?>
						<h3 class="subtitle_title" Id="progTitle">
						<?php
							#retrieve student name##########################################################
							$sql = "SELECT first_name, last_name FROM students
									WHERE student_id = :student_id";
							$student = null;
							$student = single_return_prepare_select ($sql, $pdo, ['student_id' => $stud_id]);
							################################################################################
							#retrieve course code###########################################################
							$sql = "SELECT course_code FROM courses WHERE course_id = :course_id";
							$course = single_return_prepare_select($sql, $pdo, ['course_id' => $class_id]);
							################################################################################
							

							echo "<div id='classLink'><b><a href = '/class_students.php?class_id=$class_id'>" . $course['course_code']  . "</a></b><div id='name'>" . " - " . $student['last_name'] . ", " . $student['first_name'];
							echo "</div></div>";
						 
							 
						 ?>
						 <?php } ?>
						 </h3>
					<?php if ($teacher_security_valid == 1) { ?>
					<form name ="print" action="/php/pdf/student_pdf_report_card.php" method = "GET">
						<input type = "hidden" name = 'stud_id' value = '<?php echo $stud_id?>'>
						<button type="submit" class="progUp" id="printButton"></button>
					</form>
					<?php } ?>
				</div>
				
				<div id = "incase">
								
				<div class="content" id = "s_list" style="text-align: left;">
				<?php if ($teacher_security_valid == 1) { ?>
				<?php


					include ($_SERVER['DOCUMENT_ROOT'] . "/php/student_class_list.php"); //retrieves  students in a specific class
								
					if (count($students) >= 1 and !empty($students)) {
						foreach ($students as $item) {
							if ($item['level_id'] != 1) {
								echo "<a class='s_list' href = 'student_report.php?stud_id=$item[student_id]&class=$class_id'>" . $item['last_name'] . ", " . $item['first_name'] . "&nbsp;&nbsp;&#10004;</a><br/>";		
							}
							else{
								echo "<a class='s_list' href = 'student_report.php?stud_id=$item[student_id]&class=$class_id'>" . $item['last_name'] . ", " . $item['first_name'] . "</a><br/>";
							}
						}
					}
					

					/*
					include ($_SERVER['DOCUMENT_ROOT'] . "/php/class_students_info.php"); //retrieves teacher's students in a specific class
					foreach ($results as $item) {
						if ($item['level_id'] != 1) {						
							echo "<a class='s_list' href = 'student_report.php?stud_id=$item[student_id]&class=$class_id'>" . $item['last'] . ", " . $item['first'] . "&nbsp;&nbsp;&#10004;</a><br/>";		
							//adds check mark if student progress is complete
						}
						else {
							echo "<a class='s_list' href = 'student_report.php?stud_id=$item[student_id]&class=$class_id'>" . $item['last'] . ", " . $item['first'] . "</a><br/>";
						}
					}*/
				?>
				<?php } ?>
			</ul>	
				</div>
				
				<div class="content" id ="p_list">
				
					<p id="home">
										
					<?php if ($teacher_security_valid == 1) { ?>

						<div id="sPic">
							<?php
							/*Student Picture***********************************************************/
					        $sql = "SELECT OEN FROM student_info WHERE student_id = :stud_id";
					        $picture = single_return_prepare_select($sql, $pdo, [':stud_id' => $stud_id]);
					        $picture['OEN'] .= ".jpg";
					        $picture_location = "/images/studentPics/" . $picture['OEN']; 

					        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picture_location) != 0) {
					          echo "<img src = '" . $picture_location . "'>";
					        }
					        else { 
					          echo "<img src = '" . '/images/studentPics/Blank.jpg' . "'>";
					        }
					        /***************************************************************************/
							?>
							
						</div>
						
									<?php
									

										$sql = "SELECT progress_report.progress_id FROM progress_report 
										INNER JOIN student_progress ON  student_progress.progress_id = progress_report.progress_id
										WHERE student_progress.student_id = :student_id AND student_progress.class_id = :class_id";
										$variables = array(':student_id' => $stud_id, ':class_id' => $class_id);	
										$results = single_return_prepare_select($sql, $pdo, $variables);             
										$progress_id = $results;
										#retrieve current student level and interview request############################################################
										$sql = "SELECT level_id, interview_request FROM progress_report WHERE progress_id = :progress_id";
										$variables = array('progress_id' => $progress_id['progress_id']);
										$student_progress = single_return_prepare_select($sql, $pdo, $variables);
										#################################################################################################################

										#retrieve current student level and interview request############################################################
										$sql = "SELECT level_id, interview_request FROM progress_report WHERE progress_id = :progress_id";
										$variables = array('progress_id' => $progress_id['progress_id']);
										$student_progress = single_return_prepare_select($sql, $pdo, $variables);
										#################################################################################################################
										#retrieve current student comments ##############################################################################
										$sql = "SELECT comment_id FROM progress_comment WHERE progress_id = :progress_id";
										$variables = array('progress_id' => $progress_id['progress_id']);
										$student_comments = array_prepare_select($sql, $pdo, $variables);
										#################################################################################################################

										echo "<form name='comment' id='ProgressForm' action = '/php/progress_report_update.php' method = 'POST'>";

										#PRINT OUT LEVEL DROPLIST########################################################################################
										form_level($student_progress['level_id'], $pdo);
										#################################################################################################################


									 


										echo "<p class='mobileProgress'><b>PROGRESS COMMENT</b></p>";
										
										#PRINT OUT COMMENT LIST##########################################################################################
										$comment_list = comment_display($student_comments, $pdo);
										#################################################################################################################
										
								?>
								<script>
									$(document).ready(function(){
										var max = 3;
    									var checkboxes = $('input[type="checkbox"]');
            							var current = checkboxes.filter(':checked').length;
								        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
								        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
	    							}); 
								</script>
							<br><div class='mobileProgress' id = "parent_teacher_interview">
							
					    		Parent Teacher Interview:<br>	
								<?php 
									$interview_request_no = "<label id ='yes_no' for ='yes_no'><input style='width:25px; height:25px;' id = 'yes_no' type='radio' name='interview_request' value='0' required";
									$interview_request_yes = "<label id ='yes_no' for ='no_yes'><input style='width:25px; height:25px;' id = 'no_yes' type='radio' name='interview_request' value='1' required";
					    			if ($student_progress['interview_request'] == 0) {
					    				$interview_request_no .= " checked";
					    			}
					    			$interview_request_no .= ">No</label><br>";
					    			if ($student_progress['interview_request'] == 1) {
					    				$interview_request_yes .= " checked";
					    			}
					    			$interview_request_yes .= ">Yes</label><br>";
					    			echo $interview_request_yes . $interview_request_no;
					    		?>
					    	</div>
					    	<!--Hidden Input********************************************************************************************-->		    		  
					    	<input type = 'hidden' name = 'progress_report' value = <?php echo "$progress_id[progress_id]"; ?>>
							<input type = 'hidden' name = 'class_id' value = <?php echo "$class_id"; ?>>
							<!--Hidden Input********************************************************************************************-->					
					    	<input  class='mobileProgress' id="progSub" type = 'submit' value = 'submit'>
					    </form>
					
					</p>
				<?php }

				else {
					echo "You do not have permission to edit students in this class";
				} 
				 ?>
				</div>
			</div>
			<?php 
				
			?>
			</center>
			
		</p>
	</body>

</html>


<?php

}

?>
