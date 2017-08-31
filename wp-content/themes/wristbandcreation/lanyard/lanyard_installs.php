<?php


include_once( get_stylesheet_directory() . '/lanyard/lanyard_post_type.php' );
include_once( get_stylesheet_directory() . '/lanyard/lanyard_pantone.php' );



//echo $var;

// installing local_script

if ( ! function_exists( 'lanyard_script' ) ) {

  function lanyard_script() {
    if ( is_page('customize-lanyards') ) {
      $var = json_encode(lanyards_price_list());
      $prod = json_encode(production_time());
      $ship = json_encode(shipping_time());
      // echo $var;
      // die();
      // $upload_dir = wp_upload_dir();
      // var_dump($upload_dir);
      // $upload_path = $upload_dir["basedir"]."/lanyard-upload/";
      // $upload_url = $upload_dir["baseurl"]."/lanyard-upload/";
      // echo 'asdhajksdhkajsdhas'.$upload_path;
      // echo 'asdhajksdhkajsdhas'.$upload_url;
      //lanyard pantone colors
      wp_register_script('lanyardpantone_js', untrailingslashit(get_stylesheet_directory_uri()) . '/lanyard/lanyard-js/lanyard-pantone.js', array('jquery'), '', true);
          wp_enqueue_script('lanyardpantone_js');
        // Lanyard font styles
      wp_register_style('list_of_fonts_lanyards', untrailingslashit(get_stylesheet_directory_uri()) . '/wristband/assets/css/font.css');
            wp_enqueue_style('list_of_fonts_lanyards');
            // Lanyard google font styles
            wp_register_style('google_font_lstyle', 'https://fonts.googleapis.com/css?family=Asset|Press+Start+2P|Diplomata|Diplomata+SC|Ultra|Syncopate|Corben|Shojumaru|Gravitas+One|Holtwood+One+SC|Delius+Unicase|Sonsie+One|Nosifer|Krona+One|Plaster|Chango|Geostar+Fill|Goblin+One|Revalia|Ewert|Geostar|Arbutus'  );
            wp_enqueue_style('google_font_lstyle');
            // Lanyard Javascript
      wp_register_script('lanyard_js', untrailingslashit(get_stylesheet_directory_uri()) . '/lanyard/lanyard-js/lanyard.js', array('jquery'), '', true);
          wp_enqueue_script('lanyard_js');

        wp_localize_script( 'lanyard_js', 'Lanyard_data', array(

            'home'            => get_stylesheet_directory_uri(),
            'ajax_url' => admin_url('admin-ajax.php'),
            'lan_setting' => $var,

        ) );

        wp_localize_script( 'lanyard_js', 'Lanyard_prod', array(

            'home'            => get_stylesheet_directory_uri(),
            'prod_setting' => $prod,

        ) );

        wp_localize_script( 'lanyard_js', 'Lanyard_ship', array(

            'home'            => get_stylesheet_directory_uri(),
            'ship_setting' => $ship,

        ) );
      }
  }
}
add_action('wp_enqueue_scripts' , 'lanyard_script');

add_action('wp_ajax_lan_add_to_cart', 'lan_ajax_add_to_cart');
add_action('wp_ajax_nopriv_lan_add_to_cart', 'lan_ajax_add_to_cart');

function lan_ajax_add_to_cart() {

            if ($_POST && isset($_POST['meta'])) {
                global $woocommerce;

                $meta = $_POST['meta']; // json_decode( str_replace("\\", "", $_POST['meta'] ), true);

                    $result = $woocommerce->cart->add_to_cart($meta['product']);
                    if ($result) {
                        wp_send_json_success(array('message' => 'Successfully added to cart.'));
                    } else {
                        wp_send_json_error(array( 'message' => 'Already added to cart.'));
                    }

            }

}

add_action('wp_ajax_cvf_upload_files', 'cvf_upload_files');
add_action('wp_ajax_nopriv_cvf_upload_files', 'cvf_upload_files'); // Allow front-end submission 

function cvf_upload_files(){

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
  $upload_path = $upload_dir["basedir"]."/lanyard-upload/";
  $upload_url = $upload_dir["baseurl"]."/lanyard-upload/";

  if(!file_exists($upload_path)){
      mkdir($upload_path);
    }

  $fileName = $data["my_file_upload"]["name"][0];
  $fileNameChanged = str_replace(" ", "_", $fileName);
  $temp_name = $data["my_file_upload"]["tmp_name"][0];
  $file_size = $data["my_file_upload"]["size"][0];
  $fileError = $data["my_file_upload"]["error"][0];
  $mb = 2 * 1024 * 1024;
  $targetPath = $upload_path;
  $response["filename"] = $fileName;
  $response["file_size"] = $file_size;
  $response["targetPath"] = $targetPath;
  $response["ImageName"] = $fileNameChanged;
  $file = pathinfo( $targetPath . "/" . $fileNameChanged );


  if(file_exists($targetPath . "/" . $fileNameChanged)){         
    unlink ($file);
    //$fileNameChanged = date('m-d-Y_H-i-s').'_'.$fileNameChanged;
  }

  if( move_uploaded_file( $temp_name, $targetPath . "/" . $fileNameChanged ) ){
      $response["response"] = "SUCCESS";
      $response["url"] =  $upload_url . "/" . $fileNameChanged;
    
  } else {
      $response["response"] = "ERROR";
      $response["error"]= "Upload Failed.";
  }

      /*if(file_exists($targetPath . "/" . $fileNameChanged)){
            
        $response["response"] = "ERROR";
                      $response["error"] = "File already exists.";
      } else {
              if($file_size <= $mb){

                    $file = pathinfo( $targetPath . "/" . $fileNameChanged );
                    $type = $file["extension"];
                    $response['type'] = $type;
                    if ( $type == "png" || $type == "jpeg" || $type == "gif" || $type == "cdr" || $type == "psd" || $type == "ai" || $type == "pdf" || $type == "eps" || $type == "bmp" || $type == "tiff" || $type == "jpg") {

                      if( move_uploaded_file( $temp_name, $targetPath . "/" . $fileNameChanged ) ){
                          $response["response"] = "SUCCESS";
                          $response["url"] =  $upload_url . "/" . $fileNameChanged;
                        
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
              }
      }*/

  echo json_encode( $response );
  die();

}