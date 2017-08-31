<?php 

 //Template Name: Lanyards
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-title text-center">
    <h1><?php the_title(); ?></h1>
</div>
<div class="container">
	<div class="section-content content-lanyard text-center">
		<?php the_content(); ?>
	</div>
	<div class="section-content section-lanyard">
	<?php
					$args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lanyard', 'order' => 'ASC');
			        $loop = new WP_Query( $args );
			        $y = 0; $w = 0;
			        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			        $title = get_the_title();
			         ?>

			                <!-- <li class="product">    

			                    <?php //the_title(); ?>

			                </li> -->


		<div class="row" id="<?php echo strtolower($title); ?>">
			<div class="col-md-6">
				<p class="copy-proxima-sbold"><?php echo $title; ?> Lanyards</p>
				<div id="<?php echo $title; ?>-slider" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                        <?php
                            global $product;
                            $i = 0;
                            $attachment_ids = $product->get_gallery_attachment_ids(); 
                            foreach( $attachment_ids as $attachment_id ) 
                        { ?>

                    	
                            <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                                <div class="item-wrap">
                                    <a href="<?php echo wp_get_attachment_url( $attachment_id );?>" class="btn-style wristband-img-holder bg-inline" data-lightbox="example-set" data-title="<?php echo the_title(); ?> Lanyards" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>')">
	                                    <div class="item-product" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>');?>');">
	                                    </div>
                                    </a>
                                </div>
                            </div>
                        
                    	    <!-- <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                                <div class="item-wrap">
                                    <a href="<?php echo wp_get_attachment_url( $attachment_id );?>" class="btn-style wristband-img-holder bg-inline swipebox" title="<?php echo the_title(); ?> Lanyards" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>')">
	                                    <div class="item-product" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>');?>');">
	                                    </div>
                                    </a>
                                </div>
                            </div> -->

                        <?php $i++; } ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#<?php echo $title; ?>-slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#<?php echo $title; ?>-slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                        	<?php for ($x=0; $x < $i ; $x++) { ?>
							<li data-target="#<?php echo $title; ?>-slider" data-slide-to="<?php echo $x; ?>" class="<?php echo ($x == 0) ? 'active' : '' ?>"></li>
							<?php } ?>
							<!-- <li data-target="#<?php //echo $title; ?>-slider" data-slide-to="1"></li> -->
						</ol>

                    </div>
                    <div class="copy-btn-lanyard text-center copy-marg-top">
                    	<a class="text-center btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top-2" href="<?php echo get_site_url(); ?>/customize-lanyards">Start Customizing <i class="fa fa-caret-right" aria-hidden="true"></i></a>

                    	<span class="copy-block copy-marg-top copy-black">Call us at
	                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                    	</span>
                    </div>
                    <div class="copy-lanyard-content">
                    	<?php the_content(); ?>
                    	<ul class="copy-list-no-style list-product-desc copy-font-reg copy-marg-top">
                        	<li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
                    	</ul>
                    </div>
			</div>
			<div class="col-md-6">
				<div>


					<?php $lanyards_price_list = lanyards_price_list();
					
							foreach ($lanyards_price_list as $styles => $style ):
							// 	var_dump($style);
							// echo $style['name'];
							
							// echo strtolower($title);
							// die();
					 			if( $style['name'] == strtolower($title) ):
					 ?>

						        <div class="product product-table">
						            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
						            <!-- Nav tabs -->
							       	<ul class="nav nav-tabs" role="tablist">
							          
										<!-- <li role="presentation" class="">
											<a href="#val0" aria-controls="val5/8" role="tab" data-toggle="tab">5/8 inch</a></li>
										<li role="presentation" class="active">
											<a href="#val1" aria-controls="val3/4" role="tab" data-toggle="tab">3/4 inch</a></li>
										<li role="presentation" class="">
											<a href="#val2" aria-controls="val1" role="tab" data-toggle="tab">1 inch</a></li> -->

										<?php 
										// echo "<pre>";
										// var_dump($style['value']);
										//$y = 0;
											foreach ($style['value'] as $sizes => $size) :
												$active = $size['active']; 
										?>
												<!-- # code...
												echo "<pre>";
												var_dump($size['name']); -->
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
			<div class="col-md-12">
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
		</div>


		<hr class="hr-line copy-line-gap">

			    	<?php endwhile; ?>
			    <?php wp_reset_query(); ?>
	</div>
	<div class="row" style="margin-bottom: 2em;">
		<div class="col-md-12">
				<p style="line-height: 24px;">
					To help you promote your company, wristbandcreation.com can provide you with a wide selection of lanyards in many different styles and colors according to your exact requirement. Choose your own style of lanyards, we offer Polyester, Tubular, Nylon, Woven, and Full Color lanyards. You can put your own logo on the lanyards, or choose any message and font. Choose your own color and attachments.
				</p>
				<p style="line-height: 24px;">
					We do offer a free virtual mock up of the finished product for a more guaranteed satisfaction before we start producing your order. So order now as we guarantee to provide you lanyards and attachments that are both of the highest standards and are reasonable and cheapest on price!
				</p>
			</div>
	</div>
</div>
<?php 
    endwhile;
    endif; 
    get_footer();
?>