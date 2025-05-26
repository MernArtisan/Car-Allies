<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Autixir - Car Services and Auto Mechanic</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('web/img/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('web/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark/dark.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('web/css/font-icons.css') }}">

    @yield('styles')
</head>

<body>
    @include('web.includes.header')
    <div class="body-wrapper">
        @yield('content')
    </div>
    @include('web.includes.footer')
    <script src="{{ asset('web/js/plugins.js') }}"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>
    <script src="{{ asset('web/js/contact.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('scripts')
    @if (session('error'))
        <script>
            var errorSound = new Audio('{{ asset('admin/sounds/error.mp3') }}');
            errorSound.play();

            toastr.error(`{{ session('error') }}`, 'Error', {
                closeButton: true,
                progressBar: true,
                timeOut: 4000,
                positionClass: 'toast-bottom-left', // ✅ Change position
                toastClass: 'toast toast-dark'
            });
        </script>
    @endif

    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}', 'Success');
        @endif



        // @if ($errors->any())
            //     @foreach ($errors->all() as $error)
                //         toastr.error("{{ $error }}");
            //     @endforeach
        // @endif
    </script>
    <form id="addToCartForm" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="qty" id="qty">
        <input type="hidden" name="product_id" id="product_id">
    </form>
    <!-- Add To Cart Modal -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="modal-product-img mb-3">
                                            <img id="modal-product-image" src="" alt="Product Image"
                                                style="max-height: 150px;">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5 id="modal-product-name" class="text-dark">Product Name</h5>
                                            <p class="added-cart text-success">
                                                <i class="fa fa-check-circle"></i> Successfully added to your cart!
                                            </p>
                                            <div class="btn-wrapper mt-3">
                                                <a href="{{ route('cart.index') }}" class="btn btn-success">View
                                                    Cart</a>
                                                <a href="{{ url('/checkout') }}"
                                                    class="btn btn-outline-primary">Checkout</a>
                                            </div>
                                        </div>
                                        <div class="additional-info d-none mt-4">
                                            <p>Use code <b>WELCOME10</b> at checkout for 10% off your first order!</p>
                                            <img src="{{ asset('img/icons/payment.png') }}" alt="Payment Methods">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('.add-to-cart-link').click(function (e) {
                e.preventDefault();
                let $this = $(this);
                let productId = $this.data('product-id');

                // Look for qty input inside closest .product-block
                let qtybutton = $this.closest('.product-block').find('.qty-input').val() || 1;

                $.ajax({
                    type: 'POST',
                    url: "{{ route('cart.add') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        qtybutton: qtybutton,
                    },
                    success: function (response) {
                        if (response.success && response.product) {
                            $('#modal-product-name').text(response.product.name);
                            $('#modal-product-image').attr('src', response.product.image);

                            let message = response.product.action === 'added'
                                ? 'Successfully added to your cart!'
                                : 'Quantity updated in your cart!';

                            $('.added-cart').html('<i class="fa fa-check-circle text-success"></i> ' + message);

                            const modal = new bootstrap.Modal(document.getElementById('add_to_cart_modal'));
                            modal.show();

                            $('#cart-count').load(location.href + " #cart-count");
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 400 && xhr.responseJSON?.error) {
                            toastr.error(xhr.responseJSON.error, 'Out of Stock');
                        } else {
                            toastr.error('Something went wrong. Try again.', 'Error');
                        }
                    }
                });
            });
        });

        const loggedIn = {{ auth()->check() ? 'true' : 'false' }};

        $(document).on('click', '.wishlist-btn', function () {
            const btn = $(this);
            const productId = btn.data('id');

            if (!loggedIn) {
                toastr.error('Please Login First To Manage Your Wishlist');
                return;
            }

            $.ajax({
                url: "{{ route('wishlist.toggle') }}",
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    const icon = btn.find('i');

                    if (res.status === 'added') {
                        icon.removeClass('far').addClass('fas heart-red');
                        toastr.success('Product added to wishlist!');
                    } else if (res.status === 'removed') {
                        icon.removeClass('fas heart-red').addClass('far');
                        toastr.info('Product removed from wishlist.');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 401) {
                        toastr.error('Please login to manage your wishlist.');
                    } else {
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });
        });
    </script>

</body>
<style>
    .toast-success {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-left: 5px solid #00cc66;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    form#headerserviceSearchForm .nice-select {
        line-height: unset;
    }
</style>

</html>