@extends('layouts.admin')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                Details
                            </button>

                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel">
                        </div>
                        <div class="tab-pane fade border p-3 show active" id="image" role="tabpanel"
                             aria-labelledby="image-tab">
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Product Description</label>
                                <input type="text" name="description" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Product Status</label><br>
                                <input type="checkbox" name="status" style="width: 50px; height: 50px;"/>
                            </div>
                            <div class="mb-3">
                                <label>Product Price</label>
                                <input type="number" name="price" class="form-control"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Upload Product Image(Max 1 image)</label>
                            <input type="file" name="image[]" class="form-control"/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
