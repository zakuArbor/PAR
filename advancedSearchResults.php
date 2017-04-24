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
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");
?>

<html>
	<title>Results</title>		<!-- Name of site page in tab -->
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
						Results
					</p>
					
					<?php
						include('search/livesearch.php');
					?>
				</div>
			
				<div class="content">
				
					<?php
						include('search/advance-search-controller.php');
					?>
				</div>
				
			</center>	
			
		</p>
		
	</body>

</html>

	
<?php } ?>
