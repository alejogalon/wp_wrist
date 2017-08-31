<?php
add_action( 'init', 'lapelpins_price_list' );
add_action( 'init', 'lapelpins_attachments' );
add_action( 'init', 'lapelpins_packaging' );
add_action( 'init', 'production_time' );
add_action( 'init', 'shipping_time' );
add_action( 'init', 'lapelpins_consecutive_number');
add_action( 'init', 'lapelpins_backstamp');

function lapelpins_price_list(){

  $hardenamel_075_price = array(
    array("quantity" => '100',"price" => '2.56'),
    array("quantity" => '200',"price" => '1.93'),
    array("quantity" => '300',"price" => '1.43'),
    array("quantity" => '500',"price" => '1.2'),
    array("quantity" => '1000',"price" => '0.98'),
    array("quantity" => '2500',"price" => '0.91'),
    array("quantity" => '5000',"price" => '0.77'),
  );

  $hardenamel_1_price = array(
    array("quantity" => '100',"price" => '2.65'),
    array("quantity" => '200',"price" => '2.04'),
    array("quantity" => '300',"price" => '1.55'),
    array("quantity" => '500',"price" => '1.31'),
    array("quantity" => '1000',"price" => '1.12'),
    array("quantity" => '2500',"price" => '0.95'),
    array("quantity" => '5000',"price" => '0.84'),
  );

  $hardenamel_125_price = array(
    array("quantity" => '100',"price" => '2.78'),
    array("quantity" => '200',"price" => '2.24'),
    array("quantity" => '300',"price" => '1.65'),
    array("quantity" => '500',"price" => '1.44'),
    array("quantity" => '1000',"price" => '1.26'),
    array("quantity" => '2500',"price" => '1.09'),
    array("quantity" => '5000',"price" => '0.98'),
  );

  $hardenamel_15_price = array(
    array("quantity" => '100',"price" => '2.93'),
    array("quantity" => '200',"price" => '2.39'),
    array("quantity" => '300',"price" => '1.86'),
    array("quantity" => '500',"price" => '1.57'),
    array("quantity" => '1000',"price" => '1.35'),
    array("quantity" => '1000',"price" => '1.18'),
    array("quantity" => '1000',"price" => '1.05'),
  );

  $softenamel_075_price = array(
    array("quantity" => '100',"price" => '2.36'),
    array("quantity" => '200',"price" => '1.73'),
    array("quantity" => '300',"price" => '1.23'),
    array("quantity" => '500',"price" => '1'),
    array("quantity" => '1000',"price" => '0.78'),
    array("quantity" => '2500',"price" => '0.71'),
    array("quantity" => '5000',"price" => '0.57'),
  );

  $softenamel_1_price = array(
    array("quantity" => '100',"price" => '2.45'),
    array("quantity" => '200',"price" => '1.84'),
    array("quantity" => '300',"price" => '1.35'),
    array("quantity" => '500',"price" => '1.11'),
    array("quantity" => '1000',"price" => '0.92'),
    array("quantity" => '2500',"price" => '0.75'),
    array("quantity" => '5000',"price" => '0.64'),
  );

  $softenamel_125_price = array(
    array("quantity" => '100',"price" => '2.58'),
    array("quantity" => '200',"price" => '2.04'),
    array("quantity" => '300',"price" => '1.45'),
    array("quantity" => '500',"price" => '1.24'),
    array("quantity" => '1000',"price" => '1.06'),
    array("quantity" => '2500',"price" => '0.89'),
    array("quantity" => '5000',"price" => '0.78'),
  );

  $softenamel_15_price = array(
    array("quantity" => '100',"price" => '2.73'),
    array("quantity" => '200',"price" => '2.19'),
    array("quantity" => '300',"price" => '1.66'),
    array("quantity" => '500',"price" => '1.37'),
    array("quantity" => '1000',"price" => '1.15'),
    array("quantity" => '2500',"price" => '0.98'),
    array("quantity" => '5000',"price" => '0.85'),
  );

 $printed_075_price = array(
    array("quantity" => '100',"price" => '2.36'),
    array("quantity" => '200',"price" => '1.73'),
    array("quantity" => '300',"price" => '1.23'),
    array("quantity" => '500',"price" => '1'),
    array("quantity" => '1000',"price" => '0.78'),
    array("quantity" => '2500',"price" => '0.71'),
    array("quantity" => '5000',"price" => '0.57'),
  );

  $printed_1_price = array(
    array("quantity" => '100',"price" => '2.45'),
    array("quantity" => '200',"price" => '1.84'),
    array("quantity" => '300',"price" => '1.35'),
    array("quantity" => '500',"price" => '1.11'),
    array("quantity" => '1000',"price" => '0.92'),
    array("quantity" => '2500',"price" => '0.75'),
    array("quantity" => '5000',"price" => '0.64'),
  );

  $printed_125_price = array(
    array("quantity" => '100',"price" => '2.58'),
    array("quantity" => '200',"price" => '2.04'),
    array("quantity" => '300',"price" => '1.45'),
    array("quantity" => '500',"price" => '1.24'),
    array("quantity" => '1000',"price" => '1.06'),
    array("quantity" => '2500',"price" => '0.89'),
    array("quantity" => '5000',"price" => '0.78'),
  );

  $printed_15_price = array(
    array("quantity" => '100',"price" => '2.73'),
    array("quantity" => '200',"price" => '2.19'),
    array("quantity" => '300',"price" => '1.66'),
    array("quantity" => '500',"price" => '1.37'),
    array("quantity" => '1000',"price" => '1.15'),
    array("quantity" => '2500',"price" => '0.98'),
    array("quantity" => '5000',"price" => '0.85'),
  );

  $diestruck_075_price = array(
    array("quantity" => '100',"price" => '2.36'),
    array("quantity" => '200',"price" => '1.73'),
    array("quantity" => '300',"price" => '1.23'),
    array("quantity" => '500',"price" => '1'),
    array("quantity" => '1000',"price" => '0.78'),
    array("quantity" => '2500',"price" => '0.71'),
    array("quantity" => '5000',"price" => '0.57'),
  );

  $diestruck_1_price = array(
    array("quantity" => '100',"price" => '2.45'),
    array("quantity" => '200',"price" => '1.84'),
    array("quantity" => '300',"price" => '1.35'),
    array("quantity" => '500',"price" => '1.11'),
    array("quantity" => '1000',"price" => '0.92'),
    array("quantity" => '2500',"price" => '0.75'),
    array("quantity" => '5000',"price" => '0.64'),
  );

  $diestruck_125_price = array(
    array("quantity" => '100',"price" => '2.58'),
    array("quantity" => '200',"price" => '2.04'),
    array("quantity" => '300',"price" => '1.45'),
    array("quantity" => '500',"price" => '1.24'),
    array("quantity" => '1000',"price" => '1.06'),
    array("quantity" => '2500',"price" => '0.89'),
    array("quantity" => '5000',"price" => '0.78'),
  );

  $diestruck_15_price = array(
    array("quantity" => '100',"price" => '2.73'),
    array("quantity" => '200',"price" => '2.19'),
    array("quantity" => '300',"price" => '1.66'),
    array("quantity" => '500',"price" => '1.37'),
    array("quantity" => '1000',"price" => '1.15'),
    array("quantity" => '2500',"price" => '0.98'),
    array("quantity" => '5000',"price" => '0.85'),

  );

  $other_075_price = array(
    array("quantity" => '100',"price" => '2.36'),
    array("quantity" => '200',"price" => '1.73'),
    array("quantity" => '300',"price" => '1.23'),
    array("quantity" => '500',"price" => '1.00'),
    array("quantity" => '1000',"price" => '0.78')
  );

  $other_075_price = array(
    array("quantity" => '100',"price" => '2.36'),
    array("quantity" => '200',"price" => '1.73'),
    array("quantity" => '300',"price" => '1.23'),
    array("quantity" => '500',"price" => '1.00'),
    array("quantity" => '1000',"price" => '0.78')
  );

  $other_1_price = array(
    array("quantity" => '100',"price" => '2.45'),
    array("quantity" => '200',"price" => '1.84'),
    array("quantity" => '300',"price" => '1.35'),
    array("quantity" => '500',"price" => '1.11'),
    array("quantity" => '1000',"price" => '0.92')
  );

  $other_125_price = array(
    array("quantity" => '100',"price" => '2.58'),
    array("quantity" => '200',"price" => '2.04'),
    array("quantity" => '300',"price" => '1.45'),
    array("quantity" => '500',"price" => '1.24'),
    array("quantity" => '1000',"price" => '1.06')
  );

  $other_15_price = array(
    array("quantity" => '100',"price" => '2.73'),
    array("quantity" => '200',"price" => '2.19'),
    array("quantity" => '300',"price" => '1.66'),
    array("quantity" => '500',"price" => '1.37'),
    array("quantity" => '1000',"price" => '1.15')
  );


  $hardenamel_template = array( 
    array("template" =>"Gold"),
    array("template" =>"Silver"),
    array("template" =>"Nickel"),
    //array("template" =>"Brass"),
    array("template" =>"Copper"),
    array("template" =>"Black Nickel"),
  );

  $softenamel_template = array( 
    array("template" =>"Gold"),
    array("template" =>"Silver"),
    array("template" =>"Nickel"),
   //array("template" =>"Brass"),
    array("template" =>"Copper"),
    array("template" =>"Black Nickel"),
    array("template" =>"Antique Gold"),
    array("template" =>"Antique Silver"),
    array("template" =>"Antique Brass"),
    array("template" =>"Antique Copper")
  );

  $diestruck_template = array( 
    array("template" =>"Gold"),
    array("template" =>"Silver"),
    array("template" =>"Nickel"),
    //array("template" =>"Brass"),
    array("template" =>"Copper"),
    array("template" =>"Black Nickel"),
    array("template" =>"Antique Gold"),
    array("template" =>"Antique Silver"),
    array("template" =>"Antique Brass"),
    array("template" =>"Antique Copper")
  );

	$printed_template = array(
    array("template" =>"Gold"),
    array("template" =>"Silver")
  );

/*  $hard_enamel_pricetable = array(
    array('size' => '0.75', "value" => $hardenamel_075_price), 
    array('size' => '1', "value" => $hardenamel_1_price),
    array('size' => '1.25', "value" => $hardenamel_125_price), 
    array('size' => '1.5', "value" => $hardenamel_15_price)
  );*/

   $other_pricetable = array(
    array('size' => '0.75', "value" => $other_075_price, "active" => "active"), 
    array('size' => '1', "value" => $other_1_price, "active" => ""),
    array('size' => '1.25', "value" => $other_125_price, "active" => ""), 
    array('size' => '1.5', "value" => $other_15_price, "active" => "")
  );

  $hardenamel = array(
    array('size' => '0.75', "value" => $hardenamel_075_price, "active" => "active"), 
    array('size' => '1', "value" => $hardenamel_1_price, "active" => ""),
    array('size' => '1.25', "value" => $hardenamel_125_price, "active" => "" ), 
    array('size' => '1.5', "value" => $hardenamel_15_price, "active" => "" )
  );

  $printed = array(
    array('size' => '0.75', "value" => $printed_075_price, "active" => "active"), 
    array('size' => '1', "value" => $printed_1_price, "active" => "" ),
    array('size' => '1.25', "value" => $printed_125_price, "active" => ""  ), 
    array('size' => '1.5', "value" => $printed_15_price, "active" => ""  )
  );

  $softenamel = array(
    array('size' => '0.75', "value" => $softenamel_075_price, "active" => "active"), 
    array('size' => '1', "value" => $softenamel_1_price, "active" => "" ),
    array('size' => '1.25', "value" => $softenamel_125_price, "active" => "" ), 
    array('size' => '1.5', "value" => $softenamel_15_price, "active" => "" )
  );

  $diestruck = array(
    array('size' => '0.75', "value" => $diestruck_075_price, "active" => "active"), 
    array('size' => '1', "value" => $diestruck_1_price, "active" => "" ),
    array('size' => '1.25', "value" => $diestruck_125_price , "active" => ""), 
    array('size' => '1.5', "value" => $diestruck_15_price , "active" => "")
  );


  $lapelpins_price_list = array(
    // 'polyester' => array("value" => $polyester_lanyards)
    array("name" => 'hard enamel',"value" => $hardenamel, "template" => $hardenamel_template ),
    array("name" => 'printed',"value" => $printed, "template" =>  $printed_template),
    array("name" => 'soft enamel',"value" => $softenamel, "template" => $softenamel_template),
    array("name" => 'die struck',"value" => $diestruck, "template" => $diestruck_template)
  );

  return $lapelpins_price_list;
}


function lapelpins_attachments(){
	$lapelpins_attachment_list = array(
    array("name"  =>  'Butterfly Clutch'      , 'price' =>  '0'  , 'key' => 'each' , 'image' => '/images/lapel-attachment/butterfly.png'),
    array("name"  =>  'Rubber Clutch' , 'price' =>  '0'  , 'key' => 'each' , 'image' => '/images/lapel-attachment/rubber.png'),
    array("name"  =>  'Deluxe Clutch'     , 'price' =>  '0.30'  , 'key' => 'each' , 'image' => '/images/lapel-attachment/deluxe.png'),
    array("name"  =>  'Magnet'        , 'price' =>  '0.60'  , 'key' => 'each' , 'image' => '/images/lapel-attachment/magnet.png'),
    array("name"  =>  'Safety Pin'    , 'price' =>  '0.25'  , 'key' => 'each' , 'image' => '/images/lapel-attachment/safety-pin.png'),
    array("name"  =>  'No Attachment'   , 'price' =>  '0'   , 'image' => '/images/no-attach.png'),

	); 
	return $lapelpins_attachment_list;
}

function lapelpins_packaging(){

	$lapelpins_packaging = array(

		array("name"	=>	'Poly Bag'			,	'price'	=>	'0'	, 'key'	=> 'each' , 'image'	=> '/images/lapel-pack/poly-bag.png'),
		array("name"	=>	'Plastic Box'	,	'price'	=>	'0.40' 	, 'key'	=> 'each' , 'image'	=> '/images/lapel-pack/plastic-box.png'),
		array("name"	=>	'Velvet Pouch'	,	'price'	=>	'0.50'	, 'key'	=> 'each' , 'image'	=> '/images/lapel-pack/velvet-pouch.png'),
		array("name"	=>	'Velvet Gift Box'		,	'price'	=>	'1.25'	, 'key'	=> 'each' , 'image'	=> '/images/lapel-pack/velvet-gift-box.png'),
    array("name"  =>  'No Packaging'   , 'price' =>  '0'   , 'image' => '/images/no-pack.png'),
	);

	return $lapelpins_packaging;
}

function lapelpins_production_time(){

	$lapelpins_production_time_list = array(
    array('l7_d'  => '0' ,  'l4_d'  => '19.9' , 'l2_d'  => '21.9', 'l1_d' => '24.9')/*,
    array("quantity"  => '200' , 'l7_d'  => '0' ,  'l4_d'  => '19.9' , 'l2_d'  => '21.9', 'l1_d' => '24.9'),
    array("quantity"  => '300'  , 'l7_d'  => '0' ,  'l4_d'  => '19.9', 'l2_d'  => '21.9', 'l1_d' => '24.9'),
    array("quantity"  => '500'  , 'l7_d'  => '0' ,  'l4_d'  => '19.9', 'l2_d'  => '21.9', 'l1_d' => '24.9'),
    array("quantity"  => '1000'  , 'l7_d'  => '0' ,  'l4_d'  => '19.9', 'l2_d'  => '21.9', 'l1_d' => '24.9')*/
	);

	return $lapelpins_production_time_list;
}

function lapelpins_shipping_time(){

	$lapelpins_shipping_time_list = array(
		array(/*"quantity"	=> '100'	,*/	'Intl'	=> '31.89' ,	'l6_d'	=> '9.69' ,	'l4_d'	=> '12.69'	,	'l2_d'	=> '20.94', 'l1_d' => '39.94')/*,
		array("quantity"	=> '200' 	,	'Intl'	=> '31.89' ,	'l6_d'	=> '9.69' ,	'l4_d'	=> '12.69' ,	'l2_d'	=> '20.94', 'l1_d' => '39.94'),
		array("quantity"	=> '300'	,	'Intl'	=> '31.89' ,	'l6_d'	=> '9.69' ,	'l4_d'	=> '12.69' ,	'l2_d'	=> '20.94', 'l1_d' => '39.94'),
		array("quantity"	=> '500'	,	'Intl'	=> '31.89' ,	'l6_d'	=> '9.69' ,	'l4_d'	=> '12.69' ,	'l2_d'	=> '20.94', 'l1_d' => '39.94'),
		array("quantity"	=> '1000'	,	'Intl'	=> '31.89' ,	'l6_d'	=> '9.69' ,	'l4_d'	=> '12.69' ,	'l2_d'	=> '20.94', 'l1_d' => '39.94')*/
		
	);

	return $lapelpins_shipping_time_list;
}

function lapelpins_consecutive_number(){
  $lapelpins_consecutive_number = array(
    array("name"  =>  'Consecutive Numbering', "price" => "0.30", "image"  => "/images/consecutive-number.png"),
    //array("value" => "No", "price" => "0", "image"  => "/images/numbering-grey.png")
    );
  return $lapelpins_consecutive_number;
}

function lapelpins_backstamp(){
  $lapelpins_backstamp = array(
    array("name"  =>  'Back Stamp',"price" => "50" , "image" => "/images/back-stamp.png"),
    //array("value" => "No", "price" => "0" , "image" => "/images/backstamp-grey.png")
    );

  return $lapelpins_backstamp;
}