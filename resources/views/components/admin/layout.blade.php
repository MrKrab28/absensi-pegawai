<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" bg-info/5">

    <main>

        <!--start the project-->
        <div id="main-wrapper" class="flex ">

            <x-admin.sidebar />
            <div class=" w-full page-wrapper overflow-hidden">

                <!--  Header Start -->



                <!-- ========== HEADER ========== -->
                <x-admin.header />

                <!-- ========== END HEADER ========== -->

                <!--  Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto  max-w-full  pt-4">
                    <div class="container full-container py-3 px-0 flex flex-col gap-6">
                        {{ $slot }}
                        <footer>
                            <p class="text-base text-gray-500 font-normal p-3 text-center">
                                Design and Developed by <a href="https://adminmart.com/" target="_blank"
                                    class="text-blue-600 underline hover:text-blue-700">AdminMart.com</a>
                            </p>
                        </footer>
                    </div>

                </main>
                <!-- Main Content End -->

            </div>
        </div>
        <!--end of project-->
    </main>

    <script></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/preline/dist/preline.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/@preline/dropdown/index.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/@preline/overlay/index.js') }}"></script> --}}
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>



    {{-- <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script> --}}
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
