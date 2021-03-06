<?php

include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");
?>
<html>
	<title>HomePage</title>		<!-- Name of site page in tab -->
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
				
					<p id="homeTitle" class="subtitle_title">
					
						HomePage
					
					</p>
				
				</div>
			
				<div class="content">
				
					<p id="home">
					
						<?php
													
								$sql = "SELECT * FROM homePage";
								$homePage = array_prepare_select($sql, $pdo, []);					
								
						?>
						
						<div class="messageTitle1">
							<?php
								echo $homePage[0]['title'];
							?>
							<div id="message">
								<?php
								echo $homePage[0]['content'];
							?>
							</div>
						</div>
						
						<div class="messageTitle2">
							<?php
								echo $homePage[1]['title'];
							?>
							<div id="message">
								<?php
								echo $homePage[1]['content'];
							?>
							</div>
						</div>
					
					</p>
				
				</div>
			
			</center>
			
		</p>
		
	</body>

</html>

<?php
} 
else {
	echo "NO PERMISSION";
}
?>
