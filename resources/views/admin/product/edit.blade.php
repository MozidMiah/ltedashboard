@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">

                        <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Product Name">
                                    @error('name')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Short Description</label>
                                    <input type="text" name="short_description"
                                        value="{{ old('short_description', $product->short_description) }}"
                                        class="form-control" placeholder="Enter Short Description">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Description</label>
                                    <input type="text" name="description"
                                        value="{{ old('description', $product->description) }}" class="form-control"
                                        placeholder="Enter Description">
                                </div>
                            </div>

                            <div class="card-header">
                                <h3 class="card-title">General Information</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Subcategory</label>
                                    <select name="subcategory_id" class="form-control">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $sub)
                                            <option value="{{ $sub->id }}"
                                                {{ $product->subcategory_id == $sub->id ? 'selected' : '' }}>
                                                {{ $sub->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Brand</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Color</label>
                                    <select name="color_id" class="form-control">
                                        <option value="">Select Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}"
                                                {{ $product->color_id == $color->id ? 'selected' : '' }}>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Unit</label>
                                    <select name="unit_id" class="form-control">
                                        <option value="">Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                {{ $product->unit_id == $unit->id ? 'selected' : '' }}>
                                                {{ $unit->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Size</label>
                                    <select name="size_id" class="form-control">
                                        <option value="">Select Size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}"
                                                {{ $product->size_id == $size->id ? 'selected' : '' }}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>SKU</label>
                                    <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                                </div>
                            </div>

                            <div class="card-header">
                                <h3 class="card-title">Price Information</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Buying Price</label>
                                    <input type="number" name="buying_price" class="form-control"
                                        value="{{ $product->buying_price }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Selling Price</label>
                                    <input type="number" name="selling_price" class="form-control"
                                        value="{{ $product->selling_price }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Discount Price</label>
                                    <input type="number" name="discount_price" class="form-control"
                                        value="{{ $product->discount_price }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Stock Quantity</label>
                                    <input type="number" name="stock_qty" class="form-control"
                                        value="{{ $product->stock_qty }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Minimum Quantity</label>
                                    <input type="number" name="min_qty" class="form-control"
                                        value="{{ $product->min_qty }}">
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update
                                    Product</button>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
