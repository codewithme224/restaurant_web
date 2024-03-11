a
@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Why Choose Us Section</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h4>Update Item</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.why-choose-us.update', $whyChooseUs->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="form-group">
                <label>Icon</label> <br>
                <button data-icon="{{ $whyChooseUs->icon }}" class="btn btn-primary p-3" role="iconpicker" name="icon"></button>
            </div>


            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ $whyChooseUs->title }}">
            </div>



            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control">{{ $whyChooseUs->short_description }}</textarea>
            </div>


            <div class="form-group">
                <label>Status</label>
                <select name="status" id="" class="form-control">
                    <option value="">Select Status</option>
                    <option @selected($whyChooseUs->status === 1) value="1">Active</option>
                    <option @selected($whyChooseUs->status === 0) value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.why-choose-us.index') }}">

                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
            </form>
        </div>
      </div>


</section>

@endsection
