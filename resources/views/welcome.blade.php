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
    <div class="bg-gray-950 w-screen h-screen flex justify-center items-center">

        <div class="max-w-[572px] w-full p-6 bg-gray-900 rounded-lg">
            <form>
                <h1 class="mb-6 -text-[18px] font-bold text-white">Pemesanan Tiket Konser</h1>
                <div class="mb-6">
                    <label for="" class="block text-white mb-2">Nama</label>
                    <input type="text" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan nama">
                </div>
                <div class="mb-12">
                    <label for="" class="block text-white mb-2">Nomor HP</label>
                    <input type="phone" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan nama">
                </div>

                <a href="/browse">
                    <button type="button" class="bg-[#2FA7EA] p-4 rounded-lg text-white w-full">Next</button>
                </a>

            </form>

        </div>
    </div>
</body>

</html>