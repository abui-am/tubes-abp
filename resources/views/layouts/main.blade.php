<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite('resources/css/app.css')

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 text ">
    <div class="bg-gray-950 w-screen min-h-screen">
        <!-- App Navigation -->
        <nav class="sticky top-0 left-0 right-0 z-10 bg-gray-950 w-full ">
            <div class="flex justify-between items-center p-6 ">
                <div class="max-w-[572px] w-full flex justify-between items-center">
                    <a href="/" class="text-white font-bold text-lg">Pemesanan Tiket Konser</a>
                    <a href="/" class="text-white">Browse</a>
                </div>
                <div class="flex gap-2 items-center">


                    <div class="text-white">{{Auth::user()->name}} {{Auth::user()->email}} </div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>

            </div>

        </nav>
        <!-- App Content -->
        <main class="p-6 max-w-7xl mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>


</html>