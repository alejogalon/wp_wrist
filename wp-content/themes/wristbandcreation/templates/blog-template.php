<?php 
/*
	Template Name: Blog Page
*/
get_header(); ?>
	<div class="header-title text-center">
	    <h1>Blog</h1>
	</div>
	<div class="section-content section-blog">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="copy-blog-title">Sample Default Blog Post Without Picture</h2>
						<span class="copy-blog-date copy-proxima-sbold copy-upper copy-spacing">September 30, 2016</span>
						<div class="copy-blog-content copy-marg-top">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
						</div>
						<a class="copy-blog-url copy-upper" href="#">Read More</a>
						<hr class="hr-line">
				</div>
				<div class="col-md-12">
					<div class="copy-blog-img-wrap" style="height: 292px; overflow: hidden;">
						<div class="copy-blog-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/blog-img-sample.jpg');height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center;">
						</div>
					</div>
					<h2 class="copy-blog-title">Lorem Ipsum Dolor Set Amet</h2>
						<span class="copy-blog-date copy-proxima-sbold copy-upper copy-spacing">September 29, 2016</span>
						<div class="copy-blog-content copy-marg-top">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
						</div>
						<a class="copy-blog-url copy-upper" href="#">Read More</a>
						<hr class="hr-line">
				</div>
				<div class="col-md-12">
					<h2 class="copy-blog-title">Lorem Ipsum Dolor Set Amet</h2>
						<span class="copy-blog-date copy-proxima-sbold copy-upper copy-spacing">September 29, 2016</span>
						<div class="copy-blog-content copy-marg-top">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
						</div>
						<a class="copy-blog-url copy-upper" href="#">Read More</a>
						<hr class="hr-line">
				</div>
			</div>
			<div class="blog-pagination">
				<ul>
					<li class="page-btn copy-upper"><a href="#">prev</a></li>
					<li><a href="#">1</a></li>
					<li class="active"><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li class="page-btn copy-upper"><a href="#">next</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php get_footer(); ?>