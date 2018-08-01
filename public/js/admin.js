
$(document).ready(function(){

    $('.js-logout').on('click', function(){

    	$.ajax({
            url: 'admin.php',
            type: 'POST',
            data: {
                action: "logout",
                // cart: cartjson,
            },
            success: function (data ) {

            },
        }).done(function(data) {

            console.log(data);
            window.location.href = data;
        });
	});

    $('.js-deleteProduct').on('click', function(){

        $productId = $(this).attr('js-productId');
        $productImage = $(this).attr('js-productImage');
        $.ajax({
            url: 'admin.php',
            type: 'POST',
            data: {
                action: "delete_product",
                productId: $productId,
                productImage: $productImage,
            },
            success: function (data ) {

            },
        }).done(function(data) {

            // console.log(data);
            window.location.href = 'admin?tab=products';
        });
    });

})

