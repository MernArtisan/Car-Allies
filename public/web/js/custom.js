$(document).ready(function () {
    $('.add-to-cart-link').click(function (e) {
        e.preventDefault();  
        var productId = $(this).data('product-id');  
        var isBuyNow = $(this).hasClass('buy-now');
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.add') }}",  
            data: {
                _token: '{{ csrf_token() }}',  
                product_id: productId,
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.success,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        background: '#333',
                        color: '#fff',
                        iconColor: '#1dd1a1',
                    });
                    $('#cart-count').load(location.href + " #cart-count");
                }
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                Swal.fire({
                    title: 'Error!',
                    text: "Error - " + errorMessage,
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    background: '#333',
                    color: '#fff',
                    iconColor: '#e74c3c',
                });
            }
        });
    });
});