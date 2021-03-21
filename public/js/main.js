(function ($) {
    "use strict";

    toastr.options.positionClass = "toast-top-center";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 768) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header slider
    $('.header-slider').slick({
        autoplay: true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });


    // Product Slider 4 Column
    $('.product-slider-4').slick({
        autoplay: true,
        infinite: true,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    // Product Slider 3 Column
    $('.product-slider-3').slick({
        autoplay: true,
        infinite: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    // Product Detail Slider
    $('.product-slider-single').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.product-slider-single-nav'
    });
    $('.product-slider-single-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        asNavFor: '.product-slider-single'
    });


    // Brand Slider
    $('.brand-slider').slick({
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        swipeToSlide: true,
        centerMode: true,
        focusOnSelect: false,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 300,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    // Review slider
    $('.review-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    // Widget slider
    $('.sidebar-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });


    // Cart Quantity Change
    $('#cart-items').on('click', '.qty button', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        cart = cart.map(item => item.id === $(this).data("id") ? {...item, unit: newVal} : item).filter(val => val.unit > 0);
        localStorage.setItem(shop, JSON.stringify(cart));
        generate_cart_data();
    });

    // Remove Item From Cart
    $("#cart-items").on("click", ".remove-item", function(){
        cart = cart.filter(val => val.id !== $(this).data("id"));
        localStorage.setItem(shop, JSON.stringify(cart));
        $("#cart-count").text(cart.length);
        generate_cart_data();
    });


    // Shipping address show hide
    $('.checkout #shipto').change(function () {
        if($(this).is(':checked')) {
            $('.checkout .shipping-address').slideDown();
        } else {
            $('.checkout .shipping-address').slideUp();
        }
    });


    // Payment methods show hide
    $('.checkout .payment-method .custom-control-input').change(function () {
        if ($(this).prop('checked')) {
            var checkbox_id = $(this).attr('id');
            $('.checkout .payment-method .payment-content').slideUp();
            $('#' + checkbox_id + '-show').slideDown();
        }
    });

    // Load Cart
    if (typeof(shop) != 'undefined'){
        var cart = localStorage.getItem(shop) ? JSON.parse(localStorage.getItem(shop)) : [];
        $("#cart-count").text(cart.length);
    }

    // Add to Cart
    $(".add-to-cart").on("click", function(){
        var check = cart.filter(val => val.id === $(this).data("id"));
        if (check.length === 0){
            var item = {id: $(this).data("id"), name: $(this).data("name"), price: $(this).data("price"), image: $(this).data("image"), unit: 1};
            cart.push(item);
            $("#cart-count").text(cart.length);
            localStorage.setItem(shop, JSON.stringify(cart))
        }

        $(this).prop("disabled", true);
        toastr.success($(this).data("name") + " Added to cart");
    });

    if ($("#cart-items")[0]){
        generate_cart_data();
    }


    // Cart Information display
    function generate_cart_data(){
        var total = 0;
        var items = cart.reduce((acc, val, i) => {

            total += (val.price * val.unit);
            return acc + `<tr>
                            <td>
                                <div class="img">
                                    <a href="${val.image}" target="_blank"><img src="${val.image}" alt="${val.name}"></a>
                                    <p>${val.name}</p>
                                </div>
                            </td>
                            <td>$${val.price}</td>
                            <td>
                                <input type="hidden" name="items[${i}][id]" value="${val.id}">
                                <input type="hidden" name="items[${i}][price]" value="${val.price}">
                                <input type="hidden" name="items[${i}][name]" value="${val.name}">
                                <div class="qty">
                                    <button type="button" data-id="${val.id}" class="btn-minus"><i class="fa fa-minus"></i></button>
                                    <input type="text" name="items[${i}][unit]" value="${val.unit}">
                                    <button type="button"  data-id="${val.id}" class="btn-plus"><i class="fa fa-plus"></i></button>
                                </div>
                            </td>
                            <td>$${val.price * val.unit}</td>
                            <td><button type="button" data-id="${val.id}" class="remove-item"><i class="fa fa-trash"></i></button></td>
                        </tr>`
        }, '');

        if (items === ''){
            items = '<tr> <td colspan="5" class="py-4"> Your Cart is Empty </td> </tr>';
            $("#checkout-btn").prop("disabled", true);
        }
        else {
            $("#checkout-btn").prop("disabled", false);
        }

        var dispatch = total > 0 ? 20 : 0;
        $("#item-total").text("$" + total);
        $("#item-dispatch").text("$" + dispatch);
        $("#item-grand-total").text("$" + (dispatch + total));
        $("#cart-items").html(items);
    }

    // Check out Summary
    if ($("#checkout-summary")[0]){

        var total = cart.reduce((acc, val) => acc + (val.price * val.unit), 0 );
        var dispatch = total > 0 ? 20 : 0;

        $("#item-total").text("$" + total);
        $("#item-dispatch").text("$" + dispatch);
        $("#item-grand-total").text("$" + (dispatch + total));
    }

    // Placed Order Notification Pop up
    if (typeof(shop) != 'undefined' && sessionStorage.getItem(shop)){
        toastr.success(sessionStorage.getItem(shop));
        sessionStorage.removeItem(shop);
    }

    // Checkout Submission
    $("#place-order").on("submit", function(e){
        e.preventDefault();

        if ($(this)[0].checkValidity()){
            var fdata = Object.fromEntries((new FormData($(this)[0])).entries());
            fdata.items = cart;
            $("#place-order :input").prop("disabled", true);
            $.post(`/api/shop/${shop.substr(2)}/order`, fdata, function(res){
                if (res.status && res.status === "success"){
                    initiateFlutterwaveCharge(res.data, function(data){
                        // Callback on success
                        console.log("success", data);
                        localStorage.removeItem(shop);
                        sessionStorage.setItem(shop, "Your Order was placed successful");
                        setTimeout(function(){
                            location.href = `/shop/${shop.substr(2)}`;
                        }, 1000);
                    });
                    return;
                }
                else if (res.message){
                    toastr.error(res.message);
                }
                else{
                    toastr.error("Error Processing your request");
                }
                $("#place-order :input").prop("disabled", false);

            }).fail(function(e){
                $("#place-order :input").prop("disabled", false);
                var message = e.responseJSON.message ? e.responseJSON.message  : "Unable to process your request";
                toastr.error(message);
            });
        }
    });

    // Activate Shop
    $("#activate-shop").on("click", function(){
        $.post(`/api/shop/${shop.substr(2)}/activate`, function(res){
            if (res.status && res.status === "success"){
                initiateFlutterwaveCharge(res.data, function(data){
                    // Callback on success
                    console.log("success", data);
                    sessionStorage.setItem(shop, "Hurray!!! Your Shop is Live..");
                    setTimeout(function(){
                        location.href = `/merchant/dashboard`;
                    }, 1000);
                });
                return;
            }
            else if (res.message){
                toastr.error(res.message);
            }
            else{
                toastr.error("Error Processing your request");
            }

        }).fail(function(e){
            var message = e.responseJSON.message ? e.responseJSON.message  : "Unable to process your request";
            toastr.error(message);
        });
    });

    /* Flutterwave Charge pop */
    function initiateFlutterwaveCharge(data, callback){

        FlutterwaveCheckout({
            public_key: data.publicKey,
            tx_ref: data.gatewayRef,
            amount: data.amount,
            currency: data.currency,
            country: data.country,
            customer: {
              email: data.email,
              phone_number: data.phone,
              name: data.first_name + ' ' + data.last_name,
            },
            callback: callback,
            onclose: function() {
                $("#place-order :input").prop("disabled", false);
            },
            customizations: {
              title: data.shop,
              description: data.description
            },
          });
    }



})(jQuery);

