<?php
	require_once "../global/assets.php";
	
	/**
	* Get the coupon name from the query string.
	*/
	if(isset($_GET["coupon"])){
		if(in_array($_GET["coupon"],$coupon_name) || $_GET["coupon"] == ""){
			$coupon = "default";
		}else{
			$coupon = $_GET["coupon"];
		}		
	}
?>

<!doctype html>


<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			body {
				font-family: 'Roboto Condensed', sans-serif;
			}
		
			.logo {
				display: block;
				width: 100%
			}
			
			.button {
				width: 365px
			}
		
			#coupon_deal {
				display: block;
				margin: 0 auto;
				width: 365px
			}
		
			.coupon-image {
				display: block;
				height: 180px;
				width: 365px
			}
			
			#day_of_week {
				font-size: 180%;
				left: 0;
				position: absolute;
				text-align: center;
				top: 142px;
				width: 100%;
			}
			
			.close,
			.print {
				background: #ccc;
				color: #fff;
				cursor: pointer;
				display: inline-block;
				font-size: 250%;
				margin: 10px 0;
				padding: 10px;
				text-align: center;
				width: 30%;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				-o-border-radius: 10px;
				-ms-border-radius: 10px;
				border-radius: 10px;
			}
			
			.close {
				margin: 0 20px 0 0
			}
			
			@media (max-width: 767px){
				
			.button {
				width: 100%
			}
				
			.logo {
				height: auto;
				margin: 0 auto;
				width: 290px
			}
			
			#day_of_week {
				font-size: 140%;
				top: 114px;
			}
			
			#coupon_deal {
				width: 100%
			}
			.coupon-image {
				height: auto;
				margin: auto;
				width: 290px
			}
			
			.close,
			.print {
				font-size: 200%;
			}
			
			#close_print {
				margin: 0 auto;
				width: 300px
			}
			
			}
		</style>
		<script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="../js/init.js" type="text/javascript"></script>
	</head>
	<body>
		<section id="coupon_deal">
			<div class="button">
				<img alt="<?php echo $company_name ; ?> specials" class="logo" src="../images/logo.png">
				<p id='day_of_week'>Call this <b><?php echo date("l") ; ?></b> for </p>
				<img alt="sylvester coupon" class="coupon-image" src="http://elements.vitalstorm.com/elements/<?php echo $client_id ; ?>/<?php echo $coupon ; ?>.png">
				<div id="close_print">
					<p class="close">Close</p>
					<p class="print">Print</p>
				</div>
			</div>
		</section>
	</body>
</html>