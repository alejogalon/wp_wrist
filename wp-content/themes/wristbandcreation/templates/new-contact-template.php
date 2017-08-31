<?php 

 //Template Name: New Contact Template
get_header();

?>

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-title text-center">
    <h1>Contact Us</h1>
</div>
<div class="get-in-touch-section section-content">
	<div class="container">
		<h3 class="section-title-small">Get in touch</h3>
		<div class="gap gap-50"></div>

		<div class="col-md-3">
			<div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
			<div class="contact-label">
				<p><span>address</span> <?php the_field('address'); ?></p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="contact-icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
			
			<div class="contact-label">
				<p><span>email</span> <a href="mailto:<?php the_field('email'); ?>" target="_blank"><?php the_field('email'); ?></a></p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
			
			<div class="contact-label">
			<p><span>phone</span> 
			<?php if( have_rows('toll') ): ?>
            	<?php while( have_rows('toll') ): the_row(); ?>
				<?php the_sub_field('description'); ?>: <a href="tel:<?php the_sub_field('number'); ?>"><?php the_sub_field('number'); ?></a> <br>
				<?php endwhile; ?>
        	<?php endif; ?>
        	</p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i></div>
			<div class="contact-label">
				<p><span>fax</span> <?php the_field('fax'); ?></p>
			</div>
		</div>

	</div>
</div>

<div class="question-section section-content">
	<div class="container">
	    <?php the_content(); ?>

	    <?php echo do_shortcode( '[contact-form-7 id="598" title="Contact Us Form"]' ); ?>
	    <!-- <div class="form-contact" role="form">
		  <div class="row">
		  	<div class="form-group col-md-6">
			    <input type="email" class="form-control" id="fname" placeholder="First Name">
			</div>
			<div class="form-group col-md-6">
			    <input type="email" class="form-control" id="lname" placeholder="Last Name">
			</div>
		  </div>
		    <div class="form-group">
		        <input type="email" class="form-control" id="fname" placeholder="Contact Number">
		    </div>
		    <div class="form-group">
		        <input type="email" class="form-control" id="lname" placeholder="Email Address">
		    </div>
		    <div class="form-group">
			    <textarea class="form-control" rows="5" id="comment" placeholder="Message"></textarea>
		    </div>
		  	<a href="#" class="btn btn-send">send</a>
		</div>
 -->	</div>
</div>
<?php 
    endwhile;
    endif; ?>

<?php get_footer(); ?>