<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klinik Umum Al-Fiat Prakter 24Jam">
    <meta name="keywords" content="Klinik Umum Al-Fiat Prakter 24Jam">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <style>
        html {
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }

        body,
        html {
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden;
            /* cegah scroll horizontal */
        }

        .swal2-container {
            z-index: 999999999999999999999999999999999 !important;
        }

        .is-invalid {
            border: 1px solid red !important;
        }

        .loading {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, .5);
            z-index: 99999999999999999999999999999999;
            display: none;
        }

        .loading-wheel {
            width: 20px;
            height: 20px;
            margin-top: -40px;
            margin-left: -40px;

            position: absolute;
            top: 50%;
            left: 50%;

            border-width: 30px;
            border-radius: 50%;
            -webkit-animation: spin 1s linear infinite;
        }

        .style-2 .loading-wheel {
            border-style: double;
            border-color: #ccc transparent;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0);
            }

            100% {
                -webkit-transform: rotate(-360deg);
            }
        }
    </style>
    <!-- END: CSS Assets-->
    @include('../layouts/css')
</head>
<!-- END: Head -->

<body>
    <div class="loading style-2" id="loading">
        <div class="loading-wheel"></div>
    </div>
    <main class="container-fluid">
        @include('../layouts/navigasi')
        @yield('body')
        @include('../layouts/script')
        @yield('script')
    </main>
</body>

</html>