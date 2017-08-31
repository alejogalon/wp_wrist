<?php 

 //Template Name: New Terms and Conditions Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="section-tabs terms section-content">
		<div class="container">
			<div class="col-md-3"> <!-- required for floating -->
			  <!-- Nav tabs -->
			  <ul class=""><!-- 'tabs-right' for right tabs -->
			    <li><a href="<?php echo get_site_url(); ?>/privacy-policy">Privacy Policy</a></li>
			    <li class="active"><a href="<?php echo get_site_url(); ?>/terms-and-conditions" >Terms & Conditions</a></li>
			    <li><a href="<?php echo get_site_url(); ?>/sitemap" >Sitemap</a></li>
			  </ul>
			</div>
			<div class="col-md-9">
			    <!-- Tab panes -->
			    <div class="tab-content">
			      <div class="tab-pane" id="privacy-policy">
			      </div>

			      <div class="tab-pane active" id="terms-and-conditions">
			      	<h1>Terms & Conditions</h1>

			      	<?php if( have_rows('terms_field') ): ?>
		            	<?php while( have_rows('terms_field') ): the_row(); ?>
		            		<p class="parag-title"><?php the_sub_field('title'); ?></p>
			      			<p><?php the_sub_field('content'); ?></p><br>
						<?php endwhile; ?>
		        	<?php endif; ?>
			      </div>

			      <div class="tab-pane" id="sitemap">
			      </div>
			    </div>
			</div>
		</div>
	</div>


<?php 
    endwhile;
    endif; ?>

<?php get_footer(); ?>