a
@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Slider</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Slider</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>

            <div class="form-group">
                <label>Offer</label>
                <input type="text" class="form-control" name="offer">
            </div>


            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label>Sub Title</label>
                <input type="text" class="form-control" name="subtitle">
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Buttom Link</label>
                <input type="text" class="form-control" name="button_link">
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
            <a href="{{ route('admin.slider.index') }}">

                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
            </form>
        </div>
      </div>


</section>

@endsection
