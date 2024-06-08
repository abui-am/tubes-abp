<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')


</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 text ">
    <div class="bg-gray-950 w-screen h-screen flex justify-center items-center">

        <div class="max-w-[572px] w-full p-6 bg-gray-900 rounded-lg">
            <!-- action = /login -->
            <form id="form-register" action="">
                @csrf
                <h1 class=" mb-6 -text-[18px] font-bold text-white">Pemesanan Tiket Konser</h1>
                <div class="mb-6">
                    <label for="" class="block text-white mb-2">Nama</label>
                    <input id="name" type="text" name="name" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan nama">
                </div>
                <div class="mb-6">
                    <label for="" class="block text-white mb-2">Email</label>
                    <input id="email" type="text" name="email" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan email">
                </div>
                <div class="mb-6">
                    <label for="" class="block text-white mb-2">Password</label>
                    <input id="password" name="password" type="password" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan password">
                </div>

                <div class="mb-6">
                    <label for="" class="block text-white mb-2">Confirm Password</label>
                    <input id="confirm-password" name="confirm-password" type="password" class="p-4 bg-gray-800 rounded-xl text-white w-full" placeholder="Masukan password">
                </div>

                <button type="submit" class="bg-[#2FA7EA] p-4 rounded-lg text-white w-full">Register</button>

                <!-- Sudah punya akun? login -->
                <a href="/" class="text-white text-center block mt-4">Sudah punya akun? Login</a>
            </form>

        </div>
    </div>
</body>
<!-- Script -->

<script>
    $(document).ready(function() {
        $('#form-register').on('submit', function(event) {
            event.preventDefault();

            const form = $(this).serialize();
            const password = $('#password').val();
            const confirmPassword = $('#confirm-password').val();
            const isPasswordMatch = password === confirmPassword;

            if (!isPasswordMatch) {
                alert('Password and confirm password must be the same');
                return;
            }

            $.ajax({
                url: "/api/register",
                type: 'POST',
                data: {
                    email: $('#email').val(),
                    password: password,
                    name: $('#name').val()
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // You can display a success message, reset the form, etc.

                    alert('Register success');

                    window.location.href = '/';
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

</html>