jQuery(function ($) {
    'use strict'; 

    var Lanyarddata =  jQuery.parseJSON(Lanyard_data.lan_setting);
    var Lanyard = Lanyard_data;
    var LanyardProdData =  jQuery.parseJSON(Lanyard_prod.prod_setting);
    var LanyardShipData =  jQuery.parseJSON(Lanyard_ship.ship_setting);
    var Lanyardhome =  Lanyard_data.home;
    var TempID = 0;
    var add_to_cart_data = {}; 

    function Onload() {
        getParameterByName('style');
        $('select[name="lanyard_style"]').trigger('change');
        //$('#lanyard_message').trigger('keyup');
        //$('#wdisplay101').html('<i class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><span class="sr-only">Refreshing...</span>');
        //$('#img-preview').show( "slow" );

        //setTimeout(getPreview, 300);
        
        $("#img-preview").load(function(){       
            $('#loading-img').hide();
            $('#img-preview').show();
        });
    }
    function getParameterByName(name, url) {
        if (!url) {
          url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results){
            return;
        } else {
            // console.log(results[2]);
            $('select[name="lanyard_style"]').val(results[2]);
        }
        // if (!results[2]) return '';
        // return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function toInt(n) {
        n = parseInt(n);
        return isNaN(n) ? 0 : n;
    }
    
    function numberFormat(n, f) {
        if (n == undefined)
            return 0;
        f = f == undefined ? 2 : f;
        n = parseFloat(n);
        f = parseInt(f);

        return  n.toFixed(f).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
        });
    }

    function Enab_Display(arg) {
        
        if (arg == 'show' ) {
            for (var i = 0; i <= TempID; i++) {
                // if (document.getElementById("Tr-" + x)) {
                    // var tempqty = toInt($("#qID-" + i).text());
                    // $("#quantity-" + i).val(tempqty);
                    $("#quantity-" + i).show();
                    $("#qID-" + i).hide();
                // }
            }
        } else if( arg == 'unshow') {
            for (var i = 0; i <= TempID; i++) {
                    var tempqty = $("#quantity-" + i).val();
                    $("#qID-" + i).text(tempqty);
                    $("#quantity-" + i).hide();
                    $("#qID-" + i).show();
                    runCalculator();
                }
            
        } else {
            for (var i = 0; i <= TempID; i++) {
            var tempqty = toInt($("#qID-" + i).text());
            $("#quantity-" + i).val(tempqty);
                $("#quantity-" + i).hide();
                $("#qID-" + i).show();
            }
        }
    }

    function CollectData(){

        var customization_day_production = $('select[name="customization_date_production"] option:selected').data('days');
        var customization_day_shipping = $('select[name="customization_date_shipping"] option:selected').data('days');
        var additional_options = [];
        var colors = [];
        var clipart = {
            clip_start : $('#tempclipID').attr('data-start'),
            clip_end : $('#tempclipID').attr('data-end')
        }

        $('input[name="additional_options_check"]:checked').each(function () {
                        additional_options.push($(this).data('name'));
        });

        $("tr[id^='Tr-']").each(function () {
            var values = {
                name: $(this).data('name'),
                color: $(this).data('color'),
                text_color_name: $(this).find('#textcolorStyleBox').data('name') !='none' ? $(this).find('#textcolorStyleBox').data('name'):'Black',
                text_color: $(this).find('#textcolorStyleBox').data('color') !='transparent' ? $(this).find('#textcolorStyleBox').data('color'):'#000000',
                addimprint_color_name: $(this).find('#text2colorStyleBox').data('name'),
                addimprint_color: $(this).find('#text2colorStyleBox').data('color'),
                quantity: $(this).data('qty')
            }
            colors.push(values);
        });

        add_to_cart_data.colortype = 'lanyard';
        add_to_cart_data.product = $('#lanyard_style option:selected').data('id');
        add_to_cart_data.productname = $('#lanyard_style').val().toLowerCase();
        add_to_cart_data.width = $('#lanyard_width').val();
        add_to_cart_data.font = $('#selectFont').val() == 'Select Font' ? 'Arial' : $('#selectFont').val();
        add_to_cart_data.messageoption = $('input[name="message_input"]:checked').val();
        add_to_cart_data.message = $('input[name="lanyard_message"]').val();
        add_to_cart_data.imprint_option = $('#select-imprint-options option:selected').val();
        add_to_cart_data.attachmentname = $('#attachment_btn:checked').data('name');
        add_to_cart_data.additional_options = additional_options;
        add_to_cart_data.customization_location = $('input[name="customization_location"]:checked').data('title');
        add_to_cart_data.customization_date_production = $('select[name="customization_date_production"] option:selected').text();
        add_to_cart_data.customization_date_shipping = $('select[name="customization_date_shipping"] option:selected').text();
        add_to_cart_data.customization_total_days = customization_day_production + customization_day_shipping;
        add_to_cart_data.total_price = $('#price_handler_val').val();
        add_to_cart_data.total_qty = $('#qty_handler_val').val();
        add_to_cart_data.lanyard_color = colors;
        add_to_cart_data.clipart = clipart;
        add_to_cart_data.custom_image = $('#clipart_imagename').text();
        add_to_cart_data.badge_value = $('#badge_holders:checked').val();
        add_to_cart_data.badge_text = $('#badge_holders:checked').attr('data-text');

    }
    function CalculateTotalPayment(){
        var totalqty = isNaN(parseInt($('#qty_handler_val').val())) ? 0:parseInt($('#qty_handler_val').val());
        var lanyard_style = $('#lanyard_style').val().toLowerCase();
        var lanyard_width = $('#lanyard_width').val();
        var production_value = parseInt($('#customization_date_production').val());
        var shipping_value = parseInt($('#customization_date_shipping').val());
        var attachmentvalue = $('#attachment_btn:checked').val();
        var badge_value = $('#badge_holders').val();
        var imprint_option = $('#select-imprint-options').val();
        var totalAmount = 0;
        var price = 0;


        // var parcedAmount = 0;
        for (let i in Lanyarddata ) {
               if( lanyard_style == Lanyarddata[i].name ){
                for (let j in Lanyarddata[i].value ) {
                    var width_val = Lanyarddata[i].value[j].name;
                    if ( lanyard_width == width_val){
                        for (let k in Lanyarddata[i].value[j].value ) {
                            if ( totalqty >= Lanyarddata[i].value[j].value[k].quantity){
                                price = Lanyarddata[i].value[j].value[k].price;
                            }
                        }
                    }
                }
               }
        }
       
        if(totalqty != 0 || totalqty != ''){
            totalAmount = price * totalqty;
            if (production_value != '-1') {
                totalAmount = totalAmount + production_value;
            }
            if (shipping_value != '-1') {
                totalAmount = totalAmount + shipping_value;
            }
            if (imprint_option == 'Two-Side') {
                totalAmount += (0.10 * totalqty) + 40;
            }            
            if (attachmentvalue) {
                totalAmount += attachmentvalue * totalqty;
            }
            $('input[name="additional_options_check"]:checked').each(function () {
                var add_key = $(this).data('key');
                

                if(add_key == 'each') {
                    var add_val = numberFormat($(this).val());
                    totalAmount += add_val * totalqty;
                } else {
                    var add_val = toInt($(this).val());
                    totalAmount =  add_val + totalAmount;
                }
            });
            if ($('input[name = "badge_holders_check"]').is(':checked')) {
                totalAmount += badge_value * totalqty;
            }

            if ($('input[name = "lanyard-add-imprint-items_check"]').is(':checked')) {
                totalAmount += (0.10 * totalqty) + 25;
            }

            if ($('input[name = "customization_location"]:checked').val() == 'customized_in_usa'){
                totalAmount += 0.10 * totalqty;
            }

        }
        $('#price_handler').text(numberFormat(totalAmount));
        $('#price_handler_val').val(totalAmount);
    }

    function CalculateProdAndShip () {

        console.log('hello');
        var production_value = parseInt($('#customization_date_production').val());
        var shipping_value = parseInt($('#customization_date_shipping').val());
        var customization_day_production = $('select[name="customization_date_production"] option:selected').data('days');
        var customization_day_shipping = $('select[name="customization_date_shipping"] option:selected').data('days');
        var the_date = new Date(); 

        if (production_value == '-1' || shipping_value == '-1') {
            $('#guaranteed_note').text('');
            $('#delivery_date').text('');
            return;
        }
        var total_days = customization_day_production + customization_day_shipping;
            // Start escape saturday and sunday and holiday
            var flag = true, cntr = 0;

                    while (flag == true) {
                        the_date.setDate(the_date.getDate() + 1);
                        if (toInt(the_date.getDay()) != 0 && toInt(the_date.getDay()) != 6 ) {
                            cntr++;
                        }
                        if (cntr >= total_days) {
                            break;
                        }
                    }
                    var month_name = [
                        "January", "February", "March",
                        "April", "May", "June", "July",
                        "August", "September", "October",
                        "November", "December"
                    ];
            var week_name = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                // End escape
            var delivery_date = week_name[the_date.getDay()] + ', ' + month_name[the_date.getMonth()] + ' ' + the_date.getDate() + ', ' + the_date.getUTCFullYear();
                $('#guaranteed_note').text('Guaranteed to be delivered on or before ');
                $('#delivery_date').text(delivery_date);
                $('#datetotal').text(total_days);
    }


    function CreateProductionAndShipping () {
        var totalqty = parseInt($('#qty_handler_val').val());
        var totalqty1 = parseInt($('#qty_handler_val1').val());
        var minQty = parseInt($('#table_chart-lanyard tr:first-child td:nth-child(2)').text());
        var currentProd = $('select[name="customization_date_production"] option:selected').data('days');
        var currentShip = $('select[name="customization_date_shipping"] option:selected').data('days');

        $('.add-to-production-required').remove();

        if (totalqty == 0) { 
            $('.prodopt').remove();
            $('.shipopt').remove();
            return;
        }

       // if(totalqty==totalqty1){
            $('.prodopt').remove();
            $('.shipopt').remove();
            //console.log(totalqty+' '+minQty);
            if(totalqty >= minQty){
                
                for (let j in LanyardProdData ) {
                    //console.log(parseInt(LanyardProdData[j].quantity))
                    if (totalqty < parseInt(LanyardProdData[j].quantity) && totalqty >= parseInt(LanyardProdData[j-1].quantity)) {
                        var prod_option = '' 
                            // +'<option class="prodopt" value="' +parseFloat(LanyardProdData[j].l2_d).toFixed(2)+ '"> 2 Days - $' +parseFloat(LanyardProdData[j].l2_d).toFixed(2)+ '</option>'
                            +'<option class="prodopt" value="' +parseFloat(LanyardProdData[j].l4_d).toFixed(2)+ '" data-days="4"> 4 Days - $' +parseFloat(LanyardProdData[j].l4_d).toFixed(2)+ '</option>'
                            +'<option class="prodopt" value="' +parseFloat(LanyardProdData[j].l7_d).toFixed(2)+ '" data-days="7"> 7 Days - FREE</option>'
                        $('select[name="customization_date_production"]').append(prod_option);  
                    }

                }
                for (let k in LanyardShipData ) {     
                    if (totalqty < parseInt(LanyardShipData[k].quantity) && totalqty >= parseInt(LanyardShipData[k-1].quantity)) {
                        var ship_option = ''
                                    // +'<option class="shipopt" value="' +parseFloat(LanyardShipData[k].l2_d).toFixed(2)+ '"> 2 Days - $' +parseFloat(LanyardShipData[k].l2_d).toFixed(2)+ '</option>'
                            +'<option class="shipopt" value="' +parseFloat(LanyardShipData[k].l4_d).toFixed(2)+ '" data-days="4"> 4 Days - $' +parseFloat(LanyardShipData[k].l4_d).toFixed(2)+ '</option>'
                            +'<option class="shipopt" value="' +parseFloat(LanyardShipData[k].l6_d).toFixed(2)+ '" data-days="6"> 6 Days - FREE</option>'
                            +'<option class="shipopt" value="' +parseFloat(LanyardShipData[k].Intl).toFixed(2)+ '" data-days="8"> International - $' +parseFloat(LanyardShipData[k].Intl).toFixed(2)+ '</option>'
                        $('select[name="customization_date_shipping"]').append(ship_option);    
                    }    
                } 
                if(currentProd!=undefined){
                    $("#customization_date_production").find('[data-days="'+currentProd+'"]').attr('selected', true);
                }
                if(currentShip!=undefined){
                    $("#customization_date_shipping").find('[data-days="'+currentShip+'"]').attr('selected', true);
                }
                
            }/*else{
                $('.prodopt').remove();
                $('.shipopt').remove();
                return;
            }  */ 
        /*}else{
            $('.prodopt').remove();
            $('.shipopt').remove();
            return;
        }*/
        
        $('#qty_handler_val1').val('');
    }

    function AddToQuantity(){
        var totalqty = 0;
        var parcedqty = 0;
        for (var i = 0; i < TempID; i++) {
            var qtypercolor = parseInt($('#qID-'+ i).text());
            if (isNaN(qtypercolor)) { qtypercolor = 0 };
            totalqty += qtypercolor;
        }

        $('#qty_handler').text(totalqty);
        $('#qty_handler_val').val(totalqty);
        $('#qty_handler_val1').val(totalqty);
        runCalculator();
    }

    //reCalculating Price and Quantity
    function runCalculator(){
            CreateProductionAndShipping();
            CalculateTotalPayment();
    }

    function AddToSummary($landiv){
        var Name = $landiv.data('name');
        var Color = $landiv.data('color');
        var getqty = $('#qty_lanyard');
        var qtyval = getqty.val();
        var text = $('#lanyard-text-color .color-wrap.selected').find('div');
        var text2 = $('#lanyard-additional-imprint-color .color-wrap.selected').find('div');
        var textname = text.data('name') ? text.data('name') : 'none';
        var textcolor = text.data('color') ? text.data('color') : 'transparent';
        var textname2 = text2.data('name') ? text2.data('name') : 'none';
        var textcolor2 = text2.data('color') ? text2.data('color') : 'transparent';

        //console.log(text.data('name'));
        //console.log(text2.data('name'));

        if(qtyval <= 0) {
            return;
        } else  {
            var value = '<tr data-color="' + Color + '" data-name=' + Name + ' class="option-tr" id="Tr-' + TempID + '" data-qty="' + qtyval + '">'
                        + '<td>'
                        + '<div id="colorStyleBox" class="color-box color-wrap">'
                        + '<div style="background-color: '+Color+';'
                        + 'background: -webkit-linear-gradient(90deg,'+Color+'); /* For Safari 5.1 to 6.0 */'
                        + 'background: -o-linear-gradient(90deg,'+Color+'); /* For Opera 11.1 to 12.0 */'
                        + 'background: -moz-linear-gradient(90deg,'+Color+'); /* For Firefox 3.6 to 15 */'
                        + 'background: linear-gradient(90deg,'+Color+'); /* Standard syntax */'
                        + 'height: 100%;'
                        + '"></div>'
                        + '<span class="SpanColorbox">' + Name
                        + '</span>'
                        + '</td>'
                        + '<td>'
                        + '</div>'
                        + '<div id="textcolorStyleBox" class="color-box color-wrap" data-name="'+textname+'" data-color="' + textcolor + '">'
                        + '<div style="background-color: '+textcolor+';'
                        + 'background: -webkit-linear-gradient(90deg,'+textcolor+'); /* For Safari 5.1 to 6.0 */'
                        + 'background: -o-linear-gradient(90deg,'+textcolor+'); /* For Opera 11.1 to 12.0 */'
                        + 'background: -moz-linear-gradient(90deg,'+textcolor+'); /* For Firefox 3.6 to 15 */'
                        + 'background: linear-gradient(90deg,'+textcolor+'); /* Standard syntax */'
                        + 'height: 100%;'
                        + '"></div>'
                        + '<span class="SpanColorbox">' + textname
                        + '</span>'
                        + '</div>'
                        + '<a id="DelID-' + TempID + '" href="#" class="delete-selection" data-id="' + TempID + '" ><i class="fa fa-times"></i></a>'
                        + '</td>'
                        + '<td class="td-imprint">'
                        + '</div>'
                        + '<div id="text2colorStyleBox" class="color-box color-wrap text2" data-name="'+textname2+'" data-color="' + textcolor2 + '">'
                        + '<div style="background-color: '+textcolor2+';'
                        + 'background: -webkit-linear-gradient(90deg,'+textcolor2+'); /* For Safari 5.1 to 6.0 */'
                        + 'background: -o-linear-gradient(90deg,'+textcolor2+'); /* For Opera 11.1 to 12.0 */'
                        + 'background: -moz-linear-gradient(90deg,'+textcolor2+'); /* For Firefox 3.6 to 15 */'
                        + 'background: linear-gradient(90deg,'+textcolor2+'); /* Standard syntax */'
                        + 'height: 100%;'
                        + '"></div>'
                        + '<span class="SpanColorbox">' + textname2
                        + '</span>'
                        + '</div>'
                        + '</td>'
                        + '<td>'
                        + '<div id="qID-' + TempID + '">' + qtyval + '</div>'
                        + '<input type="number" class="input-text fusion-one-third InpCss keyupTxtView" id="quantity-' + TempID + '" value="' + qtyval + '">'
                        + '</td>'                       
                        + '</tr>';
            TempID++;
            $("table#selected_color_table tbody").append(value);
            //$('#lanyard-color-tab .color-wrap').removeClass('selected');
            //$('#lanyard-text-color .color-wrap').removeClass('selected');
            //$('#lanyard-additional-imprint-color .color-wrap').removeClass('selected');
            getqty.val('');
            AddToQuantity();    
        }
    }

    function renderPriceChart() {
        var   style = $('#lanyard_style').val();
        var   width = $('#lanyard_width').val();
        var   val   = style.toLowerCase();
        //console.log(style+' - '+width+' - '+val);
        $('#price_chart_lanyard table tr td:not(:first-child)').remove();
        $('#table_price_name_lanyard').text('Pricing Guide for '+style+' '+width+' inch');
        for (let i in Lanyarddata) {
            if( val == Lanyarddata[i].name ){
                for (let j in Lanyarddata[i].value ) {
                    var width_val = Lanyarddata[i].value[j].name; 
                    if( width == width_val ){
                        var price_chart = Lanyarddata[i].value[j].value;
                        $.each(price_chart, function(key, data) {             
                            //console.log(key+' - '+data['price']+' - '+data['quantity']);   
                            var output_qty_tpl   = "<td>"+data['quantity']+"</td>";
                            var output_price_tpl = "<td>"+data['price']+"</td>";
                            $('#price_chart_lanyard table tr:first-child').append(output_qty_tpl);
                            $('#price_chart_lanyard table tr:eq(1)').append(output_price_tpl);
                        });      
                    }   
                }
            }  
        }
    }
    function resize_cm101(){
        $('.textfill').textfill({
            innerTag: "h3",
            success: function() {
                var currSize = $('.full-msg-text').css('font-size').replace('px', '');
                console.log(currSize);
               // getPreview();
            },
            fail: function() {
                console.log("boo hoo!")
            }
        });     
        /*$('.full-msg-span').textfill({
            innerTag: "h3",
            success: function() {
                var currSize = $('.full-msg-text').css('font-size').replace('px', '');
                var currWidth = $('.full-msg-text').width();
                if(currSize > 50){
                    while(currSize > 50){               
                        currSize--;
                        $('.full-msg-span').css('width','');
                        $('.full-msg-text').css({'font-size':currSize+'px'});
                        currWidth = $('.full-msg-text').width();          
                    }
                }
                if(currSize < 15){
                    while(currSize < 15){
                        if(currSize < 15){
                            currSize++;
                            $('.full-msg-span').css('width','');
                            $('.full-msg-span').css('max-width','800px');
                            $('.full-msg-text').css({'font-size':currSize+'px'});
                            currWidth = $('.full-msg-text').width();    
                        }else{
                            $('.full-msg-span').css('max-width','700px');
                        }               
                    }                        
                } 
                currSize = $('.full-msg-text').css('font-size').replace('px', '');
                if($('#full-msg-span').height() > $('#jQTextFill_Cm101').height() && currSize > 30){
                    var container_height = $('#full-msg-span').height();
                    var parent_height = $('#jQTextFill_Cm101').height();
                    var overlap = container_height - parent_height;
                    
                    for(var i = 1; i != overlap; i++){
                        currSize--;
                        $('.full-msg-text').css({'font-size':currSize+'px'});     
                    }
                }

                if($('.full-msg-text').width() > 400){
                    $('.full-msg-span').css('min-width','400px');
                }else{
                    $('.full-msg-span').css('min-width','');
                }

                var e = document.getElementById('Cm101');   
                if($('#jQTextFill_Cm101').height() < e.scrollHeight){
                    $('.full-msg-text').css({'-webkit-transform': 'scale(1,0.7)',
                                              '-moz-transform': 'scale(1,0.7)',
                                              '-o-transform': 'scale(1,0.7)',
                                               'transform': 'scale(1,0.7)'
                                            });
                }else{
                    $('.full-msg-text').css({'-webkit-transform': '',
                                              '-moz-transform': '',
                                              '-o-transform': '',
                                               'transform': ''
                                            });
                }

                if(x!=0){
                    var z =  $('#Cm101').width();
                    var currMin = $('#full-msg-span').css('min-width').replace('px', '');
                    $('.full-msg-span').css('width', ''+z+'px');   
                }

                $('.full-msg-text').each( function(){
                    $(this).css('font-size', $('#Cm101').css('font-size'));
                })

                var font_size = $('#Cm101').css('font-size').replace('px', '')*.90;
                font_size = font_size > 25 ? font_size: 25;
                if($('#Cm101').css('line-height').replace('px','') == 30){
                    font_size = 28;
                }
                $('.icon-start, .icon-end').css('font-size', font_size+'px');
            },
            fail: function() {
                console.log("boo hoo!")
            }
        });     */
    }
    function change_bgcolor(color){
        var bg_color = color;
        $('#full-text-container').css({'background-color':bg_color});
    }
    function change_txtcolor(color){
        var txt_color = color;
        $('.full-msg-text').css({'color':txt_color});
        $('.icon-start, .icon-end, .custom-logo').css('color', txt_color);
        $('#jQTextFill_Cm101').css('border-color', txt_color);
    }

    function getPreview() {  

        var iconStart = $('#tempclipStart').attr('data-start');
        var start_font = $('#start_btn').find('i').css('font-family');
        if(iconStart != '' && iconStart != 'custom'){
            iconStart = entityForSymbolInContainer("."+iconStart);
        }else if( iconStart == 'custom'){
            start_font = 'custom';
        }

        var iconEnd = $('#tempclipEnd').attr('data-end');
        var end_font = $('#end_btn').find('i').css('font-family');
        if(iconEnd != '' && iconEnd != 'custom'){
            iconEnd = entityForSymbolInContainer("."+iconEnd);
        }else if( iconEnd == 'custom'){
            end_font = 'custom';
        }

        var buckle_option = '';
        var breakaway_option = '';
        $('input[name="additional_options_check"]:checked').each(function () {
            if($(this).data('name')=='Plastic Buckle'){
                buckle_option = $(this).data('name');
            }    
            if($(this).data('name')=='Flat Plastic Breakaway'){
                breakaway_option = $(this).data('name');
            }
        });

        var message = $('#lanyard_message').val() != '' ? encodeURIComponent($('#lanyard_message').val()):'Your message';
        var font_style = $('#selectFont').val();
        var color_bg = $('ul#lanyard_bgColor .color-box.selected').find('div').attr('data-color');
        var color_txt = $('ul#lanyard_txtColor .color-box.selected').find('div').attr('data-color');
        var start_icon_font = start_font;
        var end_icon_font = end_font;
        var start_icon = iconStart;
        var end_icon = iconEnd;
        var attacment = $('#attachment_btn:checked').data('name');
        var buckle = buckle_option;
        var breakaway = breakaway_option;
        var message_style = $('input[name="message_input"]:checked').val();

        color_bg = color_bg!=undefined ? color_bg.replace('#', ''):'';
        color_txt = color_txt!=undefined ? color_txt.replace('#', ''):'';
        start_icon = start_icon!=undefined ? start_icon.substr(3, 4):'';
        end_icon = end_icon!=undefined ? end_icon.substr(3, 4):'';
        attacment = attacment!=null ? attacment:'Split Ring';

        var origin = window.location.protocol + "//" + window.location.host + "/generate.php?";
 
        $('#loading-img').show();
  
        var url = 'message='+message+'&font_style='+font_style+'&color_bg='+color_bg+'&color_txt='+color_txt+'&start_icon_font='+start_icon_font+'&start_icon='+start_icon+'&end_icon_font='+end_icon_font+'&end_icon='+end_icon+'&attacment='+attacment+'&buckle='+buckle+'&breakaway='+breakaway+'&message_style='+message_style;
        $('#img-preview').attr('src', origin+url);
        $("#img-preview").load(function(){
            $('#loading-img').hide();
            $('#img-preview').show();
        });
       
    }
    function entityForSymbolInContainer(selector) {
        var code = $(selector).text().charCodeAt(0);
        var codeHex = code.toString(16).toUpperCase();
        while (codeHex.length < 4) {
            codeHex = "0" + codeHex;
        }
        
        return "&#x" + codeHex + ";";
    }


    $(document).ready(function(){
        var timer;
      $( "body" )

        .on('keyup paste','#lanyard_message', function( event ){
            clearTimeout(timer);  //clear any running timeout on key up
            $('#loading-img').show();
            timer = setTimeout(function() { //then give it a second to see if the user is finished
                getPreview();
            }, 1000);           
        })

       //on choosing fontstyle
        .on('click', 'ul#selectedfont li', function (e) {  
            e.preventDefault();

            var fontStyle = $(this).find('.fontvalue').val();
            $('.full-msg-text').css({'font-family':fontStyle});

            $('#selectFont').attr( "style", "font-family:" + fontStyle );
            $('#selectFont').attr( "value", fontStyle );
          
            setTimeout(getPreview, 300);
        })

        .on('click', 'ul#lanyard_bgColor .color-box, #modal-color-pantone ul.color-pantone-list a', function(){
            var bg = $(this).find('div').attr('data-color');
            //change_bgcolor(bg);
            setTimeout(getPreview, 300);
            $('#img-preview').css('background-color', bg);
        })
        .on('click', 'ul#lanyard_txtColor .color-box, #modal-color-text ul.color-pantone-list a', function(){
            //var color = $(this).find('div').attr('data-color');
            //change_txtcolor(color);
            setTimeout(getPreview, 300);
        })
       
        //on changing lanyard style
        .on( "change", 'select[name="lanyard_style"]', function() {
            $('select#lanyard_width').empty();
            var imgval = $(this).val();
            var val = $(this).val().toLowerCase();
            for (let i in Lanyarddata ) {
               if( val == Lanyarddata[i].name ){
                for (let j in Lanyarddata[i].value ) {
                    var width_val = Lanyarddata[i].value[j].name;
                    $('#lanyard_width')
                        .append($("<option></option>")
                                .attr("value",width_val)
                                .text(width_val+' inch'));

                }
                $(".list-product_style li").css('display', 'none');
                $('.list-product_style #lanyard-img-'+imgval+'').css('display', 'block');
               }
            }
            $('#lanyard_width').trigger('change');
            renderPriceChart();
            runCalculator();
        })
        .on( "change", 'select[name="lanyard_width"]', function() {   
            var size = $(this).val();
            var height = 0;
            if(size == '3/8'){
                height = '30px';
                $('#jQTextFill_Cm101').css('height', height);
                $('.icon-start, .icon-end, .custom-logo').css('line-height', height);
                $('.custom-logo').css('font-size', '40px');
                $('.full-msg-text').css('line-height', height);
            }else if(size == '5/8'){
                height = '50px';
                $('#jQTextFill_Cm101').css('height', height);
                $('.icon-start, .icon-end, .custom-logo').css('line-height', height);
                $('.custom-logo').css('font-size', '50px');
                $('.full-msg-text').css('line-height', height);
            }else if(size == '3/4'){
                height = '70px';
                $('#jQTextFill_Cm101').css('height', height);
                $('.icon-start, .icon-end, .custom-logo').css('line-height', height);
                $('.custom-logo').css('font-size', '50px');
                $('.full-msg-text').css('line-height', height);
            }else if(size == '1'){
                height = '90px';
                $('#jQTextFill_Cm101').css('height', height);
                $('.icon-start, .icon-end, .custom-logo').css('line-height', height);
                $('.custom-logo').css('font-size', '50px');
                $('.full-msg-text').css('line-height', height);
            }

            /*if ($('input[name="message_input"]:checked').val() != 'custom_logo') {
                //resize_cm101();
                $('#lanyard_message').trigger('keyup');
            }*/
            renderPriceChart();
            runCalculator();
        })
        //on clicking lanyard style
        .on('click', '#custom_lanyard_color', function(){
            $('#modal-color-pantone').modal()
        })
        //on clicking text lanyard style
        .on('click', '#custom_lanyard_text_color', function(){
            $('#modal-color-text').modal()
        })

        //on clicking imprint text lanyard style
        .on('click', '#custom_lanyard_add_imprint_color', function(){
            $('#modal-add-imprint-color').modal()
        })

        //checking additional imprint color
        .on('change', 'input[name = "lanyard-add-imprint-items_check"]', function () {
            $('.text_to_alter').text('');
            $('.text2').hide();
            if ($('input[name = "lanyard-add-imprint-items_check"]').is(':checked')) {
                $('.text_to_alter').text('Text 2');
                $('.text2').show();
                CalculateTotalPayment();
            } else {
                CalculateTotalPayment();
            }
        })

        //on selecting color from pallete
        .on('click', '#lanyard-color-tab .color-wrap', function(){
            $('#lanyard-color-tab .color-wrap').removeClass('selected');
            $(this).addClass('selected');
        })

        //on selecting text color from pallete 
        .on('click', '#lanyard-text-color-items .color-wrap', function(){
            $('#lanyard-text-color-items .color-wrap').removeClass('selected');
            $(this).addClass('selected');
        })

        //on selecting add imprint color from pallete 
        .on('click', '#lanyard-add-imprint-items .color-wrap', function(){
            $('#lanyard-add-imprint-items .color-wrap').removeClass('selected');
            $(this).addClass('selected');
        })

        //on adding color and quantity
        .on('click', '#add_lanyarcolor_to_selections', function (e) {
            e.preventDefault();
            $('.add-to-lanyard').remove();
            if ($('#lanyard-color-tab .color-wrap.selected').find('div').data('name') != undefined) {
                //adding the color to the summary table
                AddToSummary($('#lanyard-color-tab .color-wrap.selected').find('div'));
                
            } else {
               var span_message = '<span class="add-to-lanyard select-color-alert">Select Color First</span>';
                $(span_message).insertAfter($('#lanyard-color-tab'));
            }
                    
        })

        //on deleting color in the summary
        .on('click', '.delete-selection', function (e) {
            e.preventDefault();
            var data_id = $(this).data('id');
            var $row = $(this).closest('tr');
            //Remove it on the additional color table list
            $row.remove();
            AddToQuantity();
            runCalculator();
        })

        //on clicking message style and clipart
        .on('change', 'input[name="message_input"]', function(){
            var mivalue = $('input[name="message_input"]:checked').val();
            if (mivalue == 'custom_logo') {
                /*
                $('span.full-msg-span').css({'text-align':'center', 'min-width':'160px', 'width':''});
                $('.icon-start').hide();
                $('.icon-end').hide();
                $('.full-msg-text').text('');
                if($('div#clipart_imagename').text() != ''){
                    
                    var color = $('#Cm101').css('color');
                    var lanyard_size = $('#Cm101').css('line-height');
                    var font_size = $('#Cm101').css('line-height').replace('px', '') >= 50 ? 50:40;
                    var start = '<i id="custom-logo" class="fa icon-preview custom-logo" style="color: '+color+'; font-size: '+font_size+'px; line-height: '+lanyard_size+'; text-shadow: none; vertical-align: top;"></i>';
                    
                    $('.full-msg-text').append(start);

                    var parent = $("#jQTextFill_Cm101").width();
                    var child = $("#h3_container").width();

                    while(child < parent){
                        $("#full-msg-span").clone().insertAfter("span#full-msg-span:last");
                        child = $("#h3_container").width();
                    }

                }*/
                
                $('#ForLanyard').hide();
                $('#forCustomLogo').show();
                setTimeout(getPreview, 300); 
            } else {
                /*
                $('span.full-msg-span').css({'text-align':'', 'min-width':'200px'});
                $('.icon-start').show();
                $('.icon-end').show();*/
                //$('.full-msg-text').text('');
                //$('#lanyard_message').val('');

                $('#ForLanyard').show();
                $('#forCustomLogo').hide();
                setTimeout(getPreview, 300);
                //$('#lanyard_message').trigger('keyup');
            }
            
        })
        //on clicking the clipart button
        .on('click', '#start_btn, #end_btn', function () {
            var val = $(this).data('position');
            $('#clip_vals').val(val);
            $('#lanyard-clipart-modal').modal();
            return false;
        })


        //on showing the modal for clipart lanyard
        .on('show.bs.modal', '#lanyard-clipart-modal', function (event) {
            var button = $('#' + $('#clip_vals').val() + '_btn'),
                modal = $(this);
            modal.find('.modal-title').text('Choose your ' + button.data('title') + ' Clipart');
            modal.find('.clipart-list').data('target', '#' + button.attr('id'));
            modal.find('.clipart-list').data('position', button.attr('id'));
        })

        //on choosing clipart
        .on('click', '.clipart-list li', function () {
            $('.clipart-list li').removeClass('active');
            $(this).addClass('active');
            var icon = $(this).data('icon')!=undefined ? $(this).data('icon'):'',
                iconCode = $(this).data('icon-code'),
                iconFont = $(this).find('i').css('font-family'),
                button = $($(this).closest('.clipart-list').data('target')),
                position = button.data('position');
            /*//var font_size = $('#Cm101').css('font-size').replace('px', '')-10;
            var font_size = $('#Cm101').css('font-size').replace('px', '')*.90;
            font_size = font_size > 25 ? font_size: 25;
            var color = $('#Cm101').css('color');
            var lanyard_size = $('#Cm101').css('line-height');*/
            //var icon_pos = iconFont == 'icomoon' ? 'top: 5px;':''

            button.find('.icon-preview').removeClass(function (index, css){
                return (css.match(/(^|\s)fa-\S+/g) || css.match(/(^|\s)aykun-\S+/g) || []).join(' ');
            });
            button.find('.icon-preview').addClass(icon == undefined ? '' : icon);

            if (position == 'start') {
                $('#tempclipID').attr('data-start', icon);
                $('#tempclipStart').text('');
                $('#tempclipStart').attr('data-start', icon);
                $('#tempclipStart').removeClass();
                $('#tempclipStart').addClass(icon);
                $('#tempclipStart').text(iconCode);
                $('.clipart-start .toggle-modal-clipart')
                    .find('.image-upload')
                    .attr('src', '')
                    .css({display: 'none'});
               /* var start = '<i id="icon-start" class="fa icon-preview '+icon+' icon-start" style="color: '+color+'; font-size:'+font_size+'px; margin-left: 20px; line-height: '+lanyard_size+'; vertical-align: top;"></i>';
                $('.icon-start').remove();
                $('span.full-msg-span').each(function(){
                    $(start).insertBefore(this);
                })      */
            } else {
                $('#tempclipID').attr("data-end", icon);
                $('#tempclipEnd').text('');
                $('#tempclipEnd').attr("data-end", icon);
                $('#tempclipEnd').removeClass();
                $('#tempclipEnd').addClass(icon);
                $('#tempclipEnd').text(iconCode);
                $('.clipart-end .toggle-modal-clipart')
                    .find('.image-upload')
                    .attr('src', '')
                    .css({display: 'none'});
                /*var end = '<i id="icon-end" class="fa icon-preview '+icon+' icon-end" style="color: '+color+'; font-size:'+font_size+'px; margin-right: 20px; line-height: '+lanyard_size+'; vertical-align: top;"></i>';
                $('.icon-end').remove();
                $('span.full-msg-span').each(function(){
                    $(end).insertAfter(this);
                })*/
            }
            //$('#lanyard_message').trigger('keyup');
            $('#lanyard-clipart-modal').modal('hide');   

             setTimeout(getPreview, 300);    
        })

        //on selecting imprint options
        .on( "change", 'select[name="select-imprint-options"]', function() {
            var imprint_option = $('#select-imprint-options').val();
            $('.copy-attach-imprint-option').remove();

            if (imprint_option == 'Two-Side') {
                var span_message = '<span class="copy-attach-imprint-option">additional $40.00 fixed and $0.10 each</span>';
                $(span_message).insertAfter($(this));
            }
            runCalculator();
        })


        //on clicking the any attachments 
        .on('change', '#attachment_btn', function () {
            var attachmentvalue = $(this).val();
            $('.copy-attach-price-attachment').remove();
            if (attachmentvalue != 0) {
                var span_message = '<span class="copy-attach-price-attachment">+$'+attachmentvalue+' each</span>';
                // var totalqty = parseInt($('#qty_handler_val').val());
                    // if(totalqty != 0 || totalqty != ''){
                        $(span_message).insertBefore($(this));
                    // }
            }

            setTimeout(getPreview, 300);
            CalculateTotalPayment();   
        })

        //on checking additional options
        .on('change', 'input[name = "additional_options_check"]', function () {
            if($(this).data('name')=='Plastic Buckle' || $(this).data('name')=='Flat Plastic Breakaway'){
               setTimeout(getPreview, 300);
            }           
            CalculateTotalPayment();
        })
        // selecting badge
         .on('change', '#badge_holders', function () {
            CalculateTotalPayment();
            
        })

        //on adding badge holders
        .on('change', 'input[name = "badge_holders_check"]', function () {
            if ($('input[name = "badge_holders_check"]').is(':checked')) {
                $('#badge_option').show();
                CalculateTotalPayment();
            } else {
                $('#badge_option').hide();
                CalculateTotalPayment();
            }
        })

        //on editing summary
        .on('click', '#EditSaveID', function () {
           var Stat = $(this).html();
           $('#selected_color_table').removeClass('table-edit');
            if (Stat == '<i class="fa fa-pencil"></i>') {
                $(this).html('<i class="fa fa-floppy-o"></i>');
                $('#selected_color_table').addClass('table-edit');
                $("#CancelID").html('<i class="fa fa-times"></i>');
                Enab_Display('show');
            } else if (Stat == '<i class="fa fa-floppy-o"></i>') {

                $(this).html('<i class="fa fa-pencil"></i>');
                $("#CancelID").html("");
                Enab_Display('unshow');
            }
        })

        //on cancel of summary
        .on('click', '#CancelID', function (e) {
                    $('#selected_color_table').removeClass('table-edit');
                    var Stat = $(this).html();

                    if (Stat == '<i class="fa fa-times"></i>') {
                        $("#EditSaveID").html('<i class="fa fa-pencil"></i>');
                        $(this).html("");
                        Enab_Display('cancel');
                    }
        })

        //on choosing the production and shipping || customization location
        .on('change', '#customization_date_production, #customization_date_shipping, input[name = "customization_location"]', function () {
            CalculateProdAndShip();
            CalculateTotalPayment();
        })
        .on('click','#customization_date_production', function() {
            var totalqty = parseInt($('#qty_handler_val').val());
            var minQty = parseInt($('#table_chart-lanyard tr:first-child td:nth-child(2)').text());

            $('.add-to-production-required').remove();
            if (totalqty < minQty) {
                var span_message = '<span class="add-to-production-required select-color-alert" style="color: #E22B2B;font-size: 12px;display: block;float: none;osition: relative;op: 10px;">Did not reached minimum required quantity</span>';
                $(span_message).insertAfter($('.col-total-content'));
            } 
        })
        //adding to Cart
        .on('click', '#lanyard_add_to_cart', function (e) {
            var customization_day_production = $('select[name="customization_date_production"] option:selected').data('days');
            var customization_day_shipping = $('select[name="customization_date_shipping"] option:selected').data('days');
            var totalqty = parseInt($('#qty_handler_val').val());
            var minQty = parseInt($('#table_chart-lanyard tr:first-child td:nth-child(2)').text());
            CollectData(); 
            $('.add-to-lanyard').remove();
            $('.add-to-production').remove();
            $('.add-to-shipping').remove();
            $('.add-to-production-required').remove();
            if ( add_to_cart_data.total_qty == 0 ) {
                var span_message = '<span class="add-to-lanyard select-color-alert">Select Color First</span>';
                $(span_message).insertAfter($('#lanyard-color-tab'));
                return;
            }

            if (customization_day_production == null || customization_day_shipping == null) {
                if ( customization_day_production == null ) {
                    var span_message = '<span class="add-to-production select-color-alert">Select Production Time First</span>';
                        $(span_message).insertAfter($('#customization_date_production'));
                }
                if (totalqty < minQty) {
                    var span_message = '<span class="add-to-production-required select-color-alert" style="color: #E22B2B;font-size: 12px;display: block;float: none;osition: relative;op: 10px;">Did not reached minimum required quantity</span>';
                    $(span_message).insertAfter($('.col-total-content'));  
                }
                
                if ( customization_day_shipping == null ) {
                    var span_message = '<span class="add-to-shipping select-color-alert">Select Shipping Time First</span>';
                        $(span_message).insertAfter($('#customization_date_shipping'));
                }
                return;
            }else{
                if (totalqty < minQty) {
                    var span_message = '<span class="add-to-production-required select-color-alert" style="color: #E22B2B;font-size: 12px;display: block;float: none;osition: relative;op: 10px;">Did not reached minimum required quantity</span>';
                    $(span_message).insertAfter($('.col-total-content'));  
                    return;
                }
            }


            var $self = $(this),
                $icon = $self.find('.fa'),
                $button_text = $self.find('.fusion-button-text-left');
                
            $icon.removeClass('fa-shopping-cart');
            $icon.addClass('fa-spinner');
            $self.removeClass('btn-add-to-cart');
            $self.addClass('btn-adding-to-cart');
            $button_text.text('Add to Cart');

            $.ajax({
                url: Lanyard_data.ajax_url,
                type: 'POST',
                data: {meta: add_to_cart_data, action: 'lan_add_to_cart'},
                dataType: 'JSON',
            }).done(function (response) {
                var type = 'success',
                        title = 'Success';

                $('.addtocartmessage').remove();
                if (!response.success) {
                    type = 'error';
                    title = 'Error';
                }

                if (response.success)
                {
                    window.location = "/cart";
                }
            });
        })

        .on('change', '.files-data', function(e){
            e.preventDefault;
                
                var fd = new FormData();
                var files_data = $('.files-data'); 
             
                $.each($(files_data), function(i, obj) {
                    $.each(obj.files,function(j,file){
                        console.log(j);
                        fd.append('my_file_upload[' + j + ']', file);
                    })
                });
                
                fd.append('action', 'cvf_upload_files');  

                var file = this.files[0];
                var name = file.name;
                var size = file.size;
                var type = file.type; 

                // console.log(fd);
                // return;
                var image_gallery,
                element = document.getElementById('image_gallery');

                if (element != null) {
                        image_gallery = element.value;
                }
                else {
                    image_gallery = null;
                }
                    
                fd.append('post_id', ''); 
                fd.append('image_gallery',image_gallery); 
                $.ajax({
                    type: 'POST',
                    url: Lanyard_data.ajax_url,
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function(xhr){

                        var allowedFiles = [".png", ".jpeg", ".gif", ".cdr", ".psd", ".ai", ".pdf", ".eps", ".bmp", ".tiff",".jpg"];
                        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");

                        if(size > 2000000){
                                                 
                            alert("Maximum file size is 2MB.");

                            files_data.wrap('<form>').closest('form').get(0).reset();
                            files_data.unwrap();

                            return false;
                        }else if (!regex.test(name.toLowerCase())){
                      
                            alert("Allowed file types are CDR, JPG, JPEG, PSD, AI, PDF, PNG, GIF, EPS, TIFF, BMP");

                            files_data.wrap('<form>').closest('form').get(0).reset();
                            files_data.unwrap();
                            
                            return false;
                        }else{ 
                            $('#loading-img').show();
                            $('#clipart_error_warning').text('');
                       
                            $('#form-custom-logo .fileinput-button')
                                    .find('.image-upload')
                                    .attr('src', '')
                                    .css({display: 'none'})
                                    .end()
                                    .find('span')
                                    .text('UPLOADING IMAGE')   
                                    .end()
                                    .find('.nothing')
                                    .removeClass('nothing')
                                    .addClass('fa fa-spinner')
                                    .end()
                                    .find('.fa-spinner')
                                    .css({'margin-left': '10px'});
                        }
                    },
                    success: function(response){
                        if(response.response == 'ERROR'){
                            $('#loading-img').hide();
                            $('div#clipart_imagename').text('');
                            $('#form-custom-logo .fileinput-button')
                                    .find('.image-upload')
                                    .attr('src', '')
                                    .css({display: 'none'})
                                    .end()
                                    .find('span')
                                    .css({'padding-left': '0'})
                                    .text('UPLOAD IMAGE')
                                    .end()
                                    .find('.fa-spinner')
                                    .removeClass('fa-spinner')
                                    .addClass('nothing');
         
                            $('#clipart_error_warning').text(response.error).css({color: '#E22B2B'});;                            
                            $('#clipart_imagename').attr('src', '').css({display:'none'});

                            //console.log('false'+' - '+response.response+' - '+response.error);

                        } else if (response.response == 'SUCCESS') {
                            
                            $('#loading-img').hide();
                                  
                            $('#clipart_error_warning').text('Image Uploaded - ' + response.filename ).css({display:'block', color: '#008000'});
                            $('div#clipart_imagename').text(response.ImageName);

                            $('#form-custom-logo .fileinput-button')
                                .find('.image-upload')
                                .attr('src', '/wp-content/themes/wristbandcreation/images/custom-logo-3-v1.png')
                                .css({display: 'inline-block'})
                                .end()
                                .find('span')
                                .css({'padding-left': '0'})
                                .text('')
                                .end()
                                .find('.fa-spinner')
                                .css({'margin-left': '0'})
                                .removeClass('fa-spinner')
                                .addClass('nothing');

                            /*$('.custom-logo').remove();
                            var color = $('#Cm101').css('color');
                            var lanyard_size = $('#Cm101').css('line-height');
                            var font_size = $('#Cm101').css('line-height').replace('px', '') >= 50 ? 50:40;

                            var custom = '<i id="custom-logo" class="fa icon-preview custom-logo" style="color: '+color+'; font-size: '+font_size+'px; line-height: '+lanyard_size+'; text-shadow: none; vertical-align: top;"></i>';
                            
                            $('.full-msg-text').append(custom);

                            var parent = $("#jQTextFill_Cm101").width();
                            var child = $("#h3_container").width();

                            while(child < parent){
                                $("#full-msg-span").clone().insertAfter("span#full-msg-span:last");
                                child = $("#h3_container").width();
                            }*/
                            

                        }
                        files_data.wrap('<form>').closest('form').get(0).reset();
                        files_data.unwrap();
                     
                    }
            });
        })

        .on('change', '.clipart-data', function(e){
            e.preventDefault;

                var clipArt_type = $(this).attr('data-clipart-type') == 'starticon' ? 'clipart-start':'clipart-end';
                var fd = new FormData();
                var files_data = $('.'+clipArt_type+' a.fileinput-button input.clipart-data'); 

                $.each($(files_data), function(i, obj) {
                    $.each(obj.files,function(j,file){
                        console.log(j);
                        fd.append('my_file_upload[' + j + ']', file);
                    })
                });
                
                fd.append('action', 'cvf_upload_files');  

                var file = this.files[0];
                var name = file.name;
                var size = file.size;
                var type = file.type; 

                var image_gallery,
                element = document.getElementById('image_gallery');

                if (element != null) {
                    image_gallery = element.value;
                }
                else {
                    image_gallery = null;
                }
                        
                fd.append('post_id', ''); 
                fd.append('image_gallery',image_gallery); 
                $.ajax({
                    type: 'POST',
                    url: Lanyard_data.ajax_url,
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function(xhr){

                        var allowedFiles = [".png", ".jpeg", ".gif", ".cdr", ".psd", ".ai", ".pdf", ".eps", ".bmp", ".tiff",".jpg"];
                        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");

                        if(size > 2000000){
                                                 
                            alert("Maximum file size is 2MB.");

                            files_data.wrap('<form>').closest('form').get(0).reset();
                            files_data.unwrap();

                            return false;
                        }else if (!regex.test(name.toLowerCase())){
                      
                            alert("Allowed file types are CDR, JPG, JPEG, PSD, AI, PDF, PNG, GIF, EPS, TIFF, BMP");

                            files_data.wrap('<form>').closest('form').get(0).reset();
                            files_data.unwrap();
                            
                            return false;
                        }else{ 
                            //$('#loading-img').show();

                            $('.'+clipArt_type+' .fileinput-button')
                                    .find('span')
                                    .text('')   
                                    .end()
                                    .find('.nothing')
                                    .removeClass('nothing')
                                    .addClass('fa fa-spinner')
                                    .end()
                                    .find('.fa-spinner')
                                    .css({'top': '3px'});
                       
                            $('.'+clipArt_type+' .toggle-modal-clipart')
                                    .find('.image-upload')
                                    .attr('src', '')
                                    .css({display: 'none'});
                        }
                    },
                    success: function(response){
                        if(response.response == 'ERROR'){
                            $('#loading-img').hide();
                            $('div#clipart_imagename').text('');
                            $('#start_btn')
                                    .find('.image-upload')
                                    .attr('src', '')
                                    .css({display: 'none'})
                                    .end()
                                    .find('span')
                                    .css({'padding-left': '0'})
                                    .text('UPLOAD')
                                    .end()
                                    .find('.fa-spinner')
                                    .removeClass('fa-spinner')
                                    .addClass('nothing');

                        } else if (response.response == 'SUCCESS') {

                            if(clipArt_type=='clipart-start'){
                                $('#tempclipID').attr('data-start', response.ImageName);
                                $('#tempclipStart').attr('data-start','custom');
                            }else{
                                $('#tempclipID').attr('data-end', response.ImageName);
                                $('#tempclipEnd').attr('data-end','custom');
                            }
                            setTimeout(getPreview, 300); 
                            $('.'+clipArt_type+' .fileinput-button')
                                .find('span')
                                .css({'padding-left': '0'})
                                .text('UPLOAD')
                                .end()
                                .find('.fa-spinner')
                                .css({'top': '0'})
                                .removeClass('fa-spinner')
                                .addClass('nothing');

                            $('.'+clipArt_type+' .toggle-modal-clipart')
                                .find('.image-upload')
                                .attr('src', '/wp-content/themes/wristbandcreation/images/custom-logo-3.jpg')
                                .css({display: 'inline-block'});
                        }
                        files_data.wrap('<form>').closest('form').get(0).reset();
                        files_data.unwrap();
                     
                    }
            });
        })

    Onload();
    });

});
