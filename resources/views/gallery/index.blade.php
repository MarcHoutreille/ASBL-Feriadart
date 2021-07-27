<x-guest-layout>
    <section class="container px-4 py-4 mx-auto text-gray-600 body-font">
        <h1 class="text-center sm:text-4xl text-3xl font-medium title-font mb-14 text-purple-700 tracking-widest uppercase">{{ __('Gallery') }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($events as $event)
            <x-gallery-card :event="$event" />
            @endforeach
        </div>
    </section>
</x-guest-layout>