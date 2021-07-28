<div class="flex flex-wrap md:flex-nowrap">
    <div class="w-full md:w-96 md:mr-4 md:mb-0 mb-2 flex-shrink-0 flex flex-col justify-items-center">
        <span class="text-2xl font-medium text-gray-900 title-font mb-2">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY') }}</span>
        <a class="h-24 md:h-40 lg:h-24 inline-flex items-center rounded-lg overflow-hidden" href="{{ route('event.show', $event) }}"><img class="w-auto object-cover object-center" alt="{{ $event->name }}" src="{{ $event->img_src}}?sig={{ $event->id }}"></a>
    </div>
    <div class="md:flex-grow mb-4">
        <h2 class="text-2xl font-medium text-gray-900 title-font md:mt-9">{{ $event->name }}</h2>
        <p class="leading-relaxed">{{ $event->place }} - {{ $event->address }}</p>
        <p class="font-semibold title-font @if($event->open) text-green-700 @else text-red-700 @endif">@if($event->open) {{ __('Inscriptions open') }} @else {{ __('Inscriptions closed') }} @endif</p>
        <a href="{{ route('event.show', $event) }}" class="text-indigo-500 inline-flex items-center">{{ __('Read more') }}
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>