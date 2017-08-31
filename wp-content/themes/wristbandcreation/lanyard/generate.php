<?php
  //error_reporting(E_ALL);
  //application/x-httpd-php generate.php ( PHP script text );
  //phpinfo();
  $func_exist = 1;
  header('Content-Type: image/jpeg');
  if (!function_exists('imageflip')) {
    define('IMG_FLIP_HORIZONTAL', 0);
    define('IMG_FLIP_VERTICAL', 1);
    define('IMG_FLIP_BOTH', 2);
    $func_exist = 0;
  
    function imageflip($image, $mode) {
      switch ($mode) {
        case IMG_FLIP_HORIZONTAL: {
          $max_x = imagesx($image) - 1;
          $half_x = $max_x / 2;
          $sy = imagesy($image);
          $temp_image = imageistruecolor($image)? imagecreatetruecolor(1, $sy): imagecreate(1, $sy);
          for ($x = 0; $x < $half_x; ++$x) {
            imagecopy($temp_image, $image, 0, 0, $x, 0, 1, $sy);
            imagecopy($image, $image, $x, 0, $max_x - $x, 0, 1, $sy);
            imagecopy($image, $temp_image, $max_x - $x, 0, 0, 0, 1, $sy);
          }
          break;
        }
        case IMG_FLIP_VERTICAL: {
          $sx = imagesx($image);
          $max_y = imagesy($image) - 1;
          $half_y = $max_y / 2;
          $temp_image = imageistruecolor($image)? imagecreatetruecolor($sx, 1): imagecreate($sx, 1);
          for ($y = 0; $y < $half_y; ++$y) {
            imagecopy($temp_image, $image, 0, 0, 0, $y, $sx, 1);
            imagecopy($image, $image, 0, $y, 0, $max_y - $y, $sx, 1);
            imagecopy($image, $temp_image, 0, $max_y - $y, 0, 0, $sx, 1);
          }
          break;
        }
        case IMG_FLIP_BOTH: {
          $sx = imagesx($image);
          $sy = imagesy($image);
          $temp_image = imagerotate($image, 180, 0);
          //imagecopy($image, $temp_image, 0, 0, 0, 0, $sx, $sy);
          return $temp_image;
          break;
        }
        default: {
          return;
        }
      }
      //imagedestroy($temp_image);
    }
  }
  if (!function_exists('imagecrop')) {
    $func_exist = 0;
    function imagecrop($src, array $rect){

      $color_bg = strtoupper($_GET['color_bg']) != '#FFFFFF' ? '#'.$_GET['color_bg']:'#E8E8E8';
      $colorRgb = hex2RGB($color_bg);
      if($colorRgb == false){
        $colorRgb = array('red' => 0x00, 'green' => 0x6D, 'blue' => 0xE9);
      }

      $dest = imagecreatetruecolor($rect['width'], $rect['height']);
      
      $background_color = imagecolorallocatealpha($dest, $colorRgb['red'], $colorRgb['green'], $colorRgb['blue'],127);
      imagefill($dest, 0, 0, $background_color);
      imagealphablending($dest, true);
      imagesavealpha($dest, true);
      
      imagecopy(
          $dest,
          $src,
          0,
          0,
          $rect['x'],
          $rect['y'],
          $rect['width'],
          $rect['height']
      );

      return $dest;
    }
  }

  //$text = htmlspecialchars(stripslashes($_GET['message']), ENT_NOQUOTES, 'UTF-8');
  $text = utf8_decode(urldecode($_GET['message']));
  $text = html_entity_decode($text,null,'UTF-8');

  $font_family = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/lanyard/assets/fonts/'.$_GET['font_style'].'.ttf';
  if(!file_exists($font_family)){         
    $font_family = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/fonts/wristband-fonts/'.$_GET['font_style'].'.ttf';
    if(!file_exists($font_family)){
      $font_family = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/fonts/'.$_GET['font_style'].'.ttf';
      if(!file_exists($font_family)){
        $font_family = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/lanyard/assets/fonts/arial.ttf';
      }
    }
  }

  $attachment = str_replace(" ","-",$_GET['attacment']);
  $buckle = $_GET['buckle']=='' ? '':'-'.str_replace(" ","-",$_GET['buckle']);
  $breakaway = $_GET['breakaway']=='' ? '':'-'.str_replace(" ","-",$_GET['breakaway']);
  
  $start_icon_text = $_GET['start_icon'] != '' ? json_decode('"&#x'.$_GET['start_icon'].';"') : ' ';
  $end_icon_text = $_GET['end_icon'] != '' ? json_decode('"&#x'.$_GET['end_icon'].';"') : ' ';

  if($_GET['start_icon_font']!='custom'){
    $start_icon_font = $_GET['start_icon_font'] == "FontAwesome" ? 'fontawesome-webfont':'icomoon';
    $start_font = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/iconlist/'.$start_icon_font.'.ttf';
  }else{
    $start_icon_text = json_decode('"&#xE800;"');
    $start_font = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/fonts-placeholder/upload-placeholder.ttf';
  }

  if($_GET['end_icon_font']!='custom'){
    $end_icon_font = $_GET['end_icon_font'] == "FontAwesome" ? 'fontawesome-webfont':'icomoon';
    $end_font = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/iconlist/'.$end_icon_font.'.ttf';
  }else{
    $end_icon_text = json_decode('"&#xE800;"');
    $end_font = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/fonts-placeholder/upload-placeholder.ttf';
  }
  
  $font_size = 14.5; 
  $color_bg = strtoupper($_GET['color_bg']) != '#FFFFFF' ? '#'.$_GET['color_bg']:'#E8E8E8';

  $color_txt = '#'.$_GET['color_txt'];

  $colorRgb = hex2RGB($color_bg);
  if($colorRgb == false){
    $colorRgb = array('red' => 0x00, 'green' => 0x6D, 'blue' => 0xE9);
  }

  $colorTxt = hex2RGB($color_txt);
  if($colorTxt == false){
    $colorTxt = array('red' => 0x00, 'green' => 0x00, 'blue' => 0x00);
  }

  $message_style = $_GET['message_style'];

  //Load corner images
  $top_corner = imagecreatefrompng( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/images/lanyard/left-corner.png');
  $top_cornerWidth=imagesx($top_corner);
  $top_cornerHeight=imagesy($top_corner);
 
  $trans_background = imagecolorallocatealpha($top_corner, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue'], 127);

  imagesavealpha($top_corner, true);
  imagefill($top_corner, 0, 0, $trans_background);

  $btm_corner = imagecreatefrompng( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/images/lanyard/right-corner.png');
  $btm_cornerWidth=imagesx($btm_corner);
  $btm_cornerHeight=imagesy($btm_corner);
    
  $trans_background = imagecolorallocatealpha($btm_corner, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue'], 127);

  imagesavealpha($btm_corner, true);
  imagefill($btm_corner, 0, 0, $trans_background);

  //Load the lanyard transparent image
  $trans_lanyard = imagecreatefrompng( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/images/lanyard/lanyard-container-'.$attachment.''.$buckle.''.$breakaway.'.png');
  $width  = imagesx($trans_lanyard);
  $height = imagesy($trans_lanyard);
 
  // dimensions of the final image
  $final_img = imagecreatetruecolor($width, $height);
  imagesavealpha($final_img, true);

  //create a fully transparent background (127 means fully transparent)
  $background_color = imagecolorallocate($final_img, $colorRgb['red'], $colorRgb['green'], $colorRgb['blue']);


  //fill the image with a transparent background
  imagefill($final_img, 0, 0, $background_color);
  

  /***********Load Message************/
  if($message_style=='custom_logo'){
    $text = 'logo';
    $font_family = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/lanyard/assets/fonts/arial.ttf';
    $start_icon_text = json_decode('"&#xE800;"');
    $start_font = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/wristbandcreation/wristband/assets/fonts-placeholder/upload-placeholder.ttf';
  }
  
  $final_message = repeatMsg($text, $font_family, $width, $colorTxt, $start_icon_text, $start_font, $end_icon_text, $end_font, $message_style);
  
  //Rotate Bottom Text
  $rotate = imagerotate($final_message, 79, imagecolorallocatealpha($final_message, 0,0,0, 127));
  
  imagealphablending($rotate, false);
  imagesavealpha($rotate, true);

  $size = min(imagesx($final_message), imagesy($final_message));
  if($func_exist==0){
    $cropMsg =  imagecrop($final_message, ['x' => 0, 'y' => 0, 'width' => 840, 'height' => $size]);
    //imageflip($cropMsg, IMG_FLIP_BOTH);
    $flipMsg = imagerotate($cropMsg, 180, 0);
    $rotateTop = imagerotate($flipMsg, 101.1, imagecolorallocatealpha($flipMsg,  0,0,0, 127));
  }else{
    $cropMsg =  imagecrop($final_message, ['x' => 0, 'y' => 0, 'width' => 850, 'height' => $size]);
    imageflip($cropMsg, IMG_FLIP_BOTH);
    $rotateTop = imagerotate($cropMsg, 101, imagecolorallocatealpha($cropMsg,  0,0,0, 127));
  }
  
  imagealphablending($rotateTop, false);
  imagesavealpha($rotateTop, true);
    
  /********Create box *********/
  $width_box  = 60;
  $height_box = 160;
 
  $box_img = imagecreatetruecolor($width_box, $height_box);
  imagesavealpha($box_img, true);

  //create a fully transparent background (127 means fully transparent)
  $background_color = imagecolorallocate($box_img, $colorRgb['red'], $colorRgb['green'], $colorRgb['blue']);

  //fill the image with a transparent background
  imagefill($box_img, 0, 0, $background_color);
  
  $rotateRect = imagerotate($box_img, -11, imagecolorallocatealpha($box_img, $colorRgb['red'], $colorRgb['green'], $colorRgb['blue'], 127));
  
  imagealphablending($rotateRect, false);
  imagesavealpha($rotateRect, true);

  /********Merge the images*********/
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);

  imagecopy($final_img, $trans_lanyard, 0, 0, 0, 0, $width, $height);
  if($func_exist == 0) {
    imagecopy($final_img, $rotateTop, -12, 3, 0, 0, 210, 820);
    imagecopy($final_img, $rotateRect, 150, 680, 0, 0, $width_box+23, $height_box+5);
    imagecopy($final_img, $rotate, 148, 0, 0, 0, 300, 860);
  }else{
    imagecopy($final_img, $rotateTop, -13, -20, 0, 0, 210, 840);
    imagecopy($final_img, $rotateRect, 150, 680, 0, 0, $width_box+23, $height_box+5);
    imagecopy($final_img, $rotate, 148, 0, 0, 0, 300, 860);
  }

  imagecopy($final_img, $btm_corner, $width-57, 5, 0, 0, 63, 63);
  imagecopy($final_img, $top_corner, 0, 0, 0, 0, 63, 63);
  //imagecopy($container_img, $final_breakaway_img, $container_width-86, 135, 0, 0, $width_br, $height_br);

  header("Content-Type: image/jpeg");

  echo imagejpeg($final_img,NULL,100);

  //frees any memory associated with the image 
  imagedestroy($final_img);
  imagedestroy($trans_lanyard);
  imagedestroy($final_message);
  imagedestroy($rotate);
  imagedestroy($cropMsg);
  imagedestroy($rotateTop);
  imagedestroy($btm_corner);
  imagedestroy($top_corner);
  imagedestroy($rotateRect);
  imagedestroy($box_img);

  //die();

//Repeat Message
function repeatMsg($text, $font_family, $width, $colorTxt, $start_icon_text, $start_font, $end_icon_text, $end_font, $message_style){

  $height = 870;

  $final_message = imagecreatetruecolor($height, 60 );
  $trans_background = imagecolorallocatealpha($final_message,$colorTxt['red'], $colorTxt['green'], $colorTxt['blue'], 127);

  imagefill($final_message, 0, 0, $trans_background);
  imagealphablending($final_message, true);
  imagesavealpha($final_message, true);

  $y = 60 * 0.9-7; // baseline of text at 90% of $img_height
  $x = 5;

  $font_size = 1; 
  $txt_max_height = 25;

  /********Create MESSAGE and ICONS *********/
  $p = imagettfbbox($font_size, 0, $font_family, $text);
  $txt_width = $p[2] - $p[0];
  $txt_height=$p[1]-$p[7]; 

  if($font_size > 20){
    while ($font_size > 20) {
      $font_size--;
    }
  }elseif($font_size < 20){
    while ($font_size < 20) {
      $font_size++;
    }
  }

  do {        
      $font_size++;
      $p = imagettfbbox($font_size, 0, $font_family, $text);
      $txt_width = $p[2] - $p[0];
      $txt_height=$p[1]-$p[7];  
      if($font_size >= 24){
        break;
      }
  } while ($txt_height < $txt_max_height);



  $p = imagettfbbox($font_size, 0, $font_family, $text);
  $txt_width = $p[2] - $p[0];
  $txt_height=$p[1]-$p[7];  

  $add_yPos = 0;

  $yPos = (60-$txt_height)/2;
  $add_yPos = abs($font_size-$txt_height);
  $add_yPos = $add_yPos>10 ? 5:$add_yPos;
  /*if(abs($font_size-$txt_height) > 15){
    $add_yPos = 10;
  }*/
  if($yPos <= 16){
    $new_yPos = $yPos+10;
  }elseif($yPos > 16 && $font_size >= 25 && $font_size < 30){
    $new_yPos = $yPos+8+$add_yPos;
  }elseif($yPos > 16 && $font_size >= 30){
    $new_yPos = $yPos+$add_yPos;
  }elseif($yPos > 16 && $font_size <= 24 && $txt_height < 20){
    $new_yPos = $yPos;
  }else{
    $new_yPos = $yPos+7;
  }
    
  if($_GET['font_style']=='The Bubble'){
    if(strpos($text, 'g') !== false) {
       $y = 5;
       $new_yPos += 5;
    }else{
       $y = 5;
    }
  }elseif($_GET['font_style']=='Wood Warrior'){
    $y = 5;
  }else{
    $y = 0;
  }

  /********Create ICONS*********/
  $icon = imagettfbbox($font_size, 0, $start_font, $start_icon_text);
  $icon_width = $icon[2] - $icon[0];
  $icon_end = imagettfbbox($font_size, 0, $end_font, $end_icon_text);
  $icon_end_width = $icon_end[2] - $icon_end[0];

  $start_icon_img = imagecreatetruecolor($icon_width+50, 60);
  $trans_background = imagecolorallocatealpha($start_icon_img, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue'], 127);

  imagesavealpha($start_icon_img, true);
  imagefill($start_icon_img, 0, 0, $trans_background);
  $icon_color = imagecolorallocate($start_icon_img, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue']);
  
  //End icon
  $end_icon_img = imagecreatetruecolor($icon_end_width+50, 60);
  $trans_background = imagecolorallocatealpha($end_icon_img, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue'], 127);

  imagesavealpha($end_icon_img, true);
  imagefill($end_icon_img, 0, 0, $trans_background);
  $icon_color = imagecolorallocate($end_icon_img, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue']);

  $new_xPos = 0;
  $new_BtmxPos = 0;
  $add_width = 0;
  $add_height = 0;
  if(strlen($start_icon_text)>0 && strlen($end_icon_text)>0){
    $new_xPos = $_GET['start_icon_font'] == "FontAwesome" ? $icon_width+10:$icon_width+15;
    $add_width = $new_xPos+$icon_end_width+10;
    $new_BtmxPos = $txt_width+$add_width-($icon_end_width+5);
    $add_height =  $_GET['start_icon_font'] == "FontAwesome" ?  20:25;
     $message_pos = (60-$txt_height)/2-5;
  }else{
    if(strlen($start_icon_text)>0){
      $new_xPos =  $_GET['start_icon_font'] == "FontAwesome" ? $icon_width+10:$icon_width+15;
      $add_width = $new_xPos;
      $add_height =  $_GET['start_icon_font'] == "FontAwesome" ? 20:25;
       $message_pos = (60-$txt_height)/2-5;
    }elseif(strlen($end_icon_text)>0){
      $new_xPos = $icon_width+5;
      $add_width = $icon_end_width+20;
      $new_BtmxPos = $txt_width+10;
      $add_height =  $_GET['start_icon_font'] == "FontAwesome" ? 20:25;
      $message_pos = (60-$txt_height)/2-5;
    }else{
      $new_xPos = $x;
      $add_width = 10;
      $message_pos = (60-$txt_height)/2;
    }
  }
  if($add_height > 0){
    $new_yPos +=5;
    if($_GET['font_style']=='Alba'){  
      if(strpos($text, 'g') !== false) {
        $z = 8;   
      }else{
        $z = 0;   
      }
    }else{
      $z = 0;
    }
     
  }
  if($_GET['end_icon_font']=='custom'){
    $add_width += 10;
  }
  /********Create MESSAGE*********/
  $textImg = imagecreatetruecolor( $txt_width+$add_width, $txt_height+10+$add_height );
  imagesavealpha($textImg, true);
  imagealphablending($textImg, false);

  $white = imagecolorallocatealpha($textImg, 0,0,0, 127);
  imagefill($textImg, 0, 0, $white);
  
  $text_color = imagecolorallocate($textImg, $colorTxt['red'], $colorTxt['green'], $colorTxt['blue']);
 
  //Merge the icons and the message  
  if($message_style != 'custom_logo'){
    if($_GET['start_icon_font']!='custom'){
      imagettftext($textImg, $font_size, 0, $x, $_GET['start_icon_font'] == "FontAwesome" ? $new_yPos+$z:$new_yPos+$z+5, $icon_color, $start_font, $start_icon_text); 
    }else{
      imagettftext($textImg, $font_size+5, 0, $x, $new_yPos+$z+5, $icon_color, $start_font, $start_icon_text);
    }

    imagettftext($textImg, $font_size, 0, $new_xPos, $new_yPos+$y, $text_color, $font_family, $text);

    if($_GET['end_icon_font']!='custom'){
      imagettftext($textImg, $font_size, 0, $new_BtmxPos, $_GET['end_icon_font'] == "FontAwesome" ? $new_yPos+$z:$new_yPos+$z+5, $icon_color, $end_font, $end_icon_text);  
    }else{
      imagettftext($textImg, $font_size+5, 0, $new_BtmxPos, $new_yPos+$z+5, $icon_color, $end_font, $end_icon_text);    
    }
  }else{
    imagettftext($textImg, 33, 0, $x, $yPos+20, $icon_color, $start_font, $start_icon_text);
  }
  
  /********Repeat MESSAGE*********/
  $spacing = 30;
  $repeat =  ceil($height/$txt_width)+1;
  for($i = 0; $i < $repeat; $i++){
    imagecopy($final_message, $textImg, $spacing, $message_pos, 0, 0, $txt_width+$add_width, $txt_height+10+$add_height);
    if($txt_width > 100){
      $spacing = $spacing+$txt_width+$add_width+20;
    }else{
      $spacing = $spacing+$txt_width+$add_width+50;
    }
    
  }

  imagedestroy($textImg);
  imagedestroy($start_icon_img);
  imagedestroy($end_icon_img);

  return $final_message;
}

//Convert hexadecimal to RGB 
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

?>