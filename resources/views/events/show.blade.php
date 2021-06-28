<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-12 grid grid-cols-none lg:grid-cols-2">
                <div class="p-12 md:w-full flex flex-col items-start">
                    <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY HH:mm') }} - {{ \Carbon\Carbon::parse($event->date_end)->isoFormat('D/M/YYYY HH:mm') }}</span>
                    <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $event->name }}</h2>
                    <div>
                        {!! $event->description !!}
                    </div>
                    <div class="flex items-center flex-wrap pb-4 mt-4 mb-4 border-b-2 border-gray-100 w-full">
                        <a href="{{ $event->url }}"  target="_blank" class="text-indigo-500 inline-flex items-center">{{ __('Learn more') }}
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <span class="text-gray-400 mr-3 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>1.2K
                        </span>
                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                            </svg>6
                        </span>
                    </div>
                    <div class="inline-flex items-center mt-4 mb-4">
                        <!-- <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center"> -->
                        <span class="flex-grow flex flex-col px-4">
                            <span class="title-font font-medium text-gray-900">{{ $event->email }}</span>
                            <span class="text-blue-400 text-xs tracking-widest mt-0.5">{{ $event->telephone }}</span>
                        </span>
                        <span class="flex-grow flex flex-col px-4">
                            <span class="title-font font-medium text-gray-900"><a>{{ $event->place }}</a></span>
                            <span class="text-blue-400 text-xs tracking-widest mt-0.5"><a href="http://maps.google.com/?q={{ $event->address }}+{{ $event->place }}" target="_blank">{{ $event->address }}</a></span>
                        </span>
                    </div>
                </div>
                <div>
                    <img src="{{ $event->img_src }}" alt="{{ $event->name }}" />
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>