a
@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Products</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Product</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="form-group">
                <label for="">Image</label>
                <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="image-upload" />
                </div>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category" id="" class="form-control select2">

                    <option value="">Select</option>
                    @foreach ($categories as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label>Offer Price</label>
                <input type="text" class="form-control" name="offer_price" value="{{ old('offer_price') }}">
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control" id=""  >{{ old('short_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Long Description</label>
                <textarea name="long_description" class="form-control summernote" id="" >{{ old('long_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Sku</label>
                <input type="text" class="form-control" name="sku" value="{{ old('sku') }}">
            </div>
            <div class="form-group">
                <label>Seo Title</label>
                <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
            </div>
            <div class="form-group">
                <label>Seo Description</label>
                <textarea name="seo_description" class="form-control" id="" >{{ old('seo_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Show At Home</label>
                <select name="show_at_home" id="" class="form-control">

                    <option value="1">Yes</option>
                    <option selected value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" id="" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.category.index') }}">

                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
            </form>
        </div>
      </div>


</section>

@endsection
