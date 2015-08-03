<?php // LP PHP functions & variables

/* Global Variables */
$company_name = "Dr. Watts";

$vs_name = "Marketing by <a target='_blank' href='http://vitalstorm.com/'>VitalStorm</a>";

$copy = "Copyright &copy; " . date("Y") . " " . $company_name;

$company_logo = "logo";

/* $title is used anywhere to return the name of the page */
$title = substr(basename($_SERVER["PHP_SELF"]),0,-4);

/* PHONE NUMBER */
$phone_number = "111-222-3333"; 

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
	"about-us"	=> "",
	"index"	=> ""
);

/* This is for the meta tag descriptions */
$meta_descriptions = array(
	"about-us"	=> "",
	"index"	=> ""
);

/* This is for coupon names */
$coupon_name = array(
	"about-us"
);

$specials = array(
	"plumbing"
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


/* Coupon */
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


/* Phone */
class Phone{

	/* Use this function if there are multiple phone numbers */
	public static function number($title,$hvac,$plumbing,$electrical,$phone_number){
		if(in_array($title,$plumbing)){
			return ("303-502-9112"); // Enter the number you want if you land on this page
		}else if(in_array($title,$hvac)){
			return ("303-578-4053");
		}else if(in_array($title,$electrical)){
			return ("303-835-3615");
		}else{
			self::number_single($phone_number);
		}
	}
	
	/* Use this function if there is only a single phone number */
	public static function number_single($phone_number){
		return $phone_number;
	}
}

/* Meta tags */
class Meta{

	public static function keyword($title,$meta_keywords){
		foreach($meta_keywords as $key => $value){
			if($title == $key){
				return $value;
			}
		}
	}

	public static function description($title,$meta_descriptions){
		foreach($meta_descriptions as $key => $value){
			if($title == $key){
				return $value;
			}
		}
	}
}
