@extends('admin.layout.layout')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row"></div>
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
                                <div class="card-title">Edit Post</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form action="{{ route('posts.update') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <div class="card-body">
                                    <div class="row g-3">

                                        <!-- Category -->
                                        <div class="col-md-4">
                                            <label class="form-label">Select Category</label>
                                            <select class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id" required>
                                                <option value="" disabled>Select a category</option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ (old('category_id') ?? $post->category_id) == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Title -->
                                        <div class="col-md-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" value="{{ old('title', $post->title) }}" required />
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Slug -->
                                        <div class="col-md-4">
                                            <label class="form-label">Slug Name</label>
                                            <input type="text" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                value="{{ old('slug', $post->slug) }}" required />
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Image -->
                                        <div class="col-md-12">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" />
                                            <small class="form-text text-muted">Leave blank to keep the current
                                                image.</small>
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                                class="mt-2" style="width:100px;height:auto;">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Short Description -->
                                        <div class="col-md-12">
                                            <label class="form-label">Short Description</label>
                                            <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description">{{ old('short_description', $post->short_description) }}</textarea>
                                            @error('short_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control textarea @error('description') is-invalid @enderror" name="description">{{ old('description', $post->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- SEO Title -->
                                        <div class="col-md-12">
                                            <label class="form-label">SEO Title</label>
                                            <input type="text"
                                                class="form-control @error('seo_title') is-invalid @enderror"
                                                name="seo_title" value="{{ old('seo_title', $post->seo_title) }}" />
                                            @error('seo_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- SEO Keywords -->
                                        <div class="col-md-6">
                                            <label class="form-label">SEO Keywords</label>
                                            <textarea class="form-control @error('seo_keywords') is-invalid @enderror" name="seo_keywords" rows="4">{{ old('seo_keywords', $post->seo_keywords) }}</textarea>

                                            @error('seo_keywords')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- SEO Description -->
                                        <!-- SEO Description -->
                                        <div class="col-md-6">
                                            <label class="form-label">SEO Description</label>
                                            <textarea class="form-control @error('seo_description') is-invalid @enderror" name="seo_description" rows="4">{{ old('seo_description', $post->seo_description) }}</textarea>

                                            @error('seo_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Update Post</button>
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
