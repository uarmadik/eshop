$(document).ready(function() {

    // menu
    $( function() {
        $( "#menu" ).menu();
    } );

    //menu new
    // $("#leftside-navigation .sub-menu > a").click(function(e) {
    //     $("#leftside-navigation ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
    //         e.stopPropagation()
    // })



    $("#leftside-navigation .sub-menu ").click(function(e) {


        if ($(this).children("ul").is(':visible')) {

            $(this).children("ul").hide(200);
            $(this).children("span.menu_arrow").css({"transform": "rotate(0)", "top": "25px"});

        } else {

            $(this).children("ul").show(200);
            $(this).children("span.menu_arrow").css({"transform": "rotate(180deg)", "top": "20px"});
        }

        e.stopPropagation();
        // e.preventDefault();

    })



    // gallery
    $(function () {
        $('.gallery').gallery();
    });

    // cart
    
    function showCart(cart) {
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

    function openCart() {
        alert('opencart');
    }

    function clearCart() {
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function (result) {

                if (!result) {
                    alert('error');
                }
                showCart(result);
                getCartQty();
            },
            errors: function () {
                alert('error');
            }

        });
    }

    function getCartQty() {
        $.ajax({
            url: '/cart/get-cart-qty',
            type: 'GET',
            success: function (result) {
                console.log('cart qty = ' + result);
                var value;
                if (result > 0) {
                    value = ' (' + result + ')';
                } else {
                    value = '';
                }
                $('#openCart span').html(value);
            },
            errors: function () {
                console.log('cart qty - Error');
            }
        });




    };

    getCartQty();

    $('.add_to_cart').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $('#productQty').val();

        $.ajax({
            url: '/cart/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function (result) {

                if (!result) {
                    alert('error');
                }
                getCartQty();
                showCart(result);
            },
            errors: function () {
                alert('error');
            }
        });
    });

    $('#cart_clear').on('click', function () {
        clearCart();
        getCartQty();
    });

    $('#cart .modal-body').on('click', '.del-item', function () {

        var id = $(this).data('id');

        $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function (result) {

                if (!result) {
                    alert('error');
                }
                getCartQty();
                showCart(result);
            },
            errors: function () {
                alert('error');
            }
        });

    })

    $('#openCart').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function (result) {

                if (!result) {
                    alert('error');
                }
                showCart(result);
            },
            errors: function () {
                alert('error');
            }
        });
    })


});