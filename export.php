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
	<title>Export/Import</title>		<!-- Name of site page in tab -->
	<head>
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/includes/head_includes.php"); ?>
		<script type="text/javascript" src="/javascript/popup.js"></script>
		
		
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
					
						Export/Import Data
						<!--<div id="exportPrint">
						<form action="/php/pdf/report_card_maker.php">
						<button id = "printAll" type = "submit"></button>
						</form>
						</div>-->
						
					</p>
				
				</div>
			
				<div class="content">
					<div id ="exportInformation">
						
						
					
						<div id="exportTitle">	
						
							Export
							
						</div>
						
						<div id="export">
							<?php include $_SERVER['DOCUMENT_ROOT'] . "/php/export/export_csv_files.php"; ?>
							<a id="export" href = "/php/export/par-tables.php">PAR DATABASE</a><br>
							
						</div>
						
					</div>
						
					</div>
					
				</div>
			
			</center>
			
		</p>
		
	</body>

</html>

<?php } ?>
