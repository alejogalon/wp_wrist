<?php 

 //Template Name: Home Template
get_header();
?>
<div>
<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
    $cntr = 0;
    $x = 0;
    $i = 0;
     ?>

<div class="banner-section">
    <div class="banner-header text-center">
        <p class="copy-banner-header-title">Order 100 wristbands or more and get 100 free!</p>
    </div>
    <div class="container">
        <div class="banner-holder">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <?php if( have_rows('home_banner') ): ?>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <?php while( have_rows('home_banner') ): the_row(); ?>
                       <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0) ? 'active' : '' ?>"></li>
                    <?php $cntr++; $i++; endwhile; ?>
                    </ol>
                    <!-- end -->
                    <div class="carousel-inner" role="listbox">
                    <?php while( have_rows('home_banner') ): the_row(); ?>

                        <div class="item bg-inline <?php if($x == 0) { echo 'active'; } else { echo '';}?>" style="background-image: url('<?php the_sub_field('banner_images'); ?>');">
                            <div class="carousel-caption">
                                <p class=""><?php the_sub_field('banner_message'); ?></p>
                                <?php the_sub_field('banner_header'); ?>
                                <div class="banner-sub-images">
                                    <ul>
                                        <?php if( have_rows('banner_sub_images') ): ?>
                                          <?php while( have_rows('banner_sub_images') ): the_row(); ?>
                                              <li style="background-image: url('<?php echo the_sub_field('images');?>');"></li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <a class="copy-banner-link" style="display: none;" href="<?php echo get_home_url(); ?>/customize-lanyards">Order Lanyards</a>
                                 <a class="copy-banner-link banner-link-2" style="display: none;" href="<?php echo get_home_url(); ?>/order-now/">Start Customizing</a>
                            </div>
                        </div>
                    <?php $x++; endwhile; ?>
                    </div>
                    
               
                <?php endif; ?>
            <!-- </div> -->

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <?php echo do_shortcode('[cp_modal display="inline" id="cp_id_cbc09"][/cp_modal]'); ?>
    </div>
</div>
<div class="service-section">
    <div class="container">
        <div class="col-md-3">
            <div class="service-icon service-deliver bg-inline"></div>
            <div class="service-label">
                <p>Get your wristbands by <span class="exact_date"></span>!</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="service-icon service-cart bg-inline"></div>
            <div class="service-label">
                <p>No minimum order!</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="service-icon service-call bg-inline"></div>
            <div class="service-label">
                <p>24/5 Customer Service</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="service-icon service-design bg-inline"></div>
            <div class="service-label">
                <p>Design your own wristband!</p>
            </div>
        </div>
    </div>
</div>
<div class="wristband-section section-content">
    <div class="container">
        <div class="wristband-header text-center">
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
        </div>
        <div class="wristband--holder afterclear" data-sequence="500">
            <div class="row">
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=debossed">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Debossed2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Debossed Wristbands</h3>
                            <p>As low as $0.06</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=imprinted">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Imprinted2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Imprinted Wristbands</h3>
                            <p>As low as $0.07</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=deboss-fill">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Deboss-Fill2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Deboss-Fill Wristbands</h3>
                            <p>As low as $0.08</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=embossed">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Embossed2-min-1.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Embossed Wristbands</h3>
                            <p>As low as $0.06</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=emboss-printed">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Emboss_Printed2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Emboss-Printed Wristbands</h3>
                            <p>As low as $0.22</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=dual-layer">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Dual_Layer2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Dual Layer Wristbands</h3>
                            <p>As low as $0.21</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=figured">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Figured2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Figured Wristbands</h3>
                            <p>As low as $0.18</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                 </div>
                <div class="col-md-3" data-id="1">
                    <a href="<?php get_home_url(); ?>/order-now?style=blank">
                        <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/Wristband_Creation_Blank2-min.jpg'); ">
                        </div>
                        <div class="wristband-desc-holder text-center">
                            <h3 data-fontsize="20" data-lineheight="22">Blank Wristbands</h3>
                            <p>As low as $0.06</p>
                            <btn>Customize
                            <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                        </div>
                    </a>
                </div>
                <!-- LANYARD IMAGES -->
                <div class="row row-home-lanyard">                          
                    <div class="col-md-3" data-id="1">
                        <a href="<?php get_home_url(); ?>/customize-lanyards/?style=Polyester">
                            <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/lanyards-polyester.jpg'); ">
                            </div>
                            <div class="wristband-desc-holder text-center">
                                <h3 data-fontsize="20" data-lineheight="22">Polyester Lanyards</h3>
                                <p>As low as $0.40</p>
                                <btn>Customize
                                <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                            </div>
                        </a>
                    </div>                                 
                    <div class="col-md-3" data-id="1">
                        <a href="<?php get_home_url(); ?>/customize-lanyards/?style=Nylon">
                            <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/lanyards-nylon.jpg'); ">
                            </div>
                            <div class="wristband-desc-holder text-center">
                                <h3 data-fontsize="20" data-lineheight="22">Nylon Lanyards</h3>
                                <p>As low as $0.82</p>
                                <btn>Customize
                                <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                            </div>
                         </a>
                    </div>                              
                    <div class="col-md-3" data-id="1">
                        <a href="<?php get_home_url(); ?>/customize-lanyards/?style=Tubular">
                            <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/lanyards-tubular.jpg'); ">
                            </div>
                            <div class="wristband-desc-holder text-center">
                                <h3 data-fontsize="20" data-lineheight="22">Tubular Lanyards</h3>
                                <p>As low as $0.47</p>
                                <btn>Customize
                                <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                            </div>
                        </a>
                    </div>                      
                    <div class="col-md-3" data-id="1">
                        <a href="<?php get_home_url(); ?>/customize-lanyards/?style=Woven">
                            <div class="wristband-img-holder bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/wc-products-images-optimized/lanyards-woven.jpg'); ">
                            </div>
                            <div class="wristband-desc-holder text-center">
                                <h3 data-fontsize="20" data-lineheight="22">Woven Lanyards</h3>
                                <p>As low as $0.57</p>
                                <btn>Customize
                                <i class="fa fa-caret-right" aria-hidden="true"></i></btn>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END LANYARD IMAGES -->
            </div>
        </div>
    </div>
</div>
<div class="section-content style-choose bg-blue">
    <div class="container">
        <div class="col-md-5 col-wristband-mobile">
            <div class="style-bg bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/wristband-home.png'); "></div>
        </div>
        <div class="col-md-7">
            <div class="style-content">
                <h2>Thousand of Styles to Choose From</h2>
                <p>Choose your own style of placing your message on the wristbands &mdash; debossed, imprinted, deboss-fill, or embossed. We can put your own logo or any of our 200 stock logos in the wristbands. Choose from a thousand different colors to get that perfect color you need. Choose from a list of over 80 different font styles, or provide us with the font you desire.</p>
                <p>Our wristbands are made out of 100% latex-free silicone rubber. We only use premium high quality rubber, so you are rest assured that these wristbands will last. We are proud to be manufacturers of silicone bracelets since 2005, producing tens of millions of wristbands worldwide! We have catered to many of our customers based internationally, such as Canada, United Kingdom, Australia, New Zealand and Ireland.</p>
                <div class="gap-20"></div>
                <a href="<?php echo get_site_url(); ?>/order-now/">Design my wristband <i class="fa fa-caret-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-md-5 col-wristband-desktop">
            <div class="style-bg bg-inline" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/wristband-home.png'); "></div>
        </div>
    </div>
</div>
<div class="section-content section-promotion text-center">
    <div class="container">
        <h2>Practical Ideas for Promotional Needs</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="img-wrap">
                    <img class="img-item" src="<?php echo get_stylesheet_directory_uri(); ?>/images/imgpsh_fullsize-min.png" alt="Assorted Wristbands" width="480" height="142">
                </div>
            </div>
            <div class="col-md-6" style="text-align: left;">
                <p>These wristbands are perfect for fundraising, events, support for causes, and business promotions. You can have these wristbands made for as low as $0.06 each. These rubber bracelets are one of the most practical ideas for promotional needs.</p>
                <p>Start today by calling <span>(800) 403-8050</span> and speak with one of our friendly customer representatives to assist you.</p>
            </div>
        </div>
    </div>
</div>
<div class="section-copy-convert">
    <?php echo do_shortcode('[cp_modal display="inline" id="cp_id_cbc09"][/cp_modal]'); ?>
</div>
<div class="section-content client-section">
    <div class="container">
        <h2>Our Clients</h2>
        <div class="owl-carousel" id="owl-demo">
        <?php if( have_rows('clients_images') ): ?>
            <?php while( have_rows('clients_images') ): the_row(); ?>
                <div class="item">
                    <div class="owl-carousel-img bg-inline" style="background-image: url('<?php the_sub_field('images'); ?>');"></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</div>
<div class="section-content lanyards-section" style="background-color: #f1a000;background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/lanyards-section-img-new.png');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>We Sell Lanyards Too!</h2>
                <span class="copy-block">We just expanded our product line and added lanyards to our list of promotional products you can customize. Perfect for corporate events, seminars, and day to day office use. Put your own company logo or event logo. Your message will definitely stand our with the lanyards.</span>
                <span class="copy-block add-width">Same as the wristbands, choose your own message, color, and font. We also sell them in different materials, such as polyester, tubular, nylon, woven, or dye sumlimation. We also sell the lanyards with ID badges so you can insert a name card or personal information. <a href="<?php echo get_site_url(); ?>/lanyards-product-guide" class="learn-more">Learn More</a></span>
                <!-- <a href="<?php echo get_site_url(); ?>/lanyards-product-guide">Learn More</a> -->
                <a class="start-customize" href="<?php echo get_site_url(); ?>/customize-lanyards">Start Customizing My Lanyards</a>
            </div>
        </div>
    </div>
</div>
<div class="section-content review-bg">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div id="rr_ratings_wrapper" style="float:left;"></div>
                  <!--<script>var rr_rating_widget_setup = {'div':"rr_ratings_wrapper"};</script>
                  <script src="https://widget.resellerratings.com/widget/javascript/review/Wristbandcreation_com.js"></script> -->
                  <!-- <div style="min-height: 100px; overflow: hidden;" class="shopperapproved_widget sa_rotate sa_vertical sa_count1 sa_showdate sa_narrow sa_colorBlack sa_borderBlack sa_bgInherit sa_rounded sa_fixed"></div><script type="text/javascript">var sa_interval = 5000;function saLoadScript(src) { var js = window.document.createElement('script'); js.src = src; js.type = 'text/javascript'; document.getElementsByTagName("head")[0].appendChild(js); } if (typeof(shopper_first) == 'undefined') saLoadScript('//www.shopperapproved.com/widgets/testimonial/13400.js'); shopper_first = true; </script> --><!-- <div style="text-align:right;"><a href="http://www.shopperapproved.com/reviews/wristbandcreation.com/" target="_blank" rel="nofollow" onclick="return sa_openurl(this.href);"><img class="sa_widget_footer" alt="" src="https://www.shopperapproved.com/widgets/widgetfooter-darknarrow.png" style="border: 0;"></a></div>
                        </div> -->
                <div class="item active">
                    <div class="review-content">
                        <div style="min-height: 100px; overflow: hidden; height: auto;" class="shopperapproved_widget sa_rotate sa_vertical sa_count1 sa_showdate sa_narrow sa_colorBlack sa_borderBlack sa_bgInherit sa_rounded sa_fixed"></div><script type="text/javascript">var sa_interval = 5000;function saLoadScript(src) { var js = window.document.createElement('script'); js.src = src; js.type = 'text/javascript'; document.getElementsByTagName("head")[0].appendChild(js); } if (typeof(shopper_first) == 'undefined') saLoadScript('//www.shopperapproved.com/widgets/testimonial/13400.js'); shopper_first = true; </script>
                    </div>
                </div>

                </div>

        <div class="bg-review-holder afterclear">
            <div class="col-md-4 text-left">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bighand1.png" width="284" height="122" alt="">
            </div>
            <div class="col-md-4 text-center approve-img">
                <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/shop-approve.png" width="137" height="49" alt=""> -->
                <a href="http://www.shopperapproved.com/reviews/wristbandcreation.com/" target="_blank" rel="nofollow" onclick="return sa_openurl(this.href);"><img class="sa_widget_footer" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/shop-approve.png" width="137" height="49" style="border: 0;"></a>
            </div>
            <div class="col-md-4 text-right">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bighand2.png" width="284" height="122" alt="">
            </div>
        </div>
    </div>
</div>
<?php 
    endwhile;
    endif; ?>
</div>
<?php //echo do_shortcode('[RICH_REVIEWS_SHOW num="all"]'); ?>
<?php get_footer(); ?>