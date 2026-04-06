@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Coupon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Coupon</li>
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
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf

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
                                        <input type="text" name="code" value="{{ old('code') }}"
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
                                            <option value="amount">Amount</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                        @error('discount_type')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Discount -->
                                    <div class="col-md-4 mb-3">
                                        <label>Discount <span class="text-danger">*</span></label>
                                        <input type="number" name="discount" value="{{ old('discount') }}"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            placeholder="Enter Discount">
                                        @error('discount')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Minimum Order Amount</label>
                                        <input type="number" name="min_amount" value="{{ old('min_amount') }}"
                                            class="form-control">
                                    </div>

                                    <!-- User Limit -->
                                    <div class="col-md-4 mb-3">
                                        <label>Limit For Single User</label>
                                        <input type="number" name="user_limit" value="{{ old('user_limit') }}"
                                            class="form-control" placeholder="exm: 5">
                                    </div>

                                    <!-- Max Discount -->
                                    <div class="col-md-4 mb-3">
                                        <label>Maximum Discount Amount</label>
                                        <input type="number" name="max_discount" value="{{ old('max_discount') }}"
                                            class="form-control" placeholder="exm: 300">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start_date"
                                            class="form-control @error('start_date') is-invalid @enderror">
                                    </div>

                                    <!-- Start Time -->
                                    <div class="col-md-3 mb-3">
                                        <label>Start Time <span class="text-danger">*</span></label>
                                        <input type="time" name="start_time"
                                            class="form-control @error('start_time') is-invalid @enderror">
                                    </div>

                                    <!-- Expire Date -->
                                    <div class="col-md-3 mb-3">
                                        <label>Expire Date <span class="text-danger">*</span></label>
                                        <input type="date" name="expire_date"
                                            class="form-control @error('expire_date') is-invalid @enderror">
                                    </div>

                                    <!-- Expire Time -->
                                    <div class="col-md-3 mb-3">
                                        <label>Expire Time <span class="text-danger">*</span></label>
                                        <input type="time" name="expire_time"
                                            class="form-control @error('expire_time') is-invalid @enderror">
                                    </div>
                                </div>
                            </div>

                            <!-- FOOTER -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Coupon
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
