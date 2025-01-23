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
                                <div class="card-title">Create Category</div>
                            </div>

                            <!-- Form -->
                            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation">
                                @csrf
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Category Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Slug -->
                                        <div class="col-md-6">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                name="slug" value="{{ old('slug') }}" required />
                                            @error('slug')
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
                                    <button class="btn btn-info" type="submit">Submit Category</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
