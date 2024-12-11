    <!-- Fonts and icons -->
    <script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('backend/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>


    <!-- Load jQuery first -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>

    <!-- Load Toastr JS (for notifications) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Load jQuery Scrollbar Plugin (ensure it comes after jQuery) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/1.4.0/jquery.scrollbar.min.js"></script>

    <!-- Load DataTables plugin -->
    {{-- <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script> --}}

    <!-- Optional JS for chart and other plugins -->
    <script src="{{ asset('backend/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Kaiadmin JS (make sure it's loaded after jQuery and other necessary plugins) -->
    <script src="{{ asset('backend/js/kaiadmin.min.js') }}"></script>

    <!-- Sweet Alert JS (load after all other JS libraries) -->
    <script src="{{ asset('backend/sweet-alert/plugins.bundle.js') }}"></script>


