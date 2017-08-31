<?php 

 //Template Name: Purchase Order/School Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>


<div class="header-title text-center">
    <h1><?php the_title(); ?></h1>
</div>
<div class="section-content" id="section-purchase">

    <div class="container">

        <?php the_content(); ?>

    </div>
    
</div>
<?php 
    endwhile;
    endif; 
    get_footer();
?>