
	Comments:
	<select class="mobileProgress" name = 'comment_id' required>
		<option value='0'>
			All
		</option>
		<?php
			$sql = "SELECT comment_id, comment FROM comment_list";
			$comment_list = array_prepare_select ($sql, $pdo, []); 
			foreach ($comment_list as $item) {
				echo "	
						<option value = '" . $item['comment_id'] . "'>"
							 . $item['comment'] . 
						"</option>";							
				}
		?>
	</select>
