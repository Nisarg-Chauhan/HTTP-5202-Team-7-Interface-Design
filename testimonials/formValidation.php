<?php 
	//This function is used to validate all the data sent through the form.
	//Use of regex is not required 
	function validateInput($inValue,$fieldName="value", $regex=""){
		
		$message=array();  //Message returned by the function
		
		if($inValue == ""){
			$message['text']='please enter '.$fieldName;
			$message['bool']=false;
		}else if (!empty($regex)){
			
			if (preg_match($regex,$inValue)){//Checking the input against the regex
				$message['text'] =  ' Valid '.$fieldName ;
				$message['bool']=true;
			}else {
				$message['text'] =  ' Enter a valid '.$fieldName ;
				$message['bool']=false;
			}
		} else{
		
			$message['text']='Valid '.$fieldName ;
			$message['bool']=true;
		}
		return $message;
	}
?>