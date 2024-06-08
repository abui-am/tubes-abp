<nav class="sticky top-0 left-0 right-0 z-10 bg-gray-950 w-full ">
    <div class="flex justify-between items-center p-6 ">
        <div class="max-w-[572px] w-full flex justify-between items-center">
            <a href="/dashboard" class="text-white font-bold text-lg">Pemesanan Tiket Konser</a>
            <a href="/dashboard" class="text-white">Browse</a>
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