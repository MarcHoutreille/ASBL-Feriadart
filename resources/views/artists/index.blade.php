<x-guest-layout>
    <section class="container p-4 mx-auto text-gray-600 body-font">
        <h1 class="text-center text-3xl sm:text-4xl title-font font-medium uppercase text-purple-700 tracking-widest mb-4">{{ __('Artists') }}</h1>
        <h2 class="text-center text-xl font-normal text-purple-700 mb-4">{{ $event->name }}</h2>
        <div role="list" aria-label="Artists" class="container w-full flex flex-wrap mx-auto mt-4 lg:px-10 pt-4 lg:pt-10">
            @foreach ($artists as $artist)
            @if($artist->accepted)
            <x-artist-card :artist="$artist" />
            @endif
            @endforeach
        </div>
    </section>
</x-guest-layout>