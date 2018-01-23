console.log('TEST AJAX');

$("#testAjax").on('click', function (event) {
    // alert('click');
    event.preventDefault();
    $.ajax({
        url: "/admin/product/test",
        data: {

        },
        success: function( result ) {
            console.log("result");
            console.log(result);
        }
    });
})


