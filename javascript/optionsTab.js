$(document).ready(
	function () {

		$("#optionsTab").hide();	//Hides the menu so its not visible at the start
	
			$('#optionsToggle').click(
				function () {		//Toggles the menu when the menu toggle is clicked
					$("#optionsTab").animate({width: 'toggle', opacity: 'toggle'}, 200);	//slide out animation on the menu with a fade animation
				}
			);
		
			
			$('#fade').delay(1000).fadeOut(1000);

		$("#tab1").hover(
	
			function(){	//color change when hovering over home button

			$("#tab1").addClass("hover");
			}, 
			function(){
				$("#tab1").removeClass("hover");
			}
		);

		$("#tab2").hover(
	
			function(){	//color change when hovering over search button
		
				$("#tab2").addClass("hover");
			}, 
			function(){
		
				$("#tab2").removeClass("hover");
			}
		);

		$("#tab3").hover(
			function(){	//color change when hovering over advanced search button

				$("#tab3").addClass("hover");
			}, 
			function(){
				$("#tab3").removeClass("hover");
			}
		);
		
		$("#tab4").hover(
			function(){	//color change when hovering over my classes button

				$("#tab4").addClass("hover");
			}, 
			function(){
				$("#tab4").removeClass("hover");
			}
		);
		
		$("#tab5").hover(
			function(){	//color change when hovering over logout button

				$("#tab5").addClass("hover");
			}, 
			function(){
				$("#tab5").removeClass("hover");
			}
		);
		
		$("#tab6").hover(
			function(){	//color change when hovering over edit report button

				$("#tab6").addClass("hover");
			}, 
			function(){
				$("#tab6").removeClass("hover");
			}
		);
		
		$("#tab7").hover(
			function(){	//color change when hovering over edit site button

				$("#tab7").addClass("hover");
			}, 
			function(){
				$("#tab7").removeClass("hover");
			}
		);
		
		$("#tab8").hover(
			function(){	//color change when hovering over export button

				$("#tab8").addClass("hover");
			}, 
			function(){
				$("#tab8").removeClass("hover");
			}
		);
	
	}
	
	
);


