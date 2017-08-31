<?php 

 //Template Name: New About us Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>


<div class="header-title text-center">
    <h1><?php the_title(); ?></h1>
</div>
<div class="section-content" id="section-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-wrist">
                    <p>
                        Welcome to WristbandCreation.com, your number one source of customized silicone wristbands. We are dedicated to giving out customers the very best of our promotional items, with a focus on excellent customer service, low price, and guaranteed delivery time.
                    </p>
                    <p>
                        We are founded in 2005 by Chris Angeles, when he started this business in his home office in Burbank, CA. He started off by selling pre-made silicone wristbands with messages such as Support Our Troops and Breast Cancer Awareness on eBay and on a retail website. This is when the Lance Armstrong Livestrong wristbands was a big trend in 2004. Several of his customers were inquiring if Chris can also customize a silicone wristband, but he always declined this.
                    </p>
                </div>
            </div>
            <div class="col-md-6 about-wrist-img about-img-dekstop">
                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about-us-lanyards.jpg" alt="Wristband Creation Rubber Bracelets"> -->
                <div class="about-img about-lanyards" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/about-us-lanyards.jpg');"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 about-wrist-img about-img-dekstop">
                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imgpsh_fullsize.png" alt="Wristband Creation Rubber Bracelets"> -->
                <div class="about-img about-wristbands" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/imgpsh_fullsize.png');"></div>
            </div>
            <div class="col-md-6 about-wrist-img about-img-mobile" style="display: none;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wristband-home.png" alt="Assorted Wristbands">
            </div>
            <div class="col-md-6">
                <div class="about-wrist text-right">
                    <p>                        
                        One day, after noticing a huge demand for customized silicone bracelets, he started to say "yes, we can produce silicone wristbands", and he found a solution to the problem on how to manufacture wristbands. He got his very first order of custom wristbands on April 1, 2005, and that was the start of Wristband Creation. Until this date, we have produced tens of millions of wristbands and have served tens of thousands of clients worldwide.
                    </p>
                    <p>
                        We are a fast growing company, and we have also been expanding our product line to also being able to manufacture other products such as customized lanyards and lapel pins.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="about-wrist-text">
                    <p>WristbandCreation.com is owned and operated by Custom Wristbands Inc., a corporation located at 4416 W. Verdugo Ave., Burbank, CA 91505. You can reach us at <a href="mailto:sales@wristbandcreation.com" target="_blank">sales@wristbandcreation.com</a> or call us at <a href="tel:(800) 403-8050">(800) 403-8050</a>.</p>
                </div>
            </div>
        </div> 
        <div class="row" id="about-map">
            <div class="col-md-7 p-0">
                <div class="copy-map-wrap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3301.539131300231!2d-118.35360208478215!3d34.15813118057729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2be2c0537c787%3A0x13fcd90a7eb96ba2!2s4416+W+Verdugo+Ave%2C+Burbank%2C+CA+91505%2C+USA!5e0!3m2!1sen!2sph!4v1491959380972" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-5 p-0 contact-con">
                <div class="about-contact">
                    <div class="about-contact-content">
                        <div class="sign">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="sign-content line-height">
                            4416 W. Verdugo Ave., <br> Burbank, CA 91505
                        </div>
                     </div>     
                     <div class="about-contact-content">
                        <div class="sign">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="sign-content">
                            (800) 403-8050
                        </div>
                    </div>
                     <div class="about-contact-content">
                        <div class="sign">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="sign-content">
                            <a href="mailto:sales@wristbandcreation.com" target="_blank">sales@wristbandcreation.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="section-content team-section">
    <div class="container">
        <h3>Our Valuable Team Members</h3>
        <ul class="team-holder">
            <?php if( have_rows('members_information') ): ?>
                <?php while( have_rows('members_information') ): the_row(); ?>
                    <li>
                        <div class="team-img">
                            <div class="team--img">
                                <img src="<?php the_sub_field('picture'); ?>" alt="">
                            </div>
                        </div>
                        <div class="team-desc text-center">
                            <h4><?php the_sub_field('name'); ?></h4>
                            <span><?php the_sub_field('position'); ?></span>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</div> -->
<div class="section-content bg-blue-about">
    <div class="container">
        <h4>Find out more about us and our products! Call us today at <span>(800) 403-8050</span> or send us a message</h4>
        <div class="btn-holder btn-about text-center">
            <a href="<?php echo get_site_url(); ?>/contact-us" class="btn-message">Message Us</a>
            <a href="<?php echo get_site_url(); ?>/order-now/" class="btn-design">Design My Wristband <i class="fa fa-caret-right" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

<?php 
    endwhile;
    endif; 
    get_footer();
?>