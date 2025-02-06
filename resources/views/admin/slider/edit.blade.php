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
                                <div class="card-title">Edit Slider</div>
                            </div>

                            <!-- Begin Form -->
                            <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation">
                                @csrf

                                <input type="hidden" name="id" value="{{ $slider ? $slider->id : '' }}">

                                <div class="card-body">
                                    <div class="row g-3">

                                        <!-- Title -->
                                        <div class="col-md-12">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" value="{{ old('title', $slider ? $slider->title : '') }}"
                                                required />
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="col-md-12">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" />
                                            <small class="form-text text-muted">Leave blank to keep current image.</small>

                                            @if ($slider && $slider->image)
                                                <img src="{{ asset($slider->image) }}" alt="Slider Image" class="mt-2"
                                                    style="width:100px;height:auto;">
                                            @endif

                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control textarea @error('description') is-invalid @enderror" name="description">{{ old('description', $slider ? $slider->description : '') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Update Slider</button>
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
