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
    <h1><?php the_title(); ?> Lanyards</h1>
</div>
<div class="container">
	<div class="section-content content-lanyard content-global text-center"><p>We at wristbandcreation.com carry a large selection of plain and patterned lanyards in wide array of colors, designs, and patterns. We can do a full customization with quality which is best in class. Lanyards and badges are perfect for tradeshows, conventions and company functions. Printed or woven your own custom logos will definitely display and highlight your business or company name, government agencies such as military or schools and events that requires identity or security. Match it with your choice of a special attachment to meet your requirements such as ID ring, clips and hooks. Customized lanyards is guaranteed to provide and the most economical way to promote awareness for your brand, charity events, services, or corporate functions.</p> <span class="cp-load-after-post"></span></div>
    <section class="section-pad section-product section-lanyard section-single-global">
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
                    
             		<a href="<?php echo get_site_url().'/customize-lanyards'; ?>" class="btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top">Start Customizing <i class="fa fa-caret-right" aria-hidden="true"></i></a>
             		<span class="copy-call-desc copy-block copy-marg-top copy-black text-center">Call us at
                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                	</span>
                </div>
                <div class="col-md-6">
					<div>
					<?php 
						$title = get_the_title();
						$lanyards_price_list = lanyards_price_list();
						$y = 0; $w = 0;
						
						foreach ($lanyards_price_list as $styles => $style ):
						 	//var_dump($style);
							//echo $style['name'];
						 	//echo strtolower($title);
							// die();
					 		if( $style['name'] == strtolower($title) ):
					 ?>
					 			<div class="product product-table">
				            		<p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
						            <!-- Nav tabs -->
							       	<ul class="nav nav-tabs" role="tablist">
										<?php 
											foreach ($style['value'] as $sizes => $size) :
												$active = $size['active']; 
										?>
												<li role="presentation" class="<?php echo $active; ?>">
													<a href="#val<?php echo $y;?>" aria-controls="#val<?php echo $size['name'];?>" role="tab" data-toggle="tab"><?php echo $size['name']; ?> inch</a>
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
							                                	<td><?php echo "$".$price_list['price']; ?></td>
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
	                        	<li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
	                    	</ul>
	                    </div>
					</div>
				</div>
	            <div class="col-md-12 copy-pad-left-no">
					<div class="row row-addon">
						<div class="col-md-12 p-0">
							<p>Attachment:</p>
								<ul>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img1.png'); ?>');"></div>
											<span>Ring</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img2.png'); ?>');"></div>
											<span>Lobster Claw Swivel Hook</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img3.png'); ?>');"></div>
											<span>Bulldog Clip</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img4.png'); ?>');"></div>
											<span>Oval Shape Hook</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img5.png'); ?>');"></div>
											<span>Metal Swivel Hook</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img6.png'); ?>');"></div>
											<span>Carabiner Hook</span>
										</div>
									</li>
								</ul>
						</div>
						<div class="col-md-12 p-0 col-break">
							<p>Optional:</p>
								<ul>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img7.png'); ?>');"></div>
											<span>Flat  Plastic Breakaway</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img8.png'); ?>');"></div>
											<span>Plastic Buckle</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img9.png'); ?>');"></div>
											<span>Cell Phone Loop</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img14.png'); ?>');"></div>
											<span>Badge Reel</span>
										</div>
									</li>
								</ul>
						</div>
						<div class="col-md-12 p-0 copy-marg-top col-badge">
							<p>Badge Holder:</p>
								<ul>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img10.png'); ?>');"></div>
											<span>3.875W x 3.25H</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img11.png'); ?>');"></div>
											<span>4.5W x 3.75H</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img12.png'); ?>');"></div>
											<span>2.5W x 4.5H</span>
										</div>
									</li>
									<li>
										<div class="addon-item">
											<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img13.png'); ?>');"></div>
											<span>3W x 5H</span>
										</div>
									</li>
								</ul>
						</div>
					</div>
				</div>

       		<div class="order-btn-mobile">
   				<a href="<?php echo get_site_url().'/customize-lanyards'; ?>" class="btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top">Start Customizing <i class="fa fa-caret-right" aria-hidden="true"></i></a>	
       		</div>
       		<div class="row copy-marg-top copy-float-left">
				<div class="col-md-12">
					<p style="line-height: 24px;">
						To help you promote your company, wristbandcreation.com can provide you with a wide selection of lanyards in many different styles and colors according to your exact requirement. Choose your own style of lanyards, we offer Polyester, Tubular, Nylon, Woven, and Full Color lanyards. You can put your own logo on the lanyards, or choose any message and font. Choose your own color and attachments.
					</p>
					<p style="line-height: 24px;">
						We do offer a free virtual mock up of the finished product for a more guaranteed satisfaction before we start producing your order. So order now as we guarantee to provide you lanyards and attachments that are both of the highest standards and are reasonable and cheapest on price!
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
                        $args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lanyard', 'order' => 'ASC');
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
