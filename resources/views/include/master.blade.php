<!DOCTYPE html>
<html lang="en">
    <head>
        @include('include.head')
    </head>
    <body>
        @include('include.navigation')

        {{-- Yeld All Content --}}
        @yield('content')
        {{-- Yeld All Content End --}}

        @include('include.footer')

        @include('include.script')
        {{-- Extra Page Script --}}
        @yield('script')
    </body>
</html>
