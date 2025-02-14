@extends('admin.layout.layout')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    {{-- <div class="col-sm-6">
                        <h3 class="mb-0">General Form</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">General Form</li>
                        </ol>
                    </div> --}}
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row g-4">


                    <!--begin::Col-->
                    <div class="col-md-12">
                        <!--begin::Form Validation-->
                        <div class="card card-info card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Add Service</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form action="{{ route('servicelist.store') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation">
                                @csrf
                                <div class="card-body">
                                    <div class="row g-3">


                                        <!-- service_name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Service Name</label>
                                            <input type="text"
                                                class="form-control @error('service_name') is-invalid @enderror"
                                                name="service_name" value="{{ old('service_name') }}" required />
                                            @error('service_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Slug -->
                                        <div class="col-md-4">
                                            <label class="form-label">Slug Name</label>
                                            <input type="text" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                value="{{ old('slug') }}" required />
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <!-- Image -->
                                        <div class="col-md-6">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" />
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control textarea @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Submit Slider</button>
                                </div>
                            </form>

                            <!--end::Form-->
                        </div>
                        <!--end::Form Validation-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@stop
