<?php 

 //Template Name: About Awareness Wristbands
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-title text-center">
    <h1><?php the_title(); ?></h1>
</div>

<div class="section-awareness section-content">
    <div class="container">
        <?php if( have_rows('awareness_field') ): ?>
            <?php while( have_rows('awareness_field') ): the_row(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php the_sub_field('title'); ?></h1>
                        <div class="col-md-12 p-0">
                            <div class="copy-content-awareness">
                                <?php the_sub_field('content'); ?>
                            </div>
                            <div class="img-wrap">
                                <div class="img-item" style="background-image: url('<?php the_sub_field('image'); ?>');"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php 
    endwhile;
    endif; ?>

<?php get_footer(); ?>