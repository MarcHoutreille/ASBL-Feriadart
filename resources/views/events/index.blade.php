<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-4 py-24 mx-auto">
            <div class="flex flex-wrap justify-center">
                @foreach ($events as $event)
                <x-event-card :event="$event" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>