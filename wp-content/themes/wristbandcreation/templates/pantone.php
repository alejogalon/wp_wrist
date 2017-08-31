<ul class="color-pantone-list">
    <?php 
  $add_color_pantone = add_additional_pantone(); 
  // var_dump($add_color_pantone); 
  ?>
   <?php if (isset($GLOBALS['wbc_settings']->pantone_color)):
            foreach ($GLOBALS['wbc_settings']->pantone_color as $pantone):?>
        <li>
            <div class="additionalColor">
                <div class="colorContdiv" style="background-color: <?php echo $pantone->color_number;?>;"></div>
                     <p><?php echo $pantone->pantone_name;?></p>
            </div>
       </li>
    <?php endforeach;
      foreach ($add_color_pantone as $pantones => $pantone ): ?>
      <li>
            <div class="additionalColor">
                <div class="colorContdiv" style="background-color: <?php echo $pantone['color'];?>;"></div>
                     <p><?php echo $pantone['name'];?></p>
            </div>
       </li>
      <?php 
            endforeach;
            endif;
    ?>
</ul>