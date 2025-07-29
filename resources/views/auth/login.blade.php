<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>IHC RSOJ</title>
</head>

<body class="bg-info/5">
    <main>
        <!-- Main Content -->
        <div
            class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">

            <div class="justify-center items-center w-full card lg:flex max-w-md ">
                <div class=" w-full card-body">
                    <a href="../" class="py-4 block"><img src="../assets/images/logos/dark-logo.svg" alt=""
                            class="mx-auto" /></a>
                    <p class="mb-4 text-gray-500 text-sm text-center">Your Social Campaigns</p>
                    <!-- form -->
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!-- username -->
                        <div class="mb-4">
                            <label for="forUsername" class="block text-sm font-semibold mb-2 text-dark">Email</label>
                            <input type="text" id="forUsername"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                aria-describedby="hs-input-helper-text" name="email">
                        </div>
                        <!-- password -->
                        <div class="mb-6">
                            <label for="forPassword" class="block text-sm font-semibold mb-2 text-dark">Password</label>
                            <input type="password" id="forPassword"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                aria-describedby="hs-input-helper-text" name="password">
                        </div>
                        <!-- checkbox -->
                        <div class="flex justify-between">
                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500 "
                                    id="hs-default-checkbox" checked>
                                <label for="hs-default-checkbox" class="text-sm text-dark ms-3">Remeber this
                                    Device</label>
                            </div>
                            <a href="../" class="text-sm font-medium text-blue-600 hover:text-blue-700">Forgot
                                Password ?</a>
                        </div>
                        <!-- button -->
                        <div class="grid my-6">
                            <button href="../"
                                class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700" type="submit">Sign In</button>
                        </div>

                        <div class="flex justify-center gap-2 items-center">
                            <p class="text-base font-medium text-gray-500">New to Modernize?</p>
                            <a href="./authentication-register.html"
                                class="text-sm font-medium text-blue-600 hover:text-blue-700">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!--end of project-->
    </main>






</body>

</html>
