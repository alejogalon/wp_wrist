jQuery(function ($) {
    'use strict'; 

    var add_to_cart_data = {};

    function CollectData(){

        var init_price = $('#free-sample-addcart').data("price"),
            ship_price = $('#free-sample-addcart').data("shipping_price");

            add_to_cart_data.init_price = init_price;
            add_to_cart_data.total_price = init_price + ship_price;
            add_to_cart_data.total_qty = $('#free-sample-addcart').data("qty");
            add_to_cart_data.colortype = $('#free-sample-addcart').data("colortype");
            add_to_cart_data.product = $('#free-sample-addcart').data("prodid");
            add_to_cart_data.shipping_price = ship_price;

    }


    $(document).ready(function(){

      $( "body" ) 

      .on('click', '#free-sample-addcart', function (e) {
            var $self = $(this),
                        $icon = $self.find('.fa'),
                        $button_text = $self.find('.fusion-button-text-left');
                        
                    $icon.removeClass('fa-shopping-cart');
                    $icon.addClass('fa-spinner');
                    $self.removeClass('btn-add-to-cart');
                    $self.addClass('btn-adding-to-cart');
                    $button_text.text('Add to Cart');
                    CollectData();

            $.ajax({
                        url: AddToCart_func.ajax_url,
                        type: 'POST',
                        data: {meta: add_to_cart_data, action: 'free_ajax_add_to_cart'},
                        dataType: 'JSON',
                    }).done(function (response) {
                        var type = 'success',
                                title = 'Success';

                        $('.addtocartmessage').remove();
                        if (!response.success) {
                            type = 'error';
                            title = 'Error';
                        }
                        console.log(response);

                        if (response.success)
                            {
                                window.location = "/cart";
                            }
                    });
        })


    });

});