
	Teacher:
	<select class="mobileProgress" name='teacher_id'>
		<option value='0'>
			All
		</option>
		<?php
			$sql = "SELECT staff_id, staff_first, staff_last FROM staff ORDER BY staff_last";
			$teacher_list = array_prepare_select ($sql, $pdo, []); 
			foreach ($teacher_list as $item) {
				echo "	
						<option value = '" . $item['staff_id'] . "'>
							" . $item['staff_first'] . " " . $item['staff_last'] . "
						</option>
					";	
				}
		?>
	</select>
