@extends('admin.layout.layout')
@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!-- Flash Messages -->


        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row"></div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Post List</h3>
                                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            {{-- <th>Slug</th> --}}
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $post)
                                            <tr>
                                                <td>{{ $posts->firstItem() + $key }}</td>
                                                <!-- Correct numbering with pagination -->
                                                <td>{{ $post->category['name'] }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->short_description }}</td>
                                                {{-- <td>{{ $post->slug }}</td> --}}
                                                <td>
                                                    <img src="{{ asset($post->image) }}" alt="Post Image"
                                                        style="width:50px;height:50px">
                                                </td>
                                                <td>
                                                    <a href="{{ route('posts.edit', $post->slug) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('blogDetailPage', $post->slug) }}" target="_blank"
                                                        class="btn btn-warning btn-sm">View</a>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <!-- Render Pagination Links -->
                                <div class="d-flex justify-content-center">
                                    {{ $posts->links('pagination::bootstrap-4') }}
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
    <style>
        .card-header::after {
            display: none;
        }
    </style>
@stop
