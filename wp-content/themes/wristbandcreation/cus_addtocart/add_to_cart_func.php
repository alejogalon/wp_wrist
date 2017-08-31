<?php 

if ( ! function_exists( 'cus_addtocart_script' ) ) {

	function cus_addtocart_script() {
	 	if ( is_page('order-samples') ) {

			wp_register_script('addtocart_js', untrailingslashit(get_stylesheet_directory_uri()) . '/cus_addtocart/addtocart.js', array('jquery'), '', true);
		      wp_enqueue_script('addtocart_js');

			  	wp_localize_script( 'addtocart_js', 'AddToCart_func', array(
				    'home'    => get_stylesheet_directory_uri(),
				    'ajax_url' => admin_url('admin-ajax.php')

				) );
		}
	}
}

add_action('wp_enqueue_scripts' , 'cus_addtocart_script');

add_action('wp_ajax_free_ajax_add_to_cart', 'free_ajax_add_to_cart');
add_action('wp_ajax_nopriv_free_ajax_add_to_cart', 'free_ajax_add_to_cart');

function free_ajax_add_to_cart() {

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