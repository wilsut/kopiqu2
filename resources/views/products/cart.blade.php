@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Quantity</th>
                <th style="width:15%" class="text-center">Subtotal</th>
                <th style="width:15%"></th>
            </tr>
            </thead>
            <tbody>

            <?php
                $total = 0;
                $shipping = 0;
            ?>

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)

                    <?php
                        $total += $details['price'] * $details['quantity'];
                        $shipping += $details['weight'] * $details['quantity'];
                    ?>

                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif

            <?php
                $shipping = ceil($shipping / 1000) * 5000;
            ?>

            </tbody>
            <tfoot>
    {{--        <tr class="visible-xs">--}}
    {{--            <td class="text-center"><strong>Total Rp {{ $total }}</strong></td>--}}
    {{--        </tr>--}}
            <tr>
    {{--            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>--}}
                <td colspan="3" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Subtotal</strong></td>
                <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td colspan="3" class="hidden-xs"></td>
                <td class="text-center"><strong>Shipping </strong></td>
                <td><strong>Rp {{ number_format($shipping, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td colspan="3" class="hidden-xs"></td>
                <td class="text-center"><strong>Total </strong></td>
                <td><strong>Rp {{ number_format($total + $shipping, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td colspan="4" class="hidden-xs"></td>
                <td><a href="checkout" class="btn btn-primary">Checkout</a></td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
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

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "delete",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
