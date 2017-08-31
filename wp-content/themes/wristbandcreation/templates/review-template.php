<?php 

 //Template Name: Review Template
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>


<div class="header-title text-center">
    <h1>Customer Reviews</h1>
</div>
<script type="text/javascript"> var sa_review_count = 20; var sa_date_format = 'F j, Y'; function saLoadScript(src) { var js = window.document.createElement("script"); js.src = src; js.type = "text/javascript"; document.getElementsByTagName("head")[0].appendChild(js); } saLoadScript('//www.shopperapproved.com/merchant/13400.js'); </script><div id="review_header"></div><div id="merchant_page"></div><div id="review_image"><a href="http://www.shopperapproved.com/reviews/wristbandcreation.com/" target="_blank" rel="nofollow"></a></div>
<?php 
    endwhile;
    endif; 
    get_footer();
?>