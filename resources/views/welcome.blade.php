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
            <form id="register-form" method="POST" action="/register">
                <h1 class="mb-6 -text-[18px] font-bold text-white">Pemesanan Tiket Konser</h1>
                <div class="mb-6">
                    <label for="name" class="block text-white mb-2">Nama</label>
                    <input type="text" id="name" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan nama">
                </div>
                <div class="mb-12">
                    <label for="nomor_hp" class="block text-white mb-2">Nomor HP</label>
                    <input type="text" id="nomor_hp" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan nomor HP">
                </div>
                <div class="mb-12">
                    <label for="email" class="block text-white mb-2">Email</label>
                    <input type="text" id="email" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan email">
                </div>
                <div class="mb-12">
                    <label for="password" class="block text-white mb-2">Password</label>
                    <input type="text" id="password" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan password">
                </div>
                <button type="submit" class="bg-[#2FA7EA] p-4 rounded-lg text-white w-full">Kirim</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const nomor_hp = document.getElementById('nomor_hp').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Validasi Formulir
            if (!name || !nomor_hp || !email || !password) {
                alert('Semua informasi harus diisi.');
                return;
            }
            
            axios.post('/register', {
                name: name,
                nomor_hp: nomor_hp,
                email: email,
                password: password
            })
            .then(function (response) {
                console.log(response.data);
                window.location.href = "/browse"; 
            })
            .catch(function (error) {
                if (error.response) {
                    // Kesalahan respons dari server
                    console.error('Error response:', error.response.data);
                    console.error('HTTP status:', error.response.status);
                    alert('Terjadi kesalahan server: ' + error.response.data.message);
                } else if (error.request) {
                    // Tidak ada respons dari server
                    console.error('No response received:', error.request);
                    alert('Tidak ada respons dari server.');
                } else {
                    // Kesalahan lainnya
                    console.error('Error:', error.message);
                    alert('Terjadi kesalahan: ' + error.message);
                }
            });
        });
    </script>
</body>
</html>
