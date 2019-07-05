@extends('admin/admin')

@section('content')
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Customer</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Shipping</th>
            <th scope="col">Total</th>
            <th scole="col" style="min-width: 80px;"></th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0 ?>
        @foreach($orders as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->status }}</td>
                <td>Rp {{ number_format($item->shipping, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ '/admin/order/' . $item->id }}"><i class="material-icons">&#xe04a;</i></a>
                    <a href="{{ '/admin/order/edit/' . $item->id }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
{{--                    <a href="#" class="delete-item" title="Delete" data-toggle="tooltip" data-id="{{ $item->id }}"><i class="material-icons">&#xE872;</i></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".delete-item").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('admin/order/delete') }}',
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
