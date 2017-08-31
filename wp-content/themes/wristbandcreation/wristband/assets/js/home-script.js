jQuery(document).ready(function ($) {
    if (736 === $(window).width()) {
        $("#home-fusion-content-boxes .fusion-column").click(function () {
            window.location.href = window.location+"/order-now/";
        });
    }

    if(document.getElementById("amazon_customer_details")!=null){
	  $('.col-md-7.col-1-custom.changestyle').hide();
		$('.col-md-5.col-2-custom').addClass('col-amazon-center');
	}

 	$('#avada_coupon_code').attr('id','coupon_code');
 	var Builder = {
 				data: {
	                    total_price: 0, // Total Price of wristband selected
	                    total_qty: 0, // Total Quantity of wristband selected
	                    has_color_split: false, // Check if selection has color split
	                    has_extra_size: false, // Check if selection has extra sizes
	                    size_number: 0, // Number of sizes that are inputted
	                    colors: [], // Color selected
	                    free_colors: [], // Color selected
	                    clipart: {
	                        front_start: '', // Front Start Clipart
	                        front_end: '', // Front End Clipart
	                        back_start: '', // Back Start Clipart
	                        back_end: '', // Back End Clipart
	                        wrap_start: '', // Wrap Start Clipart
	                        wrap_end: '', // Wrap End Clipart

	                        view_position: 'front', 
	                        wristband_stat: 'front_and_back',
	                    },
	                    clipartname: {
	                        front_start_name: '', // Front Start Clipart
	                        front_end_name: '', // Front End Clipart
	                        back_start_name: '', // Back Start Clipart
	                        back_end_name: '', // Back End Clipart
	                        wrap_start_name: '', // Wrap Start Clipart
	                        wrap_end_name: '', // Wrap End Clipart
	                    },
	                    init_price:'',
	                    colortype: '',
	                    shipping_price: '',
	                    product: '',
                        size: '',
                        // font: $('select#font').val(),
                        font: '',
                        message_type: '',
                        messages: {},
                        additional_options: [],
                        customization_location: '',
                        customization_date_production: '',
                        customization_date_shipping: '',
                        guaranteed_delivery: '',
                        total_days: ''
                }

 	} ;

 			$('.bc_add_to_cart').click(function (e) {
                    
                    // if (CheckItems() == 'error'){
                    //     return; 
                    // }   
                    // e.preventDefault();
                    // if (!Builder.validateForm()) {
                    //     return;
                    // }
                    var init_price = $(this).data("price"),
                    	ship_price = $(this).data("shipping_price");
                  	Builder.data['init_price'] = init_price;
                    Builder.data['total_price'] = init_price + ship_price;
                    Builder.data['total_qty'] = $(this).data("qty");
                    Builder.data['colortype'] = $(this).data("colortype");
                    Builder.data['product'] = $(this).data("prodid");
                    Builder.data['shipping_price'] = ship_price;
                    //var hello = $(this).data('price');
                    // console.log(hello);
	                    // console.log(Builder.data);
	                    // return;
                    notrigger = 1;

                    // var $self = $(this),
                    //     $icon = $self.find('.fa'),
                    //     $button_text = $self.find('.fusion-button-text-left');
                        
                    // $icon.removeClass('fa-shopping-cart');
                    // $icon.addClass('fa-spinner');
                    // $self.removeClass('btn-add-to-cart');
                    // $self.addClass('btn-adding-to-cart');
                    // $button_text.text('Add to Cart');
                    // Builder.collectDataToPost();
                    // $(this).text('Adding to Cart');
                    $(this).text('');
                    $(this).addClass('btn-adding-to-cart-samples');
                    $.ajax({
                        url: WBC.ajax_url,
                        type: 'POST',
                        data: {meta: Builder.data, action: 'wbc_add_to_cart'},
                        dataType: 'JSON',
                    }).done(function (response) {
                        var type = 'success',
                                title = 'Success';

                        // $icon.removeClass('fa-spinner');
                        // $icon.addClass('fa-shopping-cart');
                        // $button_text.text('Adding to Cart...');

                        if (!response.success) {
                            type = 'error';
                            title = 'Error';
                        }
                        Builder.has_upload = false;
                        console.log(response)
                        //Builder.popupMsg(type, title, response.data.message + ' <a href="' + Settings.site_url + '/cart">view cart <i class="fa fa-long-arrow-right"></i></a>');
                        if (response.success)
                            {
                                window.location = "/cart";
                            }
                    });
                    //ConnectItems();
                    return false;
        })

   //FIXED TOLL NUMBER
	  $(window).scroll(function() {    
	        var scroll = $(window).scrollTop();
	          if (scroll >= 5) {
	              $(".copy-toll-mobile").addClass("toll-fixed");
	              $("#wnb-bar").css('position', 'relative');
	          }

	          else {
	            $(".copy-toll-mobile").removeClass("toll-fixed");
	            $("#wnb-bar").css('position', 'fixed');
	          }
	  });

	//MOBILE DROPDOWN
	$( ".navbar-toggle" ).click(function() {
	  $( "#wnb-bar" ).css('display', 'none');
	});
	$( ".toggle-menu" ).click(function() {
	  $( "#wnb-bar" ).css('display', 'block');
	});
	// END MOBILE DROPDOWN

	//SMALL DESKTOP

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 1199) {

			$("select#style").bind("change", function() {

				var style = $('#style option:selected').text();

				if (style == "Figured") {
			    	$("div#add-clipart .button-box.hide-if-message_type-continues").css('margin-left', '-7px');
			    	$(".button-backend").css('left', '-42%');
			    }

			    else {
			   		$("div#add-clipart .button-box.hide-if-message_type-continues").css('margin-left', '0');
			    }

			});
	    }
	});

	//IPAD
	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 1024) {

			$("select#style").bind("change", function() {

				var style = $('#style option:selected').text();

				if (style == "Figured") {
			    	$("div#add-clipart .button-box.hide-if-message_type-continues").css('margin-left', '0');
			    	$(".button-backend").css('left', '-45%');
			    }

			    else {
			   		$("div#add-clipart .button-box.hide-if-message_type-continues").css('margin-left', '0');
			    }

			});
	    }
	});

	//END SMALL DESKTOP

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 991) {
	        $("select#width").bind("change", function() {
				if ($("select#width").val() == "1/4") {
			        $(".col-preview h3").css('display', 'none');
			        $(".copy-preview-clipart").addClass('active');
			        $(".copy-preview-clipart").addClass('activeonefourth');
			        $(".copy-preview-clipart").removeClass('activeone');
			    }

			    else if ($("select#width").val() == "1") {
			    	$(".col-preview h3").css('display', 'none');
			        $(".copy-preview-clipart").addClass('active');
			    }

			    else {
			    	$(".copy-preview-clipart").removeClass('activeone');
			        $(".copy-preview-clipart").removeClass('activeonefourth');
			    }

			});

			$("select#style").bind("change", function() {

				var style = $('#style option:selected').text();

				if (style == "Debossed") {
			        $(".copy-preview-clipart").removeClass('active');
			    }

			    else if (style == "Imprinted") {
			    	 $(".copy-preview-clipart").removeClass('active');
			    }

			    else if (style == "Debossed-Fill") {
			    	 $(".copy-preview-clipart").removeClass('active');
			    }

			    else if (style == "Embossed") {
			    	 $(".copy-preview-clipart").removeClass('active');
			    }

			    else if (style == "Embossed-Printed") {
			    	 $(".copy-preview-clipart").removeClass('active');
			    }

			    else if (style == "Figured") {
			    	 $(".copy-preview-clipart").removeClass('active');
			    }

			    else if (style == "Blank") {
			    	 $(".copy-preview-clipart").removeClass('active');
			    }

			});

			$("select#style").bind("change", function() {

				var style = $('#style option:selected').text();

				if (style == "Figured") {
			    	$(".button-backend").css('left', '0');
			    	$(".button-backend").css('padding-top', '10px');
			    }

			    else {
			   		$(".button-backend").css('left', '0');
			   		$(".button-backend").css('padding-top', '10px');
			    }

			});

			// $("select#style").bind("change", function() {
			// 	var style = $('#style option:selected').text();
			// 	if (style == "Figured") {
			//         $("div#front-back-text-container").css('margin-top', '9em');
			//     } else {
			//     	$("div#front-back-text-container").css('margin-top', '3em');
			//     }

			// });

			//ON SELECT
			// $("#style").on("change", function() {

			// 	if( $("#style :selected").text() == 'Figured' && $("#width :selected").val() == 1 ) {
			// 		$(".preview-desktop").css('bottom','0');
			// 	} else {
			// 		$(".preview-desktop").css('bottom','1em');
			// 	}

			// });

			// $("#width").on("change", function() {

			// 	if( $(this).val() == 1 && $("#style :selected").text() == 'Figured') {
			// 		$(".preview-desktop").css('bottom','0');
			// 	} else {
			// 		$(".preview-desktop").css('bottom','1em');
			// 	}

			// });

			$('input[type="radio"][value="front_and_back"]').on("click", function() {

				if( $("#style :selected").text() == 'Figured' ) {
					$(".copy-relative").css('padding-bottom','4em');
				}

			});

			$('input[type="radio"][value="continues"]').on("click", function() {

				if( $("#style :selected").text() == 'Figured' ) {
					$(".copy-relative").css('padding-bottom','4em');
				}

			});

	        //FRONT MESSAGE
			$( "input#front_message" ).keypress(function() {
			  $("#FrontStartClipArt101" ).removeClass('active');
			  $(".col-preview h3#fm101").css('display', 'inline-block');
			});

			//BACK MESSAGE
			$( "input#back_message" ).keypress(function() {
			  $("#BackStartClipArt101" ).removeClass('active');
			  $(".col-preview h3#bm101").css('display', 'inline-block');
			});

			//INDSIDE MESSAGE
			$( "input#inside_message" ).keypress(function() {
			  $("#InsideStartClipArt101" ).removeClass('active');
			  $(".col-preview h3#Im101").css('display', 'inline-block');
			});

			//CONTINUOUS MESSAGE
			$( "input#continues_message" ).keypress(function() {
			  $("#FullStartClipArt101" ).removeClass('active');
			  $(".col-preview h3#Cm101").css('display', 'inline-block');
			});
	    }
	});

	//IPHONE MOBILE
	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 480) {

			$("select#style").bind("change", function() {

				var style = $('#style option:selected').text();

				if (style == "Figured") {
			    	$(".button-backend").css('padding-top', '0');
			    }

			    else {
			   		$(".button-backend").css('padding-top', '0');
			    }

			});
	    }
	});


	//FIGURED SIZE CHANGE
	$("select#width").bind("change", function() {
		if ($("select#width").val() == "1/4") {
		    $("i#centerclip").css('font-size', '50px');
		    $(".box-figured").css('width', '80px');
		    $(".box-figured").css('height', '80px');
		    $(".box-figured").css('line-height', '1');
		}

		else if ($("select#width").val() == "1") {
			$(".box-figured").css('width', '140px');
			$(".box-figured").css('height', '140px');
			$(".box-figured").css('line-height', '2.5');
			$("i#centerclip").css('font-size', '85px');
			$("i#centerclip").css('line-height', '1.6');
		}

		else {
			$("i#centerclip").css('font-size', '70px');
			$("i#centerclip").css('line-height', '1.6');
			$(".box-figured").css('width', '115px');
		    $(".box-figured").css('height', '115px');
		    $(".box-figured").css('line-height', '2');
		}
	});

	$('input#selectFont[value=Corben]').change(function() {
		alert($(this).val()); 
	});
	// $('input[type="text"][value="Asset"]').on("click", function() {
	// 	if( $("#style :selected").value() == 'Asset' ) {
	// 		$(".col-preview h3").css('display','none');
	// 	}
	// });

	//FIGURED COLOR CHANGE

	$("#colorStyleBox div").click(function() {
	    var dataAttr = $(this).attr("data-name");

	    if (
	    	dataAttr === 'White' ||
	    	dataAttr === 'Blue - White'||
	    	dataAttr == 'Brown - White' ||
	    	dataAttr == 'Lavender - White' ||
	    	dataAttr == 'Lightblue - White' ||
	    	dataAttr == 'Limegreen - White' ||
	    	dataAttr == 'Green - White' ||
	    	dataAttr == 'Orange - White' ||
	    	dataAttr == 'Pink - White' ||
	    	dataAttr == 'Yellow - White' ||
	    	dataAttr == 'Blue - White - Purple' ||
	    	dataAttr == 'Brown - White - Gray' ||
	    	dataAttr == 'Royalblue - White - Red'
	    ) {

	      var value = $(this).attr("value");
	  		$('.box-figured-box-general').css('box-shadow', 'rgb(112, 112, 112) 0px 0px 1px 0px');
	    	$('.box-figured-center').css('box-shadow', 'rgb(112, 112, 112) 0px 0px 1px 0px');
	    	$('.box-figured-center').css('top', '47%');

	    }

	    else {
	    	$('.box-figured-box-general').css('box-shadow', 'none');
	    	$('.box-figured-center').css('box-shadow', 'none');
	    	$('.box-figured-center').css('top', '50%');
	    	$('.box-figured-center').css('background-color', 'transparent');
	    }

	});

	//wristband style
	$("select#style").bind("change", function() {
		var style = $('#style option:selected').text();
		if (style == "Debossed") {
			$(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(1)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
		}
		else if (style == "Imprinted") {
		    $(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(2)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
		}
		else if (style == "Deboss-Fill") {
		    $(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(3)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
		}

		else if (style == "Embossed") {
			$(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(4)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
		}
		else if (style == "Emboss-Printed") {
			$(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(5)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
		}
		else if (style == "Dual Layer") {
			$(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(6)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
			$(".radio").addClass('radio-dual');
		}
		else if (style == "Figured") {
			$(".list-product_style li").css('display', 'none');
			$(".list-product_style li:nth-child(7)").css('display', 'block');
			$(".product-blank").css('z-index', '-1');
		}
		else if (style == "Blank") {
			$(".list-product_style li").css('display', 'none');
			$(".product-blank").css('display', 'block');
			$(".product-blank").css('z-index', '1');
		}

	});

	//FIGURED OPTIONS

	$("select#style").bind("change", function() {
		var style = $('#style option:selected').text();
		if (style == "Figured") {
			$(".button-backend").css('padding-top', '0')
			$(".button-backend").css('position', 'relative');
			$(".button-backend").css('left', '-12.7em');
		}
		else {
		    $(".button-backend").css('position', 'inherit');
		}

	});

	$("select#style").bind("change", function() {
		var style = $('#style option:selected').text();
		if (style == "Dual Layer") {
			$(".radio").addClass('radio-dual');
		}
		else {
		    $(".radio").removeClass('radio-dual');
		}

	});
	// $(document).on('change', 'ul.woocommerce-error', function(){
	// 	console.log('dragoooonnn');
	// 	console.log($('ul.woocommerce-error li').first());
	// });
	//end wristband style

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 1024) {

		//blank
		$(".product-blank").click(function(e){
		    $(".product-blank-hover-wrap").show();
		     e.stopPropagation();
			});

			$(".product-blank-hover-wrap").click(function(e){
			    e.stopPropagation();
			});

			$(document).click(function(){
		    $(".product-blank-hover-wrap").hide();
		});

	    }
	});


	$(document).ready(function() {
	    $('input:radio[name=customization_location]').change(function() {
	        if (this.value == 'customized_in_usa') {
	            $('div#section-lanyard .customization_location.each-message').css('display', 'block');
	            $('div#section-lanyard .radio:first-child .customization_location.each-message').css('display', 'none')
	        }
	        else {
	        	$('div#section-lanyard .customization_location.each-message').css('display', 'none');
	        }
	    });
	});

	// COPY LINK FOR BLOG
	new Clipboard('.btn-link');

	$('.btn-link').on('click', function(){
	    $(this).addClass('link-copied');
	});

	//Lanyard Imprint Options
	$( "#lanyard-add-imprint-items label" ).click(function() {
		if ( $( this ).hasClass( "active" ) ) {
			$('#selected_color_table').removeClass('table-with-imprint');
		}

		else {
			$('#selected_color_table').addClass('table-with-imprint');
		}
	});

	//ADD ACTIVE CLASS ON TABS
	$('#everything').addClass('active');
	$('.item-product').click(function(){	
		$('.swipebox').swipebox();
	});

	// SUMMARY RESPONSIVE
	var summ_desktop = jQuery('#bodyform .col-holder-summ-desktop');
	if($(window).width() <= 976){
		summ_desktop.appendTo('#order_now_first_step');
	}else{
		summ_desktop.prependTo('#order_now_summary');
	}
	$(window).resize(function(){
		if($(this).width() <= 976){
			summ_desktop.appendTo('#order_now_first_step');
		}else{
			summ_desktop.prependTo('#order_now_summary');
		}
	});

	$('a.go-right').click(function(event) {
	    var pos = $('#price_chart').scrollLeft() + 50;
	    $('#price_chart').scrollLeft(pos);
	});

	//COUPON POSITION

	var summ_desktop = jQuery('.woocommerce-content-box.full-width.checkout_coupon');
	summ_desktop.appendTo('.woocommerce-checkout-review-order');

	//CAROUSEL DURATION
	// $(function(){
	// 	$('.carousel-banner').carousel({
	// 	      interval: 3000
	// 	    });
	// });

	$('textarea.form-receive').on('click', function(){
	    $('.copy-text-placeholder').css('display', 'none');
	});

});