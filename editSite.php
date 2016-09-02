<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");
?>
<html>
	<title>Edit Site</title>		<!-- Name of site page in tab -->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=0.4, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="HomePage.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="/javascript/optionsTab.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/javascript/ckeditor/ckeditor.js"></script>
		
		<script type="text/javascript" src="/javascript/jscolor/jscolor.js"></script>
		<?php include ($_SERVER['DOCUMENT_ROOT'] . "/javascript/color.php"); ?>
		
		
		<script type="text/javascript">
			window.onload = function()
			{
				CKEDITOR.replace( 'message',{width : '90%'} );
				CKEDITOR.replace( 'notification',{width : '90%'} );
			};
		</script>
		
		
	
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
					
						Edit Site
					
					</p>
				
				</div>
			
				<div class="content">
				
					<p id="home">
						<div id="homePageContent">
						<?php
													
								$sql = "SELECT * FROM homePage";
								$homePage = array_prepare_select ($sql, $pdo, []);
								 /*
								 while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
									$homePage[] = array('title' => $item['title'], 'content' => $item['content']);										
								 }*/								
							?>
							
						<form action="/php/homepageContent.php" method="POST">
							First input Title: <input  class="mobileProgress" name = 'messageTitle' value="<?php echo $homePage[0]['title'] ?>" ></textarea>
							<br></br>
							First input Message: <br></br><center><textarea  id="message" name = 'message' rows="6" col="40" ><?php echo $homePage[0]['content'] ?></textarea>		
							</center><br></br>
							Second input Title: <input  class="mobileProgress" name = 'notificationTitle' value="<?php echo $homePage[1]['title'] ?>" ></textarea>		
							<br></br>
							Second input Message: <br></br><center><textarea id="notification" name = 'notification' rows="6" col="40" ><?php echo $homePage[1]['content'] ?></textarea>		
							</center><br></br>
							<input class="mobileProgress" type="submit" value="Submit">							
							</form>
							
							
							
							<?php
													
								$sql = "SELECT * FROM theme";
								$Pcolor = array_prepare_select ($sql, $pdo, []);

								 /*while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
									$Pcolor[] = array('color' => $item['color']);										
								 }*/									
							?>
							
						</div>	
					<div id="themer">	

						<center><b>Site color Theme</b></center><br></br>
						
						<form action="/php/colorPicker.php" method = "POST">
							  Select a Primary color: <input id ="mobileColor" class="color" name="Pcolor" value="<?php echo $Pcolor[0]['color'] ?>" ><br>
							  Select a Secondary color: <input id ="mobileColor" class="color" name="Scolor" value="<?php echo $Pcolor[1]['color'] ?>"><br>
							  Select a tertiary color:<input id ="mobileColor" class="color" name="Tcolor" value="<?php echo $Pcolor[2]['color'] ?>"><br>
							  Select Primary font color: <input id ="mobileColor" class="color" name="Fcolor" value="<?php echo $Pcolor[3]['color'] ?>"><br>
							  Select Secondary font color: <input id ="mobileColor" class="color" name="SFcolor" value="<?php echo $Pcolor[4]['color'] ?>"><br>
							  Select shadow color: <input id ="mobileColor" class="color" name="SHcolor" value="<?php echo $Pcolor[5]['color'] ?>"><br>
							  
							  <input class="mobileProgress" type="submit">
						</form>
						<form action="/php/colorPicker.php">
						
							
							select default colors: <input class="mobileProgress" value="Default" type="submit">
						</form>
						
					</div>
					
						
						
					</p>
				
				</div>
			
			</center>
			
		</p>
		
	</body>

</html>
<?php } ?>