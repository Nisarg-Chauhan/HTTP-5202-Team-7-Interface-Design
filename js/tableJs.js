$(document).ready(function(){
	
	//Hiding paragraphs on start
	$("table").hide();
	
	$("h3").click(function(){
	    $("h3").not(this).next("table").hide();
		$(this).next("table").toggle();
	});
	
});	