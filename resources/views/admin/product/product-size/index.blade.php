@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products Variants  ({{ $product->name }})</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="my-3 btn btn-primary">Go back</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                      <h4>Create Product Size</h4>

                    </div>
                    <div class="card-body">

                            <form action="{{ route('admin.product-size.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" class="form-control" name="price">

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>

                    </div>
                </div>

                <div class="card card-primary">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)

                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $size->name }}</td>
                                    <td>{{ $size->price }}</td>
                                    <td>
                                        <a href='{{ route('admin.product-size.destroy', $size->id) }}' class='btn btn-danger delete-item' mx-4><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @if (count($sizes) == 0)
                                    <tr>
                                        <td colspan="4" class="text-center">No data found</td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                      <h4>Create Product Options</h4>

                    </div>
                    <div class="card-body">

                            <form action="{{ route('admin.product-option.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" class="form-control" name="price">

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>

                    </div>
                </div>

                <div class="card card-primary">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)

                                <tr>
                                    <td>{{ ++$loop->index}}</td>
                                    <td>{{ $option->name }}</td>
                                    <td>{{ $option->price }}</td>
                                    <td>
                                        <a href='{{ route('admin.product-option.destroy', $option->id) }}' class='btn btn-danger delete-item' mx-4><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @if (count($options) == 0)
                                    <tr>
                                        <td colspan="4" class="text-center">No data found</td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </section>
@endsection


