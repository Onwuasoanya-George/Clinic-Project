$(document).ready(function(){
			$("div#update").slideUp();
			$("img#manual").click(function(){
					$("div#update").slideToggle("slow");
					}); 
						//logic for registration
						$("img#register_picture").click(function(){
					$("div#logdrawer").slideUp("slow");
					$("div#logdrawer").fadeIn("slow");
					$("div#regframe").fadeIn(2000);
					
					//hide others
					$("div#logUserframe").hide();
					$("div#logDocframe").hide();
					$("div#defframe").hide();
					}); // end registration logic
					
					//logic for login doc
						$("img#login_picturedoc").click(function(){
					$("div#logdrawer").slideUp("slow");
					$("div#logdrawer").fadeIn("slow");
					$("div#logDocframe").fadeIn(2000);
					
					//hide others
					$("div#regframe").hide();
					$("div#logUserframe").hide();
					$("div#defframe").hide();
						
					
					}); // end login doc logic
					
					//logic for login user
						$("img#login_pictureuser").click(function(){
					$("div#logdrawer").slideUp("slow");
					$("div#logdrawer").fadeIn("slow");
					$("div#logUserframe").fadeIn(2000);
					
					//hide others
					$("div#regframe").hide();
					$("div#logDocframe").hide();
					$("div#defframe").hide();
						
			 });// end login user function
			});// end doc function