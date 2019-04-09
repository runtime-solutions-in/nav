<?php
	function get_ip_address() {
		if (getenv("HTTP_CLIENT_IP")) {
			$ip = getenv("HTTP_CLIENT_IP"); 
		}else if (getenv("HTTP_X_FORWARDED_FOR")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		}else if(getenv("REMOTE_ADDR")) {
			$ip = getenv("REMOTE_ADDR"); 
		}else {
			$ip = "UNKNOWN";
		}
		return $ip; 
	}//get_ip_address
	
	function input_filter_data ($value, $type) {	// $type = string, integer, textarea
		
		if ($type == 'string') {
			$value = trim(addslashes(strip_tags($value)));	
		} else if ($type == 'integer') {
			$value = intval($value);	
		}
		return $value;
	}//input_filter_data
	
	function only_name_match ($value){ // Match Only First Name / Last Name
		if (preg_match("/^[a-zA-Z]+$/i", $value) == 0) {
		   return false;
		} else {
			return true;	
		}
	}//only_name_match
	
	function full_name_match ($value){ // Match Only Full Name
		if (preg_match("/^[a-zA-Z ]+$/i", $value) == 0) {
		   return false;
		} else {
			return true;	
		}
	}//full_name_match
	
	function alphanumeric_match ($value){ // Match Alphanumeric
		if (preg_match("/^[a-zA-Z0-9 ]+$/i", $value) == 0) {
		   return false;
		} else {
			return true;	
		}
	}//alphanumeric_match
	
	function date_match ($value){ // Match Date
		if (preg_match("/^[0-9-]+$/i", $value) == 0) {
		   return false;
		} else {
			return true;	
		}
	}//date_match
	
	function email_match ($value){ // Match Email
		/*if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $value)){ 			
		  	return false;
		} else {
			return true;	
		}*/
		return true;	
	}//email_match
	
	// DATE FORMAT : Jun 01, 2009 12:99:00
	function displayDatetTime($dbdate){
		$tmStamp = strtotime($dbdate);
		$dtSystemDate = date("d M, Y - h:i A",$tmStamp);
		$dtSystemDate = str_replace("-", "at", $dtSystemDate);
		return $dtSystemDate;
	}//displayDatetTime()
	
	function displayDate($dbdate){
		$tmStamp = strtotime($dbdate);
		$dtSystemDate = date("d M, Y",$tmStamp);
		return $dtSystemDate;
	}//displayDate()
	
	function strStop($string, $max_length){
		if (strlen($string) > $max_length){
		   $string = substr($string, 0, $max_length);
		   $pos = strrpos($string, " ");
		   if($pos === false){ return substr($string, 0, $max_length)."..."; }		   return substr($string, 0, $pos)."...";
	   }else{
		   return $string;
	   }
	}//strStop()
	
	function MyEncoder($getval){   
		$Myencode = base64_encode(base64_encode(base64_encode(base64_encode($getval))));
		return $Myencode;  
	}//function MyEncoder($getval){
		
	function MyDecoder($getval){
		$Mydeode = base64_decode(base64_decode(base64_decode(base64_decode($getval))));
		return $Mydeode;  
	}//function MyDecoder($getval){	
	
	
	
		

?>