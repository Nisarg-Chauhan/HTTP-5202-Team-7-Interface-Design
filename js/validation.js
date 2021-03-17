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
	var title=testimonialsForm.title;
	var user=testimonialsForm.user;
	var message=testimonialsForm.message;
	
	testimonialsForm.onsubmit=confirmMessage;
	
	function confirmMessage(){
		if(title.value==="" || title.value===null){
			title.style.backgroundColor="red";
			title.focus();
			return false;
			} else {
			title.style.backgroundColor="white";
		}
		
		if(user.value==="" || user.value===null){
			user.style.backgroundColor="red";
			user.focus();
			return false;
			} else {
			user.style.backgroundColor="white";
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