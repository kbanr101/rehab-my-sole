@extends('admin.layout.layout')

@section('content')
    <main class="app-main">
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
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Change Password</div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Form-->
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <!-- Current Password -->
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <div class="input-group">
                                            <input type="password" name="current_password" class="form-control"
                                                id="current_password" required value="{{ old('current_password') }}" />
                                            <span class="input-group-text" onclick="togglePassword('current_password')">
                                                <i class="fa fa-eye" id="toggle_current_password"></i>
                                            </span>
                                        </div>
                                        @error('current_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" name="new_password" class="form-control"
                                                id="new_password" required value="{{ old('new_password') }}" />
                                            <span class="input-group-text" onclick="togglePassword('new_password')">
                                                <i class="fa fa-eye" id="toggle_new_password"></i>
                                            </span>
                                        </div>
                                        @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" name="new_password_confirmation" class="form-control"
                                                id="new_password_confirmation" required
                                                value="{{ old('new_password_confirmation') }}" />
                                            <span class="input-group-text"
                                                onclick="togglePassword('new_password_confirmation')">
                                                <i class="fa fa-eye" id="toggle_new_password_confirmation"></i>
                                            </span>
                                        </div>
                                        @error('new_password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!--end::Form-->




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content-->
    </main>
@stop
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<script>
    // Function to toggle password visibility
    function togglePassword(fieldId) {
        const inputField = document.getElementById(fieldId);
        const icon = document.getElementById(`toggle_${fieldId}`);

        if (inputField.type === "password") {
            inputField.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            inputField.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
