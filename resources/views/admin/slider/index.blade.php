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
                                <h3 class="card-title">Slider List</h3>
                                <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">Add Slider</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($slider as $key => $val)
                                            <tr>
                                                <!-- Fix numbering (if paginated) -->
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $val->title }}</td>
                                                <td>{!! $val->description !!}</td>

                                                <!-- Fix image path issue -->
                                                <td>
                                                    <img src="{{ asset($val->image) }}" alt="Slider Image"
                                                        style="width:50px;height:50px;">
                                                </td>

                                                <td>
                                                    <!-- Fix route names if this is for sliders -->
                                                    <a href="{{ route('slider.edit', $val->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>

                                                    <a href="{{ route('blogDetailPage', $val->id) }}" target="_blank"
                                                        class="btn btn-warning btn-sm">View</a>

                                                    <form action="{{ route('slider.destroy', $val->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this slider?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <br>
                                <!-- Render Pagination Links -->
                                <div class="d-flex justify-content-center">
                                    {{ $slider->links('pagination::bootstrap-4') }}
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
