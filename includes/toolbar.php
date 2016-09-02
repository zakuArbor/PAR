
<div id="toolbar">



	<p> 
					
			<img src="/images/WcssLogo.png" height="130" width="130">
		
	</p>
	
	<?php
						if(isset($_COOKIE["submit"])){
						echo "<div id = 'fade'>$_COOKIE[submit]</div>";
						}else{
						echo "";
						}
						?>
	
</div>	

<div id="optionsToggle">
	 <div id="l1"></div>
	 <div id="l2"></div>
	 <div id="l3"></div>
	 <div id="l4"></div>
</div>
