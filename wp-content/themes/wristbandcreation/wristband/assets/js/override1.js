


jQuery(document).ready(function ($) {


	function ChangefontDesign(val) {
		console.log(val)
        switch (val) {
            case 'Imprinted':
                var cssVal = "0 0 0";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            case 'Debossed':
                //$("#bandtext").css({textShadow: "0 1.5px 0 black"});
                console.log('dasd');
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
                //$("#bandtext").css({textShadow: "0 1.5px 0 black"});
                console.log('dasd');
                // var cssVal = "0 1px 5px rgb(88,92,42), 0 -1px 0 rgba(0,0,0,1), 0 -3px 0 rgba(0,0,0,0.45), 0 1px 0 rgba(255,255,255,0.5), 0 2px 2px rgba(255,255,255,0.2)";
                var cssVal = "-1px 1px 0px rgba(255, 255, 255, 0.2), 1px -1px 0px rgba(0,0,0,0.25)";
                // var cssVal = "0px -1px 1px black";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
            default:
                var cssVal = "0 0 0";
                $('.col-front').css('textShadow', cssVal);
                $('.col-back').css('textShadow', cssVal);
                $('.col-inside').css('textShadow', cssVal);
                break;
        }
    }



	function FontInit(){
		var whight = $('#width').val();
		var wtext  = $('.col-preview');
		var bg = $('.segd');
		console.log(whight);
		// .col-preview
		switch(whight) {
		    case '1':
		    	wtext.css('height', '80px');
		    	bg.css('height', '80px');
		    	$('.front-msg-text').css('font-size','80px');
		    	$('.back-msg-text').css('font-size','80px');
		    	$('.inside-msg-text').css('font-size','80px');  
		    	$('.full-msg-text').css('font-size','80px');
		        break;
		    case '3/4':
		        wtext.css('height', '70px');
		    	bg.css('height', '70px');
		    	$('.front-msg-text').css('font-size','70px');
		    	$('.back-msg-text').css('font-size','70px');
		    	$('.inside-msg-text').css('font-size','70px');
		    	$('.full-msg-text').css('font-size','70px');
		        break;
		    case '1/2':
		        wtext.css('height', '60px');
		    	bg.css('height', '60px');
		    	$('.front-msg-text').css('font-size','60px');
		    	$('.back-msg-text').css('font-size','60px');
		    	$('.inside-msg-text').css('font-size','60px');
		    	$('.full-msg-text').css('font-size','60px');
		        break;
		    case '1/4':
		        wtext.css('height', '50px');
		    	bg.css('height', '50px');
		    	$('.front-msg-text').css('font-size','50px');
		    	$('.back-msg-text').css('font-size','50px');
		    	$('.inside-msg-text').css('font-size','50px');
		    	$('.full-msg-text').css('font-size','50px');
		        break;
		}
	}
	function containerdisplay(){
		var color_type = $('input[name="color_style"]:checked').val()
		switch(color_type) {
		    case 'Segmented':
		    	$('.seg').show();
		    	$('.swirlcolor').hide();
		        break;
		    case 'Solid':
		        $('.seg').hide();
		    	$('.swirlcolor').hide();
		        break;
		    case 'Swirl':
		        $('.seg').hide();
		        $('.swirlcolor').show();
		        break;
		    case 'Glow':
		        $('.seg').hide();
		    	$('.swirlcolor').hide();
		        break;
		    default :
		    	$('.seg').hide();
		    	$('.swirlcolor').hide();
		}
	}

	function colordisplay(){
		var color = $('#wristband-color-items .color-wrap.selected').find('div').data('color');
		var color_type = $('#wdisplay101').attr('color-type');
		var message_type = $('input[name="message_type"]:checked').val();
		var style = $('#style option:selected').text();
		console.log(style);
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
				        // console.log('swil')
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
	//bandtextpathcont1
	$(document)
	.on('keyup paste', '#continues_message', function(){
		// $('#bandtextpathcont1').css('font-size', '20px');
		// $('#bandtextpathcont2').css('font-size', '20px');

		 // var input = $('#continues_message').val().length;
		 // console.log( $('#bandtextpathcont1') );
		 // console.log( $('#bandtextpathcont1')[0].offsetWidth );
		 //280
		 var textwitdh = $('#bandtextpathcont1')[0].offsetWidth;
		 var textwitdh2 = $('#bandtextpathcont2')[0].offsetWidth;

		 

		 if ( textwitdh > 260 && textwitdh2 > 260) {

            $('#bandtextpath1')[0].setAttribute('startOffset', '0%');
            $('#bandtext1')[0].setAttribute('text-anchor', 'start');
            $('#bandtext1')[0].setAttribute('letter-spacing', '2px');
		 	
			var fontSize = $('#fontCM').val();

			var theFont = fontSize - ( fontSize * 0.3 );

			$('#bandtextpathcont1').css('font-size', theFont+'px' );
			$('#bandtextpathcont2').css('font-size', theFont+'px' );
			$('#fontCM').val(theFont);
			console.log('font: '+theFont);
			// do {
	   
		 // 		// $('#bandtextpathcont1').css('font-size', '15px');
			// 	// $('#bandtextpathcont2').css('font-size', '15px');
			// 	var tx = $('#bandtextpathcont1')[0].offsetWidth;
			// 	var tx2 = $('#bandtextpathcont2')[0].offsetWidth;

			// 	for (var i = 1; i >= 2; i++) {
			// 		var el = document.getElementById('bandtextpathcont'+i);

			// 		var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
			// 		var fontSize = parseFloat(style); 
			// 		// now you have a proper float for the font size (yes, it can be a float, not just an integer)
			// 		$('#bandtextpathcont1').css('font-size', fontSize-1 );
			// 		$('#bandtextpathcont2').css('font-size', fontSize-1 );
			// 	}

   //      	} while ( tx > 270 && tx2 > 270 );

			$('#bandtextpathcont1')[0].setAttribute('textLength', '260');
			$('#bandtextpathcont2')[0].setAttribute('textLength', '260'); 
		 }
	})
	.on('click', '.color-box', function(){
		var color 		= $(this).find('div').attr('data-color');
		var color_name  = $(this).find('div').attr('data-name');
		var message_type = $('input[name="message_type"]:checked').val();

		var color_type = $('#wdisplay101').attr('color-type');
		var checkColorFor = $(this).closest('ul').closest('div').attr('id');
		console.log(checkColorFor);
		if ( typeof checkColorFor != 'undefined' ) {
			if ( checkColorFor == 'wristband-text-color' ) {
				$('.copy-preview-font').css('color', color );
				$('.copy-preview-clipart').css('color', color );
			} else {
				colordisplay();
		}
		}
	})
	.on('change', 'select[name="style"]', function(){
		console.log('what?');
		var textStyle = $('#style option:selected').text();
		console.log(textStyle);
		ChangefontDesign(textStyle);
	})

	.on('click', '#wbcolor', function(){

		var front  = $('#front-back-text-container');
		var inside = $('#inside-text-container');
		var wrap  = $('#full-text-container');
		var message_type = $('input[name="message_type"]:checked').val();

		var color_type = $('input[name="color_style"]:checked').val();
		//add attr for color-type
		$('#wdisplay101').attr('color-type', color_type);
		containerdisplay();
		colordisplay();
	})



	.on('change', '#width', function(){
		FontInit();
	})
	.on('keyup paste','#front_message', function( event ){

		if ( typeof event.which != 'undefined' ) {
			$('#fm101').text( $(this).val() );
			$('#fm101').checkFontWidth( 'front-msg-text' );
		} else {
			$('#fm101').text('Front Message');
		}
	})
	.on('keyup paste','#back_message', function( event ){
		if ( typeof event.which != 'undefined' ) {
			$('#bm101').text( $(this).val() );
			$('#bm101').checkFontWidth( 'back-msg-text' );
		} else {
			$('#bm101').text('Back Message');
		}
	})
	.on('keyup paste','#inside_message', function( event ){
		if ( typeof event.which != 'undefined' ) {
			$('#Im101').text( $(this).val() );
			$('#Im101').checkFontWidth( 'inside-msg-text' );
		} else {
			$('#Im101').text('Inside Message');
		}
	})
	.on('keyup paste','#continues_message', function( event ){
		if ( typeof event.which != 'undefined' ) {
			$('#Cm101').text( $(this).val() );
			$('#Cm101').checkFontWidth( 'full-msg-text' );
		} else {
			$('#Cm101').text('Continuous Message');
		}
	})
	.on('change', '#selectFont', function(){
		$('.copy-preview-font').css('font-family', $(this).val() );
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
	})
	.on('click', '.btn-custom-color', function(){
		$('#modal-color-pantone').modal()
	})
});

(function($) {
	$.fn.checkFontWidth = function( cls ){
    	var con_w   = $(this).closest('.col-preview')[0].offsetWidth;
    	var text_w  = $(this)[0].offsetWidth + $('#FrontStartClipArt101').width() + $('#FrontEndClipArt101').width();
    	
    	var fs = $('#fontCM').val();
		if( typeof fs == "undefined" ){
			var whight = $('#width').val();
			switch(whight) {
					    case '1':
					    	$('body').append('<input type="hidden" id="fontCM" value="70">');
					        break;
					    case '3/4':
					    	$('body').append('<input type="hidden" id="fontCM" value="60">');
					        break;
					    case '1/2':
					    	$('body').append('<input type="hidden" id="fontCM" value="50">');
					        break;
					    case '1/4':
					    	$('body').append('<input type="hidden" id="fontCM" value="40">');
					        break;
					}
		}
		
		con_w = con_w - $('#FrontStartClipArt101').width() - $('#FrontEndClipArt101').width();
		// console.log( cls +': '+ con_w +' - '+ text_w );
    	if ( con_w < ( text_w + 30 ) && $(this).text().length > 0 ) {
    		var fontSize = $('#fontCM').val();
			var theFont = fontSize - ( fontSize * 0.1 );
			// var theFont = fontSize - 1;
			$('#fontCM').val(theFont);
			$('.'+cls ).css('font-size', theFont+'px' );
			console.log(theFont);
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
	    		console.log(x);
	    		var count = x.length;
	    		var v = x[count - 1].split(':');
	    		var fcnt = v[0];

	    		if ( count == 1 && $(this).text().length <= fcnt ) {
	    			console.log('here');
	    			
					// $('.'+cls ).css('font-size', '30px' );
					// $('#width').trigger('change');
					// FontInit();	
				// added for font
					var whight = $('#width').val();					
					switch(whight) {
					    case '1':
					    	$('.front-msg-text').css('font-size','70px');
					    	$('.back-msg-text').css('font-size','70px');
					    	$('.inside-msg-text').css('font-size','70px');
					    	$('.full-msg-text').css('font-size','70px');
					    	$('#fontCM').val('70');
					    	$('.copy-display-inline').css('line-height','80px');
					        break;
					    case '3/4':
					    	$('.front-msg-text').css('font-size','60px');
					    	$('.back-msg-text').css('font-size','60px');
					    	$('.inside-msg-text').css('font-size','60px');
					    	$('.full-msg-text').css('font-size','60px');
					    	$('#fontCM').val('60');
					    	$('.copy-display-inline').css('line-height','70px');
					        break;
					    case '1/2':
					    	$('.front-msg-text').css('font-size','50px');
					    	$('.back-msg-text').css('font-size','50px');
					    	$('.inside-msg-text').css('font-size','50px');
					    	$('.full-msg-text').css('font-size','50px');
					    	$('#fontCM').val('50');
					    	$('.copy-display-inline').css('line-height','60px');
					        break;
					    case '1/4':
					    	$('.front-msg-text').css('font-size','40px');
					    	$('.back-msg-text').css('font-size','40px');
					    	$('.inside-msg-text').css('font-size','40px');
					    	$('.full-msg-text').css('font-size','40px');
					    	$('#fontCM').val('40');
					    	$('.copy-display-inline').css('line-height','50px');
					        break;
					}


					$(this).attr( 'data-font-length', '' );
	    		} else if ( count > 1 && $(this).text().length <= fcnt ) {
	    			$('#fontCM').val(v[1]);
					$('.'+cls ).css('font-size', v[1]+'px' );

					var ndfl;
		    		for ( var i = 0; i < count-1; i++ ) {
		    			if ( i == 0 ) {
		    				ndfl = x[i];
		    			} else {
		    				ndfl = ndfl+','+x[i];
		    			}
		    		}
		    		console.log(ndfl);
		    		$(this).attr( 'data-font-length', ndfl );
	    		}
    		}
    	}

    	


    }

})(jQuery);