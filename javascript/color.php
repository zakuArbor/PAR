<?php
/******************************************************************************************************************************************/
/* This script takes colors selected from the color scheme part of the editSite page and applies them to the appropriate part of the website.
/* This script acts as an alternate css file but, only for the colors seen throughout the website.
/******************************************************************************************************************************************/
?>
<?php		/*This php selects colors from the database colors and adds them to an array called colors*/
$sql = "SELECT color FROM theme";
$results = array_prepare_select($sql, $pdo, []);
#print_r($results);
#echo "<br";
$color = array();
foreach ($results as $item) {
	array_push($color, array('color' => $item['color']));
}
#print_r($color);


					
				
/*
Color Codes:

0 --> primary color
1 --> secondary color
2 --> tertiary color 
3 --> primary font color 
4 --> secondary font color 
5 --> shadow color



This style sheet below uses the colors array to apply the appropriate color to the website
*/
?>
<style>		

#pup{
	background-color:<?php echo "#" . $color[2]['color']; ?>;
	color: <?php echo "#" . $color[4]['color']; ?>;

}

#export{
	color:<?php echo "#" . $color[3]['color']; ?>;

}

#export:hover{
	color:<?php echo "#" . $color[4]['color']; ?>;

}

#exportTitle{
	color:<?php echo "#" . $color[3]['color']; ?>;

}

#exportInformation{
	color:<?php echo "#" . $color[3]['color']; ?>;

}

#import{
	color:<?php echo "#" . $color[3]['color']; ?>;

}

#importTitle{
	color:<?php echo "#" . $color[3]['color']; ?>;

}

#importInformation{
	color:<?php echo "#" . $color[3]['color']; ?>;

}

.s_list{
	color:<?php echo "#" . $color[3]['color']; ?>;
	opacity:1;
}

.s_list:hover{
	color: <?php echo "#" . $color[4]['color']; ?>;

}
#fade{
	color:<?php echo "#" . $color[3]['color']; ?>;
}

.subtitle_title a {
	color:<?php echo "#" . $color[3]['color']; ?>;
	
}

#fButton a {
	color:<?php echo "#" . $color[3]['color']; ?>;
}

#bButton a {
	color:<?php echo "#" . $color[3]['color']; ?>;
}

#fButton a:hover {
	color:<?php echo "#" . $color[4]['color']; ?>;
	border: 2px solid <?php echo "#" . $color[4]['color']; ?>;;
}

#bButton a:hover {
	color:<?php echo "#" . $color[4]['color']; ?>;
	border: 2px solid <?php echo "#" . $color[4]['color']; ?>;;
}

#footerInformation{
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

#headerInformation{
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

#editComments{
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

.content {
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	color: <?php echo "#" . $color[5]['color']; ?>;
	
}
.subtitle_title {
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

#searchPage{			
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

#home{					
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

#allClasses{			
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

#header{					
	color: <?php echo "#" . $color[3]['color']; ?>;
		
}

#headerExample {				
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

#headerTitle{			
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

#footerExample {				
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

#footerTitle{			
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

#footer{				
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

#editCommentsTitle{			
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

#comments{					
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

.messageTitle{				
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

#message{				
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

.messageTitle1{
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

.messageTitle2{
	color: <?php echo "#" . $color[3]['color']; ?>;	

}

#homePageContent{			
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

#themer{	
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

#advSearch{			
	color: <?php echo "#" . $color[3]['color']; ?>;	
	
}

#ProgressForm {			
	color:  <?php echo "#" . $color[3]['color']; ?>;

}

#ProgressTable {				
	color: <?php echo "#" . $color[3]['color']; ?>;
	
}

.S_names{				
	color: <?php echo "#" . $color[4]['color']; ?>;
	
}



#class_names a{			
	color: <?php echo "#" . $color[4]['color']; ?>;
	
}

#student_names a{			
	color: <?php echo "#" . $color[4]['color']; ?>;
	
}

.show:hover{				
	color: <?php echo "#" . $color[4]['color']; ?>;
	
}

.tabs a{			
	color: <?php echo "#" . $color[4]['color']; ?>;
	
}

.subtitle{
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	color: <?php echo "#" . $color[5]['color']; ?>;
	
}

#toolbar{
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	color: <?php echo "#" . $color[5]['color']; ?>;
	
}

.tabs{
	background-color: <?php echo "#" . $color[2]['color']; ?>;
	opacity:1;
}

#optionsTab{
	background-color: <?php echo "#" . $color[1]['color']; ?>;
	color: <?php echo "#" . $color[5]['color']; ?>;
	
}

.hover{
	background-color: <?php echo "#" . $color[1]['color']; ?>;
	
}

.show:hover{
	background: <?php echo "#" . $color[0]['color']; ?>;
	
}

.show{
	background: <?php echo "#" . $color[2]['color']; ?>;
	
}

.S_names{
	background-color: <?php echo "#" . $color[2]['color']; ?>;
		
}

#class_names a:hover{
	color:	<?php echo "#" . $color[3]['color']; ?>;

}

#S_title{
	color:	<?php echo "#" . $color[3]['color']; ?>;

}

#class_names{
	background-color: <?php echo "#" . $color[2]['color']; ?>;
	color: <?php echo "#" . $color[5]['color']; ?>;
	
}

#student_names{
	background-color: <?php echo "#" . $color[2]['color']; ?>;
	color: <?php echo "#" . $color[5]['color']; ?>;
	
}

#student_names a:hover{
	color:	<?php echo "#" . $color[3]['color']; ?>;
}

a.S_names:hover {
	background: <?php echo "#" . $color[0]['color']; ?>;
		
}


#result{
	background-color: <?php echo "#" . $color[1]['color']; ?>;
	
}

#printButton{
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	opacity: 1;
}

#printButton:hover{	
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	opacity:0.8;
	
}
#printAll{
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	opacity: 1;
}

#printAll:hover{
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	opacity:0.8;
}

#optionsToggle:hover{
	background-color: <?php echo "#" . $color[0]['color']; ?>;
	opacity:0.8;
		
}

#l1{
	background: <?php echo "#" . $color[1]['color'] ; ?>;
	
}

#l2{
	background: <?php echo "#" . $color[1]['color'] ; ?>;
	
}

#l3{
	background: <?php echo "#" . $color[1]['color'] ; ?>;
	
}

#l4{
	background: <?php echo "#" . $color[1]['color'] ; ?>;
	
}
</style>

