<?php 

 //Template Name: Lapel Pins Product Guide
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-title text-center">
    <h1><?php the_title(); ?></h1>
</div>
<div class="container">
	<div class="section-content content-lapel-pins text-center">
		<?php the_content(); ?>
	</div>
	<div class="section-content section-lapel-pins">
		<div class="lapel-product-details">
			<?php
			$args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lapel-pins', 'order' => 'ASC');
	        $loop = new WP_Query( $args );
	        $y = 0; $w = 0;
	        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
	        $title = get_the_title();
   			$post_slug=$post->post_name;
	    ?>
		<div class="row" id="<?php echo strtolower($title); ?>">
			<div class="col-md-6">
				<p class="copy-proxima-sbold"><?php echo $title; ?> Lapel Pins</p>
				<div id="<?php echo $post_slug; ?>-slider" class="carousel slide single-product" data-ride="carousel">
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
                                    <a href="<?php echo wp_get_attachment_url( $attachment_id );?>" class="btn-style wristband-img-holder bg-inline" data-lightbox="example-set" data-title="<?php echo the_title(); ?> Lapel Pins" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>')">
	                                    <div class="item-product" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>');?>');">
	                                    </div>
                                    </a>
                                </div>
                            </div>
                        <?php $i++; } ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#<?php echo $post_slug; ?>-slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#<?php echo $post_slug; ?>-slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                        	<?php for ($x=0; $x < $i ; $x++) { ?>
							<li data-target="#<?php echo $post_slug; ?>-slider" data-slide-to="<?php echo $x; ?>" class="<?php echo ($x == 0) ? 'active' : '' ?>"></li>
							<?php } ?>
						</ol>

                    </div>
                    <div class="copy-btn-lapel-pins text-center copy-marg-top">
                    	<a class="text-center btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius" href="<?php echo get_site_url(); ?>/custom-lapel-pins">Start Customizing <i class="fa fa-caret-right" aria-hidden="true"></i></a>

                    	<span class="copy-block copy-marg-top copy-black">Call us at
	                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                    	</span>
                    </div>
			</div>
			<div class="col-md-6">
			<?php $lapelpins = lapelpins_price_list();
					
							foreach ($lapelpins as $styles => $style ):
							// 	var_dump($style);
							// echo $style['name'];
							
							// echo strtolower($title);
							// die();
					 			if( $style['name'] == strtolower($title) ):
					 ?>

						        <div class="product product-table">
						            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
						            <span class="copy-block text-center">
										Measurement is based on the longest diameter.
									</span>
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
			<hr class="hr-line copy-line-gap">

			
			<!-- END PRODUCT ROW -->
		</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
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
		<div class="copy-row-bottom copy-marg-top copy-lapel-bottom-desc">
			<p style="line-height: 24px;">
				You can create limitless style possibilities with our broad selection of high quality Lapel Pins! Whether it is for promoting your brand or for social awareness causes, wristbandcreation.com got you covered. Our certified expert and experienced Sales Associates and Graphic Designers are committed to offer you top calibre support as we provide artistic quality and high standards to give you the Lapel Pins you truly wanted. Wristbandcreation.com is your #1 source for the finest custom lapel pins!
			</p>
		</div>
		</div>
	</div>
</div>
<?php 
    endwhile;
    endif; 
    get_footer();
?>