a
@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Why Choose Us Section</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Item</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.why-choose-us.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


            <div class="form-group">
                <label>Icon</label> <br>
                <button class="btn btn-primary p-3" role="iconpicker" name="icon"></button>
            </div>


            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>



            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control"></textarea>
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
            <a href="{{ route('admin.why-choose-us.index') }}">

                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
            </form>
        </div>
      </div>


</section>

@endsection
