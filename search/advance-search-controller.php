<?php
	$permission_status = 0;
	foreach ($_SESSION['permissions'] as $item) {
		if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
			$permission_status = 1;
		}
	}
	if ($permission_status == 1) {

	$first = htmlspecialchars($_POST['f_name']);
	$last = htmlspecialchars($_POST['l_name']);
	$grade = htmlspecialchars($_POST['grade']);
	$comment = htmlspecialchars($_POST['comment_id']);
	$course = htmlspecialchars($_POST['course_id']);
	$teacher = htmlspecialchars($_POST['teacher_id']);
	$level = htmlspecialchars($_POST['level_id']);


	if ($grade == 0) {
		$grade = null;
	}
	if ($comment == 0) {
		$comment = null;
	}
	if ($teacher == 0) {
		$teacher = null;
	}
	if ($level == 0) {
		$level = null;
	}
	if ($course == 0) {
		$course = null;
	}

	$sql = "SELECT * FROM students WHERE first_name LIKE :first AND last_name LIKE :last ORDER BY last_name";
	$variables = ['first' => "%$first%", 'last' => "%$last%"];

	array_prepare_select ($sql, $pdo, $variables);

	if (count($results) >= 1) {
		if (!empty($grade)) {
			if (!empty($teacher) && !empty($course) && !empty($comment) && !empty($level)) { //grade, teacher, course, comment, and level are specified
				$sql = "SELECT students.first_name, students.last_name, students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
						INNER JOIN class ON class.class_id = student_progress.class_id 
						INNER JOIN progress_comments ON progress_comment.progress_id = progress_report.progress_id 
						WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
						AND class.staff_id = :teacher AND student_progress.class_id = :course AND progress_report.level_id = :level
						AND progress_comment.comment_id = :comment ORDER BY students.last_name";
				$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'teacher' => $teacher, 'course' => $course, 'level' => $level, 'comment' => $comment];
				echo "1";
			}
			else if (!empty($teacher) && !empty($course) && !empty($comment) && empty($level)) { //grade, teacher, course, comment are specified
				$sql = "SELECT students.first_name, students.last_name, students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
						INNER JOIN class ON class.class_id = student_progress.class_id 
						INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id 
						WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
						AND class.staff_id = :teacher AND student_progress.class_id = :course AND progress_comment.comment_id = :comment ORDER BY students.last_name";
						$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'teacher' => $teacher, 'course' => $course, 'comment' => $comment];
						echo "2";
			}
			else if (!empty($teacher) && !empty($course) && !empty($level) && empty($comment)) { //grade, teacher, course, and level are specified
				$sql = "SELECT students.first_name, students.last_name, students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
						INNER JOIN class ON class.class_id = student_progress.class_id 
						WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
						AND class.staff_id = :teacher AND student_progress.class_id = :course AND progress_report.level_id = :level ORDER BY students.last_name";
						$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'teacher' => $teacher, 'course' => $course, 'level' => $level];
						echo "3";
			}
			else if (!empty($course)) {
				if (!empty($comment) && !empty($level) && empty($teacher)) { //grade, course, comment, and level are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
							INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id 
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND student_progress.class_id = :course AND progress_report.level_id = :level AND progress_comment.comment_id = :comment ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'course' => $course, 'comment' => $comment,'level' => $level];
							echo "4";
				}
				else if (!empty($teacher) && empty($level) && empty($comment)) { //grade, course, and teacher are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN class ON class.class_id = student_progress.class_id 
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND class.staff_id = :teacher AND student_progress.class_id = :course ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'course' => $course, 'teacher' => $teacher];
							echo "5";
				}
				else if (!empty($level) && empty($teacher) && empty($comment)) { //grade, course, and level are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND progress_report.level_id = :level AND student_progress.class_id = :course ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'course' => $course, 'level' => $level];
							echo "6";
				} 
				else if (!empty($comment) && empty($teacher) && empty($level)) { //grade, course, comment are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
							INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id 
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND progress_comment.comment_id = :comment AND student_progress.class_id = :course ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'course' => $course, 'comment' => $comment];
							echo "7";
				}		
				else { //only grade and course is specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							WHERE student_progress.class_id = :course AND students.grade = :grade ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'course' => $course];
							echo "8";
				}		
			}	
			else if (!empty($teacher)) { 
				if (!empty($level)) { //grade, teacher, and level are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
							INNER JOIN class ON class.class_id = student_progress.class_id 
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND progress_report.level_id = :level AND class.staff_id = :teacher ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'teacher' => $teacher, 'level' => $level];
							echo "9";
				}
				else if (!empty($comment)) { //grade, teacher, and comment are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
							INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
							INNER JOIN class ON class.class_id = student_progress.class_id  
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND progress_comment.comment_id = :comment AND class.staff_id = :teacher ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'teacher' => $teacher, 'comment' => $comment];
							echo "10";
				}
				else { //grade, teacher are specified
					$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
							INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
							INNER JOIN class ON class.class_id = student_progress.class_id 
							WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
							AND class.staff_id = :teacher ORDER BY students.last_name";
							$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'teacher' => $teacher];
							echo "11";
				}
			}
			else if (!empty($comment) && !empty($level)) { //grade, comment, and level are specified
				$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
						INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id 
						WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
						AND progress_comment.comment_id = :comment AND progress_report.level_id = :level ORDER BY students.last_name";
						$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'comment' => $comment, 'level' => $level];
						echo "12";
			}
			else if (!empty($level) && empty($teacher) && empty($course) && empty($course)) { //grade and level are specified
				$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
						WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
						AND progress_report.level_id = :level ORDER BY students.last_name";
						$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'level' => $level];
						echo "13";
			}
			else if (!empty($comment) && empty($level) && empty($course)) { //only grade and comment are specified
				$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
						INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
						WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND students.grade = :grade 
						AND progress_comment.comment_id = :comment ORDER BY students.last_name";
						$variables = ['first' => "%$first%", 'last' => "%$last%", 'grade' => $grade, 'comment' => $comment];
						echo "14";
			}
			else { //only grade 
				$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
						WHERE students.grade = :grade ORDER BY students.last_name";
						$variables = ['grade' => $grade];
						echo "15";
			}
		}

	    if (empty($grade) && !empty($teacher)) {
	        if (!empty($course) && !empty($comment) && empty($level)) { //teacher, course, and comment are specified
	            $sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
	                    INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher
	                    AND progress_comment.comment_id = :comment AND student_progress.class_id = :course ORDER BY students.last_name";
	                    $variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher, 'course' => $course, 'comment' => $comment];
	                    echo "16";
	        }
	        else if (!empty($level) && !empty($course) && empty($comment)) { //teacher, course, level are specified
	            $sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher
	                    AND student_progress.class_id = :course AND progress_report.level_id = :level ORDER BY students.last_name";
	                    $variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher, 'course' => $course, 'level' => $level];
	                    echo "17";
	        }
	        else if (!empty($level) && !empty($comment) && empty($course)) { //teacher, level, and comment are sepcified
	        	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
	                    INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id 
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher
	                    AND progress_comment.comment_id = :comment AND progress_report.level_id = :level ORDER BY students.last_name";
	                    $variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher, 'comment' => $comment, 'level' => $level];
	                    echo "18";
	        }
	        else if (!empty($course) && empty($level) && empty($comment)) { //teacher and course are specified
	        	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher AND student_progress.class_id = :course
	                    ORDER BY students.last_name";
	                    $variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher, 'course' => $course];
	                    echo "19";
	        }
	        else if (!empty($comment) && empty($level) && empty($course)) { //teacher and comment are specified
	        	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
	                    INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher
	                    AND progress_comment.comment_id = :comment ORDER BY students.last_name";
	                    $variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher, 'comment' => $comment];
	                    echo "20";
	        }
	        else if (!empty($level) && empty($comment) && empty($course)) { //teacher and level are specified
	        	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
	                    INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher
	                    AND progress_report.level_id = :level ORDER BY students.last_name";
	                    $variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher, 'level' => $level];
	                    echo "21";
	        }
	        else if (empty($course) && empty($comment) && empty($level)) { //only teacher is specified
	        	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
	                    INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
	                    INNER JOIN class ON class.class_id = student_progress.class_id
	                    WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND class.staff_id = :teacher ORDER BY students.last_name";
	        			$variables = ['first' => "%$first%", 'last' => "%$last%", 'teacher' => $teacher];
	        			echo "22";
	        }
	    }
	    else if (!empty($course)) {
	    	if (!empty($comment) && !empty($level) && empty($teacher) && empty($grade)) { //course, level, and comment are specified
		    	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
		                WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND student_progress.class_id = :course
		                AND progress_comment.comment_id = :comment AND progress_report.level_id = :level ORDER BY students.last_name";
		                $variables = ['first' => "%$first%", 'last' => "%$last%", 'course' => $course, 'level' => $level, 'comment' => $comment];
		                echo "23";
	        }
	        else if (!empty($comment) && empty($level) && empty($teacher) && empty($grade)) { //course and comment are specified
		    	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
		                WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND student_progress.class_id = :course
		                AND progress_comment.comment_id = :comment ORDER BY students.last_name";
		                $variables = ['first' => "%$first%", 'last' => "%$last%", 'course' => $course, 'comment' => $comment];
		                echo "24";
		    }
		    else if (!empty($level) && empty($comment) && empty($teacher) && empty($grade)) { //course and level are specified
		    	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND student_progress.class_id = :course
		                AND progress_report.level_id = :level ORDER BY students.last_name";
		                $variables = ['first' => "%$first%", 'last' => "%$last%", 'course' => $course, 'level' => $level];
		                echo "25";
	        }
	        else if (empty($level) && empty($comment) && empty($teacher) && empty($grade)) { //only course is specified
	        	$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                WHERE students.first_name LIKE :first AND students.last_name LIKE :last AND student_progress.class_id = :course ORDER BY students.last_name";
		                $variables = ['first' => "%$first%", 'last' => "%$last%", 'course' => $course];
		                echo "26";
	        }
	    }
	    else if (!empty($comment) && !empty($level) && empty($teacher) && empty($grade)) { //comment and level are specified
	    		$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
		                WHERE progress_comment.comment_id = :comment AND progress_report.level_id = :level ORDER BY students.last_name";
		                $variables = ['first' => "%$first%", 'last' => "%$last%", 'level' => $level, 'comment' => $comment];
		                echo "27";
	    }
	    else if (!empty($level) && empty($comment) && empty($teacher) && empty($grade)) { //only level is specified
	    		$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                WHERE progress_report.level_id = :level ORDER BY students.last_name";
		                $variables = ['level' => $level];
		                echo "28";

	    }
	    else if (!empty($comment) && empty($grade) && empty($level) && empty($teacher) && empty($course)) { //only comment is specified
	    		$sql = "SELECT students.first_name, students.last_name , students.student_id FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		                INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id 
		                INNER JOIN progress_comment ON progress_comment.progress_id = progress_report.progress_id
		                WHERE progress_comment.comment_id = :comment ORDER BY students.last_name";
		                $variables = ['comment' => $comment];
		                echo "29";
		}
	   	$results = array_prepare_select ($sql, $pdo, $variables);
	    


	        if (count($results) < 1) {
	            echo "NO RESULTS FOUND";
	        }
	    


	    foreach ($results as $item) {       
	       echo "<div id='student_names'><a class='S_names' href = 'student.php?stud_id=$item[student_id]'>" . $item['last_name'] .', '. $item['first_name'] . "</a></div>";
	    }
	}
	else {
	    echo "NO RESULTS FOUND";
	}
}
?>
