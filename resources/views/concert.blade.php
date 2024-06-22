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

    <style>
        .backgroud-image {
            background-image: url("{{ $concert['imageURL'] }}");
            background-size: cover;
            background-position: center;
        }
    </style>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 text ">
    <div class="bg-gray-950 w-screen min-h-screen relative backgroud-image">
        <!-- App Navigation -->
        @include('components.header')

        <!-- App Content -->
        <main class="p-6 max-w-7xl mx-auto text-white">
            <div class="z-1 absolute top-0 left-0 right-0 bottom-0" style="background: linear-gradient(259.99deg, rgba(0, 0, 0, 0) 9.41%, rgba(0, 0, 0, 0.85) 49.58%, #060608 70.83%);">
            </div>
            <div class="flex gap-6 z-[1] relative mt-44">
                <div class="max-w-xl flex flex-col justify-center">
                    <h1 class="text-[40px] font-bold mb-1">
                        {{ $concert['title']}}
                    </h1>
                    <p class="text-[16px] mb-10">
                        <b> {{ $concert['date']}} </b> • {{ $concert['artists']}} • {{ $concert['city']}}
                    </p>

                    <p class="text-xs leading-[150%] mb-9">
                        {{ $concert['description']}}
                    </p>

                    <div class="flex gap-4">

                        <a href="/concerts/{{ $concert['id']}}/seats" class="bg-gray-800 min-w-[112px] inline-block p-3 text-xs rounded-lg text-white ">Beli Tiket</a>

                        <button class="bg-gray-800 min-w-[112px] inline-block p-3 text-xs rounded-lg text-white ">Informasi Lanjut</button>
                    </div>
                </div>
                <div class="flex-1">
                    <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/uGPhtnaS4Og?si=Q3gaJ5rPegbRYcub" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </main>
    </div>
</body>


</html>