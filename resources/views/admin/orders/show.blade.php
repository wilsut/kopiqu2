@extends('admin/admin')

@section('content')
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">Customer</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Shipping</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->status }}</td>
            <td>Rp {{ number_format($order->shipping, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
        </tr>
        </tbody>
    </table>

    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0 ?>
        @foreach($order->orderitems as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
