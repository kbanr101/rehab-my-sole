<!doctype html>
<html lang="en">
<!--begin::Head-->

@include('admin.layout.head')
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('admin.layout.header')
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            @include('admin.layout.sidebar_brand')
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            @include('admin.layout.side_bar')
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        @yield('content')
        <!--end::App Main-->
        <!--begin::Footer-->
        @include('admin.layout.footer')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @include('admin.layout.script_footer')
    <!--end::Script-->
</body>
<!--end::Body-->

</html>
