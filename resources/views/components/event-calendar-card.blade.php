<div class="py-8 flex flex-wrap md:flex-nowrap">
    <div class="flex flex-col flex-shrink-0 md:w-64 md:mb-0 mb-6 mr-8">
        <span class="font-semibold title-font text-gray-700">{{ $event->place }}</span>
        <span class="mt-1 text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY HH:mm') }} - {{ \Carbon\Carbon::parse($event->date_end)->isoFormat('D/M/YYYY HH:mm') }}</span>
    </div>
    <div class="md:flex-grow">
        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $event->name }}</h2>
        <a href="{{ route('event.show', $event) }}" class="text-indigo-500 inline-flex items-center mt-4">{{ __('Read more') }}
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>