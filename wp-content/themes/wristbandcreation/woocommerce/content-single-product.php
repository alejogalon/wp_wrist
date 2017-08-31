<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

	 $id =  get_the_ID(); 
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="header-title text-center">
    <h1><?php the_title(); ?> Wristbands</h1>
</div>
<div class="container">
    <section class="section-pad section-product">
          <div class="copy-font-big copy-wristband-par">
            <?php echo get_field('header_description');  ?>
          </div>
        <div class="row">
                <div class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                        <?php
                                              global $product;
                                              $i = 0;
                                             $attachment_ids = $product->get_gallery_attachment_ids(); 
                                             foreach( $attachment_ids as $attachment_id ) 
                        {
                          ?>
                            <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo wp_get_attachment_url( $attachment_id );?>');"></div>
                                </div>
                            </div>
                            <?php $i++; } 
                        ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $i = 0; foreach( $attachment_ids as $attachment_id ) { ?>
                               <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0) ? 'active' : '' ?>">
                               </li>
                            <?php $i++; } ?>
                        </ol>

                    </div>
                     <a href="<?php echo get_site_url().'/order-now/'; ?>" class="btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top">Order Now <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <p class="copy-gap-top copy-font-reg">
                        <?php echo get_the_content(); ?>
                    </p>
                    <ul class="copy-list-no-style list-product-desc copy-font-reg copy-gap-top-2">
                        <li><i class="icon icon-cart"></i>100 Free Wristbands</li>
                        <li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
                        <li><i class="icon icon-deliver"></i>Get Your Wristbands in 3 Days</li>
                    </ul>

                    </div>
                <div class="col-md-6">
                    <?php 
                    	//$price = get_all_price_chart_by_product($id);
                    	$new = new WBC_Size_Manager();
                    	//$price = get_all_price_chart_by_product($id);
                    	// echo "<pre>";
                    	// var_dump(); 
                    	$sizecntr = 0;
                    	$z = 0;
                    	$sizes = $new->get_all_price_chart_by_product($id); 
                    ?>
                    <div>

                    <div class="product product-table">
                        <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
                        <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                      <?php foreach ($sizes as $size => $value) {
                            // var_dump($value);
                            if ($value) {
                      	?>

						<li role="presentation" class="<?php echo ($size === '1/2') ? 'active' : '' ?>"><a href="#val<?php echo $z;?>" aria-controls="val<?php echo $size;?>" role="tab" data-toggle="tab"><?php echo $size;?> inch</a></li>

                      <?php  } $z++; } ?>
                        <!-- <li role="presentation" class="active"><a href="#oneFourth" aria-controls="oneFourth" role="tab" data-toggle="tab">1/4 inch</a></li>
                        <li role="presentation"><a href="#oneHalf" aria-controls="oneHalf" role="tab" data-toggle="tab">1/2 inch</a></li>
                        <li role="presentation"><a href="#threeFourth" aria-controls="threeFourth" role="tab" data-toggle="tab">3/4 inch</a></li>
                        <li role="presentation"><a href="#oneInch" aria-controls="oneInch" role="tab" data-toggle="tab">1 inch</a></li> -->
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      <?php foreach ($sizes as $size => $value) {
                      	# code..
                        if ($value) {
                      	?>
                        <div role="tabpanel" class="tab-pane <?php echo ($size === '1/2') ? 'active' : '' ?>" id="val<?php echo $sizecntr;?>">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <td>Qty</td>
                                            <td>Price</td>
                                        </tr>
                                    </thead>
                                    <?php foreach ($value as $qty => $price) {
                                    ?>
                                    <tr>
                                        <td><?php echo number_format($qty); ?></td>
                                        <td><?php echo number_format($price, 2, '.', '');?></td> 
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <?php } $sizecntr++;	} ?>
                      </div>
                    </div>
                </div>
            </div>
           <div class="section-content content-wristbands">
              <h2 class="content-wristbands-copy copy-proxima-sbold copy-upper">
                About <?php echo the_title(); ?> Wristbands
              </h2>
              <?php echo get_field('product_about_content');  ?>
           </div>
           <div class="order-btn-mobile">
           <a href="<?php echo get_site_url().'/order-now/'; ?>" class="btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top">Order Now <i class="fa fa-caret-right" aria-hidden="true"></i></a>
           </div>
            <div class="row row-other-products">
                <div class="col-md-12">
                    <hr class="hr-line copy-line-gap">

                    <div class="copy-font-reg copy-upper copy-proxima-s-bold copy-spacing">Other Products</div>
                    <ul class="list list-other copy-gap-top">
                    <?php 
                        $title = get_the_title();
                        $type = 'product';
                        $args=array(
                                  'post_type' => $type,
                                  'order'          => 'ASC',
                                  'posts_per_page'   => 10,
                                  'post_status'      => 'publish'
                                  );
                        $my_query = new WP_Query($args);
                                if( $my_query->have_posts() ) {
                                    while ($my_query->have_posts()) : $my_query->the_post();
                                    //background-image: url('<?php echo the_post_thumbnail_url();
                                    $querytitle = get_the_title();

                                    if ($title != $querytitle){
                                        $result = wc_get_product(get_the_ID());
                                  $visibility = get_field('not_visible', $result->id);
                                    // if (get_post()->post_name != 'breast-cancer-product') {
                                    if ($visibility != '1') {
                        ?>
                        <li>
                            <a class="copy-block" href="<?php the_permalink(); ?>">
                               <div class="effects-2" id="effect-5">
                                  <div class="img hover-effect" style="width: 100%;">
                                    <div class="item-wrap">
                                      <div class="item-product" style="background-image: url('<?php echo the_post_thumbnail_url();?>')"></div>
                                    </div>
                                    <!--
                                        <div class="overlay">
                                        <a class="expand" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    </div>
                                    -->
                                  </div>
                                </div>
                            </a>
                            <span class="copy copy-product-desc copy-black copy-proxima-reg copy-block"><?php the_title();?></span>
                        </li>
                                
                    <?php
                                 } } endwhile; }
                                wp_reset_query();            ?>
                    </ul>
                </div>
            </div>
    </section>
</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
