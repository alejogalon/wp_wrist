<?php 
 //Template Name: Order Now Internal Lead

function getwimg(){
  if($_SERVER[HTTP_HOST] === 'localhost' || $_SERVER[HTTP_HOST] === '192.168.2.165'){
    return '..';
  }
}
get_header();

$isEdit = false;
$isStatus = '';
$metaInfo = false;
$add_color_pantone = add_additional_pantone();
if (isset($_REQUEST['id'])) {
    // $isEdit = isset($_REQUEST['Status']) && $_REQUEST['Status'] == 'edit' ? true : false;

  if(isset($_REQUEST['Status']))
  {
    $isStatus = $_REQUEST['Status'];
  }
    //echo $isStatus;
  $metaInfo = getMetaToAutoSet($_REQUEST['id'], $_REQUEST['Status']);
  if ($metaInfo != false) {
    echo '<input id="EditModeID" name="' . $metaInfo['all'] . '" value="' . $_REQUEST['id'] . '" type="hidden">';
  } else {
    echo '<script>window.location = "' . get_site_url() . '/order-now/";</script>';
  }
  // echo "<pre>";
  //   echo "<pre>";
  // var_dump($metaInfo['all']);
}

?>
<?php require_once(get_stylesheet_directory() . '/wristband/includes/check_mask.php'); ?>
<!-- start of the body -->
<div class="header-mobile">
  <div class="header-title text-center">
      <h1>Order Now</h1>
  </div>
</div>
<div class="chart-mobile">
  <div class="section-price-chart">
    <div class="container p-0">
        <a class="go-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <div id="price-scroll">
          <div id="price_chart" class="">
            <div class="fusion-column-wrapper">
              <p class="copy-font-fourteen copy-upper" id="table_price_name"></p>
              <table id="table_chart" class="table table-bordered">
                <tr>
                  <td>Qty</td>
                </tr>
                <tr>
                  <td>
                    Price $
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
<div id="mobile-element"></div>
<div class="header-desktop">
  <div class="header-title text-center">
      <h1>Order Now</h1>
  </div>
</div>
<input type="hidden" id="prev_color" name="prev_color" value="0">
<input type="hidden" id="forfront" name="forfront" value="0">
<input type="hidden" id="forback" name="forback" value="0">
<input type="hidden" id="forinside" name="forinside" value="0">
<input type="hidden" id="forwrap" name="forwrap" value="0">
<div class="section-order-page" id="section-order-wristband">
    <div class="container p-0">
      <div class="copy-relative">
        <div class="preview-desktop">
          <div id="wdisplay101" class="row row-preview text-center">
        <div id="front-back-text-container" class="row" style="background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;">
          <!-- Segmented Front and Back -->
          <div id="segmentedcolor" class="seg" style="display:none">
            <div class="segd seg-left"></div>
            <div class="segd seg-center"></div>
            <div class="segd seg-right"></div>
          </div>
          <!-- End Segmented Front and Back -->
          <!-- Swirl Front and Back -->
          <div id="swirlcolor" class="col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview" style="background: #707070; position: absolute; width: 100%;"></div>
            <div class="list-swirl second-color col-preview" style="background: #707070;position: absolute; width: 100%;">
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-front" style="height: 60px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-back" style="height: 60px;">
                  </div>
                </div>
            </div>
            <div class="list-swirl third-color col-preview" style="background: #707070; position: absolute; width: 100%">
              <div class="col-md-6">
                  <div class="col-preview col-swirl-two" style="height: 60px;">
                  </div>
                </div>
            </div>
          </div>
          <!-- End Swirl Front and Back -->
          
          <div class="col-md-6 wristbandNoPadding font_circled" style="z-index: 0; overflow: visible;">
            <div id="jQTextFill_fm101" class="col-preview col-front" style="color: rgba(255, 255, 255, 0.2);">
                <div id="segmentedcolor" class="seg_mobile_front" style="display:none">
                    <div class="segd seg-left" style="z-index: -2;"></div>
                    <div class="segd seg-center" style="z-index: -2;"></div>
                    <div class="segd seg-right" style="z-index: -2;"></div>
                </div>
                <h3 id="fm101" class="copy-spacing-1 front-msg-text copy-preview-font copy-display-inline" style="color: rgba(255, 255, 255, 0.2); " ></h3>
            </div>
          </div>
          <div class="col-md-6 wristbandNoPadding back_circled" style="z-index: 0; overflow: visible;">
            <div id="jQTextFill_bm101" class="col-preview col-back" style="color: rgba(255, 255, 255, 0.2);"> 
                <div id="segmentedcolor" class="seg_mobile" style="display:none">
                    <div class="segd seg-left" style="z-index: -2;"></div>
                    <div class="segd seg-center" style="z-index: -2;"></div>
                    <div class="segd seg-right" style="z-index: -2;"></div>
                </div>
                <h3 id="bm101" class="copy-spacing-1 back-msg-text copy-preview-font  copy-display-inline" style="color: rgba(255, 255, 255, 0.2);"></h3>
            </div>
          </div>
          <div class="font_mobil_halfcircled" style="display:none; overflow: hidden;">
                             <div id="swirlcolor" class="box-figured col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview circle-swirl" style="background: #707070; position: absolute; width: 100%;"></div>
            <div class="list-swirl second-color col-preview circle-swirl" style="background: #707070;position: absolute; width: 100%;"></div>
            <div class="list-swirl third-color col-preview circle-swirl " style="background: #707070; position: absolute; width: 100%"></div>
               </div>
          </div>
          <div class="back_mobil_halfcircled" style="display:none; overflow: hidden;">
                             <div id="swirlcolor" class="box-figured col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview circle-swirl" style="background: #707070; position: absolute; width: 100%;"></div>
            <div class="list-swirl second-color col-preview circle-swirl" style="background: #707070;position: absolute; width: 100%;"></div>
            <div class="list-swirl third-color col-preview circle-swirl " style="background: #707070; position: absolute; width: 100%"></div>
               </div>
          </div>
          <div style="display:none !important;background-color:inherit;" class="box-figured-circle ">
          <div id="box_figured" class="box-figured box-figured-box-general" style="background-color:inherit;background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 115px; height: 115px; line-height: 2;">
               <i id="centerclip" class="fa " style="//background-color:inherit; color: rgba(255, 255, 255, 0.2); text-shadow: 0px 0px 0px; font-size: 70px; line-height: 1.6; z-index: 1; position: relative;"></i>
               <div id="swirlcolor" class="box-figured col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview circle-swirl" style="background: #707070; position: absolute; width: 100%;"></div>
            <div class="list-swirl second-color col-preview circle-swirl" style="background: #707070;position: absolute; width: 100%;"></div>
            <div class="list-swirl third-color col-preview circle-swirl " style="background: #707070; position: absolute; width: 100%"></div>
               </div>
          </div>
          </div>
        </div>

        <div id="full-text-container" class="row" style="background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;display:none; position:relative">
          <div id="#segmentedcolor" class="seg" style="display:none">
            <div class="segd seg-left"></div>
            <div class="segd seg-center"></div>
            <div class="segd seg-right"></div>
          </div>
          <!-- Swirl Front and Back -->
          <div id="swirlcolor" class="col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview" style="background: #707070; position: absolute; width: 100%; height: 60px;"></div>
            <div class="list-swirl second-color col-preview" style="background: #707070;position: absolute; width: 100%;">
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-front" style="height: 60px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-back" style="height: 60px;">
                  </div>
                </div>
            </div>
            <div class="list-swirl third-color col-preview" style="background: #707070; position: absolute; width: 100%">
              <div class="col-md-6">
                  <div class="col-preview col-swirl-two" style="height: 60px;">
                  </div>
              </div>
            </div>
          </div>
          <!-- End Swirl Front and Back -->   
          <!-- End Swirl Front and Back -->
          <div class="col-md-12 wristbandNoPadding" style="z-index: 3;">
            <div id="jQTextFill_Cm101" class="col-preview col-full-text" style="color: rgba(255, 255, 255, 0.2);">
                <h3 id="Cm101" class="copy-spacing-1  copy-display-inline full-msg-text copy-preview-font" style="color: rgba(255, 255, 255, 0.2);">
                  <!-- Continuous Message -->
                </h3>
            </div>
          </div>
          <div style="display:none !important;background-color:inherit;" class="box-figured-circle ">
          <div id="box_figured" class="box-figured box-figured-box-general continious_box_figured" style="background-color:inherit;background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 115px; height: 115px; line-height: 2; left: 4%;">
               <i id="centerclip" class="fa " style="background-color:inherit; color: rgba(255, 255, 255, 0.2); text-shadow: 0px 0px 0px; font-size: 70px; line-height: 1.6;"></i>
            <div id="swirlcolor" class="box-figured col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview circle-swirl" style="background: #707070; position: absolute; width: 100%; height: inherit;"></div>
            <div class="list-swirl second-color col-preview circle-swirl" style="background: #707070;position: absolute; width: 100%; height: inherit;"></div>
            <div class="list-swirl third-color col-preview circle-swirl " style="background: #707070; position: absolute; width: 100%; height: inherit;"></div>
            </div>
          </div>
          </div>
        </div>

        <div id="inside-text-container" class="row copy-marg-top" style="background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;">
        <!-- Segmented Inside -->
          <div id="#segmentedcolor" class="seg" style="display:none">
            <div class="segd seg-left"></div>
            <div class="segd seg-center"></div>
            <div class="segd seg-right"></div>
          </div>
        <!-- end Segmented Inside -->
        <!-- Swirl Front and Back -->
          <div id="swirlcolor" class="col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview" style="background: #707070; position: absolute; width: 100%; height: 60px;">
            </div>
            <div class="list-swirl second-color col-preview" style="background: #707070;position: absolute; width: 100%;">
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-front" style="height: 60px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-back" style="height: 60px;">
                  </div>
                </div>
            </div>
            <div class="list-swirl third-color col-preview" style="background: #707070; position: absolute; width: 100%">
              <div class="col-md-6">
                  <div class="col-preview col-swirl-two" style="height: 60px;">
                  </div>
                </div>
            </div>
          </div>
          <!-- End Swirl Front and Back -->        
          <div class="col-md-12 wristbandNoPadding">
            <div id="jQTextFill_Im101" class="col-preview col-inside">
              <div id="InsideStartClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="insidestartclip" class="fa inside-msg-text"></i>
              </div>
                <h3 id="Im101" class="copy-spacing-1 copy-display-inline inside-msg-text copy-preview-font-inside" style="color: rgba(255, 255, 255, 0.2);">
                  <!-- Inside Message -->
                </h3>
              <div id="InsideEndClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="insideendclip" class="fa inside-msg-text"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="note-message">Note: We will email you a more accurate layout of your digital proof for your approval after you place your order.</div>
      </div>
        </div>
        <div class="col-md-3 p-0 col-style" id="order_now_first_step">
            <div class="col-holder">
                <div class="col-title">
                    <h5>Wristband style & Width</h5>
                </div>
                <div class="col-content-holder col-select">
                    <div class="form-group form-style">
                      <!-- Small modal -->
                    <a class="style-button" href="#" data-toggle="modal" data-target="#style_modal">
                      <i class="fa fa-question-circle"></i>
                    </a>

                   <div class="modal fade" id="style_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close btn-main-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <!-- <h4 class="modal-title text-center" id="myModalLabel">(Click Image to See Larger)</h4> -->
                            <h4 class="modal-title text-center" id="myModalLabel">Wristband Style</h4>
                          </div>
                            <div class="wristband--holder afterclear" data-sequence="500">
                            <div class="row">
                                <?php 
                                $type = 'product';
                                $args=array(
                                    'order'          => 'ASC',
                                    'posts_per_page'   => 10,
                                    'post_type' => $type
                                    );

                                    $my_query = new WP_Query($args);
                                        if( $my_query->have_posts() ) {
                                            while ($my_query->have_posts()) : $my_query->the_post();
                                            $sku = $product->get_sku();
                                            // echo "<pre>";
                                            // var_dump($product);
                                            // die();
                                            if ($sku != '') {

                                        $new = new WBC_Size_Manager();
                                        $sizecntr = 0;
                                        $z = 0;
                                        $id = get_the_id();
                                        $price_array = array();
                                        // echo $id;
                                        $sizes = $new->get_all_price_chart_by_product($id); 
                                        // echo "Hello" . $id;
                                        foreach ($sizes as $size => $value) {
                                            if ($value) {
                                                foreach ($value as $qty => $price){
                                                    $price_array[] = $price;
                                                }
                                                // echo $size;
                                            } $z++; }
                                        $lowprice = min($price_array);
                                        if(get_the_title() == 'Debossed'){
                                          $img = 'Wristband_Creation_Debossed2-min.jpg';
                                        }else if(get_the_title() == 'Imprinted'){
                                          $img = 'Wristband_Creation_Imprinted2-min.jpg';
                                        }else if(get_the_title() == 'Deboss-Fill'){
                                          $img = 'Wristband_Creation_Deboss-Fill2-min.jpg';
                                        }else if(get_the_title() == 'Embossed'){
                                          $img = 'Wristband_Creation_Embossed2-min-1.jpg';
                                        }else if(get_the_title() == 'Emboss-Printed'){
                                          $img = 'Wristband_Creation_Emboss_Printed2-min.jpg';
                                        }else if(get_the_title() == 'Dual Layer'){
                                          $img = 'Wristband_Creation_Dual_Layer2-min.jpg';
                                        }else if(get_the_title() == 'Figured'){
                                          $img = 'Wristband_Creation_Figured2-min.jpg';
                                        }else if(get_the_title() == 'Blank'){
                                          $img = 'Wristband_Creation_Blank2-min.jpg';
                                        }else{
                                          $img = 'Wristband_Creation_Debossed2-min.jpg';
                                        }
                                        ?>
                                        <div class="col-md-3" data-id="<?php echo $id; ?>">
                                          <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="<?php echo the_title(); ?>" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/wristband/assets/images/wc-products-images-optimized/' . $img; ?>')">
                                          </a>
                                          <div class="wristband-desc-holder text-center">
                                            <h3><?php the_title(); ?></h3>
                                          </div>
                                        </div>
                                        <!-- <div class="col-md-3" data-id="<?php echo $id; ?>">
                                          <a href="<?php echo the_post_thumbnail_url(); ?>" class="btn-style wristband-img-holder bg-inline" data-lightbox="example-set" data-title="<?php echo the_title(); ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
                                          </a>
                                          <div class="wristband-desc-holder text-center">
                                            <h3><?php the_title(); ?></h3>
                                          </div>
                                        </div> -->
                                        <?php
                                        }
                                        endwhile; }
                                        wp_reset_query();?>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                <!-- </div>
                <div class="col-content-holder col-select">
                    <div class="form-group"> -->
                        <div class="select-button" style="width: 100%; padding-left: 40px;">
                            <i class="select-down"></i>
                            <!-- <select class="form-control" name="select-choice"> -->
                                <!-- <option>Debossed-Filled</option>
                                <option>Debossed-Filled</option>
                                <option>Debossed-Filled</option>
                                <option>Debossed-Filled</option> -->
                                <!-- </select> -->
                            <ul class="list-product_style p-0" style="display: flex;">
                              <?php 
                                $type = 'product';
                                $args=array(
                                  'post_type' => $type,
                                  'showposts' => 8,
                                  'order'     => 'ASC');

                                $my_query = new WP_Query($args);
                                if( $my_query->have_posts() ) {
                                  while ($my_query->have_posts()) : $my_query->the_post();
                                    if(get_the_title() == 'Debossed'){
                                      $img = 'Wristband_Creation_Debossed2-min.jpg';
                                    }else if(get_the_title() == 'Imprinted'){
                                      $img = 'Wristband_Creation_Imprinted2-min.jpg';
                                    }else if(get_the_title() == 'Deboss-Fill'){
                                      $img = 'Wristband_Creation_Deboss-Fill2-min.jpg';
                                    }else if(get_the_title() == 'Embossed'){
                                      $img = 'Wristband_Creation_Embossed2-min-1.jpg';
                                    }else if(get_the_title() == 'Emboss-Printed'){
                                      $img = 'Wristband_Creation_Emboss_Printed2-min.jpg';
                                    }else if(get_the_title() == 'Dual Layer'){
                                      $img = 'Wristband_Creation_Dual_Layer2-min.jpg';
                                    }else if(get_the_title() == 'Figured'){
                                      $img = 'Wristband_Creation_Figured2-min.jpg';
                                    }else if(get_the_title() == 'Blank'){
                                      $img = 'Wristband_Creation_Blank2-min.jpg';
                                    }else{
                                      $img = 'Wristband_Creation_Debossed2-min.jpg';
                                    }  
                                   ?>
                                    <li class="product-style">
                                        <a href="#" data-title="<?php echo the_title(); ?>">
                                          <div class="product-style-wrap">
                                              <div class="product-style-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/wristband/assets/images/wc-products-images-optimized/' . $img; ?>');"></div>
                                          </div>
                                        </a>
                                        <div class="product-style-hover-wrap">
                                          <div class="produt-style-hover-details" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/wristband/assets/images/wc-products-images-optimized/' . $img; ?>');"></div>
                                        </div>
                                        <!-- <a href="<?php //echo the_post_thumbnail_url(); ?>" data-lightbox="new" data-title="<?php //echo the_title(); ?>">
                                          <div class="product-style-wrap">
                                              <div class="product-style-img" style="background-image: url('<?php //echo the_post_thumbnail_url(); ?>');"></div>
                                          </div>
                                        </a>
                                        <div class="product-style-hover-wrap">
                                          <div class="produt-style-hover-details" style="background-image: url('<?php //echo the_post_thumbnail_url(); ?>');"></div>
                                        </div> -->                                        
                                    </li>
                                <?php
                                  endwhile;
                                }
                            ?>
                            </ul>
                            <div class="product-blank">
                                <a href="https://wristbandcreation.com/wp-content/uploads/Wristband_Creation_Blank-min.png" data-lightbox="blank" data-title="<?php echo the_title(); ?>">
                                  <div class="product-style-wrap">
                                    <div class="product-style-img" style="background-image: url('https://wristbandcreation.com/wp-content/uploads/Wristband_Creation_Blank-min.png');"></div>
                                  </div>
                                </a>
                                <div class="product-blank-hover-wrap">
                                  <div class="produt-blank-hover-details" style="background-image: url('https://wristbandcreation.com/wp-content/uploads/Wristband_Creation_Blank-min.png');"></div>
                                </div>
                            </div>
                            <select name="style" id="style" class="input-select form-control">
                            <?php
                                if (isset($GLOBALS['wbc_settings']->products)):
                                    foreach ($GLOBALS['wbc_settings']->products as $product_id => $product):
                                    //  $Stat = "";
                                    // if ($Wrist_Style == $product->product_title){ $Stat = "selected"; } 
                                    
                                      // if ($product->product_title != 'Figured' and $product->product_title != 'Dual Layer' ) {
                                      // if ($product->product_title != 'Dual Layer' ) {
                                      //if ($product->product_title != 'Figured' ) {
                                        # code...
                            ?>
                                    <option value="<?php echo $product_id; ?>" ><?php echo $product->product_title; ?></option>
                            <?php

                                      //} 
                            ?>
                            <?php endforeach;
                                endif;
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-size">
                        <a class="style-button" href="#" data-toggle="modal" data-target="#size_modal">
                          <i class="fa fa-question-circle"></i>
                        </a>
                        <!-- START SIZE MODAL -->
                        <div class="modal fade modal-order-images" id="size_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close btn-main-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">Wristband Size</h4>
                                </div>
                                <div class="wristband--holder afterclear" data-sequence="500">
                                  <div class="row">
                                    <div class="col-md-3" data-id="<?php echo $id; ?>">
                                      <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="1/4 Inch" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/1-4_Inch.jpg')">
                                      </a>
                                      <div class="wristband-desc-holder text-center">
                                          <h3>1/4 Inch</h3>
                                      </div>
                                    </div>
                                    <div class="col-md-3" data-id="<?php echo $id; ?>">
                                      <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="1/2 Inch" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/1-2_Inch.jpg')">
                                      </a>
                                      <div class="wristband-desc-holder text-center">
                                          <h3>1/2 Inch</h3>
                                      </div>
                                    </div>
                                    <div class="col-md-3" data-id="<?php echo $id; ?>">
                                      <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="3/4 Inch" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/3-4_Inch.jpg')">
                                      </a>
                                      <div class="wristband-desc-holder text-center">
                                          <h3>3/4 Inch</h3>
                                      </div>
                                    </div>
                                    <div class="col-md-3" data-id="<?php echo $id; ?>">
                                      <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="1 Inch" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/1_Inch.jpg')">
                                      </a>
                                      <div class="wristband-desc-holder text-center">
                                          <h3>1 Inch</h3>
                                      </div>
                                    </div>
                                    <div class="col-md-3" data-id="<?php echo $id; ?>">
                                      <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="1.5 Inch" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/1.5_Inch.jpg')">
                                      </a>
                                      <div class="wristband-desc-holder text-center">
                                          <h3>1.5 Inch</h3>
                                      </div>
                                    </div>
                                    <div class="col-md-3" data-id="<?php echo $id; ?>">
                                      <a href="#" class="btn-style wristband-img-holder bg-inline" data-title="2 Inch" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/2_inch.jpg')">
                                      </a>
                                      <div class="wristband-desc-holder text-center">
                                          <h3>2 Inch</h3>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SIZE MODAL -->
                        <div class="select-button">
                            <i class="select-down"></i>
                            <select name="width" id="width" class="input-select enable-if-style-selected form-control" disabled> inch</select>
                            <input type="hidden" id="selected_wristband" data-style="<?php echo $metaInfo['style']; ?>" data-size="<?php echo $metaInfo['size']; ?>" data-color="" data-colorstyle="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-holder">
                <div class="col-title">
                    <h5>Color & Quantity</h5>
                </div>
                <div class="col-content-holder col-select">
                    <div id="wristband-color-tab" class="fusion-tabs classic horizontal-tabs">
                <div class="nav">
                  <ul id="wbcolor">
                    <?php $flag = true;
                    foreach ($GLOBALS['wbc_settings']->color_style as $style => $data): ?>
                    <li class="<?php echo $flag ? 'active' : ''; ?>">
                      <a class="tab-link" id="<?php echo sanitize_title($style); ?>" href="#tab-<?php echo sanitize_title($style); ?>"
                       data-toggle="tab">
                       <div class="radio" id="radio_<?php echo sanitize_title($style); ?>" >
                        
                          <center>
                            <input type="radio" id="color_style" name="color_style" class="color_style" value="<?php echo esc_attr($style); ?>"
                            <?php echo $flag ? 'checked' : ''; ?>/>
                            <label><?php echo esc_attr($style); ?></label>
                          </center>
                          
                        </div>
                      </a>
                    </li>
                    <?php $flag = false;
                    endforeach; ?>
                  </ul>
                </div>

                <div class="tab-content" id="wristband-color-items">
                  <div id="wristband-color-name">
                  </div>
                  <?php $flag = true;
                  $x = 0;
                  foreach ($GLOBALS['wbc_settings']->color_style as $style => $data): ?>

                  <div class="tab-pane fade <?php echo $flag ? 'active in' : ''; ?>" id="tab-<?php echo sanitize_title($style); ?>">
                    <ul id="wristband-bg-color" style="float: left;">
                      <div id="display-pantone" class="color-pantone">
                          <!-- Button trigger modal -->
                          <!-- <button type="button" class="btn btn-primary btn-lg btn-custom-color" data-toggle="modal" data-target="#modal-color-pantone"> -->
                          <span class="copy-tooltip-new tooltip-custom">Custom Color</span>
                          <button type="button" class="btn btn-primary btn-lg btn-custom-color" id="custom_wristband_color">
                            <img class="color-enabled" src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/color-pantone.png" width="30" height="30" alt="">
                          </button>
                      </div>
                      <?php foreach ($data->color_list as $i => $color_list): ?>
                        <li  class="color-enabled">
                        <span class="copy-tooltip-new"><?php echo $color_list->name; ?></span>
                        <?php
                        $Selected = "color-wrap";
                        foreach ($color_list as $key => $list):
                         if (strpos($key, 'color_') === false || empty($customization_locationlist))
                           continue;
                         if (isset($WristColor)) {
                           if ($list == $WristColor) {
                             $Selected = 'color-wrap selected';
                           }
                         }
                         endforeach;
                         ?>

                         <div id="colorStyleBox" title= "<?php echo $style; ?>" class="color-box <?php echo $Selected; ?>">
                          <?php
                          $colorx = array();
                          foreach ($color_list as $key => $list):
                            if (strpos($key, 'color_') === false || empty($list))
                              continue;
                            $colorx[] = $list
                            ?>
                          <?php endforeach; ?>


                          <div data-name="<?php echo $color_list->name; ?>" data-color="<?php echo implode(',', $colorx); ?>" style="background-color: <?php echo implode(',', $colorx); ?>;
                           background: -webkit-linear-gradient(90deg,<?php echo implode(',', $colorx); ?>); /* For Safari 5.1 to 6.0 */
                           background: -o-linear-gradient(90deg,<?php echo implode(',', $colorx); ?>); /* For Opera 11.1 to 12.0 */
                           background: -moz-linear-gradient(90deg,<?php echo implode(',', $colorx); ?>); /* For Firefox 3.6 to 15 */
                           background: linear-gradient(90deg,<?php echo implode(',', $colorx); ?>); /* Standard syntax */
                           height: 100%;
                           ">
                            
                         </div>


                       </div>
                     </li>
                     <?php $flag = false;
                     endforeach; ?>
                   </ul>
                      <!-- <?php if ($style=='Segmented'){ ?><div style="float:left;padding-left: 20px; font-size: 15px;"><input type="checkbox" id="segmented_color_invert" >Switch front and back colors</div><?php } ?> -->
                 </div>

                 <?php $x++;
                 endforeach; ?>

               </div>
             </div>
                    <div class="col-color">
                        <div class="form-group">
                            <label class="" id="selectTextColorLabel" style="display:none"></label>
                            <div id="wristband-text-color">
                              <ul></ul>
                            </div>
                        </div>
                    </div>
                    <div id="notify-customization"></div>
                      <div id="quantity_group_field" class="col-color">
                        <h4>Quantity</h4>
                        <!-- <label class="form-group-heading CssTitleBlack" >Input Quantity <span>(Side View Guide)</span></label> -->
                        <p class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                          <!-- <label class="form-group-heading CssTitleBlack" for="qty_adult">Adult</label> -->
                          <input type="number" pattern="[0-9]*" name="qty_adult" id="qty_adult" min="0" class="input-text form-control" style="padding: 0; text-align: center;">
                          <label class="" for="qty_adult">Adult</label>
                        </p>
                        <p class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                          <!-- <label class="form-group-heading CssTitleBlack" for="qty_medium">Medium</label> -->
                          <input type="number" pattern="[0-9]*" name="qty_medium" id="qty_medium"  min="0" class="input-text form-control" style="padding: 0; text-align: center;">
                          <label class="" for="qty_medium">Medium</label>
                        </p>
                        <p class="form-row form-row-last fusion-one-fourth one_third fusion-layout-column fusion-column-last fusion-spacing-yes">
                          <!-- <label class="form-group-heading CssTitleBlack" for="qty_youth">Youth</label> -->
                          <input type="number" pattern="[0-9]*" name="qty_youth" id="qty_youth"  min="0" class="input-text " style="padding: 0; text-align: center;">
                          <label class="" for="qty_youth">Youth</label>
                        </p>
                        <p id="quantity_group_field_button" class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                          <br>
                          <!-- <a class="TempAddCss" target="_blank" href="#" id="add_color_to_selections"><span class="fusion-button-text">Add</span></a> -->
                          <button id="add_color_to_selections" href="#" class="changetolink">
                            <span class="fusion-button-text-left btn-blue">Add</span>
                          </button> 
                        </p>                    
                        <div class="clear"></div>

                      </div>
                </div>

                <!-- END COL HOLDER -->
                <div class="box-additional">
                  <div class="col-title">
                    <label for="additional_notes"  class="form-group-heading CssTitleBlack"><h5>Additional Notes</h5></label>
                  </div>
                  <div class="col-content-holder col-select">
                    <div class="form-group">
                      <p class="form-row form-row-wide" style="margin-bottom: 0;">
                        <div class="form-group">
                          <textarea class="input-text form-control" name="additional_notes" id="additional_notes" cols="30" rows="5"><?php echo $metaInfo['AddNotes_msg']; ?></textarea>
                        </div>
                      </p>
                    </div>
                  </div> 
                </div>
                <div class="box-lead-info">
                  <div class="col-title">
                    <label for="additional_notes"  class="form-group-heading CssTitleBlack"><h5>General Information</h5></label>
                  </div>
                  <div class="col-content-holder col-select">
                      <div class="form-row">
                        <div class="form-group">
                          <input type="text" class="form-control" id="FirstName" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="LastName" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="CompName" placeholder="Company">
                        </div>
                        <div class="form-group">
                          <input type="number" class="form-control" id="ContactNum" placeholder="Contact Number">
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" id="EmailAdd" placeholder="Email" required>
                        </div>
                        <div class="form-group copy-relative">
                          <select class="form-control">
                            <option>WristbandCreation</option>
                            <option>Kulayful</option>
                            <option>Promotionalbands</option>
                            <option>Speedywristbands</option>
                          </select>
                          <span class="dd-pointer dd-pointer-down"></span>
                        </div>
                      </div>
                  </div> 
                </div>

            </div>
        </div>
        <!-- SUMMARY MOBILE -->
        <!-- END SUMMARY MOBILE -->
        <div class="preview-mobile" style="clear: both;">
          <div id="wdisplay101" class="row row-preview text-center">
        <div id="front-back-text-container" class="row" style="background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;">
          <!-- Segmented Front and Back -->
          <div id="segmentedcolor" class="seg" style="display:none">
            <div class="segd seg-left"></div>
            <div class="segd seg-center"></div>
            <div class="segd seg-right"></div>
          </div>
          <!-- End Segmented Front and Back -->
          <!-- Swirl Front and Back -->
          <div id="swirlcolor" class="col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview" style="background: #707070; position: absolute; width: 100%;">
            </div>
            <div class="list-swirl second-color col-preview" style="background: #707070;position: absolute; width: 100%;">
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-front" style="height: 60px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-back" style="height: 60px;">
                  </div>
                </div>
            </div>
            <div class="list-swirl third-color col-preview" style="background: #707070; position: absolute; width: 100%">
              <div class="col-md-6">
                  <div class="col-preview col-swirl-two" style="height: 60px;">
                  </div>
                </div>
            </div>
          </div>
          <!-- End Swirl Front and Back -->
          <div class="col-md-6 wristbandNoPadding">
            <div class="col-preview col-front" style="font-size: 30px; color: rgba(255, 255, 255, 0.2);">
              <div id="FrontStartClipArt101" class="copy-preview-clipart copy-display-inline ">
                <i id="frontstartclip" class="fa front-msg-text"></i>
              </div>
                <h3 id="fm101" class="copy-spacing-1 front-msg-text copy-preview-font copy-display-inline" style="color: rgba(255, 255, 255, 0.2)">
                  <!-- Front Message --> 
                </h3>
              <div id="FrontEndClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="frontendclip" class="fa front-msg-text"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 wristbandNoPadding">
            <div class="col-preview col-back" style="font-size: 24px; color: rgba(255, 255, 255, 0.2);"> 
              <div id="BackStartClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="backstartclip" class="fa back-msg-text"></i>
              </div>
                <h3 id="bm101" class="copy-spacing-1 back-msg-text copy-preview-font copy-display-inline" style="color: rgba(255, 255, 255, 0.2);">
                  <!-- Back Message -->
                </h3>
              <div id="BackEndClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="backendclip" class="fa back-msg-text"></i>
              </div>
            </div>
          </div>
        </div>

        <div id="full-text-container" class="row" style="background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;display:none; position:relative">
          <div id="#segmentedcolor" class="seg" style="display:none">
            <div class="segd seg-left"></div>
            <div class="segd seg-center"></div>
            <div class="segd seg-right"></div>
          </div>
          <!-- Swirl Front and Back -->
          <div id="swirlcolor" class="col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview" style="background: #707070; position: absolute; width: 100%; height: 60px;"></div>
            <div class="list-swirl second-color col-preview" style="background: #707070;position: absolute; width: 100%;">
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-front" style="height: 60px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-back" style="height: 60px;">
                  </div>
                </div>
            </div>
            <div class="list-swirl third-color col-preview" style="background: #707070; position: absolute; width: 100%">
              <div class="col-md-6">
                  <div class="col-preview col-swirl-two" style="height: 60px;">
                  </div>
                </div>
            </div>
          </div>
          <!-- End Swirl Front and Back -->   
          <!-- End Swirl Front and Back -->
          <div class="col-md-12 wristbandNoPadding">
            <div class="col-preview col-inside">
              <div id="FullStartClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="wrapstartclip" class="fa full-msg-text"></i>
              </div>
                <h3 id="Cm101" class="copy-spacing-1 copy-display-inline full-msg-text copy-preview-font" style="color: rgba(255, 255, 255, 0.2);">
                  <!-- Continuous Message -->
                </h3>
              <div id="FullEndClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="wrapendclip" class="fa full-msg-text"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- FIGURED ROW -->

      <div id="figured-container" class="row copy-marg-top row-figured" style="display:none; background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;">
          <!-- Segmented Front and Back -->
          <div id="segmentedcolor" class="seg" style="display:none">
            <div class="segd fig-left" style="position: absolute;"></div>
            <div class="segd fig-center" style="position: absolute;"></div>
            <div class="segd fig-right" style="position: absolute;"></div>
          </div>
          <!-- End Segmented Front and Back -->
          <div class="col-md-12">
            <div class="col-preview">
            </div>
            <div id="box_figured" class="box-figured" style="background: #707070;">
               <i id="centerclip" class="fa " style="color: rgba(255, 255, 255, 0.2); text-shadow: 0px 0px 0px;"></i>
            </div>
          </div>
       </div>

      <!-- END FIGURED ROW -->

        <div id="inside-text-container" class="row copy-marg-top" style="background-color: #707070; box-shadow: 0 0 2px 0 #707070; background-repeat: no-repeat; background-size: cover; font-family: Arial;">      
        <!-- Segmented Inside -->
          <div id="#segmentedcolor" class="seg" style="display:none">
            <div class="segd seg-left"></div>
            <div class="segd seg-center"></div>
            <div class="segd seg-right"></div>
          </div>
        <!-- end Segmented Inside -->
        <!-- Swirl Front and Back -->
          <div id="swirlcolor" class="col-swirl swirlcolor" style="display:none">
            <div class="list-swirl first-color col-preview" style="background: #707070; position: absolute; width: 100%; height: 60px;">
            </div>
            <div class="list-swirl second-color col-preview" style="background: #707070;position: absolute; width: 100%;">
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-front" style="height: 60px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-preview col-swirl-two col-swirl-back" style="height: 60px;">
                  </div>
                </div>
            </div>
            <div class="list-swirl third-color col-preview" style="background: #707070; position: absolute; width: 100%">
              <div class="col-md-6">
                  <div class="col-preview col-swirl-two" style="height: 60px;">
                  </div>
                </div>
            </div>
          </div>
          <!-- End Swirl Front and Back -->        
          <div class="col-md-12 wristbandNoPadding">
            <div  id="jQTextFill_Im101" class="col-preview col-inside">
              <div id="InsideStartClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="insidestartclip" class="fa inside-msg-text"></i>
              </div>
                <h3 id="Im101" class="copy-spacing-1 copy-display-inline inside-msg-text copy-preview-font-inside" style="color: rgba(255, 255, 255, 0.2);">
                  <!-- Inside Message -->
                </h3>
              <div id="InsideEndClipArt101" class="copy-preview-clipart copy-display-inline">
                <i id="insideendclip" class="fa inside-msg-text"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
        <div class="col-md-6" style="display: none;">
            <div class="wristband-view col-wristband text-center">
            <input type="hidden" name="wbsize" value="2">
            <input type="hidden" name="fbfront" value="0">
            <input type="hidden" name="fbback" value="0">
            <input type="hidden" name="textcount" value="0">
            <input type="hidden" name="textcount2" value="0">
            <input type="hidden" name="textinside" value="0">
            <input type="hidden" name="isWrapCont" value="0">
            <input type="hidden" name="isWrapInside" value="0">
            <input type="hidden" name="frontPaste" value="0">
            <input type="hidden" name="backPaste" value="0">
            <input type="hidden" name="wrapPaste" value="0">
            <input type="hidden" name="insidePaste" value="0">
            <input type="hidden" name="lengthAdjustFlagBand1" value="0">
            <input type="hidden" name="lengthAdjustFlagBand2" value="0">
            <div id="ifrontcontend" style="display:none"></div>
            <div class="wbdiv">
                <div class="wristband-holder">
                    <div class="view-title">
                        <h3>Front View</h3>
                    </div>
                    <div class="view-img">
                        <!-- <img src="images/wristband.png" alt=""> -->
                        <svg id="svgelement" viewBox="0 0 300 113" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <defs>
                            <path id="ContainerPath" fill-opacity="0" d="M0 0 q 80 -18 444 -2"/>
                            <path id="MyPath1" fill-opacity="0" d="M15 75 q 125 23 270 -2"/>
                            <path id="MyPath2" fill-opacity="0" d="M15 75 q 125 23 270 -2"/>
                            <path id="MyPathCont1" fill-opacity="0" d="M15 78 q 125 23 280 -4"/>
                            <path id="MyPathCont2" fill-opacity="0" d="M8 77 q 130 25 280 -2"/>
                            <path id="MyPathInside1" fill-opacity="0" d="M15 60 q 80 -18 270 -1.5"/>
                            <path id="MyPathInside2" fill-opacity="0" d="M15 60 q 80 -18 270 -1.5"/>
                            <path id="InsideArc" fill-opacity="0" d="M15 68 q 125 15 270 -2"/>

                            <filter id="blurSideShadow" x="-20" y="-20" width="200" height="200">
                              <feGaussianBlur in="SourceAlpha" stdDeviation="20" />
                            </filter>
                          </defs></svg>
                          <rect id="bandcolor" height="100%" width="100%" style="fill: gray" />
                          <?php echo $segcolor1_band1 . $segcolor2_band1; ?>
                          <?php echo $mask_inside_band1; ?>
                          <?php // $mask1_inside;  ?>            
                          <?php echo $mask2_inside_band1 . $mask1_inside_band1; ?>           
                          <text id="bandtextinside1" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;">
                            <textPath id="bandtextpathinside1" xlink:href="#MyPathInside1" startOffset="0%">
                              <tspan id="front-startinside1" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-textinside1" dominant-baseline="middle"></tspan>
                              <tspan id="front-endinside1" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>
                          <?php echo $mask_outside_band1; ?>
                          <?php // echo $mask1;   ?>            
                          <?php echo $mask2_band1 . $mask1_band1; ?>
                          <?php echo $segcolor1_cover_band1 . $segcolor2_cover_band1; ?>            
                          <?php echo $segcolor3_band1; ?>            
                          <text id="bandtext1" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;">
                            <textPath id="bandtextpath1" xlink:href="#MyPath1" startOffset="50%">
                              <tspan id="front-start1" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-text1" dominant-baseline="middle"></tspan>
                              <tspan id="front-end1" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>
                          <text id="bandtextcont1" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;"  display="none">
                            <textPath id="bandtextpathcont1" xlink:href="#MyPathCont1" startOffset="0%">
                              <tspan id="front-startcont1" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-textcont1" dominant-baseline="middle"></tspan>
                              <tspan id="front-endcont1" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>

                          <rect x="0" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
                          <rect x="275" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
                          <!-- <image  id="img1_1" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/1.png" display="none"/>
                          <image  id="img1_1_2" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/1_2.png" display="none"/>
                          <image  id="img1_3_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/3_4.png" />
                          <image  id="img1_1_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/1_4.png" display="none"/>
                          <image  id="no_arc_img1_1" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_1.png" display="none"/>
                          <image  id="no_arc_img1_1_2" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_1_2.png" display="none"/>
                          <image  id="no_arc_img1_3_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_3_4.png" />
                          <image  id="no_arc_img1_1_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_1_4.png" display="none"/> -->
                          <use id="arc1" xlink:href="#InsideArc" stroke-dasharray="5, 5" stroke="black" display="none"/>
                          <!--<use xlink:href="#MyPathCont1" fill="none" stroke="blue"  />-->
                          <!--<use xlink:href="#MyPathInside1" fill="none" stroke="green"  />-->
                          <?php echo $glow1; ?>
                            <!-- <text x="3" y="16" style="fill: white; stroke: White; stroke-width: 3">FRONT VIEW</text>
                              <text x="3" y="16" style="fill: black; stroke: Black; stroke-width: 1">FRONT VIEW</text> -->
                            <!-- <text id="frontw" text-anchor="middle" x="150" y="12" style="fill: white; stroke: White; stroke-width: 0.5">FRONT VIEW</text>
                            <text id="frontb" text-anchor="middle" x="150" y="12" style="fill: black; stroke: Black; stroke-width: 0.5">FRONT VIEW</text> -->
                            <rect width="100%" height="100%" style="stroke:white;stroke-width:2;fill-opacity:0;" />

                        </svg>
                    </div>
                </div>
                <div class="wristband-holder">
                    <div class="view-title">
                        <h3>Back View</h3>
                    </div>
                    <div class="view-img">
                        <!-- <img src="images/wristband.png" alt=""> -->
                        <svg id="svgelement2" viewBox="0 0 300 113" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <rect id="bandcolor2" height="100%" width="100%" style="fill: gray" />
                          <?php echo $mask_inside_band2; ?>
                          <?php echo $mask2_inside_band2 . $mask1_inside_band2; ?>
                          <?php echo $segcolor1_band2 . $segcolor2_band2; ?>
                          <?php echo $segcolor3_band2; ?>
                          <text id="bandtextinside2" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;">
                            <textPath id="bandtextpathinside2" xlink:href="#MyPathInside2" startOffset="0%">
                              <tspan id="front-startinside2" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-textinside2" dominant-baseline="middle"></tspan>
                              <tspan id="front-endinside2" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>
                          <?php echo $mask_outside_band2; ?>
                          <?php echo $mask2_band2 . $mask1_band2; ?>
                          <?php echo $segcolor1_cover_band2 . $segcolor2_cover_band2; ?>               
                          <text id="bandtext2" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;">
                            <textPath id="bandtextpath2" xlink:href="#MyPath2" startOffset="50%">
                              <tspan id="front-start2" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-text2" dominant-baseline="middle"></tspan>
                              <tspan id="front-end2" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>
                          <text id="bandtextcont2" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;" display="none">
                            <textPath id="bandtextpathcont2" xlink:href="#MyPathCont2" startOffset="0%">
                              <tspan id="front-startcont2" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-textcont2" dominant-baseline="middle"></tspan>
                              <!--<tspan id="front-endcont2" class="fa" dominant-baseline="middle">&#xf096;</tspan>-->
                              <tspan id="front-endcont2" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>

                          <text id="bandtextcontainer" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;">
                            <textPath id="bandtextpathcontainer" xlink:href="#ContainerPath" startOffset="0%">
                              <tspan id="front-startcontainer" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-textcontainer" dominant-baseline="middle"></tspan>
                              <tspan id="front-endcontainer" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>            
                          <text id="bandtextcontainer2" fill="#9d1d20" style="font-family: Arial; font-size: 30px; fill: #999999; opacity: 0.6;">
                            <textPath id="bandtextpathcontainer2" xlink:href="#ContainerPath" startOffset="0%">
                              <tspan id="front-startcontainer2" class="fa" dominant-baseline="middle"></tspan>
                              <tspan id="front-textcontainer2" dominant-baseline="middle"></tspan>
                              <tspan id="front-endcontainer2" class="fa" dominant-baseline="middle"></tspan>
                            </textPath>
                          </text>
                          <rect x="0" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
                          <rect x="275" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
                          <!-- <image  id="img2_1" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/1.png" display="none"/>
                            <image  id="img2_1_2" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/1_2.png" display="none"/>
                            <image  id="img2_3_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/3_4.png" />
                            <image  id="img2_1_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/1_4.png" display="none"/>
                            <image  id="no_arc_img2_1" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_1.png" display="none"/>
                            <image  id="no_arc_img2_1_2" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_1_2.png" display="none"/>
                            <image  id="no_arc_img2_3_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_3_4.png" />
                            <image  id="no_arc_img2_1_4" height="100%" width="100%" xlink:href="<?php echo getwimg();?>/wp-content/themes/wristbandcreation/wristband/assets/images/new/no_arc_1_4.png" display="none"/> -->
                            <use id="arc2" xlink:href="#InsideArc" stroke-dasharray="5, 5" stroke="black" display="none"/>
                            <!--<use xlink:href="#MyPath2" fill="none" stroke="red"  />-->
                            <!--<use xlink:href="#MyPathCont2" fill="none" stroke="blue"  />-->
                            <!--<use xlink:href="#MyPathInside2" fill="none" stroke="green"  />-->
                            <?php echo $glow2; ?>
                                <!-- <text x="3" y="16" style="fill: white; stroke: White; stroke-width: 3">BACK VIEW</text>
                                <text x="3" y="16" style="fill: black; stroke: Black; stroke-width: 1">BACK VIEW</text> -->
                                <!-- <text id="backw" text-anchor="middle" x="150" y="12" style="fill: white; stroke: White; stroke-width: 0.5">BACK VIEW</text>
                                <text id="backb" text-anchor="middle" x="150" y="12" style="fill: black; stroke: Black; stroke-width: 0.5">BACK VIEW</text> -->
                                <rect width="100%" height="100%" style="stroke:white;stroke-width:2;fill-opacity:0;">
                        </svg>
                    </div>
                </div>
                </div>
                <div class="note-content">
                    <p>Note: We will email you a more accurate layout of your digital proof for your
                        approval after you place your order.</p>
                </div>
            </div>
        </div>

          <div class="col-md-6 col-preview-message">
            <div class="col-wristband">
                <div class="message-select-desktop">
                  <div class="col-message-select">
                    <div class="col-title">
                      <h5>Message Style & Clipart</h5>
                    </div>
                    <div class="form-group form-message-style">
                            <div class="radio">
                                    <label>
                                      <div class="option-help copy-float-right">
                                        <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
                                          <div class="options-hover hover-clean" style="display: none;">
                                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            <div class="options-desc">
                                                <p>Have your message on two opposite sides of the outer part of the wristband. Back message is optional. Each side has a maximum of 40 characters</p>
                                            </div>
                                          </div>
                                      </div>
                                      <input type="radio" name="message_type" value="front_and_back" <?php echo isset($metaInfo['wristband_stat']) ? ($metaInfo['wristband_stat'] == 'front_and_back' ? 'checked' : '') : 'checked'; ?> />Front & Back Message
                                    </label>
                            </div>
                            <div class="radio" style="padding-right: 1em;">
                                    <label>
                                      <div class="option-help copy-float-right">
                                        <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
                                          <div class="options-hover hover-clean" style="display: none;">
                                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            <div class="options-desc">
                                                <p>Have your message continuously wrap around the entire circumference of the wristband. Perfect for long messages up to 80 characters long.</p>
                                            </div>
                                          </div>
                                      </div>
                                      <input type="radio" name="message_type" value="continues" <?php echo $metaInfo['wristband_stat'] == 'continues' ? 'checked' : ''; ?> />Continuous Message
                                    </label>
                            </div>
                    </div>
                </div>
                </div>
                <div class="col-content-holder col-wrist-details" style="padding-bottom: 0;">
                    <form class="form-horizontal">                        
                    <?php if (isset($GLOBALS['wbc_settings']->tool_tip_text)):
                        $tooltip = $GLOBALS['wbc_settings']->tool_tip_text;
                    ?>
                    <div id="ForFrontBackID">
                        <div class="form-row form-row-wide hide-if-message_type-continues">
                            <div class="form-group">
                                <label for="front_message" class="col-sm-4 control-label p-0">Front Message
                                <i class="fa fa-question-circle" aria-hidden="true">
                                  <span class="copy-tooltip"><?php echo $tooltip->front; ?></span>
                                </i>
                                </label>
                                <div class="col-sm-8 p-0">
                                <input maxlength="44" type="text" id="front_message" name="front_message" class="input-text trigger-limit-char form-control" data-limit="<?php echo WBC_MESSAGE_CHAR_LIMIT; ?>" value="<?php echo $metaInfo['Front_msg']; ?>" >
                                <div id="fwarning-msg"></div>
                                </div>
                            </div>  
                        </div>
                        <div class="form-row form-row-wide hide-if-message_type-continues">
                            <div class="form-group">
                                <label for="back_message" class="col-sm-4 control-label p-0">Back Message <i class="fa fa-question-circle" aria-hidden="true">
                                  <span class="copy-tooltip"><?php echo $tooltip->back; ?></span>
                                </i></label>
                                <div class="col-sm-8 p-0">
                                    <!-- <input type="text" class="form-control"> -->
                                    <input maxlength="44" type="text" id="back_message" name="back_message"  class="input-text trigger-limit-char form-control" data-limit="<?php echo WBC_MESSAGE_CHAR_LIMIT; ?>" value="<?php echo $metaInfo['Back_msg']; ?>" />
                                      <div id="bwarning-msg"></div>
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                    <div id="ForContiID">
                        <div class="form-row form-row-wide hide-if-message_type-front_and_back">                            
                            <div class="form-group">
                                    <label for="continues_message" class="col-sm-4 control-label p-0">Continuous Message<i class="fa fa-question-circle" aria-hidden="true">
                                      <span class="copy-tooltip"><?php echo $tooltip->wrap_around; ?></span>
                                    </i></label>
                                    <div class="col-sm-8 p-0">
                                        <input maxlength="88" type="text" id="continues_message" name="continues_message" class="input-text trigger-limit-char form-control" data-limit="<?php echo WBC_MESSAGE_CHAR_LIMIT; ?>" value="<?php echo $metaInfo['Wrap_msg']; ?>" />
                                        <div id="cwarning-msg"></div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row form-row-wide form-inside">
                        <div class="form-group">
                            <label for="inside_message" class="col-sm-4 control-label p-0">Inside Message <i class="fa fa-question-circle" aria-hidden="true">
                              <span class="copy-tooltip"><?php echo $tooltip->inside; ?></span>
                            </i></label>
                            <div class="col-sm-8 p-0">
                                <input maxlength="88" type="text" id="inside_message" name="inside_message" class="input-text trigger-limit-char form-control" data-limit="<?php echo WBC_MESSAGE_CHAR_LIMIT; ?>" value="<?php echo $metaInfo['Inside_msg']; ?>" />
                                <div id="iwarning-msg"></div>
                            </div>
                        </div>                   
                    </div>
                    <?php endif; ?>
                        <div class="form-group">
                            <label for="" class="col-sm-4 control-label p-0">Font</label>
                            <div class="col-sm-8 p-0">
                                <div class="select-button">
                                    <div class="dropdown form-control">

                                    <?php if (isset($metaInfo['FontStyle'])) {
                                        echo '<input value="'.$metaInfo['FontStyle'].'" id="selectFont" READONLY type="text" name="selectFont" class="caretfont selectFont input-select" style="font-family:'.$metaInfo['FontStyle'].'" >';
                                     }else{ ?>
                                    <input value="Arial" id="selectFont" type="text" name="selectFont" READONLY class="caretfont input-select selectFont" style="font-family: Arial" >
                                    <?php } ?>

                                    <span class="dd-pointer dd-pointer-down"></span></input>
                                    <div id="fontID" class="dropdown-menu font-dropdown fadeFont">
                                      <ul class="font-class">
                                       <?php if (isset($GLOBALS['wbc_settings']->fonts)):
                                       usort($GLOBALS['wbc_settings']->fonts, 'strnatcasecmp');
                                       foreach ($GLOBALS['wbc_settings']->fonts as $font):
                                        $newlabel = change_font_to_label(esc_attr($font));
                                      ?>
                                      <li>
                                        <div class="inner-content">
                                          <label class="fontliststyle" style="font-family: '<?php echo esc_attr($font); ?>' !important;">Ag</label><br>
                                          <label class="font-label"><?php echo ($newlabel) ? $newlabel : esc_attr($font); ?></label>
                                          <!-- <label class="font-label"><?php // echo esc_attr($font); ?></label>  -->
                                          <input class="fontvalue" type="hidden" value="<?php echo esc_attr($font); ?>">
                                        </div>
                                      </li>
                                    <?php endforeach;
                                    endif;
                                    ?>
                                  </ul>
                                </div>
                              </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group clipart-btn">
                            <label for="adding-clipart" class="col-sm-4 control-label p-0">Clipart
                            <div class="option-help copy-float-right">
                                <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
                                  <div class="options-hover hover-clean" style="display: none;">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <div class="options-desc">
                                        <p>
                                          Choose from over 200 different logos we have available. If you have a particular clipart or company logo you would like to use, please upload it. We will send you a wristband mock up for you at no cost to approve at before we start production. If you have any special requests, please add it in the Additional Notes at the bottom of the Order Now page.
                                        </p>
                                    </div>
                                  </div>
                            </div>
                            </label>
                            <!-- Clipart -->
                        <div id="add-clipart">
                          <!-- <label id="clipartTitle" class="form-group-heading CssTitleBlack col-md-6 col-xs-6" >Add Clipart</label> -->
                          <div class="fusion-clearfix"></div>
                          <div class="button-box hide-if-message_type-continues col-md-12 col-xs-12 marginB-10">
                            <div class="alignright">
                              <a id="front_start_btn" data-view="front" data-position="front_start" href="#" data-title="Front Start" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="FsID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="frontstart">
                              </a>
                            </div>
                            <span class="text-label text-center">Front Start</span>
                          </div>
                          <div class="button-box hide-if-message_type-continues">
                            <div class="alignright">
                              <a id="front_end_btn" data-view="front" data-position="front_end" href="#" data-title="Front End" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="FeID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="frontend">
                              </a>
                            </div>
                             <span class="text-label text-center">Front End</span>
                          </div>

                          <!-- center -->
                          <div id="figured_icon" class="button-box col-md-12 col-xs-12 marginB-10" style="display:none;">
                            <div class="alignright">
                              <a id="center_btn" data-view="center" data-position="center" href="#" data-title="Center" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="CID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="center">
                              </a>
                            </div>
                            <span class="text-label text-center">Figured Logo</span>
                          </div>
                          <!-- end center -->
                          
                          <div class="fusion-clearfix"></div>
                          <div class="button-box hide-if-message_type-continues">
                            <div class="alignright">
                              <a id="back_start_btn" data-view="back" data-position="back_start" href="#" data-title="Back Start" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="BsID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="backstart">
                              </a>
                            </div>
                            <span class="text-label text-center">Back Start</span>
                          </div>
                          <div class="button-box hide-if-message_type-continues button-backend">
                            <div class="alignright">
                              <a id="back_end_btn" data-view="back" data-position="back_end" href="#" data-title="Back End" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="BeID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="backend">
                              </a>
                            </div>
                            <span class="text-label text-center ">Back End</span>
                          </div>

                          <div class="fusion-clearfix"></div>
                          <div class="button-box hide-if-message_type-front_and_back col-md-12 col-xs-12 marginB-10">
                            <div class="alignright">
                              <a id="wrap_around_start" data-position="wrap_start" href="#" data-title="Wrap Around Start" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="WsID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="backend">
                              </a>
                            </div>
                            <span class="text-label text-center">Wrap Around Start</span>
                          </div>


                          <div class="button-box hide-if-message_type-front_and_back">
                            <div class="alignright">
                              <a id="wrap_around_end" data-position="wrap_end" href="#" data-title="Wrap Around End" data-toggle="modal"
                              data-target="#wristband-clipart-modal"
                              class="toggle-modal-clipart">
                              <span class="fusion-button-text-right">
                                <i class="fa icon-preview hide-if-upload" id="WeID"></i>
                                <!-- <img class="image-upload hide-if-icon" width="16" height="16"/>
                                Select</span> -->
                                <img class="image-upload hide-if-icon" width="16" height="16"/>
                                </span>
                              </a>
                              <a href="#" class="fileinput-button">
                                <span>Upload</span><i class="nothing"></i>
                                <!-- The file input field used as target for the file upload widget -->
                                <input class="fileupload" type="file" name="files[]"
                                data-clipart-type="backend">
                              </a>
                            </div>
                            <span class="text-label text-center">Wrap Around End</span>
                          </div>

                        </div><!-- /#add-clipart -->
                        </div>
                    </form>
                </div>

                <!-- ANOTHER PREVIEW MOBILE -->
                <!-- END PREVIEW MOBILE -->

                <!-- Additional options -->
                <?php if (isset($GLOBALS['wbc_settings']->additional_options)): ?>
                <div id="additional-option-section" class="col-holder">
                    <!-- <label class="form-group-heading CssTitleBlack"  data-fontsize="19" data-lineheight="20">Additional Options</label> -->
                    <div class="col-title">
                      <h5>Additional Options</h5>
                    </div>
                  <div class="col-content-holder col-select">
                    <?php $i = 1;
                    foreach ($GLOBALS['wbc_settings']->additional_options as $index => $option):
                                          //removes digital proof
                      // if ($index != 'digital_proof'):
                      if ($option->name != 'Digital 3D Mock Up'):
                    ?>
                     <div id="<?php echo 'id_' . $index; ?>" class="additional-option-item" style="padding-top:0;">
                      <!-- <div class="fusion-column-wrapper"> -->
                        <div class="addon">
                          <span class="addon-price-handler">
                            <div class="checkbox">
                              <div class="options-orig">
                                <div class="option-help copy-float-right">
                                  <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
                                    <div class="options-hover">
                                      <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      <div class="options-desc">
                                          <p><?php echo esc_attr($option->tool_tip_text); ?></p>
                                      </div>
                                    </div>
                                </div>
                                <div class="options-img">
                                  <div class="options-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/wc-options-sprites.jpg');" alt="<?php echo $option->name; ?>"></div>
                                </div>
                              </div>
                              <!-- <input type="checkbox" name="additional_option[]" data-key="<?php // echo $index; ?>" value="<?php // echo $option->name; ?>" /> -->
                              <label>
                                <input type="checkbox" name="additional_option[]" data-key="<?php echo $index; ?>" value="<?php echo $option->name; ?>" />
                                <?php echo $option->name; ?>
                              </label>
                            </div>
                          </span>
                        </div>
                      <!-- </div> -->
                      <!-- /.fusion-column-wrapper -->
                    </div><!-- /.fusion-one-third -->
                    <?php $i++;
                     endif;  
                    endforeach; ?>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-keychain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document" style="width: 445px; margin-top: 4em;">
                        <div class="modal-content">
                          <div class="modal-header" style="padding-right: 5px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Convert to Keychain</h4>
                          </div>
                          <div class="modal-body" style="margin-left: 10px;">
                            <div class="keychain-col" style="display: none;">
                              <form action="">
                                <input type="radio" id="convert-all" name="convert_value" value="convert-all">
                                <label for="convert-all" style="font-size: 16px;">Convert all to keychains</label><br>
                                <input type="radio" id="convert-hundred" name="convert_value" value="convert-hundred">
                                <label for="convert-hundred" style="font-size: 16px;">Convert my 100 free wristbands to keychains</label><br>
                                <input type="radio" id="convert-other" name="convert_value" value="convert-other">
                                <label for="convert-other" style="font-size: 16px;">
                                  <span style="float: left; margin-right: 5px;">Convert</span> 
                                  <input type="number" pattern="[0-9]*" name="convert_value_number" value="" style="height: 34px; padding: 0 0 0 15px; position: relative; top: -8px">
                                </label>
                                <label for="" style="font-size: 16px;margin-left: 5px;"> to keychains</label>
                                <button type="button" class="btn btn-default bg-blue copy-white" data-dismiss="modal" aria-label="Close" style="border: none; width: 90px; margin: 3em auto 0; display: block; clear: both; outline: none;">
                                  Done
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END MODAL -->
                  </div>
                </div>
                <?php endif; ?>
                <!-- /. additional options -->

                <!-- Packaging options -->
                <?php if (isset($GLOBALS['wbc_settings']->packaging_options)): ?>
                <div id="additional-option-section" class="col-holder copy-float-left">
                    <!-- <label class="form-group-heading CssTitleBlack"  data-fontsize="19" data-lineheight="20">Additional Options</label> -->
                    <div class="col-title">
                      <h5 class="header-packaging">Choose Packaging</h5>
                    </div>
                  <div class="col-content-holder col-select">
                    <?php $i = 1;
                    $k = true;
                    foreach ($GLOBALS['wbc_settings']->packaging_options as $index => $option):
                                          //removes digital proof
                      // if ($index != 'digital_proof'):
                       ?>
                     <div id="<?php echo 'id_' . $index; ?>" class="packaging-option-item" style="padding-top:0;width: 148px; background-color: #fff; float: left; margin: 0 15px 15px 0; border: 1px solid #ddd; min-height: 130px;">
                      <!-- <div class="fusion-column-wrapper"> -->
                        <div class="addon">
                          <span class="addon-price-handler">
                            <div class="checkbox">
                              <div class="options-orig">
                                <div class="option-help copy-float-right">
                                  <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>" style="<?php echo $option->name=='No Packaging' ? 'display: none':''; ?>"></i>
                                    <div class="options-hover">
                                      <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      <div class="options-desc">
                                          <p><?php echo esc_attr($option->tool_tip_text); ?></p>
                                      </div>
                                    </div>
                                </div>
                                <div class="options-img">
                                  <div class="options-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/wc-options-sprites.jpg');" alt="<?php echo $option->name; ?>"></div>
                                </div>
                              </div>
                              <!-- <input type="checkbox" name="additional_option[]" data-key="<?php // echo $index; ?>" value="<?php // echo $option->name; ?>" /> -->
                              <label>
                                <input type="radio" style="float: left;" name="packaging_option[]" data-key="<?php echo $index; ?>" value="<?php echo $option->name; ?>" <?php echo $k ? 'checked' : ''; ?> />
                                <span style="display: inline-block;"><?php echo $option->name; ?></span>
                              </label>
                            </div>
                          </span>
                        </div>
                      <!-- </div> -->
                      <!-- /.fusion-column-wrapper -->
                    </div><!-- /.fusion-one-third -->
                    <?php $i++;
                    $k = false;
                    // endif;  
                    endforeach; ?>
                    <div id="custom-packaging" style="display: none;">
                      <a href="#" class="fileinput-button" style="width: 149px;">
                        <img class="image-upload"/>
                        <span>Upload Image</span><i class="fa fa-spin nothing"></i>
                          <!-- The file input field used as target for the file upload widget -->
                          <!-- <input type = "file" id="files" name="my_file_upload[]" accept = "image/*" class = "files-data fileupload" /> -->
                          <form>
                            <input type = "file" id="files" name="my_file_upload[]" class = "files-data" />
                          </form>
                       </a>
                       <div id="packaging_error_warning"></div>
                       <div id="packaging_imagename" style="display: none"></div>
                       <div id="email-later-container" style="cursor: pointer;">
                          <input type="checkbox" style="margin: 0!important;padding: 0; top: -5px;" name="email_later" id="email-later" />
                          <span style="font-size: 14px; position: relative; bottom: 5px;">Email this later</span>
                       </div>      
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <!-- /. Packaging options -->
            </div>
          </div>

          <!-- believe -->
        <div class="col-md-3 p-0 col-summ" id="order_now_summary">
        <!-- klaro kaai -->
            <div class="col-holder col-holder-summ col-holder-summ-desktop">
                <div class="col-title">
                    <h5>Summary</h5>
                </div>
                <div class="col-content-holder col-select col-summary">
                    <div id="quantity-notice"></div>
                        
                        <div class="col-content-holder col-select col-summary">
                          <span id="freeCounter" class="CssTitleBlue"></span>
                          <div class="form-group table-responsive">
                            <table id="selected_color_table" class="table table-summary" border="0">
                              <thead>
                                <tr>
                                  <td >Color</th>
                                  <td class="TempCss1">Adult</td>
                                  <td class="TempCss1">Medium</td>
                                  <td class="TempCss1">Youth</td>
                                  <td class = "text_to_alter" style="text-align: center;"></td>
                                  <th colspan="2" style="text-align:right;"><a class="CssEditSave CssTitleBlue font-size-11" id="EditSaveID" style="cursor: pointer;"><i class="fa fa-pencil"></i></a><br><a style="cursor: pointer;" class="CssEditSave CssTitleRed font-size-11"  id="CancelID"></a></th>
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                            </table>
                          </div>
                        </div>

                    <div class="table-desc text-center">
                        <p>Get 100 free wristbands for all orders with 100 wristbands &amp; above.
                        </p>
                        <div class="option-help copy-float-right">
                          <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
                            <div class="options-hover hover-clean" style="display: none;">
                              <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                              <div class="options-desc text-left">
                                  <p>Your 100 free wristbands will be exactly the same wristband design as what you ordered. By default, they will be evenly distributed based on the quantity of the colors and sizes of your order. You can press the "edit" button to redistribute this to how you want your free wristbands.</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .klaro kaai -->
            <div class="col-holder col-new-shipping">
                <div class="col-title">
                     <h5>Production & Shipping</h5>
                </div>
                <div id="notify-customization-2"></div>
                <div class="col-content-holder col-select" style="padding: 5px 15px;">
                        <!-- customized date and shipping -->
                        <?php if (isset($GLOBALS['wbc_settings']->customization)): ?>
                          <div id="customization-section">
                            <!-- <label class="form-group-heading CssTitleBlack">Production and Shipping</label> -->
                            <!-- <div class="fusion-clearfix"></div> -->
                            <div class="form-group form-shipping" style="margin-bottom: 0;">
                            <?php $flag = false;
                            foreach ($GLOBALS['wbc_settings']->customization->location as $cus_location): ?>
                            <div class="radio" style="margin: 0;">
                            <p class="form-row form-row-wide">
                              <label>
                                <?php
                                $Stat = "";
                                if (isset($customization_location)) {
                                  if ($customization_location == esc_attr($cus_location->name)) {
                                    $Stat = "checked";
                                  }
                                }
                                ?>
                                <input type="radio" name="customization_location" data-title="<?php echo esc_attr($cus_location->name); ?>"
                                value="<?php echo sanitize_title_with_underscore($cus_location->name); ?>"
                                data-price="<?php echo esc_attr($cus_location->price); ?>"
                                <?php echo!$flag ? 'checked' : ''; ?> <?php echo $Stat; ?> title="<?php echo esc_attr($cus_location->tool_tip_text); ?>"/>
                                <?php echo esc_attr($cus_location->name); ?>
                                <i class="fa fa-question-circle" aria-hidden="true">
                                  <span class="copy-tooltip"><?php echo esc_attr($cus_location->tool_tip_text); ?></span>
                                </i>
                              </label>

                            </p>
                            </div>
                            <?php $flag = true;
                            endforeach; ?>
                            </div> 
                            <?php foreach ($GLOBALS['wbc_settings']->customization->dates as $type => $date): ?>
                              <div class="col-color" style="margin-bottom: 10px;">
                                  <p class="form-row form-row-wide" style="margin-bottom: 0;">
                                    <label for="customization_date_<?php echo $type; ?>" class="form-group-heading CssTitleBlack">
                                      <h4>
                                        <?php echo ucwords($type); ?> Time
                                        <div class="option-help copy-float-right" style="display: none;">
                                          <i class="fa fa-question-circle" aria-hidden="true" id="options<?php echo $i; ?>"></i>
                                            <div class="options-hover hover-clean" style="display: none;">
                                              <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                              <div class="options-desc">
                                                  <p>
                                                  Please choose "International Shipping" for orders shipped outside the United States. We ship worldwide especially to countries such as Canada, United Kingdom, Australia, Ireland, and New Zealand.
                                                  </p>
                                              </div>
                                            </div>
                                        </div>
                                      </h4>
                                    </label>
                                    <div class="col-color-select">
                                        <div class="form-group">
                                            <div class="select-button">
                                                <select id="customization_date_<?php echo $type; ?>"
                                                  name="customization_date_<?php echo $type; ?>"
                                                  class="input-select customization-date-select form-control" required>
                                                  <option value="-1">-- Select <?php echo ucwords($type) ?> Time --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  </p>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        <?php endif; ?>
                        <p class="form-row form-row-wide" style="margin-bottom: 10px;">
                          <span id="guaranteed_note"></span>
                          <span id="delivery_date"></span>
                          <span id="datetotal" style="display:none"></span>
                        </p>
                        <form style="padding-bottom: 5px;">
                          <div class="checkbox copy-digital-mockup" style="line-height: 0; margin: 0;">
                            <label>
                              <?php if (isset($GLOBALS['wbc_settings']->additional_options)): 
                                      foreach ($GLOBALS['wbc_settings']->additional_options as $index => $option):
                                        if ($option->name == 'Digital 3D Mock Up'): 
                              ?>
                                        <input type="checkbox" name="additional_option[]" data-key="<?php echo $index; ?>" value="<?php echo $option->name; ?>" />
                            
                                        <span style="font-size: 13px; display: block; line-height: 20px; margin-top: 2px;">
                                          Request Digital Mockup

                                          <i class="fa fa-question-circle" aria-hidden="true"></i>
                                          <div class="options-hover hover-clean" style="display: none;width: 290px; padding: 1.5em; top: -10.5em;">
                                              <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                              <div class="options-desc">
                                                  <div class="options-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/wc-products-images-optimized/wc-options-sprites.jpg');" alt="digital-proof"></div>
                                                  <span style="padding-left: 1em; display: table;line-height: 16px;">Receive a 3D Digital Mockup of your wristband design within 6 hours of placing your order.</span>
                                              </div>
                                          </div>
                                        </span>
                              <?php     endif;  
                                      endforeach;
                                    endif; 
                              ?>  
                            </label>
                          </div>
                        </form>

                    </div>        <!-- end of customized date and shipping -->
                </div>
            <!--  ADDED COLUMNS FOR MOBIE -->
              <div class="row row-mobile">
                <div class="col-md-6">
                    <div class="box-additional">
                      <div class="col-title">
                        <label for="additional_notes"  class="form-group-heading CssTitleBlack"><h5>Additional Notes</h5></label>
                      </div>
                      <div class="col-content-holder col-select">
                        <div class="form-group">
                          <p class="form-row form-row-wide">
                            <div class="form-group">
                              <textarea class="input-text form-control" name="additional_notes" id="additional_notes" cols="30" rows="4" style="min-height: 100px;"><?php echo $metaInfo['AddNotes_msg']; ?></textarea>
                            </div>
                          </p>
                        </div>
                      </div> 
                    </div>
                  </div>
                <!-- Additional options -->
                </div>
              </div>
            <!-- END ADDITION -->
                <div class="col-holder col-order-total">
                      <!-- Additional lead forms -->
                        <div class="box-lead-info copy-float-left copy-full-width">
                          <div class="col-content-holder col-select">
                              <div class="form-row">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="CouponCode" placeholder="Coupon Code">
                                </div>
                                <div class="form-group">
                                  <input type="number" class="form-control" id="AgentDiscount" placeholder="Agent discount">
                                </div>
                                <div class="form-group">
                                  <input type="number" class="form-control" id="SalesTax" placeholder="Sales Tax (if applicable)">
                                </div>
                              </div>
                          </div> 
                        </div>
                    <!-- end lead forms -->
                    <div class="col-content-holder col-total copy-float-left">
                        <div class="total-details copy-border-no">
                            <div class="col-total-content">
                              <p class="fusion-row price price-with-decimal">
                                <span class="currency CurrencyAddup"><h1><?php echo get_woocommerce_currency_symbol(); ?><span class="integer-part price-handler" id="price_handler">0.00</span></h1></span>
                                <p>
                                  Total Quantity:
                                  <span id="qty_handler">0</span>
                                </p>
                              </p>
                            </div>
                        </div>
                        <!-- Additional lead forms -->
                        <div class="box-lead-info box-after-total copy-float-left copy-full-width">
                          <div class="col-content-holder col-select" style="padding: 0 15px;">
                              <div class="form-row">
                                <div class="form-group">
                                  <span class="copy-span-lead copy-block">Lead Time</span>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="lead" id="lead1" value="option1" checked>
                                      Standard
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="lead" id="lead2" value="option2">
                                       Rush
                                    </label>
                                  </div>
                                </div>
                                <div class="form-group copy-relative copy-form-date">
                                  <input class="unstyled" placeholder="Date needed by" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                                  <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <div class="form-group copy-form-ship">
                                  <span class="copy-span-lead copy-block">Shipment Type</span>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="ship" id="ship1" value="option1" checked>
                                      STO
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="ship" id="ship2" value="option2">
                                      STC
                                    </label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="ShipAddress1" placeholder="Shipping Street Address 1">
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="ShippingCity" placeholder="Shipping City">
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="ShippingState" placeholder="Shipping State">
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="ShippingPostalCode" placeholder="Shipping Postal Code">
                                </div>
                                <div class="form-group copy-relative">
                                  <textarea class="form-control form-receive copy-form-text-height" rows="3" placeholder="Receiver Information"></textarea>
                                  <span class="copy-block copy-text-placeholder">(Name, Email Address and Contact Number)</span>
                                </div>
                              </div>
                          </div> 
                        </div>
                        <div class="box-lead-info box-after-receive-info copy-float-left copy-full-width">
                          <div class="col-content-holder col-select" style="padding: 0 15px;">
                              <div class="form-row">
                              <div class="form-group copy-relative">
                                  <select class="form-control">
                                    <option selected disabled>Nature of Customer</option>
                                    <option>Lorem Ipsum1</option>
                                    <option>Lorem Ipsum2</option>
                                    <option>Lorem Ipsum3</option>
                                    <option>Lorem Ipsum4</option>
                                  </select>
                                  <span class="dd-pointer dd-pointer-down"></span>
                                </div>
                                <div class="form-group copy-relative">
                                  <textarea class="form-control copy-form-text-height" rows="3" placeholder="Append to Person Notes"></textarea>
                                </div>
                                <div class="form-group copy-relative">
                                  <select class="form-control">
                                    <option selected disabled>Agent's Name</option>
                                    <option>Lorem Ipsum1</option>
                                    <option>Lorem Ipsum2</option>
                                    <option>Lorem Ipsum3</option>
                                    <option>Lorem Ipsum4</option>
                                  </select>
                                  <span class="dd-pointer dd-pointer-down"></span>
                                </div>
                            </div>
                          </div>
                        </div>
                    <!-- end lead forms -->
                        <div class="convert-keychains-message"></div>
                        <div class="alert-warning-message"></div>
                        <!-- Modal -->
                        <div class="modal fade" id="myInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header" style="padding: 15px 0 0;border: none;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel" style="font-size: 30px; line-height: 1;">Would you like a saved copy of your wristband design?</h4>
                              </div>
                              <div class="modal-body">
                                <div class="col-customer-email">
                                  <div class="copy-customer-email-body" style="padding: 5px 15px 0;">
                                    <!-- <label style="font-weight: normal; font-size: 14px; display: block;">First Name</label> -->
                                    <input type="text" name="col-customer-name" id="customer-name" type="text" value="" placeholder="Enter First Name" style="color: #202020;height: 40px;border-color: #a8a8a8;margin: 5px 0;" />

                                    <!-- <label style="font-weight: normal; font-size: 14px; display: block;">Email Address</label> -->
                                    <input type="email" name="col-customer-email" id="customer-email" type="text" value="" placeholder="Enter Email Address" style="color: #202020; height: 40px; border: 1px solid #a8a8a8; width: 100%; padding: 0 15px; font-size: 14px;background: #fff;appearance:none;-moz-appearance:none;-webkit-appearance:none;border-radius: 0;margin: 5px 0;" /> 
                                    <button id="wbc_continue_to_cart" href="#" class="btn-add-to-cart">
                                      <span class="fusion-button-text-left">Send Me a Copy</span>
                                    </button>
                                  </div>
                                  <a class="copy-block copy-proxima-nova text-center" href="/cart" style="font-size: 16px;margin: 10px 0 0 0;    text-decoration: underline;">No thanks, just proceed to checkout</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="btn-view-holder copy-clear">
                            <div class="btn-action-holder" style="margin-top: 5px;"> 
                              <div class="link-buttons aligncenter copy-full-width copy-float-left">
                                <!-- Save button -->
                                <a id= "save_lead_btn" class="btn-action btn-lead" href="#">
                                  Save Lead
                                </a>
                                <!-- Clear Fields -->
                                <a href="" class="btn-action btn-clear">
                                  <i class="fa fa-undo" aria-hidden="true"></i>
                                  Clear
                                </a>
                              </div>
                            </div>
                        </div>
                        <a class="copy-block text-center copy-btn-feedback" href="#" data-toggle="modal" data-target="#modalFeedback">
                          <i class="fa fa-comments-o" aria-hidden="true"></i>  Leave Feedback
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="modalFeedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center copy-proxima-s-bold" id="myModalLabel">Leave Feedback</h4>
                              </div>
                              <div class="modal-body">
                                <?php echo do_shortcode('[contact-form-7 id="15969" title="Feedback Form"]'); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="chart-desktop">
      <div class="section-price-chart">
        <div class="container p-0">
            <div id="price-scroll">
              <div id="price_chart" class="">
                <div class="fusion-column-wrapper">
                  <p class="copy-font-fourteen copy-upper" id="table_price_name"></p>
                  <table class="table table-bordered">
                    <tr>
                      <td>Qty</td>
                    </tr>
                    <tr>
                      <td>
                        Price $
                      </td>
                    </tr>
                  </table>
                </div>
              </div><!-- /#price_chart -->
            </div>
        </div>
    </div>
  </div>
</div>
<!-- end of the body -->


              <script id="modal_message_template" type="x-tmpl-mustache">
                <div id="modal_message" class="fusion-modal modal fade {{status}}"  tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content fusion-modal-content" style="background-color:#f6f6f6">
                      <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="modal-heading-1" data-dismiss="modal" aria-hidden="true"
                        data-fontsize="17" data-lineheight="36">{{title}}</h3>
                      </div>
                      <div class="modal-body">
                        {{{message}}}
                      </div>
                    </div>
                  </div>
                </div><!-- /.fusion-modal -->
              </script>
            <!-- infusionsoft save design -->
               <form accept-charset="UTF-8" action="https://zt232.infusionsoft.com/app/form/process/50257f1da49a3883663775d73e9a6174" id="infusion-form" method="POST" style="display:none">
                <input name="inf_form_xid" type="hidden" value="50257f1da49a3883663775d73e9a6174" />
                <input name="inf_form_name" type="hidden" value="WC Save Design Lead" />
                <input name="infusionsoft_version" type="hidden" value="1.66.0.58" />
                <div class="infusion-field">
                  <label for="inf_field_FirstName">First Name</label>
                  <input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" />
                </div>
                <div class="infusion-field">
                  <label for="inf_field_Email">Email *</label>
                  <input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email" type="text" />
                </div>
                <div class="infusion-field">
                  <label for="inf_custom_Design1">Design</label>
                  <textarea cols="24" id="inf_custom_Design1" name="inf_custom_Design1" rows="5">
                  </textarea>
                </div>
                <div class="infusion-field">
                  <label for="inf_custom_Style">Style</label>
                  <input class="infusion-field-input-container" id="inf_custom_Style" name="inf_custom_Style" type="text" />
                </div>
                <div class="infusion-field">
                  <label for="inf_custom_Size">Size</label>
                  <input class="infusion-field-input-container" id="inf_custom_Size" name="inf_custom_Size" type="text" />
                </div>
                <div class="infusion-field">
                  <label for="inf_custom_Colors0">Colors</label>
                  <textarea cols="24" id="inf_custom_Colors0" name="inf_custom_Colors0" rows="5">
                  </textarea></div>
                  <div class="infusion-field">
                    <label for="inf_custom_MessageType">Message Type</label>
                    <input class="infusion-field-input-container" id="inf_custom_MessageType" name="inf_custom_MessageType" type="text" />
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_FontStyle">Font Style</label>
                    <input class="infusion-field-input-container" id="inf_custom_FontStyle" name="inf_custom_FontStyle" type="text" />
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_AdditionalNotes0">Additional Notes</label>
                    <textarea cols="24" id="inf_custom_AdditionalNotes0" name="inf_custom_AdditionalNotes0" rows="5">
                    </textarea>
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_FrontMessage">Front Message</label>
                    <input class="infusion-field-input-container" id="inf_custom_FrontMessage" name="inf_custom_FrontMessage" type="text" />
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_BackMessage">Back Message</label>
                    <input class="infusion-field-input-container" id="inf_custom_BackMessage" name="inf_custom_BackMessage" type="text" />
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_ContinuousMessage">Continuous Message</label>
                    <input class="infusion-field-input-container" id="inf_custom_ContinuousMessage" name="inf_custom_ContinuousMessage" type="text" />
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_InsideMessage">Inside Message</label>
                    <input class="infusion-field-input-container" id="inf_custom_InsideMessage" name="inf_custom_InsideMessage" type="text" />
                  </div>
                  <div class="infusion-field">
                    <label for="inf_custom_AdditionalOptions0">Additional Options</label>
                    <textarea cols="24" id="inf_custom_AdditionalOptions0" name="inf_custom_AdditionalOptions0" rows="5">
                    </textarea></div>
                    <div class="infusion-field">
                      <label for="inf_custom_Packaging">Packaging</label>
                      <input class="infusion-field-input-container" id="inf_custom_Packaging" name="inf_custom_Packaging" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_PackagingImage">Packaging Image</label>
                      <input class="infusion-field-input-container" id="inf_custom_PackagingImage" name="inf_custom_PackagingImage" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_FrontStart">Front Start</label>
                      <input class="infusion-field-input-container" id="inf_custom_FrontStart" name="inf_custom_FrontStart" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_FrontEnd">Front End</label>
                      <input class="infusion-field-input-container" id="inf_custom_FrontEnd" name="inf_custom_FrontEnd" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_FiguredLogo">Figured Logo</label>
                      <input class="infusion-field-input-container" id="inf_custom_FiguredLogo" name="inf_custom_FiguredLogo" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_BackStart">Back Start</label>
                      <input class="infusion-field-input-container" id="inf_custom_BackStart" name="inf_custom_BackStart" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_BackEnd">Back End</label>
                      <input class="infusion-field-input-container" id="inf_custom_BackEnd" name="inf_custom_BackEnd" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_WrapAroundStart">Wrap Around Start</label>
                      <input class="infusion-field-input-container" id="inf_custom_WrapAroundStart" name="inf_custom_WrapAroundStart" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_WrapAroundEnd">Wrap Around End</label>
                      <input class="infusion-field-input-container" id="inf_custom_WrapAroundEnd" name="inf_custom_WrapAroundEnd" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_CustomizationLocation">Customization Location</label>
                      <input class="infusion-field-input-container" id="inf_custom_CustomizationLocation" name="inf_custom_CustomizationLocation" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_ProductionTime">Production Time</label>
                      <input class="infusion-field-input-container" id="inf_custom_ProductionTime" name="inf_custom_ProductionTime" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_ShippingTime">Shipping Time</label>
                      <input class="infusion-field-input-container" id="inf_custom_ShippingTime" name="inf_custom_ShippingTime" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_GuaranteedDelivery">Guaranteed Delivery</label>
                      <input class="infusion-field-input-container" id="inf_custom_GuaranteedDelivery" name="inf_custom_GuaranteedDelivery" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_TotalQuantity">Total Quantity</label>
                      <input class="infusion-field-input-container" id="inf_custom_TotalQuantity" name="inf_custom_TotalQuantity" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_Price0">Price</label>
                      <input class="infusion-field-input-container" id="inf_custom_Price0" name="inf_custom_Price0" type="text" />
                    </div>
                    <div class="infusion-field">
                        <label for="inf_option_TypeofLeads">Type of Leads</label>
                        <div class="infusion-radio">
                            <span class="infusion-option">
                                <input checked="checked" id="inf_option_TypeofLeads_398" name="inf_option_TypeofLeads" type="radio" value="398" />
                                <label for="inf_option_TypeofLeads_398">Leads from the website</label>
                            </span>
                            <span class="infusion-option">
                                <input id="inf_option_TypeofLeads_400" name="inf_option_TypeofLeads" type="radio" value="400" />
                                <label for="inf_option_TypeofLeads_400">Add to cart leads</label>
                            </span>
                        </div>
                    </div>
                    <div class="infusion-submit">
                      <input type="submit" value="Submit" />
                    </div>
                  </form>
                  <script src="https://zt232.infusionsoft.com/app/webTracking/getTrackingCode?b=1.66.0.58" type="text/javascript"></script>
                  <!-- <script type="text/javascript" src="https://zt232.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=836b445a9eef92908d02a37a83de32bd"></script> -->


 <!-- Modal -->
  <div class="modal fade" id="modal-color-pantone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <button id="addPantoneColor" type="button" class="btn btn-primary copy-float-right btn-done">Done</button>
          <h1 class="modal-title" id="myModalLabel">Select Color</h1>
          <div class="row">
            <div class="col-md-4">
              <label for="input-color">Color 1:</label>
              <input id="PTCName1" type="text" class="input-color">
            </div>
             <div class="col-md-4 hideifsolid">
              <label for="input-color">Color 2:</label>
              <input id="PTCName2" type="text" class="input-color">
            </div>
             <div class="col-md-4 hideifsolid">
              <label for="input-color">Color 3 (Optional):</label>
              <input id="PTCName3" type="text" class="input-color">
            </div>
            <input type="hidden" id="pantonTracker" value="1" data-1="" data-2="" data-3="" color-1="" color-2="" color-3="">
          </div>
        </div>
        <div class="modal-body">
          <div class="tab-pane active" id="colorchart">
            <ul class="color-pantone-list">
              <?php if (isset($GLOBALS['wbc_settings']->pantone_color)):
                    foreach ($GLOBALS['wbc_settings']->pantone_color as $pantone): ?>
                <li>
                <a>
                    <div class="color-chart-wrapper wristband_color_select" data-name="<?php echo $pantone->pantone_name;?>" data-color="<?php echo $pantone->color_number;?>" style="color: <?php echo $pantone->color_number;?>; background-color: <?php echo $pantone->color_number;?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/clr_bg.png" alt="clear background" width="86" height="80">
                          <div class="checked">
                            <i class="fa fa-check"></i>
                          </div>
                      </div>
                      <div class="text-center color-label">
                        <span><?php echo $pantone->pantone_name;?></span>
                      </div>
                </a>
               </li>
            <?php endforeach;
            foreach ($add_color_pantone as $pantones => $pantone ): ?>
             <li>
                <a>
                    <div class="color-chart-wrapper wristband_color_select" data-name="<?php echo $pantone['name'];?>" data-color="<?php echo $pantone['color'];?>" style="color: <?php echo $pantone['color'];?>; background-color: <?php echo $pantone['color'];?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/clr_bg.png" alt="clear background" width="86" height="80">
                          <div class="checked">
                            <i class="fa fa-check"></i>
                          </div>
                      </div>
                      <div class="text-center color-label">
                        <span><?php echo $pantone['name'];?></span>
                      </div>
                </a>
               </li>
            <?php 
                  endforeach;
                  endif;
            ?>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->

  <!-- Modal Custom Text Color -->
  <div class="modal fade" id="modal-color-text" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <button id="addTextColor" type="button" class="btn btn-primary copy-float-right btn-done">Done</button>
          <h1 class="modal-title" id="myModalLabel">Select Color</h1>
          <div class="row">
            <div class="col-md-4">
              <label for="input-color">Color:</label>
              <input id="text_color" type="text" class="input-color">
            </div>
            <input type="hidden" id="textTracker" value="1" data-name="" data-color="">
          </div>
        </div>
        <div class="modal-body">
          <div class="tab-pane active" id="colorchart">
            <ul class="color-pantone-list">
              <?php if (isset($GLOBALS['wbc_settings']->pantone_color)):
                    foreach ($GLOBALS['wbc_settings']->pantone_color as $pantone): ?>
                <li>
                <a>
                    <div class="color-chart-wrapper text_color_select" data-name="<?php echo $pantone->pantone_name;?>" data-color="<?php echo $pantone->color_number;?>" style="color: <?php echo $pantone->color_number;?>; background-color: <?php echo $pantone->color_number;?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/clr_bg.png" alt="clear background" width="86" height="80">
                          <div class="checked">
                            <i class="fa fa-check"></i>
                          </div>
                      </div>
                      <div class="text-center color-label">
                        <span><?php echo $pantone->pantone_name;?></span>
                      </div>
                </a>
               </li>
            <?php endforeach;
            foreach ($add_color_pantone as $pantones => $pantone ): ?>
             <li>
                <a>
                    <div class="color-chart-wrapper text_color_select" data-name="<?php echo $pantone['name'];?>" data-color="<?php echo $pantone['color'];?>" style="color: <?php echo $pantone['color'];?>; background-color: <?php echo $pantone['color'];?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/clr_bg.png" alt="clear background" width="86" height="80">
                          <div class="checked">
                            <i class="fa fa-check"></i>
                          </div>
                      </div>
                      <div class="text-center color-label">
                        <span><?php echo $pantone['name'];?></span>
                      </div>
                </a>
               </li>
            <?php 
                  endforeach;
                  endif;
            ?>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->

  <!-- modal for clipart -->
  <div id="wristband-clipart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="modal-heading-1" data-dismiss="modal" aria-hidden="true"
            data-fontsize="17" data-lineheight="36">
            </h3>
          </div>
          <!-- <div class="select-add">
              <h4>Select a clipart below or upload logo <input type="file" value="Upload Your Own" class="upload-file"></h4>
          </div> -->
        <div class="modal-body">
          <div class="clipart-holder">
              <?php if (count($GLOBALS['wbc_settings']->logo->list) != 0): ?>
                <ul class="clipart-list">

                  <li class="active">
                    <label for="">
                      <div class="icon-preview clipart-img">
                        <i class="fusion-li-icon fa fa-times color-red"></i>
                      </div>
                    </label>
                  </li>
                  <?php foreach ($GLOBALS['wbc_settings']->logo->list as $name => $icon):
                  ?>
                  <li data-icon-code="<?php echo esc_attr($icon->glyp_code); ?>" data-icon="<?php echo esc_attr($icon->glyphicon); ?>" data-icon-name="<?php echo esc_attr($icon->name); ?>">
                    <label for="">
                      <div class="icon-preview clipart-img">
                        <i class="fusion-li-icon fa <?php echo esc_attr($icon->glyphicon); ?>"></i>
                      </div>
                      <div class="clearpart-info text-center">
                        <?php echo esc_attr($icon->name); ?>
                      </div>
                    </label>
                  </li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal for clipart -->

  <script type="text/javascript">
    var get_stylesheet_directory_uri = '<?php echo get_stylesheet_directory_uri(); ?>';

    (function($){
      <?php $style = $_GET['style']; if(!empty($style)){ ?>
        var style = '<?php echo $style ?>';

        $("#style option").each(function(){
            var html = $(this).html();
            html = html.toLowerCase();
            html = html.replace(/\s+/g, "-");

            if(style == html){
                var item = $(this).attr('value');
                $('#style').val(item);
            }
        });

      <?php }?>
    })(jQuery);
  </script>


<?php
 if ($metaInfo != false) { echo "<script type='text/javascript'>
  (function($){ 
    $('#qty_adult, #qty_medium, #qty_youth').trigger('keyup');
  })(jQuery);</script>";}
  
get_footer();
