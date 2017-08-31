<?php 

 
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-title text-center">
    <h1><?php the_title(); ?></h1>
</div>
<div class="container">
	<div class="section-content content-lanyard text-center">
		<?php the_content(); ?>
	</div>
	<div class="section-content section-lanyard">
		<div class="row" id="polyester">
			<div class="col-md-6">
				<p class="copy-proxima-sbold">Polyester Lanyards</p>
				<div id="polyester-slider" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/lanyard-img-1.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/Polyester_lanyards_3.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#polyester-slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#polyester-slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
							<li data-target="#polyester-slider" data-slide-to="0" class="active"></li>
							<li data-target="#polyester-slider" data-slide-to="1"></li>
						</ol>

                    </div>
                    <div class="copy-btn-lanyard text-center copy-marg-top">
                    	<button class="text-center btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top-2" data-toggle="modal" data-target="#RequestQModal" onClick="$('#RequestQModal').modal()">Request a Quote <i class="fa fa-caret-right" aria-hidden="true"></i></button>

                    	<span class="copy-block copy-marg-top copy-black">Call us at
	                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                    	</span>
                    </div>
                    <div class="copy-lanyard-content">
                    	<p class="copy-gap-top copy-font-reg">
                    		The polyester lanyards is our most popular type of lanyards. We use high quality polyester, and we will imprint your message and logo on the lanyards using high quality silk screen printing. It offers a perfect balance of a good looking basic lanyard at a very reasonable price. It is very durable and comfortable to wear. We can imprint several colors on the same lanyard. This is the perfect choice for a basic text design or any basic logo with simple colors.
                    	</p>

                    	<ul class="copy-list-no-style list-product-desc copy-font-reg copy-marg-top">
                        	<li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
                    	</ul>
                    </div>
			</div>
			<div class="col-md-6">
				<div>

			        <div class="product product-table">
			            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
			            <!-- Nav tabs -->
				       	<ul class="nav nav-tabs" role="tablist">
				          
							<li role="presentation" class="">
								<a href="#val0" aria-controls="val5/8" role="tab" data-toggle="tab">5/8 inch</a></li>
							<li role="presentation" class="active">
								<a href="#val1" aria-controls="val3/4" role="tab" data-toggle="tab">3/4 inch</a></li>
							<li role="presentation" class="">
								<a href="#val2" aria-controls="val1" role="tab" data-toggle="tab">1 inch</a></li>
				        </ul>
				        <!-- Tab panes -->
			            <div class="tab-content">
			          		<div role="tabpanel" class="tab-pane " id="val0">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                            <tbody>
				                            <tr>
				                                <td>1</td>
				                                <td>2.20</td> 
				                            </tr>
				                           	<tr>
				                                <td>5</td>
				                                <td>2.88</td> 
				                           	</tr>
			                           		<tr>
				                               <td>10</td>
				                               <td>2.00</td> 
				                           </tr>
			                           		<tr>
				                               <td>20</td>
				                               <td>1.57</td> 
				                           </tr>
				                           		<tr>
				                               <td>50</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>75</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>100</td>
				                               <td>0.47</td> 
				                           </tr>
				                           		<tr>
				                               <td>200</td>
				                               <td>0.27</td> 
				                           </tr>
				                           		<tr>
				                               <td>300</td>
				                               <td>0.24</td> 
				                           </tr>
				                           		<tr>
				                               <td>500</td>
				                               <td>0.21</td> 
				                           </tr>
				                           		<tr>
				                               <td>1,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>2,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>3,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>5,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>10,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>20,000</td>
				                               <td>0.11</td> 
				                           </tr>
				                            <tr>
				                               <td>50,000</td>
				                               <td>0.08</td> 
				                           </tr>
				                            <tr>
				                               <td>100,000</td>
				                               <td>0.06</td> 
				                           </tr>
			                       		</tbody>
			                       	</table>
			                   </div>
			                </div>
			                 <div role="tabpanel" class="tab-pane active" id="val1">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                        <tbody>
			                        	<tr>
			                                <td>1</td>
			                                <td>2.20</td> 
			                            </tr>
			                            <tr>
			                                <td>5</td>
			                                <td>1.88</td> 
			                            </tr>
			                            <tr>
			                                <td>10</td>
			                                <td>1.50</td> 
			                            </tr>
			                            <tr>
			                                <td>20</td>
			                                <td>1.32</td> 
			                            </tr>
			                            <tr>
			                                <td>50</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>75</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>100</td>
			                                <td>0.40</td> 
			                            </tr>
			                            <tr>
			                                <td>200</td>
			                                <td>0.31</td> 
			                            </tr>
			                            <tr>
			                                <td>300</td>
			                                <td>0.28</td> 
			                            </tr>
			                            <tr>
			                                <td>500</td>
			                                <td>0.19</td> 
			                            </tr>
			                            <tr>
			                                <td>1,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>2,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>3,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>5,000</td>
			                                <td>0.12</td> 
			                            </tr>
			                            <tr>
			                                <td>10,000</td>
			                                <td>0.10</td> 
			                            </tr>
			                            <tr>
			                                <td>20,000</td>
			                                <td>0.09</td> 
			                            </tr>
			                            <tr>
			                                <td>50,000</td>
			                                <td>0.07</td> 
			                            </tr>
			                            <tr>
			                                <td>100,000</td>
			                                <td>0.06</td> 
			                            </tr>
			                        </tbody>
			                       </table>
			                       </div>
			                        </div>
			                        <div role="tabpanel" class="tab-pane " id="val2">
			                            <div class="table-responsive">
			                                <table class="table text-center">
			                                    <thead>
			                                        <tr>
			                                            <td>Qty</td>
			                                            <td>Price</td>
			                                        </tr>
			                                    </thead>
			                                <tbody>
			                                	<tr>
			                                        <td>1</td>
			                                        <td>29.68</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>5</td>
			                                        <td>9.89</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>10</td>
			                                        <td>3.96</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>20</td>
			                                        <td>3.81</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>50</td>
			                                        <td>3.71</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>75</td>
			                                        <td>2.82</td> 
			                                    </tr>
			                                </tbody>
			                            </table>
			                            </div>
			                        </div>
			                        <div role="tabpanel" class="tab-pane " id="val3">
			                            <div class="table-responsive">
			                                <table class="table text-center">
			                                    <thead>
			                                        <tr>
			                                            <td>Qty</td>
			                                            <td>Price</td>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                	<tr>
			                                        <td>1</td>
			                                        <td>29.68</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>5</td>
			                                        <td>9.89</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>10</td>
			                                        <td>3.96</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>20</td>
			                                        <td>3.81</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>50</td>
			                                        <td>3.71</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>75</td>
			                                        <td>2.82</td> 
			                                    </tr>
			                                </tbody>
			                                </table>
			                            </div>
			                        </div>
			                       </div>
			                    </div>
			                </div>
			            </div>
			<div class="col-md-12">
				<div class="row row-addon">
					<div class="col-md-12 p-0">
						<p>Attachment:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img1.png'); ?>');"></div>
										<span>Ring</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img2.png'); ?>');"></div>
										<span>Lobster Claw Swivel Hook</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img3.png'); ?>');"></div>
										<span>Bulldog Clip</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img4.png'); ?>');"></div>
										<span>Oval Shape Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img5.png'); ?>');"></div>
										<span>Metal Swivel Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img6.png'); ?>');"></div>
										<span>Carabiner Hook</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 col-break">
						<p>Optional:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img7.png'); ?>');"></div>
										<span>Flat  Plastic Breakaway</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img8.png'); ?>');"></div>
										<span>Plastic Buckle</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img9.png'); ?>');"></div>
										<span>Cell Phone Loop</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img14.png'); ?>');"></div>
										<span>Badge Reel</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 copy-marg-top col-badge">
						<p>Badge Holder:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img10.png'); ?>');"></div>
										<span>3.875W x 3.25H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img11.png'); ?>');"></div>
										<span>4.5W x 3.75H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img12.png'); ?>');"></div>
										<span>2.5W x 4.5H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img13.png'); ?>');"></div>
										<span>3W x 5H</span>
									</div>
								</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="hr-line copy-line-gap">
		<div class="row" id="tube">
			<div class="col-md-6">
				<!-- <p class="copy-proxima-sbold">Imprinted Tube Lanyards</p> -->
				<p class="copy-proxima-sbold">Tubular Lanyards</p>
				<div id="tube-slider" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/lanyard-img-2.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/Tubular_1.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/Tube_Lanyards_2.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#tube-slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#tube-slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
							<li data-target="#tube-slider" data-slide-to="0" class="active"></li>
							<li data-target="#tube-slider" data-slide-to="1"></li>
							<li data-target="#tube-slider" data-slide-to="2"></li>
						</ol>

                    </div>
                    <div class="copy-btn-lanyard text-center copy-marg-top">
                    	<button class="text-center btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top-2" data-toggle="modal" data-target="#RequestQModal" onClick="$('#RequestQModal').modal()">Request a Quote <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                    	<span class="copy-block copy-marg-top copy-black">Call us at
	                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                    	</span>
                    </div>
                    <div class="copy-lanyard-content">
                    	<p class="copy-gap-top copy-font-reg">
                    		The tube lanyards is the ideal choice for those that are on a tight budget. It is our most economical type of lanyard without sacrificing the quality and durability. It is made using loosely stitched polyester and formed into a tube to increase its strength and durability. It looks and feels similar to a tubular shoelace and can slightly stretch on its own. Choose your own message and logo to imprint on the tube lanyards, as we use silk screen printing technology same with the polyester lanyards.
                    	</p>

                    	<ul class="copy-list-no-style list-product-desc copy-font-reg copy-marg-top">
                        	<li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
                    	</ul>
                    </div>
			</div>
			<div class="col-md-6">
				<div>

			        <div class="product product-table">
			            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
			            <!-- Nav tabs -->
				       	<ul class="nav nav-tabs" role="tablist">
				          
							<li role="presentation" class="">
								<a href="#val4" aria-controls="val1/2" role="tab" data-toggle="tab">1/2 inch</a></li>
							<li role="presentation" class="active">
								<a href="#val5" aria-controls="val5/8" role="tab" data-toggle="tab">5/8 inch</a></li>
				        </ul>
				        <!-- Tab panes -->
			            <div class="tab-content">
			          		<div role="tabpanel" class="tab-pane " id="val4">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                            <tbody>
				                            <tr>
				                                <td>1</td>
				                                <td>2.20</td> 
				                            </tr>
				                           	<tr>
				                                <td>5</td>
				                                <td>2.88</td> 
				                           	</tr>
			                           		<tr>
				                               <td>10</td>
				                               <td>2.00</td> 
				                           </tr>
			                           		<tr>
				                               <td>20</td>
				                               <td>1.57</td> 
				                           </tr>
				                           		<tr>
				                               <td>50</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>75</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>100</td>
				                               <td>0.47</td> 
				                           </tr>
				                           		<tr>
				                               <td>200</td>
				                               <td>0.27</td> 
				                           </tr>
				                           		<tr>
				                               <td>300</td>
				                               <td>0.24</td> 
				                           </tr>
				                           		<tr>
				                               <td>500</td>
				                               <td>0.21</td> 
				                           </tr>
				                           		<tr>
				                               <td>1,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>2,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>3,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>5,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>10,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>20,000</td>
				                               <td>0.11</td> 
				                           </tr>
				                            <tr>
				                               <td>50,000</td>
				                               <td>0.08</td> 
				                           </tr>
				                            <tr>
				                               <td>100,000</td>
				                               <td>0.06</td> 
				                           </tr>
			                       		</tbody>
			                       	</table>
			                   </div>
			                </div>
			                 <div role="tabpanel" class="tab-pane active" id="val5">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                        <tbody>
			                        	<tr>
			                                <td>1</td>
			                                <td>2.20</td> 
			                            </tr>
			                            <tr>
			                                <td>5</td>
			                                <td>1.88</td> 
			                            </tr>
			                            <tr>
			                                <td>10</td>
			                                <td>1.50</td> 
			                            </tr>
			                            <tr>
			                                <td>20</td>
			                                <td>1.32</td> 
			                            </tr>
			                            <tr>
			                                <td>50</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>75</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>100</td>
			                                <td>0.40</td> 
			                            </tr>
			                            <tr>
			                                <td>200</td>
			                                <td>0.31</td> 
			                            </tr>
			                            <tr>
			                                <td>300</td>
			                                <td>0.28</td> 
			                            </tr>
			                            <tr>
			                                <td>500</td>
			                                <td>0.19</td> 
			                            </tr>
			                            <tr>
			                                <td>1,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>2,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>3,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>5,000</td>
			                                <td>0.12</td> 
			                            </tr>
			                            <tr>
			                                <td>10,000</td>
			                                <td>0.10</td> 
			                            </tr>
			                            <tr>
			                                <td>20,000</td>
			                                <td>0.09</td> 
			                            </tr>
			                            <tr>
			                                <td>50,000</td>
			                                <td>0.07</td> 
			                            </tr>
			                            <tr>
			                                <td>100,000</td>
			                                <td>0.06</td> 
			                            </tr>
			                        </tbody>
			                       </table>
			                      </div>
			                    </div>
			                   </div>
			                </div>
			           	</div>
			        </div>
			        <div class="col-md-12">
				<div class="row row-addon">
					<div class="col-md-12 p-0">
						<p>Attachment:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img1.png'); ?>');"></div>
										<span>Ring</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img2.png'); ?>');"></div>
										<span>Lobster Claw Swivel Hook</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img3.png'); ?>');"></div>
										<span>Bulldog Clip</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img4.png'); ?>');"></div>
										<span>Oval Shape Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img5.png'); ?>');"></div>
										<span>Metal Swivel Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img6.png'); ?>');"></div>
										<span>Carabiner Hook</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 col-break">
						<p>Optional:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img7.png'); ?>');"></div>
										<span>Flat  Plastic Breakaway</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img8.png'); ?>');"></div>
										<span>Plastic Buckle</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img9.png'); ?>');"></div>
										<span>Cell Phone Loop</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img14.png'); ?>');"></div>
										<span>Badge Reel</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 copy-marg-top col-badge">
						<p>Badge Holder:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img10.png'); ?>');"></div>
										<span>3.875W x 3.25H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img11.png'); ?>');"></div>
										<span>4.5W x 3.75H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img12.png'); ?>');"></div>
										<span>2.5W x 4.5H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img13.png'); ?>');"></div>
										<span>3W x 5H</span>
									</div>
								</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="hr-line copy-line-gap">
		<div class="row" id="nylon">
			<div class="col-md-6">
				<p class="copy-proxima-sbold">Nylon Lanyards</p>
				<div id="nylon-slider" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/Nylon_Lanyard_2.jpg'); ?>');">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <!-- <a class="left carousel-control" href="#nylon-slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#nylon-slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->
                        <!-- Indicators -->
                        <!-- <ol class="carousel-indicators">
							<li data-target="#nylon-slider" data-slide-to="0" class="active"></li>
						</ol> -->

                    </div>
                    <div class="copy-btn-lanyard text-center copy-marg-top">
                    	<button class="text-center btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top-2" data-toggle="modal" data-target="#RequestQModal" onClick="$('#RequestQModal').modal()">Request a Quote <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                    	<span class="copy-block copy-marg-top copy-black">Call us at
	                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                    	</span>
                    </div>
                    <div class="copy-lanyard-content">
                    	<p class="copy-gap-top copy-font-reg">
                    		The nylon lanyards are similar to the polyester lanyards, but with a step higher in terms of quality due to the material. The lanyards are made using high quality nylon material, which increases the sleekness and shine of the lanyard. In the long run, the nylon lanyards will maintain its quality of material, reducing its wear and tear. Due to its finer nylon material, we use a higher quality of silk screen printing, so we can imprint even the most complex logos out there. This is the best choice if you have a complex logo, but don’t want to design your own Dye Sublimation lanyards.
                    	</p>

                    	<ul class="copy-list-no-style list-product-desc copy-font-reg copy-marg-top">
                        	<li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
                    	</ul>
                    </div>
			</div>
			<div class="col-md-6">
				<div>

			        <div class="product product-table">
			            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
			            <!-- Nav tabs -->
				       	<ul class="nav nav-tabs" role="tablist">
				          
							<li role="presentation" class="">
								<a href="#val6" aria-controls="val5/8" role="tab" data-toggle="tab">5/8 inch</a></li>
							<li role="presentation" class="active">
								<a href="#val7" aria-controls="val3/4" role="tab" data-toggle="tab">3/4 inch</a></li>
							<li role="presentation" class="">
								<a href="#val8" aria-controls="val1" role="tab" data-toggle="tab">1 inch</a></li>
				        </ul>
				        <!-- Tab panes -->
			            <div class="tab-content">
			          		<div role="tabpanel" class="tab-pane " id="val6">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                            <tbody>
				                            <tr>
				                                <td>1</td>
				                                <td>2.20</td> 
				                            </tr>
				                           	<tr>
				                                <td>5</td>
				                                <td>2.88</td> 
				                           	</tr>
			                           		<tr>
				                               <td>10</td>
				                               <td>2.00</td> 
				                           </tr>
			                           		<tr>
				                               <td>20</td>
				                               <td>1.57</td> 
				                           </tr>
				                           		<tr>
				                               <td>50</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>75</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>100</td>
				                               <td>0.47</td> 
				                           </tr>
				                           		<tr>
				                               <td>200</td>
				                               <td>0.27</td> 
				                           </tr>
				                           		<tr>
				                               <td>300</td>
				                               <td>0.24</td> 
				                           </tr>
				                           		<tr>
				                               <td>500</td>
				                               <td>0.21</td> 
				                           </tr>
				                           		<tr>
				                               <td>1,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>2,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>3,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>5,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>10,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>20,000</td>
				                               <td>0.11</td> 
				                           </tr>
				                            <tr>
				                               <td>50,000</td>
				                               <td>0.08</td> 
				                           </tr>
				                            <tr>
				                               <td>100,000</td>
				                               <td>0.06</td> 
				                           </tr>
			                       		</tbody>
			                       	</table>
			                   </div>
			                </div>
			                 <div role="tabpanel" class="tab-pane active" id="val7">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                        <tbody>
			                        	<tr>
			                                <td>1</td>
			                                <td>2.20</td> 
			                            </tr>
			                            <tr>
			                                <td>5</td>
			                                <td>1.88</td> 
			                            </tr>
			                            <tr>
			                                <td>10</td>
			                                <td>1.50</td> 
			                            </tr>
			                            <tr>
			                                <td>20</td>
			                                <td>1.32</td> 
			                            </tr>
			                            <tr>
			                                <td>50</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>75</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>100</td>
			                                <td>0.40</td> 
			                            </tr>
			                            <tr>
			                                <td>200</td>
			                                <td>0.31</td> 
			                            </tr>
			                            <tr>
			                                <td>300</td>
			                                <td>0.28</td> 
			                            </tr>
			                            <tr>
			                                <td>500</td>
			                                <td>0.19</td> 
			                            </tr>
			                            <tr>
			                                <td>1,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>2,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>3,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>5,000</td>
			                                <td>0.12</td> 
			                            </tr>
			                            <tr>
			                                <td>10,000</td>
			                                <td>0.10</td> 
			                            </tr>
			                            <tr>
			                                <td>20,000</td>
			                                <td>0.09</td> 
			                            </tr>
			                            <tr>
			                                <td>50,000</td>
			                                <td>0.07</td> 
			                            </tr>
			                            <tr>
			                                <td>100,000</td>
			                                <td>0.06</td> 
			                            </tr>
			                        </tbody>
			                       </table>
			                       </div>
			                        </div>
			                        <div role="tabpanel" class="tab-pane " id="val8">
			                            <div class="table-responsive">
			                                <table class="table text-center">
			                                    <thead>
			                                        <tr>
			                                            <td>Qty</td>
			                                            <td>Price</td>
			                                        </tr>
			                                    </thead>
			                                <tbody>
			                                	<tr>
			                                        <td>1</td>
			                                        <td>29.68</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>5</td>
			                                        <td>9.89</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>10</td>
			                                        <td>3.96</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>20</td>
			                                        <td>3.81</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>50</td>
			                                        <td>3.71</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>75</td>
			                                        <td>2.82</td> 
			                                    </tr>
			                                </tbody>
			                            </table>
			                            </div>
			                        </div>
			                       </div>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12">
				<div class="row row-addon">
					<div class="col-md-12 p-0">
						<p>Attachment:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img1.png'); ?>');"></div>
										<span>Ring</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img2.png'); ?>');"></div>
										<span>Lobster Claw Swivel Hook</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img3.png'); ?>');"></div>
										<span>Bulldog Clip</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img4.png'); ?>');"></div>
										<span>Oval Shape Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img5.png'); ?>');"></div>
										<span>Metal Swivel Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img6.png'); ?>');"></div>
										<span>Carabiner Hook</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 col-break">
						<p>Optional:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img7.png'); ?>');"></div>
										<span>Flat  Plastic Breakaway</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img8.png'); ?>');"></div>
										<span>Plastic Buckle</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img9.png'); ?>');"></div>
										<span>Cell Phone Loop</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img14.png'); ?>');"></div>
										<span>Badge Reel</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 copy-marg-top col-badge">
						<p>Badge Holder:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img10.png'); ?>');"></div>
										<span>3.875W x 3.25H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img11.png'); ?>');"></div>
										<span>4.5W x 3.75H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img12.png'); ?>');"></div>
										<span>2.5W x 4.5H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img13.png'); ?>');"></div>
										<span>3W x 5H</span>
									</div>
								</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="hr-line copy-line-gap">
		<div class="row" id="woven">
			<div class="col-md-6">
				<!-- <p class="copy-proxima-sbold">Woven Polyester Lanyards</p> -->
				<p class="copy-proxima-sbold">Woven Lanyards</p>
				<div id="woven-slider" class="carousel slide single-product" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/lanyard-img-4.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/wc_lanyards_woven.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-wrap">
                                    <div class="item-product" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/woven-3.png'); ?>');">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#woven-slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#woven-slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
							<li data-target="#woven-slider" data-slide-to="0" class="active"></li>
							<li data-target="#woven-slider" data-slide-to="1"></li>
							<li data-target="#woven-slider" data-slide-to="2"></li>
						</ol>

                    </div>
                    <div class="copy-btn-lanyard text-center copy-marg-top">
                    	<button class="text-center btn-pad btn-orange copy-font-reg-2 copy-upper copy-proxima-bold copy-inline-block copy-radius copy-gap-top-2" data-toggle="modal" data-target="#RequestQModal" onClick="$('#RequestQModal').modal()">Request a Quote <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                    	<span class="copy-block copy-marg-top copy-black">Call us at
	                    	<a href="tel:(800) 403-8050">(800) 403-8050</a> for more information
                    	</span>
                    </div>
                    <div class="copy-lanyard-content">
                    	<p class="copy-gap-top copy-font-reg">
                    		The woven lanyards are for those that want the best quality out there and doesn’t mind paying a little more for quality. Your logo or text will be weaved into the lanyard using thread, making it slightly stick out, giving a textured feel when you touch the text or logo. This process is similar to embroidering on a t-shirt. This type of lanyard is usually recommend for simple logos or texts, as with more complex logos it may come out a little distorted or pixelated.
                    	</p>

                    	<ul class="copy-list-no-style list-product-desc copy-font-reg copy-marg-top">
                        	<li><i class="icon icon-tag"></i>Pricematch Guarantee</li>
                    	</ul>
                    </div>
			</div>
			<div class="col-md-6">
				<div>

			        <div class="product product-table">
			            <p class="copy-font-reg copy-upper copy-proxima-s-bold text-center copy-spacing">Pricing Table</p>
			            <!-- Nav tabs -->
				       	<ul class="nav nav-tabs" role="tablist">
				          
							<li role="presentation" class="">
								<a href="#val9" aria-controls="val1/4" role="tab" data-toggle="tab">5/8 inch</a></li>
							<li role="presentation" class="active">
								<a href="#val10" aria-controls="val1/2" role="tab" data-toggle="tab">3/4 inch</a></li>
							<li role="presentation" class="">
								<a href="#val11" aria-controls="val3/4" role="tab" data-toggle="tab">1 inch</a></li>
				        </ul>
				        <!-- Tab panes -->
			            <div class="tab-content">
			          		<div role="tabpanel" class="tab-pane " id="val9">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                            <tbody>
				                            <tr>
				                                <td>1</td>
				                                <td>2.20</td> 
				                            </tr>
				                           	<tr>
				                                <td>5</td>
				                                <td>2.88</td> 
				                           	</tr>
			                           		<tr>
				                               <td>10</td>
				                               <td>2.00</td> 
				                           </tr>
			                           		<tr>
				                               <td>20</td>
				                               <td>1.57</td> 
				                           </tr>
				                           		<tr>
				                               <td>50</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>75</td>
				                               <td>0.84</td> 
				                           </tr>
				                           		<tr>
				                               <td>100</td>
				                               <td>0.47</td> 
				                           </tr>
				                           		<tr>
				                               <td>200</td>
				                               <td>0.27</td> 
				                           </tr>
				                           		<tr>
				                               <td>300</td>
				                               <td>0.24</td> 
				                           </tr>
				                           		<tr>
				                               <td>500</td>
				                               <td>0.21</td> 
				                           </tr>
				                           		<tr>
				                               <td>1,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>2,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>3,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>5,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>10,000</td>
				                               <td>0.12</td> 
				                           </tr>
				                           		<tr>
				                               <td>20,000</td>
				                               <td>0.11</td> 
				                           </tr>
				                            <tr>
				                               <td>50,000</td>
				                               <td>0.08</td> 
				                           </tr>
				                            <tr>
				                               <td>100,000</td>
				                               <td>0.06</td> 
				                           </tr>
			                       		</tbody>
			                       	</table>
			                   </div>
			                </div>
			                 <div role="tabpanel" class="tab-pane active" id="val10">
			                    <div class="table-responsive">
			                        <table class="table text-center">
			                            <thead>
			                                <tr>
			                                    <td>Qty</td>
			                                    <td>Price</td>
			                                </tr>
			                            </thead>
			                        <tbody>
			                        	<tr>
			                                <td>1</td>
			                                <td>2.20</td> 
			                            </tr>
			                            <tr>
			                                <td>5</td>
			                                <td>1.88</td> 
			                            </tr>
			                            <tr>
			                                <td>10</td>
			                                <td>1.50</td> 
			                            </tr>
			                            <tr>
			                                <td>20</td>
			                                <td>1.32</td> 
			                            </tr>
			                            <tr>
			                                <td>50</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>75</td>
			                                <td>0.84</td> 
			                            </tr>
			                            <tr>
			                                <td>100</td>
			                                <td>0.40</td> 
			                            </tr>
			                            <tr>
			                                <td>200</td>
			                                <td>0.31</td> 
			                            </tr>
			                            <tr>
			                                <td>300</td>
			                                <td>0.28</td> 
			                            </tr>
			                            <tr>
			                                <td>500</td>
			                                <td>0.19</td> 
			                            </tr>
			                            <tr>
			                                <td>1,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>2,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>3,000</td>
			                                <td>0.14</td> 
			                            </tr>
			                            <tr>
			                                <td>5,000</td>
			                                <td>0.12</td> 
			                            </tr>
			                            <tr>
			                                <td>10,000</td>
			                                <td>0.10</td> 
			                            </tr>
			                            <tr>
			                                <td>20,000</td>
			                                <td>0.09</td> 
			                            </tr>
			                            <tr>
			                                <td>50,000</td>
			                                <td>0.07</td> 
			                            </tr>
			                            <tr>
			                                <td>100,000</td>
			                                <td>0.06</td> 
			                            </tr>
			                        </tbody>
			                       </table>
			                       </div>
			                        </div>
			                        <div role="tabpanel" class="tab-pane " id="val11">
			                            <div class="table-responsive">
			                                <table class="table text-center">
			                                    <thead>
			                                        <tr>
			                                            <td>Qty</td>
			                                            <td>Price</td>
			                                        </tr>
			                                    </thead>
			                                <tbody>
			                                	<tr>
			                                        <td>1FF</td>
			                                        <td>29.68</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>5</td>
			                                        <td>9.89</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>10</td>
			                                        <td>3.96</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>20</td>
			                                        <td>3.81</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>50</td>
			                                        <td>3.71</td> 
			                                    </tr>
			                                    <tr>
			                                        <td>75</td>
			                                        <td>2.82</td> 
			                                    </tr>
			                                </tbody>
			                            </table>
			                            </div>
			                        </div>
			                       </div>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12">
				<div class="row row-addon">
					<div class="col-md-12 p-0">
						<p>Attachment:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img1.png'); ?>');"></div>
										<span>Ring</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img2.png'); ?>');"></div>
										<span>Lobster Claw Swivel Hook</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img3.png'); ?>');"></div>
										<span>Bulldog Clip</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img4.png'); ?>');"></div>
										<span>Oval Shape Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img5.png'); ?>');"></div>
										<span>Metal Swivel Look</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img6.png'); ?>');"></div>
										<span>Carabiner Hook</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 col-break">
						<p>Optional:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img7.png'); ?>');"></div>
										<span>Flat  Plastic Breakaway</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img8.png'); ?>');"></div>
										<span>Plastic Buckle</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img9.png'); ?>');"></div>
										<span>Cell Phone Loop</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img14.png'); ?>');"></div>
										<span>Badge Reel</span>
									</div>
								</li>
							</ul>
					</div>
					<div class="col-md-12 p-0 copy-marg-top col-badge">
						<p>Badge Holder:</p>
							<ul>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img10.png'); ?>');"></div>
										<span>3.875W x 3.25H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img11.png'); ?>');"></div>
										<span>4.5W x 3.75H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img12.png'); ?>');"></div>
										<span>2.5W x 4.5H</span>
									</div>
								</li>
								<li>
									<div class="addon-item">
										<div class="addon-img" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/add-on-img13.png'); ?>');"></div>
										<span>3W x 5H</span>
									</div>
								</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="hr-line copy-line-gap">
	</div>
</div>

<?php 
    endwhile;
    endif; 
    get_footer();
?>