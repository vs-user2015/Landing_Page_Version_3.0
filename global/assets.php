<?php // LP PHP functions & variables

/******************/
/** Global File **/
/******************/

$company_name = "Plumbline Services";

$vs_name = "Marketing by <a target='_blank' href='http://vitalstorm.com/'>VitalStorm</a>";

$copy = "Copyright &copy; " . date("Y") . " " . $company_name . " <br>All Rights Reserved";

$company_logo = "logo";

/* $title is used anywhere to return the name of the page */
$title = substr(basename($_SERVER["PHP_SELF"]),0,-4);

/* PHONE NUMBER */
$phone_number = "801-251-6975"; 

/* 
 * Strip dashes or unwanted characters from the page file.
 * 
 * This function is used for the title on the browser tabs.
 *
 */
function title($title){
	$title = ucwords(str_replace("-"," ",$title));
	return $title;
}
		
/* This is for the meta tag keywords */
$meta_keywords = array(
	"about-us"	=> ""
);

/* This is for the meta tag descriptions */
$meta_descriptions = array(
	"about-us"	=> ""
);

/* This is for coupon names */
$coupon_name = array(
	"about-us",
);

$specials = array(
	"plumbing",
	"water-heater",
	"drain-clean",
	"sump-pumps",
);

/* List of the pages */
$branding = array(
	"about-us"
);

$plumbing = array(
	"plumbing"
);

$hvac = array(
	"cooling-repair"
);

$electrical = array(
	"electrical"
);

/**********************/
/* coupon.class file */
/********************/

class Coupon{
	public static function name($title,$coupon_name){
		$coupon_container = "";
		
		if(in_array($title,$coupon_name)){
			$coupon_container .= "<div class='coupon_" . $title . "' style='background:url(\"http://elements.vitalstorm.com/elements/PS/" . $title . ".png\") no-repeat scroll rgba(0, 0, 0, 0); background-size: 100%;'>";
			$coupon_container .= "<p><img alt='" . $title . "' class='print-button' src='images/print-button.png' title='" . $title . "'>Call this <b>" . date("l"). "</b> for</p>";
			$coupon_container .= "</div>";
		}else{
			$coupon_container .= "<div class='coupon_default' style='background:url(\"http://elements.vitalstorm.com/elements/PS/default.png\")no-repeat scroll rgba(0, 0, 0, 0); background-size: 100%;'>";
			$coupon_container .= "<p><img alt='print coupon' class='print-button' src='images/print-button.png' title='print coupon'>Call this <b>" . date("l"). "</b> for</p>";
			$coupon_container .= "</div>";
		}
		
		return $coupon_container;
	}
}

/******************/
/*** phone.class **/
/******************/

class Phone{

	/* Use this function if there are multiple phone numbers */
	public static function number($title,$hvac,$plumbing,$electrical){
		if(in_array($title,$plumbing)){
			return ("303-502-9112"); // Enter the number you want if you land on this page
		}else if(in_array($title,$hvac)){
			return ("303-578-4053");
		
		
		}else if(in_array($title,$electrical)){
			return ("303-835-3615");
		}else{
			return ("303-835-1530"); // Enter the number if it is not "water-heater"
		}
	}
	
	/* Use this function if there is only a single phone number */
	public static function number_single(){
		return "830-522-4594";
	}
}

/******************/
/*** meta.class ***/
/******************/

class Meta{

	public static function meta_keyword($title,$meta_keywords){
		foreach($meta_keywords as $key => $value){
			if($title == $key){
				return $value;
			}
		}
	}

	public static function meta_description($title,$meta_descriptions){
		foreach($meta_descriptions as $key => $value){
			if($title == $key){
				return $value;
			}
		}
	}
}
