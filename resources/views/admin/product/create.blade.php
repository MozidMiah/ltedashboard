@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="card-header">
                            <h3 class="card-title">Add New Product</h3>
                        </div>

                        <div class="row">
                            <!-- Product Name -->
                            <div class="col-md-4 mb-3">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Product Name">
                                @error('name')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Short Description<span class="text-danger">*</span></label>
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter Short Description">
                                @error('description')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Description<span class="text-danger">*</span></label>
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter Description">
                                @error('description')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-header">
                            <h3 class="card-title">General Information</h3>
                        </div>


                            <div class="row">
                                {{-- Success Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <!-- Category -->
                                <div class="col-md-4 mb-3">
                                    <label>Category <span class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Subcategory -->
                                <div class="col-md-4 mb-3">
                                    <label>Subcategory</label>
                                    <select name="subcategory_id" class="form-control">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $sub)
                                            <option value="{{ $sub->id }}"
                                                {{ old('subcategory_id') == $sub->id ? 'selected' : '' }}>
                                                {{ $sub->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Brand -->
                                <div class="col-md-4 mb-3">
                                    <label>Brand</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Color</label>
                                    <select name="color_id" class="form-control">
                                        <option value="">Select Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Unit -->
                                <div class="col-md-4 mb-3">
                                    <label>Unit</label>
                                    <select name="unit_id" class="form-control">
                                        <option value="">Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Size -->
                                <div class="col-md-4 mb-3">
                                    <label>Size</label>
                                    <select name="size_id" class="form-control">
                                        <option value="">Select Size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Image -->
                                {{-- <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="image" class="form-control dropify" />
                                </div> --}}

                                <!-- Status -->
                                {{-- <div class="col-md-4 mb-3">
                                    <label>Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" id="active"
                                            value="1" checked>
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" id="inactive"
                                            value="0">
                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                    </div>
                                </div> --}}
                                <!-- SKU -->
                                <div class="col-md-6 mb-3">
                                    <label>Product SKU *</label>
                                    <input type="text" name="sku" class="form-control" required>
                                </div>

                            </div>

                            <div class="card-header">
                                <h3 class="card-title">Price Information</h3>
                            </div>

                            <div class="row">
                                <!-- Buying Price -->
                                <div class="col-md-4 mb-3">
                                    <label>Buying Price *</label>
                                    <input type="number" name="buying_price" class="form-control"
                                        placeholder="Buying Price" required>
                                </div>

                                <!-- Selling Price -->
                                <div class="col-md-4 mb-3">
                                    <label>Selling Price *</label>
                                    <input type="number" name="selling_price" class="form-control" value="10" required>
                                </div>

                                <!-- Discount Price -->
                                <div class="col-md-4 mb-3">
                                    <label>Discount Price</label>
                                    <input type="number" name="discount_price" class="form-control" value="0">
                                </div>

                                <!-- Current Stock -->
                                <div class="col-md-4 mb-3">
                                    <label>Current Stock Quantity *</label>
                                    <input type="number" name="stock_qty" class="form-control"
                                        placeholder="Current Stock Quantity" required>
                                </div>

                                <!-- Minimum Order Quantity -->
                                <div class="col-md-4 mb-3">
                                    <label>Minimum Order Quantity</label>
                                    <input type="number" name="min_qty" class="form-control"
                                        placeholder="Minimum Order Quantity">
                                </div>

                            </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save
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
