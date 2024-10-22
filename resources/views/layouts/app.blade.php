<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- site metas -->
    <title>SISPAKCER</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .app-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .page-inner {
            flex: 1;
        }
        .footer {
            position: relative;
            width: 100%;
        }
        .copyright_section.position-absolute {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #786AB5;
            color: #fff;
            text-align: center;
        }
        .copyright_text a {
            color: #ffffff;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="app-container">
        @include('partials.header')
        <main class="page-inner">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

    <!-- Javascript files-->
    <script src="{{ asset('/assets/landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/landing/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('/assets/landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/assets/landing/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('/assets/landing/js/owl.carousel.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#myCarousel').carousel({
            interval: false
        });

        $("#myCarousel").on("touchstart", function(event) {
            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event) {
                var yMove = event.originalEvent.touches[0].pageY;
                if (Math.floor(yClick - yMove) > 1) {
                    $(".carousel").carousel('next');
                } else if (Math.floor(yClick - yMove) < -1) {
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function() {
                $(this).off("touchmove");
            });
        });

        $(document).ready(function() {
            $('#logout-button').on('click', function(e) {
                e.preventDefault(); // Prevent the form from submitting immediately

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan keluar dari akun Anda.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Keluar !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logout-form').submit();
                    }
                });
            });

            // Show SweetAlert messages based on session
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @elseif (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @elseif (session('warning'))
                Swal.fire({
                    title: 'Peringatan!',
                    text: '{{ session('warning') }}',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>
</html>
