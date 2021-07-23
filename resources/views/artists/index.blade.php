<x-guest-layout>
    <section class="container px-4 py-14 mx-auto text-gray-600 body-font">
        <h1 class="text-center text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">{{ __('Artists') }}</h1>
        <h2 class="text-gray-500 text-lg text-center font-normal pb-4">{{ $event->name }}</h2>
        <div role="list" aria-label="Artists" class="container w-full flex flex-wrap mx-auto mt-4 px-10 pt-10">
            @foreach ($artists as $artist)
            @if($artist->accepted)
            <x-artist-card :artist="$artist" />
            @endif
            @endforeach
        </div>
    </section>
</x-guest-layout>