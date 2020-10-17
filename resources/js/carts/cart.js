function addToCart(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/addToCart/" + id
    }).done(function (response)
    {
        renderCart(response.totalQuantity);
        renderMoney( "$"+response.totalPrice.toFixed(3));
        alertify.success('Product has been added to cart');
    });
}

function removeProductCart(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'delete',
        url: "/products/" + id,
    }).done(function (response)
    {
        renderCart(response.totalQuantity);
        renderMoney(response.totalPrice.toFixed(3));
        alertify.success('Product has been deleted');
        $('#table-container').children("#row-container-"+ id).remove();

    });
}

function updateProductCart(id, quantity) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PUT',
        url: "/products/" + id,
        data: {
            "quantity": Number(quantity),
        }
    }).done(function (response)
    {
        renderCart(response.totalQuantity);
        renderMoney( "$"+response.totalPrice.toFixed(3));
        alertify.success('Product has been updated');
    });
}

function renderCart(quantity)
{
    $('#total_quantity_show').text(quantity);
    $('#show_quantity').text(quantity);
}

function renderMoney(money)
{
    $('#header__cart__price').text(money);
    $('#show_price').text(money);
}

function onCartItemQuantityChanged(id, isIncrease)
{
    var oldValue = $('#quantity-'+id).val();
    if (isIncrease)
    {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        if (oldValue > 0)
        {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    updateProductCart(id, newVal);
    $('#quantity-'+id).val(newVal);
    var constPrice = $('#price-'+id).val();
    var totalPriceForItems = (Number(constPrice) * Number(newVal)).toFixed(3);
    $('#show_total_quantity_for_each_items-'+id).text(totalPriceForItems);

}
