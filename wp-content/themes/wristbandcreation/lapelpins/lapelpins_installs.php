<?php


include_once( get_stylesheet_directory() . '/lapelpins/lapelpins_post_type.php' );
include_once( get_stylesheet_directory() . '/lapelpins/lapelpins_pantone.php' );



//echo $var;

// installing local_script

if ( ! function_exists( 'lapelpins_script' ) ) {

	function lapelpins_script() {
	 	if ( is_page('custom-lapel-pins') || is_page('lapel-pins-order-now')) {
	 		$var = json_encode(lapelpins_price_list());
	 		$prod = json_encode(lapelpins_production_time());
	 		$ship = json_encode(lapelpins_shipping_time());
	 		// echo $var;
	 		// die();
	 		//lapelpins pantone colors
	 		wp_register_script('lapelpinspantone_js', untrailingslashit(get_stylesheet_directory_uri()) . '/lapelpins/lapelpins-js/lapelpins-pantone.js', array('jquery'), '', true);
		      wp_enqueue_script('lapelpinspantone_js');
		    // lapelpins font styles
	 		wp_register_style('list_of_fonts_lapelpins', untrailingslashit(get_stylesheet_directory_uri()) . '/wristband/assets/css/font.css');
            wp_enqueue_style('list_of_fonts_lapelpins');
            // lapelpins google font styles
            wp_register_style('google_font_lstyle', 'https://fonts.googleapis.com/css?family=Asset|Press+Start+2P|Diplomata|Diplomata+SC|Ultra|Syncopate|Corben|Shojumaru|Gravitas+One|Holtwood+One+SC|Delius+Unicase|Sonsie+One|Nosifer|Krona+One|Plaster|Chango|Geostar+Fill|Goblin+One|Revalia|Ewert|Geostar|Arbutus'	);
            wp_enqueue_style('google_font_lstyle');
            // lapelpins Javascript
			wp_register_script('lapelpins_js', untrailingslashit(get_stylesheet_directory_uri()) . '/lapelpins/lapelpins-js/lapelpins.js', array('jquery'), '', true);
		      wp_enqueue_script('lapelpins_js');

			  	wp_localize_script( 'lapelpins_js', 'Lapelpins_data', array(

				    'home'            => get_stylesheet_directory_uri(),
				    'ajax_url' => admin_url('admin-ajax.php'),
				    'lan_setting' => $var,

				) );

				wp_localize_script( 'lapelpins_js', 'Lapelpins_prod', array(

				    'home'            => get_stylesheet_directory_uri(),
				    'prod_setting' => $prod,

				) );

				wp_localize_script( 'lapelpins_js', 'Lapelpins_ship', array(

				    'home'            => get_stylesheet_directory_uri(),
				    'ship_setting' => $ship,

				) );
	    }
	}
}
add_action('wp_enqueue_scripts' , 'lapelpins_script');

add_action('wp_ajax_lapelpin_ajax_add_to_cart', 'lapelpin_ajax_add_to_cart');
add_action('wp_ajax_nopriv_lapelpin_ajax_add_to_cart', 'lapelpin_ajax_add_to_cart');

function lapelpin_ajax_add_to_cart() {

            if ($_POST && isset($_POST['meta'])) {
                global $woocommerce;

                $meta = $_POST['meta']; // json_decode( str_replace("\\", "", $_POST['meta'] ), true);

                //if ( $this->check_already_in_cart( $meta['product'] ) ) {
                //    wp_send_json_error(array( 'message' => 'Already added to cart.'));
                //} else {

                $result = $woocommerce->cart->add_to_cart($meta['product']);
                if ($result) {
                    wp_send_json_success(array('message' => 'Successfully added to cart.'));
                } else {
                    wp_send_json_error(array( 'message' => 'Already added to cart.'));
                }
               // }

            }

}

add_action('wp_ajax_cvf_upload_lapelpin_files', 'cvf_upload_lapelpin_files');
add_action('wp_ajax_nopriv_cvf_upload_lapelpin_files', 'cvf_upload_lapelpin_files'); // Allow front-end submission 

function cvf_upload_lapelpin_files(){

	$fileErrors = array(
	    0 => "There is no error, the file uploaded with success",
	    1 => "The uploaded file exceeds the upload_max_files in server settings",
	    2 => "The uploaded file exceeds the MAX_FILE_SIZE from html form",
	    3 => "The uploaded file uploaded only partially",
	    4 => "No file was uploaded",
	    6 => "Missing a temporary folder",
	    7 => "Failed to write file to disk",
	    8 => "A PHP extension stoped file to upload" );

	$posted_data =  isset( $_POST ) ? $_POST : array();
	$file_data = isset( $_FILES ) ? $_FILES : array();
	$data = array_merge( $posted_data, $file_data );
	$response = array();

	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir["basedir"]."/lapelpin-upload/";
	$upload_url = $upload_dir["baseurl"]."/lapelpin-upload/";

	if(!file_exists($upload_path)){
  		mkdir($upload_path);
	}

	$fileName = $data["files"]["name"][0];
	$fileNameChanged = str_replace(" ", "_", $fileName);
	$temp_name = $data["files"]["tmp_name"][0];
	$file_size = $data["files"]["size"][0];
	$fileError = $data["files"]["error"][0];
	$mb = 2 * 1024 * 1024;
	$targetPath = $upload_path;
	$response["filename"] = $fileName;
	$response["file_size"] = $file_size;
	$response["targetPath"] = $targetPath;

	$file = pathinfo( $targetPath . "/" . $fileNameChanged );

	if(file_exists($targetPath . "/" . $fileNameChanged)){       
		//$response["response"] = "ERROR";
		//$response["error"] = "File already exists.";
		//$fileNameChanged = date('m-d-Y_H-i-s').'_'.$fileNameChanged;
		unlink ($file);	
	}

	if( move_uploaded_file( $temp_name, $targetPath . "/" . $fileNameChanged ) ){
		$response["response"] = "SUCCESS";
		$response["url"] =  $upload_url . "/" . $fileNameChanged;
    	$response["ImageName"] = $fileNameChanged;
  	} else {
        $response["response"] = "ERROR";
        $response["error"]= "Upload Failed.";
  	}

	/*if($file_size <= $mb){

	    $file = pathinfo( $targetPath . "/" . $fileNameChanged );
	    $type = $file["extension"];
	    $response['type'] = $type;
	    if ( $type == "png" || $type == "jpeg" || $type == "gif" || $type == "cdr" || $type == "psd" || $type == "ai" || $type == "pdf" || $type == "eps" || $type == "bmp" || $type == "tiff" || $type == "jpg") {

	  		if( move_uploaded_file( $temp_name, $targetPath . "/" . $fileNameChanged ) ){
				$response["response"] = "SUCCESS";
				$response["url"] =  $upload_url . "/" . $fileNameChanged;
            	$response["ImageName"] = $fileNameChanged;
	      	} else {
	            $response["response"] = "ERROR";
	            $response["error"]= "Upload Failed.";
	      	}
	    } else {
	        $response["response"] = "ERROR";
	        $response["error"]= "Invalid Filetype";
	    }
	  
	} else {
			$response["response"] = "ERROR";
			$response["error"]= "File is too large. Max file size is 2 MB.";
	}*/
	

	echo json_encode( $response );
	die();

}
