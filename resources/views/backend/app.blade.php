<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('backend/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <title>@yield('title')</title>
    @include('backend.partials.styles')
    @stack('style')
</head>

<body>
    {{-- ======== Preloader ===========  --}}
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    {{-- ======== Preloader ===========  --}}
    @include('backend.partials.sidebar')
    <main class="main-wrapper">
        @include('backend.partials.header')
        <section class="section">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </main>
    @include('backend.partials.scripts')
    @stack('script')
    <script>
        $(document).ready(function() {
            // toastr.options.timeOut = 10000;
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                    //"timeOut": 300000, // 5 minutes in milliseconds
                    // "extendedTimeOut": 0,
                };

                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.warning("{{ session('warning') }}");
            @endif
        });
    </script>

</body>

</html>
