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
                        <div class="card-header">
                            <h3 class="card-title">Product Form</h3>
                        </div>

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                {{-- Success Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <!-- Product Name -->
                                <div class="form-group">
                                    <label>Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="form-group">
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
                                <div class="form-group">
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
                                <div class="form-group">
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

                                <!-- Price -->
                                <div class="form-group">
                                    <label>Price <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" min="0" name="price"
                                        value="{{ old('price') }}"
                                        class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" min="0" name="quantity" value="{{ old('quantity') }}"
                                        class="form-control">
                                </div>

                                <!-- Discount Price -->
                                <div class="form-group">
                                    <label>Discount Price</label>
                                    <input type="number" step="0.01" min="0" name="discount_price"
                                        value="{{ old('discount_price') }}"
                                        class="form-control @error('discount_price') is-invalid @enderror"
                                        placeholder="Enter Discount Price">
                                    @error('discount_price')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="image" class="form-control dropify" />
                                </div>

                                <!-- Status -->
                                <div class="form-group">
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
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Product</button>
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
