<?php get_header(); ?>


<?php while( have_posts() ) : the_post(); ?>
<div class="header-title text-center">
	    <h1><?php echo get_the_title(); ?></h1>
	</div>
	<div class="section-content section-blog blog-single">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="copy-blog-img-wrap" style="height: 292px; overflow: hidden;">
						<div class="copy-blog-img-item" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center;">
						</div>
					</div>

					<?php } ?>
					<!-- <h2 class="copy-blog-title"><?php echo get_the_title(); ?></h2> -->
					<!-- <span class="copy-blog-date copy-proxima-sbold copy-upper copy-spacing"><?php the_date('F j, Y'); ?></span> -->
					<div class="copy-blog-content copy-marg-top">
						<?php the_content(); ?>
					</div>

					<!-- Your like button code -->
					<div class="fb-like copy-float-right" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>

					<div class="row row-share">
						<hr class="hr-line">
						<div class="col-md-6 p-0">
							<span class="copy-blog-share copy-upper copy-spacing copy-proxima-sbold">Share this Post</span>
						</div>
						<div class="col-md-6 p-0 text-right">
							<ul>
								<li>
									<a class="fa-custom" href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="Share on Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a class="fa-custom" href="http://twitter.com/intent/tweet?status=<?php echo get_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="Share on Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a class="fa-custom" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="Share on Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink(); ?>" title="Email this story"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>

								</li>
								<li>
									<!-- Trigger -->
									<button class="btn-link" data-clipboard-text="<?php the_permalink(); ?>">
										<i class="fa fa-link" aria-hidden="true"></i>
									</button>
								</li>
							</ul>
						</div>
                        <hr class="hr-line">
					</div>

                    <?php comments_template(); ?> 

				</div>
				<div class="col-md-3 copy-float-right">
					<div class="col-post-widget">
						<h3 class="copy-blog-other copy-upper copy-proxima-sbold">Other Posts</h3>
						<ul>
							<?php 
		                        $title = get_the_title();
		                        $type = 'post';
		                        $args=array('order' => 'ASC','post_type' => $type);
		                        $my_query = new WP_Query($args);
		                                if( $my_query->have_posts() ) {
		                                    while ($my_query->have_posts()) : $my_query->the_post();
		                                    //background-image: url('<?php echo the_post_thumbnail_url();
		                                    $querytitle = get_the_title();
		                                    if ($title != $querytitle){
		                        ?>
		                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><hr class="hr-line"></li>
		                    <?php
		                                 } endwhile; }
		                                wp_reset_query();
                            ?>

						</ul>
					</div>
				</div>
			</div>
            <hr class="hr-line">
			<div class="wristband--holder afterclear" data-sequence="500">
	            <div class="row">
	                <?php 
	                $type = 'product';
	                $args=array(
	                    'order'          => 'ASC',
	                    'posts_per_page'   => 10,
	                    'post_type' => $type
	                    );

	                    $my_query = new WP_Query($args);
	                        if( $my_query->have_posts() ) {
	                            while ($my_query->have_posts()) : $my_query->the_post();

	                            $sku = $product->get_sku();
	                            // echo "<pre>";
	                            // var_dump($product);
	                            // die();
	                            if ($sku != '') {

	                        $new = new WBC_Size_Manager();
	                        $sizecntr = 0;
	                        $z = 0;
	                        $id = get_the_id();
	                        $price_array = array();
	                        // echo $id;
	                        $sizes = $new->get_all_price_chart_by_product($id); 
	                        // echo "Hello" . $id;
	                        foreach ($sizes as $size => $value) {
	                            if ($value) {
	                                foreach ($value as $qty => $price){
	                                    $price_array[] = $price;
	                                }
	                                // echo $size;
	                            } $z++; }
	                        $lowprice = min($price_array);
	                ?>
	                        <div class="col-md-3" data-id="1">
	                            <a href="<?php echo get_site_url(); ?>/order-now?style=<?php echo strtolower(str_replace(' ', '-', the_title('', '', false))); ?>">
	                                <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>'); ">
	                                </div>
	                                <div class="wristband-desc-holder text-center">
	                                    <h3><?php the_title(); ?></h3>
	                                    <p>As low as $<?php echo number_format($lowprice, 2, '.', '');?></p>
	                                    <btn>Order Now
	                                        <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
	                                </div>
	                            </a>
	                        </div>
	            <?php
	                        }
	                        endwhile; }
	                        wp_reset_query();            ?>
	            </div>
	        </div>
		</div>
	</div>


<?php endwhile; ?>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
