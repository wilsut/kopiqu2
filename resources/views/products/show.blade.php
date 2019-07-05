@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="container products">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="card">
                <div class="row no-gutters">
                    <aside class="col-sm-5 border-right">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <div> <a href="{{ $product->image }}" data-fancybox=""><img src="{{ $product->image }}"></a></div>
                            </div> <!-- slider-product.// -->
                        </article> <!-- gallery-wrap .end// -->
                    </aside>
                    <aside class="col-sm-7">
                        <article class="p-5">
                            <h3 class="title mb-3">{{ $product->name }}</h3>

                            <div class="mb-3">
                                <var class="price h3 text-warning">
                                    <span class="currency">Rp </span><span class="num">{{ number_format($product->price, 0, ',', '.') }}</span>
                                </var>
                            </div> <!-- price-detail-wrap .// -->
                            <dl>
                                <dt>Description</dt>
                                <dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco </p></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-2">Weight</dt>
                                <dd class="col-sm-10">200 g</dd>
                            </dl>
                            <hr>
                            <dl class="row align-items-center">
                                <dt class="col-sm-2">Quantity </dt>
                                <dd class="col-sm-10">
                                    <input type="number" class="form-control quantity" name="qty" value="1" min="1" style="max-width: 100px;"/>
                                </dd>
                            </dl>  <!-- item-property .// -->
                            <hr>
                            <button class="btn btn-outline-primary add-to-cart" data-id="{{ $product->id }}"><i class="fas fa-shopping-cart"></i> Add to cart</button>
                        </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
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
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("article").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
