//Planner validation
function validatePlanner()
{
	var plannerForm=document.forms.clientInfo;
	var height=plannerForm.height;
	var weight=plannerForm.weight;
	var waist=plannerForm.waist;
	var bodyFat=plannerForm.bodyFat;
	var bmi=plannerForm.bmi;
	
	plannerForm.onsubmit=confirmValidate;
	
	function confirmValidate(){
		if(height.value==="" || height.value===null){
			height.style.backgroundColor="red";
			height.focus();
			return false;
			} else {
			height.style.backgroundColor="white";
		}
		
		if(weight.value==="" || weight.value===null){
			weight.style.backgroundColor="red";
			weight.focus();
			return false;
			} else {
			weight.style.backgroundColor="white";
		}
		if(waist.value==="" || waist.value===null){
			waist.style.backgroundColor="red";
			waist.focus();
			return false;
			} else {
			waist.style.backgroundColor="white";
		}
		if(bodyFat.value==="" || bodyFat.value===null){
			bodyFat.style.backgroundColor="red";
			bodyFat.focus();
			return false;
			} else {
			bodyFat.style.backgroundColor="white";
		}
		if(bmi.value==="" || bmi.value===null){
			bmi.style.backgroundColor="red";
			bmi.focus();
			return false;
			} else {
			bmi.style.backgroundColor="white";
		}
	}
}



//Testimonials validation
function validateTestimonials()
{
	var testimonialsForm=document.forms.clientMessage;
	var fname=testimonialsForm.fname;
	var lname=testimonialsForm.lname;
	var message=testimonialsForm.message;
	
	testimonialsForm.onsubmit=confirmMessage;
	
	function confirmMessage(){
		if(fname.value==="" || fname.value===null){
			fname.style.backgroundColor="red";
			fname.focus();
			return false;
			} else {
			fname.style.backgroundColor="white";
		}
		
		if(lname.value==="" || lname.value===null){
			lname.style.backgroundColor="red";
			lname.focus();
			return false;
			} else {
			lname.style.backgroundColor="white";
		}
		if(message.value==="" || message.value===null){
			message.style.backgroundColor="red";
			message.focus();
			return false;
			} else {
			message.style.backgroundColor="white";
		}
	}
}