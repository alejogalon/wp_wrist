<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version		2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>
	<?php //Avada edit ?>
	<div class="avada-thank-you woocommerce-content-box full-width">

	<?php
	if ( method_exists( $order, 'has_status' ) ) {
		$order_failed = $order->has_status( 'failed' );
	} else {
		$order_failed = in_array( $order->status, array( 'failed' ) );
	}

	if ( $order_failed ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>
		<?php //Avada edit
			$total_price = $order->get_total();

			$discount_price = round($total_price * 0.5, 3);

		 ?>
		<div class="row row-upsell">
			<p class="text-center copy-desc">
				<span class="copy-title-upsell copy-block">Special Offer!</span>
				<span class="copy-content-upsell copy-block copy-marg-top">
					Make your wristbands extra special with these premium add-ons.</br>
					In the next 10 minutes, add the options below to your order for a big reduced price!
				</span>
			</p>
			<div class="col-md-6">
				<div class="copy-img-upsell copy-hidden">
					<div class="copy-img-upsell-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/individual-packaging.jpg')"></div>
				</div>
				<span class="copy-block copy-title-product text-center">
					Individual Packaging
				</span>
				<p class="text-center">
					Your wristbands will each be individually packaged in transparent polybags.
					<span class="copy-block copy-save-upsell copy-proxima-s-bold">Save 50% and pay just $<?php echo $discount_price; ?></span>
					<span class="copy-block copy-orig-upsell">Orginal Price: $<?php echo $total_price; ?> </span>
					<a class="copy-block" href="#">add to my order  <i class="fa fa-caret-right" aria-hidden="true"></i></a>
					(For your order of 500 + 100 free wristbands)
				</p>
			</div>
			<div class="col-md-6">
				<div class="copy-img-upsell copy-hidden">
					<div class="copy-img-upsell-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/Wristband_Creation_Debossed2.jpg')"></div>
				</div>
				<span class="copy-block copy-title-product text-center">
					3mm Thick
				</span>
				<p class="text-center">
					Go extra thick with your wristbands for added durability. Normal wristbands are 2mm in thickness.
					<span class="copy-block copy-save-upsell copy-proxima-s-bold">Save 50% and pay just $<?php echo $discount_price; ?></span>
					<span class="copy-block copy-orig-upsell">Orginal Price: $<?php echo $total_price; ?> </span>
					<a class="copy-block" href="#">add to my order  <i class="fa fa-caret-right" aria-hidden="true"></i></a>
					(For your order of 500 + 100 free wristbands)
				</p>
			</div>
		</div>
		<div class="row row-thanks">
			<div class="col-md-4">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/thankyou_img.png" width="333" height="466" alt="">
			</div>
			<div class="col-md-8">
				<?php if ($order->payment_method == 'cheque') { ?>
				<h2><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order is on-hold.', 'woocommerce' ), $order ); ?></h2>
				<span class="copy-font-big copy-block" style="line-height: 24px;">Please check your email address with the details on how to complete your order. Production of wristbands will only begin once we receive the check or Purchase Order.</span>	
				<?php } else { ?>
				<h2><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order has been received!', 'woocommerce' ), $order ); ?></h2>
				<span class="copy-font-big">We’ve sent you an email with all the details of your order.</span>
				<?php } ?>
				<ul class="order_details">
					<li class="order">
						<p class="copy-upper copy-gray copy-proxima-bold copy-detail-title copy-spacing"><?php _e( 'Order Number', 'woocommerce' ); ?></p>
						<strong class="copy-block copy-font-big"><?php echo $order->get_order_number(); ?></strong>
					</li>
					<li class="date">
						<p class="copy-upper copy-gray copy-proxima-bold copy-detail-title copy-spacing"><?php _e( 'Date', 'woocommerce' ); ?></p>
						<strong class="copy-block copy-font-big"><?php echo date_i18n( 'F d, Y', strtotime( $order->order_date ) ); ?></strong>
					</li>
					<li class="total">
						<p class="copy-upper copy-gray copy-proxima-bold copy-detail-title copy-spacing"><?php _e( 'Total', 'woocommerce' ); ?></p>
						<strong class="copy-block copy-font-big"><?php echo $order->get_formatted_order_total(); ?></strong>
					</li>
					<?php if ( $order->payment_method_title ) : ?>
					<li class="method">
						<p class="copy-upper copy-gray copy-proxima-bold copy-detail-title copy-spacing"><?php _e( 'Payment Method', 'woocommerce' ); ?></p>
						<strong class="copy-block copy-font-big"><?php echo $order->payment_method_title; ?></strong>
					</li>
					<?php endif; ?>
				</ul>

				<div class="section-share">
					<p class="copy-proxima-sbold copy-upper copy-spacing copy-float-left copy-share">Share your wristband</p>
					<a class="fa-custom" href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="Share on Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
				</div>
				<div class="clear"></div>
			</div>
		</div>

	<?php endif; ?>
	<?php //Avada edit ?>

	<?php //do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>

	</div>

	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<?php //Avada edit ?>
	<h2><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order has been received.', 'woocommerce' ), null ); ?></h2>
	</div>

<?php endif;

// Omit closing PHP tag to avoid "Headers already sent" issues.
?>
<script type="text/javascript"> var sa_values = { "site":13400 }; sa_values['token']="bb01f"; function saLoadScript(src) { var js = window.document.createElement("script"); js.src = src; js.type = "text/javascript"; document.getElementsByTagName("head")[0].appendChild(js); } var d = new Date(); if (d.getTime() - 172800000 > 1475559344000) saLoadScript("//www.shopperapproved.com/thankyou/rate/13400.js"); else saLoadScript("//direct.shopperapproved.com/thankyou/rate/13400.js?d=" + d.getTime()); </script>

<!-- REMOVE PHP CODE HERE -->

<div class="container">
	<hr class="hr-line copy-line-gap line-refer">
	<div class="section" id="section-refer">
		<div class="copy-box-refer" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/refer-a-friend.jpg')">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logonew.png">
			<span class="copy-refer-title copy-block">Refer a Friend</span>
			<span class="copy-refer-desc copy-block">
				They get additional 5% off, and you earn 5% of their order.</br>
				*Can be combined with other coupons.
			</span>
			<a class="copy-block" href="#">Click here</a>
		</div>
	</div>
</div>