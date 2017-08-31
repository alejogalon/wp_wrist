<?php 

 //Template Name: Breast Cancer
get_header();

$type = 'product';
$args=array(
'post_type' => $type,
'order'          => 'ASC',
'posts_per_page'   => 30
);
$my_query = new WP_Query($args);
                                // echo '<pre>';
                                // var_dump($my_query);
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post();
  $title = get_the_title();
  if(get_post()->post_name == 'breast-cancer-product' || get_post()->post_name == 'breast-cancer-awareness' ){
  	$prod_id = get_the_ID();
  }
 endwhile;
 wp_reset_query();
}

?>
<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="header-title text-center">
	    <h1 class="breast-title"><?php the_title(); ?></h1>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="section-content page-breast">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="copy-breast-pars">
					<p>We have made it easy for you! Get these pre-made breast cancer awareness wristbands in a snap! They are already produced and in our hands and we can ship it out within 24 hours, perfect for rush orders, especially if you have an event coming up soon. They are in stock and ready to ship out!</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="copy-breast-img-wrap">
					<div class="copy-breast-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/DSC02779.jpg');">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="copy-breast-img-wrap">
					<div class="copy-breast-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/breast-cancer-next-month.jpg');"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="copy-breast-pars">
					<p>No need to create your own wristband design and think of your own message and color, we professionally designed them ourselves that says "HOPE STRENGTH COURAGE FAITH LOVE" on a beautiful pink swirl wristband.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="copy-breast-pars">
					<p>If you need more wristbands, or you want to customize your own breast cancer wristbands, you can still customize them using our <a href="<?php echo get_site_url(); ?>/order-now">Order Now</a> page. Any questions, feel free to contact us at <a href="tel:(800) 403-8050">(800) 403-8050</a> or email us at <a href="mailto:sales@wristbandcreation.com">sales@wristbandcreation.com</a>.</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="copy-breast-img-wrap">
					<div class="copy-breast-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/621-min.png');"></div>
				</div>
				<div class="copy-breast-img-wrap">
					<div class="copy-breast-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/612-min.png');"></div>
				</div>
			</div>
		</div>

		<hr class="hr-line copy-line-gap">

		<div class="row row-pack">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3 p-0 col-pack">
						<h2 class="text-center">Solid Wristbands</h2>
						<div class="breast-pack-wrap" style="height: 150px;">
							<div class="breast-pack-img" style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/images/breast-cancer-img_1.png');height: 100%; background-size: contain; background-position: center 0; background-repeat: no-repeat;"></div>
						</div>
					</div>
					<div class="col-md-9">
						<ul>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block" data-value = "10">10</span>
									<span class="copy-pack-price" data-value = "30">Pay $30</spa>
									<a data-shipping_price="10" data-colortype= "solid" data-prodid ="<?php echo $prod_id; ?>" data-qty= "10" data-price= "30" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
									<!-- <form name="addpro" method="post" action="">
										<input type="hidden" name="price" value="30">
										<input type="hidden" name="quantity" value="10">
									    <input type="submit" name="addcustomcarts" value="ADD TO CART" />
									</form> -->
								</div>
							</li>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block" data-value = "50">50</span>
									<span class="copy-pack-price" data-value = "50">Pay $50</span>
									<a data-shipping_price="10" data-colortype= "solid" data-prodid ="<?php echo $prod_id; ?>" data-qty= "50" data-price= "50" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>

								</div>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block">100</span>
									<span class="copy-pack-price">Pay $80</span>
									<a data-shipping_price="15" data-colortype= "solid" data-prodid ="<?php echo $prod_id; ?>" data-qty= "100" data-price= "80" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</div>
							</li>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block">500</span>
									<span class="copy-pack-price">Pay $150</span>
									<a data-shipping_price="25" data-colortype= "solid" data-prodid ="<?php echo $prod_id; ?>" data-qty= "500" data-price= "150" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="hr-line copy-line-gap">
		<div class="row row-pack">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3 p-0 col-pack">
						<h2 class="text-center">Swirl Wristbands</h2>
						<div class="breast-pack-wrap" style="height: 150px;">
							<div class="breast-pack-img" style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/images/breast-cancer-img_2.png');height: 100%; background-size: contain; background-position: center 0; background-repeat: no-repeat;"></div>
						</div>
					</div>
					<div class="col-md-9">
						<ul>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block">10</span>
									<span class="copy-pack-price">Pay $30</span>
									<a data-shipping_price="10" data-colortype= "swirl" data-prodid= "<?php echo $prod_id; ?>" data-qty= "10" data-price= "30" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</div>
							</li>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block">50</span>
									<span class="copy-pack-price">Pay $50</span>
									<a data-shipping_price="10" data-colortype= "swirl" data-prodid= "<?php echo $prod_id; ?>" data-qty= "50" data-price= "50" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</div>
							</li>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block">100</span>
									<span class="copy-pack-price">Pay $80</span>
									<a data-shipping_price="15" data-colortype= "swirl" data-prodid= "<?php echo $prod_id; ?>" data-qty= "100" data-price= "80" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</div>
							</li>
							<li class="copy-pack-box">
								<div class="copy-pack-box-list text-center">
									<p class="copy-buy copy-upper copy-proxima-sbold">Buy Pack of</p>
									<span class="copy-pack-qty copy-block">500</span>
									<span class="copy-pack-price">Pay $150</span>
									<a data-shipping_price="25" data-colortype= "swirl" data-prodid= "<?php echo $prod_id; ?>" data-qty= "500" data-price= "150" class="copy-pack-url copy-upper copy-white copy-spacing copy-marg-top bc_add_to_cart" href="#">Add to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copy-relative">
		<div class="section-breast-style text-center">
			<!-- <h3>Breast Cancer</h3>
			<span class="copy-style">Awareness Month</span>
			<span class="copy-style">Awareness</span> -->
			<span class="copy-proud">We are also proud supporters of several Breast Cancer Foundations such as the Susan G. Komen Breast Cancer Foundation, the HERS Breast Cancer Foundation, Cancer.org, the Miami Breast Cancer Experts, and the American Cancer Society.</span>
		</div>
		<div class="copy-breat-wrap"></div>
	</div>
</div>

<?php get_footer(); ?>