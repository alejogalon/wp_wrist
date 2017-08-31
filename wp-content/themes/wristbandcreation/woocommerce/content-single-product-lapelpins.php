<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

	 $id =  get_the_ID(); 
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="header-title text-center">
    <h1><?php the_title(); ?> Lapel Pins</h1>
</div>
<div class="container">
	<div class="section-content content-lapel-pins content-global text-center">
		<p>Looking for lapel pins? Whatever style or type of pin that you are looking for, we are 100% sure that you’ll get to find it here at <a href="http://wristbandcreation.com/" target="_blank" rel="noopener noreferrer">wristbandcreation.com</a>. Considered as one of the most versatile promotional products in the market which we do handcraft and custom design to fit your exact needs. We offer a complete product line of stock pins in a wide array of designs you can imagine which is definitely perfect for all functions whether it is for recognition, fashion, awareness purposes etc.</p>
		<p>Leave it to the experts! We are a team of highly experienced lapel pin experts who will help you to complete your order smoothly from designing until order fulfilment. We guarantee to provide you a world-class product and service throughout the entire process.</p> <span class="cp-load-after-post"></span>
	</div>
    <section class="section-pad section-product section-content section-lapel-pins section-single-global">
          <div class="copy-font-big copy-wristband-par">
            <?php echo get_field('header_description');  ?>
          </div>
        <div class="row">
                <div class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                        <?php
                                              global $product;
                                              $i = 0;
                                             $attachment_ids = $product->get_gallery_attachment_ids(); 
                                             foreach( $attachment_ids as $attachment_id ) 
                        {
                          ?>
                            <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>');"></div>
                                </div>
                            </div>
                            <?php $i++; } 
                        ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $i = 0; foreach( $attachment_ids as $attachment_id ) { ?>
                               <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0) ? 'active' : '' ?>">
                               </li>
                            <?php $i++; } ?>
                        </ol>

                    </div>
                    
             		<a href="<?php echo get_site_url().'/custom-lapel-pins'; ?>" class="btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top">Start Customizing <i class="fa fa-caret-right" aria-hidden="true"></i></a>
             		<span class="copy-block copy-marg-top copy-black text-center">Call us at
                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                	</span>
                </div>
                <div class="col-md-6">
					<div>
					<?php 
						$title = get_the_title();
						$lanyards_price_list = lapelpins_price_list();
						$y = 0; $w = 0;
						
						foreach ($lanyards_price_list as $styles => $style ):

					 		if( $style['name'] == strtolower($title) ):
					 ?>
					 			<div class="product product-table">
						            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
						            <span class="copy-block text-center">
										Measurement is based on the longest diameter.
									</span>
						            <!-- Nav tabs -->
							       	<ul class="nav nav-tabs" role="tablist">

										<?php 
											foreach ($style['value'] as $sizes => $size) :
												$active = $size['active']; 
										?>
											<li role="presentation" class="<?php echo $active; ?>">
												<a href="#val<?php echo $y;?>" aria-controls="#val<?php echo $size['name'];?>" role="tab" data-toggle="tab"><?php echo $size['size']; ?> inch</a>
											</li>
										<?php
											$y++;
											endforeach;
										?>

							        </ul>
							        <!-- Tab panes -->
						            <div class="tab-content">
						            	<?php 
						            	
						            	foreach ($style['value'] as $sizes => $size) :
						            		$active1 = $size['active'];
						            	?>

								                <div role="tabpanel" class="tab-pane <?php echo $active1; ?>" id="val<?php echo $w;?>">
								                    <div class="table-responsive">
								                        <table class="table text-center">
								                            <thead>
								                                <tr>
								                                    <td>Qty</td>
								                                    <td>Price</td>
								                                </tr>
								                            </thead>
								                        <tbody>
								                        	<?php foreach ($size['value'] as $price_lists => $price_list): ?>
								                        		<tr>
								                                	<td><?php echo $price_list['quantity']; ?></td>
								                                	<td><?php echo "$".number_format((float)$price_list['price'], 2, '.', '');?></td>
								                            	</tr>
								                            <?php endforeach; ?> 
								                        </tbody>
								                       </table>
								                    </div>
								                </div>
						               	<?php $w++; endforeach; ?>
			                       	</div>
			                    </div>
		                    <?php endif; endforeach; ?>
	                </div>
	            </div>
	            <div class="row copy-marg-top copy-clear p-0">
					<div class="col-md-12">
						 <div class="copy-lapel-pins-content copy-marg-top">
	                    	<div class="copy-lapel-pins-content-main">
	                    		<?php the_content(); ?>
	                    	</div>
	                    	<ul class="copy-list-no-style list-product-desc copy-font-reg copy-marg-top">
	                        	<li><i class="icon icon-lapel icon-digital"></i>Free Digital Proof</li>
	                        	<li><i class="icon icon-lapel icon-pack"></i>Free Individual Packaging</li>
	                        	<li><i class="icon icon-lapel icon-ship"></i>Free Shipping</li>
	                        	<li><i class="icon icon-lapel icon-time"></i>Get in 3-4 weeks Turnaround Time</li>
	                    	</ul>
	                    </div>
					</div>
				</div>
	           <div class="row row-addon">
					<div class="col-md-12">
						<p class="copy-proxima-bold">Lapel Pins Color:</p>
							<ul>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/gold.png" alt="Silver" width="71px" height="79px">
										<span>Gold</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/silver.png" alt="Silver" width="71px" height="79px">
										<span>Silver</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/nickel.png" alt="Nickel" width="71px" height="79px">
										<span>Nickel</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/brass.png" alt="Brass" width="71px" height="79px">
										<span>Brass</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/copper.png" alt="Copper" width="71px" height="79px">
										<span>Copper</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/black-nickel.png" alt="Black Nickel" width="71px" height="79px">
										<span>Black Nickel</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/antique-gold.png" alt="Antique Gold" width="71px" height="79px">
										<span>Antique Gold</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/antique-silver.png" alt="Antique Silver" width="71px" height="79px">
										<span>Antique Silver</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/antique-brass.png" alt="Antque Brass" width="71px" height="79px">
										<span>Antique Brass</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-colors/antique-copper.png" alt="Antique Copper" width="71px" height="79px">
										<span>Antique Copper</span>
									</div>
								</li>
							</ul>
					</div>
				</div>
				<!-- LAPEL ADD-ONS -->
				<div class="lapel-product-add-ons">
					<div class="row row-addon">

						<!-- REMOVE PIN's BACK ATTACHMENT -->

						<div class="col-md-12">
							<p class="copy-proxima-bold">Packaging:</p>
								<ul>
									<li>
										<div class="addon-item">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-pack/poly-bag.png" alt="Poly Bag" width="71px" height="79px">
											<span>Poly Bag</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-pack/plastic-box.png" alt="Plastic Box" width="71px" height="79px">
											<span>Plastic Box</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-pack/velvet-pouch.png" alt="Velvet Pouch" width="71px" height="79px">
											<span>Velvet Pouch</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-pack/velvet-gift-box.png" alt="Velvet Gift Box" width="71px" height="79px">
											<span>Velvet Gift Box</span>
										</div>
									</li>
								</ul>
						</div>
						<div class="col-md-12 copy-marg-top copy-col-options">
							<p class="copy-proxima-bold">Additional Options:</p>
								<ul>
									<li>
										<div class="addon-item">
											<div class="option-help copy-float-right">
				                           		<i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
				                           		<div class="options-hover">
				                           		  <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
				                           		  <div class="options-desc">
				                           		      <p class="text-left">Make your pins a limited edition withlaser engraved numbering.</p>
				                           		  </div>
				                           		</div>
				                            </div>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-options/option-1.png" alt="Numbering" width="71px" height="79px">
											<span>Add consecutive numbering on the back of your pins</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="option-help copy-float-right">
				                           		<i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
				                           		<div class="options-hover">
				                           		  <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
				                           		  <div class="options-desc">
				                           		      <p class="text-left">Add your company name, website or any custom text.</p>
				                           		  </div>
				                           		</div>
				                            </div>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lapel-options/option-2.png" alt="Back Stamp" width="71px" height="79px">
											<span>Add a backstamp</span>
										</div>
									</li>
								</ul>
						</div>
					</div>
				</div>
				<!-- END ADD-ONS -->
       		<div class="order-btn-mobile">
   				<a href="<?php echo get_site_url().'/custom-lapel-pins'; ?>" class="btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top">Start Customizing <i class="fa fa-caret-right" aria-hidden="true"></i></a>	
       		</div>
       		<div class="row copy-marg-top copy-float-left">
				<div class="col-md-12 copy-pad-left-no">
					<p style="line-height: 24px;">
						You can create limitless style possibilities with our broad selection of high quality Lapel Pins! Whether it is for promoting your brand or for social awareness causes, wristbandcreation.com got you covered. Our certified expert and experienced Sales Associates and Graphic Designers are committed to offer you top calibre support as we provide artistic quality and high standards to give you the Lapel Pins you truly wanted. Wristbandcreation.com is your #1 source for the finest custom lapel pins!
					</p>
				</div>
			</div>
            <div class="row row-other-products copy-float-left">
                <div class="col-md-12 copy-pad-left-no">
                    <hr class="hr-line copy-line-gap">

                    <div class="copy-head copy-font-reg copy-upper copy-proxima-s-bold copy-spacing copy-marg-top">Other Products</div>
                    <ul class="list list-other copy-gap-top">
                    <?php 
                        $title = get_the_title();
                        $type = 'product';
                        $args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lapel-pins', 'order' => 'ASC');
                        $my_query = new WP_Query($args);
                            if( $my_query->have_posts() ) {
                                while ($my_query->have_posts()) : $my_query->the_post();
                                    //background-image: url('<?php echo the_post_thumbnail_url();
                                    $querytitle = get_the_title();

                                     if ($title != $querytitle){
                    ?>
                        <li>
                            <a class="copy-block" href="<?php the_permalink(); ?>">
                               <div class="effects-2" id="effect-5">
                                  <div class="img hover-effect" style="width: 100%;">
                                    <div class="item-wrap">
                                      <div class="item-product" style="background-image: url('<?php echo the_post_thumbnail_url();?>')"></div>
                                    </div>
                                  </div>
                                </div>
                            </a>
                            <span class="copy copy-product-desc copy-black copy-proxima-reg copy-block"><?php the_title();?></span>
                        </li>
                                
                    <?php
                				} 
                                endwhile; 
                            }
                            wp_reset_query();           
                    ?>
                    </ul>
                </div>
            </div>
    </section>
</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
