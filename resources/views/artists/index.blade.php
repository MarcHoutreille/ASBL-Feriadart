<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <p class="text-gray-500 text-lg text-center font-normal pb-3">{{ $event->name }}</p>
            <h1 class="xl:text-4xl text-3xl text-center text-gray-800 font-extrabold pb-6 sm:w-4/6 w-5/6 mx-auto">{{ __('Artists') }}</h1>
            <div class="flex flex-wrap -m-4">
                <div class="w-full bg-gray-100 px-10 pt-10">
                    <div class="container mx-auto">
                        <div role="list" aria-label="Artists" class="lg:flex md:flex sm:flex items-center xl:justify-between flex-wrap md:justify-around sm:justify-around lg:justify-around">
                            @foreach ($artists as $artist)
                            <x-artist-card :artist="$artist" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>