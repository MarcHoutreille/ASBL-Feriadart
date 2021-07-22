<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-4 py-24 mx-auto">
            <h1 class="text-center text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">{{ __('Gallery') }}</h1>
            <div class="flex flex-wrap justify-center -mb-4">
                @foreach ($events as $event)
                <x-gallery-card :event="$event" />
                @endforeach
            </div>
        </div>
</x-guest-layout>