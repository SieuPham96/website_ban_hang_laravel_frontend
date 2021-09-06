function addToCart(event){
    event.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        type: "GET",
        url: url,
        success: function(data){
            if( data.code === 200 ){
                alert('Thêm sản phẩm thành công');
            }
        },
        error: function(){

        }
    })
}

function cartUpdate(event){
    event.preventDefault();
    let urlUpdateCart = $('.update-cart-url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();
    $.ajax({
        type: 'GET',
        url: urlUpdateCart,
        data: {
            id: id, 
            quantity: quantity
        },
        success: function(data){
            if( data.code === 200){
                $('.cart_wrapper').html(data.show_cart);
                alert('Cập nhật thành công');
                location.reload();
            }
        },
        error: function(){

        }
    });
}

function cartDelete(event){
    event.preventDefault();
    let urlDelete = $('.cart').data('url');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: urlDelete,
        data: { id: id },
        success: function(data){
            if( data.code === 200){
                $('.cart_wrapper').html(data.show_cart);
                alert('Xóa thành công');
                location.reload();
            }
        },
        error: function(){

        }
    });
    
}

$( function() {
    $('.add-to-cart').on('click', addToCart);
    $(document).on('click', '.cart-update', cartUpdate);
    $(document).on('click', '.cart-delete', cartDelete);
})

