jQuery(function ($) {
    'use strict';
    /*Start For Pantone*/
	$(document).on('click', '.lanyard_color_select', function(){
		
			var getPTTracker = $('#pantonTracker').val();
			var colorName = $(this).attr('data-name');
			var colorVal  = $(this).attr('data-color');


					$(this).append('<span class="badge">✓</span>');
				 	$('#pantonTracker').attr('data-1', colorName);
				 	$('#pantonTracker').attr('color-1', colorVal);
				 	$('#PTCName1').val(colorName);
				 	$('#PTCName1').css('background-color',colorVal)
				 	$(this).attr('data-select', '1');
					$("#addPantoneColor").trigger("click");

	});

	$(document).on('click', '#addPantoneColor', function(){
			var colorNames = $('#pantonTracker').attr('data-1');
			var colorVal   = $('#pantonTracker').attr('color-1');
			if (colorNames == '') { $('.close').click(); return; }
			$('#lanyard-color-tab .color-wrap').removeClass('selected');

			var li = '';
			
			li+='<li class="color-enabled">';
			  li+= '<span class="copy-tooltip-new tooltip-custom">'+colorNames+'</span>';
			  li+='<div id="colorStyleBox" class="color-box color-wrap selected">';
			    li+='<div data-name="'+colorNames+'" data-color="'+colorVal+'" style="background-color: '+colorVal+';';
			    li+='background: -webkit-linear-gradient(90deg,'+colorVal+'); /* For Safari 5.1 to 6.0 */';
			    li+='background: -o-linear-gradient(90deg,'+colorVal+'); /* For Opera 11.1 to 12.0 */';
			    li+='background: -moz-linear-gradient(90deg,'+colorVal+'); /* For Firefox 3.6 to 15 */';
			    li+='background: linear-gradient(90deg,'+colorVal+'); /* Standard syntax */';
			    li+='height: 100%;';
			    li+='"></div>';
			  li+='</div>';
			li+='</li>';
			
			$('#lanyard-color-items ul').append(li);
			$('#PTCName1').val("");
			$('.badge').html("");
			$('#pantonTracker').attr('data-1', '');
			$('#pantonTracker').attr('color-1', '');
			$('#modal-color-pantone').modal('hide');
			// $('.selected').click();

	});
	/*End For Pantone*/

	/* Custom Text Color Start */
	$(document).on('click', '.text_color_select', function(){

		var getTCTracker = $('#text_color').val();
		var colorName = $(this).attr('data-name');
		var colorVal  = $(this).attr('data-color');

		$(this).append('<span class="badge">✓</span>');
		$('#textTracker').attr('data-text-name', colorName);
		$('#textTracker').attr('data-text-color', colorVal);
		$(this).attr('data-select', '1');
		$("#addTextColor").trigger("click");
		
	});

	$(document).on('click', '#addTextColor', function(){

		var colorNames = $('#textTracker').attr('data-text-name');
		var colorVal   = $('#textTracker').attr('data-text-color');

		if (colorNames == '') { $('.close').click(); return; }

		$('#lanyard-text-color-items .color-wrap').removeClass('selected');
		var html = '';
		html += '\
			<li>\
			<span class="copy-tooltip-new tooltip-custom">'+colorNames+'</span>\
				<div class="color-selected color-box color-wrap selected">\
					<div data-name="'+ colorNames +'" data-color="'+ colorVal +'" style="background-color:'+ colorVal +'; height: 100%;"></div>\
				</div>\
			</li>';

		$('#lanyard-text-color ul').append(html);
		$('#text_color').val("");
		$('.badge').html("");
		$('#textTracker').attr('data-text-name', '');
		$('#textTracker').attr('data-text-color', '');
		$('#modal-color-text').modal('hide');

	});
	/* Custom Text Color End */


	/* Custom Add Imprint Color Start */
	$(document).on('click', '.addimprint_color_select', function(){

		var colorName = $(this).attr('data-name');
		var colorVal  = $(this).attr('data-color');

		$(this).append('<span class="badge">✓</span>');
		$('#imprintTracker').attr('data-imprint-name', colorName);
		$('#imprintTracker').attr('data-imprint-color', colorVal);
		$(this).attr('data-select', '1');
		$("#addimprintColor").trigger("click");
		
	});

	$(document).on('click', '#addimprintColor', function(){

		var colorNames = $('#imprintTracker').attr('data-imprint-name');
		var colorVal   = $('#imprintTracker').attr('data-imprint-color');
		console.log(colorNames);

		if (colorNames == '') { $('.close').click(); return; }

		$('#lanyard-add-imprint-items .color-wrap').removeClass('selected');
		var html = '';
		html += '\
			<li>\
			<span class="copy-tooltip-new tooltip-custom">'+colorNames+'</span>\
				<div class="color-selected color-box color-wrap selected">\
					<div data-name="'+ colorNames +'" data-color="'+ colorVal +'" style="background-color:'+ colorVal +'; height: 100%;"></div>\
				</div>\
			</li>';

		$('#lanyard-add-imprint-items ul').append(html);
		$('.badge').html("");
		$('#imprintTracker').attr('data-imprint-name', '');
		$('#imprintTracker').attr('data-imprint-color', '');
		$('#modal-add-imprint-color').modal('hide');

	});
	/* Custom Text Color End */

});