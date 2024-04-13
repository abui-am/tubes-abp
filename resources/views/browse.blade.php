<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
                    <a href="/browse" class="text-white font-bold text-lg">Pemesanan Tiket Konser</a>
                    <a href="/browse" class="text-white">Browse</a>
                </div>
                <div class="text-white">Abuii, 089614292529</div>
            </div>
        </nav>
        <!-- App Content -->
        <main class="p-6 max-w-7xl mx-auto">
            <input type="text" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan nama">
            <div class="grid grid-cols-4 gap-6 mt-10">
                <!-- Ignore error if any -->
                @foreach($concerts as $concert)
                <a href="/concerts/{{ $concert['id']}}">

                    <article class="relative w-full h-[225px] rounded overflow-hidden" style="background-image: url({{ $concert['imageURL'] }}); background-size: cover; background-position: center;">
                        <div class="from-black to-transparent bg-gradient-to-t absolute bottom-0 top-0 left-0 right-0">
                            <div class="absolute bottom-0 left-0 right-0 text-white px-4 py-6">
                                <h2 class=" text-[16px] font-bold mb-1">
                                    {{ $concert['title']}}
                                </h2>
                                <div>
                                    <p class="text-xs font-bold">
                                        {{ $concert['date']}}
                                    </p>
                                    <p class="text-xs">
                                        {{ $concert['artists']}} • {{ $concert['city']}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>

                @endforeach


            </div>
        </main>
    </div>
</body>


</html>