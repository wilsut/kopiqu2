@extends('admin/admin')

@section('content')
    <form method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $order->id }}"/>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" disabled value="{{ $order->user->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $order->address }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="custom-select" name="status">
                    <option value="Pending" {{ "Pending" == $order->status ? 'selected' : '' }}>Pending</option>
                    <option value="Paid" {{ "Paid" == $order->status ? 'selected' : '' }}>Paid</option>
                    <option value="Shipping" {{ "Shipping" == $order->status ? 'selected' : '' }}>Shipping</option>
                    <option value="Completed" {{ "Completed" == $order->status ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Shipping</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="shipping" placeholder="Shipping" value="{{ number_format($order->shipping, 0, '', '') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="total" placeholder="Total" value="{{ number_format($order->total, 0, '', '') }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
