<x-guest-layout>
    <section class="container px-5 py-24 mx-auto text-gray-600 body-font">
        <p class="text-gray-500 text-lg text-center font-normal pb-3">{{ $event->name }}</p>
        <h1 class="xl:text-4xl text-3xl text-center text-gray-800 font-extrabold pb-6 sm:w-4/6 w-5/6 mx-auto">{{ __('Artists') }}</h1>
        <div role="list" aria-label="Artists" class="container w-full flex flex-wrap mx-auto mt-4 px-10 pt-10">
            @foreach ($artists as $artist)
            @if($artist->accepted)
            <x-artist-card :artist="$artist" />
            @endif
            @endforeach
        </div>
    </section>
</x-guest-layout>