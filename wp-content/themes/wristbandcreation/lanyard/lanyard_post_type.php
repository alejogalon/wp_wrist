<?php
add_action( 'init', 'lanyards_price_list' );
add_action( 'init', 'lanyard_attachments' );
add_action( 'init', 'lanyard_additional_options' );
add_action( 'init', 'production_time' );
add_action( 'init', 'shipping_time' );
function lanyards_price_list(){

	$size01 = array(
		array("quantity" => '20',"price" => '4.82', "range" => "20-49"),
		array("quantity" => '50',"price" => '3.13', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.13', "range" => "100-149"),
		array("quantity" => '150',"price" => '1.12', "range" => "150-199"),
		array("quantity" => '200',"price" => '1.11', "range" => "200-249"),
		array("quantity" => '250',"price" => '1.10', "range" => "250-499"),
		array("quantity" => '500',"price" => '0.68', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.53', "range" => "1000-2499"),
		array("quantity" => '2,500',"price" => '0.48', "range" => "2500-2999"),
		array("quantity" => '3,000',"price" => '0.44', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.40', "range" => "5000+")
	);

	$size02 = array(
		array("quantity" => '20',"price" => '4.82', "range" => "20-49"),
		array("quantity" => '50',"price" => '3.13', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.14', "range" => "100-149"),
		array("quantity" => '150',"price" => '1.13', "range" => "150-199"),
		array("quantity" => '200',"price" => '1.12', "range" => "200-249"),
		array("quantity" => '250',"price" => '1.11', "range" => "250-499"),
		array("quantity" => '500',"price" => '0.69', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.54', "range" => "1000-2499"),
		array("quantity" => '2,500',"price" => '0.49', "range" => "2500-2999"),
		array("quantity" => '3,000',"price" => '0.43', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.41', "range" => "5000+")
	);

	$size03 = array(
		array("quantity" => '20',"price" => '4.82', "range" => "20-49"),
		array("quantity" => '50',"price" => '3.13', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.15', "range" => "100-149"),
		array("quantity" => '150',"price" => '1.14', "range" => "150-199"),
		array("quantity" => '200',"price" => '1.13', "range" => "200-249"),
		array("quantity" => '250',"price" => '1.12', "range" => "250-499"),
		array("quantity" => '500',"price" => '0.71', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.56', "range" => "1000-2499"),
		array("quantity" => '2,500',"price" => '0.50', "range" => "2500-2999"),
		array("quantity" => '3,000',"price" => '0.45', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.45', "range" => "5000+")
	);

	$polyester_lanyards = array(
		array("name" => '5/8',"value" => $size01, "active" => ""),
		array("name" => '3/4',"value" => $size02, "active" => "active"),
		array("name" => '1',"value" => $size03, "active" => "")
	);

	$size11 = array(
		array("quantity" => '20',"price" => '3.68', "range" => "20-49"),
		array("quantity" => '50',"price" => '2.43', "range" => "50-99"),
		array("quantity" => '100',"price" => '0.97', "range" => "100-249"),
		array("quantity" => '250',"price" => '0.88', "range" => "250-299"),
		array("quantity" => '300',"price" => '0.73', "range" => "300-499"),
		array("quantity" => '500',"price" => '0.63', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.55', "range" => "1000-1999"),
		array("quantity" => '2,000',"price" => '0.55', "range" => "2000-2999"),
		array("quantity" => '3,000',"price" => '0.52', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.47', "range" => "5000-9999"),
		array("quantity" => '10,000',"price" => '0.47', "range" => "10000+")
	);

	$size12 = array(
		array("quantity" => '20',"price" => '3.68', "range" => "20-49"),
		array("quantity" => '50',"price" => '2.43', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.07', "range" => "100-249"),
		array("quantity" => '250',"price" => '0.99', "range" => "250-299"),
		array("quantity" => '300',"price" => '0.73', "range" => "300-499"),
		array("quantity" => '500',"price" => '0.67', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.55', "range" => "1000-1999"),
		array("quantity" => '2,000',"price" => '0.55', "range" => "2000-2999"),
		array("quantity" => '3,000',"price" => '0.52', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.47', "range" => "5000-9999"),
		array("quantity" => '10,000',"price" => '0.49', "range" => "10000+")
	);

	// $size13 = array(
	// 	array("quantity" => '30',"price" => '4.35', "range" => "30-49"),
	// 	array("quantity" => '50',"price" => '2.85', "range" => "50-99"),
	// 	array("quantity" => '100',"price" => '1.35', "range" => "100-299"),
	// 	array("quantity" => '300',"price" => '0.92', "range" => "300-499"),
	// 	array("quantity" => '500',"price" => '0.59', "range" => "500-999"),
	// 	array("quantity" => '1000',"price" => '0.52', "range" => "1000-2999"),
	// 	array("quantity" => '3000',"price" => '0.46', "range" => "3000-4999"),
	// 	array("quantity" => '5000',"price" => '0.41', "range" => "5000+")
	// );



	$tubular_lanyards = array(
		
		array("name" => '3/8',"value" => $size11, "active" => "active"),
		// array("name" => '1/2',"value" => $size12, "active" => "active"),
		array("name" => '5/8',"value" => $size12, "active" => "")
	);

	$size21 = array(
		array("quantity" => '12',"price" => '4.42', "range" => "12-24"),
		array("quantity" => '25',"price" => '3.21', "range" => "25-49"),
		array("quantity" => '50',"price" => '2.28', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.59', "range" => "100-249"),
		array("quantity" => '250',"price" => '1.33', "range" => "250-499"),
		array("quantity" => '500',"price" => '0.93', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.86', "range" => "1000-2999"),
		array("quantity" => '3,000',"price" => '0.85', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.85', "range" => "5000+")
	);

	$size22 = array(
		array("quantity" => '12',"price" => '4.69', "range" => "12-24"),
		array("quantity" => '25',"price" => '3.34', "range" => "25-49"),
		array("quantity" => '50',"price" => '2.34', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.72', "range" => "100-249"),
		array("quantity" => '250',"price" => '1.47', "range" => "250-499"),
		array("quantity" => '500',"price" => '0.99', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.94', "range" => "1000-2999"),
		array("quantity" => '3,000',"price" => '0.88', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.82', "range" => "5000+")
	);

	// $size23 = array(
	// 	array("quantity" => '30',"price" => '3.92', "range" => "30-49"),
	// 	array("quantity" => '50',"price" => '2.75', "range" => "50-99"),
	// 	array("quantity" => '100',"price" => '2.16', "range" => "100-299"),
	// 	array("quantity" => '300',"price" => '1.85', "range" => "300-499"),
	// 	array("quantity" => '500',"price" => '0.91', "range" => "500-999"),
	// 	array("quantity" => '1000',"price" => '0.86', "range" => "1000-2999"),
	// 	array("quantity" => '3000',"price" => '0.78', "range" => "3000-4999"),
	// 	array("quantity" => '5000',"price" => '0.75', "range" => "5000+")
	// );

	$nylon_lanyards = array(
		
		// array("name" => '5/8',"value" => $size21, "active" => ""),
		array("name" => '3/4',"value" => $size21, "active" => "active"),
		array("name" => '1',"value" => $size22, "active" => "")
	);

	$size31 = array(
		// array("quantity" => '30',"price" => '9.72', "range" => "30-49"),
		array("quantity" => '50',"price" => '2.66', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.30', "range" => "100-299"),
		array("quantity" => '300',"price" => '1.16', "range" => "300-499"),
		array("quantity" => '500',"price" => '0.99', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.72', "range" => "1000-1999"),
		array("quantity" => '2,000',"price" => '0.70', "range" => "2000-2999"),
		array("quantity" => '3,000',"price" => '0.70', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.57', "range" => "5000-9999"),
		array("quantity" => '10,000',"price" => '0.59', "range" => "10000+")
	);

	$size32 = array(
		array("quantity" => '50',"price" => '2.77', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.37', "range" => "100-299"),
		array("quantity" => '300',"price" => '1.18', "range" => "300-499"),
		array("quantity" => '500',"price" => '1.01', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.74', "range" => "1000-1999"),
		array("quantity" => '2,000',"price" => '0.71', "range" => "2000-2999"),
		array("quantity" => '3,000',"price" => '0.71', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.61', "range" => "5000-9999"),
		array("quantity" => '10,000',"price" => '0.59', "range" => "10000+")
	);

	$size33 = array(
		array("quantity" => '50',"price" => '2.83', "range" => "50-99"),
		array("quantity" => '100',"price" => '1.39', "range" => "100-299"),
		array("quantity" => '300',"price" => '1.18', "range" => "300-499"),
		array("quantity" => '500',"price" => '1.01', "range" => "500-999"),
		array("quantity" => '1,000',"price" => '0.74', "range" => "1000-1999"),
		array("quantity" => '2,000',"price" => '0.73', "range" => "2000-2999"),
		array("quantity" => '3,000',"price" => '0.71', "range" => "3000-4999"),
		array("quantity" => '5,000',"price" => '0.59', "range" => "5000-9999"),
		array("quantity" => '10,000',"price" => '0.59', "range" => "10000+")
	);

	$woven_lanyards = array(
		
		array("name" => '5/8',"value" => $size31, "active" => ""),
		array("name" => '3/4',"value" => $size32, "active" => "active"),
		array("name" => '1',"value" => $size33, "active" => "")
	);

	$lanyards_price_list = array(
		// 'polyester' => array("value" => $polyester_lanyards)
		array("name" => 'polyester',"value" => $polyester_lanyards),
		array("name" => 'tubular',"value" => $tubular_lanyards),
		array("name" => 'nylon',"value" => $nylon_lanyards),
		array("name" => 'woven',"value" => $woven_lanyards)


	);

	return $lanyards_price_list;


}

function lanyard_attachments(){
	$lanyard_attachment_list = array(

		array("name"	=>	'Split Ring'		,	'price'	=>	'0'		, 'image'	=> '/images/add-on-img1.png'),
		array("name"	=>	'Bulldog Clip'		,	'price'	=>	'0'		, 'image'	=> '/images/add-on-img3.png'),
		array("name"	=>	'Metal Swivel Hook'	,	'price'	=>	'0'		, 'image'	=> '/images/add-on-img5.png'),
		array("name"	=>	'Plastic Swivel'	,	'price'	=>	'0'		, 'image'	=> '/images/add-on-img15.jpg'),
		array("name"	=>	'Thumb Hook'		,	'price'	=>	'0'		, 'image'	=> '/images/add-on-img2.png'),
		array("name"	=>	'No Attachment'		,	'price'	=>	'0'		, 'image'	=> '/images/no-attach.png'),
		array("name"	=>	'Lobster Claw Hook'	,	'price'	=>	'0.20' 	, 'image'	=> '/images/add-on-img16.jpg'),
		array("name"	=>	'Oval Shape Hook'	,	'price'	=>	'0.20'	, 'image'	=> '/images/add-on-img4.png'),
		array("name"	=>	'Carabiner Hook'	,	'price'	=>	'0.20'	, 'image'	=> '/images/add-on-img6.png')

	); 
	return $lanyard_attachment_list;
}

function lanyard_additional_options(){

	$lanyard_additional_options_list = array(

		array("name"	=>	'Plastic Buckle'			,	'price'	=>	'0.17'	, 'key'	=> 'each' , 'image'	=> '/images/add-on-img7.png' , 'tooltip'	=> 'This will be placed near the attachment, so it will be easy to detach your badge or attachment from the lanyard.'),
		array("name"	=>	'Flat Plastic Breakaway'	,	'price'	=>	'0.17' 	, 'key'	=> 'each' , 'image'	=> '/images/add-on-img8.png' , 'tooltip'	=> 'A safety feature in case of a sudden pull of the lanyards, this will detach on the rear portion of the lanyards.'),
		array("name"	=>	'Phone Attachment'			,	'price'	=>	'0.22'	, 'key'	=> 'each' , 'image'	=> '/images/add-on-img9.png' , 'tooltip'	=> 'Add this to the end portion of the lanyards to attach a phone or any gadget with a hook attachment.'),
		array("name"	=>	'Badge Reel'				,	'price'	=>	'0.70'	, 'key'	=> 'each' , 'image'	=> '/images/add-on-img14.png' , 'tooltip'	=> 'Retractable ID badge reel to place your ID or name card. This will be attached to the end of the lanyards.'),
		array("name"	=>	'Individual Packaging'		,	'price'	=>	'0.10'	, 'key'	=> 'each' , 'image'	=> '/images/individual-packaging.jpg' , 'tooltip'	=> 'Have your lanyards wrapped individually in polybags.'),
		array("name"	=>	'Digital Proof'				,	'price'	=>	'10.00'	, 'key'	=> 'fixed' , 'image'	=> '/images/wc-lanyards-polyester-v2.jpg' , 'tooltip'	=> 'Get a high quality mock up of your lanyards prior to production.')
	);

	return $lanyard_additional_options_list;
}

function production_time(){

	$production_time_list = array(

		array("quantity"	=> '12'		,	'l7_d'	=> '0' ,	'l4_d'	=> '8'	,	'l2_d'	=> '16'),
		array("quantity"	=> '50' 	,	'l7_d'	=> '0' ,	'l4_d'	=> '12' ,	'l2_d'	=> '16'),
		array("quantity"	=> '100'	,	'l7_d'	=> '0' ,	'l4_d'	=> '12' ,	'l2_d'	=> '31'),
		array("quantity"	=> '300'	,	'l7_d'	=> '0' ,	'l4_d'	=> '15' ,	'l2_d'	=> '36'),
		array("quantity"	=> '500'	,	'l7_d'	=> '0' ,	'l4_d'	=> '19' ,	'l2_d'	=> '42'),
		array("quantity"	=> '1000'	,	'l7_d'	=> '0' ,	'l4_d'	=> '24' ,	'l2_d'	=> '73'),
		array("quantity"	=> '3000'	,	'l7_d'	=> '0' ,	'l4_d'	=> '39' ,	'l2_d'	=> '98'),
		array("quantity"	=> '5000'	,	'l7_d'	=> '0' ,	'l4_d'	=> '79' ,	'l2_d'	=> '149'),
		array("quantity"	=> '10000'	,	'l7_d'	=> '0' ,	'l4_d'	=> '150',	'l2_d'	=> '320'),
		array("quantity"	=> '20000'	,	'l7_d'	=> '0' ,	'l4_d'	=> '300',	'l2_d'	=> '640')

	);

	return $production_time_list;
}

function shipping_time(){

	$shipping_time_list = array(

		array("quantity"	=> '12'		,	'Intl'	=> '35' ,	'l6_d'	=> '0' ,	'l4_d'	=> '13'	,	'l2_d'	=> '24'),
		array("quantity"	=> '50' 	,	'Intl'	=> '45' ,	'l6_d'	=> '0' ,	'l4_d'	=> '15' ,	'l2_d'	=> '37'),
		array("quantity"	=> '100'	,	'Intl'	=> '55' ,	'l6_d'	=> '0' ,	'l4_d'	=> '20' ,	'l2_d'	=> '45'),
		array("quantity"	=> '300'	,	'Intl'	=> '65' ,	'l6_d'	=> '0' ,	'l4_d'	=> '25' ,	'l2_d'	=> '55'),
		array("quantity"	=> '500'	,	'Intl'	=> '75' ,	'l6_d'	=> '0' ,	'l4_d'	=> '35' ,	'l2_d'	=> '77'),
		array("quantity"	=> '1000'	,	'Intl'	=> '100' ,	'l6_d'	=> '0' ,	'l4_d'	=> '40' ,	'l2_d'	=> '99'),
		array("quantity"	=> '3000'	,	'Intl'	=> '380' ,	'l6_d'	=> '0' ,	'l4_d'	=> '100' ,	'l2_d'	=> '198'),
		array("quantity"	=> '5000'	,	'Intl'	=> '500' ,	'l6_d'	=> '0' ,	'l4_d'	=> '150' ,	'l2_d'	=> '423'),
		array("quantity"	=> '10000'	,	'Intl'	=> '800' ,	'l6_d'	=> '0' ,	'l4_d'	=> '300',	'l2_d'	=> '600'),
		array("quantity"	=> '20000'	,	'Intl'	=> '1200' ,	'l6_d'	=> '0' ,	'l4_d'	=> '500',	'l2_d'	=> '1000')
		
	);

	return $shipping_time_list;
}