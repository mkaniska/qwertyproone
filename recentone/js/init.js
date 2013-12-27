$(function(){
		//$( "#tabs" ).tabs({
		 // beforeActivate: function(event, ui){
		//	 if(ui.newTab.find("a").attr("href")=='#tabs-2'){ /*checkStepOneValidation(); */}
		//	 else if(ui.newTab.find("a").attr("href")=='#tabs-3'){ /*checkStepTwoValidation(); */}
		//  }
		// });
		//$( "#tabs" ).tabs( "option", "disabled", [ 1,2 ] );
		 
		$( "#next1" ).click(function() {
			checkStepOneValidation();
		});
		$( "#next2" ).click(function() {
			checkStepTwoValidation();
		});
		
		/*$( "#doSignupButton").click(function() {
			isValidSignup();
		});
		
		$( "#contact_us_form").submit(function() {
			isValidContact();
		});
*/
		$( "#doCancel" ).click(function() {
			//window.location.href='http://work.ideasdiary.com/welcome/home';
			window.location.href='http://localhost/qwerty/welcome/home';
		});
		
		$( "#processLogin" ).click(function() {
			dologin();
		});
		$( "#submitride" ).click(function() {
			checkStepThreeValidation();
		});
		/*
		$( "#travel_type1" ).click(function() {
			$( "#vehicle" ).hide();
			$( "#model" ).hide();
			$( "#fuel" ).hide();
		});
		$( "#travel_type2" ).click(function() {
			$( "#vehicle" ).show();
			$( "#model" ).show();
			$( "#fuel" ).show();
		});	
		*/
});