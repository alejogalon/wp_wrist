<?php


if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WBC_Cart')) {
    class WBC_Cart {

        public function __construct() {
            add_action('wp_ajax_wbc_add_to_cart', array($this, 'wbc_ajax_add_to_cart'));
            add_action('wp_ajax_nopriv_wbc_add_to_cart', array($this, 'wbc_ajax_add_to_cart'));
            add_action('wp_ajax_wbc_ajax_edit_to_cart', array($this, 'wbc_ajax_edit_to_cart'));
            add_action('wp_ajax_nopriv_wbc_ajax_edit_to_cart', array($this, 'wbc_ajax_edit_to_cart'));
            add_action('wp_ajax_send_save_design', array($this, 'send_save_design'));
            add_action('wp_ajax_nopriv_send_save_design', array($this, 'send_save_design'));

            //Store the custom field
            add_filter( 'woocommerce_add_cart_item_data', array($this, 'add_cart_item_custom_data_vase'), 10, 2 );

            add_filter( 'woocommerce_get_cart_item_from_session', array($this, 'get_cart_items_from_session'), 1, 3 );
            add_action( 'woocommerce_before_calculate_totals', array($this, 'add_custom_total_price'));

            //Upload custom packaging image
            add_action('wp_ajax_wbc_cpf_upload_files', array($this, 'wbc_cpf_upload_files'));
            add_action('wp_ajax_nopriv_wbc_cpf_upload_files', array($this, 'wbc_cpf_upload_files'));
        }

        function wbc_cpf_upload_files(){

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
            $upload_path = $upload_dir["basedir"]."/wristband-packaging/";
            $upload_url = $upload_dir["baseurl"]."/wristband-packaging/";

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

            echo json_encode( $response );
            die();
        }

        function check_already_in_cart( $product_id ) {
            global $woocommerce;

            foreach ( $woocommerce->cart->get_cart() as $key => $value ) {
                if ( $product_id == $value['data']->id ) {
                    return true;
                }
            }
            return false;
        }

        function wbc_ajax_add_to_cart() {

            if ($_POST && isset($_POST['meta'])) {
                global $woocommerce;

                $meta = $_POST['meta']; // json_decode( str_replace("\\", "", $_POST['meta'] ), true);
                $link = get_site_url().'/order-now/?id='.custom_encrypt_decrypt( 'encrypt', json_encode($_POST['meta']) ).'&Status=design';
                
                //if ( $this->check_already_in_cart( $meta['product'] ) ) {
                //    wp_send_json_error(array( 'message' => 'Already added to cart.'));
                //} else {
                    $result = $woocommerce->cart->add_to_cart($meta['product']);
                    if ($result) {
                        wp_send_json_success(array('message' => 'Successfully added to cart.', 'link' => $link));
                    } else {
                        wp_send_json_error(array( 'message' => 'Already added to cart.'));
                    }
               // }

            }

        }
        
        function wbc_ajax_edit_to_cart() {

            if ($_POST && isset($_POST['meta']) && isset($_POST['UpdateID'])) {
                global $woocommerce;

                $UpdateID = $_POST["UpdateID"];
                $meta = $_POST['meta'];

                // var_dump($UpdateID);
                // die();

                $retVal = $woocommerce->cart->remove_cart_item( $UpdateID );
                if($retVal)
                {
                    $result = $woocommerce->cart->add_to_cart($meta['product']);
                    if ($result) {
                        wp_send_json_success(array('message' => 'Successfully updated cart.'));
                    } else {
                        wp_send_json_error(array( 'message' => 'Already added to cart.'));
                    }
                }
            }

        }

        function add_cart_item_custom_data_vase( $cart_item_meta, $product_id ) {
            global $woocommerce;

            if (isset($_POST['meta'])) {
                $cart_item_meta['wristband_meta'] = $_POST['meta']; // json_decode(str_replace("\\", "", $_POST['meta']), true);
            }
            return $cart_item_meta;
        }

        //Get it from the session and add it to the cart variable
        function get_cart_items_from_session( $item, $values, $key ) {
            if ( array_key_exists( 'wristband_meta', $values ) )
                $item[ 'wristband_meta' ] = $values['wristband_meta'];
            return $item;
        }

        function add_custom_total_price( $cart_object ) {
            global $woocommerce;

            foreach ( $cart_object->cart_contents as $key => $value ) {

                if (isset($value['wristband_meta']['total_price'])) {
                    $value['data']->price = $value['wristband_meta']['total_price'];
                }
            }
        }

        function send_save_design()
        {
            global $woocommerce;
            if ( $_POST && isset($_POST['meta']) )
            {
                $link = get_site_url().'/order-now/?id='.custom_encrypt_decrypt( 'encrypt', json_encode($_POST['meta']) ).'&Status=design';
                $linkcheckout = get_site_url().'/checkout/?id='.custom_encrypt_decrypt( 'encrypt', json_encode($_POST['meta']) ).'&Status=design';
                // $title = $_POST['meta']['title'].' - '.$_POST['meta']['size'].' Inch';
                $title = $_POST['meta']['title'];
                $inch =  $_POST['meta']['size'];
                $quantity = $POST['meta']['total_qty'];
                $initial = $POST['meta']['total_price'];
                $message_type = $POST['meta'][13];
                $font = $POST['meta']['font'];
                $comma_separated = implode(",", $_POST['meta']);

                add_filter( 'wp_mail_content_type', 'set_html_content_type' );
                
                $logo_url = Avada_Sanitize::get_url_with_correct_scheme( Avada()->settings->get( 'logo' ) );

                $body = '<h1>'.$title.'</h1><a href="'.$link.'" target="_blank" style="background-color:rgb(109, 182, 220);color:#fff;">View Design</a>';
                $body = '<table cellpadding="5" cellspacing="10" border="0" style="margin: 0 auto; background-color: #f5f5f5; width: 100%;">
                            <tbody style="display: table; width: 600px; margin: 0 auto; background: #fff;">
                                <tr class="" style="display: table-caption; background: #fff; padding-top: 1em;border-bottom: 1px solid #fff5e3;">
                                    <td style="text-align: center; width: 100%; display: table;">
                                        <a href="'.get_site_url().'"><img src="'.get_site_url().'/wp-content/themes/wristbandcreation/images/logonew.png" alt="WristbandCreation.Com" class="CToWUd">
                                    </td>
                                </tr>
                                <tr style="text-align: left; display: table-caption; background: #fff;padding: 0 2em;">
                                    <td>
                                        <p style="margin-top: 0; font-size: 16px; line-height: 20px;"><span style="display:block;margin-bottom: 10px;">Thank you for visiting our website!</span>
                                        You can click the link below to edit your wristband design or to complete your order. If you need any help with designing your wristbands, feel free to call us at (800) 403-8050.</p>
                                    </td>
                                </tr>
                                <tr style="display: table-caption; background: #fff; margin-top: -1.5em !important;">
                                    <td colspan="1" style="text-align: center; width: 200px; display: inline-block;margin-left: 3em;margin-top: -1.5em;">  
                                      <a href="'.$link.'" target="_blank" style="text-decoration: none; background-color: #ff6100; color: white; padding: 10px; border-radius: 5px; text-transform: uppercase; letter-spacing: 2px;display: block;background-image:url("'.get_site_url().'/wp-content/themes/wristbandcreation/images/save_design_icons.png");">VIEW OR EDIT DESIGN <span class="fa fa-pencil-square-o"></span></a>
                                    </td>
                                    <td colspan="1" style="text-align: center; display: inline-table;">  
                                      <a href="'.$linkcheckout.'" target="_blank" style="text-decoration: none; background-color: #ff6100; color: white; padding: 10px; border-radius: 5px; text-transform: uppercase; letter-spacing: 2px;display: block;margin-top: -1.5em;background-image:url("'.get_site_url().'/wp-content/themes/wristbandcreation/images/save_design_icons.png");"">COMPLETE ORDER <span class="fa fa-arrow-right"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>';

                // $result = wp_mail( $_POST['meta']['email'], 'Save Design at WristbandCreation.Com', $body );
                // if ($result) {
                    wp_send_json_success(array('message' => 'Successfully sent design to your email.', 'link' => $link));
                // } else {
                //     wp_send_json_error(array( 'message' => 'There was an error while sending your design.'));
                // }
            }
        }

    }
}
// <tr style="background: #00c5ef; display: block;border-top-left-radius: 5px; border-top-right-radius: 5px;margin: 0 2.5em;">
//                                     <th class="td" scope="col" style="text-align: left; padding: 0 12px; color: #fff; text-transform: uppercase; letter-spacing: 1px; font-weight: normal; width: 100%;font-size: 16px;">Item</th>
//                                     <th class="td" scope="col" style="text-align: left; padding: 0 12px; width: 30px; color: #fff; text-transform: uppercase; letter-spacing: 1px; font-weight: normal; font-size: 16px;">Qty</th>
//                                     <th class="td" scope="col" style="text-align: left; padding: 0 12px; width: 60px; color: #fff; text-transform: uppercase; letter-spacing: 1px; font-weight: normal; font-size: 16px;">Subtotal</th>
//                                 </tr>
//                                 <tr style="background-color: #f5f5f5; display: block; margin: 0 2.5em;padding-top: 1em;">
//                                     <td style="font-size: 16px; font-family: Proxima Nova;display: inline-block;font-weight: bold; width: 60%;    padding-left: 1em;">'.$title.' Wristbands</td>
//                                     <td style="font-size: 16px; font-family: Proxima Nova;display: inline-block; width: 10%;">'.$quantity.'</td>
//                                     <td style="font-size: 16px; font-family: Proxima Nova;display: inline-block;">$'.$initial.'</td>
//                                 </tr>
//                                 <tr style="background-color: #f5f5f5; display: block; margin: 0 2.5em;">
//                                    <td style="font-size: 16px; font-family: Proxima Nova;display: block; padding-left: 1em;"><span style="font-weight: bold;">Wristband Width:</span> '.$inch.'===='.$comma_separated.'real values'.$message_type.'real values'.$message_type.'
//                                     </td>  
//                                 </tr>
new WBC_Cart();