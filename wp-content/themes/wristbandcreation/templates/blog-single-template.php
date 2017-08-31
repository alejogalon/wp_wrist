<?php 
/*
	Template Name: Single Blog Page
*/
get_header(); ?>
	<div class="header-title text-center">
	    <h1>Blog</h1>
	</div>
	<div class="section-content section-blog blog-single">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="copy-blog-img-wrap" style="height: 292px; overflow: hidden;">
						<div class="copy-blog-img-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/blog-img-sample.jpg');height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center;">
						</div>
					</div>
					<h2 class="copy-blog-title">Sample Default Blog Post With Picture</h2>
					<span class="copy-blog-date copy-proxima-sbold copy-upper copy-spacing">September 30, 2016</span>
					<div class="copy-blog-content copy-marg-top">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						<br></br>
						Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
					</div>

					<div class="row row-share">
						<hr class="hr-line">
						<div class="col-md-6 p-0">
							<span class="copy-blog-share copy-upper copy-spacing copy-proxima-sbold">Share this Post</span>
						</div>
						<div class="col-md-6 p-0 text-right">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 copy-float-right">
					<div class="col-post-widget">
						<h3 class="copy-blog-other copy-upper copy-proxima-sbold">Other Posts</h3>
						<ul>
							<li><a href="#">This Is A Sample Blog Title</a><hr class="hr-line"></li>
							<li><a href="#">Sample Hovered Blog Title</a><hr class="hr-line"></li>
							<li><a href="#">This Is A Sample Blog Title</a><hr class="hr-line"></li>
							<li><a href="#">This Is A Sample Blog Title</a><hr class="hr-line"></li>
							<li><a href="#">This Is A Sample Blog Title</a><hr class="hr-line"></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>