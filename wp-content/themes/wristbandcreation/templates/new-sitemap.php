<?php 

 //Template Name: New Sitemaps Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="section-tabs terms section-content">
		<div class="container">
			<div class="col-md-3"> <!-- required for floating -->
			  <!-- Nav tabs -->
			  <ul class=""><!-- 'tabs-right' for right tabs -->
			    <li><a href="<?php echo get_site_url(); ?>/privacy-policy">Privacy Policy</a></li>
			    <li><a href="<?php echo get_site_url(); ?>/terms-and-conditions">Terms & Conditions</a></li>
			    <li class="active"><a href="<?php echo get_site_url(); ?>/sitemap">Sitemap</a></li>
			  </ul>
			</div>
			<div class="col-md-9">
			    <!-- Tab panes -->
			    <div class="tab-content">
			      <div class="tab-pane" id="privacy-policy">
			      </div>

			      <div class="tab-pane" id="terms-and-conditions">
			      </div>

			      <div class="tab-pane active" id="sitemap">
					<h1>Sitemap</h1>

					<ul>
						<?php if( have_rows('sitemap_field') ): ?>
		            	<?php while( have_rows('sitemap_field') ): the_row(); ?>
		            		<li><a href="<?php echo get_site_url(); ?>/<?php the_sub_field('slug') ?>"><?php the_sub_field('label'); ?></a></li>
						<?php endwhile; ?>
		        	<?php endif; ?>
					</ul>
			      </div>
			    </div>
			</div>
		</div>
	</div>


<?php 
    endwhile;
    endif; ?>

<?php get_footer(); ?>