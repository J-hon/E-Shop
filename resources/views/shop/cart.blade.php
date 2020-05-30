@extends('main')

@section('title', '| Bag')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>My Bag</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                Bag
            </div>
        </div>
    </div>
    <!-- Page info end -->

   {{--Cart--}}
    <div class="cart_section">
        <div class="section_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="cart_container">
                            <table id="cart" class="container table table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $total = 0 ?>

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)

                                        <?php $total += $details['price'] * $details['quantity'] ?>

                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs">
                                                        <img src="{{ asset('/images/products/'.$details['image']) }}" width="100" height="100" class="img-responsive"/>
                                                    </div>

                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">${{ $details['price'] }}</td>
                                            <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                                            </td>
                                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td>
                                            <a href="{{ route('shop') }}" class="btn btn-outline-dark">
                                                <i class="fa fa-angle-left"></i> Back to shop
                                            </a>
                                            <a href="#" class="btn btn-outline-dark">Checkout</a>
                                        </td>
                                        <td colspan="2" class="hidden-xs"></td>
                                        <td class="hidden-xs text-center"><strong>Total: ${{ $total }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--End cart--}}

@endsection

@section('scripts')

    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('/update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            swal({
                title: "Are you sure you want to remove item?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '{{ url('/remove-from-cart') }}',
                            method: "DELETE",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                window.location.reload();
                            }
                        });

                        swal("item successfully removed from cart", {
                            icon: "success",
                        });
                    }
                });

        });

    </script>

@endsection
