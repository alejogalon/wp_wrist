<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

echo '<pre style="display:none;">';
print_r( $GLOBALS['wbc_settings']->products->{$post->ID}->sizes );
echo '</pre>';
?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php //echo "askjdhasdhaksldhajklsdhaklsdhaksjldhaksjdhaskjdhaskdhaskdjh"; ?>

			<?php if( has_term( 'lanyard', 'product_cat' ) ) {
					wc_get_template_part( 'content', 'single-product-lanyard' );
					//wp_redirect( home_url() );
				} else if( has_term( 'lapel-pins', 'product_cat' ) ) {
					wc_get_template_part( 'content', 'single-product-lapelpins' );
					//wp_redirect( home_url() );
				} else {
				    wc_get_template_part( 'content', 'single-product' );
				}
			?>

			<?php //wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>