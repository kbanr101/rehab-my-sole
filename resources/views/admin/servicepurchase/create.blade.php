@extends('admin.layout.layout')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-info card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Add Service Amount</div>
                            </div>

                            <!-- Form -->
                            <form action="{{ route('servicepurchase.store') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation">
                                @csrf
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Category Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Delivery Amount</label>
                                            <input type="text"
                                                class="form-control @error('delivery_amount') is-invalid @enderror"
                                                name="delivery_amount" value="{{ old('delivery_amount') }}" required />
                                            @error('delivery_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Charge Amount -->
                                        <div class="col-md-6">
                                            <label class="form-label">Charge Amount</label>
                                            <input type="text"
                                                class="form-control @error('charge_amount') is-invalid @enderror"
                                                name="charge_amount" value="{{ old('charge_amount') }}" required />
                                            @error('charge_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status" required>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="inactive"
                                                    {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Submit Service</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
