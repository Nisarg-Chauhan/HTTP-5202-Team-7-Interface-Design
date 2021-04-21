
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

//Deletion confirmation
function confirmation() {

    var deleteForm = document.forms.delete;

    function confirmDelete() {
        //If user clicks "Cancel", the deletion is cancelled
        var question = confirm("Do you really want to delete?");
        if (!question) {
            return false;
        }
    }
    deleteForm.onsubmit = confirmDelete;
}