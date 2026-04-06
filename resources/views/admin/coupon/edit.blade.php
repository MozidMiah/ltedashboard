@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Coupon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Coupon</li>
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
                        <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- HEADER -->
                            <div class="card-header">
                                <h3 class="card-title">Coupon Information</h3>
                            </div>

                            <div class="card-body">
                                {{-- Success Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <div class="row">
                                    <!-- Coupon Code -->
                                    <div class="col-md-4 mb-3">
                                        <label>Coupon Code <span class="text-danger">*</span></label>
                                        <input type="text" name="code" value="{{ old('code', $coupon->code) }}"
                                            class="form-control @error('code') is-invalid @enderror"
                                            placeholder="Enter Coupon Code">
                                        @error('code')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Discount Type -->
                                    <div class="col-md-4 mb-3">
                                        <label>Discount Type <span class="text-danger">*</span></label>
                                        <select name="discount_type"
                                            class="form-control @error('discount_type') is-invalid @enderror">
                                            <option value="amount"
                                                {{ old('discount_type', $coupon->discount_type) == 'amount' ? 'selected' : '' }}>
                                                Amount</option>
                                            <option value="percent"
                                                {{ old('discount_type', $coupon->discount_type) == 'percent' ? 'selected' : '' }}>
                                                Percent</option>
                                        </select>
                                        @error('discount_type')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Discount -->
                                    <div class="col-md-4 mb-3">
                                        <label>Discount <span class="text-danger">*</span></label>
                                        <input type="number" name="discount"
                                            value="{{ old('discount', $coupon->discount) }}"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            placeholder="Enter Discount">
                                        @error('discount')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Minimum Amount -->
                                    <div class="col-md-4 mb-3">
                                        <label>Minimum Order Amount</label>
                                        <input type="number" name="min_amount"
                                            value="{{ old('min_amount', $coupon->min_amount) }}" class="form-control">
                                    </div>

                                    <!-- User Limit -->
                                    <div class="col-md-4 mb-3">
                                        <label>Limit For Single User</label>
                                        <input type="number" name="user_limit"
                                            value="{{ old('user_limit', $coupon->user_limit) }}" class="form-control"
                                            placeholder="exm: 5">
                                    </div>

                                    <!-- Max Discount -->
                                    <div class="col-md-4 mb-3">
                                        <label>Maximum Discount Amount</label>
                                        <input type="number" name="max_discount"
                                            value="{{ old('max_discount', $coupon->max_discount) }}" class="form-control"
                                            placeholder="exm: 300">
                                    </div>

                                    <!-- Start Date & Time -->
                                    <div class="col-md-3 mb-3">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start_date"
                                            value="{{ old('start_date', $coupon->start_at ? $coupon->start_at->format('Y-m-d') : '') }}"
                                            class="form-control @error('start_date') is-invalid @enderror">
                                        @error('start_date')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Start Time <span class="text-danger">*</span></label>
                                        <input type="time" name="start_time"
                                            value="{{ old('start_time', $coupon->start_at ? $coupon->start_at->format('H:i') : '') }}"
                                            class="form-control @error('start_time') is-invalid @enderror">
                                        @error('start_time')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Expire Date & Time -->
                                    <div class="col-md-3 mb-3">
                                        <label>Expire Date <span class="text-danger">*</span></label>
                                        <input type="date" name="expire_date"
                                            value="{{ old('expire_date', $coupon->expire_at ? $coupon->expire_at->format('Y-m-d') : '') }}"
                                            class="form-control @error('expire_date') is-invalid @enderror">
                                        @error('expire_date')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Expire Time <span class="text-danger">*</span></label>
                                        <input type="time" name="expire_time"
                                            value="{{ old('expire_time', $coupon->expire_at ? $coupon->expire_at->format('H:i') : '') }}"
                                            class="form-control @error('expire_time') is-invalid @enderror">
                                        @error('expire_time')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- FOOTER -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Coupon
                                </button>

                                <a href="{{ route('coupon.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
