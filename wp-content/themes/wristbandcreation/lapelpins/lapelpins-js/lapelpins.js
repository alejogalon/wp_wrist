jQuery(function ($) {
    'use strict'; 

    var Lapelpindata =  jQuery.parseJSON(Lapelpins_data.lan_setting);
    var Lapelpin = Lapelpins_data;
    var LapelpinProdData =  jQuery.parseJSON(Lapelpins_prod.prod_setting);
    var LapelpinShipData =  jQuery.parseJSON(Lapelpins_ship.ship_setting);
    var Lapelpinhome =  Lapelpins_data.home;
    var TempID = 0;
    var add_to_cart_data = {}; 

    //console.log(jQuery.parseJSON(Lapelpins_data.ajax_url))

    function Onload() {
        $('select[name="lapelpin_style"]').trigger('change');
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

    function CollectData(){

        var customization_day_production = $('select[name="customization_date_production"] option:selected').data('days');
        var customization_day_shipping = $('select[name="customization_date_shipping"] option:selected').data('days');
        var packaging = $('#lapelpins_packaging:checked').data('name');
        var add_consecutive_number = $('#add_consecutive_number:checked').data('price');
        var add_backstamp = $('#add_backstamp:checked').data('price');

        var colors = [];
        $("tr[id^='Tr-']").each(function () {
            var values = {
                pin_color: $(this).data('name'),
                quantity: $(this).data('qty')
            }
            colors.push(values);
        });

        add_to_cart_data.colortype = 'lapel-pins';
        add_to_cart_data.product = $('#lapelpin_style option:selected').data('id');
        add_to_cart_data.productname = $('#lapelpin_style').val().toLowerCase();
        add_to_cart_data.size = $('#lapelpins_size').val();
        add_to_cart_data.attachmentname = $('#attachment_btn:checked').data('name');
        add_to_cart_data.consecutive_number = $('#add_consecutive_number:checked').val();
        add_to_cart_data.backstamp =  $('#add_backstamp:checked').val();
        add_to_cart_data.backstamp_text = $("#back_stamp_text").val();
        add_to_cart_data.packaging = $('#lapelpins_packaging:checked').data('name');
        add_to_cart_data.customization_location = $('input[name="customization_location"]:checked').data('title');
        add_to_cart_data.customization_date_production = $('select[name="customization_date_production"] option:selected').text();
        add_to_cart_data.customization_date_shipping = $('select[name="customization_date_shipping"] option:selected').text();
        add_to_cart_data.customization_total_days = customization_day_production + customization_day_shipping;
        add_to_cart_data.total_price = $('#price_handler_val').val();
        add_to_cart_data.total_qty = $('#qty_handler_val').val();

        add_to_cart_data.lapelpins_order = colors;
        add_to_cart_data.message = $('textarea#additional_notes').val()!="" ? $('textarea#additional_notes').val():$('textarea#additional_notes_mobile').val();
   
        add_to_cart_data.custom_image = $("#file-selected").data("imgname");
        //console.log(packaging);
    }
    function CalculateTotalPayment(){
        var totalqty = isNaN(parseInt($('#qty_handler_val').val())) ? 0:parseInt($('#qty_handler_val').val());
        var lapelpin_style = $('#lapelpin_style').val().toLowerCase();
        var lanyard_width = $('#lapelpins_size').val();
        var production_value = parseInt($('#customization_date_production').val());
        var shipping_value = parseInt($('#customization_date_shipping').val());
        var attachmentvalue = $('#attachment_btn:checked').val();
        var packagingvalue = $('#lapelpins_packaging:checked').val();
        var badge_value = $('#badge_holders').val();
        var imprint_option = $('#select-imprint-options').val();
        var backstampvalue =  parseInt($('#add_backstamp:checked').val());
        var cons_number = $('#add_consecutive_number:checked').val();
        var totalAmount = 0;
        var price = 0;

        //console.log(backstampvalue);
        // var parcedAmount = 0;
        for (let i in Lapelpindata ) {
               if( lapelpin_style == Lapelpindata[i].name ){
                for (let j in Lapelpindata[i].value ) {
                   // console.log(Lapelpindata[i]);
                    var width_val = Lapelpindata[i].value[j].size;
                    //console.log(Lapelpindata[i].value[j].size);
                    if ( lanyard_width == width_val){
                        for (let k in Lapelpindata[i].value[j].value ) {
                            //console.log( Lapelpindata[i].value[j].value[k].quantity);
                            if ( totalqty >= Lapelpindata[i].value[j].value[k].quantity){
                               // console.log("pasok sa if");
                                price = Lapelpindata[i].value[j].value[k].price;
                            }
                        }
                    }
                }
               }
        }

        if(totalqty != 0 || totalqty != ''){
           // console.log(price);
           //console.log(production_value);
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
            if (packagingvalue) {
                totalAmount += packagingvalue * totalqty;
            }

            if (cons_number){
                totalAmount += cons_number * totalqty;
            }

            if (backstampvalue) {
                totalAmount = totalAmount + backstampvalue;
            }

/*            if ($('input[name = "badge_holders_check"]').is(':checked')) {
                totalAmount += badge_value * totalqty;
            }
*/
            // if ($('input[name = "lanyard-add-imprint-items_check"]').is(':checked')) {
            //     totalAmount += (0.10 * totalqty) + 25;
            // }

            if ($('input[name = "customization_location"]:checked').val() == 'customized_in_usa'){
                totalAmount += 0.10 * totalqty;
            }

        }
        $('#price_handler').text(numberFormat(totalAmount));
        $('#price_handler_val').val(totalAmount);
    }

    function CalculateProdAndShip () {

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
        if (totalqty == 0) { 
            $('.prodopt').remove();
            $('.shipopt').remove();
            return;
        }
        if(totalqty==totalqty1){
            $('.prodopt').remove();
            $('.shipopt').remove();
            for (let j in LapelpinProdData ) {
                //console.log(LapelpinProdData[j].quantity);
                if (totalqty >= 301 && totalqty <= 10000) {
                    /*var prod_option = '' 
                                +'<option class="prodopt" value="' +parseFloat(LapelpinProdData[j].l1_d).toFixed(2)+ '" data-days="2"> 1 Day - $' +parseFloat(LapelpinProdData[j].l1_d).toFixed(2)+ '</option>'
                                +'<option class="prodopt" value="' +parseFloat(LapelpinProdData[j].l2_d).toFixed(2)+ '" data-days="2"> 2 Days - $' +parseFloat(LapelpinProdData[j].l2_d).toFixed(2)+ '</option>'
                                +'<option class="prodopt" value="' +parseFloat(LapelpinProdData[j].l4_d).toFixed(2)+ '" data-days="4"> 4 Days - $' +parseFloat(LapelpinProdData[j].l4_d).toFixed(2)+ '</option>'
                                +'<option class="prodopt" value="' +parseFloat(LapelpinProdData[j].l7_d).toFixed(2)+ '" data-days="7"> 7 Days - FREE</option>'*/
                    var prod_option = '' 
                                +'<option class="prodopt" value="0" data-days="10"> 2 Weeks - FREE</option>'
                                +'<option class="prodopt" value="100" data-days="5"> 1 Week - $100</option>'   
                    $('select[name="customization_date_production"]').append(prod_option);  
                }else if (totalqty <= 300){
                    var prod_option = '' 
                                +'<option class="prodopt" value="0" data-days="10"> 2 Weeks - FREE</option>'
                                +'<option class="prodopt" value="50" data-days="5"> 1 Week - $50</option>'   
                    $('select[name="customization_date_production"]').append(prod_option);
                }
            }

            for (let k in LapelpinShipData ) {
                            //console.log(LapelpinShipData[k]);
                /*if (totalqty >= 100 && totalqty <= 10000) {
                    var ship_option = ''
                                +'<option class="shipopt" value="' +parseFloat(LapelpinShipData[k].l1_d).toFixed(2)+ '" data-days="1"> 1 Days - $' +parseFloat(LapelpinShipData[k].l1_d).toFixed(2)+ '</option>'
                                +'<option class="shipopt" value="' +parseFloat(LapelpinShipData[k].l2_d).toFixed(2)+ '" data-days="2"> 2 Days - $' +parseFloat(LapelpinShipData[k].l2_d).toFixed(2)+ '</option>'
                                +'<option class="shipopt" value="' +parseFloat(LapelpinShipData[k].l4_d).toFixed(2)+ '" data-days="4"> 4 Days - $' +parseFloat(LapelpinShipData[k].l4_d).toFixed(2)+ '</option>'
                                +'<option class="shipopt" value="' +parseFloat(LapelpinShipData[k].l6_d).toFixed(2)+ '" data-days="6"> 6 Days - $' +parseFloat(LapelpinShipData[k].l4_d).toFixed(2)+ '</option>'
                                +'<option class="shipopt" value="' +parseFloat(LapelpinShipData[k].Intl).toFixed(2)+ '" data-days="0"> International - $' +parseFloat(LapelpinShipData[k].Intl).toFixed(2)+ '</option>'
                    $('select[name="customization_date_shipping"]').append(ship_option);    
                }*/
                if (totalqty >= 1 && totalqty <= 5000) {
                    var ship_option = ''           
                                +'<option class="shipopt" value="0" data-days="5"> 1 Week - FREE</option>'
                    $('select[name="customization_date_shipping"]').append(ship_option);    
                }
            }
        }
    $('#qty_handler_val1').val('');
    }

    function AddToQuantity(){
        var totalqty = 0;
        var parcedqty = 0;
        for (var i = 0; i < TempID; i++) {
            var qtypercolor = parseInt($('#qID-'+ i).attr('data-qty'));
            if (isNaN(qtypercolor)) { qtypercolor = 0 };
            totalqty += qtypercolor;
        }

        $('#qty_handler').text(numberFormat(totalqty, 0));
        $('#qty_handler_val').val(totalqty);
        $('#qty_handler_val1').val(totalqty);

    }

    function renderPriceChart() {
        var   style = $('#lapelpin_style').val();
        var   width = $('#lapelpins_size').val();
        var   val   = style.toLowerCase();
        console.log(Lapelpindata);
        //console.log(style+' - '+width+' - '+val);
        $('#price_chart_lapel table tr td:not(:first-child)').remove();
        $('#table_price_name_lapel').text('Pricing Guide for '+style+' '+width+' inch');
        for (let i in Lapelpindata) {
            if( val == Lapelpindata[i].name ){
                console.log(Lapelpindata[i].value);
                for (let j in Lapelpindata[i].value ) {
                    var width_val = Lapelpindata[i].value[j].size; 
                    if( width == width_val ){
                        var price_chart = Lapelpindata[i].value[j].value;
                        $.each(price_chart, function(key, data) {             
                            //console.log(key+' - '+data['price']+' - '+data['quantity']);   
                            var output_qty_tpl   = "<td>"+numberWithCommas(data['quantity'])+"</td>";
                            var output_price_tpl = "<td>"+numberFormat(data['price'])+"</td>";
                            $('#price_chart_lapel table tr:first-child').append(output_qty_tpl);
                            $('#price_chart_lapel table tr:eq(1)').append(output_price_tpl);
                        });      
                    }   
                }
            }  
        }
    }

    //reCalculating Price and Quantity
    function runCalculator(){
            AddToQuantity();
            CreateProductionAndShipping();
            CalculateTotalPayment();
    }

    function AddToSummary($landiv){
        var Size = $('#lapelpins_size');
        var PinSize = Size.val();
        var Template = $('#lapel_color_btn:checked');
        var PinTemplate = Template.data('name');
        var hasSpace = PinTemplate.indexOf(' ')>=0 ? '':'padding-top:15px!important;';
        var getqty = $('#qty_lapelpins');
        var qtyval = getqty.val();
        //var PinType = $('#lapelpin_style option:selected').val();
       // var PinTypeId = $('#lapelpin_style option:selected').data('id');
        //console.log(qtyval);
        $('.add-to-lapelpin').remove();
        if(qtyval < 1) {
            var span_message = '<span class="add-to-lapelpin select-color-alert">Quantity should not be 0!</span>';
            $(span_message).insertBefore($('#quantity_group_field'));
            return;
        } else if(qtyval > 10000){
            var span_message = '<span class="add-to-lapelpin select-color-alert">Maximum Order is 10000PCS!</span>';
            $(span_message).insertBefore($('#quantity_group_field'));
            return;
        }else {
            var color_url = ""+ Lapelpinhome +'/images/lapel-colors/'+PinTemplate.replace(' ', '-')+".png";
            //$('img#lapelpin_style_img').attr('src',""+ Lapelpinhome +"/images/"+imgval.replace(' ', '')+".png");
            //$('#lapelpin_style_img').css('background-image', 'url('+ style_url +')');
            var value = '<tr data-name="' + PinTemplate + '" data-qty="'+ qtyval +'" class="option-tr" id="Tr-' + TempID + '">'
                        + '<td>'
                        + '<div style="text-align: center;"><img src="' + color_url.toLowerCase() + '" style="width: 25px;"/></div>'
                        + '</td>' 
                        + '<td style="'+hasSpace+'">'
                        + '<div id="PinColorBox" class="color-box" data-name="'+PinTemplate+'">'
                        + '<div style="height: 100%;text-align: center;'
                        + '">'+PinTemplate+'</div>'
                        + '</div>'
                        + '</td>'  
                        + '<td style="padding-top:15px;">'
                        + '<div id="qID-' + TempID + '" data-qty="'+qtyval+'" data-name="'+PinTemplate+'" style="text-align: center;">' + numberFormat(qtyval, 0) + '</div>'
                        + '<input type="number" class="input-text fusion-one-third InpCss keyupTxtView" style="text-align: center;border: 1px solid #00b9ff !important;" id="quantity-' + TempID + '" value="' + qtyval + '">'
                        + '</td>'           
                        + '<td><a id="DelID-' + TempID + '" href="#" class="delete-selection" data-id="' + TempID + '" style="top:9px!important;" ><i class="fa fa-times"></i></a></td>'           
                        + '</tr>';
            TempID++;
            $("table#selected_color_table tbody").append(value);
            $('#lanyard-color-tab .color-wrap').removeClass('selected');
            $('#lanyard-text-color .color-wrap').removeClass('selected');
            $('#lanyard-additional-imprint-color .color-wrap').removeClass('selected');
            getqty.val('');
            runCalculator();
        }
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
                $("#qID-" + i).text(numberFormat(tempqty, 0));
                $("#qID-" + i).attr('data-qty', tempqty);
                $("#quantity-" + i).hide();
                $("#qID-" + i).show();
                runCalculator();
            }
            
        } else {
            for (var i = 0; i <= TempID; i++) {
            var tempqty = $("#qID-" + i).text().replace(",", "");
            $("#quantity-" + i).val(tempqty);
                $("#quantity-" + i).hide();
                $("#qID-" + i).show();
            }
        }
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

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $(document).ready(function(){

      $( "body" )
      //on changing lanyard style
        .on( "change", 'select[name="lapelpin_style"]', function() {
            $('select#lapelpins_size').empty();
            $('select#lapelpins_template').empty();
            $('#lapelpins_radio').empty();
            var imgval = $(this).val().toLowerCase();
            var val = $(this).val().toLowerCase();
            var k = 1;
            for (let i in Lapelpindata ) {

               if( val == Lapelpindata[i].name ){
                
                    //console.log(Lapelpindata[i].name);
                for (let j in Lapelpindata[i].value ) {
                    var size = Lapelpindata[i].value[j].size;
                    //console.log(Lapelpindata[i].template[j]);
                    $('#lapelpins_size')
                        .append($("<option></option>")
                                .attr("value",size)
                                .text(size+' Inch'));
                
                }
                for (let k in Lapelpindata[i].template) {
                        
                        var template = Lapelpindata[i].template[k].template;
                        $('#lapelpins_template')
                        .append($("<option></option>")
                                .attr("value",template)
                                .text(template));
                        var sel = k==0 ? "active-color":"";
                        var check = k==0 ? "checked":"";
                        var url = 'background-image: url("'+ Lapelpinhome +'/images/lapel-colors/'+template.replace(" ", "-").toLowerCase()+'.png")';
                        $('#lapelpins_radio').append("<label class='btn btn-primary col-sm-4 "+sel+"'>"
                            +"<span class='attach-img-wrap attachment_image'>"
                                /*+"<img src='"+ Lapelpinhome +"/images/"+template.replace(' ', '').toLowerCase()+".png'>"*/
                                +"<span class='attach-img' style='"+url+"'></span>"
                             +"</span>"
                             //+"<input type='radio' name='lapel_color_btn' id='lapel_color_btn' style='display: none;' autocomplete='off' value='"+template+"' data-name='"+template+"'>"
                            +"<input type='radio' name='lapel_color_btn' id='lapel_color_btn' "+check+" style='display:none;' autocomplete='off' value='"+template+"' data-name='"+template+"'> "
                            +"<span class='attach-text'>"+ template +"</span>"
                            +"</label>");
                        k++;        
                    //console.log(k);
                }
                $('.list-product_style li').css('display', 'none');
                $('.list-product_style #lapelpins-img-'+imgval.replace(' ', '-')+'').css('display', 'block');
                var style_url = '"'+ Lapelpinhome +'/images/'+imgval.replace(' ', '')+'.png"';
                //$('img#lapelpin_style_img').attr('src',""+ Lapelpinhome +"/images/"+imgval.replace(' ', '')+".png");
                $('#lapelpin_style_img').css('background-image', 'url('+ style_url +')');
               }
            }
            renderPriceChart();
            CalculateTotalPayment();
        })

        //on adding color and quantity
        .on('click', '#add_lapelpins_to_selection', function (e) {
            e.preventDefault();
            //console.log("test");
            $('.add-to-lanyard').remove();
            if ($('#lapelpins_color_and_quantity').find('div') != undefined) {
                //adding the color to the summary table
                //console.log($('#lapelpins_color_and_quantity').find('div'));
                AddToSummary($('#lapelpins_color_and_quantity').find('div'));

            } else {
               var span_message = '<span class="add-to-lanyard select-color-alert">Select Color First</span>';
                $(span_message).insertAfter($('#lapelpins_color_and_quantity'));
            }
                    
         })

        //on deleting color in the summary
        .on('click', '.delete-selection', function (e) {
            e.preventDefault();
            var data_id = $(this).data('id');
            var $row = $(this).closest('tr');
            //Remove it on the additional color table list
            $row.remove();
            runCalculator();
        })

        //on clicking message style and clipart
        .on('change', 'input[name="message_input"]', function(){
            var mivalue = $('input[name="message_input"]:checked').val();


            if (mivalue == 'custom_logo') {
                $('#ForLanyard').hide();
                $('#forCustomLogo').show();
            } else {
                $('#ForLanyard').show();
                $('#forCustomLogo').hide();
            }
        })

        //on choosing fontstyle
        .on('click', 'ul#selectedfont li', function (e) {           
            var fontStyle = $(this).find('.fontvalue').val();
            $('#selectFont').attr( "style", "font-family:" + fontStyle );
            $('#selectFont').attr( "value", fontStyle );
        })

        //on clicking the any attachments 
        .on('change', '#attachment_btn', function () {
            var attachmentvalue = $(this).val();
            $('#attachment_btn_price').remove();
            if (attachmentvalue != 0) {
                var span_message = '<span class="copy-attach-price" id="attachment_btn_price">+$'+attachmentvalue+' each</span>';
                // var totalqty = parseInt($('#qty_handler_val').val());
                    // if(totalqty != 0 || totalqty != ''){
                $(span_message).insertBefore($(this));
                    // }
            }
            CalculateTotalPayment();
            
        })

        .on('change', '#lapelpins_size', function(){
            renderPriceChart();
            CalculateTotalPayment();
        })

        .on('change', '#lapel_color_btn', function () {
            var attachmentvalue = $(this).val();
            //$('#lapel_color_btn').remove();
            $('.btn-primary').removeClass('active-color');
            $(this).closest('.btn-primary')
                        .addClass('active-color');
 
        })

        //on checking additional options
        .on('change', 'input[name = "lapelpins_packaging"]', function () {
            var attachmentvalue = $(this).val();
            
            $('#lapelpins_packaging_price').remove();
            if (attachmentvalue != 0) {
                var span_message = '<span class="copy-attach-price" id="lapelpins_packaging_price">+$'+attachmentvalue+' each</span>';
                // var totalqty = parseInt($('#qty_handler_val').val());
                    // if(totalqty != 0 || totalqty != ''){
                $(span_message).insertBefore($(this));
                    // }
            }
            CalculateTotalPayment();
        })

        .on('change', 'input[name = "add_consecutive_number"]', function () {
            var attachmentvalue = $(this).val();
            //console.log(attachmentvalue);
            $('#add_consecutive_price').remove();
            if (attachmentvalue != 0) {
                var span_message = '<span class="copy-attach-price-attachment" id="add_consecutive_price">+$'+attachmentvalue+' each</span>';
                // var totalqty = parseInt($('#qty_handler_val').val());
                    // if(totalqty != 0 || totalqty != ''){
                $(span_message).insertBefore($(this));
                    // }
            }
            CalculateTotalPayment();
        })

        .on('change', 'input[name = "add_backstamp"]', function () {
            var attachmentvalue = $(this).val();
            //console.log(attachmentvalue);
            $('#add_backstamp_price').remove();
            if (attachmentvalue != 0) {
                var span_message = '<span class="copy-attach-price-attachment" id="add_backstamp_price">+$'+attachmentvalue+'.00 fixed</span>';
                // var totalqty = parseInt($('#qty_handler_val').val());
                    // if(totalqty != 0 || totalqty != ''){
                $(span_message).insertBefore($(this));
                    // }
                
                $(".back-stamp-text").toggle();
                $("#back_stamp_text").val("");
            }
            CalculateTotalPayment();
        })

        //on choosing the production and shipping || customization location
        //on choosing the production and shipping || customization location
        .on('change', '#customization_date_production, #customization_date_shipping, input[name = "customization_location"]', function () {
            CalculateProdAndShip();
            CalculateTotalPayment();
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

        //file upload
        /*.on('click', '.files-data', function(e){
            $(this).val("");
        })*/
        .on('change', '.files-data', function(e){
            e.preventDefault;
                var fd = new FormData();
                var files_data = $('.files-data'); 
             
                $.each($(files_data), function(i, obj) {
                    $.each(obj.files,function(j,file){
                        console.log(j);
                        fd.append('files[' + j + ']', file);
                    })
                });
                
                fd.append('action', 'cvf_upload_lapelpin_files');   

                var file = this.files[0];
                var name = file.name;
                var size = file.size;
                var type = file.type;

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
                    url: Lapelpin.ajax_url,
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function(xhr){

                        var allowedFiles = [".png", ".jpeg", ".gif", ".cdr", ".psd", ".ai", ".pdf", ".eps", ".bmp", ".tiff",".jpg"];
                        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");

                        if(size > 2000000){

                            /*$('.fileinput-button')
                                    .find('.image-upload')
                                    .attr('src', '')
                                    .css({display: 'none'});*/
                            
                            //$('#clipart_error_warning').text('Maximum file size is 2MB.').css({color: '#E22B2B'});
                            //$('#clipart_imagename').attr('src', '').css({display:'none'});

                            alert("Maximum file size is 2MB.");

                            files_data.wrap('<form>').closest('form').get(0).reset();
                            files_data.unwrap();

                            return false;
                        }else if (!regex.test(name.toLowerCase())){

                            /*$('.fileinput-button')
                                    .find('.image-upload')
                                    .attr('src', '')
                                    .css({display: 'none'});*/

                            //$('#clipart_error_warning').text('Allowed file types are CDR, JPG, JPEG, PSD, AI, PDF, PNG, GIF, EPS, TIFF, BMP').css({color: '#E22B2B'});
                            //$('#clipart_imagename').attr('src', '').css({display:'none'});

                            alert("Allowed file types are CDR, JPG, JPEG, PSD, AI, PDF, PNG, GIF, EPS, TIFF, BMP");

                            files_data.wrap('<form>').closest('form').get(0).reset();
                            files_data.unwrap();
                            
                            return false;
                        }else{

                            $('#clipart_error_warning').text('');
                            $('#clipart_imagename').attr('src', '').css({display:'none'});
                            $("#file-selected").data("imgname","");

                            $('.fileinput-button')
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
                                    .css({'margin-left': '10px'})
                        }

                    },
                    success: function(response){
                        if(response.response == 'ERROR'){

                            $('#clipart_error_warning').text(response.error).css({color: '#E22B2B'});;                            
                            $('#clipart_imagename').attr('src', '').css({display:'none'});

                            $('.fileinput-button')
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
                                    .addClass('nothing')
                                    .end()
                                    .find('.nothing')
                                    .css({'margin-left': '0'});
         
                            $("#file-selected").data("imgname", response.ImageName);

                            //console.log('false'+' - '+response.response+' - '+response.error);
                        } else if (response.response == 'SUCCESS') {
                            $('#clipart_error_warning').text('Image Uploaded - ' + response.filename ).css({display:'inline-block', color: '#008000'});
                            //$('#clipart_imagename').attr('src', '/wp-content/uploads/lapelpin-upload/'+response.ImageName).css({display:'inline-block', width:'40px'});

                            $('.fileinput-button')
                                .find('.image-upload')
                                .attr('src', '/wp-content/themes/wristbandcreation/images/custom-logo-3-v1.png')
                                .css({display: 'inline-block'})
                                .end()
                                .find('span')
                                .css({'padding-left': '0'})
                                .text('')
                                .end()
                                .find('.fa-spinner')
                                .removeClass('fa-spinner')
                                .addClass('nothing')
                                .end()
                                .find('.nothing')
                                .css({'margin-left': '0'});

                            $("#file-selected").data("imgname", response.ImageName);
                            
                            //console.log('true'+' - '+response.ImageName+' - '+name);
                        }

                        /*e.stopPropagation();
                        e.preventDefault();*/
                    }
            });
        })

        //add to cart
        .on('click', '#lapelpin_add_to_cart', function (e) {
            var customization_day_production = $('select[name="customization_date_production"] option:selected').data('days');
            var customization_day_shipping = $('select[name="customization_date_shipping"] option:selected').data('days');
            CollectData();

            //console.log(customization_day_production);
            //console.log(customization_day_shipping);            

            //console.log(add_to_cart_data); 

            $('.add-to-lapelpin').remove();
            $('.add-to-production').remove();
            $('.add-to-shipping').remove();
            if ( add_to_cart_data.total_qty == 0 ) {
                var span_message = '<span class="add-to-lapelpin select-color-alert">Enter Quantity First</span>';
                $(span_message).insertBefore($('#quantity_group_field'));
                $("#qty_lapelpins").focus();
                return;
            }

            if (add_to_cart_data.backstamp != undefined){
                if(add_to_cart_data.backstamp_text == ""){
                    var span_message = '<span class="add-to-lapelpin select-color-alert" style="width: 100%;">Enter Back Stamp text First</span>';
                    $(span_message).insertBefore($('.back-stamp-text .form-group label'));
                    $('#back_stamp_text').focus();
                    return;
                }
            }

            if (customization_day_production == null || customization_day_shipping == null) {

                if ( customization_day_production == null ) {
                    var span_message = '<span class="add-to-production select-color-alert">Select Production Time First</span>';
                        $(span_message).insertAfter($('#customization_date_production'));
                }

                if ( customization_day_shipping == null ) {
                    var span_message = '<span class="add-to-shipping select-color-alert">Select Shipping Time First</span>';
                        $(span_message).insertAfter($('#customization_date_shipping'));
                }
                return;
            }
            var $self = $(this),
                        $icon = $self.find('.fa'),
                        $button_text = $self.find('.fusion-button-text-left');

            console.log(add_to_cart_data);
                
            $icon.removeClass('fa-shopping-cart');
            $icon.addClass('fa-spinner');
            $self.removeClass('btn-add-to-cart');
            $self.addClass('btn-adding-to-cart');
            $button_text.text('Add to Cart');     
            $.ajax({
                url: Lapelpins_data.ajax_url,
                type: 'POST',
                data: {meta: add_to_cart_data, action: 'lapelpin_ajax_add_to_cart'},
                dataType: 'JSON',
            }).done(function (response) {
                var type = 'success',
                    title = 'Success';
                console.log("test");
                $('.addtocartmessage').remove();
                if (!response.success) {
                    type = 'error';
                    title = 'Error';
                }

                if (response.success){
                    window.location = "/cart";
                }
            });
        })

    Onload();
    });
});