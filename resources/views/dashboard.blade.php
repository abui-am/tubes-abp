<x-main-layout>

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

</x-main-layout>