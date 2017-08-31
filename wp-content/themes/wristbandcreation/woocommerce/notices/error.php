<?php
/**
 * Show error messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

$payment_error = "Something went wrong while performing your request. Please contact website administrator to report this problem.";
$payment_new_message = '<div class="card_decline"><span class="card_block">Your credit card was declined.</span> Please select another payment method or contact your credit card issuer to authorize this purchase.</div>';

?>
<ul class="woocommerce-error">
	<?php foreach ( $messages as $message ) : ?>
		<?php if (strpos( $message, $payment_error ) !== false ) {
			?>
			<li class="list-decline"><?php echo wp_kses_post( $payment_new_message ); ?></li>
		<?php } else { ?>
		<li><?php echo wp_kses_post( $message ); ?></li>
	<?php } endforeach; ?>
</ul>
