jQuery(document).ready(function ($) {

$(document)
	
	.on('change', '#selectFont', function(){
		var	font_value = $(this).val();
		var width = $('#width').val();
		$('.copy-preview-font').css('font-family', $(this).val() );
		$('.copy-preview-font-inside').css('font-family', $(this).val() );

		switch(font_value) {

			case 'WoodShop':
				
				if (width == "1/4") {
					$('#bm101').css('line-height','35px');
					$('#Im101').css('line-height','35px');
					$('#Cm101').css('line-height','34px');
				} else if (width == "1/2") {
					$('#fm101').css('line-height','60px');
					$('#bm101').css('line-height','60px');
					$('#Im101').css('line-height','60px');
					$('#Cm101').css('line-height','60px');
				} else if (width == "3/4") {
					$('#fm101').css({
					    				'line-height': '80px',
					    				'font-size': '60px'
						    		});
					$('#bm101').css({
					    				'line-height': '80px',
					    				'font-size': '60px'
						    		});
					$('#Im101').css({
					    				'line-height': '80px',
					    				'font-size': '60px'
						    		});
					$('#Cm101').css({
					    				'line-height': '80px',
					    				'font-size': '60px'
						    		});
				} else if (width == "1") {
					$('#fm101').css({
					    				'line-height': '90px',
					    				'font-size': '65px'
						    		});
					$('#bm101').css({
					    				'line-height': '90px',
					    				'font-size': '65px'
						    		});
					$('#Im101').css({
					    				'line-height': '90px',
					    				'font-size': '65px'
						    		});
					$('#Cm101').css({
					    				'line-height': '90px',
					    				'font-size': '65px'
						    		});
				}
				break;

			case 'WoodWarrior':

				if (width == "1") {
					$('#fm101').css({
					    				'font-size': '50px'
						    		});
					$('#bm101').css({
					    				'font-size': '50px'
						    		});
					$('#Im101').css({
					    				'font-size': '50px'
						    		});
					$('#Cm101').css({
					    				'font-size': '50px'
						    		});
				} else if (width == "3/4") {
					$('#fm101').css({
					    				'font-size': '50px'
						    		});
					$('#bm101').css({
					    				'font-size': '50px'
						    		});
					$('#Im101').css({
					    				'font-size': '50px'
						    		});
					$('#Cm101').css({
					    				'font-size': '50px'
						    		});
				} else if (width == "1/2") {
					$('#fm101').css({
					    				'font-size': '46px'
						    		});
					$('#bm101').css({
					    				'font-size': '46px'
						    		});
					$('#Im101').css({
					    				'font-size': '46px'
						    		});
					$('#Cm101').css({
					    				'font-size': '46px'
						    		});
				} else if (width == "1/4") {
					$('#fm101').css({
					    				'font-size': '27px'
						    		});
					$('#bm101').css({
					    				'font-size': '27px'
						    		});
					$('#Im101').css({
					    				'font-size': '27px'
						    		});
					$('#Cm101').css({
					    				'font-size': '27px'
						    		});
				}
				break;

		}
	});

});

