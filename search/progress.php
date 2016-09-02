
	Progress:
	<select class="mobileProgress" name='level_id'>
		<option value='0'>
			All
		</option>
		<?php
			$sql = "SELECT * FROM progress_level";
			$progress_list = array_prepare_select ($sql, $pdo, []); 
			foreach ($progress_list as $item) {
				echo "	
						<option value = '" . $item['level_id'] . "'>
							" . $item['level'] . "
						</option>
							
					";				
				}
		?>
	</select>
