<?php 
 //Template Name: Lanyards Order Now Page

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
      <h1><?php the_title(); ?></h1>
  </div>
</div>
<div class="header-desktop">
  <div class="header-title text-center">
      <h1>Customize Lanyards</h1>
  </div>
</div>
<input type="hidden" id="prev_color" name="prev_color" value="0">
<input type="hidden" id="forfront" name="forfront" value="0">
<input type="hidden" id="forback" name="forback" value="0">
<input type="hidden" id="forinside" name="forinside" value="0">
<input type="hidden" id="forwrap" name="forwrap" value="0">
<div class="section-order-page" id="lanyard-order-page">
  <div class="container p-0">
    <div class="copy-relative">
      <div class="">
        
        <!-- <div class="textfill" style="width: 600px; height: 50px; display: inline-block; background-color: #000; ">
           <h3 id="Cm101" class="copy-spacing-1 copy-display-inline full-msg-text copy-preview-font" data-start="" data-end="" style=" color: #fff; font-size: 50px; line-height: 50px; margin: 0; font-family: Arial;"></h3>
        </div> -->
         
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="note-message note-lanyard">Note: We will send you a sample mock up of your lanyard design for your approval prior to production.</div>
</div>
<div class="section-order-page" id="section-lanyard">
    <div class="container p-0">
      <div class="copy-relative">
        <div class="col-md-3 p-0 col-style">
            <div class="col-holder">
                <div class="col-title">
                    <h5>Lanyard style &amp; Size</h5>
                    <!-- Small modal -->
                    <a class="style-button" href="#" data-toggle="modal" data-target="#style_modal" onclick="$('#style_modal').modal()">
                      <i class="fa fa-question-circle"></i>
                    </a>

                   <div class="modal fade" id="style_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close btn-main-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Click Image to See Larger</h4>
                          </div>
                            <div class="wristband--holder afterclear" data-sequence="500">
                            <div class="row">
                                <?php 
                                  $args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lanyard', 'order' => 'ASC');
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
                    <span id="selected_size" style="display: none;"></span>
                </div>
                <div class="col-content-holder col-select">
                <?php
                              $args = array( 'post_type' => 'product','posts_per_page'   => 10, 'product_cat' => 'lanyard', 'order' => 'ASC');
                              $loop = new WP_Query( $args );
                              $y = 0; $w = 0;
                              $title_array = array();
                            ?>
                    <div class="form-group">
                        <div class="select-button" style="width: 100%; padding-left: 40px;">
                            <i class="select-down"></i>
                            <ul class="list-product_style p-0" style="display: flex;">
                            <?php 
                              while ( $loop->have_posts() ) : $loop->the_post(); global $product;
                              $title_array[] = get_the_title();
                              $id_array[] = get_the_id();
                               
                            ?>
                              <li class="product-style" id="lanyard-img-<?php echo the_title(); ?>">
                                        <a href="<?php echo the_post_thumbnail_url(); ?>" data-lightbox="new" data-title="<?php echo the_title(); ?>">
                                          <div class="product-style-wrap">
                                              <div class="product-style-img" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');"></div>
                                          </div>
                                        </a>
                                        <div class="product-style-hover-wrap">
                                          <div class="produt-style-hover-details" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');"></div>
                                        </div>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <select name="lanyard_style" id="lanyard_style" class="input-select form-control">
                            <?php for ($i=0; $i < sizeof($title_array); $i++) { ?>
                            <option value="<?php echo $title_array[$i]; ?>" data-id="<?php echo $id_array[$i]; ?>"><?php echo $title_array[$i]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="select-button">
                            <i class="select-down"></i>
                            <!-- Dynamic width -->
                            <select name="lanyard_width" id="lanyard_width" class="input-select enable-if-style-selected form-control">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-holder">
                <div class="col-title">
                    <h5>Color & Quantity</h5>
                </div>
                <div class="col-content-holder col-select" style="float: left;padding-right: 15px;">
                  <div id="lanyard-color-tab" class="tabs-color fusion-tabs classic horizontal-tabs">
                    <div class="tab-content" id="lanyard-color-items">
                      <div id="wristband-color-name">
                        <h4 data-fontsize="14" data-lineheight="15" style="margin-top: 0;">Lanyard Color</h4>
                      </div>
                      <?php $flag = true;
                      $x = 0;
                      foreach ($GLOBALS['wbc_settings']->color_style as $style => $data): ?>

                      <div class="tab-pane fade <?php echo $flag ? 'active in' : ''; ?>" id="tab-<?php echo sanitize_title($style); ?>">
                        <ul id="lanyard_bgColor">
                          <div id="display-pantone" class="color-pantone">
                              <!-- Button trigger modal -->
                              <!-- <button type="button" class="btn btn-primary btn-lg btn-custom-color" data-toggle="modal" data-target="#modal-color-pantone"> -->
                              <span class="copy-tooltip-new tooltip-custom">Custom Color</span>
                              <button type="button" class="btn btn-primary btn-lg btn-custom-color" id="custom_lanyard_color">
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
                     </div>

                     <?php $x++;
                     endforeach; ?>

                   </div>
                </div>
                <div id="lanyard-text-color" class="tabs-color fusion-tabs classic horizontal-tabs">
                    <div class="tab-content" id="lanyard-text-color-items">
                      <div id="wristband-color-name">
                        <h4 data-fontsize="14" data-lineheight="15" style="margin-top: 0;">Text Color</h4>
                      </div>
                      <?php $flag = true;
                      $x = 0;
                      foreach ($GLOBALS['wbc_settings']->color_style as $style => $data): ?>

                      <div class="tab-pane fade <?php echo $flag ? 'active in' : ''; ?>" id="tab-<?php echo sanitize_title($style); ?>">
                        <ul id="lanyard_txtColor">
                          <div id="display-pantone" class="color-pantone">
                              <!-- Button trigger modal -->
                              <!-- <button type="button" class="btn btn-primary btn-lg btn-custom-color" data-toggle="modal" data-target="#modal-color-pantone"> -->
                              <span class="copy-tooltip-new tooltip-custom">Custom Color</span>
                              <button type="button" class="btn btn-primary btn-lg btn-custom-color" id="custom_lanyard_text_color">
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
                     </div>

                     <?php $x++;
                     endforeach; ?>

                   </div>
                </div>
                <div id="lanyard-additional-imprint-color" class="tabs-color fusion-tabs classic horizontal-tabs">
                    <div class="tab-content" id="lanyard-add-imprint-items">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary">
                        <input name="lanyard-add-imprint-items_check" type="checkbox" autocomplete="off">
                        <h4 data-fontsize="14" data-lineheight="15" style="margin-top: 0;">
                        Add text color
                        <i class="fa fa-question-circle" aria-hidden="true">
                          <span class="options-hover">
                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <span class="options-desc">
                              <p>Add an additional imprint color to your text or logo. Please describe how you want the additional color to appear in the "Additional Notes" section. We will send you a mock up to confirm final design prior to production.</p>
                            </span>
                          </span>
                        </i>
                        <span class="copy-attach-imprint-price">+$0.20 each</span>
                        </h4>
                      </label>
                      <?php $flag = true;
                      $x = 0;
                      foreach ($GLOBALS['wbc_settings']->color_style as $style => $data): ?>

                      <div class="tab-pane fade <?php echo $flag ? 'active in' : ''; ?>" id="tab-<?php echo sanitize_title($style); ?>">
                        <ul>
                          <div id="display-pantone" class="color-pantone">
                              <!-- Button trigger modal -->
                              <!-- <button type="button" class="btn btn-primary btn-lg btn-custom-color" data-toggle="modal" data-target="#modal-color-pantone"> -->
                              <span class="copy-tooltip-new tooltip-custom">Custom Color</span>
                              <button type="button" class="btn btn-primary btn-lg btn-custom-color" id="custom_lanyard_add_imprint_color">
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

                             <div id="textcolorStyleBox" title= "<?php echo $style; ?>" class="color-box <?php echo $Selected; ?>">
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
                     </div>

                     <?php $x++;
                     endforeach; ?>
                    </div>
                   </div>
                </div>
                </div>
            </div>
            <div class="col-holder col-quantity-dekstop">
              <div class="col-content-holder">
                <div id="quantity_group_field" class="col-color">
                    <h4>Quantity</h4>
                    <p class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                    <input type="number" name="qty_lanyard" id="qty_lanyard" min="0" class="input-text form-control" style="padding: 0; text-align: center;">
                    </p>
                    <p id="quantity_group_field_button" class="form-row quantity-row fusion-one-fourth one_third fusion-layout-column fusion-spacing-yes">
                      <br>
                      <button id="add_lanyarcolor_to_selections" href="#" class="changetolink">
                        <span class="fusion-button-text-left btn-blue">Add</span>
                      </button> 
                    </p>                    
                    <div class="clear"></div>
                  </div>
              </div>
            </div>
            <!-- Summary -->
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
                                <td >Color</td>
                                <td >Text</td>
                                <td class = "text_to_alter"></td>
                                <td class="TempCss1">Qty</td>
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
            <!-- Additional Notes -->
            <div class="box-additional">
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
                        <h5>Message Style & Clipart</h5>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" id="message_input" name="message_input" value="message_cliparts" checked="">
                        Message and Cliparts
                        <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                          <span class="options-hover">
                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <span class="options-desc">
                              <p>Add your own message, choose your own font, and add a clipart if you like.</p>
                            </span>
                          </span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" id="message_input" name="message_input" value="custom_logo">
                        Custom Logo / Design
                        <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                          <span class="options-hover">
                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <span class="options-desc">
                              <p>Upload an image of your logo or a sketch you made. We will send you a mock up for approval prior to production.</p>
                            </span>
                          </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-content-holder col-wrist-details">
                    <div id="ForLanyard">
                        <div class="form-row form-row-wide">
                            <div class="form-group">
                                <label for="front_message" class="col-sm-4 control-label p-0">Message</label>
                                <div class="col-sm-8 p-0">
                                <input maxlength="50" type="text" id="lanyard_message" name="lanyard_message" class="input-text trigger-limit-char form-control" value="" >
                                <div id="fwarning-msg"></div>
                                </div>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 control-label p-0">Font</label>
                            <div class="col-sm-8 p-0">
                               <div class="btn-group bootstrap-select btn-lanyard-fonts">
                                <span class="dd-pointer dd-pointer-down"></span>
                                <input class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" value="Arial" id="selectFont" type="text" name="selectFont" READONLY class="caretfont input-select selectFont" style="font-family: Arial" >
                                  <ul id="selectedfont" class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                  <?php if (isset($GLOBALS['wbc_settings']->fonts)):
                                       usort($GLOBALS['wbc_settings']->fonts, 'strnatcasecmp');
                                       foreach ($GLOBALS['wbc_settings']->fonts as $font):
                                        $newlabel = change_font_to_label(esc_attr($font));
                                      // var_dump($GLOBALS['wbc_settings']->fonts);
                                      ?>
                                    <?php if($newlabel!='Jaf Herb'){ ?>
                                      <li data-original-index="0" class="selected">
                                        <div class="inner-content">
                                          <label class="fontliststyle" style="font-family: '<?php echo esc_attr($font); ?>' !important;">Ag</label>
                                          <label class="font-label"><?php echo ($newlabel)? $newlabel:esc_attr($font); ?></label>
                                          <input class="fontvalue" type="hidden" value="<?php echo esc_attr($font); ?>">
                                        </div>
                                      </li>
                                    <?php } ?>
                                    <?php endforeach;
                                    endif;
                                    ?>
                                  </ul>
                              </div>
                            </div>
                        </div>
                        <div class="form-group clipart-btn">
                            <label for="adding-clipart" class="col-sm-4 control-label p-0">Clipart</label>
                            <!-- Clipart -->
                        <div id="add-clipart">
                          <div class="fusion-clearfix"></div>
                          <div class="button-box">
                            <div class="alignright">
                              <div class="clipart-list-divider">
                                <div class="clipart-start">
                                  <a id="start_btn" data-view="start" data-position="start" href="#" data-title="Start" data-toggle="modal" data-target="#lanyard-clipart-modal" class="toggle-modal-clipart">
                                    <span class="fusion-button-text-right">
                                      <i class="fa icon-preview" id="LsID"></i>
                                      <img class="image-upload hide-if-icon" width="16" height="16"/>
                                    </span>
                                  </a>
                                  <a href="#" class="fileinput-button">
                                    <span>Upload</span><i class="fa fa-spin nothing"></i>
                                    <!-- The file input field used as target for the file upload widget -->
                                    <form><input class="clipart-data fileupload" type="file" name="files[]" data-clipart-type="starticon"></form>
                                  </a>
                                </div>
                                <span class="text-label">Start Clipart</span>
                              </div>
                                <div class="clipart-list-divider">
                                  <div class="clipart-end">
                                    <a id="end_btn" data-view="end" data-position="end" href="#" data-title="End" data-toggle="modal"
                                      data-target="#lanyard-clipart-modal"
                                      class="toggle-modal-clipart">
                                      <span class="fusion-button-text-right">
                                        <i class="fa icon-preview" id="LeID"></i>
                                        <img class="image-upload hide-if-icon" width="16" height="16"/>
                                        </span>
                                    </a>
                                    <a href="#" class="fileinput-button">
                                      <span>Upload</span><i class="fa fa-spin nothing"></i>
                                      <!-- The file input field used as target for the file upload widget -->
                                      <form><input class="clipart-data fileupload" type="file" name="files[]" data-clipart-type="endicon"></form>
                                    </a>
                                  </div>
                                  <span class="text-label">End Clipart</span>
                                </div>
                                <input type="hidden" name="clip_vals" id="clip_vals">
                                <div id="tempclipID" style="display: none" data-start="" data-end="" ></div>
                                <div id="tempclipStart" style="display: none" data-start="" ></div>
                                <div id="tempclipEnd" style="display: none" data-end="" ></div>
                            </div>
                          </div>

                          <div class="fusion-clearfix"></div>

                        </div><!-- /#add-clipart -->
                        </div>   
                    </div>
                        <div id="forCustomLogo" style="display: none;">
                          <div class="form-group" id="form-custom-logo">
                            <label for="adding-clipart" class="col-sm-4 control-label p-0">
                            Custom Logo/Design
                            </label>
                            <div class="col-sm-8 p-0">
                                    <a href="#" class="fileinput-button">
                                    <img class="image-upload"/>
                                    <span>Upload Image</span><i class="fa fa-spin nothing"></i>
                                      <!-- The file input field used as target for the file upload widget -->
                                      <!-- <input type = "file" id="files" name="my_file_upload[]" accept = "image/*" class = "files-data fileupload" /> -->
                                      <form>
                                        <input type = "file" id="files" name="my_file_upload[]" class = "files-data fileupload" />
                                      </form>
                                   </a>
                                    <i class="fa fa-question-circle" aria-hidden="true" id="attach-help" style="position: relative; bottom: 15px;"></i>
                                    <span class="options-hover" style="left: -4em; top: -4em; width: 300px;">
                                      <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      <span class="options-desc">
                                        <p>Allowed file types are CDR, JPG, JPEG, PSD, AI, PDF, PNG, GIF, EPS, TIFF, BMP</p>
                                      </span>
                                    </span>
                                   <div id="clipart_error_warning"></div>
                                   <div id="clipart_imagename" style="display: none"></div>
                                   <input type="checkbox" style="margin: 0!important;padding: 0; top: -5px;" />
                                   <span style="font-size: 14px; position: relative; bottom: 5px;">Email this later</span>
                            </div>
                            <div id="image_gallery"></div>
                          </div>                 
                          <!-- <div class="form-group" id="form-imprint-options">
                            <label for="imprint-options" class="col-sm-4 control-label p-0">
                            Imprint Options
                            <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                            <span class="options-hover">
                              <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                              <span class="options-desc">
                                <p>Make your message appear on both sides of the lanyard for better visibility.</p>
                              </span>
                            </span>
                            </label>
                            <div class="col-sm-8 p-0">
                              <span class="dd-pointer dd-pointer-down"></span>
                              <select name="" id="select-imprint-options">
                                <option value="One-Side">One Side</option>
                                <option value="Two-Side">Two Side</option>
                              </select>
                            </div>
                            </div> -->
                        </div>
                        <div class="form-group" id="form-imprint-options">
                          <label for="imprint-options" class="col-sm-4 control-label p-0">
                          Imprint Options
                          <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                          <span class="options-hover">
                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <span class="options-desc">
                              <p>Make your message appear on both sides of the lanyard for better visibility.</p>
                            </span>
                          </span>
                          </label>
                          <div class="col-sm-8 p-0">
                            <span class="dd-pointer dd-pointer-down"></span>
                            <select name="select-imprint-options" id="select-imprint-options">
                              <option value="One-Side">One Side</option>
                              <option value="Two-Side">Two Side</option>
                            </select>
                          </div>
                        </div>
                </div>
                <!-- Select Attachment -->
                <div id="additional-attachment-section" class="col-holder">
                    <div class="col-title">
                      <h5>
                        <span class="copy-badge-text">Select Attachment</span>
                            <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                              <span class="options-hover">
                                <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <span class="options-desc">
                                  <p>Add a free attachment to your lanyards. Choose which type of attachment best fits your needs.</p>
                                </span>
                        </span>
                      </h5>
                    </div>
                    <div class="attach-content">
                      <div class="form-group">
                      <div class="btn-group" data-toggle="buttons">

                      <?php $lanyard_attachment = lanyard_attachments();
                      $k = true;
                      foreach ($lanyard_attachment as $attachments => $attachment ):
                      ?>
                        <label class="btn btn-primary <?php echo $k ? 'active' : ''; ?>">
                         <span class="premium-icon">
                         Premium
                        <i class="fa fa-star"></i>
                        <!-- <i class="fa fa-crown"></i> -->
                         </span>
                          <span class="attach-img-wrap attachment_image">
                            <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . $attachment['image']; ?>')"></span>
                          </span>
                          <!-- <span class="copy-attach-price">+$0.50 Each</span> -->
                          <input type="radio" name="attachment_btn" id="attachment_btn" autocomplete="off" value="<?php echo $attachment['price']; ?>" data-name="<?php echo $attachment['name']; ?>">
                          <!-- <input type="hidden" name="attachment_value" id="attachment_value" > -->
                          <span class="attach-text"><?php echo $attachment['name']; ?></span>
                        </label>
                      
                      <?php $k = false;
                       endforeach; ?>
                    </div>
                    </div>
                    <div class="attach-optional">
                      <div class="col-title">
                        <h5 data-fontsize="11" data-lineheight="12">Additional Options</h5>
                      </div>  
                      <div class="btn-group" data-toggle="buttons">
                      <?php 
                        $lanyard_additional_options = lanyard_additional_options();
                        foreach ($lanyard_additional_options as $additionalopts => $additionalopt ):
                      ?>
                        <label class="btn btn-primary">
                          <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                          <span class="options-hover">
                            <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <span class="options-desc">
                              <p><?php echo $additionalopt['tooltip'];?></p>
                            </span>
                          </span> 
                          <span class="copy-attach-price">+$<?php echo $additionalopt['price'].' '.$additionalopt['key'];?> </span>
                          <input name="additional_options_check" type="checkbox" autocomplete="off" data-name="<?php echo $additionalopt['name']; ?>" value="<?php echo $additionalopt['price'];?>" data-key="<?php echo $additionalopt['key']; ?>">
                          <span class="copy-attach-img-wrap">
                            <span class="copy-attach-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri() . $additionalopt['image'];?> ')"></span>
                          </span>
                          <span class="copy-attach-label"><?php echo $additionalopt['name']; ?></span>
                        </label>
                        <?php $k = false; endforeach; ?>
                      </div>

                      <!-- BADGE HOLDERS -->
                      <div class="tab-content">
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-primary btn-badge-options">
                            <input name="badge_holders_check" type="checkbox" autocomplete="off">
                              <h4 data-fontsize="14" data-lineheight="15" style="margin-top: 0;">
                                <span class="copy-badge-text">Add Badge Holder</span>
                                <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                                  <span class="options-hover">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>Add a badge holder to insert an ID or name card.</p>
                                    </span>
                                  </span> 
                              </h4>
                          </label>
                          <div class="tab-pane copy-clear" id="badge_option" style="display: none;">
                            <div class="btn-group btn-badge" data-toggle="buttons">
                              <label class="btn btn-primary active">
                                <span class="options-help">
                                  <span class="options-hover">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>3.875W x 3.25H</p>
                                    </span>
                                  </span>   
                                </span>
                                <span class="attach-img-wrap">
                                  <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img10.png')"></span>
                                </span>
                                <span class="copy-attach-price">+$0.25 each</span>
                                <input type="radio" name="badge_holders" id="badge_holders" data-text="3.875W x 3.25H" autocomplete="off" checked value="0.25">
                                <span class="attach-text">3.875W x 3.25H</span>
                              </label>
                              <label class="btn btn-primary">
                                <span class="options-help">
                                  <span class="options-hover">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>4.5W x 3.75H</p>
                                    </span>
                                  </span>   
                                </span>
                                <span class="attach-img-wrap">
                                  <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img11.png')"></span>
                                </span>
                                <span class="copy-attach-price">+$0.25 each</span>
                                <input type="radio" name="badge_holders" id="badge_holders" data-text="4.5W x 3.75H" autocomplete="off" value="0.25">
                                <span class="attach-text">4.5W x 3.75H</span>
                              </label>
                              <label class="btn btn-primary">
                                <span class="options-help">
                                  <span class="options-hover">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>2.5W x 4.5H</p>
                                    </span>
                                  </span>   
                                </span>
                                <span class="attach-img-wrap">
                                  <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img13.png')"></span>
                                </span>
                                <span class="copy-attach-price">+$0.25 each</span>
                                <input type="radio" name="badge_holders" id="badge_holders" data-text="2.5W x 4.5H" autocomplete="off" value="0.25">
                                <span class="attach-text">2.5W x 4.5H</span>
                              </label>
                              <label class="btn btn-primary">
                                <span class="options-help">
                                  <span class="options-hover">
                                    <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <span class="options-desc">
                                      <p>3W x 5.25H</p>
                                    </span>
                                  </span>   
                                </span>
                                <span class="attach-img-wrap">
                                  <span class="attach-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img12.png')"></span>
                                </span>
                                <span class="copy-attach-price">+$0.25 each</span>
                                <input type="radio" name="badge_holders" id="badge_holders" data-text="3W x 5.25H" autocomplete="off" value="0.25">
                                <span class="attach-text">3W x 5.25H</span>
                              </label>

                              <input type="hidden" name="badge_holders_value" id="badge_holders_value" value="0.25">
                          </div>
                              </div>
                            </div>
                          </div>

                      <!-- END BADGE HOLDERS -->

                    </div>
                  </div>
                </div>
                <!-- /. additional options -->

            </div>
          </div>

          <!-- believe -->
        <div class="col-md-3 p-0 col-summ col-review-your-order">

        <!-- Summary -->
            <div class="col-holder col-holder-summ col-holder-summ-desktop">
                <div class="col-title">
                    <h5>Preview Your Lanyard Design</h5>
                </div>
                <div class="col-content-holder col-select col-summary" style="padding: 10px 20px;">
                    <div id="wdisplay101" style="text-align: center;">
                      <div id="loading-img" style="position: absolute; width: 100%; height: 100%; background-color: rgba(255,255,255,0.8); display: none;">
                        <i class="fa fa-cog fa-spin fa-3x fa-fw" style="position: absolute; top: 40%; right: 44%; margin: -40px 0px 0px 0px; "></i>
                        <span class="sr-only">Loading...</span>
                      </div>
                      <img id="img-preview" src="<?php echo get_home_url(); ?>/generate.php?message=Your message&font_style=Arial&color_bg=&color_txt=&start_icon_font=FontAwesome&start_icon=&end_icon_font=FontAwesome&end_icon=&attacment=Split Ring&buckle=&breakaway=&message_style=message_cliparts" alt="Lanyard Preview" style="width: 100%; height: 100%;">
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
                <div class="col-holder col-new-shipping">
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
                                  <i class="fa fa-question-circle" aria-hidden="true" id="attach-help"></i>
                                    <span class="options-hover">
                                      <a class="option-close" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      <span class="options-desc">
                                        <?php echo esc_attr($cus_location->tool_tip_text); ?>
                                      </span>
                                    </span>
                                  <!-- <i class="fa fa-question-circle" aria-hidden="true">
                                    <span class="copy-tooltip"><?php echo esc_attr($cus_location->tool_tip_text); ?></span>
                                  </i> -->
                                  <!-- <span class="fusion-popover tooltip-img" data-toggle="tooltip" data-placement="top"
                                  title="<?php //echo esc_attr($cus_location->tool_tip_text); ?>">?</span> -->
                                  <span class="alert-notify alert-color customization_location each-message">+$0.10 each</span>
                                </label>

                              </p>
                              </div>
                              <?php $flag = true;
                              endforeach; ?>
                              </div> 
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
                                    <textarea class="input-text form-control" name="additional_notes" id="additional_notes" cols="30" rows="5" placeholder="Add Comments"><?php echo $metaInfo['AddNotes_msg']; ?></textarea>
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
                                    
                                    <button id="lanyard_add_to_cart" href="#" class="btn-add-to-cart">
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
</div>
<!-- end of the body -->

<!-- Price Chart -->
<div class="section-price-chart">
    <div class="container p-0">
        <a class="go-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <div id="price-scroll-lanyard">
          <div id="price_chart_lanyard" class="">
            <div class="fusion-column-wrapper">
              <p class="copy-font-fourteen copy-upper" id="table_price_name_lanyard">Pricing Guide for Polyester 5/8 inch</p>
              <table id="table_chart-lanyard" class="table table-bordered">
                <tr>
                  <td>Qty</td>
                  <td>20-49</td>
                  <td>50-99</td>
                  <td>100-149</td>
                  <td>150-199</td>
                  <td>200-249</td>
                  <td>250-499</td>
                  <td>500-999</td>
                  <td>1000-2499</td>
                  <td>2500-2999</td>
                  <td>3000-4999</td>
                  <td>5000+</td>
                </tr>
                <tr>
                  <td>Price $</td>
                  <td>4.82</td>
                  <td>3.13</td>
                  <td>1.13</td>
                  <td>1.12</td>
                  <td>1.11</td>
                  <td>1.10</td>
                  <td>0.68</td>
                  <td>0.53</td>
                  <td>0.48</td>
                  <td>0.44</td>
                  <td>0.40</td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- /End Price Chart -->


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

<?php  
get_footer();