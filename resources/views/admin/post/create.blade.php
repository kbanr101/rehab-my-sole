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
                    <div class="col-12">
                        <div class="callout callout-info">
                            {{-- For detailed documentation of Form visit
                            <a href="https://getbootstrap.com/docs/5.3/forms/overview/" target="_blank"
                                rel="noopener noreferrer" class="callout-link">
                                Bootstrap Form
                            </a> --}}
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->

                    <!--begin::Col-->
                    <div class="col-md-12">
                        <!--begin::Form Validation-->
                        <div class="card card-info card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Create Post</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form action="{{ route('posts.store') }}" class="needs-validation" novalidate>
                                <!--begin::Body-->
                                @csrf
                                <div class="card-body">
                                    <!--begin::Row-->
                                    <div class="row g-3">
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                value="" name="title" required />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustom02" class="form-label">Slug Name</label>
                                            <input type="text" name="slug" class="form-control"
                                                id="validationCustom02" value="" required />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-12">
                                            <label for="validationCustomUsername" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control"
                                                id="inputGroupFile02" />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-12">
                                            <label for="validationCustom03" class="form-label">Description</label>

                                            <textarea class="textarea" name="content"></textarea>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Seo Title</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                value="" name="seo_title" required />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustom02" class="form-label">Seo Description </label>
                                            <input type="text" name="seo_description" class="form-control"
                                                id="validationCustom02" value="" required />
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Submit Post</button>
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                            <!--begin::JavaScript-->
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (() => {
                                    'use strict';

                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    const forms = document.querySelectorAll('.needs-validation');

                                    // Loop over them and prevent submission
                                    Array.from(forms).forEach((form) => {
                                        form.addEventListener(
                                            'submit',
                                            (event) => {
                                                if (!form.checkValidity()) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }

                                                form.classList.add('was-validated');
                                            },
                                            false,
                                        );
                                    });
                                })();
                            </script>
                            <!--end::JavaScript-->
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
