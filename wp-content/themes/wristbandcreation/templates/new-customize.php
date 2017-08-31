<?php 

 //Template Name: New Customize Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="section-tabs customize section-content">
        <div class="container">
            <div class="col-md-3"> <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left" id="mychart" ><!-- 'tabs-right' for right tabs -->
                    <li class="active"><a href="#colorchart" data-toggle="tab">Color Pantone Chart</a></li>
                    <li><a href="#fonts" data-toggle="tab">Available Fonts</a></li>
                    <li><a href="#logos" data-toggle="tab">Available Logos</a></li>
                    <li><a href="#sizes" data-toggle="tab">Available Sizes</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="colorchart">
                        <h1>Color Pantone Chart</h1>
                        <p>Here at Wristband Creation, we use exact color Pantone Matching System, also knows as PMS. This is a standardized color matching system, so that different companies and organizations maintain the consistent shades of colors they use for all paint used in their materials.

                        In our case, we offer our clients the entire selection of the Pantone Matching System, so you can choose the exact shade of color you desire, and we guarantee to match that color.

                        Take note that depending on the settings of your screen or monitor, these colors may vary from screen to screen.
                        </p>
                        <?php include("pantone.php"); ?>
                    </div>

                    <div class="tab-pane" id="fonts">
                        <h1>Available Fonts</h1>
                        <p>Here at Wristband Creation, we offer a wide variety of options you can choose from to customize your own message or text. Below we have suggested our top choices of fonts to choose from. If you have a particular font you would like to use that is not on this list, please let us know on your order and we can accomodate any font you would like this use. We will send you an artwork layout for approval to ensure you are satisfied with your design.
                        </p>
                            <ul>
                            <?php 

                            	if (isset($GLOBALS['wbc_settings']->fonts)):
                                	usort($GLOBALS['wbc_settings']->fonts, 'strnatcasecmp');
                                    foreach ($GLOBALS['wbc_settings']->fonts as $font):
                                        $newlabel = change_font_to_label(esc_attr($font));
                            ?>
	                            <li>
	                                <div class="inner-content">
	                                    <div class="fontliststyle" style="font-family: '<?php echo esc_attr($font); ?>'">Ag</div><br>
	                                    <div class="font-label"><?php echo ($newlabel)? $newlabel:esc_attr($font); ?></div>
	                                    <input class="fontvalue" type="hidden" value="<?php echo esc_attr($font); ?>">
	                                </div>
	                            </li>
	                             <?php endforeach;
                                    endif;
                                    ?>
                            </ul>
                    </div>

                    <div class="tab-pane" id="logos">
                        <h1>Available Logos</h1>
                        <p>Text on wristbands without and images of logos can look a little basic. Since we can put almost anything you want on the wristbands, we compiled a list of the most popular logos that our clients puts on them. See our list below of over 180 logos to choose from. If you don't find any logo you like in this list or if you have a specific company or organization logo to use, feel free to email it to us or upload it on our <a href="<?php echo get_site_url(); ?>/order-now/">Order Now</a> and we can accomodate your needs.</p>
                        <?php if (count($GLOBALS['wbc_settings']->logo->list) != 0): ?>
                                    <ul>
                                        <?php foreach ($GLOBALS['wbc_settings']->logo->list as $name => $icon):
                                        ?>
                                        <li><i class="fusion-li-icon fa <?php echo esc_attr($icon->glyphicon); ?>"></i>
			                                <span><?php echo esc_attr($icon->name); ?></span>
			                            </li>
                                      <?php endforeach; ?>
                                    </ul>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane" id="sizes">
                        <h1>Available Sizes</h1>
                        <div class="gap-20"></div>
                        <!-- <p>Wristband Creation uses only the highest grade silicone material. Our silicone wristbands do not contain any latex and are 100% silicone similar to Lance Armstrong “Livestrong Wristbands”.
                        <span class="copy-block copy-marg-top">You can download our printable PDF cut out to see how each wristband size will fit around your wrist.</span>
                        </p> -->
                        <div class="size-img-wrap copy-hidden copy-marg-bottom-small">
                            <div class="size-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/S-M-L_3.jpg');"></div>
                        </div>

                        <p>We offer several wristband sizes that you can choose from depending on your needs and the people that will be wearing them. If you remember the Lance Armstrong Livestrong wristbands, our Adult Size (8") and Youth Size (7") exactly matches that. Our most popular size is the Medium Size (7.5") that fits most people. We also offer special sizes such as the Extra Large Size (8.5") for large people with big wrists, and Toddler Size wristbands (6.5") recommended to those that are 4 years old and below. 

                        If you like to make sure you order the perfect size that fits your needs, we have made a printable PDF guide that you can download, print, and cut-out to see how each wristband fits around your wrist.</p>

                        <a class="bnt-pdf" href="<?php echo get_stylesheet_directory_uri(); ?>/images/WristbandCreation-Size-Guide.pdf" target="_blank">Size Printout Guide <i class="fa fa-download" aria-hidden="true"></i></a>

                        <div class="size-img-wrap copy-hidden copy-marg-bottom-small copy-marg-top">
                            <div class="size-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/S-M-L_2.jpg');"></div>
                        </div>

                        <!-- <p>Here are the available sizes:</p> -->
                        <p>Wristband Creation uses only the highest grade silicone material. Our silicone wristbands do not contain any latex and are 100% silicone similar to Lance Armstrong “Livestrong Wristbands”.</p>

                        <div class="gap-20"></div>
                        <div class="customize-size">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customize-size.png" width="657" height="495" alt="Wristband Size Chart">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    endwhile;
    endif; ?>



<?php get_footer(); ?>