<?php 

 //Template Name: Samples
get_header();
?>

<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="header-title text-center">
	    <h1 class="breast-title"><?php the_title(); ?></h1>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="section-content page-samples">
	<div class="container">
		<div class="copy-samples-par text-center">
			<?php the_content(); ?>
		</div>

		<hr class="hr-line copy-line-gap">

		<div class="row">
			<div class="col-md-6">
				<div class="img-wrap">
                    <img class="img-item" src="<?php echo get_stylesheet_directory_uri(); ?>/images/imgpsh_fullsize-min.png" alt="Assorted Wristbands" width="480" height="142">
                </div>
	        </div>
			<div class="col-md-6">
				<?php 
					// $post = get_page_by_path( 'free-sample-product', OBJECT, 'post_type' );
					    // $free_sample_id = $post->ID;
					 $type = 'product';
					                $args=array(
					                    'name'        => 'free-sample-product',
					                    'order'          => 'ASC',
					                    'posts_per_page'   => 10,
					                    'post_type' => $type
					                    );

					                    $my_query = new WP_Query($args);
					                        if( $my_query->have_posts() ) {
					                            while ($my_query->have_posts()) : $my_query->the_post();
					 ?>
					            <a id="free-sample-addcart" data-shipping_price="3" data-colortype= "solid" data-prodid ="<?php echo get_the_ID(); ?>" data-qty= "1" data-price= "0" class="copy-sample-link copy-white button_add_to_cart" href="#">Add Sample Pack to Cart <i class="fa fa-caret-right" aria-hidden="true"></i></a>
					        <?php
					                        endwhile; }
					                        wp_reset_query();            ?>

					<div class="form-group form-samples">
					  <textarea placeholder="Additional Notes" class="form-control" rows="5" id="comment"></textarea>
					</div>
			</div>
		</div>

		<hr class="hr-line copy-line-gap">

	</div>
</div>

<?php get_footer(); ?>