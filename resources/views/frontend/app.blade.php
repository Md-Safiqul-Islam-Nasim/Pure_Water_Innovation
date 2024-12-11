<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>Pure Water</title>
    @include('frontend.partials.styles')
    @stack('script')
</head>


<body>
    {{-- ======== Preloader ===========  --}}
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    {{-- ======== Preloader ===========  --}}
    <main class="main-wrapper">
        @include('frontend.partials.header')
        <section class="section">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        @include('frontend.partials.footer')
    </main>
    @include('frontend.partials.scripts')
    @stack('script')
    <script>
        $(document).ready(function() {

            // toastr.options.timeOut = 10000000000;
            // toastr.options.timeOut = 10000;
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                    // "timeOut": 300000, // 5 minutes in milliseconds
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
