<?php
/**
 * Checkout Payment Section
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php if ( ! is_ajax() ) : ?>
	<?php do_action( 'woocommerce_review_order_before_payment' ); ?>
<?php endif; ?>

<div id="payment" class="woocommerce-checkout-payment">
	<span class="payment-head copy-proxima-sbold copy-font-reg-2">PAYMENT METHOD</span>

	<?php if ( WC()->cart->needs_payment() ) : ?>
	<ul class="payment_methods methods">
		<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				if ( ! WC()->customer->get_country() ) {
					$no_gateways_message = __( 'Please fill in your details above to see available payment methods.', 'woocommerce' );
				} else {
					$no_gateways_message = __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' );
				}

				echo '<li>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</li>';
			}
		?>
	</ul>
	<?php endif; ?>

	<div class="form-row place-order">

		<noscript><?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?><br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>" /></noscript>

		<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

		<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) : ?>
			<p class="form-row terms">
				<label for="terms" class="checkbox"><?php printf( __( 'I agree to the <a class="term-mod" id="terms_modal" data-toggle="modal" data-target="#ModalTerms" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?></label>

					<script type="text/javascript">

					$('.term-mod ').click(function(){
					     $('#ModalTerms').css('display', 'block !important');
					})

					$(document).ready(function () {
					    $('.term-mod').click(function () {
					        $('#ModalTerms').modal('open');
					        return false;
					    });
					});	                                                           

					</script>

				<input type="checkbox" class="input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" />
			</p>
			<!-- TERM AND CONDITION Modal -->
            <div class="modal-term modal fade" id="ModalTerms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            	 <div class="modal-dialog" role="document">
                	<div class="modal-content">
                    	<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Terms &amp; Conditions</h4>
                   	</div>
                    <div class="modal-body">
                    	<p class="parag-title">Payment Method and Policies</p>
                        We accept payments in the form of Major Credit Cards (Visa, MasterCard, Discover, and American Express), Money Orders, PayPal, Bank Wire Transfers, and Checks only. We will not accept any other forms of payment other than listed above. We do not ship orders COD. We are not responsible for delays in order processing due to declined credit cards or waiting for PayPal payments to clear. For all orders shipped to California, we will add a 9% sales tax on top of the total order amount.

                        &nbsp;
                        <p class="parag-title">Shipping and Handling Policy</p>
                        We do not ship on Saturday, Sunday and holidays. Once payment for your order has been verified, your order will begin processing. Expected arrival assumes that processing or production is not delayed. Guaranteed delivery assurance assumes that there is no delay. Reasons for delays include waiting for payment to clear, artwork, or custom color bands. We will also not be liable with delays on shipments by 3rd party shipping couriers or customs, which invalidates our guaranteed shipping assurance. The turnaround count time of the bracelets starts on the same day if the order was placed before 11am PST, and may start on the next day if placed after 11am.

                        We will not be responsible for any lost shipments or damaged goods due to shipping couriers, unless shipping insurance was availed. For any shipment that was returned to us due to an incorrect address or refused package, we will charge a fixed cost of $20 to ship the item again to another address.

                        “Days” are referred to business days. If in a situation that we fail to deliver the bands in time, then we shall issue a credit based on the difference of the actual rush shipping method that was met.

                        If you have any questions regarding the status of your order, you may email your inquiry at info@wristbandcreation.com.

                        &nbsp;
                       	<p class="parag-title">International Shipping Policy</p>
                        Shipping time does not include any time your order might be delayed going through customs. We are not responsible for delays in shipment due to customs or other international shipping delays.

                        Orders that ship internationally to other countries besides Canada will usually incur additional taxes, duties, VAT, and other fees associated with customs. We are not responsible for these charges and they are the sole responsibility of the recipient. Please verify or get an estimate of what these charges might be before placing an international order. All shipping charges on our Web site include only the cost of shipping the order. All taxes, duties, and other fees charged are not included in the shipping charges on our Web site and are the sole responsibility of the recipient.

                        &nbsp;
                        <p class="parag-title">Copyright and Infringements</p>
                        We will not be held liable of any copyrights or infringements issues. It is the duty of the customer to make sure that the bracelet will not infringe any other company’s rights.

                        &nbsp;
                        <p class="parag-title">Production Quality</p>
                        Proofs/artworks only illustrate a digital mock-up of the actual bracelets produced for reference to the customer. The actual bracelets produced may not fully represent the proof, since this is only a representation. We shall base the actual produced bracelets on the wristband details on the invoice, agreed upon the customer. For any production flaws or mistakes on our side, we will be happy to reproduce the wristbands at no additional cost, as long as this will be claimed within 10 days of receiving the wristbands.

                        For swirl and segmented patterns, there might be a slight hint of other colors that may appear on the bracelets. For example, in a yellow and red swirl bracelet, a hint of orange may appear. This is normal and there is no way to control this due to the production method of the bracelets. For any re-orders, we cannot guarantee that the re-ordered wristbands will completely match the exact color of the previous order.

                        We use silk-screen process for our imprinted wristbands. The printed ink may fade in the long run, just like how printed t-shirts do also fade after washing several times. If there is a major sign of fading off on the wristbands within two months of delivery of the wristbands, then we will happy to reproduce the number of wristbands with fading ink. After two months, any hint of fading will not be entitled for reproduction.

                        &nbsp;
                       	<p class="parag-title">Ordering Policy</p>
                        Once an order is received, we may send a digital proof to confirm the details of the wristband design to the email address provided. The digital proof must be approved immediately. To avoid any delays, the digital proof will be auto-approved if no update was received within 24 hours, to ensure a timely delivery. The time of production will begin only when digital proof is approved. The order cannot be cancelled anymore once the wristbands are in production. There will be a processing fee of 15% of the total cost for any successfully placed orders to be cancelled prior to the production stage.

                        &nbsp;
                        <p class="parag-title">Privacy Policy</p>
                        We do not sell our customer list to anyone. You can order with the assurance that you will not receive spam mail.If we have a customer who fails to make payment for an order, a customer who reverses payment on an order already received, or a customer we feel is making an attempt to defraud us, we reserve the right to provide information to credit agencies and other collections services.

                       	&nbsp;
                        <p class="parag-title">Return Policy</p>
                        Due to the customized nature of our product we do not accept returns unless there was a production error on our part. Ordering the wrong size, color, or phrase on a wristband does not warrant a return. We encourage customers to verify all order information before submitting the final order. If we make a mistake on color, size, quantity, or phrases on a wristband we will be happy to find a solution to remedy the problem.

                        All returns must be approved through our office at info@wristbandcreation.com. If product defect is detected, our office must be notified within 10 days from time of arrival of your package

                        &nbsp;
						This document was last updated on April 17, 2017
                       </div>
            		<div class="modal-footer">
                   		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
              	</div>
            </div>
        </div>
        <!-- END TERMS AND CONDITION -->
        
		<?php endif; ?>
		<?php echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' ); ?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

	</div>

</div>

<?php if ( ! is_ajax() ) : ?>
	<?php do_action( 'woocommerce_review_order_after_payment' ); ?>
<?php endif; ?>


