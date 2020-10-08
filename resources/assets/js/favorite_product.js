function addFavoriteProduct(productId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var product_id = productId;

    $.ajax({
        type: 'post',
        url: 'addfavourite/' + product_id,
        data: {
            'product_id': productId,
        },
        success: function () {
            $('#addFavoriteProduct-' + product_id).hide();
            $('#deletefavourite-' + product_id).show();
            alertify.success('Product has been added to your favorite');
        },
        error: function (XMLHttpRequest) {

        }
    });
}

function deleteFavoriteProduct(productId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var product_id = productId;

    $.ajax({
        type: 'get',
        url: 'addfavourite/' + product_id,
        data: {
            'product_id': productId,
        },
        success: function () {
            $('#addFavoriteProduct-' + product_id).show();
            $('#deletefavourite-' + product_id).hide();
            alertify.success('Product has been removed in your favorite');
        },
        error: function (XMLHttpRequest) {

        }
    });
}
