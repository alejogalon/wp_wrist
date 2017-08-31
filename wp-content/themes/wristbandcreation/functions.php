<?php
function home_script() {
      wp_enqueue_script( 'mod-home-script', get_stylesheet_directory_uri() . '/wristband/assets/js/home-script.js', '', false);
      wp_enqueue_script( 'mod-clipboard-script', get_stylesheet_directory_uri() . '/wristband/assets/js/newjs/clipboard.js', '', false);
}
add_action( 'wp_enqueue_scripts', 'home_script' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-stylesheet', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/responsive.css' );
    wp_enqueue_style( 'new-order-now-css', get_stylesheet_directory_uri() . '/wristband/assets/css/order-now-updated.css?57' );
    // wp_enqueue_style( 'new-pantone-css', get_stylesheet_directory_uri() . '/wristband/assets/css/pantone.css' );
    wp_enqueue_style( 'new-july-css', get_stylesheet_directory_uri() . '/wristband/assets/css/combined-updated.css?69' );
    wp_enqueue_style( 'new-april-css', get_stylesheet_directory_uri() . '/wristband/assets/css/april.css' );
    wp_enqueue_style( 'swipebox-css', get_stylesheet_directory_uri() . '/wristband/assets/css/swipebox.min.css' );
    // wp_enqueue_style( 'new-order-now-longv-css', get_stylesheet_directory_uri() . '/wristband/assets/css/order-now-long-v.css' );
    // wp_enqueue_script('new-bootstrap-js', get_stylesheet_directory_uri() . '/wristband/assets/js/newjs/bootstrap.min.js', array( 'jquery' ), false, true);
    // wp_enqueue_script('new-jquerymin-js', get_stylesheet_directory_uri() . '/wristband/assets/js/newjs/jquery.min.js', array( 'jquery' ), false, true);
    // wp_enqueue_script('new-animate-js', get_stylesheet_directory_uri() . '/wristband/assets/js/newjs/css3-animate-it.js', array( 'jquery' ), false, true);
    // wp_enqueue_script('new-owlcars-js', get_stylesheet_directory_uri() . '/wristband/assets/js/newjs/owl.carousel.js', array( 'jquery' ), false, true);
    // wp_enqueue_script('new-bxslider-js', get_stylesheet_directory_uri() . '/wristband/assets/js/newjs/jquery.bxslider.min.js', array( 'jquery' ), false, true);
    // wp_enqueue_script('new-bootstrap-js', get_stylesheet_directory_uri() . '/wristband/assets/js/bootstrap.min.js', array( 'jquery' ), false, true);        
    // if ( !is_page('new-order-now') or !is_page('order-now') ){
    //   wp_enqueue_script('new-style-js', get_stylesheet_directory_uri() . '/wristband/assets/js/main-min.js', array( 'jquery' ), false, true); 
    // }
    // wp_enqueue_script( 'zoom-image-script', get_stylesheet_directory_uri() . '/wristband/assets/js/jquery-1.8.3.min.js', '', false);
    // wp_enqueue_script( 'zoom-image-elevate-script', get_stylesheet_directory_uri() . '/wristband/assets/js/jquery.elevatezoom.js', '', false);
    if ( is_page('long-order-now') ) {
      wp_enqueue_style( 'new-order-now-longv-css', get_stylesheet_directory_uri() . '/wristband/assets/css/order-now-long-v.css' );
    }
    else {
      wp_dequeue_script( 'new-order-now-longv-css' );
    }
    if ( is_page('new-order-now') or is_page('order-now') or is_page('long-order-now') or is_page('order-now-lead') ) {
      wp_dequeue_script( 'new-style-js' );
      wp_enqueue_script( 'fastclick-home-script', get_stylesheet_directory_uri() . '/wristband/assets/js/fastclick.js', '', false);
      wp_enqueue_script( 'fastclick-new-script', get_stylesheet_directory_uri() . '/wristband/assets/js/fastclick-new.js', '', false);
    }
    else {
      wp_enqueue_script('new-style-js', get_stylesheet_directory_uri() . '/wristband/assets/js/main-min.js', array( 'jquery' ), false, true);
    }

    // if (is_page( 'lanyards-product-guide' )) {
    //     wp_enqueue_script('new-bootstrap-js', get_stylesheet_directory_uri() . '/wristband/assets/js/bootstrap.min.js', array( 'jquery' ), false, true);
    // }

    //for the phase two tasks
   if ( is_page('login') or is_page('register') or is_page('supplier-dashboard') or is_page('employee-dashboard') or is_page('customer-dashboard') or is_page('forgot-password') or is_page('admin-dashboard') or is_page('super-admin-dashboard') ) {
        wp_enqueue_style( 'shedz-css', get_stylesheet_directory_uri() . '/wristband/assets/css/sheldz.css' );
        wp_enqueue_style( 'kram-css', get_stylesheet_directory_uri() . '/wristband/assets/css/kram.css' );

        wp_enqueue_script('sheldz-js', get_stylesheet_directory_uri() . '/wristband/assets/js/sheldz.js', array( 'jquery' ), false, true);
        wp_enqueue_script('recapgwp', 'https://www.google.com/recaptcha/api.js', array( 'jquery' ), false, true);
        wp_enqueue_script('justin-js', get_stylesheet_directory_uri() . '/wristband/assets/js/justin.js', array( 'jquery' ), false, true);
        wp_enqueue_script('timeago-js', get_stylesheet_directory_uri() . '/wristband/assets/js/timeago.js', array( 'jquery' ), false, true);
        wp_enqueue_script('plugins-js', get_stylesheet_directory_uri() . '/wristband/assets/js/plugins.js', array( 'jquery' ), false, true);

        wp_enqueue_media();
        wp_enqueue_script('wp-media-js', get_stylesheet_directory_uri() . '/wristband/assets/js/wp-media.js', array( 'jquery' ), false, true);
        
        wp_localize_script('sheldz-js', 'sheldz_ajax', array( 
        'ajaxUrl' => admin_url('admin-ajax.php')
        ));
        wp_localize_script('justin-js', 'justin_ajax', array( 
        'ajaxUrl' => admin_url('admin-ajax.php')
        ));
        wp_localize_script('plugins-js', 'plugins_ajax', array( 
        'ajaxUrl' => admin_url('admin-ajax.php')
        ));
      }


    // wp_register_style('list_of_icons', get_stylesheet_directory_uri() . '/wristband/assets/css/list-icons.css', array());
    wp_enqueue_style('list_of_icons');

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function admin_enqueue_styles() {
    wp_enqueue_style( 'admin-stylesheet', get_stylesheet_directory_uri() . '/admin-style.css' );

}
add_action( 'admin_init', 'admin_enqueue_styles' );

function avada_lang_setup() {
  $lang = get_stylesheet_directory() . '/languages';
  load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );



// Add My Custom Functions File 
include_once( get_stylesheet_directory() . '/templates/inc/sheldz_function.php' );
include_once( get_stylesheet_directory() . '/templates/jus_functions.php' );
include_once( get_stylesheet_directory() . '/add_additional_pantone.php' );
include_once( get_stylesheet_directory() . '/lanyard/lanyard_installs.php' );
include_once( get_stylesheet_directory() . '/cus_addtocart/add_to_cart_func.php' );
include_once( get_stylesheet_directory() . '/lapelpins/lapelpins_installs.php' );

/* To work with TypeKit
function theme_typekit() {
      wp_enqueue_script( 'theme_typekit', '//use.typekit.net/eoe0gac.js', '', false);
  }
  add_action( 'wp_enqueue_scripts', 'theme_typekit' );

  function theme_typekit_inline() {
    if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
      <script>try{Typekit.load();}catch(e){}</script>
    <?php }
  }
  add_action( 'wp_head', 'theme_typekit_inline' );*/


include_once (get_stylesheet_directory() . '/wristband/class-wristband.php');

function wdm_add_values_to_order_item_meta($item_id, $values) {
  global $woocommerce,$wpdb;
  $product_custom_values = $values['wristband_meta'];
  if(!empty($product_custom_values)) {
    wc_add_order_item_meta($item_id,'wristband_meta',$product_custom_values);
  }
}
add_action('woocommerce_add_order_item_meta','wdm_add_values_to_order_item_meta',1,2);


add_action( 'woocommerce_before_order_itemmeta', 'GetOrderDetail', 10, 3 );
function GetOrderDetail( $item_id, $item, $_product ){
    global $woocommerce;
    $order = new WC_Order( $item_id );
    $_product  = apply_filters( 'woocommerce_order_item_product', $_product, $item );
    $item_meta = new WC_Order_Item_Meta( $item['item_meta'] );

    foreach ($item_meta as $key => $value) {
      if($key == 'meta'){
        $meta = unserialize($value['wristband_meta'][0]);
    ?>
        <br>
        <div>
          <?php display_order_summary($_product, $meta); ?>
        </div>
    <?php
      }
    }
}



add_action( 'woocommerce_thankyou', 'Customize_avada_woocommerce_view_order', 10 );
function Customize_avada_woocommerce_view_order( $order_id ) {
  global $woocommerce;

  $order = new WC_Order( $order_id );
 //$url = 'http://yoursite.com/custom-url';
//   echo "<pre>";
//  var_dump();
// // die();
//     if ( $order->status != 'failed' ) {
//         wp_redirect($url);
//         exit;
//     }
  ?>
  <div class="avada-order-details woocommerce-content-box full-width">
    <h2><?php _e( 'Order Details', 'woocommerce' ); ?></h2>
    <table class="shop_table order_details">
     <thead>
      <tr>
        <th class="product-details copy-upper copy-proxima-sbold copy-gray copy-normal copy-spacing text-left"><?php _e( 'Item', 'woocommerce' ); ?>
        </th>
        <th class="product-quantity copy-upper copy-proxima-sbold copy-gray copy-normal copy-spacing text-left"><?php _e( 'QTY', 'woocommerce' ); ?>
        </th>
        <th class="product-subtotal copy-upper copy-proxima-sbold copy-gray copy-normal copy-spacing text-left"><?php _e( 'Sub Total', 'woocommerce' ); ?>
        </th>
      </tr>
      </thead>
      <tbody>
      <?php
        if ( sizeof( $order->get_items() ) > 0 ) {

          foreach ( $order->get_items() as $item ) {
            $_product  = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
            $item_meta = new WC_Order_Item_Meta( $item['item_meta'] );
            ?>
            <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
              <td class="product-name">
                <table><tr>
                  <td>
                    <div class="product-details">
                      <table><tr>
                          <td>
                            <span class="product-thumbnail">
                              <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image() );

                                if ( ! $_product->is_visible() ) {
                                  echo $thumbnail;
                                } else {
                                  printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
                                }
                              ?>
                            </span>
                          </td><td>
                              <?php
                                if ( $_product && ! $_product->is_visible() ) {
                                  echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
                                } else {
                                  echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );
                                }

                                // Meta data
                                do_action( 'woocommerce_order_item_meta_start', $item['product_id'], $item, $order );
                                $order->display_item_meta( $item );
                                $order->display_item_downloads( $item );
                                do_action( 'woocommerce_order_item_meta_end', $item['product_id'], $item, $order );
                              ?>
                        </td>
                      </tr></table>
                    </div>
                  </td>
                  
                  <td>

                    <div>
                    <?php 
                      foreach ($item_meta as $key => $value) {
                        if($key == 'meta'){
                          $meta = unserialize($value['wristband_meta'][0]);
                          display_order_summary_thankyou($_product, $meta, $order);
                        }
                      }
                    ?>
                    </div>  
                </td>
                </tr></table>
              </td>
              <td class="product-quantity">
                <?php echo apply_filters( 'woocommerce_order_item_quantity_html', $item['qty'], $item ); ?>
              </td>
              <td class="product-total">
                <?php echo $order->get_formatted_line_subtotal( $item ); ?>
              </td>
            </tr>
            <?php

            if ( in_array( $order->status, array(
                  'processing',
                  'completed'
                ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) )
            ) {
              ?>
              <tr class="product-purchase-note">
                <td colspan="3"><?php echo apply_filters( 'the_content', $purchase_note ); ?></td>
              </tr>
            <?php
            }
          }
        }

        do_action( 'woocommerce_order_items_table', $order );
      ?>
      </tbody>
    </table>
  </div>
  <tfoot>
    <div class="row row-thank-you-detail">
      <div class="col-md-8">
        <div class="avada-customer-details woocommerce-content-box full-width">
        <header>
          <h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
        </header>
        <dl class="customer_details">
          <?php
            if ( $order->billing_email ) {
              echo '<dt>' . __( 'Email:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_email . '</dd><br />';
            }
            if ( $order->billing_phone ) {
              echo '<dt>' . __( 'Telephone:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_phone . '</dd>';
            }

            // Additional customer details hook
            do_action( 'woocommerce_order_details_after_customer_details', $order );
          ?>
        </dl>

        <?php if (get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no') : ?>

        <div class="col2-set addresses">

          <div class="col-1">

            <?php endif; ?>

            <header class="title">
              <h3 class="copy-upper"><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>
            </header>
            <address><p>
                <?php
                  if ( ! $order->get_formatted_billing_address() ) {
                    _e( 'N/A', 'woocommerce' );
                  } else {
                    echo $order->get_formatted_billing_address();
                  }
                ?>
              </p></address>

            <?php if (get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no') : ?>

          </div>
          <!-- /.col-1 -->

          <div class="col-2">

            <header class="title">
              <h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
            </header>
            <address><p>
                <?php
                  if ( ! $order->get_formatted_shipping_address() ) {
                    _e( 'N/A', 'woocommerce' );
                  } else {
                    echo $order->get_formatted_shipping_address();
                  }
                ?>
              </p></address>
          </div>
          <!-- /.col-2 -->
        </div>
        <!-- /.col2-set -->
      <?php endif; ?>

    <div class="clear"></div>

  </div>
      </div>
      <div class="col-md-4">
        <?php
          if ( $totals = $order->get_order_item_totals() ) {
            foreach ( $totals as $total ) : if($total['label'] == 'Shipping:') continue;
              ?>
              <tr>
                <td class="filler-td">&nbsp;</td>
                <th scope="row"><?php echo $total['label']; ?></th>
                <td class="product-total"><?php echo $total['value']; ?></td>
              </tr>
            <?php
            endforeach;
          }
        ?>
         <?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
      </div>
    </div>
  </tfoot>

<?php

}

add_action( 'woocommerce_view_order', 'Customize_avada_woocommerce_view_order_My_Account', 11 );
function Customize_avada_woocommerce_view_order_My_Account( $order_id ) {
  global $woocommerce;

  $order = new WC_Order( $order_id );

  ?>
  <div class="avada-order-details woocommerce-content-box full-width">
    <h2><?php _e( 'Order Details', 'woocommerce' ); ?></h2>
    <table class="shop_table order_details">
      <thead>
      <tr>
        <th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
        <th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
        <th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
      </tr>
      </thead>
      <tfoot>
      <?php
        if ( $totals = $order->get_order_item_totals() ) {
          foreach ( $totals as $total ) : if($total['label'] == 'Shipping:') continue;
            ?>
            <tr>
              <td class="filler-td">&nbsp;</td>
              <th scope="row"><?php echo $total['label']; ?></th>
              <td class="product-total"><?php echo $total['value']; ?></td>
            </tr>
          <?php
          endforeach;
        }
      ?>
      </tfoot>
      <tbody>
      <?php
        if ( sizeof( $order->get_items() ) > 0 ) {

          foreach ( $order->get_items() as $item ) {
            $_product  = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
            $item_meta = new WC_Order_Item_Meta( $item['item_meta'] );

            ?>
            <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
              <td class="product-name">
                <table>
                  <tr>
                    <td>
                      <span class="product-thumbnail">
                        <?php
                          $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image() );

                          if ( ! $_product->is_visible() ) {
                            echo $thumbnail;
                          } else {
                            printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
                          }
                        ?>
                      </span>

                      <div class="product-info">
                        <?php
                          if ( $_product && ! $_product->is_visible() ) {
                            echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
                          } else {
                            echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );
                          }

                          // Meta data
                          do_action( 'woocommerce_order_item_meta_start', $item['product_id'], $item, $order );
                          $order->display_item_meta( $item );
                          $order->display_item_downloads( $item );
                          do_action( 'woocommerce_order_item_meta_end', $item['product_id'], $item, $order );
                        ?>
                      </div>
                    </td>
                    <td style="width: 30px;">&nbsp;</td>
                    <td>
                      <?php 
                        foreach ($item_meta as $key => $value) {
                          if($key == 'meta'){
                            $meta = unserialize($value['wristband_meta'][0]);
                            display_order_summary($_product, $meta);
                          }
                        }
                      ?>
                    </td>
                  </tr>
                </table>
              </td>
              <td class="product-quantity">
                <?php echo apply_filters( 'woocommerce_order_item_quantity_html', $item['qty'], $item ); ?>
              </td>
              <td class="product-total">
                <?php echo $order->get_formatted_line_subtotal( $item ); ?>
              </td>
            </tr>
            <?php

            if ( in_array( $order->status, array(
                  'processing',
                  'completed'
                ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) )
            ) {
              ?>
              <tr class="product-purchase-note">
                <td colspan="3"><?php echo apply_filters( 'the_content', $purchase_note ); ?></td>
              </tr>
            <?php
            }
          }
        }

        do_action( 'woocommerce_order_items_table', $order );
      ?>
      </tbody>
    </table>
    <?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
  </div>

  <div class="avada-customer-details woocommerce-content-box full-width">
    <header>
      <h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
    </header>
    <dl class="customer_details">
      <?php
        if ( $order->billing_email ) {
          echo '<dt>' . __( 'Email:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_email . '</dd><br />';
        }
        if ( $order->billing_phone ) {
          echo '<dt>' . __( 'Telephone:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_phone . '</dd>';
        }

        // Additional customer details hook
        do_action( 'woocommerce_order_details_after_customer_details', $order );
      ?>
    </dl>

    <?php if (get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no') : ?>

    <div class="col2-set addresses">

      <div class="col-1">

        <?php endif; ?>

        <header class="title">
          <h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>
        </header>
        <address><p>
            <?php
              if ( ! $order->get_formatted_billing_address() ) {
                _e( 'N/A', 'woocommerce' );
              } else {
                echo $order->get_formatted_billing_address();
              }
            ?>
          </p></address>

        <?php if (get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no') : ?>

      </div>
      <!-- /.col-1 -->

      <div class="col-2">

        <header class="title">
          <h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
        </header>
        <address><p>
            <?php
              if ( ! $order->get_formatted_shipping_address() ) {
                _e( 'N/A', 'woocommerce' );
              } else {
                echo $order->get_formatted_shipping_address();
              }
            ?>
          </p></address>

      </div>
      <!-- /.col-2 -->

    </div>
    <!-- /.col2-set -->

  <?php endif; ?>

    <div class="clear"></div>

  </div>

<?php
}

function init_actions()
{
  remove_action( 'woocommerce_thankyou', 'avada_woocommerce_view_order', 10 );
  remove_action( 'woocommerce_view_order', 'avada_woocommerce_view_order', 10 );
}
add_action('init','init_actions');


function display_order_summary($_product, $meta)
{

// echo "<pre>";
// var_dump($meta);
// echo "---------------------------------------";
// var_dump($_product);
// die();
//var_dump($meta['custom']);
//var_dump($meta);

if (isset($meta['colortype'])){

  if ($meta['colortype'] == 'lanyard') {
    # code...
    display_lanyard_order_summary($_product, $meta);
  }else if ($meta['colortype'] == 'lapel-pins'){
    display_lapelpin_order_summary($_product, $meta);
  }else {
    if($meta['init_price'] != 0){
      ?>
      <span><?php echo $meta['total_qty']; ?> <?php echo ucfirst($meta['colortype']); ?> Wristbands: $<?php echo number_format($meta['init_price'], 2, '.', '') ?></span></br>
      <span>Shipping Fee: $<?php echo number_format($meta['shipping_price'], 2, '.', '') ?></span>
      <?php 
      }else {
        ?>
      <span>Shipping Fee: $<?php echo number_format($meta['shipping_price'], 2, '.', '') ?></span>
      <?php
      }
  }

   
}
else {
  ?>
    <label class="t-heading"><?php echo 'Wristband Width: ' . (isset($meta['size']) ? $meta['size'] : '') . ' Inch'; ?></label>
    <?php if (isset($meta['colors'])): ?>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <label class="CssTitleBlack CssTitleBold">Quantity and Colors:</label>
        <?php 
          $free_colors = $meta['free_colors'];
          foreach ($meta['colors'] as $pk => $color): if (!isset($color['name']) || empty($color['name'])) continue; 
        ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
                </em>
            </div>

            <?php if (isset($color['sizes']) && count($color['sizes']) != 0): ?>
              <ul class="fusion-checklist-2 fusion-checklist-1"
                style="font-size:12px;line-height:22.1px;">
                <?php if (strtolower ($_product->get_title()) == 'dual-layer'): ?>
                  <?php foreach ($color['sizes'] as $k => $qty): if ($qty <= 0) continue; ?>
                  <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                      <span>Outside Spray Color: 
                      <?php echo $qty.' '.$color['name'].' '.$color['type'].' '.($free_colors[$pk]['free'][$k] ? ('(+' . $free_colors[$pk]['free'][$k]).')' : '').' | '.ucfirst($k).' Size';?>
                      </span>
                    </div>
                  </li>
                <?php endforeach; ?>
                <?php else : ?>
                <?php foreach ($color['sizes'] as $k => $qty): if ($qty <= 0) continue; ?>
                  <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                      <span>
                      <?php echo $qty.' '.$color['name'].' '.$color['type'].' '.($free_colors[$pk]['free'][$k] ? ('(+' . $free_colors[$pk]['free'][$k]).')' : '').' | '.ucfirst($k).' Size';?>
                      </span>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
                <?php if (isset($color['text_color_name'])): ?>
                  <li class="fusion-li-item"> 
                    <div class="fusion-li-item-content"> 
                       <?php if (strtolower ($_product->get_title()) == 'dual-layer'): ?>
                         <span>Inner Wristband & Text Color: <?php echo $color['text_color_name']; ?></span>
                       <?php else : ?>
                        <span>Text Color: <?php echo $color['text_color_name']; ?></span>
                       <?php endif; ?>
                       
                    </div>
                  </li>
                <?php
                 endif; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <?php
    // if ($_product->get_title() != 'Blank') {
     if( (!empty($meta['font']) && $meta['font'] != '-1') || !empty($meta['messages']['Front Message']) || !empty($meta['messages']['Back Message']) || !empty($meta['messages']['Inside Message']) || !empty($meta['messages']['Continuous Message']) || !empty($meta['messages']['Additional Notes'])): ?>
      <?php  //if ($_product->get_title() != 'Blank') { ?>
      <label class="CssTitleBlack CssTitleBold">Text on Wristbands: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php if (!isset($meta['font']) || $meta['font'] != '-1'): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Font Style</span>: <?php echo $meta['font'];?>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['messages'])): foreach ($meta['messages'] as $label => $val): if (empty($val)) continue; ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php echo $label; ?></span>: <?php echo stripslashes($val); ?>
            </div>
          </li>
        <?php endforeach; endif; ?>
      </ul>
      <?php //} ?>
    <?php endif; //} ?>

    <?php if (!empty($meta['clipart']['back_end']) || !empty($meta['clipart']['back_end']) || !empty($meta['clipart']['back_start']) || !empty($meta['clipart']['front_end']) || !empty($meta['clipart']['front_start']) || !empty($meta['clipart']['wrap_end']) || !empty($meta['clipart']['wrap_start']) || !empty($meta['clipart']['center']) ): ?>
      <label class="CssTitleBlack CssTitleBold">Clipart: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php foreach ($meta['clipart'] as $k => $clipart): if (empty($clipart) || $k == 'view_position' || $k == 'wristband_stat') continue;?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php $position = ucfirst(str_replace('_', ' ', $k));
               echo $position == 'Center' ? 'Figured Logo' : $position; ?></span>:
               <?php if (preg_match('/(\.jpg|\.png|\.bmp)$/', $clipart)){ ?>
                <!-- <img
                  src="<?php //echo wp_upload_dir()['baseurl'] . '/clipart/' . $clipart; ?>"
                  alt="" width="16px" height="16px"> -->
                  <?php echo $clipart; ?>
              <?php } else {
                    $hasFa = strpos($clipart,'fa-');
                    if($hasFa === false){
                      ?>

                      <i class="<?php echo $clipart; ?>"></i>
                      <em><?php echo $meta['clipartname'][$k.'_name']; ?></em>
                      <?php
                    }else{
                  ?> 
                    <i class="fa <?php echo $clipart; ?>"></i>
                    <em><?php echo $meta['clipartname'][$k.'_name']; ?></em>
              <?php }} ?>
              <!-- (<em><?php echo $clipart; ?></em>) -->
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if (isset($meta['additional_options']) && count($meta['additional_options']) > 0): ?>
      <label class="CssTitleBlack CssTitleBold">Additional Options: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php foreach ($meta['additional_options'] as $k => $option): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
            <?php if ($option == 'Convert to Keychains') {
              $con_message = '';
               if ($meta['convert_message'] == $meta['total_qty']) {
                  $con_message = '- All';
               } else {
                  $con_message = '- '.$meta['convert_message'].' pieces';
               }
            ?>

              <span><?php echo $option; ?> <?php echo $con_message; ?></span>

            <?php } else { ?>
              <span><?php echo $option; ?></span>
            <?php } ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if (isset($meta['packaging_options'])): ?>
      <label class="CssTitleBlack CssTitleBold">Packaging: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <?php echo $meta['packaging_options']; ?>
            </div>
          </li>
      </ul>
    <?php endif; ?>
    <?php if ($meta['packaging_options']!= "No Packaging" && $meta['packaging_options']!= "Individual Packaging"): ?>
      <label class="CssTitleBlack CssTitleBold">Packaging Custom Logo/Design: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <?php echo $meta['packaging_image']; ?>
            </div>
          </li>
      </ul>
    <?php endif; ?>
    <label class="CssTitleBlack CssTitleBold">Production and Shipping: </label>
    <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <?php if (isset($meta['customization_location'])): ?>
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span><?php echo $meta['customization_location']; ?></span>
          </div>
        </li>
      <?php endif; ?>
      <?php if (isset($meta['customization_date_production'])): ?>
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span>Production Time</span>: <?php echo $meta['customization_date_production']; ?>
          </div>
        </li>
      <?php endif; ?>
      <?php if (isset($meta['customization_date_shipping'])): ?>
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span>Shipping Time</span>: <?php echo $meta['customization_date_shipping']; ?>
          </div>
        </li>
      <?php endif; ?>
      <?php if (isset($meta['guaranteed_delivery'])): ?>
        <li class="fusion-li-item">
            
          <div class="fusion-li-item-content">
            <span>Guaranteed to arrive on </span><?php //echo $meta['guaranteed_delivery']; ?>
            <?php 
              $now = new DateTime();           
              $newdate = $now->format("l, F d, Y");
              if (isset($meta['total_days'])) {
                $additionaldays = $meta['total_days'];
                $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$additionaldays.' weekdays'));
                echo $datetoformat;
              } else {
                $production = $meta['customization_date_production'];
                $arr1 = explode(' ',trim($production));
                $shipping = $meta['customization_date_shipping'];
                $arr2 = explode(' ',trim($shipping));
                $total_days = $arr1[0] + $arr2[0];
                $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$total_days.' weekdays'));
                echo $datetoformat;
              }
            ?>
          </div>
        </li>
      <?php endif; ?>
    </ul>
    <!-- EOL : View Product Summary Details -->
  <?php
  }
}
function display_order_summary_thankyou($_product, $meta, $order)
{
if (isset($meta['colortype'])){
  if ($meta['colortype'] == 'lanyard') {
    # code...
    display_lanyard_order_summary($_product, $meta);
  }else {
    if($meta['init_price'] != 0){
      ?>
      <span><?php echo $meta['total_qty']; ?> <?php echo ucfirst($meta['colortype']); ?> Wristbands: $<?php echo number_format($meta['init_price'], 2, '.', '') ?></span></br>
      <span>Shipping Fee: $<?php echo number_format($meta['shipping_price'], 2, '.', '') ?></span>
      <?php 
      }else {
        ?>
      <span>Shipping Fee: $<?php echo number_format($meta['shipping_price'], 2, '.', '') ?></span>
      <?php
      }
  }
}
else {
  ?>
    <label class="t-heading"><?php echo 'Wristband Width: ' . (isset($meta['size']) ? $meta['size'] : '') . ' Inch'; ?></label>
    <?php if (isset($meta['colors'])): ?>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <label class="CssTitleBlack CssTitleBold">Quantity and Colors:</label>
        <?php 
          $free_colors = $meta['free_colors'];
          foreach ($meta['colors'] as $pk => $color): if (!isset($color['name']) || empty($color['name'])) continue; 
        ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
                </em>
            </div>

            <?php if (isset($color['sizes']) && count($color['sizes']) != 0): ?>
              <ul class="fusion-checklist-2 fusion-checklist-1"
                style="font-size:12px;line-height:22.1px;">
                <?php if (strtolower ($_product->get_title()) == 'dual-layer'): ?>
                  <?php foreach ($color['sizes'] as $k => $qty): if ($qty <= 0) continue; ?>
                  <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                      <span>Outside Spray Color: 
                      <?php echo $qty.' '.$color['name'].' '.$color['type'].' '.($free_colors[$pk]['free'][$k] ? ('(+' . $free_colors[$pk]['free'][$k]).')' : '').' | '.ucfirst($k).' Size';?>
                      </span>
                    </div>
                  </li>
                <?php endforeach; ?>
                <?php else : ?>
                <?php foreach ($color['sizes'] as $k => $qty): if ($qty <= 0) continue; ?>
                  <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                      <span>
                      <?php echo $qty.' '.$color['name'].' '.$color['type'].' '.($free_colors[$pk]['free'][$k] ? ('(+' . $free_colors[$pk]['free'][$k]).')' : '').' | '.ucfirst($k).' Size';?>
                      </span>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
                <?php if (isset($color['text_color_name'])): ?>
                  <li class="fusion-li-item"> 
                    <div class="fusion-li-item-content"> 
                       <?php if (strtolower ($_product->get_title()) == 'dual-layer'): ?>
                         <span>Inner Wristband & Text Color: <?php echo $color['text_color_name']; ?></span>
                       <?php else : ?>
                        <span>Text Color: <?php echo $color['text_color_name']; ?></span>
                       <?php endif; ?>
                       
                    </div>
                  </li>
                <?php
                 endif; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <?php
    // if ($_product->get_title() != 'Blank') {
     if( (!empty($meta['font']) && $meta['font'] != '-1') || !empty($meta['messages']['Front Message']) || !empty($meta['messages']['Back Message']) || !empty($meta['messages']['Inside Message']) || !empty($meta['messages']['Continuous Message']) || !empty($meta['messages']['Additional Notes'])): ?>
      <?php  if ($_product->get_title() != 'Blank') { ?>
      <label class="CssTitleBlack CssTitleBold">Text on Wristbands: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php if (!isset($meta['font']) || $meta['font'] != '-1'): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Font Style</span>: <?php echo $meta['font'];?>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['messages'])): foreach ($meta['messages'] as $label => $val): if (empty($val)) continue; ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php echo $label; ?></span>: <?php echo stripslashes($val); ?>
            </div>
          </li>
        <?php endforeach; endif; ?>
      </ul>
      <?php } ?>
    <?php endif; //} ?>

    <?php if (!empty($meta['clipart']['back_end']) || !empty($meta['clipart']['back_end']) || !empty($meta['clipart']['back_start']) || !empty($meta['clipart']['front_end']) || !empty($meta['clipart']['front_start']) || !empty($meta['clipart']['wrap_end']) || !empty($meta['clipart']['wrap_start']) || !empty($meta['clipart']['center']) ): ?>
      <label class="CssTitleBlack CssTitleBold">Clipart: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php foreach ($meta['clipart'] as $k => $clipart): if (empty($clipart) || $k == 'view_position' || $k == 'wristband_stat') continue;?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php $position = ucfirst(str_replace('_', ' ', $k));
               echo $position; ?></span>:<?php if (preg_match('/(\.jpg|\.png|\.bmp)$/', $clipart)){ ?>
                <!-- <img
                  src="<?php //echo wp_upload_dir()['baseurl'] . '/clipart/' . $clipart; ?>"
                  alt="" width="16px" height="16px"> -->
                  <?php echo $clipart; ?>
              <?php } else {
                    $hasFa = strpos($clipart,'fa-');
                    if($hasFa === false){s
                      ?>

                      <i class="<?php echo $clipart; ?>"></i>
                      <em><?php echo $meta['clipartname'][$k.'_name']; ?></em>
                      <?php
                    }else{
                  ?> 
                    <i class="fa <?php echo $clipart; ?>"></i>
                    <em><?php echo $meta['clipartname'][$k.'_name']; ?></em>
              <?php }} ?>
              <!-- (<em><?php echo $clipart; ?></em>) -->
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if (isset($meta['additional_options']) && count($meta['additional_options']) > 0): ?>
      <label class="CssTitleBlack CssTitleBold">Additional Options: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <!-- <?php //foreach ($meta['additional_options'] as $k => $option): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php //echo $option; ?></span>
            </div>
          </li>
        <?php //endforeach; ?> -->
        <?php foreach ($meta['additional_options'] as $k => $option): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
            <?php if ($option == 'Convert to Keychains') {
              $con_message = '';
               if ($meta['convert_message'] == $meta['total_qty']) {
                  $con_message = '- All';
               } else {
                  $con_message = '- '.$meta['convert_message'].' pieces';
               }
            ?>
              <span><?php echo $option; ?> <?php echo $con_message; ?></span>

            <?php } else { ?>
              <span><?php echo $option; ?></span>
            <?php } ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <label class="CssTitleBlack CssTitleBold">Production and Shipping: </label>
    <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <?php if (isset($meta['customization_location'])): ?>
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span><?php echo $meta['customization_location']; ?></span>
          </div>
        </li>
      <?php endif; ?>
      <?php if (isset($meta['customization_date_production'])): ?>
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span>Production Time</span>: <?php echo $meta['customization_date_production']; ?>
          </div>
        </li>
      <?php endif; ?>
      <?php if (isset($meta['customization_date_shipping'])): ?>
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span>Shipping Time</span>: <?php echo $meta['customization_date_shipping']; ?>
          </div>
        </li>
      <?php endif; ?>
      <?php if (isset($meta['guaranteed_delivery'])): ?>
        <li class="fusion-li-item">
            <?php if ($order->payment_method != 'cheque') { ?>
          <div class="fusion-li-item-content">
            <span>Guaranteed to arrive on </span><?php //echo $meta['guaranteed_delivery']; ?>
            <?php 
              $now = new DateTime();           
              $newdate = $now->format("l, F d, Y");
              if (isset($meta['total_days'])) {
                $additionaldays = $meta['total_days'];
                $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$additionaldays.' weekdays'));
                echo $datetoformat;
              } else {
                $production = $meta['customization_date_production'];
                $arr1 = explode(' ',trim($production));
                $shipping = $meta['customization_date_shipping'];
                $arr2 = explode(' ',trim($shipping));
                $total_days = $arr1[0] + $arr2[0];
                $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$total_days.' weekdays'));
                echo $datetoformat;
              }
            ?>
          </div>
          <?php } ?>
        </li>
      <?php endif; ?>
    </ul>
    <!-- EOL : View Product Summary Details -->
  <?php
  }
}
function getMetaToAutoSet($TempID, $Status)
{
  $Infos = false;
  if(array_key_exists($TempID, WC()->cart->get_cart()) && $Status == 'edit')
  {
    $cart_item_key = $TempID;
    $cart_item = WC()->cart->get_cart()[$TempID];

    $meta = isset($cart_item['wristband_meta']) ? $cart_item['wristband_meta'] : array();
    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

    $Wrist_Style = $_product->get_title();
    $Wrist_Size = (isset($meta['size']) ? $meta['size'] : '');
  }
  elseif($Status == 'design')
  {
    $meta = json_decode(custom_encrypt_decrypt('decrypt', $TempID), true);

    $Wrist_Style = (isset($meta['title']) ? $meta['title'] : '');
    $Wrist_Size = (isset($meta['size']) ? $meta['size'] : '');
  } elseif($Status == 'copy')
  {
    $cart_item_key = $TempID;
    $cart_item = WC()->cart->get_cart()[$TempID];

    $meta = isset($cart_item['wristband_meta']) ? $cart_item['wristband_meta'] : array();
    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

    $Wrist_Style = $_product->get_title();
    $Wrist_Size = (isset($meta['size']) ? $meta['size'] : '');
  }

  if(isset($meta['colors']))
  {
    $free_colors = $meta['free_colors'];
    foreach ($meta['colors'] as $pk => $color): 
      if (!isset($color['name']) || empty($color['name'])) continue;

        $ColorName = $color['name'];
        $ColorType = $color['type'];
        $WristColor = $color['color']; 
        $TextColorName = $color['text_color_name'];
        $TextColor = $color['text_color'];

        $adult = 0;
        $medium = 0;
        $youth = 0;
        $adult_free = 0;
        $medium_free = 0;
        $youth_free = 0;

        foreach ($color['sizes'] as $k => $qty): if ($qty <= 0) continue; 
           if ($k == "adult"){ $adult = $qty; } 
           elseif ($k == "medium"){ $medium = $qty;} 
           else { $youth = $qty; }
        endforeach;

        if(isset($meta['free_colors']))
        {
          foreach ($free_colors[$pk]['free'] as $k => $qty): if ($qty <= 0) continue; 
             if ($k == "adult"){ $adult_free = $qty; } 
             elseif ($k == "medium"){ $medium_free = $qty;} 
             else { $youth_free = $qty; }
          endforeach;
        }


        if ($MultiAdd == ""){ $MultiAdd = $ColorName."^".$ColorType."^".$WristColor."^".$TextColorName."^".$TextColor."^".$adult."^".$medium."^".$youth."^".$adult_free."^".$medium_free."^".$youth_free;
        } else { $MultiAdd = $MultiAdd."~".$ColorName."^".$ColorType."^".$WristColor."^".$TextColorName."^".$TextColor."^".$adult."^".$medium."^".$youth."^".$adult_free."^".$medium_free."^".$youth_free; }
        $Infos['FontStyle'] =  $meta['font'];

        if(isset($meta['messages']))
        {
          foreach ($meta['messages'] as $label => $val): if (empty($val)) continue;
            $convert_val = htmlspecialchars(stripslashes($val), ENT_QUOTES, 'UTF-8');
              if ($label == "Front Message"){ $Infos['Front_msg'] = $convert_val; }
              elseif ($label == "Back Message"){ $Infos['Back_msg'] = $convert_val; }
              elseif ($label == "Continuous Message"){ $Infos['Wrap_msg'] = $convert_val; }
              elseif ($label == "Inside Message"){ $Infos['Inside_msg'] = $convert_val; }
              elseif ($label == "Additional Notes"){ $Infos['AddNotes_msg'] = $convert_val; }
          endforeach;
        }

        if(isset($meta['additional_options']))
        {
            foreach ($meta['additional_options'] as $k => $option):
                if ($option == "Mosquito Repellant"){ $Repellant = $option; }
                elseif ($option == "Eco Friendly"){ $Eco = $option; }
                elseif ($option == "3mm Thick"){ $Thick = $option; }
                elseif ($option == "Digital 3D Mock Up"){ $DigitalPro = $option; }
                elseif ($option == "Glitters"){ $Glitters = $option; }
                elseif ($option == "Sequentially Numbered"){ $Sequentially = $option; }
                else { $Convert_KeyC = $option; }
            endforeach;
        }

        if(isset($meta['clipart']))
        {
          foreach ($meta['clipart'] as $k => $clipart): if (empty($clipart)) continue;
              if ($k == "front_start"){ $front_start = $clipart; }
              elseif ($k == "front_end"){ $front_end = $clipart; }
              elseif ($k == "back_start"){ $back_start = $clipart; }
              elseif ($k == "back_end"){ $back_end = $clipart; }
              elseif ($k == "wrap_start"){ $wrap_start = $clipart; }
              elseif ($k == "wrap_end"){ $wrap_end = $clipart; }
              elseif ($k == "center"){ $center = $clipart; }
              elseif ($k == "view_position"){ $view_position = $clipart; }
              else{ $wristband_stat = $clipart; }
          endforeach;
        }

        $C_location = $meta['customization_location']; 
        $C_date_prod = $meta['customization_date_production']; 
        $C_date_ship = $meta['customization_date_shipping']; 
        $guaranteed_delivery = $meta['guaranteed_delivery']; 
        $Convert_Msg = $meta['convert_message'];
        $Info = $Wrist_Style."|".$Wrist_Size."|".$MultiAdd;
    endforeach;
  }
  $InfoPackaging = $meta['packaging_options'];
  $InfoPackagingImage = $meta['packaging_image'];
  $InfoCustomerEmail = $meta['customer_email'];
  $InfoCustomerName = $meta['customer_firstname'];
  $Infototalqty = $meta['total_qty'];
  $Infos['style'] = $Wrist_Style;
  $Infos['size'] = $Wrist_Size;
  $Infos['wristband_stat'] = $wristband_stat;
  $Infos['all'] = $Info."|".$C_location."|".$C_date_prod."|".$C_date_ship."|".$Repellant."|".$Eco."|".$Thick."|".$DigitalPro."|".$front_start."|".$front_end."|".$back_start."|".$back_end."|".$view_position."|".$wristband_stat."|".$guaranteed_delivery."|".$wrap_start."|".$wrap_end."|".$center."|".$Convert_KeyC."|".$Convert_Msg."|".$Infototalqty."|".$InfoPackaging."|".$InfoPackagingImage."|".$Glitters."|".$Sequentially."|".$InfoCustomerEmail."|".$InfoCustomerName;
      // echo "<pre>";
      // var_dump($Infos);

  return $Infos;

  
}

function custom_encrypt_decrypt($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'WristbandCreation V2 2015 - key';
    $secret_iv = 'WristbandCreation V2 2015 - iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function set_html_content_type() {
    return 'text/html';
}


// removing action
// remove_action( 'woocommerce_cart_collaterals','woocommerce_cross_sell_display' );
// remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );﻿

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// rename the "Have a Coupon?" message on the checkout page
function woocommerce_rename_coupon_message_on_checkout() {
  return 'Have a Promo Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
// rename the coupon field on the checkout page
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {
  // bail if not modifying frontend woocommerce text
  if ( is_admin() || 'woocommerce' !== $text_domain ) {
    return $translated_text;
  }
  if ( 'Coupon code' === $text ) {
    $translated_text = 'Promo Code';
  
  } elseif ( 'Apply Coupon' === $text ) {
    $translated_text = 'Apply';
  }
  return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );

include_once ( get_stylesheet_directory() . '/fontstylelabel.php' );

/* hide coupon code in the checkout */
// function hide_coupon_field_on_checkout( $enabled ) {
//   if ( is_checkout() ) {
//     $enabled = false;
//   }
//   return $enabled;
// }
// add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_checkout' );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20 );

remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form',1);



//add_action( 'woocommerce_thankyou', 'my_change_status_function' );
// add_filter( 'woocommerce_cart_needs_shipping', '__return_true' );
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

function my_change_status_function( $order_id ) {

    $order = new WC_Order( $order_id );
    $order->update_status( 'completed' );
    wp_send_email_after_order( $order_id );
}

function register_my_menu() {
  register_nav_menu('header-nav-menu',__( 'Header Nav Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_action( 'wp_print_scripts', 'deregister_unnecessary_javascript', 100 );

function deregister_unnecessary_javascript() {
   if ( is_cart() ) {
   // use condition is_page( array( 42, 'about-me', 'Contact' ) ) for multiple pages at once
     wp_deregister_script( 'avada-woocommerce' );
     wp_deregister_script( 'bootstrap' );
     // wp_deregister_script( 'cssua' );
     // wp_deregister_script( 'jquery.easyPieChart' );
     // wp_deregister_script( 'excanvas' );
     // wp_deregister_script( 'Froogaloop' );
     // wp_deregister_script( 'imagesLoaded' );
     // wp_deregister_script( 'jquery.infinitescroll' );
     // wp_deregister_script( 'jquery.appear' );
     // wp_deregister_script( 'jquery.touchSwipe' );
     // wp_deregister_script( 'jquery.carouFredSel' );
     // wp_deregister_script( 'jquery.countTo' );
     // wp_deregister_script( 'jquery.countdown' );
     // wp_deregister_script( 'jquery.cycle' );
     // wp_deregister_script( 'jquery.easing' );
     // wp_deregister_script( 'jquery.elasticslider' );
     // wp_deregister_script( 'jquery.fitvids' );
     // wp_deregister_script( 'jquery.flexslider' );
     // wp_deregister_script( 'jquery.fusion_maps' );
     // wp_deregister_script( 'jquery.hoverflow' );
     // wp_deregister_script( 'jquery.hoverIntent' );
     // wp_deregister_script( 'jquery.placeholder' );
     // wp_deregister_script( 'jquery.toTop' );
     // wp_deregister_script( 'jquery.waypoints' );
     // wp_deregister_script( 'modernizr' );
     // wp_deregister_script( 'jquery.requestAnimationFrame' );
     // wp_deregister_script( 'jquery.mousewheel' );
     // wp_deregister_script( 'ilightbox.packed' );
     wp_deregister_script( 'avada-lightbox' );
     wp_deregister_script( 'avada-header' );
     wp_deregister_script( 'avada-select' );
     wp_deregister_script( 'avada-parallax' );
     wp_deregister_script( 'avada-video-bg' );
     wp_deregister_script( 'avada' );
     // wp_deregister_script( 'isotope' );
 }
}

add_action('woocommerce_email_header', 'add_css_to_email');
 
function add_css_to_email() {
echo '
<style type="text/css">
table ul {
  padding: 0;
}
table time {
  font-size: 16px !important;
}
table label {
  margin-top: 0 !important;
}
table h2, table h3 {
  color: #333333;
}
table td {
  color: #202020;
  font-size: 16px;
  border: none !important;
}
td {
  border: none !important;
}
table a {
  color: #00acee;
}
tfoot th {
  border: none;
}
tfoot tr {
  display: table;
  width: 100%;
}
</style>
';

}

// for Lanyards cart page

function display_lanyard_order_summary($_product, $meta){
  // echo "<pre>";
  // var_dump($meta);
  ?>
  <label class="t-heading"><?php echo 'Lanyard Width: ' . (isset($meta['width']) ? $meta['width'] : '') . ' Inch'; ?></label>
  <br/>
  <?php if (isset($meta['lanyard_color'])): ?>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <label class="CssTitleBlack CssTitleBold">Quantity and Colors:</label>
        <?php 
          foreach ($meta['lanyard_color'] as $pk => $color):
        ?>
                  <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                      <span>
                      <?php echo $color['quantity'].' '.$color['name'].' '; ?>
                      <?php if ($color['text_color_name'] != 'none'): echo '- '.$color['text_color_name'].' (text) '; endif; ?>
                      <?php if ($color['addimprint_color_name'] != 'none'): echo '- '.$color['addimprint_color_name'].' (additional imprint)'; endif; ?>
                      </span>
                    </div>
                  </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

  <?php
  if ($meta['messageoption'] == 'message_cliparts') {
     if( (!empty($meta['font']) && $meta['font'] != '-1') && !empty($meta['message'])): ?>
     <label class="CssTitleBlack CssTitleBold">Text on Wristbands: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <li class="fusion-li-item">
                <div class="fusion-li-item-content">
                  <span>Font Style</span>: <?php echo $meta['font'];?>
                </div>
      </li>
      <li class="fusion-li-item">
                <div class="fusion-li-item-content">
                  <span>Message</span>: <?php echo $meta['message'];?>
                </div>
      </li>
      </ul>
      <?php endif; ?>
  <?php if ( !empty($meta['clipart']['clip_start']) || !empty($meta['clipart']['clip_end']) ): ?>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <label class="CssTitleBlack CssTitleBold">Clipart:</label>
      <?php if (isset($meta['clipart']['clip_start'])): ?>
        <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                     <span>Clipart Start</span>:
                      <?php echo $meta['clipart']['clip_start']; ?>
                    </div>
        </li>
      <?php endif ?>
      <?php if (isset($meta['clipart']['clip_end'])): ?>
        <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                     <span>Clipart End</span>:
                      <?php echo $meta['clipart']['clip_end']; ?>
                    </div>
        </li>
      <?php endif ?>
      </ul>
  <?php endif; } else { ?>
  <label class="CssTitleBlack CssTitleBold">Custom Logo Name: </label>
  <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <li class="fusion-li-item">
                <div class="fusion-li-item-content">
                  <span><?php echo $meta['custom_image'];?></span>
                </div>
      </li>
  </ul>
  <?php } ?>
  <?php
     if( (!empty($meta['imprint_option'])) ): ?>
     <label class="CssTitleBlack CssTitleBold">Imprint Option: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <li class="fusion-li-item">
                <div class="fusion-li-item-content">
                  <span><?php if ($meta['imprint_option'] == 'One-Side') {
                    echo "One Side";
                  } else echo "Two Side"; ?></span> 
                </div>
      </li>
      </ul>
  <?php endif; ?>
  <?php
     if( (!empty($meta['attachmentname']) && $meta['attachmentname'] != '-1') && !empty($meta['attachmentname'])): ?>
     <label class="CssTitleBlack CssTitleBold">Attachment: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <li class="fusion-li-item">
                <div class="fusion-li-item-content">
                  <span><?php echo $meta['attachmentname'];?></span> 
                </div>
      </li>
      </ul>
  <?php endif; ?>
  <?php if (isset($meta['additional_options'])): ?>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <label class="CssTitleBlack CssTitleBold">Additional Options:</label>
        <?php 
          foreach ($meta['additional_options'] as $pk => $color):
        ?>
                  <li class="fusion-li-item nobullet">
                    <div class="fusion-li-item-content">
                      <span>
                      <?php echo $color; ?>
                      </span>
                    </div>
                  </li>
        <?php endforeach; ?>
      </ul>
  <?php endif; ?>
  <?php if (isset($meta['badge_text'])): ?>
      <label class="CssTitleBlack CssTitleBold">Badge Holder: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <li class="fusion-li-item">
                <div class="fusion-li-item-content">
                  <span><?php echo $meta['badge_text'];?></span> 
                </div>
      </li>
      </ul>
  <?php endif; ?>
      <label class="CssTitleBlack CssTitleBold">Production and Shipping: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php if (isset($meta['customization_location'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php echo $meta['customization_location']; ?></span>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['customization_date_production'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Production Time</span>: <?php echo $meta['customization_date_production']; ?>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['customization_date_shipping'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Shipping Time</span>: <?php echo $meta['customization_date_shipping']; ?>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['customization_total_days'])): ?>
          <li class="fusion-li-item">
              
            <div class="fusion-li-item-content">
              <span>Guaranteed to arrive on </span><?php //echo $meta['guaranteed_delivery']; ?>
              <?php 
                $now = new DateTime();           
                $newdate = $now->format("l, F d, Y");
                if (isset($meta['customization_total_days'])) {
                  $additionaldays = $meta['customization_total_days'];
                  $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$additionaldays.' weekdays'));
                  echo $datetoformat;
                } else {
                  $production = $meta['customization_date_production'];
                  $arr1 = explode(' ',trim($production));
                  $shipping = $meta['customization_date_shipping'];
                  $arr2 = explode(' ',trim($shipping));
                  $total_days = $arr1[0] + $arr2[0];
                  $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$total_days.' weekdays'));
                  echo $datetoformat;
                }
              ?>
            </div>
          </li>
        <?php endif; ?>
      </ul>
<?php 
}

function display_lapelpin_order_summary($_product, $meta){
  ?>

  <label class="t-heading"><?php echo 'Lapel Pin Size: ' . (isset($meta['size']) ? $meta['size'] : '') . ' Inch'; ?></label>
  <br/>
  <?php if (isset($meta['lapelpins_order'])): ?>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <label class="CssTitleBlack CssTitleBold">Quantity and Colors:</label>
        <?php 
          foreach ($meta['lapelpins_order'] as $pk => $order):
        ?>
            <li class="fusion-li-item nobullet">
              <div class="fusion-li-item-content">
                <span>
                <?php echo $order['quantity'].' - '.$order['pin_color'].' '; ?>
                </span>
              </div>
            </li>
        <?php endforeach; ?>
      </ul>
  <?php endif; ?>
  <?php if(isset($meta['custom_image'])): ?>
    <label class="CssTitleBlack CssTitleBold">Custom Image Name: </label>
    <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span><?php echo $meta['custom_image'];?></span>
          </div>
        </li>
    </ul>
  <?php endif; ?>  
  <?php 
    if(isset($meta['attachmentname'])): ?>
    <label class="CssTitleBlack CssTitleBold">Pin's Back Attachment: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
      <li class="fusion-li-item">
          <div class="fusion-li-item-content">
            <span></span> <?php echo $meta['attachmentname'];?>
          </div>
      </li>
      </ul>
  <?php endif; ?>
  <?php
     if(isset($meta['packaging'])): ?>
     <label class="CssTitleBlack CssTitleBold">Packaging: </label>
        <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span></span> <?php echo $meta['packaging'];?>
            </div>
        </li>
        </ul>
  <?php endif; ?>
      <label class="CssTitleBlack CssTitleBold">Additional Options: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
          <?php if (isset($meta['backstamp'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Backstamp: $<?php echo $meta['backstamp']; ?></span>
            </div>
            <div class="fusion-li-item-content">
              <span>Backstamp Message: <?php echo $meta['backstamp_text']; ?></span>
            </div>
          </li>
        <?php endif; ?>
          <?php if (isset($meta['consecutive_number'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Consecutive Number: $<?php echo $meta['consecutive_number']; ?> each pin</span>
            </div>
          </li>
        <?php endif; ?>
      </ul>
      <label class="CssTitleBlack CssTitleBold">Production and Shipping: </label>
      <ul class="fusion-checklist fusion-checklist-1" style="font-size:12px;line-height:22.1px;">
        <?php if (isset($meta['customization_location'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span><?php echo $meta['customization_location']; ?></span>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['customization_date_production'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Production Time</span>: <?php echo $meta['customization_date_production']; ?>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['customization_date_shipping'])): ?>
          <li class="fusion-li-item">
            <div class="fusion-li-item-content">
              <span>Shipping Time</span>: <?php echo $meta['customization_date_shipping']; ?>
            </div>
          </li>
        <?php endif; ?>
        <?php if (isset($meta['customization_total_days'])): ?>
          <li class="fusion-li-item">
              
            <div class="fusion-li-item-content">
              <span>Guaranteed to arrive on </span><?php //echo $meta['guaranteed_delivery']; ?>
              <?php 
                $now = new DateTime();           
                $newdate = $now->format("l, F d, Y");
                if (isset($meta['customization_total_days'])) {
                  $additionaldays = $meta['customization_total_days'];
                  $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$additionaldays.' weekdays'));
                  echo $datetoformat;
                } else {
                  $production = $meta['customization_date_production'];
                  $arr1 = explode(' ',trim($production));
                  $shipping = $meta['customization_date_shipping'];
                  $arr2 = explode(' ',trim($shipping));
                  $total_days = $arr1[0] + $arr2[0];
                  $datetoformat = date('l, F d, Y', strtotime($newdate. ' +'.$total_days.' weekdays'));
                  echo $datetoformat;
                }
              ?>
            </div>
          </li>
        <?php endif; ?>
      </ul>
<?php 
}


/*
add to cart totals
*/
// define the woocommerce_cart_subtotal callback 
// function filter_woocommerce_cart_subtotal( $cart_subtotal, $compound, $instance ) { 
//     // make filter magic happen here...
//   $subtotal = 0;
//     foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
//         $meta = isset($cart_item['wristband_meta']) ? $cart_item['wristband_meta'] : array();
//         $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
//         $value = $_product->price;
//         $subtotal += $value;
//       }

//     return "$".$subtotal; 
// }; 
         
// // add the filter 
// add_filter( 'woocommerce_cart_subtotal', 'filter_woocommerce_cart_subtotal', 10, 3 ); 


// // define the woocommerce_cart_totals_order_total_html callback 
// function filter_woocommerce_cart_totals_order_total_html( $value ) { 
//     // make filter magic happen here... 
//     return $value; 
// }; 
         
// // add the filter 
// add_filter( 'woocommerce_cart_totals_order_total_html', 'filter_woocommerce_cart_totals_order_total_html', 10, 1 )


/* ADD ADMIN NOTIFICATION ON CUSTOMER COMPLETED ORDER */

// add_filter( 'woocommerce_email_recipient_customer_completed_order', 'your_email_recipient_filter_function', 10, 2);

// function your_email_recipient_filter_function($recipient, $object) {
//     $recipient = $recipient . ', philwebservices.edna@gmail.com';
//     return $recipient;
// }
// add_filter( 'woocommerce_email_headers', 'mycustom_headers_filter_function', 10, 2);

// function mycustom_headers_filter_function( $headers, $object ) {
//     if ($object == 'customer_completed_order') {
//         $headers .= 'BCC: Chris <philwebservices.vanessa@gmail.com>' . "\r\n";
//     }

//     return $headers;
// }



//remove query strings from static resources
function _remove_script_version( $src ){ $parts = explode( '?ver', $src ); return $parts[0]; } add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

// //country selection dropdown
// add_action( 'wp_enqueue_scripts', 'agentwp_dequeue_stylesandscripts', 100 );

// function agentwp_dequeue_stylesandscripts() {
//   if ( class_exists( 'woocommerce' ) ) {
//   wp_dequeue_style( 'select2' );
//   wp_deregister_style( 'select2' );

//   wp_dequeue_script( 'select2');
//   wp_deregister_script('select2');

//   }
// }


// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
// if (!(is_admin() )) {
//     function defer_parsing_of_js ( $url ) {
//         if ( FALSE === strpos( $url, '.js' ) ) return $url;
//         if ( strpos( $url, 'jquery.js' ) ) return $url;
//         // return "$url' defer ";
//         return "$url' defer onload='";
//     }
//     add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
// }

// function defer_parsing_of_js ( $url ) {
// if ( FALSE === strpos( $url, '.js' ) ) return $url;
// if ( strpos( $url, 'jquery.js' ) ) return $url;
// return "$url' defer ";
// }
// add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
$user = new WP_User( 3 );
$user->add_cap( 'manage_options');

function cor_rel_next_prev_pagination() {
  global $paged;
  if ( get_previous_posts_link() ) { ?>
  <link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>">
  <?php
  }
  if ( get_next_posts_link() ) { ?>
  <link rel="next" href="<?php echo get_pagenum_link( $paged + 1 ); ?>">
  <?php
  }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
add_action('wp_head', 'cor_rel_next_prev_pagination');

add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11); 
function dequeue_woocommerce_cart_fragments() { if (is_front_page() || is_page('order-now')) wp_dequeue_script('wc-cart-fragments'); }

 // function parallelize_hostnames($url, $id) {
 // $hostname = par_get_hostname($url); //call supplemental function
 // $url = str_replace(parse_url(get_bloginfo('url'), PHP_URL_HOST), $hostname, $url);
 // return $url;
 // }
 // function par_get_hostname($name) {
 // $subdomains = array('gwplabs.com'); //add your subdomains here, as many as you want.
 // $host = abs(crc32(basename($name)) % count($subdomains));
 // $hostname = $subdomains[$host];
 // return $hostname;
 // }
 // add_filter('wp_get_attachment_url', 'parallelize_hostnames', 10, 2);

//Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    $meta = isset($cart_item['wristband_meta']) ? $cart_item['wristband_meta'] : array();
  }
  $fields['billing']['billing_first_name']['default'] = $meta['customer_firstname'];
  $fields['billing']['billing_email']['default'] = $meta['customer_email'];
  $fields['shipping']['shipping_first_name']['default'] = $meta['customer_firstname'];
  return $fields;
}

add_action( 'wp', 'init' );
function init() {
  if (is_wc_endpoint_url( 'order-pay' )){
    function cus_meta_script() {
          wp_enqueue_script('update-meta-js', get_stylesheet_directory_uri() . '/wristband/assets/js/update-meta.js', array( 'jquery' ), false, true);

          // wp_localize_script('update-meta-js', 'meta_ajax', array( 
          //   'ajax_url' => admin_url('admin-ajax.php')
          // ));
          wp_localize_script( 'update-meta-js', 'meta_ajax', array( 'customajax' => plugins_url('my_custom_ajax.php' ) ) );
    }
    add_action('wp_enqueue_scripts' , 'cus_meta_script');
  }
}

add_action("wp_customajax_update_meta", "update_meta_func");
add_action("wp_customajax_nopriv_update_meta", "update_meta_func");
function update_meta_func() {
  $meta = $_POST['meta'];
  //$oid = $_POST['meta']['id'];
  //foreach ($_POST['meta'] as $key => $meta) {
    # code...
    //update_post_meta( $oid, "'".$key."'", $meta );
    update_post_meta( $meta['id'], '_billing_first_name', $meta['_billing_first_name'] );
    update_post_meta( $meta['id'], '_billing_last_name', $meta['_billing_last_name'] );
    update_post_meta( $meta['id'], '_billing_company', $meta['_billing_company'] );
    update_post_meta( $meta['id'], '_billing_address_1', $meta['_billing_address_1'] );
    update_post_meta( $meta['id'], '_billing_address_2', $meta['_billing_address_2'] );
    update_post_meta( $meta['id'], '_billing_city', $meta['_billing_city']);
    update_post_meta( $meta['id'], '_billing_state', $meta['_billing_state'] );
    update_post_meta( $meta['id'], '_billing_postcode', $meta['_billing_postcode'] );
    update_post_meta( $meta['id'], '_billing_country', $meta['_billing_country'] );
    update_post_meta( $meta['id'], '_billing_email', $meta['_billing_email'] );
    update_post_meta( $meta['id'], '_billing_phone', $meta['_billing_phone'] );

    update_post_meta( $meta['id'], '_shipping_first_name', $meta['_shipping_first_name'] );
    update_post_meta( $meta['id'], '_shipping_last_name', $meta['_shipping_last_name'] );
    update_post_meta( $meta['id'], '_shipping_company', $meta['_shipping_company'] );
    update_post_meta( $meta['id'], '_shipping_address_1', $meta['_shipping_address_1'] );
    update_post_meta( $meta['id'], '_shipping_address_2', $meta['_shipping_address_2'] );
    update_post_meta( $meta['id'], '_shipping_city', $meta['_shipping_city']);
    update_post_meta( $meta['id'], '_shipping_state', $meta['_shipping_state'] );
    update_post_meta( $meta['id'], '_shipping_postcode', $meta['_shipping_postcode'] );
    update_post_meta( $meta['id'], '_shipping_country', $meta['_shipping_country'] );

    update_post_meta( $meta['id'], 'order_notes', $meta['_order_notes'] );
    //$x = $meta['id'].' -> '.$meta['_billing_last_name'].' , ';
    //$x =  $meta['id'].' , ';
 // }
  //print_r($_POST['meta']);
  header('HTTP/1.1 200 OK');  
  echo "Successfuly Updated";
  die();
}
?>
