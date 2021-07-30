<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <!-- FEATURED ARTIST -->
        @if ($artist)
        <div class="container w-full flex flex-col md:flex-row p-4 mx-auto border-b-2 border-yellow-300">
            <a href="/artists/artist/{{ $artist->id }}" class="w-full h-96 inline-flex justify-center items-center md:m-4 rounded-lg overflow-hidden">
                <img alt="content" class="w-full align-center mx-auto object-cover object-center rounded-lg" src="{{ $artist->img_01 }}">
            </a>
            <div class="w-full flex flex-col items-center justify-center text-center md:text-left md:p-8">
                <h2 class="md:text-4xl text-3xl mb-4 text-purple-700 uppercase font-mono">{{ __('Featured Artist') }}</h2>
                <h3 class="font-medium title-font mb-4 text-gray-900 text-lg italic">- {{ $artist->fname }} {{ $artist->lname }} -</h3>
                <div class="leading-relaxed text-lg mb-8">{!! $artist->bio !!}</div>
                <div class="flex justify-center mx-auto">
                    <a href="/artists/artist/{{ $artist->id }}" class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6">{{ __('View more') }}</a>
                </div>
            </div>
        </div>
        @endif
        <!-- FEATURED EVENT -->
        @if ($event)
        <div class="container w-full flex flex-col md:flex-row p-4 mx-auto border-b-2 border-yellow-300">
            <div class="w-full flex flex-col items-center justify-center text-center md:text-left md:p-8">
                <h2 class="md:text-4xl text-3xl mb-4 text-purple-700 uppercase font-mono">{{ __('Call to artists') }}</h2>
                <h3 class="font-medium title-font mb-4 text-purple-700 text-lg">{{ __('Professional or amateur artist') }} ?</h3>
                <div class="leading-relaxed text-lg mb-8">{!! $event->inscription_txt !!}</div>
                <div class="flex justify-center mx-auto mb-8 md:mb-0">
                    <a href="/events/{{ $event->slug }}" class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6">{{ __('Learn more') }}</a>
                </div>
            </div>
            <a href="/events/{{ $event->slug }}" class="w-full md:m-4 overflow-hidden">
                <img alt="content" class="w-full object-cover object-center rounded-lg" src="{{ $event->inscription_img }}">
            </a>
        </div>
        @endif
        <!-- NEXT EVENTS -->
        @if ($events)
        <div class="container w-full p-4 mx-auto border-b-2 border-yellow-300">
            <h2 class="font-mono title-font font-medium sm:text-4xl text-3xl uppercase text-purple-700">{{ __('Next Events') }}</h2>
            <a href="{{ route('events') }}" class="text-indigo-500 inline-flex items-center">{{ __('See all') }}
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <div class="my-4">
                @foreach ($events as $event)
                <x-event-calendar-card :event="$event" />
                @endforeach
            </div>
        </div>
        @endif
        <!-- LAST ARTICLES -->
        @if ($articles)
        <div class="container w-full p-4 mx-auto">
            <h2 class="font-mono title-font font-medium sm:text-4xl text-3xl uppercase text-purple-700">{{ __('Latest Articles') }}</h2>
            <a href="{{ route('articles') }}" class="text-indigo-500 inline-flex items-center">{{ __('See all') }}
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 my-4">
                @foreach ($articles as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
        @endif
    </section>
</x-guest-layout>