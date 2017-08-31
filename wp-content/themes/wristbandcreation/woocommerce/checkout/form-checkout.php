<?php
	/**
	 * Checkout Form
	 *
	 * @author 		WooThemes
	 * @package 	WooCommerce/Templates
	 * @version	 	2.3.0
	 */

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $woocommerce, $current_user;

	?>
		
	<?php
	// Get the top user container markup
	//avada_top_user_container();

	wc_print_notices();


	do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
	if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
		echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
		return;
	}

// filter hook for include new pages inside the payment method
	$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

	<div class="container">
		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

		<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="col2-set" id="customer_details">
				<div class="row">
					<div class="col-md-5 col-2-custom your-order-mobile">
						<div id="order_review" class="woocommerce-checkout-review-order">
							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						</div>
					</div>
					<div class="col-md-7 col-1-custom changestyle">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
					<div class="col-md-5 col-2-custom your-order-desktop">
						<div id="order_review" class="woocommerce-checkout-review-order">
							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						</div>
						<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
					</div>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>		

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			<!-- <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3> -->
		<?php endif; ?>


		<?php // Avada edit ?>
		<?php if( Avada()->settings->get( 'woocommerce_one_page_checkout' ) ) : ?>
		<?php endif; ?>
		<?php // End Avada edit ?>

	</form>
	</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout );

// Omit closing PHP tag to avoid "Headers already sent" issues.
?>