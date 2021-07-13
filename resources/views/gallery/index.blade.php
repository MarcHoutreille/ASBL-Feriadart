<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-4 py-24 mx-auto">
            <div class="flex flex-wrap justify-center">
                @foreach ($events as $event)
                <x-gallery-card :event="$event" />
                @endforeach
            </div>
        </div>
</x-guest-layout>