<?php 
 //Template Name: Lapel Order Now Page

function getwimg(){
  if($_SERVER[HTTP_HOST] === 'localhost' || $_SERVER[HTTP_HOST] === '192.168.2.165'){
    return '..';
  }
}
get_header();

// $isEdit = false;
// $isStatus = '';
// $metaInfo = false;
// $add_color_pantone = add_additional_pantone();
// if (isset($_REQUEST['id'])) {
//     // $isEdit = isset($_REQUEST['Status']) && $_REQUEST['Status'] == 'edit' ? true : false;

//   if(isset($_REQUEST['Status']))
//   {
//     $isStatus = $_REQUEST['Status'];
//   }
//     //echo $isStatus;
//   $metaInfo = getMetaToAutoSet($_REQUEST['id'], $_REQUEST['Status']);
//   if ($metaInfo != false) {
//     echo '<input id="EditModeID" name="' . $metaInfo['all'] . '" value="' . $_REQUEST['id'] . '" type="hidden">';
//   } else {
//     echo '<script>window.location = "' . get_site_url() . '/order-now/";</script>';
//   }
// }

?>
<?php //require_once(get_stylesheet_directory() . '/wristband/includes/check_mask.php'); ?>
<!-- start of the body -->
<div class="header-mobile">
  <div class="header-title text-center">
      <h1>Custom Lapel Pins</h1>
  </div>
</div>
<div class="header-desktop">
  <div class="header-title text-center">
      <h1>Custom Lapel Pins</h1>
  </div>                                                 
</div>
<div class="chart-mobile copy-lapel-chart-mobile" style="display: none;position: relative;">
  <div class="section-price-chart">
    <div class="container p-0">
        <a class="go-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <div id="price-scroll">
              <div id="price_chart" class="">
                <div class="fusion-column-wrapper">
                  <p class="copy-font-fourteen copy-upper" id="table_price_name">Pricing Guide for Hard Enamel 0.75 inch</p>
                  <table id="table_chart" class="table table-bordered">
                    <tbody><tr>
                      <td>Qty</td>
                      <td>1</td>
                      <td>5</td>
                      <td>10</td>
                      <td>20</td>
                      <td>50</td>
                      <td>75</td>
                      <td>100</td>
                      <td>200</td>
                      <td>300</td>
                      <td>500</td>
                      <td>1,000</td>
                      <td>2,000</td>
                      <td>3,000</td>
                      <td>5,000</td>
                      <td>10,000</td>
                      <td>20,000</td>
                      <td>50,000</td>
                      <td>100,000</td>
                      </tr>
                    <tr>
                      <td>
                        Price $
                      </td>
                      <td>2.20</td>
                      <td>1.88</td>
                      <td>1.50</td>
                      <td>1.32</td>
                      <td>0.84</td>
                      <td>0.84</td>
                      <td>0.40</td>
                      <td>0.31</td>
                      <td>0.28</td>
                      <td>0.19</td>
                      <td>0.14</td>
                      <td>0.14</td>
                      <td>0.14</td>
                      <td>0.12</td>
                      <td>0.10</td>
                      <td>0.09</td>
                      <td>0.07</td>
                      <td>0.06</td>
                      </tr>
                  </tbody></table>
                </div>
              </div>
          </div>
    </div>
</div>
</div>
</div>                            

<div class="section-order-page section-lapel" id="section-lanyard">
    <div class="container p-0">
      <div class="copy-relative">
        <div class="col-md-3 p-0 col-style">
            <div class="col-holder">
                <div class="col-title">
                    <h5>Lapel Pins Types & Size</h5>
                    <!-- Small modal -->
                    <!-- <a class="style-button" href="#" data-toggle="modal" data-target="#style_modal" onclick="$('#style_modal').modal()">
                      <i class="fa fa-question-circle"></i>
                    </a> -->

                   <div class="modal fade" id="style_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close btn-main-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">(Click Image to See Larger)</h4>
                          </div>
                            <div class="wristband--holder afterclear" data-sequence="500">
                            <div class="row">
                                <?php 
                                  $args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lapel-pins', 'order' => 'ASC');
                                  $loop = new WP_Query( $args );
                                  while ( $loop->have_posts() ) : $loop->the_post(); global $product;
                                  $title = get_the_title();
                                  $id = get_the_id();
                                        ?>
                                        <div class="col-md-3" data-id="<?php echo $id; ?>">
                                          <a href="<?php echo the_post_thumbnail_url(); ?>" class="btn-style wristband-img-holder bg-inline" data-lightbox="example-set" data-title="<?php  echo the_title(); ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
                                          </a>
                                          <div class="wristband-desc-holder text-center">
                                            <h3><?php the_title(); ?></h3>
                                          </div>
                                        </div>

                                <?php
                                  endwhile;
                                  wp_reset_query();
                                ?>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-content-holder col-select">
                <?php
                    $args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lapel-pins', 'order' => 'ASC');
                    $loop = new WP_Query( $args );
                    $y = 0; $w = 0;
                    $title_array = array();
                ?>
                    <div class="form-group">
                        <a class="style-button" href="#" data-toggle="modal" data-target="#style_modal" onclick="$('#style_modal').modal()" style="right: 10px; margin-top: 8px;">
                          <i class="fa fa-question-circle"></i>
                        </a>
                        <div class="select-button" style="width: 100%; padding-left: 40px;">
                            <i class="select-down"></i>
                            <ul class="list-product_style p-0" style="display: flex;">
                            <?php 
                              while ( $loop->have_posts() ) : $loop->the_post(); global $product;
                              $title_array[] = get_the_title();
                              $id_array[] = get_the_id();
                              $title = strtolower(str_replace(' ', '-', get_the_title()));
                            ?>
                                 <li class="list-product_style" id="lapelpins-img-<?php echo $title; ?>">
                                    <a href="<?php echo the_post_thumbnail_url(); ?>" data-lightbox="new" data-title="<?php echo the_title(); ?>">
                                      <div class="product-style-wrap">
                                          <div class="product-style-img" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');"></div>
                                      </div>
                                    </a>
                                    <div class="product-style-hover-wrap" style="width: 100%;">
                                      <div class="produt-style-hover-details" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');"></div>
                                    </div>
                                </li>
                           <?php endwhile;  ?>
                           </ul>
                            <select name="lapelpin_style" id="lapelpin_style" class="input-select form-control">
                            <?php for ($i=0; $i < sizeof($title_array); $i++) { ?>
                            <option value="<?php echo $title_array[$i]; ?>" data-id="<?php echo $id_array[$i]; ?>"><?php echo $title_array[$i]; ?></option>
                            <?php } ?>
                            </select>                     
                        </div>                                
                                
                    </div>
                    <div class="form-group form-lapel-size">
                      <div class="select-button">
                          <i class="select-down"></i>
                          <!-- Dynamic width -->
                          <select name="lapelpins_size" id="lapelpins_size" class="input-select enable-if-style-selected form-control"></select>
                      </div>
                      <a class="style-button" href="#" data-toggle="modal" data-target="#size_modal" onclick="$('#size_modal').modal()">
                        <i class="fa fa-question-circle"></i>
                      </a>

                      <div class="modal fade" id="size_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close btn-main-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-center" id="myModalLabel">Lapel Pins Sizes</h4>
                              <p class="text-center" style="font-size: 16px;">The pin size is measured by the longest dimension on the pin based on your design.</p>
                            </div>
                            <div class="wristband--holder afterclear" data-sequence="500">
                              <div class="row">
                                <div class="col-md-3">
                                  <i class="fa fa-star fa-4x" aria-hidden="true" style="font-size: 52px;"></i>
                                  <div class="wristband-desc-holder text-center">
                                    <h3>0.75 INCH</h3>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <i class="fa fa-star fa-4x" aria-hidden="true" style="font-size: 68px;"></i>
                                  <div class="wristband-desc-holder text-center">
                                    <h3>1.00 INCH</h3>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <i class="fa fa-star fa-4x" aria-hidden="true" style="font-size: 87px;"></i>
                                  <div class="wristband-desc-holder text-center">
                                    <h3>1.25 INCH</h3>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <i class="fa fa-star fa-4x" aria-hidden="true" style="font-size: 103px;"></i>
                                  <div class="wristband-desc-holder text-center">
                                    <h3>1.50 INCH</h3>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-holder copy-bg-gray">
                <div class="col-title">
                    <h5>Color & Quantity</h5>
                </div>
                <div id="lapelpins_color_and_quantity" class="col-select copy-float-left" style="padding: 10px;width: 100%;" >
                    <div class="form-group" id="lapelpins_radio" style="text-align: center;">   
                      <!-- Dynamic width -->
                      <!-- <i class="select-down"></i>
                      <select name="lapelpins_template" id="lapelpins_template" class="input-select enable-if-style-selected form-control"></select> -->

                    </div>
                </div>
            </div>
            <div class="col-holder col-quantity-dekstop" style="border-top: 1px solid #e5eaf0;">
              <div class="col-content-holder" style="padding-top: 25px;">
                <div id="quantity_group_field" class="col-color">
                    <h4>Quantity</h4>
                    <p class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                    <input type="number" name="qty_lapelpins" id="qty_lapelpins" min="0" class="input-text form-control" style="padding: 0; text-align: center;">
                    </p>
                    <p id="quantity_group_field_button" class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                      <br>
                      <button id="add_lapelpins_to_selection" href="#" class="changetolink">
                        <span class="fusion-button-text-left btn-blue">Add</span>
                      </button> 
                    </p>                    
                    <div class="clear"></div>
                  </div>
              </div>
            </div>
            <!-- Additional Notes -->
                  <div class="box-additional copy-clear">
                    <div class="col-title">
                      <label for="additional_notes"  class="form-group-heading CssTitleBlack"><h5>Additional Notes</h5></label>
                    </div>
                    <div class="col-content-holder col-select">
                      <div class="form-group">
                          <p class="form-row form-row-wide">
                            <div class="form-group">
                              <textarea class="input-text form-control" name="additional_notes" id="additional_notes" cols="30" rows="5" placeholder="Add Comments"><?php echo $metaInfo['AddNotes_msg']; ?></textarea>
                            </div>
                          </p>
                        </div>
                      </div> 
                  </div>
                <!-- /End Additional Notes -->
        </div>
      </div>
          <div class="col-md-6 col-preview-message">
            <div class="col-wristband">
                <div class="message-select-desktop">
                  <div class="col-message-select">
                      <div class="col-title">
                        <h5>Upload Your Artwork</h5>
                      </div>
                  </div>

                </div>
                <div class="col-content-holder col-wrist-details">
                    
                    <div id="forCustomLogo" >
                      <div class="form-group" id="form-custom-logo" style="text-align: center;">                           
                        <div class="col-sm-9 p-0" style="margin: 0 auto; float: none;">
                            <a href="#" class="fileinput-button">
                              <img class="image-upload" src="" style="display:none;" >
                              <span>Upload Image</span><i class="fa fa-spin nothing"></i>
                              <!-- The file input field used as target for the file upload widget -->
                              <form>
                                <input class="files-data fileupload" type="file" name="files[]">
                              </form>
                              <!-- <input type="text" name="file-selected" id="file-selected" value="asdas"> -->                                     
                            </a>
                            
                            <!-- <label for="adding-clipart" class="control-label p-0" style="display: inline-block; top: 0px;">No file chosen</label> -->
                            <div class="attach-content">
                              <div id="clipart_error_warning"></div>
                              <img id="clipart_imagename" style="display: none" src="">
                            </div>
                                                                
                        </div>  
                        <span class="copy-lapel-upload-note" style="font-size: 13px; line-height: 18px; display: block; width: 95%; margin: 0 auto 5px;">
                        Upload an image of your logo or a sketch you made. We will send you a mock up for approval prior to production.
                        </span>                          
                      </div>                  
                    </div>
                </div>
                <div class="col-content-holder col-wrist-details lapelpins-artwork">
                    <form>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          <span>Email this later</span>
                        </label>
                      </div>
                    </form>
                </div>
                <label id="file-selected" data-imgname=""></label>
                <!-- Select Attachment -->
                <div id="additional-attachment-section" class="col-holder lapel-attachment-group">

                    <div class="col-title">
                      <h5 style="width: 100%;">Pin's Back Attachment</h5>
                    </div>
                    <div class="attach-content">
                        <div class="form-group">
                            <div class="btn-group" data-toggle="buttons">

                            <?php $lapelpins_attachment = lapelpins_attachments();
                            $k = true;
                            foreach ($lapelpins_attachment as $attachments => $attachment ):
                            ?>
                              <label class="btn btn-primary <?php echo $k ? 'active' : ''; ?>">
                                <span class="<?php echo $attachment['price']!=0 ? 'premium-icon':'free-icon'; ?>" style="<?php echo $attachment['name']!='No Attachment' ? 'display: block':'display: none'; ?>">
                                  Premium
                                  <i class="fa <?php echo $attachment['price']!=0 ? 'fa-star':''; ?>"></i>                            
                                </span>
                                <span class="attach-img-wrap attachment_image">
                                  <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . $attachment['image']; ?>')"></span>
                                </span>
                                <!-- <span class="copy-attach-price">+$0.50 Each</span> -->
                                <input type="radio" name="attachment_btn" id="attachment_btn" <?php echo $k ? 'checked' : ''; ?> autocomplete="off" value="<?php echo $attachment['price']; ?>" data-name="<?php echo $attachment['name']; ?>">
                                <!-- <input type="hidden" name="attachment_value" id="attachment_value" > -->
                                <span class="attach-text"><?php echo $attachment['name']; ?></span>
                              </label>
                            
                            <?php $k = false;
                             endforeach; ?>
                            </div>
                      </div>

                      
                        <div class="col-title packaging-title">
                          <h5 data-fontsize="11" data-lineheight="12">Packaging</h5>
                        </div> 
                         <div class="attach-content">
                          <div class="form-group">
                            <div class="btn-group" data-toggle="buttons">

                            <?php $lapelpins_packaging = lapelpins_packaging();
                            $k = true;
                            foreach ($lapelpins_packaging as $packaging => $package ):
                            ?>
                              <label class="btn btn-primary <?php echo $k ? 'active' : ''; ?>">
                                <!-- <span class="<?php echo $package['price']!=0 ? 'premium-icon':'free-icon'; ?>" style="<?php echo $package['name']!='No Packaging' ? 'display: block':'display: none'; ?>">
                                  Premium
                                  <i class="fa <?php echo $package['price']!=0 ? 'fa-star':''; ?>"></i>                            
                                </span> -->
                                <span class="attach-img-wrap attachment_image">
                                  <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . $package['image']; ?>')"></span>
                                </span>
                                <!-- <span class="copy-attach-price">+$0.50 Each</span> -->
                                <input type="radio" name="lapelpins_packaging" id="lapelpins_packaging"  <?php echo $k ? 'checked' : ''; ?> autocomplete="off" value="<?php echo $package['price']; ?>" data-name="<?php echo $package['name']; ?>">
                                <!-- <input type="hidden" name="attachment_value" id="attachment_value" > -->
                                <span class="attach-text"><?php echo $package['name']; ?></span>
                                  <i class="fa fa-question-circle" aria-hidden="true" id="attach-help" style="<?php echo $package['name']!='No Packaging' ? 'display: block':'display: none'; ?>"></i>
                                  <span class="options-hover" style="top: -6em;">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>Have your lapel pins wrapped individually in <?php echo $package['name']; ?>.</p>
                                    </span>
                                  </span>
                              </label>
                            
                            <?php $k = false;
                             endforeach; ?>
                            </div>
                          </div>
                      </div>
                    
                  </div>
                </div>
                 <!-- Other Options -->
                <div id="additional-attachment-section" class="col-holder lapel-attachment-group">
                    <div class="col-title attachment-title">
                      <h5 style="width: 100%;">Additional Options (Optional)</h5>
                    </div>
                        <div class="attach-content" >
                          <div class="form-group">                   
                            <div class="btn-group" data-toggle="buttons" style="width: 100%;">
                                <?php 
                                $lapelpins_cons_number = lapelpins_consecutive_number();
 
                                foreach ($lapelpins_cons_number as $key => $value) :
                                ?>
                                <label class="btn btn-primary">
                                  <span class="attach-img-wrap attachment_image">
                                    <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . $value['image']; ?>');"></span>
                                  </span>
                                  <!-- <span class="copy-attach-price">+$0.50 Each</span> -->
                                  <input type="checkbox" name="add_consecutive_number" id="add_consecutive_number" autocomplete="off" value="<?php echo $value['price']; ?>" data-name="<?php echo $value['name']; ?>">
                                  <!-- <input type="hidden" name="attachment_value" id="attachment_value" > -->
                                  <span class="attach-text" style="bottom: .5em;"><?php echo $value['name']; ?></span>

                                  <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                                  <span class="options-hover" style="top: -7.3em;">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>Make your pins a limited edition with laser engraved numbering.(+$<?php echo $value['price']; ?>)</p>
                                    </span>
                                  </span>
                                </label>
                              
                                <?php 
                                endforeach;
                                ?>

                                
                                <?php 

                                $lapelpins_backstamp = lapelpins_backstamp();

                                foreach ($lapelpins_backstamp as $key => $value) :
                                ?>
                                <label class="btn btn-primary">
                                  <span class="attach-img-wrap attachment_image">
                                    <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . $value['image'];?>');"></span>
                                  </span>

                                  <input type="checkbox" name="add_backstamp" id="add_backstamp" autocomplete="off" value="<?php echo $value['price']; ?>" data-name="<?php echo $value['name']; ?>">
                                  <span class="attach-text" style="padding-top: 5px;"><?php echo $value['name']; ?></span>

                                  <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                                  <span class="options-hover" style="top: -6em;">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>Add your company name,website or any custom text.(+$<?php echo $value['price']; ?>)</p>
                                    </span>
                                  </span>
                                </label>
                                
                                <?php 
                                endforeach;
                                ?>

                            </div>
                          </div>

                        </div>
                        <div class="form-row form-row-wide back-stamp-text" style="display: none;">
                          <div class="form-group">
                              <label for="back_message" class="col-sm-5 control-label p-0">Enter back stamp text here: 
                              </label>
                              <div class="col-sm-6 p-0">
                                  <input maxlength="44" type="text" id="back_stamp_text" name="back_stamp_text"  class="input-text trigger-limit-char form-control" data-limit="<?php echo WBC_MESSAGE_CHAR_LIMIT; ?>" value="" />
                                  <div id="bwarning-msg"></div>
                              </div>
                          </div>
                        </div>
                </div>

            </div>
          </div>
           <!-- End Other Options -->


          <!-- believe -->
        <div class="col-md-3 p-0 col-summ col-review-your-order">

        <!-- Summary -->
            <div class="col-holder col-holder-summ col-holder-summ-desktop">
                <div class="col-title">
                    <h5>Summary</h5>
                </div>
                <div class="col-content-holder col-select col-summary" id="lapelpins_summary">
                    <div id="quantity-notice"></div>          
                        <div class="col-content-holder col-select col-summary">
                          <span id="freeCounter" class="CssTitleBlue"></span>
                          <div class="form-group table-responsive">
                            <table id="selected_color_table" class="table table-summary" border="0">
                              <thead>
                                <tr>
                                  <!-- <td >Size</td> -->
                                  <td class="TempCss1" style="text-align: center;">Color</td>
                                  <td class="TempCss1" style="text-align: center;" >Name</td>
                                  <td class = "text_to_alter"></td>    
                                  <td class="TempCss1" style="text-align: center;padding-left: 0;">Qty</td> 
                                  <th colspan="2" style="text-align:right;"><a class="CssEditSave CssTitleBlue font-size-11" id="EditSaveID" style="cursor: pointer;"><i class="fa fa-pencil"></i></a><br><a style="cursor: pointer;" class="CssEditSave CssTitleRed font-size-11"  id="CancelID"></a></th>
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                            </table>
                          </div>
                        </div>
                </div>
            </div>
            <!-- Summary -->

        <!-- Preview Order -->
  
      <div class="col-holder col-holder-review col-holder-review-desktop" style="display: none;">
          <div class="col-title">
             <h5>Preview Your Order</h5>
         </div>
         <div class="review-img-wrap">
           <div class="review-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/images/lanyard-preview.png');"> 
           </div>
         </div>
      </div>

      <!-- SHIPPING -->
                <div class="col-holder col-new-shipping" id="lapelpins_shipping">
                  <div class="col-title">
                       <h5>Production & Shipping</h5>
                  </div>
                  <div id="notify-customization-2"></div>
                  <div class="col-content-holder col-select">
                          <?php if (isset($GLOBALS['wbc_settings']->customization)): ?>
                            <div id="customization-section">
                              <div class="form-group form-shipping">
                              <?php $flag = false;
                              foreach ($GLOBALS['wbc_settings']->customization->location as $cus_location): ?>
                              <div class="radio">
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
                                  <!-- <span class="fusion-popover tooltip-img" data-toggle="tooltip" data-placement="top"
                                  title="<?php //echo esc_attr($cus_location->tool_tip_text); ?>">?</span> -->
                                  <span class="alert-notify alert-color customization_location each-message">+$0.10 each</span>
                                </label>

                              </p>
                              </div>
                              <?php $flag = true;
                              endforeach; ?>
                              </div> 

                                <!-- <div class="col-color">
                                    <p class="form-row form-row-wide">
                                      <label for="customization_date_<?php echo $type; ?>" class="form-group-heading CssTitleBlack"><h4>Production Time</h4></label>
                                      <div class="col-color-select">
                                          <div class="form-group">
                                              <div class="select-button">
                                                <i class="select-down"></i>
                                                <select id="customization_date_production"
                                                  name="customization_date_production"
                                                  class="input-select customization-date-select form-control" required>
                                                  <option value="-1">-- Select Production Time --</option>
                                                </select>
                                              </div>
                                          </div>
                                      </div>
                                    </p>
                                </div>
                                <div class="col-color">
                                    <p class="form-row form-row-wide">
                                      <label for="customization_date_<?php echo $type; ?>" class="form-group-heading CssTitleBlack"><h4>Shipping Time</h4></label>
                                      <div class="col-color-select">
                                          <div class="form-group">
                                              <div class="select-button">
                                                <i class="select-down"></i>
                                                <select id="customization_date_shipping"
                                                  name="customization_date_shipping"
                                                  class="input-select customization-date-select form-control" required>
                                                  <option value="-1">-- Select Shipping Time --</option>
                                                </select>
                                              </div>
                                          </div>
                                      </div>
                                    </p>
                                </div> -->

                              <?php foreach ($GLOBALS['wbc_settings']->customization->dates as $type => $date): ?>
                                <div class="col-color">
                                    <p class="form-row form-row-wide">
                                      <label for="customization_date_<?php echo $type; ?>" class="form-group-heading CssTitleBlack"><h4><?php echo ucwords($type); ?> Time</h4></label>
                                      <div class="col-color-select">
                                          <div class="form-group">
                                              <div class="select-button">
                                                <i class="select-down"></i>
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
                          <p class="form-row form-row-wide">
                            <span id="guaranteed_note"></span>
                            <span id="delivery_date"></span>
                            <span id="datetotal" style="display:none"></span>
                          </p>

                      </div>
                  </div>
                  <!-- end of customized date and shipping -->

                  <div class="col-md-6 last-row-mobile">
                    <div class="col-holder">
                        <!-- Additional Notes -->
                        <div class="box-additional">
                          <div class="col-title">
                            <label for="additional_notes"  class="form-group-heading CssTitleBlack"><h5>Additional Notes</h5></label>
                          </div>
                          <div class="col-content-holder col-select">
                            <div class="form-group">
                                <p class="form-row form-row-wide">
                                  <div class="form-group">
                                    <textarea class="input-text form-control" name="additional_notes_mobile" id="additional_notes_mobile" cols="30" rows="5" placeholder="Add Comments"><?php echo $metaInfo['AddNotes_msg']; ?></textarea>
                                  </div>
                                </p>
                              </div>
                            </div> 
                        </div>
                      <!-- /End Additional Notes -->
                    </div>
                    <!-- Summary -->
                  </div>

        <!-- End Preview Order -->
            <div class="col-holder col-order-total"> 
                    <div class="col-content-holder col-total">
                        <div class="total-details">
                            <div class="col-total-content">
                            <p class="fusion-row price price-with-decimal">
                              <span class="currency CurrencyAddup"><h1><?php echo get_woocommerce_currency_symbol(); ?><span class="integer-part price-handler" id="price_handler">0.00</span></h1></span>
                              <input type="hidden" name="price_handler_val" id="price_handler_val">
                              <p>
                                Total Quantity:
                                <span id="qty_handler">0</span>
                                <input type="hidden" name="qty_handler_val" id="qty_handler_val">
                                <input type="hidden" name="qty_handler_val1" id="qty_handler_val1">
                              </p>
                            </p>
                            </div>
                        </div>
                        <div class="convert-keychains-message"></div>
                        <div class="alert-warning-message"></div>
                        <div class="btn-view-holder">
                            <div class="btn-action-holder">
                                <?php if ($isStatus == 'edit'){ ?>
                                    <button id="wbc_edit_to_cart" href="#" class="fusion-button button-flat button-round button-large button-default alignright btn-cart-update">
                                      <span class="button-icon-divider-left"><i class="fa fa-shopping-cart"></i></span>
                                      <span class="fusion-button-text-left">Update Cart</span>
                                    </button>
                                    <div class="link-buttons alignright buttons-edit">
                                      <!--<a id= "save_button" class="fusion-button button-flat button-round button-small button-default" href="#">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        <span class="fusion-button-text">Save Design</span></a>-->
                                      <a class="fusion-button button-flat button-round button-small button-default button-red btn-new-white" href="/cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        <span class="fusion-button-text">Cancel</span>
                                      </a>
                                      <a href="" class="btn-action btn-clear btn-clear-edit">
                                        <i class="fa fa-undo" aria-hidden="true"></i>Clear
                                      </a>
                                    </div>
                                    <?php } else if( $isStatus == 'copy') { ?>
                                <!-- <button id="wbc_add_to_cart" href="#" class="fusion-button button-flat button-round button-large button-default alignright">
                                    <span class="button-icon-divider-left"><i class="fa fa-shopping-cart"></i></span>
                                    <span class="fusion-button-text-left">Add to Cart</span>
                                  </button> -->
                                  <button id="wbc_add_to_cart" href="#" class="btn-add-to-cart">
                                    <span class="button-icon-divider-left"><i class="fa fa-shopping-cart"></i></span>
                                    <span class="fusion-button-text-left">Add to Cart</span>
                                  </button>
                                  <div class="link-buttons alignright">
                                    <!-- <a id= "save_button" class="fusion-button button-flat button-round button-small button-default" href="#">
                                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                      <span class="fusion-button-text">Save Design</span></a> -->
                                    <a class="fusion-button button-flat button-round button-small button-default button-red btn-new-white btn-goback" href="/cart">
                                      <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                      <span class="fusion-button-text">Go back to Cart</span>
                                    </a>
                                  </div>
                                  <?php } else { ?>
                                    
                                    <button id="lapelpin_add_to_cart" href="#" class="btn-add-to-cart">
                                      <span class="fusion-button-text-left">Add to cart</span>
                                    </button>
                                  <div class="link-buttons aligncenter">
                                    <!-- <a id= "save_button" class="btn-action btn-design" href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save Design</a> -->
                                    <a href="" class="btn-action btn-clear">
                                    <i class="fa fa-undo" aria-hidden="true"></i>Clear
                                    </a>
                                  </div>
                                  <!-- <div class="link-buttons aligncenter link-buttons-new">
                                    <a href="" class="btn-action btn-clear btn-new-clear">
                                    <i class="fa fa-undo" aria-hidden="true"></i>Clear
                                    </a>
                                  </div> -->
                                  <?php } ?>


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
              <div id="price_chart_lapel" class="">
                <div class="fusion-column-wrapper">
                  <p class="copy-font-fourteen copy-upper" id="table_price_name_lapel">Pricing Guide for Hard Enamel 0.75 inch</p>
                  <table id="table_chart" class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Qty</td>
                      </tr>
                      <tr>
                      <td>
                        Price $
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
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
                <input name="infusionsoft_version" type="hidden" value="1.48.0.48" />
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
                      <label for="inf_custom_FrontStart">Front Start</label>
                      <input class="infusion-field-input-container" id="inf_custom_FrontStart" name="inf_custom_FrontStart" type="text" />
                    </div>
                    <div class="infusion-field">
                      <label for="inf_custom_FrontEnd">Front End</label>
                      <input class="infusion-field-input-container" id="inf_custom_FrontEnd" name="inf_custom_FrontEnd" type="text" />
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
                    <div class="infusion-submit">
                      <input type="submit" value="Submit" />
                    </div>
                  </form>
                  <script type="text/javascript" src="https://zt232.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=836b445a9eef92908d02a37a83de32bd"></script>


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
              <label for="input-color">Color:</label>
              <!-- <input id="PTCName1" type="text" class="input-color"> -->
            </div>
            <input type="hidden" id="pantonTracker" value="1" data-1="" data-2="" data-3="" color-1="" color-2="" color-3="">
          </div>
        </div>
        <div class="modal-body color-lanyard">
          <div class="tab-pane active" id="colorchart">
            <ul class="color-pantone-list">
              <?php 
                $add_color_pantone = add_lanyard_pantone();
                foreach ($add_color_pantone as $pantones => $pantone ): ?>
             <li>
                <a>
                    <div class="color-chart-wrapper lanyard_color_select" data-name="<?php echo $pantone['name'];?>" data-color="<?php echo $pantone['color'];?>" style="color: <?php echo $pantone['color'];?>; background-color: <?php echo $pantone['color'];?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/lanyard-color.png" alt="clear background" width="86" height="80">
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
              <label for="input-color">Text Color:</label>
              <!-- <input id="text_color" type="text" class="input-color"> -->
            </div>
            <input type="hidden" id="textTracker" value="1" data-text-name="" data-text-color="">
          </div>
        </div>
        <div class="modal-body color-lanyard">
          <div class="tab-pane active" id="colorchart">
            <ul class="color-pantone-list">
              <?php 
                $add_color_pantone = add_lanyard_pantone();
                foreach ($add_color_pantone as $pantones => $pantone ): ?>
             <li>
                <a>
                    <div class="color-chart-wrapper text_color_select" data-name="<?php echo $pantone['name'];?>" data-color="<?php echo $pantone['color'];?>" style="color: <?php echo $pantone['color'];?>; background-color: <?php echo $pantone['color'];?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/lanyard-color.png" alt="clear background" width="86" height="80">
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
            ?>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->

  <!-- Modal Custom additional imprint Color -->
  <div class="modal fade" id="modal-add-imprint-color" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <button id="addimprintColor" type="button" class="btn btn-primary copy-float-right btn-done">Done</button>
          <h1 class="modal-title" id="myModalLabel">Select Color</h1>
          <div class="row">
            <div class="col-md-4">
              <label for="input-color">Additional Imprint Color:</label>
              <!-- <input id="text_color" type="text" class="input-color"> -->
            </div>
            <input type="hidden" id="imprintTracker" value="1" data-imprint-name="" data-imprint-color="">
          </div>
        </div>
        <div class="modal-body color-lanyard">
          <div class="tab-pane active" id="colorchart">
            <ul class="color-pantone-list">
              <?php 
                $add_color_pantone = add_lanyard_pantone();
                foreach ($add_color_pantone as $pantones => $pantone ): ?>
             <li>
                <a>
                    <div class="color-chart-wrapper addimprint_color_select" data-name="<?php echo $pantone['name'];?>" data-color="<?php echo $pantone['color'];?>" style="color: <?php echo $pantone['color'];?>; background-color: <?php echo $pantone['color'];?>;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/wristband/assets/images/lanyard-color.png" alt="clear background" width="86" height="80">
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
            ?>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->

  <!-- modal for clipart -->
  <div id="lanyard-clipart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="modal-heading-1" data-dismiss="modal" aria-hidden="true"
            data-fontsize="17" data-lineheight="36">
            </h3>
          </div>
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

  <!-- <script type="text/javascript">
    var get_stylesheet_directory_uri = '<?php// echo get_stylesheet_directory_uri(); ?>';

    (function($){
      <?php //$style = $_GET['style']; if(!empty($style)){ ?>
        var style = '<?php //echo $style ?>';

        $("#style option").each(function(){
            var html = $(this).html();
            html = html.toLowerCase();
            html = html.replace(/\s+/g, "-");

            if(style == html){
                var item = $(this).attr('value');
                $('#style').val(item);
            }
        });

      <?php //}?>
    })(jQuery);
  </script> -->


<?php  
get_footer();