<div id="optionsTab">
	<div id ="scroll">
	<div class="tabs" id="tab1">		
		
		<a href="index.php"> 
			Home
		</a>	
		
	</div>
	
	<div class="tabs" id="tab2">
		
		<a href="searchPage.php"> 
			Search
		</a>
		
	</div>
	
	
		<?php 
		
		$permission_status = 0;
		foreach ($_SESSION['permissions'] as $item) {
			//echo $item;
			if ($item['position'] == "sso_admin") { 
				$permission_status = 1;
			}
		}
		if ($permission_status == 1) {?>
	
	
	<div class="tabs" id="tab3">
		
		<a href="advancedSearch.php"> 
			Advanced Search
		</a>
		
	</div>	
	
	<div class="tabs" id="tab6">
		
		<a href="editReport.php"> 
			Edit Report
		</a>
		
	</div>	
	
	<div class="tabs" id="tab7">
		
		<a href="editSite.php"> 
			Edit Site
		</a>
		
	</div>	
	
	<div class="tabs" id="tab8">
		
		<a href="export.php"> 
			Export/Import
		</a>
		
	</div>	
	
	<?php } ?>
	
	<div class="tabs" id="tab4">
		
		<a href="allClasses.php"> 
			My Classes
		</a>
		
	</div>	
	
	<div class="tabs" id="tab5">
		
		<a href="/SSO/logout.php"> 
			Logout
		</a>
		
	</div>	
	
	<div class="tabs" id="tab12">
		
		<a href="/SSO/logout.php"> 
			Logout
		</a>
		
	</div>
	
	</div>
	
</div>
