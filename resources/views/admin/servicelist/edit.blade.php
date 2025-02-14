@extends('admin.layout.layout')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row"></div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-info card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Edit Service</div>
                            </div>

                            <!-- Begin Form -->
                            <form action="{{ route('servicelist.update', $service->id) }}" method="POST"
                                enctype="multipart/form-data" class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row g-3">

                                        <!-- Service Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Service Name</label>
                                            <input type="text"
                                                class="form-control @error('service_name') is-invalid @enderror"
                                                name="service_name"
                                                value="{{ old('service_name', $service ? $service->service_name : '') }}"
                                                required />
                                            @error('service_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Slug Name</label>
                                            <input type="text" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                value="{{ old('slug', $service->slug) }}" required />
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="col-md-6">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" />
                                            <small class="form-text text-muted">Leave blank to keep current image.</small>

                                            @if ($service && $service->image)
                                                <img src="{{ asset($service->image) }}" alt="Slider Image" class="mt-2"
                                                    style="width:100px;height:auto;">
                                            @endif

                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status" required>
                                                <option value="active"
                                                    {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="inactive"
                                                    {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control textarea @error('description') is-invalid @enderror" name="description">{{ old('description', $service ? $service->description : '') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Update Service</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
