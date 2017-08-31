 jQuery(document).ready(function ($) {

	$('.dropdown-toggle').dropdown();
	/*Start For Pantone*/
	$(document).on('click', '.wristband_color_select', function(){
		var item = $('input[name="color_style"]:checked').val();
		var white = '#ffffff';
		var c1 = $('#pantonTracker').attr( 'data-1' ) ? true : false;
		var c2 = $('#pantonTracker').attr( 'data-2' ) ? true : false;
		var c3 = $('#pantonTracker').attr( 'data-3' ) ? true : false;

		var selected = $(this).attr( 'data-select' );

		if(typeof selected == 'undefined'){
			var getPTTracker = $('#pantonTracker').val();
			var colorName = $(this).attr('data-name');
			var colorVal  = $(this).attr('data-color');

			if(item == 'Solid'){
				
				$(this).append('<span class="badge">?</span>');
				$('#pantonTracker').attr('data-1', colorName);
				$('#pantonTracker').attr('color-1', colorVal);
				$('#PTCName1').val(colorName);
				$(this).attr('data-select', '1');
				$("#addPantoneColor").trigger("click");

			}else if(item == 'Segmented' || item == 'Swirl'){

				if(c1 == false) {

					$(this).append('<span class="badge">âœ“</span>');
				 	$('#pantonTracker').attr('data-1', colorName);
				 	$('#pantonTracker').attr('color-1', colorVal);
				 	$('#PTCName1').val(colorName);
				 	$('#PTCName1').css('background-color',colorVal)
				 	$(this).attr('data-select', '1');

				}else if(c2 == false){

				 	$(this).append('<span class="badge">?</span>');
				 	$('#pantonTracker').attr('data-2', colorName);
				 	$('#pantonTracker').attr('color-2', colorVal);
				 	$('#PTCName2').val(colorName);
				 	$('#PTCName2').css('background-color',colorVal);
				 	$(this).attr('data-select', '2');

				}else if(c3 == false){

				 	$(this).append('<span class="badge">âœ“</span>');
				 	$('#pantonTracker').attr('data-3', colorName);
				 	$('#pantonTracker').attr('color-3', colorVal);
				 	$('#PTCName3').val(colorName);
				 	$('#PTCName3').css('background-color', colorVal);
				 	$(this).attr('data-select', '3');
				 	$("#addPantoneColor").trigger("click");

				}else{

				 	alert('Please Select 2 or 3 colors only');

				}

			}

		}else{

			// alert('This color is already selected! Please choose another color');
			$(this).find('.badge').remove();
			var sNo = $(this).attr('data-select');
			$('#PTCName'+sNo).val('');
			$('#pantonTracker').attr('data-'+sNo, '');
			$('#pantonTracker').attr('color-'+sNo, '');
			$(this).removeAttr( 'data-select' );


		}
		
	});

	$(document).on('click', '#addPantoneColor', function(){
		console.log('choose');
		var item = $('input[name="color_style"]:checked').val();

		if(item == 'Solid'){

			colorNames = $('#pantonTracker').attr('data-1');
			colorVal   = $('#pantonTracker').attr('color-1');

			var con = $('input[name="color_style"]:checked').val();
			var ul = "";
			switch(con){
				case 'Solid' :
					ul = $('#tab-solid').find('ul');
				break;
				case 'Segmented' :
					ul = $('#tab-segmented').find('ul');
				break;
				case 'Swirl' :
					ul = $('#tab-swirl').find('ul');
				break;
				case 'Glow' :
					ul = $('#tab-glow').find('ul');
				break;
			}

			var li = '';
			
			li+='<li class="color-enabled">';
			  li+= '<span class="copy-tooltip-new tooltip-custom">'+colorNames+'</span>';
			  li+='<div id="colorStyleBox" title="'+con+'" class="color-box color-wrap selected">';
			    li+='<div data-name="'+colorNames+'" data-color="'+colorVal+'" style="background-color: '+colorVal+';';
			    li+='background: -webkit-linear-gradient(90deg,'+colorVal+'); /* For Safari 5.1 to 6.0 */';
			    li+='background: -o-linear-gradient(90deg,'+colorVal+'); /* For Opera 11.1 to 12.0 */';
			    li+='background: -moz-linear-gradient(90deg,'+colorVal+'); /* For Firefox 3.6 to 15 */';
			    li+='background: linear-gradient(90deg,'+colorVal+'); /* Standard syntax */';
			    li+='height: 100%;';
			    li+='"></div>';
			  li+='</div>';
			li+='</li>';
			ul.append(li);

			$('#PTCName1').val("");
			$('.badge').html("");
			$('#pantonTracker').attr('data-1', '');
			$('#pantonTracker').attr('color-1', '');
			$('#modal-color-pantone').modal('hide');
			$('.selected').click();

		}else if(item == 'Segmented' || item == 'Swirl'){

			var count = 0;
			var c1 = $('#pantonTracker').attr( 'data-1' ) ? count++ : '';
			var c2 = $('#pantonTracker').attr( 'data-2' ) ? count++ : '';
			var c3 = $('#pantonTracker').attr( 'data-3' ) ? count++ : '';

			if(count > 1){

				var colorNames = "",
					colorVal   = "";

				for(var i = 1; i <= count; i++){
				 	if(i == 1){
				 		colorNames = $('#pantonTracker').attr( 'data-'+i );
				 		colorVal   = $('#pantonTracker').attr( 'color-'+i );
				 	}else{
				 		colorNames = colorNames + ' - ' + $('#pantonTracker').attr( 'data-'+i );
				 		colorVal   = colorVal + ',' + $('#pantonTracker').attr( 'color-'+i );
				 	}
				} 

				var con = $('input[name="color_style"]:checked').val();
				var ul = "";
				switch(con){
					case 'Solid' :
						ul = $('#tab-solid').find('ul');
					break;
					case 'Segmented' :
						ul = $('#tab-segmented').find('ul');
					break;
					case 'Swirl' :
						ul = $('#tab-swirl').find('ul');
					break;
					case 'Glow' :
						ul = $('#tab-glow').find('ul');
					break;
				}

				var li = '';
				
				li+='<li class="color-enabled">';
				  li+= '<span class="copy-tooltip-new tooltip-custom">'+colorNames+'</span>';
				  li+='<div id="colorStyleBox" title="'+con+'" class="color-box color-wrap selected">';
				    li+='<div data-name="'+colorNames+'" data-color="'+colorVal+'" style="background-color: '+colorVal+';';
				    li+='background: -webkit-linear-gradient(90deg,'+colorVal+'); /* For Safari 5.1 to 6.0 */';
				    li+='background: -o-linear-gradient(90deg,'+colorVal+'); /* For Opera 11.1 to 12.0 */';
				    li+='background: -moz-linear-gradient(90deg,'+colorVal+'); /* For Firefox 3.6 to 15 */';
				    li+='background: linear-gradient(90deg,'+colorVal+'); /* Standard syntax */';
				    li+='height: 100%;';
				    li+='"></div>';
				  li+='</div>';
				li+='</li>';
				ul.append(li);

				$('#PTCName1').val("");
				$('#PTCName2').val("");
				$('#PTCName3').val("");
				$('#PTCName1').css('background-color','#ffffff');
				$('#PTCName2').css('background-color','#ffffff');
				$('#PTCName3').css('background-color','#ffffff');
				$('.badge').html("");
				$('#pantonTracker').attr('data-1', '');
				$('#pantonTracker').attr('color-1', '');
				$('#pantonTracker').attr('data-2', '');
				$('#pantonTracker').attr('color-2', '');
				$('#pantonTracker').attr('data-3', '');
				$('#pantonTracker').attr('color-3', '');
				$('#modal-color-pantone').modal('hide');
				$('.selected').click();

			}else{

				alert('Please Select at least 2 colors before saving');

			}

		}

	});
	/*End For Pantone*/

	/* Custom Text Color Start */
	$(document).on('click', '.text_color_select', function(){

		var getTCTracker = $('#text_color').val();
		var colorName = $(this).attr('data-name');
		var colorVal  = $(this).attr('data-color');

		$(this).append('<span class="badge">?</span>');
		$('#textTracker').attr('data-name', colorName);
		$('#textTracker').attr('data-color', colorVal);
		$('#text_color').val(colorName);
		$(this).attr('data-select', '1');
		$("#addTextColor").trigger("click");
		
	});

	$(document).on('click', '#addTextColor', function(){

		colorNames = $('#textTracker').attr('data-name');
		colorVal   = $('#textTracker').attr('data-color');

		var html = '';
		html += '\
			<li>\
			<span class="copy-tooltip-new tooltip-custom">'+colorNames+'</span>\
				<div class="color-selected color-box color-wrap selected">\
					<div data-name="'+ colorNames +'" data-color="'+ colorVal +'" style="background-color:'+ colorVal +'; height: 100%;"></div>\
				</div>\
			</li>';

		$('.color-selected').removeClass('selected');
		$('#wristband-text-color ul').append(html);
		$(".selected").trigger("click");
		$('#text_color').val("");
		$('.badge').html("");
		$('#textTracker').attr('data-name', '');
		$('#textTracker').attr('data-color', '');
		$('#modal-color-text').modal('hide');

	});
	/* Custom Text Color End */

	function ChangefontDesign(val) {
            
            if (val == "Figured") {
//                          $('#figured-container').show();
//                          $('#figured_icon').show();
                            $('.box-figured-circle, .font_mobil_halfcircled, .back_mobil_halfcircled').show();
                            $('.box-figured-circle').css({'background-color':'inherit'});
                            $("#front-back-text-container").css({'margin-bottom': '2em' });
                            $("#full-text-container").css({ 'margin-bottom': '2em'});
                            $(".font_circled").css({ 'padding-right': '58px'});
                            $(".back_circled").css({ 'padding-left': '58px'});
                            $('#jQTextFill_Cm101').css('margin-right', '12px' );
                            if (window.matchMedia('(max-width: 991px)').matches) {
                                $('#front-back-text-container').css({'margin-top': '20px', 'margin-bottom': '25px!important'});
                                $('#summary_mobile').css('margin-bottom', '30px' );
                                $('#inside-text-container').css({'margin-top': '29px'});
                                $("<style id='mobile_circle'>.col-md-6.wristbandNoPadding:nth-child(4):before{content: ''; border: 18px solid #fff; display: block;}.col-md-6.wristbandNoPadding:nth-child(4):after{content: none;}#jQTextFill_fm101{width: 85%;margin-right: 46px; margin-left: 1px;}#jQTextFill_bm101{width: 85%;margin-left: 46px;margin-right: 1px;}.col-md-6.wristbandNoPadding.back_circled{z-index:0}</style>").appendTo('head');
                           }
                            

                        } else {
//                          $('#figured-container').hide();
//                          $('#figured_icon').hide();
                            $('.box-figured-circle, .font_mobil_halfcircled, .back_mobil_halfcircled').hide();
                            $('.box-figured-circle').css({'background-color':'inherit'});
                            $("#front-back-text-container").css({ 'margin-bottom': '0em' });
                            $("#full-text-container").css({ 'margin-bottom': '0em'});
                            $(".font_circled").css({ 'padding-right': '0px'});
                            $(".back_circled").css({ 'padding-left': '0px'});
                            $('#jQTextFill_Cm101').css('margin-right', 'auto');
                            if (window.matchMedia('(max-width: 767px)').matches) {
                                $('#front-back-text-container').css({'margin-top': '0px', 'margin-bottom': '0px'});
                                $('#summary_mobile').css('margin-bottom', '0px' );
                                $('#inside-text-container').css({'margin-top': '10px'});
                                $('#mobile_circle').detach();
                            }
                        }
        switch (val) {
            case 'Imprinted':
                var cssVal = "0 0 0";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-full-text').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', '-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)');
                break;
            case 'Debossed':
                var cssVal = "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)";
                
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', '-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)');
                $('.col-full-text').css('textShadow', cssVal);
                $('.front-msg-text').css('color','rgba(255, 255, 255, 0.2)');
               	$('.back-msg-text').css('color','rgba(255, 255, 255, 0.2)');
               	$('.inside-msg-text').css('color','rgba(255, 255, 255, 0.2)');
               	$('.full-msg-text').css('color','rgba(255, 255, 255, 0.2)');
                break;
            case 'Embossed':
                var cssVal = "-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                $('.col-full-text').css('textShadow', cssVal);
                // $('.front-msg-text').css('color','rgba(255, 255, 255, 0.2)');
               	// $('.back-msg-text').css('color','rgba(255, 255, 255, 0.2)');
               	// $('.inside-msg-text').css('color','rgba(255, 255, 255, 0.2)');
               	// $('.full-msg-text').css('color','rgba(255, 255, 255, 0.2)');
                break;
            case 'Emboss-Printed':
                var cssVal = "-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', '-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)');
                $('.col-full-text').css('textShadow', cssVal);
                break;
            case 'Deboss-Fill':
                var cssVal = "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', '-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)');
                $('.col-full-text').css('textShadow', cssVal);
                break;
            case 'Dual Layer':
                var cssVal = "-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)";
                $('.col-front').css('textShadow', "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)");
                $('.col-back').css('textShadow', "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)");
                $('.col-inside').css('textShadow', cssVal);
                $('.col-full-text').css('textShadow', '-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)');
                break;
            default:
                var cssVal = "0 0 0";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', '-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)');
                $('.col-full-text').css('textShadow', cssVal);
                break;
        }

        if( val == 'Blank'){
                	$('.front-msg-text').css('display','none');
		    		$('.back-msg-text').css('display','none');
		    		// $('.inside-msg-text').css('display','none');
                	$('.col-inside').css('textShadow', '-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)');  
		    		$('.full-msg-text').css('display','none');

		    		$('input[name="front_message"]').val('');
		    		$('input[name="back_message"]').val('');
		    		$('input[name="continues_message"]').val('');
		    		// $('input[name="inside_message"]').val('');
		    		// $('input[name="selectFont"]').val('Select Font');
		    		// $('input[name="selectFont"]').css('font-family','Arial');

		    		$('input[name="front_message"]').prop( "disabled", true );
		    		$('input[name="back_message"]').prop( "disabled", true );
		    		$('input[name="continues_message"]').prop( "disabled", true );
		    		// $('input[name="inside_message"]').prop( "disabled", true );
		    		// $('input[name="selectFont"]').prop( "disabled", true );

		    		$('#front_start_btn').addClass('disabled');
		    		$('#front_end_btn').addClass('disabled');
		    		$('#back_start_btn').addClass('disabled');
		    		$('#back_end_btn').addClass('disabled');
		    		$('#wrap_around_start').addClass('disabled');
		    		$('#wrap_around_end').addClass('disabled');

                } else {
                	$('.front-msg-text').css('display','inline-block');
		    		$('.back-msg-text').css('display','inline-block');
		    		$('.inside-msg-text').css('display','inline-block');  
		    		$('.full-msg-text').css('display','inline-block');

		    		$('input[name="front_message"]').prop( "disabled", false );
		    		$('input[name="back_message"]').prop( "disabled", false );
		    		$('input[name="continues_message"]').prop( "disabled", false );
		    		$('input[name="inside_message"]').prop( "disabled", false );
		    		$('input[name="selectFont"]').prop( "disabled", false );

		    		$('#front_start_btn').removeClass('disabled');
		    		$('#front_end_btn').removeClass('disabled');
		    		$('#back_start_btn').removeClass('disabled');
		    		$('#back_end_btn').removeClass('disabled');
		    		$('#wrap_around_start').removeClass('disabled');
		    		$('#wrap_around_end').removeClass('disabled');
                }

    }



	function FontInit(){
		var whight = $('#width').val();
		var wtext  = $('.col-preview');
		var bg = $('.segd');
		// .col-preview
		//data-font-length
		switch(whight) {
                    
                    case '2':
		    	wtext.css('height', '170px');
		    	bg.css('height', '170px');

		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','95px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','95px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','95px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','95px');
		    	}
		    	//lineheight
		    	$('.copy-display-inline').css('line-height','155px');
		    	// $('.col-preview').css('line-height','130px');
		        break;
                    
			case '1.5':
		    	wtext.css('height', '130px');
		    	bg.css('height', '130px');

		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','90px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','90px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','90px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','90px');
		    	}
		    	//lineheight
		    	$('.copy-display-inline').css('line-height','130px');
		    	// $('.col-preview').css('line-height','130px');
		        break;
		    case '1':
		    	wtext.css('height', '90px');
		    	bg.css('height', '90px');

		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','75px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','75px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','90px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','90px');
		    	}
		    	//lineheight
		    	$('.copy-display-inline').css('line-height','90px');
		    	// $('.col-preview').css('line-height','90px');
		        break;
		    case '3/4':
		        wtext.css('height', '70px');
		    	bg.css('height', '70px');
		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','70px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','70px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','70px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','70px');
		    	}
		    	//lineheight
		    	$('.copy-display-inline').css('line-height','70px');
		    	// $('.col-preview').css('line-height','70px');
		        break;
		    case '1/2':
		        wtext.css('height', '50px');
		    	bg.css('height', '50px');
		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','50px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','50px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','50px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','50px');
		    	}
		    	//lineheight
		    	$('.copy-display-inline').css('line-height','50px');
		    	// $('.col-preview').css('line-height','50px');
		        break;
		    case '1/4':
		        wtext.css('height', '30px');
		    	bg.css('height', '30px');
		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','30px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','30px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','30px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','30px');
		    	}
		    	//lineheight
		    	$('.copy-display-inline').css('line-height','30px');
		    	// $('.col-preview').css('line-height','30px');
		        break;
		}
	}
	function containerdisplay(){
		var color_type = $('input[name="color_style"]:checked').val();
		$('#box_figured').show();
		$('#box_figured_fig').hide();
		switch(color_type) {
		    case 'Segmented':
		    	$('.seg').show();
		    	$('.color-pantone').show();
		    	$('.hideifsolid').show();
		    	$('.swirlcolor').hide();
		        break;
		    case 'Solid':
		        $('.seg').hide();
		        $('.color-pantone').show();
		        $('.hideifsolid').hide();
		    	$('.swirlcolor').hide();
		        break;
		    case 'Swirl':
		        $('.seg').hide();
		        //$('#box_figured').hide();
		        $('.color-pantone').show();
		        $('.hideifsolid').show();
		        $('.swirlcolor').show();
		        break;
		    case 'Glow':
		        $('.seg').hide();
		        $('.color-pantone').hide();
		        $('.hideifsolid').hide();
		    	$('.swirlcolor').hide();
		        break;
		    default :
		    	$('.seg').hide();
		        $('.color-pantone').show();
		    	$('.hideifsolid').hide();
		    	$('.swirlcolor').hide();
		}
	}
        
        $('#segmented_color_invert').on('change', function(){
            colordisplay();
        });

	function colordisplay(){
		var color = $('#wristband-color-items .color-wrap.selected').find('div').data('color');
		var textcolor = $('#wristband-text-color .color-wrap.selected').find('div').data('color');
		//var color_type = $('#wdisplay101').attr('color-type');
		var color_type = $('input[name="color_style"]:checked').val();
		var message_type = $('input[name="message_type"]:checked').val();
		var style = $('#style option:selected').text();

		$('.fig-left').css({'background-color': ''});
		$('.fig-center').css({'background-color': ''});
		$('.fig-right').css({'background-color': ''});
		$('#box_figured').css('background-color', ''); 
                $('.continious_box_figured').css({'background-color':''});
		$('.seg-left').css({'background-color':''});
		$('.seg-center').css({'background-color':''});
		$('.seg-right').css({'background-color':''});
		
		if ( typeof color != 'undefined' ) {
			switch(color_type) {
				    case 'Segmented':
			    		$('.swirlcolor').hide();
			    		$('.seg').show();			    	
				    	var colors = color.split(',');
                                        if(jQuery('#segmented_color_invert').is(':checked')) {var colors_0 = colors[0];var colors_1 = colors[1]; colors[0] = colors_1; colors[1]= colors_0;}
				    	if (colors.length == 2) {
                            if (style == 'Figured') {
                                var is_mobile = false;
                                if( jQuery('#mobile-element').css('display')=='none') {is_mobile = true;}
            
                                 if(!is_mobile) { // 2 colors desktop version figured
                                     $('.seg_mobile').hide();
                                     $('.seg_mobile_front').hide();
                                $('.font_mobil_halfcircled').css('background-color', colors[1]);
                                $('.back_mobil_halfcircled').css('background-color', colors[1]);
				    			$('.fig-left').css({
				    				'background-color': colors[1],
				    				'width': '33.33%',
				    				'border-top-left-radius': '5px', 
				    				'border-bottom-left-radius': '5px'
					    		});
					    		$('.fig-center').css({
					    			'background-color': colors[0],
				    				'width' : '31%',
				    				'left' : '34.6%'
					    		});
					    		$('.fig-right').css({
					    			'background-color': colors[1],
				    				'width' : '30.6%',
				    				'left' : '65.68%',
				    				'border-top-right-radius': '5px', 
				    				'border-bottom-right-radius': '5px'

					    		});
					    		$('#box_figured').css('background-color', colors[0]);
                                                        $('.continious_box_figured').css('background-color',colors[1]);
						    	$('.seg-left').css({
					    			'background-color': colors[1],
					    			'width': '24.33%'

					    		});
					    		$('.seg-center').css({
					    			'background-color': colors[0],
					    			'width' : '53.34%',
					    			'left' : '24.33%'
					    		});
					    		$('.seg-right').css({
					    			'background-color': colors[1],
					    			'width' : '24.33%',
	                                                        'left' : '75.68%'
					    		});
                                                        }
                                else { //2 colors mobile figured
                                    $('.seg_mobile_front').show();
                                    $('.seg_mobile').show();
                                    $('.font_mobil_halfcircled').css('background-color', colors[0]);
                                    $('.back_mobil_halfcircled').css('background-color', colors[0]);
                                    $('#box_figured').css('background-color', colors[0]);
                                                        $('.continious_box_figured').css('background-color',colors[1]);
                                                        $('.seg-left').css({
					    			'background-color': colors[0],
					    			'width': '50%'

					    		});
					    		$('.seg-right').css({
					    			'background-color': colors[1],
					    			'width' : '50%',
	                                                        'left' : '50%'
					    		});
                                                        $('div.seg_mobile_front > div.seg-left').css({
					    			'background-color': colors[1],
					    			'width': '50%'

					    		});
					    		$('div.seg_mobile_front > div.seg-right').css({
					    			'background-color': colors[0],
					    			'width' : '50%',
	                                                        'left' : '50%'
					    		});
                                }
                            } else { //colors.length == 2 non figured
                                
				    			$('.fig-left').css({
				    				'background-color': colors[0],
				    				'width': '25%',
				    				'border-top-left-radius': '5px', 
				    				'border-bottom-left-radius': '5px'
					    		});
					    		$('.fig-center').css({
					    			'background-color': colors[1],
				    				'width' : '50%',
				    				'left' : '25%'
					    		});
					    		$('.fig-right').css({
					    			'background-color': colors[0],
				    				'width' : '25%',
				    				'left' : '75%',
				    				'border-top-right-radius': '5px', 
				    				'border-bottom-right-radius': '5px'
					    		});
					    		$('#box_figured').css('background-color', colors[1]); 
                                                        $('.continious_box_figured').css('background-color',colors[1]);
                                $('.seg-left').css({
                                'background-color': colors[0],
                                'width': '50%'
                                });
                                $('.seg-center').css({
                                        'background-color': colors[1],
                                        'width' : '50%',
                                        'left' : '50%'
                                    });
                                $('.seg-right').css({
                                        'background-color': colors[0],
                                        'width' : '0%',
                                        'left' : '75%'
                                });
                            }
				    	} else if (colors.length == 3) {

				    		if (style == 'Figured') {
                                $('.font_mobil_halfcircled').css('background-color', colors[2]);
                                $('.back_mobil_halfcircled').css('background-color', colors[0]);
				    			$('.fig-left').css({
				    				'background-color': colors[0],
				    				'width': '33.33%',
				    				'border-top-left-radius': '5px', 
				    				'border-bottom-left-radius': '5px'
					    		});
					    		$('.fig-center').css({
					    			'background-color': colors[1],
				    				'width' : '31%',
				    				'left' : '34.6%'
					    		});
					    		$('.fig-right').css({
					    			'background-color': colors[2],
				    				'width' : '30.6%',
				    				'left' : '65.68%',
				    				'border-top-right-radius': '5px', 
				    				'border-bottom-right-radius': '5px'

					    		});
					    		$('#box_figured').css('background-color', colors[1]);
                                                        $('.continious_box_figured').css('background-color',colors[0]);
					    	} 

				    		$('.seg-left').css({
				    			'background-color': colors[0],
				    			'width': '33.33%'

				    		});
				    		$('.seg-center').css({
				    			'background-color': colors[1],
				    			'width' : '33.34%',
				    			'left' : '33.33%'
				    		});
				    		$('.seg-right').css({
				    			'background-color': colors[2],
				    			'width' : '33.33%',
				    			'left' : '66.68%'
				    		});
				    	}
			        break;
				    case 'Swirl':
				        $('.seg').hide();
				        $('.swirlcolor').show();
				        var colors = color.split(',');
				        	if (colors.length == 2) {
						    	$('.fig-first-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.fig-second-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.fig-third-color').css({
				        			'background-color' : colors[1]
				        		});
				        		$('.first-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.second-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.third-color').css({
				        			'background-color' : colors[1]
				        		});
				        	} else if (colors.length == 3) {
				        		$('.fig-first-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.fig-second-color').css({
				        			'background-color' : colors[1]
				        		});
				        		$('.fig-third-color').css({
				        			'background-color' : colors[2]
				        		});
				        		$('.first-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.second-color').css({
				        			'background-color' : colors[1]
				        		});
				        		$('.third-color').css({
				        			'background-color' : colors[2]
				        		});
				        	}
				        break;
				    case 'Glow':
				        $('#front-back-text-container').css('background-color', color);
						$('#inside-text-container').css('background-color', color);
                        $('.font_mobil_halfcircled').css('background-color', color);
						$('.back_mobil_halfcircled').css('background-color', color);
				        break;
				    default :
				    	if (style == 'Dual Layer'){
							$('.copy-preview-font').css('color', textcolor );
							$('.copy-preview-font-inside').css('color',textcolor);
							$('.copy-preview-clipart').css('color', textcolor );
							$('#front-back-text-container').css('background-color', color);
							$('#inside-text-container').css('background-color', textcolor);
							$('#full-text-container').css('background-color', color);
							$('#figured-container').css('background-color', color);
							$('#box_figured').css('background-color', color);
                                                        $('.continious_box_figured').css('background-color',color);

						}else{
							$('#front-back-text-container').css('background-color', color);
							$('.copy-preview-font-inside').css('color',color);
							$('#inside-text-container').css('background-color', color);
							$('#full-text-container').css('background-color', color);
							$('#figured-container').css('background-color', color);
							$('#box_figured').css('background-color', color);
                                                        $('.continious_box_figured').css('background-color',color);
                            $('.font_mobil_halfcircled').css('background-color', color);
                            $('.back_mobil_halfcircled').css('background-color', color);
						}
		}


	}

}

function colortable(color,color_type){
		var message_type = $('input[name="message_type"]:checked').val();
		var style = $('#style option:selected').text();
		var textcolor = $('.copy-preview-font').css('color');
		// console.log(color);
		// console.log(color_type);
		if ( typeof color != 'undefined' ) {
			switch(color_type) {
				    case 'Segmented':
			    		$('.swirlcolor').hide();			    	
				    	var colors = color.split(',');
				    	if (colors.length == 2) {

					    			$('.fig-left').css({
					    				'background-color': colors[0],
					    				'width': '25%',
					    				'border-top-left-radius': '5px', 
					    				'border-bottom-left-radius': '5px'
						    		});
						    		$('.fig-center').css({
						    			'background-color': colors[1],
					    				'width' : '50%',
					    				'left' : '25%'
						    		});
						    		$('.fig-right').css({
						    			'background-color': colors[0],
					    				'width' : '15.7%',
					    				'left' : '75%',
					    				'border-top-right-radius': '5px', 
					    				'border-bottom-right-radius': '5px'

						    		});
						    		$('#box_figured').css('background-color', colors[1]); 
                                                        $('.continious_box_figured').css('background-color',colors[0]);
					    			$('.seg-left').css({
					    			'background-color': colors[0],
					    			'width': '50%'
						    		});
						    		$('.seg-center').css({
						    			'background-color': colors[1],
						    			'width' : '50%',
						    			'left' : '50%'
						    		});
						    		$('.seg-right').css({
						    			'background-color': colors[0],
						    			'width' : '0%',
						    			'left' : '75%'
						    		});
				    		
				    	} else if (colors.length == 3) {

				    		if (style == 'Figured') {
				    			$('.fig-left').css({
				    				'background-color': colors[0],
				    				'width': '33.33%',
				    				'border-top-left-radius': '5px', 
				    				'border-bottom-left-radius': '5px'
					    		});
					    		$('.fig-center').css({
					    			'background-color': colors[1],
				    				'width' : '33.34%',
				    				'left' : '33.33%'
					    		});
					    		$('.fig-right').css({
					    			'background-color': colors[2],
				    				'width' : '24%',
				    				'left' : '66.68%',
				    				'border-top-right-radius': '5px', 
				    				'border-bottom-right-radius': '5px'

					    		});
					    		$('#box_figured').css('background-color', colors[1]);
					    	} 

				    		$('.seg-left').css({
				    			'background-color': colors[0],
				    			'width': '33.33%'

				    		});
				    		$('.seg-center').css({
				    			'background-color': colors[1],
				    			'width' : '33.34%',
				    			'left' : '33.33%'
				    		});
				    		$('.seg-right').css({
				    			'background-color': colors[2],
				    			'width' : '33.33%',
				    			'left' : '66.68%'
				    		});
				    	}
				        break;
				    case 'Swirl':
				        $('.seg').hide();
				        var colors = color.split(',');
				        	if (colors.length == 2) {
				        		$('.first-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.second-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.third-color').css({
				        			'background-color' : colors[1]
				        		});
				        	} else if (colors.length == 3) {
				        		$('.first-color').css({
				        			'background-color' : colors[0]
				        		});
				        		$('.second-color').css({
				        			'background-color' : colors[1]
				        		});
				        		$('.third-color').css({
				        			'background-color' : colors[2]
				        		});
				        	}
				        break;
				    case 'Glow':
				        $('#front-back-text-container').css('background-color', color);
						$('#inside-text-container').css('background-color', color);
				        break;
				    default :
				  //   	$('#front-back-text-container').css('background-color', color);
						// $('#inside-text-container').css('background-color', color);
						// $('#full-text-container').css('background-color', color);
						// $('#figured-container').css('background-color', color);
						// $('#box_figured').css('background-color', color);
						if (style == 'Dual Layer'){
							$('.copy-preview-font').css('color', textcolor );
							$('.copy-preview-font-inside').css('color',textcolor);
							$('.copy-preview-clipart').css('color', textcolor );
							$('#front-back-text-container').css('background-color', color);
							$('#inside-text-container').css('background-color', textcolor);
							$('#full-text-container').css('background-color', color);
							$('#figured-container').css('background-color', color);
							$('#box_figured').css('background-color', color);
                                                        $('.continious_box_figured').css('background-color',color);

						}else{
							$('#front-back-text-container').css('background-color', color);
							$('.copy-preview-font-inside').css('color',color);
							$('#inside-text-container').css('background-color', color);
							$('#full-text-container').css('background-color', color);
							$('#figured-container').css('background-color', color);
							$('#box_figured').css('background-color', color);
                                                        $('.continious_box_figured').css('background-color',color);
						}
		}
	}

}

	var prev_color_type = $('input[name="color_style"]:checked').val();
	$('#prev_color').val($('input[name="color_style"]:checked').val());
	//bandtextpathcont1
	$(document)
	/** COMMENTED TO IMPROVE PERFORMANCE
            .on('keyup paste', '#continues_message', function(){
		 //290
		 var textwitdh = $('#bandtextpathcont1')[0].offsetWidth;
		 var textwitdh2 = $('#bandtextpathcont2')[0].offsetWidth;

		 if ( textwitdh > 260 && textwitdh2 > 260) {

            $('#bandtextpath1')[0].setAttribute('startOffset', '0%');
            $('#bandtext1')[0].setAttribute('text-anchor', 'start');
            $('#bandtext1')[0].setAttribute('letter-spacing', '2px');
		 	
			// var fontSize = $('#fontCM').val();
			var fontSize = $(this).attr( 'fontCM' );
			var theFont = fontSize - ( fontSize * 0.3 );

			$('#bandtextpathcont1').css('font-size', theFont+'px' );
			$('#bandtextpathcont2').css('font-size', theFont+'px' );
			// $('#fontCM').val(theFont);
			$(this).attr( 'fontCM', theFont );

			$('#bandtextpathcont1')[0].setAttribute('textLength', '260');
			$('#bandtextpathcont2')[0].setAttribute('textLength', '260'); 
		 }
	}) **/
	.on('click', '.color-box', function(){
		var bandcolor = $('#wristband-color-items .color-wrap.selected').find('div').data('color');
		var color 		= $(this).find('div').attr('data-color');
		var color_name  = $(this).find('div').attr('data-name');
		var message_type = $('input[name="message_type"]:checked').val();
		var SetColor = $('#wristband-text-color div.selected').find('div').data('color');
		//var color_type = $('#wdisplay101').attr('color-type');
		var color_type = $('input[name="color_style"]:checked').val();
		//console.log(color_type);
		var checkColorFor = $(this).closest('ul').closest('div').attr('id');
		var style = $('#style option:selected').text();

		if ( typeof checkColorFor != 'undefined' ) {
			if ( checkColorFor == 'wristband-text-color' ) {


				if (style == 'Dual Layer'){

					$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',color);
					$('.copy-preview-clipart').css('color', color );
					$('#front-back-text-container').css('background-color', bandcolor);
					$('#inside-text-container').css('background-color', color);
					$('#full-text-container').css('background-color', bandcolor);
					$('#figured-container').css('background-color', bandcolor);

				}else{
					$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',bandcolor);
					$('.copy-preview-clipart').css('color', color );
					$('#inside-text-container').css('background-color', bandcolor);
				}
			} else {
				colordisplay();

			}
		}
		if (SetColor != undefined){

		} else {
				$('.copy-preview-font').css('color', 'rgba(255, 255, 255, 0.2)' );
				$('.copy-preview-font-inside').css('color', bandcolor );
				$('.copy-preview-clipart').css('color', 'rgba(255, 255, 255, 0.2)' );
				if (style == 'Embossed') {
					$('.copy-preview-font').css('color', bandcolor );
				}
		}
	})
	.on('change', 'select[name="style"]', function(){
		var textStyle = $('#style option:selected').text();
		$("ul#wbcolor li a#solid input:radio").prop("checked", true).trigger("click");
		// if(textStyle == 'Dual Layer'){
		// 	ChangefontDesign(textStyle);
		// 	$('#wbcolor').click();
		// }else {
			ChangefontDesign(textStyle);
		// }
                FontTextResize();
		
	})
	.on('click', '.color-text-added', function(){

		var style = $('#style option:selected').text();
		var color 		= $(this).find('div').attr('data-color');
		var bandcolor = $('#front-back-text-container').css('background-color');
		// console.log(color);
		// console.log($('#front-back-text-container').css('background-color'))
				if (style == 'Dual Layer'){

					$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',color);
					$('.copy-preview-clipart').css('color', color );
					$('#front-back-text-container').css('background-color', bandcolor);
					$('#inside-text-container').css('background-color', color);
					$('#full-text-container').css('background-color', bandcolor);
					$('#figured-container').css('background-color', bandcolor);

				}else{
					$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',bandcolor);
					$('.copy-preview-clipart').css('color', color );
					$('#inside-text-container').css('background-color', bandcolor);
				}

	})

	.on('click', '.tab-link', function(){
		var front  = $('#front-back-text-container');
		var inside = $('#inside-text-container');
		var wrap  = $('#full-text-container');
		var message_type = $('input[name="message_type"]:checked').val();
		var prev_color = $('#prev_color').val();
		var color_type = $('input[name="color_style"]:checked').val().toLowerCase();
		//add attr for color-type
		$('#wdisplay101').attr('color-type', color_type);
		containerdisplay();
		/*if(prev_color == color_type){
			console.log('true')
		} else {*/
			var color_style = $("#selected_wristband").attr('data-colorstyle');
			//console.log(color_style+' - '+color_type)
			if(color_type != color_style){
				$('#wristband-color-items .color-wrap').removeClass('selected');
				$("#selected_wristband").attr('data-colorstyle','');
				var color = '#707070';
				$('#front-back-text-container').css('background-color', color);
				$('#full-text-container').css('background-color', color);
				$('#inside-text-container').css('background-color', color);
				$('.copy-preview-font-inside').css('color',color);
				$('.fig-first-color').css({'background-color' : color});
				$('.fig-second-color').css({'background-color' : color});
				$('.fig-third-color').css({'background-color' : color});
				$('.first-color').css({'background-color' : color});
				$('.second-color').css({'background-color' : color});
				$('.third-color').css({'background-color' : color});
				$('.font_mobil_halfcircled').css('background-color', color);
				$('.back_mobil_halfcircled').css('background-color', color);
				$('.copy-preview-font-inside').css('color',color);
				$('.copy-preview-clipart').css('color', color );

			}	
		//}
		colordisplay();
		

	})

	.on('click', '.color-added', function (e) {
                    //milbert
                    var SelectedColor = $(this).find('div').data('color'),
                            StyleDColor = $(this).attr('data-W_type');

                      $("ul#wbcolor li a#"+StyleDColor.toLowerCase()+" input:radio").trigger("click");
                      colortable(SelectedColor,StyleDColor);
                      containerdisplay();

         })

	.on('change', '#width', function(){
	
		FontInit();
                FontTextResize();
		$('#selectFont').trigger('change');
	})
	.on('keyup paste','#front_message', function( event ){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		var whight = $('#width').val();
		if ( $(this).val() == '' ) {
			if ( typeof event.which == 'undefined' || typeof event.which =='') {
                                if(whight == '2' || whight == '1.5'){$('#fm101').text('Front');}
				else {$('#fm101').text('Front Message');}
			} else {
				$('#fm101').text( $(this).val() );
			}
		} else {
			$('#fm101').text( $(this).val() );
                        resize_fm101();
		}
	})
	.on('keyup paste','#back_message', function( event ){
		if ( $(this).val() == '' ) {
		var whight = $('#width').val();
			if ( typeof event.which == 'undefined' || typeof event.which =='') {
                                if(whight == '2' || whight == '1.5'){$('#bm101').text('Back');}
				else {$('#bm101').text('Back Message');}
			} else {
				$('#bm101').text( $(this).val() );
			}
		} else {
			$('#bm101').text( $(this).val() );
                        resize_bm101();
		}
	})
	.on('keyup paste','#inside_message', function( event ){
		if ( $(this).val() == '' ) {
		var whight = $('#width').val();
			if ( typeof event.which == 'undefined' || typeof event.which =='' ) {
				 if(whight == '2' || whight == '1.5'){$('#Im101').text('Inside');}
				else {$('#Im101').text('Inside Message');}
			} else {
				$('#Im101').text( $(this).val() );
			}
		} else {
			$('#Im101').text( $(this).val() );
                        resize_im101();
		}
	})
	.on('keyup paste','#continues_message', function( event ){
		if ( $(this).val() == '' ) {
		var whight = $('#width').val();
			if ( typeof event.which == 'undefined' || typeof event.which =='' ) {
                             if(whight == '2' || whight == '1.5'){$('#Cm101').text('Continuous');}
				else {$('#Cm101').text('Continuous Message');}
			} else {
				$('#Cm101').text( $(this).val() );
			}
		} else {
			$('#Cm101').text( $(this).val() );
                        resize_cm101();
		}
	})
	
	.on('click change', 'input[name=message_type]', function(){
		var r = $('input[name="message_type"]:checked').val();
		switch( r ) {
		    case 'continues':
		        $('#front-back-text-container').fadeOut(0);
                        $('#full-text-container').fadeIn(0);
		        break;
		    case 'front_and_back':
		        $('#front-back-text-container').fadeIn(0);
			$('#full-text-container').fadeOut(0);
		        break;
		}
		containerdisplay();
		colordisplay();
                FontTextResize();
	})
	.on('change', '#selectFont', function(){

		var message_type = $('input[name="message_type"]:checked').val();

		if( message_type == 'continues' ) {
			$('#forwrap').val( $('input[name="continues_message"]').val() );
			$('input[name="continues_message"]').val('');
			$('input[name="continues_message"]').val($('#forwrap').val());

		} else {
			$('#forfront').val( $('input[name="front_message"]').val() );
			$('#forback').val( $('input[name="back_message"]').val() );

			$('input[name="front_message"]').val('');
			$('input[name="back_message"]').val('');
			$('input[name="front_message"]').val($('#forfront').val());
			$('input[name="back_message"]').val($('#forback').val());
		}
	})
	
	.on('click', '#custom_wristband_color', function(){
		$('#modal-color-pantone').modal()
	})

	.on('click', '#custom_text_color', function(){
		$('#modal-color-text').modal()
	})

	.on('click', '.navbar-toggle', function(){
		$('.mobile-menu').addClass('slide-left');
	})

	.on('click', '.toggle-menu', function(){
		$('.mobile-menu').removeClass('slide-left');
	})

	// .on('click', 'input[type="radio"][value="continues"]', function(){
	// 	$('div#front-back-text-container').css('margin-top', '0');
	// })
	// .on('click', 'input[type="radio"][value="front_and_back"]', function(){
	// 	$('div#front-back-text-container').css('margin-top', '3.5em');
	// })

	//CONTINUOUS MESSAGE
	.on('click', 'input[type="radio"][value="continues"]', function(){
		$('div#figured_icon').css('float', 'right');
		$('div#figured_icon').css('left', 'auto');
		$('div#figured_icon').css('margin-top', '10px');
		$('div#figured_icon').css('right', '65px');
	})
	.on('click', 'input[type="radio"][value="front_and_back"]', function(){
		$('div#figured_icon').css('float', 'none');
		$('div#figured_icon').css('left', '33.5%');
	})

	.on('click', '.prod-open', function(){
		$('#product-open').addClass('open');
	})
        .on('change', '#selectFont', function(){
		var	font_value = $(this).val();
		var width = $('#width').val();
		$('.copy-preview-font').css('font-family', $(this).val() );
		$('.copy-preview-font-inside').css('font-family', $(this).val() );
                FontTextResize();
	});
    
 });

/**
 * resize front, back, continious, and inside messages with jquery textfill plugin
 * @returns null
 */        
function FontTextResize(){
                     resize_fm101();
                     resize_bm101();
                     resize_im101();
                     resize_cm101();
}

function resize_fm101(){
    jQuery('#jQTextFill_fm101').textfill({
                            //debug: true,
                            innerTag: "h3"
                        });
}
function resize_bm101(){
    jQuery('#jQTextFill_bm101').textfill({
                            //debug: true,
                            innerTag: "h3"
                        });
}
function resize_im101(){
    jQuery('#jQTextFill_Im101').textfill({
                            //debug: true,
                            innerTag: "h3"
                        });
}
function resize_cm101(){
    jQuery('#jQTextFill_Cm101').textfill({
                            //debug: true,
                            innerTag: "h3"
                        });
}

(function($) {
     $.fn.dropdown = function (option) {
	    return this.each(function () {
	      var $this = $(this)
	        , data = $this.data('dropdown')
	      if (!data) $this.data('dropdown', (data = new Dropdown(this)))
	      if (typeof option == 'string') data[option].call($this)
	    })
	  }
	  $.fn.dropdown.Constructor = Dropdown;
	  var toggle = '[data-toggle=dropdown]', 
	  Dropdown = function (element) {
        var $el = $(element).on('click.dropdown.data-api', this.toggle)
        $('html').on('click.dropdown.data-api', function () {
          $el.parent().removeClass('open')
        })
      }

	  Dropdown.prototype = {

	    constructor: Dropdown

	  , toggle: function (e) {
	      var $this = $(this)
	        , $parent
	        , isActive

	      if ($this.is('.disabled, :disabled')) return

	      $parent = getParent($this)

	      isActive = $parent.hasClass('open')

	      clearMenus()

	      if (!isActive) {
	        $parent.toggleClass('open')
	      }

	      $this.focus()

	      return false
	    }

	  , keydown: function (e) {
	      var $this
	        , $items
	        , $active
	        , $parent
	        , isActive
	        , index

	      if (!/(38|40|27)/.test(e.keyCode)) return

	      $this = $(this)

	      e.preventDefault()
	      e.stopPropagation()

	      if ($this.is('.disabled, :disabled')) return

	      $parent = getParent($this)

	      isActive = $parent.hasClass('open')

	      if (!isActive || (isActive && e.keyCode == 27)) {
	        if (e.which == 27) $parent.find(toggle).focus()
	        return $this.click()
	      }

	      $items = $('[role=menu] li:not(.divider):visible a', $parent)

	      if (!$items.length) return

	      index = $items.index($items.filter(':focus'))

	      if (e.keyCode == 38 && index > 0) index--                                        // up
	      if (e.keyCode == 40 && index < $items.length - 1) index++                        // down
	      if (!~index) index = 0

	      $items
	        .eq(index)
	        .focus()
	    }

	  }

	  function clearMenus() {
	    $(toggle).each(function () {
	      getParent($(this)).removeClass('open')
	    })
	  }

	  function getParent($this) {
	    var selector = $this.attr('data-target')
	      , $parent

	    if (!selector) {
	      selector = $this.attr('href')
	      selector = selector && /#/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
	    }

	    $parent = selector && $(selector)

	    if (!$parent || !$parent.length) $parent = $this.parent()

	    return $parent
	  }

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 991) {
	        $('input[type="radio"][value="continues"]').on('click', function() {
				$('.preview-desktop').css('bottom', '-1em');
				$('.message-select-desktop').css('margin-top', '1em');
			});
	    }
	});

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 991) {
	        $('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('.preview-desktop').css('bottom', '-4.5em');
				$('.message-select-desktop').css('margin-top', '4.5em');
			});
	    }
	 });

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 667) {
	        $('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('.message-select-desktop').css('margin-top', '5em');
			});
	    }
	});

	$(window).on('load', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 568) {
	        $('.col-preview h3').css('font-size', '8vw')
	    }
	});

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 480) {
	        $('input[type="radio"][value="continues"]').on('click', function() {
				$('.message-select-desktop').css('margin-top', '2em');
			});
	    }
	});

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 480) {
	        $('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('.message-select-desktop').css('margin-top', '5.5em');
			});
	    }
	});

	// //WRISTBAND IPAD LANDSCAPE
	$(window).on('load', function mobileViewUpdateNew() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 1199) {

			$('input[type="radio"][value="continues"]').on('click', function() {
				$('div#figured_icon').css('position', 'absolute');
				$('div#figured_icon').css('width', '15%');
				$('div#figured_icon').css('margin-right', '-0.5em');
				$('div#figured_icon a').css('display', 'inline-block');
				$('div#figured_icon a').css('width', '100%');
			});
	    }
	});
	$(window).on('load', function mobileViewUpdates() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 1199) {

			$('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('div#figured_icon').css('width', '12%');
				$('div#figured_icon').css('position', 'relative');
				$('div#figured_icon').css('margin-left', '2.2em');
			});
	    }
	});
	$(window).on('load', function mobileViewUpdates() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 1024) {

			$('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('div#figured_icon').css('margin-left', '1.6em');
			});
	    }
	});

	$(window).on('load', function mobileViewUpdates() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 991) {

			$('input[type="radio"][value="continues"]').on('click', function() {
				$('div#figured_icon').css('position', 'relative');
				$('div#figured_icon .alignright').css('float', 'none');
				$('div#figured_icon').css('margin-right', '0.5em');
				// $('.preview-desktop').css('bottom', '-4em');
			});
			$('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('div#figured_icon').css('width', 'auto');
			});
	    }
	});

	$(window).on('load', function mobileViewUpdates() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 640) {

	    	// $('div#figured_icon').css('left', '13%');

			$('input[type="radio"][value="continues"]').on('click', function() {
				$('div#figured_icon').css('position', 'absolute');
				$('div#figured_icon.button-box').css('left', 'auto');
				$('div#figured_icon').css('width', '11%');
			});

			$('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('div#figured_icon').css('width', '15%');
			});
	    }
	});



})(jQuery);


/**
 * @preserve  textfill
 * @name      jquery.textfill.js
 * @author    Russ Painter
 * @author    Yu-Jie Lin
 * @author    Alexandre Dantas
 * @version   0.6.0
 * @date      2014-08-19
 * @copyright (c) 2014 Alexandre Dantas
 * @copyright (c) 2012-2013 Yu-Jie Lin
 * @copyright (c) 2009 Russ Painter
 * @license   MIT License
 * @homepage  https://github.com/jquery-textfill/jquery-textfill
 * @example   http://jquery-textfill.github.io/jquery-textfill/index.html
 */
; (function($) {

	/**
	 * Resizes an inner element's font so that the
	 * inner element completely fills the outer element.
	 *
	 * @param {Object} options User options that take
	 *                         higher precedence when
	 *                         merging with the default ones.
	 *
	 * @return All outer elements processed
	 */
	$.fn.textfill = function(options) {

		// ______  _______ _______ _______ _     _        _______ _______
		// |     \ |______ |______ |_____| |     | |         |    |______
		// |_____/ |______ |       |     | |_____| |_____    |    ______|
        //
		// Merging user options with the default values

		var defaults = {
			debug            : false,
			maxFontPixels    : null,
			minFontPixels    : 4,
			innerTag         : 'span',
			widthOnly        : false,
			success          : null, // callback when a resizing is done
			callback         : null, // callback when a resizing is done (deprecated, use success)
			fail             : null, // callback when a resizing is failed
			complete         : null, // callback when all is done
			explicitWidth    : null,
			explicitHeight   : null,
			changeLineHeight : false
		};

		var Opts = $.extend(defaults, options);

		// _______ _     _ __   _ _______ _______ _____  _____  __   _ _______
		// |______ |     | | \  | |          |      |   |     | | \  | |______
		// |       |_____| |  \_| |_____     |    __|__ |_____| |  \_| ______|
		//
		// Predefining the awesomeness

		// Output arguments to the Debug console
		// if "Debug Mode" is enabled
		function _debug() {
			if (!Opts.debug
				||  typeof console       == 'undefined'
				||  typeof console.debug == 'undefined') {
				return;
			}
			console.debug.apply(console, arguments);
		}

		// Output arguments to the Warning console
		function _warn() {
			if (typeof console      == 'undefined' ||
				typeof console.warn == 'undefined') {
				return;
			}
			console.warn.apply(console, arguments);
		}

		// Outputs all information on the current sizing
		// of the font.
		function _debug_sizing(prefix, ourText, maxHeight, maxWidth, minFontPixels, maxFontPixels) {

			function _m(v1, v2) {

				var marker = ' / ';

				if (v1 > v2)
					marker = ' > ';

				else if (v1 == v2)
					marker = ' = ';

				return marker;
			}

			_debug(
				'[TextFill] '  + prefix + ' { ' +
				'font-size: ' + ourText.css('font-size') + ',' +
				'Height: '    + ourText.height() + 'px ' + _m(ourText.height(), maxHeight) + maxHeight + 'px,' +
				'Width: '     + ourText.width()  + _m(ourText.width() , maxWidth)  + maxWidth + ',' +
				'minFontPixels: ' + minFontPixels + 'px, ' +
				'maxFontPixels: ' + maxFontPixels + 'px }'
			);
		}

		/**
		 * Calculates which size the font can get resized,
		 * according to constrains.
		 *
		 * @param {String} prefix Gets shown on the console before
		 *                        all the arguments, if debug mode is on.
		 * @param {Object} ourText The DOM element to resize,
		 *                         that contains the text.
		 * @param {function} func Function called on `ourText` that's
		 *                        used to compare with `max`.
		 * @param {number} max Maximum value, that gets compared with
		 *                     `func` called on `ourText`.
		 * @param {number} minFontPixels Minimum value the font can
		 *                               get resized to (in pixels).
		 * @param {number} maxFontPixels Maximum value the font can
		 *                               get resized to (in pixels).
		 *
		 * @return Size (in pixels) that the font can be resized.
		 */
		function _sizing(prefix, ourText, func, max, maxHeight, maxWidth, minFontPixels, maxFontPixels) {

			_debug_sizing(
				prefix, ourText,
				maxHeight, maxWidth,
				minFontPixels, maxFontPixels
			);

			// The kernel of the whole plugin, take most attention
			// on this part.
			//
			// This is a loop that keeps increasing the `font-size`
			// until it fits the parent element.
			//
			// - Start from the minimal allowed value (`minFontPixels`)
			// - Guesses an average font size (in pixels) for the font,
			// - Resizes the text and sees if its size is within the
			//   boundaries (`minFontPixels` and `maxFontPixels`).
			//   - If so, keep guessing until we break.
			//   - If not, return the last calculated size.
			//
			// I understand this is not optimized and we should
			// consider implementing something akin to
			// Daniel Hoffmann's answer here:
			//
			//     http://stackoverflow.com/a/17433451/1094964
			//

			while (minFontPixels < (maxFontPixels - 1)) {

				var fontSize = Math.floor((minFontPixels + maxFontPixels) / 2);
				ourText.css('font-size', fontSize);

				if (func.call(ourText) <= max) {
					minFontPixels = fontSize;

					if (func.call(ourText) == max)
						break;
				}
				else
					maxFontPixels = fontSize;

				_debug_sizing(
					prefix, ourText,
					maxHeight, maxWidth,
					minFontPixels, maxFontPixels
				);
			}

			ourText.css('font-size', maxFontPixels);

			if (func.call(ourText) <= max) {
				minFontPixels = maxFontPixels;

				_debug_sizing(
					prefix + '* ', ourText,
					maxHeight, maxWidth,
					minFontPixels, maxFontPixels
				);
			}
			return minFontPixels;
		}

		// _______ _______ _______  ______ _______
		// |______    |    |_____| |_____/    |
		// ______|    |    |     | |    \_    |
        //
		// Let's get it started (yeah)!

		_debug('[TextFill] Start Debug');

		this.each(function() {

			// Contains the child element we will resize.
			// $(this) means the parent container
                        
			var ourText = $(Opts.innerTag + ':visible:first', this);

			// Will resize to this dimensions.
			// Use explicit dimensions when specified
                        //var f_sw = $('#FrontStartClipArt101').width();
                        //var f_ew = $('#FrontEndClipArt101').width();
			var maxHeight = Opts.explicitHeight || $(this).height();
			var maxWidth  = Opts.explicitWidth  || $(this).width();
                        //maxWidth = (maxWidth - f_sw);
                        //maxWidth = (maxWidth - f_ew);
                        
			var oldFontSize = ourText.css('font-size');

			var lineHeight  = parseFloat(ourText.css('line-height')) / parseFloat(oldFontSize);

			_debug('[TextFill] Inner text: ' + ourText.text());
			_debug('[TextFill] All options: ', Opts);
			_debug('[TextFill] Maximum sizes: { ' +
				   'Height: ' + maxHeight + 'px, ' +
				   'Width: '  + maxWidth  + 'px' + ' }'
				  );

			var minFontPixels = Opts.minFontPixels;

			// Remember, if this `maxFontPixels` is negative,
			// the text will resize to as long as the container
			// can accomodate
			var maxFontPixels = (Opts.maxFontPixels <= 0 ?
								 maxHeight :
								 Opts.maxFontPixels);


			// Let's start it all!

			// 1. Calculate which `font-size` would
			//    be best for the Height
			var fontSizeHeight = undefined;

			if (! Opts.widthOnly)
				fontSizeHeight = _sizing(
					'Height', ourText,
					$.fn.height, maxHeight,
					maxHeight, maxWidth,
					minFontPixels, maxFontPixels
				);

			// 2. Calculate which `font-size` would
			//    be best for the Width
			var fontSizeWidth = undefined;

			fontSizeWidth = _sizing(
				'Width', ourText,
				$.fn.width, maxWidth,
				maxHeight, maxWidth,
				minFontPixels, maxFontPixels
			);

			// 3. Actually resize the text!

			if (Opts.widthOnly) {
				ourText.css({
					'font-size'  : fontSizeWidth,
					'white-space': 'nowrap'
				});

				if (Opts.changeLineHeight)
					ourText.parent().css(
						'line-height',
						(lineHeight * fontSizeWidth + 'px')
					);
			}
			else {
				var fontSizeFinal = Math.min(fontSizeHeight, fontSizeWidth);

				ourText.css('font-size', fontSizeFinal);

				if (Opts.changeLineHeight)
					ourText.parent().css(
						'line-height',
						(lineHeight * fontSizeFinal) + 'px'
					);
			}

			_debug(
				'[TextFill] Finished { ' +
				'Old font-size: ' + oldFontSize              + ', ' +
				'New font-size: ' + ourText.css('font-size') + ' }'
			);

			// Oops, something wrong happened!
			// We weren't supposed to exceed the original size
			if ((ourText.width()  > maxWidth) ||
				(ourText.height() > maxHeight && !Opts.widthOnly)) {

				ourText.css('font-size', oldFontSize);

				// Failure callback
				if (Opts.fail)
					Opts.fail(this);

				_debug(
					'[TextFill] Failure { ' +
					'Current Width: '  + ourText.width()  + ', ' +
					'Maximum Width: '  + maxWidth         + ', ' +
					'Current Height: ' + ourText.height() + ', ' +
					'Maximum Height: ' + maxHeight        + ' }'
				);
			}
			else if (Opts.success) {
				Opts.success(this);
			}
			else if (Opts.callback) {
				_warn('callback is deprecated, use success, instead');

				// Success callback
				Opts.callback(this);
			}
		});

		// Complete callback
		if (Opts.complete)
			Opts.complete(this);

		_debug('[TextFill] End Debug');
		return this;
	};

})(window.jQuery);
