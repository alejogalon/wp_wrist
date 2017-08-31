<!DOCTYPE html>
<?php global $woocommerce; ?>
<html class="<?php echo ( Avada()->settings->get( 'smooth_scrolling' ) ) ? 'no-overflow-y' : ''; ?>" <?php language_attributes(); ?>>
<head>
    <?php if(is_page('lanyards-product-guide')) { ?>
        <script type="text/javascript">
         if(window.location.hash) {
            var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
            window.location.href = window.location.protocol + "//" + window.location.host+"/product/"+hash+"-lanyards/";
            // hash found
          } else {
            // No hash found
            window.location.href = window.location.protocol + "//" + window.location.host+"/product/polyester-lanyards/";
          }
        </script>
    <?php } ?>
    <!-- <meta property="og:url" content="https://wristbandcreation.com" /> -->
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="https://wristbandcreation.com/wp-content/uploads/wristband-home-fb-min.png" />
    <!-- TWITTER -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="<?php echo the_permalink(); ?>">
    <meta name="twitter:title" content="<?php echo the_title(); ?>">
    <meta name="twitter:description" content="<?php echo $excerpt; ?>">
    <meta name="twitter:image" content="https://wristbandcreation.com/wp-content/uploads/wristband-home-fb-min.png">

    <?php if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) ) : ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php endif; ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <?php 
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url,'?style') !== false) { ?>
        <meta name="robots" content="noindex,follow">
    <?php } ?>

    <?php
    if ( ! function_exists( '_wp_render_title_tag' ) ) {
        function avada_render_title() {
        ?>
            <title><?php wp_title( '' ); ?></title>
        <?php
        }
        add_action( 'wp_head', 'avada_render_title' );
    }
    ?>

    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon"/>

    <!--[if lte IE 8]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
    <![endif]-->

    <?php $isiPad = (bool) strpos( $_SERVER['HTTP_USER_AGENT'],'iPad' ); ?>

    <?php
    $viewport = '';
    if ( Avada()->settings->get( 'responsive' ) && $isiPad ) {
        $viewport = '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
    } else if ( Avada()->settings->get( 'responsive' ) ) {
        if ( Avada()->settings->get( 'mobile_zoom' ) ) {
            $viewport .= '<meta name="viewport" content="width=device-width, initial-scale=1" />';
        } else {
            $viewport .= '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
        }
    }

    $viewport = apply_filters( 'avada_viewport_meta', $viewport );
    echo $viewport;
    ?>

    <?php wp_head(); ?>

    <?php

    $object_id = get_queried_object_id();
    $c_pageID  = Avada::c_pageID();
    ?>

    <!--[if lte IE 8]>
    <script type="text/javascript">
    jQuery(document).ready(function() {
    var imgs, i, w;
    var imgs = document.getElementsByTagName( 'img' );
    for( i = 0; i < imgs.length; i++ ) {
        w = imgs[i].getAttribute( 'width' );
        imgs[i].removeAttribute( 'width' );
        imgs[i].removeAttribute( 'height' );
    }
    });
    </script>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/excanvas.js"></script>

    <![endif]-->

    <!--[if lte IE 9]>
    <script type="text/javascript">
    jQuery(document).ready(function() {

    // Combine inline styles for body tag
    jQuery('body').each( function() {
        var combined_styles = '<style type="text/css">';

        jQuery( this ).find( 'style' ).each( function() {
            combined_styles += jQuery(this).html();
            jQuery(this).remove();
        });

        combined_styles += '</style>';

        jQuery( this ).prepend( combined_styles );
    });
    });
    </script>

    <![endif]-->

    <script type="text/javascript">
        var doc = document.documentElement;
        doc.setAttribute('data-useragent', navigator.userAgent);
    </script>

    <?php echo Avada()->settings->get( 'google_analytics' ); ?>

    <?php echo Avada()->settings->get( 'space_head' ); ?>
</head>
<?php
$wrapper_class = '';


if ( is_page_template( 'blank.php' ) ) {
    $wrapper_class  = 'wrapper_blank';
}

if ( 'modern' == Avada()->settings->get( 'mobile_menu_design' ) ) {
    $mobile_logo_pos = strtolower( Avada()->settings->get( 'logo_alignment' ) );
    if ( 'center' == strtolower( Avada()->settings->get( 'logo_alignment' ) ) ) {
        $mobile_logo_pos = 'left';
    }
}

?>
<body <?php body_class(); ?>>

<!-- Load Facebook SDK for JavaScript -->
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
<!-- END SCRIPT -->

    <div class="mobile-menu">
        <div class="container">
            <div class="menu-close">
                <button type="button" class="toggle-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar icon-bar1"></span>
                    <span class="icon-bar icon-bar2"></span>
                    <span class="icon-bar icon-bar3"></span>
                </button>
            </div>
            <div class="navbar-logo-mobile">
                <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                   <!--  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logonew.png" width="317" height="45" alt=""> -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logonew.png" width="317" height="45" alt="Wristband Creation">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse navbar-menu-collapse" id="bs-example-navbar-collapse-1">
                <?php
                 // wp_nav_menu( array( 
                 //    'theme_location' => 'header-nav-menu',
                 //    'container_class'       => 'collapse navbar-collapse navbar-menu-collapse',
                 //    'menu_class' => 'nav navbar-nav navbar-right navbar-main-menu'
                 //        ) ); 
                ?>
                <ul class="nav navbar-nav navbar-right navbar-main-menu">
                    <li>
                        <a href="<?php echo get_site_url(); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url(); ?>/order-now/">Order Now</a>
                    </li>
                    <li id="product-open" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wristbands <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-prod">
                            <?php 
                                $type = 'product';
                                $args=array(
                                  'post_type' => $type,
                                  'order'          => 'ASC',
                                  'posts_per_page'   => 10,
                                  'post_status'      => 'publish'
                                  );

                                $my_query = new WP_Query($args);
                                // echo '<pre>';
                                // var_dump($my_query);
                                if( $my_query->have_posts() ) {
                                  while ($my_query->have_posts()) : $my_query->the_post();
                                  $result = wc_get_product(get_the_ID());
                                  $visibility = get_field('not_visible', $result->id);
                                    // if (get_post()->post_name != 'breast-cancer-product') {
                                    if ($visibility != '1') {
                                   ?>

                                    <li><a href="<?php echo get_permalink(); ?>"><?php the_title();?> Wristbands</a></li>
                                    <?php
                                    }   
                                  endwhile;
                                }
                            ?>
                        </ul>
                    </li>
                    <li id="customize-open" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lanyards <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu">
                            <li><a href="<?php echo get_site_url(); ?>/product/polyester-lanyards/">Polyester Lanyards</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/product/tubular-lanyards/">Tubular Lanyards</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/product/nylon-lanyards/">Nylon Lanyards</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/product/woven-lanyards/">Woven Lanyards</a></li>
                            <li class="copy-lanyard-custom"><a href="<?php echo get_site_url(); ?>/customize-lanyards">Customize My Lanyards <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>
                    <li id="customize-open" class="dropdown menu-desktop-options">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wristband Options <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu">
                            <li><a href="<?php echo get_site_url(); ?>/customize/#colorchart">Color Pantone Chart</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#fonts">Available Fonts</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#logos">Available Logos</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#sizes">Available Sizes</a></li>
                        </ul>
                    </li>
                    <li id="customize-open" class="dropdown menu-mobile-options">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wristband Options <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<!--                         <ul class="dropdown-menu dropdown-menu">
                            <li><a href="<?php echo get_site_url(); ?>/customize/#colorchart">Color Pantone Chart</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#fonts">Available Fonts</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#logos">Available Logos</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#sizes">Available Sizes</a></li>
                        </ul> -->

                        <ul class="dropdown-menu dropdown-menu nav nav-tabs tabs-left" id="mychart"><!-- 'tabs-right' for right tabs -->
                            <li class="active"><a href="#colorchart" data-toggle="tab">Color Pantone Chart</a></li>
                            <li><a href="#fonts" data-toggle="tab">Available Fonts</a></li>
                            <li><a href="#logos" data-toggle="tab">Available Logos</a></li>
                            <li><a href="#sizes" data-toggle="tab">Available Sizes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url(); ?>/frequently-ask-question">FAQ</a>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url(); ?>/contact-us">Contact Us</a>
                    </li>
                </ul>
            </div> 
            <!-- /.navbar-collapse-->
        </div>
    </div>
    <div class="navbar navbar-default navbar-home">
    <nav class="navbar-top">
        <div class="container">
            <div class="nav navbar-nav">
                <p>
                    <i class="fa fa-phone-square" aria-hidden="true"></i>Call (800) 403 - 8050 
                </p>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo get_site_url(); ?>/my-account">Sign In</a>
                </li>
                <li>
                    <a href="<?php echo get_site_url(); ?>/my-account">Register</a>
                </li>
                <li class="active">
                <?php $cart = $_SESSION['wfcart']; ?>
                    <a href="<?php echo get_site_url(); ?>/cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <nav class="navbar-main">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed menu-ipad" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                    <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logonew.png" width="317" height="45" alt=""> -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new-logo2.png" width="272" height="88" alt="Wristband Creation">
                </a>
                <div class="navbar-main-mobile">
                    <div class="copy-toll-mobile">
                        <a href="tel:+18004038050"><span class="copy-call">CALL US <span class="copy-white copy-proxima-bold">(800) 403-8050</span></span></a>
                    </div>
                    <div class="nav navbar-nav">
                        <button type="button" class="navbar-toggle collapsed menu-iphone" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="display: none;">
                        <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="copy-float-right copy-link-mobile">
                            <div class="shopping-basket" style="display: none;">
                                <?php $cart = $_SESSION['wfcart']; ?>
                                <a href="<?php echo get_site_url(); ?>/cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></a>
                            </div>
                            <div class="order-link">
                                <a href="<?php echo get_site_url(); ?>/order-now/">Order Now</a>
                            </div>
                        </div>
                        <div class="navbar-logo-mobile">
                            <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                               <!--  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logonew.png" width="317" height="45" alt=""> -->
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logonew.png" width="317" height="45" alt="Wristband Creation">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse navbar-menu-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right navbar-main-menu">
                    <li id="product-open" class="dropdown">
                        <a href="#" class="dropdown-toggle prod-open" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wristbands <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-prod">
                            <?php 
                                $type = 'product';
                                $args=array(
                                  'post_type' => $type,
                                  'order'          => 'ASC',
                                  'posts_per_page'   => 10,
                                  'post_status'      => 'publish');

                                $my_query = new WP_Query($args);
                                // echo '<pre>';
                                // var_dump($my_query);
                                if( $my_query->have_posts() ) {
                                  while ($my_query->have_posts()) : $my_query->the_post();
                                  $result = wc_get_product(get_the_ID());
                                  $visibility = get_field('not_visible', $result->id);
                                    // if (get_post()->post_name != 'breast-cancer-product') {
                                    if ($visibility != '1') {
                                   ?>
                                    <li>
                                       <div class="box box-nav-img text-center">
                                            <div class="box-nav-img-wrap">
                                            </div>
                                            <p class="copy-par"><?php the_title(); echo $visibility;?> Wristbands</p>
                                            <p class="copy-caption">
                                                <?php echo get_the_content();

                                                ?>
                                            </p>
                                        </div>
                                        <a href="<?php the_permalink();?>"><?php the_title();?> Wristbands</a>
                                    </li>
                                    <?php
                                    }
                                  endwhile;
                                }
                            ?>

                            <li><a href="<?php echo get_site_url(); ?>/order-now/">New! Design your wristband <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>
                    <li id="customize-open" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lanyards <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu">
                            <li><a href="<?php echo get_site_url(); ?>/product/polyester-lanyards/">Polyester Lanyards</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/product/tubular-lanyards/">Tubular Lanyards</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/product/nylon-lanyards/">Nylon Lanyards</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/product/woven-lanyards/">Woven Lanyards</a></li>
                            <li class="copy-lanyard-custom"><a href="<?php echo get_site_url(); ?>/customize-lanyards">Customize My Lanyards <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>

                    <li id="customize-open" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OPTIONS <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu">
                            <li><a href="<?php echo get_site_url(); ?>/customize/#colorchart">Color Pantone Chart</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#fonts">Available Fonts</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#logos">Available Logos</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/customize/#sizes">Available Sizes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url(); ?>/frequently-ask-question/">FAQ</a>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url(); ?>/contact-us">Contact Us</a>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url(); ?>/order-now/" class="btn-orange">Order Now</a>
                    </li>
                </ul>
            </div> 
            <!-- /.navbar-collapse-->
        </nav>
    </div>
</div>
<div id="bodyform" style="overflow:hidden;">
