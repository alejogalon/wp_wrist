
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
				
				$(this).append('<span class="badge">✓</span>');
				$('#pantonTracker').attr('data-1', colorName);
				$('#pantonTracker').attr('color-1', colorVal);
				$('#PTCName1').val(colorName);
				$(this).attr('data-select', '1');
				$("#addPantoneColor").trigger("click");

			}else if(item == 'Segmented' || item == 'Swirl'){

				if(c1 == false) {

					$(this).append('<span class="badge">✓</span>');
				 	$('#pantonTracker').attr('data-1', colorName);
				 	$('#pantonTracker').attr('color-1', colorVal);
				 	$('#PTCName1').val(colorName);
				 	$('#PTCName1').css('background-color',colorVal)
				 	$(this).attr('data-select', '1');

				}else if(c2 == false){

				 	$(this).append('<span class="badge">✓</span>');
				 	$('#pantonTracker').attr('data-2', colorName);
				 	$('#pantonTracker').attr('color-2', colorVal);
				 	$('#PTCName2').val(colorName);
				 	$('#PTCName2').css('background-color',colorVal);
				 	$(this).attr('data-select', '2');

				}else if(c3 == false){

				 	$(this).append('<span class="badge">✓</span>');
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
			li+='<li class="color-enabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="'+colorNames+'">';
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
				li+='<li class="color-enabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="'+colorNames+'">';
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

		$(this).append('<span class="badge">✓</span>');
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
        switch (val) {
            case 'Imprinted':
                var cssVal = "0 0 0";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            case 'Debossed':
                var cssVal = "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)";
                
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            case 'Embossed':
                var cssVal = "-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            case 'Emboss-Printed':
                var cssVal = "-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            case 'Deboss-Fill':
                var cssVal = "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            case 'Dual Layer':
                var cssVal = "-1px -1px 0px rgba(255,255,255,0.3), 1px 1px 0px rgba(0,0,0,0.8)";
                $('.col-front').css('textShadow', "0 0 0");
                $('.col-back').css('textShadow', "0 0 0");
                $('.col-inside').css('textShadow', cssVal);
                break;
            default:
                var cssVal = "0 0 0";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
        }

        if( val == 'Blank'){
                	$('.front-msg-text').css('display','none');
		    		$('.back-msg-text').css('display','none');
		    		$('.inside-msg-text').css('display','none');  
		    		$('.full-msg-text').css('display','none');

		    		$('input[name="front_message"]').val('');
		    		$('input[name="back_message"]').val('');
		    		$('input[name="continues_message"]').val('');
		    		$('input[name="inside_message"]').val('');
		    		$('input[name="selectFont"]').val('Select Font');
		    		$('input[name="selectFont"]').css('font-family','Arial');

		    		$('input[name="front_message"]').prop( "disabled", true );
		    		$('input[name="back_message"]').prop( "disabled", true );
		    		$('input[name="continues_message"]').prop( "disabled", true );
		    		$('input[name="inside_message"]').prop( "disabled", true );
		    		$('input[name="selectFont"]').prop( "disabled", true );

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
			case '1.5':
		    	wtext.css('height', '130px');
		    	bg.css('height', '130px');

		    	if ( typeof $('#fm101').attr('data-font-length') == 'undefined') {
		    		$('.front-msg-text').css('font-size','80px');
		    	}
		    	if ( typeof $('#bm101').attr('data-font-length') == 'undefined') {
		    		$('.back-msg-text').css('font-size','80px');
		    	}
		    	if ( typeof $('#Im101').attr('data-font-length') == 'undefined') {
		    		$('.inside-msg-text').css('font-size','100px');  
		    	}
		    	if ( typeof $('#Cm101').attr('data-font-length') == 'undefined') {
		    		$('.full-msg-text').css('font-size','100px');
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
		        $('#box_figured').hide();
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

	function colordisplay(){
		var color = $('#wristband-color-items .color-wrap.selected').find('div').data('color');
		var textcolor = $('#wristband-text-color .color-wrap.selected').find('div').data('color');
		var color_type = $('#wdisplay101').attr('color-type');
		var message_type = $('input[name="message_type"]:checked').val();
		var style = $('#style option:selected').text();

		$('.fig-left').css({'background-color': ''});
		$('.fig-center').css({'background-color': ''});
		$('.fig-right').css({'background-color': ''});
		$('#box_figured').css('background-color', ''); 
		$('.seg-left').css({'background-color':''});
		$('.seg-center').css({'background-color':''});
		$('.seg-right').css({'background-color':''});

		if ( typeof color != 'undefined' ) {
			switch(color_type) {
				    case 'Segmented':
			    		$('.swirlcolor').hide();			    	
				    	var colors = color.split(',');
				    	if (colors.length == 2) {

				    				console.log(colors[1]);
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
				        // console.log(color);
				        	if (colors.length == 2) {

				        // 			$('.fig-left').css({
					    			// 	'background-color': colors[0],
					    			// 	'width': '25%',
					    			// 	'border-top-left-radius': '5px', 
					    			// 	'border-bottom-left-radius': '5px'
						    		// });
						    		// $('.fig-center').css({
						    		// 	'background-color': colors[1],
					    			// 	'width' : '50%',
					    			// 	'left' : '25%'
						    		// });
						    		// $('.fig-right').css({
						    		// 	'background-color': colors[0],
					    			// 	'width' : '21.3%',
					    			// 	'left' : '75%',
					    			// 	'border-top-right-radius': '5px', 
					    			// 	'border-bottom-right-radius': '5px'
						    		// });
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

						}else{

							$('#front-back-text-container').css('background-color', color);
							$('#inside-text-container').css('background-color', color);
							$('#full-text-container').css('background-color', color);
							$('#figured-container').css('background-color', color);
							$('#box_figured').css('background-color', color);
						}
		}
	}

}

function colortable(color,color_type){
		var message_type = $('input[name="message_type"]:checked').val();
		var style = $('#style option:selected').text();
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
				    	$('#front-back-text-container').css('background-color', color);
						$('#inside-text-container').css('background-color', color);
						$('#full-text-container').css('background-color', color);
						$('#figured-container').css('background-color', color);
						$('#box_figured').css('background-color', color);
		}
	}

}

	var prev_color_type = $('input[name="color_style"]:checked').val();
	$('#prev_color').val($('input[name="color_style"]:checked').val());
	//bandtextpathcont1
	$(document)
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
	})
	.on('click', '.color-box', function(){
		var bandcolor = $('#wristband-color-items .color-wrap.selected').find('div').data('color');
		var color 		= $(this).find('div').attr('data-color');
		var color_name  = $(this).find('div').attr('data-name');
		var message_type = $('input[name="message_type"]:checked').val();
		var SetColor = $('#wristband-text-color div.selected').find('div').data('color');
		var color_type = $('#wdisplay101').attr('color-type');
		var checkColorFor = $(this).closest('ul').closest('div').attr('id');
		var style = $('#style option:selected').text();

		if ( typeof checkColorFor != 'undefined' ) {
			if ( checkColorFor == 'wristband-text-color' ) {

				if (style == 'Dual Layer'){

					$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',color);
					$('.copy-preview-clipart').css('color', color );
					$('#front-back-text-container').css('background-color', bandcolor);
					//$('#inside-text-container').css('background-color', color);
					$('#full-text-container').css('background-color', bandcolor);
					$('#figured-container').css('background-color', bandcolor);

				}else{
					$('.copy-preview-font').css('color', color );
					//$('.copy-preview-font-inside').css('color',color);
					$('.copy-preview-clipart').css('color', color );
				}

			} else if( checkColorFor == 'wristband-inside-item' ) {

				if (style == 'Dual Layer'){

					$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',color);
					$('.copy-preview-clipart').css('color', color );
					//$('#front-back-text-container').css('background-color', bandcolor);
					$('#inside-text-container').css('background-color', color);
					$('#full-text-container').css('background-color', bandcolor);
					$('#figured-container').css('background-color', bandcolor);

				}else{
					//$('.copy-preview-font').css('color', color );
					$('.copy-preview-font-inside').css('color',color);
					$('.copy-preview-clipart').css('color', color );
				}

			}else {
				colordisplay();
			}
		}

		//if (SetColor != undefined){
		//
		//} else {
		//		$('.copy-preview-font').css('color', 'rgba(255, 255, 255, 0.2)' );
		//		$('.copy-preview-font-inside').css('color', 'rgba(255, 255, 255, 0.2)' );
		//		$('.copy-preview-clipart').css('color', 'rgba(255, 255, 255, 0.2)' );
		//}
	})
	.on('change', 'select[name="style"]', function(){
		var textStyle = $('#style option:selected').text();
		if(textStyle == 'Dual Layer'){
			ChangefontDesign(textStyle);
			$('ul#wbcolor li a#solid').click();
			$('#wbcolor').click();
		}else {
			ChangefontDesign(textStyle);
		}
		
	})

	.on('click', '#wbcolor', function(){
		var front  = $('#front-back-text-container');
		var inside = $('#inside-text-container');
		var wrap  = $('#full-text-container');
		var message_type = $('input[name="message_type"]:checked').val();
		var prev_color = $('#prev_color').val();
		var color_type = $('input[name="color_style"]:checked').val();
		//add attr for color-type
		$('#wdisplay101').attr('color-type', color_type);
		containerdisplay();
		if(prev_color == color_type){
			
		} else {
			$('#wristband-color-items .color-wrap').removeClass('selected');
		}
		colordisplay();
		

	})

	.on('click', '.color-added', function (e) {
                    //milbert
                    console.log('aqdsjkahsahsahsjkladhsjklahsjkladshajksdhajklsdhajklsdhajklsdhajks')
                    var SelectedColor = $(this).find('div').data('color'),
                            StyleDColor = $(this).attr('data-W_type');
                      colortable(SelectedColor,StyleDColor);
         })

	.on('change', '#width', function(){;
		FontInit();
	})
	.on('keyup paste','#front_message', function( event ){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		if ( $(this).val() == '' ) {
			if ( typeof event.which == 'undefined' ) {
				$('#fm101').text('Front Message');
			} else {
				$('#fm101').text( $(this).val() );
			}
		} else {
			$('#fm101').text( $(this).val() );
			$('#fm101').checkFontWidth( 'front-msg-text' );
		}
	})
	.on('keyup paste','#back_message', function( event ){
		if ( $(this).val() == '' ) {
			if ( typeof event.which == 'undefined' ) {
				$('#bm101').text('Back Message');
			} else {
				$('#bm101').text( $(this).val() );
			}
		} else {
			$('#bm101').text( $(this).val() );
			$('#bm101').checkFontWidth( 'back-msg-text' );
		}
	})
	.on('keyup paste','#inside_message', function( event ){
		if ( $(this).val() == '' ) {
			if ( typeof event.which == 'undefined' ) {
				$('#Im101').text('Inside Message');
			} else {
				$('#Im101').text( $(this).val() );
			}
		} else {
			$('#Im101').text( $(this).val() );
			$('#Im101').checkFontWidth( 'inside-msg-text' );
		}
	})
	.on('keyup paste','#continues_message', function( event ){
		if ( $(this).val() == '' ) {
			if ( typeof event.which == 'undefined' ) {
				$('#Cm101').text('Continuous Message');
			} else {
				$('#Cm101').text( $(this).val() );
			}
		} else {
			$('#Cm101').text( $(this).val() );
			$('#Cm101').checkFontWidth( 'full-msg-text' );
		}
	})
	.on('change', '#selectFont', function(){
		$('.copy-preview-font').css('font-family', $(this).val() );
		$('.copy-preview-font-inside').css('font-family', $(this).val() );
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
	})
	.on('change', '#selectFont', function(){
		$('#fm101').checkFontWidth( 'front-msg-text' );
		$('#bm101').checkFontWidth( 'back-msg-text' );
		$('#Im101').checkFontWidth( 'inside-msg-text' );
		$('#Cm101').checkFontWidth( 'full-msg-text' );


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

});

(function($) {
	$.fn.checkFontWidth = function( cls ){
    	var con_w   = $(this).closest('.col-preview')[0].offsetWidth;
    	var text_w  = "";
    	switch(cls){
    		case 'front-msg-text' :
    			text_w  = $(this)[0].offsetWidth + $('#FrontStartClipArt101').width() + $('#FrontEndClipArt101').width();
    		break;
    		case 'back-msg-text' :
    			text_w  = $(this)[0].offsetWidth + $('#BackStartClipArt101').width() + $('#BackEndClipArt101').width();
    		break;
    		case 'inside-msg-text' :
    			text_w  = $(this)[0].offsetWidth + $('#InsideStartClipArt101').width() + $('#InsideEndClipArt101').width();
    		break;
    		case 'full-msg-text' :
    			text_w  = $(this)[0].offsetWidth + $('#FullStartClipArt101').width() + $('#FullEndClipArt101').width();
    		break;
    	}
    	// var fs = $('#fontCM').val();
    	var fs = $(this).attr( 'fontCM' );
		if( typeof fs == "undefined" ){
			var whight = $('#width').val();
			// console.log('y');
			switch(whight) {

						case '1.5':
					    	// $('body').append('<input type="hidden" id="fontCM" value="90">');
					    	$(this).attr( 'fontCM', '90' );
					        break;
					    case '1':
					    	// $('body').append('<input type="hidden" id="fontCM" value="70">');
					    	$(this).attr( 'fontCM', '70' );
					        break;
					    case '3/4':
					    	// $('body').append('<input type="hidden" id="fontCM" value="60">');
					    	$(this).attr( 'fontCM', '60' );
					        break;
					    case '1/2':
					    	// $('body').append('<input type="hidden" id="fontCM" value="50">');
					    	$(this).attr( 'fontCM', '50' );
					        break;
					    case '1/4':
					    	// $('body').append('<input type="hidden" id="fontCM" value="40">');
					    	$(this).attr( 'fontCM', '40' );
					        break;
					}
		}
		
		con_w = con_w - $('#FrontStartClipArt101').width() - $('#FrontEndClipArt101').width();
		// console.log( cls +': '+ con_w +' - '+ text_w );
    	if ( con_w < ( text_w + 20 ) && $(this).text().length > 0 ) {
    		// var fontSize = $('#fontCM').val();
    		var fontSize = $(this).attr( 'fontCM' );
			var theFont = fontSize - ( fontSize * 0.1 );
			// var theFont = fontSize - 1;
			// $('#fontCM').val(theFont);
			$(this).attr( 'fontCM', theFont );
			$('.'+cls ).css('font-size', theFont+'px' );
			// console.log(theFont);
			// $(this).closest('.col-preview')[0].offsetWidth = con_w - 10;

			var lenfsize = $(this).text().length+':'+fontSize;
			var dfl = $(this).attr('data-font-length');

			if ( typeof dfl != 'undefined' ) {
				dfl = dfl+','+lenfsize;
			} else {
				dfl = lenfsize;
			}

			if ($(this).text().length > 0) {
				$(this).attr( 'data-font-length', dfl );
			}

    	} else {
    		var dfl = $(this).attr('data-font-length');
	    	if ( typeof dfl != 'undefined' ) {
	    		var x = dfl.split(',');
	    		// console.log(x);
	    		var count = x.length;
	    		var v = x[count - 1].split(':');
	    		var fcnt = v[0];
	    		// console.log("0= "+count);
	    		// if ( count == 1 && $(this).text().length <= fcnt ) {
	    		if ( count == 1 ) {
					// $('.'+cls ).css('font-size', '30px' );
					// $('#width').trigger('change');
					// FontInit();	
				// added for font
					var whight = $('#width').val();
					switch(whight) {
						case '1.5':
					    	$('.'+cls ).css('font-size','90px');
					    	// $('#fontCM').val('90');
					    	$(this).attr( 'fontCM', '90' );
					    	$('.copy-display-inline').css('line-height','130px');
					        break;
					    case '1':
					    	$('.'+cls ).css('font-size','70px');
					    	// $('#fontCM').val('70');
					    	$(this).attr( 'fontCM', '70' );
					    	$('.copy-display-inline').css('line-height','90px');
					        break;
					    case '3/4':
					    	$('.'+cls ).css('font-size','60px');
					    	// $('#fontCM').val('60');
					    	$(this).attr( 'fontCM', '60' );
					    	$('.copy-display-inline').css('line-height','70px');
					        break;
					    case '1/2':
					    	$('.'+cls ).css('font-size','50px');
					    	// $('#fontCM').val('50');
					    	$(this).attr( 'fontCM', '50' );
					    	$('.copy-display-inline').css('line-height','50px');
					        break;
					    case '1/4':
					    	$('.'+cls ).css('font-size','40px');
					    	// $('#fontCM').val('40');
					    	$(this).attr( 'fontCM', '40' );
					    	$('.copy-display-inline').css('line-height','30px');
					        break;
					}
					$(this).attr( 'data-font-length', '' );
	    		} else if ( count > 1 && $(this).text().length <= fcnt ) {
	    			// $('#fontCM').val(v[1]);
	    			$(this).attr( 'fontCM', v[1] );
					$('.'+cls ).css('font-size', v[1]+'px' );

					var ndfl;
		    		for ( var i = 0; i < count-1; i++ ) {
		    			if ( i == 0 ) {
		    				ndfl = x[i];
		    			} else {
		    				ndfl = ndfl+','+x[i];
		    			}
		    		}
		    		// console.log(cls+' - '+ndfl);
		    		$(this).attr( 'data-font-length', ndfl );
	    		}
    		}
    	}

    	


    }

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
				$('div#front-back-text-container').css('margin-top', '0');
			});
	    }
	});

	$(window).on('load, resize', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 991) {
	        $('input[type="radio"][value="front_and_back"]').on('click', function() {
				$('div#front-back-text-container').css('margin-top', '3.5em');
			});
	    }
	});

	$(window).on('load', function mobileViewUpdate() {
	    var viewportWidth = $(window).width();
	    if (viewportWidth < 568) {
	        $('.col-preview h3').css('font-size', '8vw')
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

	    	$('div#figured_icon').css('left', '13%');

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