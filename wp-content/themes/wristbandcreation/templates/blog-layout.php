	<div class="header-title text-center">
	    <h1>Blog</h1>
	</div>
	<div class="section-content section-blog">
		<div class="container">
			<div class="row">
			<?php
			// Start the Loop.
			// while ( have_posts() ) : the_post();
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$title = get_the_title();
            $type = 'post';
            $args=array('post_type' => $type,'posts_per_page'   => 3, 'paged' => $paged);
            $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post();
            ?>
				<div class="col-md-12">

					<?php if ( has_post_thumbnail() ) { ?>
					<div class="copy-blog-img-wrap" style="height: 292px; overflow: hidden;">
						<div class="copy-blog-img-item" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center;">
						</div>
					</div>

					<?php } ?>
					<a class="copy-blog-link copy-block" href="<?php the_permalink(); ?>">
						<h2 class="copy-blog-title"><?php echo get_the_title(); ?></h2>
						<span class="copy-blog-date copy-proxima-sbold copy-upper copy-spacing"><?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?></span>
						<div class="copy-blog-content copy-marg-top">
								<?php 
									$excerpt = get_the_excerpt();
									echo $excerpt;
								?>
						</div>
					</a>
						<a class="copy-blog-url copy-upper" href="<?php the_permalink(); ?>">Read More</a>
						<hr class="hr-line">
				</div>
			<?php 	endwhile; } ?>
			</div>
			<div class="blog-pagination">
				<ul>
					<?php pagination_bar(); ?>
				</ul>
			</div>
		</div>
	</div>
