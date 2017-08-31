<?php 

 //Template Name: New Additional Info Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="section-tabs terms section-content">
		<div class="container">
			<div class="col-md-3"> <!-- required for floating -->
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
			    <li class="active"><a href="#privacy-policy" data-toggle="tab">Privacy Policy</a></li>
			    <li><a href="#terms-and-conditions" data-toggle="tab">Terms & Conditions</a></li>
			    <li><a href="#sitemap" data-toggle="tab">Sitemap</a></li>
			  </ul>
			</div>
			<div class="col-md-9">
			    <!-- Tab panes -->
			    <div class="tab-content">
			      <div class="tab-pane active" id="privacy-policy">
			      	<h1>Privacy & Policy</h1>
			      	<?php the_field('privacy_policy_field'); ?>
			      </div>

			      <div class="tab-pane" id="terms-and-conditions">
			      	<h1>Terms & Conditions</h1>

			      	<?php if( have_rows('terms_field') ): ?>
		            	<?php while( have_rows('terms_field') ): the_row(); ?>
		            		<p class="parag-title"><?php the_sub_field('title'); ?></p>
			      			<p><?php the_sub_field('content'); ?></p><br>
						<?php endwhile; ?>
		        	<?php endif; ?>
			      </div>

			      <div class="tab-pane" id="sitemap">
					<h1>Sitemap</h1>

					<ul>
						<?php if( have_rows('sitemap_field') ): ?>
		            	<?php while( have_rows('sitemap_field') ): the_row(); ?>
		            		<li><a href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('page_title'); ?></a></li>
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