
	Course:
	<select class="mobileProgress" name = "course_id">
		<option value='0'>
			All
		</option>
		<?php
			$sql = "SELECT class.class_id, courses.course_code FROM class INNER JOIN courses ON courses.course_id = class.course_id";
			$course_list = array_prepare_select ($sql, $pdo, []); 

			foreach ($course_list as $item) {
				echo "	
						<option value = '" . $item['class_id'] . "'>
							" . $item['course_code'] . "
						</option>
							
					";			
			}
		?>
	</select>
