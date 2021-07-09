<div class="p-4 md:w-full">
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <img class="lg:h-72 md:h-36 w-full object-cover object-center" src="{{ $event->img_src}}" alt="{{ $event->name }}">
        <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY HH:mm') }} - {{ \Carbon\Carbon::parse($event->date_end)->isoFormat('D/M/YYYY HH:mm') }}</h2>
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $event->name }}</h1>
            <!-- <p class="leading-relaxed mb-3">{!! $event->description !!}</p> -->
            <div class="flex items-center flex-wrap ">
                <a href="{{ route('gallery.show', $event) }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">{{ __('See More') }}
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>