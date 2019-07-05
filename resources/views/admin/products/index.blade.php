@extends('admin/admin')

@section('content')
    <a href="/admin/product/create" class="btn btn-primary">Create</a>
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col" width="400px">Description</th>
            <th scope="col">Weight</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
            <th scole="col" style="min-width: 80px;"></th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0 ?>
        @foreach($products as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->weight }}</td>
                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->category->name }}</td>
                <td><img src="{{ $item->image }}" height="200px" /></td>
                <td>
                    <a href="{{ '/admin/product/edit/' . $item->id }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <a href="#" class="delete-item" title="Delete" data-toggle="tooltip" data-id="{{ $item->id }}"><i class="material-icons">&#xE872;</i></a>
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
                    url: '{{ url('admin/product/delete') }}',
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
