@extends('admin/admin')

@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $product->id }}"/>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $product->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $product->description }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Weight</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="weight" placeholder="Weight" value="{{ $product->weight }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="custom-select" name="category_id">
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="image">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
