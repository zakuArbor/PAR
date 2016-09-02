<?php 

include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	if ($item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {
	/*
	$sql = "SELECT * FROM students ORDER BY last";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
	foreach ($results as $item) {
		$students[] = array ("l_name" => $item['last'], "f_name" => $item['first']);
	}*/
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/progress_functions.php");
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");

?>

<html>

	<title>Advance Search</title>		<!-- Name of site page in tab -->
	
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=0.4, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="/HomePage.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="/javascript/optionsTab.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
		
		
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
				
					<p class="subtitle_title" id="adSeTit">
					
						Advanced Search
						
					</p>
					
					<?php
					
						include('search/livesearch.php');
						
					?>	
					
				</div>
			
				<div class="content">	
				
					<div id="advSearch">
					
						<form name='Grade' action = '/advancedSearchResults.php' method = 'POST'>	
						
							First Name: 
							<input class="mobileProgress" type="text" class='inputsize' placeholder="First Name" name='f_name'></input>								
							<br>								
							Last Name: 
							<input class="mobileProgress" type="text" class='inputsize' placeholder="Last Name" name='l_name'></input>							
							<br>
							
							Grade:
							<select class="mobileProgress" name='grade'>
							
							  <option value="0">All</option>
							  <option value="9">Grade 9</option>
							  <option value="10">Grade 10</option>
							  <option value="11">Grade 11</option>
							  <option value="12">Grade 12</option>
							  
							</select>
							
							<br>
							
							<?php								
								include('search/advComments.php');
								echo"<br>";
								include('search/courses.php');
								echo"<br>";
								include('search/teachers.php');
								echo"<br>";
								include('search/progress.php');
								echo"<br>";
							?>
							
							<input class="mobileProgress" type = 'submit' value = 'submit'>
							
						</form>
						
						
					</div>	
					
				</div>
				
			</center>	
			
		</p>
		
	</body>

</html>

<?php } ?>