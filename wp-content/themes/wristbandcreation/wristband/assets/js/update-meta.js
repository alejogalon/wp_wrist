jQuery(document).ready(function ($) {
    var update_data = {};

    if($("#shipping_first_name").val()!='' || $("#shipping_last_name").val()!='' || $("#shipping_company").val()!='' || $("#shipping_address_1").val()!='' || $("#shipping_city").val()!='' || $("#shipping_country").attr('data-country')!=""){
      $('#ship-to-different-address-checkbox').attr('checked','checked');
      $("#shipping_first_name, #shipping_last_name, #shipping_company, #shipping_address_1, #shipping_city, #shipping_postcode").attr('required',true);
      if($("#shipping_country").attr('data-country')!=""){
        var country = $("#shipping_country").attr('data-country');
        $("#shipping_country option:selected").removeAttr('selected');
        $("#shipping_country option[value="+country+"]").prop("selected", "selected");

        $("#shipping_state").trigger('change');
        $("#shipping_state").on('change', function(){
          if($(this).attr('data-state')!=""){
            var state = $(this).attr('data-state');
            $('#shipping_state option[value='+state+']').prop("selected", "selected");
            //$('#shipping_state').val(state);
          }
        });
      }
    }else{
      $('.shipping_address').hide();  
    }
    
    $('#ship-to-different-address-checkbox').on('change', function(e){
    if ($(this).prop('checked')) {
          $('.shipping_address').show();
          $("#shipping_first_name, #shipping_last_name, #shipping_company, #shipping_address_1, #shipping_city, #shipping_postcode").attr('required',true);
          $('.select-arrow').hide();
          if($("#shipping_country").attr('data-country')==""){
            $("#shipping_country").trigger('change');
            $("#shipping_country").on('change', function(){
                console.log($('#shipping_country ').val());
            });
            $("#shipping_state").trigger('change');
            $("#shipping_state").on('change', function(){
              if($(this).attr('data-state')!=""){
                var state = $(this).attr('data-state');
                $('#shipping_state option[value='+state+']').prop("selected", "selected");
              }
            });

          }
        }
        else {
          $('.shipping_address').hide();
          $("#shipping_first_name, #shipping_last_name, #shipping_company, #shipping_address_1, #shipping_city, #shipping_postcode").removeAttr('required');
        }
    });

    if($("#billing_country").attr('data-country')!=""){
      var country = $("#billing_country").attr('data-country');
      $("#billing_country option:selected").removeAttr('selected');
      $("#billing_country option[value="+country+"]").prop("selected", "selected");
      $("#billing_state").trigger('change');
      $("#billing_state").on('change', function(){
        if($(this).attr('data-state')!=""){
          var state = $(this).attr('data-state');
          //$("#billing_state option:selected").removeAttr('selected');
          $('#billing_state option[value='+state+']').prop("selected", "selected");
        }
      });
    }

    $('#place_order').on('click', function(e){
      e.preventDefault(); 
      var ref = $('#save-meta-form').find("[required]");
      var empty = false;
      $('.woocommerce .container').find('ul.woocommerce-error').remove();  
      $('p.terms').find('ul.woocommerce-error').remove();
      $(ref).each(function(){
         if ( $(this).val() == '' )
         {
            var err = '<ul class="woocommerce-error" style="padding: 0;"><li>Required field should not be empty.</li></ul>'
            $('.woocommerce .container').prepend($(err));
            $(this).css("cssText", "border: 1px solid red !important;");
            $(this).focus();
            empty = true;
            e.preventDefault();
            return false;
         }
      });
      if (empty==false) {
        if($('#terms:checked').length == 0){    
          var err = '<ul class="woocommerce-error" style="width: auto; margin: 0 auto;"><li>You must accept our Terms &amp; Conditions.</li></ul>'
          $('p.terms').append($(err));
          $('#terms').focus();
          e.preventDefault();
          return false;
        }
      }
      if (empty==false) {
        $('#save-meta-form').trigger('submit');
      }
    });

    $('#save-meta-form').on('submit', function(e){
      e.preventDefault(); 
      localStorage.clear();
      //$('#status-meta').hide();
      var update_data = {
        _shipping_first_name: '',
        _shipping_last_name: '',
        _shipping_company: '',
        _shipping_country: '',
        _shipping_address_1: '',
        _shipping_address_2: '',
        _shipping_city: '',
        _shipping_state: '',
        _shipping_postcode: '',
      };
      var bs = $("#s2id_billing_state #select2-chosen-2").text();
      $('#billing_state option:contains('+bs+')').prop("selected", "selected");  

      var ss = $("#s2id_shipping_state #select2-chosen-4").text();
      $('#shipping_state option:contains('+ss+')').prop("selected", "selected");  

      update_data.id = $("#wbc_update_meta").attr("data-id");
      update_data._billing_first_name = $("#billing_first_name").val();
      update_data._billing_last_name = $("#billing_last_name").val();
      update_data._billing_company = $("#billing_company").val();
      update_data._billing_country = $("#billing_country").val();
      update_data._billing_address_1 = $("#billing_address_1").val();
      update_data._billing_address_2 = $("#billing_address_2").val();
      update_data._billing_city = $("#billing_city").val();
      update_data._billing_state = $("#billing_state").val();
      update_data._billing_postcode = $("#billing_postcode").val();
      update_data._billing_email = $("#billing_email").val();
      update_data._billing_phone = $("#billing_phone").val();
      update_data._order_notes = $("#order_comments").val();

      if ($('#ship-to-different-address-checkbox').prop('checked')) {
        update_data._shipping_first_name = $("#shipping_first_name").val();
        update_data._shipping_last_name = $("#shipping_last_name").val();
        update_data._shipping_company = $("#shipping_company").val();
        update_data._shipping_country = $("#shipping_country").val();
        update_data._shipping_address_1 = $("#shipping_address_1").val();
        update_data._shipping_address_2 = $("#shipping_address_2").val();
        update_data._shipping_city = $("#shipping_city").val();
        update_data._shipping_state = $("#shipping_state").val();
        update_data._shipping_postcode = $("#shipping_postcode").val();
      }
      console.log(update_data);
      //$("#wbc_update_meta").text('Saving...');
      $('html,body').css('cursor','wait');
      $('#place_order').attr('disabled',true);
      $("#place_order").val('Saving Data...');
       $.ajax({
        type: "POST",
        url: meta_ajax.customajax,
        data: {
          action: "update_meta",
          meta: update_data,
        },
        success: function( response ) {
          $("#wbc_update_meta").text('Save');
          $('html,body').css('cursor','pointer');
          $('#place_order').removeAttr('disabled');
          console.log(response);          
          $('#order_review').submit();
           
        }
      });
     
    });
});
