<?php get_header(); ?>
<div id="content" class="full-width">
	<div id="post-404page">
		<div class="post-content">
			<div class="error-message">
				<h1>404</h1>
			</div>
			<div class="fusion-clearfix"></div>
				<div class="section-content">
					<div class="container">
						<div class="error-page">
							<div class="fusion-columns fusion-columns-3">
								<div class="row">
									<?php
										// Render the page titles
										$subtitle = esc_html__( 'Page Not Found', 'Avada' );
										echo Avada()->template->title_template( $subtitle );
									?>
								</div>
								<div class="row text-center">
									<div class="fusion-column">
										<!-- <h3><?php esc_html_e( 'Search Our Website', 'Avada' ); ?></h3> -->
										<p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps calling our hotline below, can help.', 'Avada' ); ?></p>
										<!-- <div class="search-page-search-form">
										<?php echo get_search_form( false ); ?>
										</div> -->
										<span class="copy-toll">Call <a href="tel:(800) 403 - 8050">(800) 403 - 8050</a></span>
										<span class="copy-sched copy-block">6AM-8PM (PST), 7 days a week</span>
									</div>
								</div>
								<!-- <div class="row">
									<div class="fusion-column useful-links">
											<h3 class="text-center"><?php esc_html_e( 'Helpful Links', 'Avada' ); ?></h3>
											<?php $circle_class = ( Avada()->settings->get( 'checklist_circle' ) ) ? 'circle-yes' : 'circle-no'; ?>
											<?php wp_nav_menu( array(
												'theme_location' => '404_pages',
												'depth'          => 1,
												'container'      => false,
												'menu_id'        => 'checklist-1',
												'menu_class'     => 'error-menu list-icon list-icon-arrow ' . $circle_class,
												'echo'           => 1,
											) ); ?>
										</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
