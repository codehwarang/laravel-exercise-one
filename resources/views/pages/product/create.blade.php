@extends('layouts.main')

@section('content')
    <main class="container py-5 d-flex flex-column gap-3">
        <header class="d-flex align-items-end justify-content-between">
            <div class="d-flex gap-3 align-items-center">
                <i class="ri-dashboard-line fs-4"></i>
                <h4 class="m-0">Dashboard - Add New Product</h4>
            </div>
        </header>
        <form action="{{ route('dashboard.product.store') }}" class="d-flex flex-column gap-4 w-50" method="post" enctype="multipart/form-data">
            @csrf
            <section>
                <h6 class="text-muted">Product Information</h6>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="sku">SKU</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}">
                        @error('sku')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="name">Product Name</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="type your product name...">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="description">Description</label>
                    </div>
                    <div class="col">
                        <textarea class="form-control" id="description" name="description" placeholder="give your product a description...">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="price">Price</label>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        </div>
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="category">Category</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" placeholder="type the category...">
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </section>
            <section>
                <h6 class="text-muted">Product Images</h6>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="thumbnail_image">Thumbnail Image</label>
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image">
                        @error('thumbnail_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="additional_images">
                            <span>Additional Images</span>
                            <small class="text-muted"> (optional)</small>
                        </label>
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" id="additional_images" name="additional_images[]" multiple>
                        @error('additional_images')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </section>
            <section class="d-grid">
                <button type="submit" class="btn btn-dark">Add New Product</button>
            </section>
        </form>
    </main>
@endsection
