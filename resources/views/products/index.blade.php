@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container products">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap">
                            <img src="{{ $product->image }}">
                            <a class="btn-overlay" href="{{ url('/'.$product->id) }}"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div>
                        <figcaption class="info-wrap">
                            <a href="{{ url('/'.$product->id) }}" class="title">{{ $product->name }}</a>
                            <div class="action-wrap">
                                <button class="btn btn-primary btn-sm float-right add-to-cart" data-id="{{ $product->id }}">Add to cart</button>
                                <div class="price-wrap h5">
                                    <span class="price-new">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                </div> <!-- price-wrap.// -->
                            </div> <!-- action-wrap -->
                        </figcaption>
                    </figure> <!-- card // -->
                </div> <!-- col // -->
            @endforeach
        </div><!-- End row -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('add-to-cart') }}',
                method: "post",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: 1},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
