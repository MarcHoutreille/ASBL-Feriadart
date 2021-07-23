<x-guest-layout>
    <section class="container px-4 py-14 mx-auto text-gray-600 body-font">
        <h1 class="text-center text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">{{ __('Events') }}</h1>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">
            @foreach ($events as $event)
            <x-event-card :event="$event" />
            @endforeach
        </div>
    </section>
</x-guest-layout>