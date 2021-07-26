<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <!-- FEATURED ARTIST -->
        <div class="container flex flex-col w-full px-4 py-4 lg:py-14 mx-auto">

            <div class="flex flex-col sm:flex-row mt-10">
                <div class="sm:w-3/5 text-center sm:pr-8 sm:py-8">
                    <div class="h-86 rounded-t-lg overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="{{ $artist->img_01 }}">
                    </div>
                </div>
                <div class="sm:w-2/3 sm:pl-8 sm:py-8 mt-2 pt-4 sm:mt-0 text-center sm:text-left">
                    <div class="flex flex-col items-center text-center justify-center">
                        <h1 class="text-2xl mt-12 text-purple-700">FEATURED ARTISTS</h1>
                        <h2 class="font-medium title-font mt-2 text-gray-900 text-lg">- {{ $artist->fname }} {{ $artist->lname }} -</h2>
                        <p class="leading-relaxed text-lg mb-4 mt-6">{!! $artist->bio !!}</p>
                        <a href="{{ $artist->url }}" class="text-purple-700 border-2 border-purple-700 py-2 px-6 rounded mt-2 inline-flex items-center">{{ __('See More') }}
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURED EVENT -->
        <div class="container flex px-4 py-14 mx-auto md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">APPEL AUX ARTISTES 📣
                    <br class="hidden lg:inline-block">Artiste professionnel·le ou amateur·e ?
                </h1>
                <p class="mb-8 leading-relaxed mr-4">{{ $event->inscription_txt }}</p>
                <div class="flex justify-center mx-auto">
                    <a href="/events/{{ $event->slug }}" class="btn inline-flex text-purple-700 mb-4 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 py-2 px-6 focus:outline-none rounded text-lg">{{__('Learn more')}}</a>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-8 md:mb-0">
                <img class="object-cover object-center rounded" alt="Inscription" src="{{ $event->inscription_img }}">
            </div>
        </div>
        <!-- NEXT EVENTS -->
        <div class="container px-4 py-4 lg:py-14 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ __('Next Events') }}</h2>
            <div class="my-4 divide-y-2 divide-gray-100">
                @foreach ($events as $event)
                <x-event-calendar-card :event="$event" />
                @endforeach
            </div>
        </div>
        <!-- LAST ARTICLES -->
        <div class="container px-4 py-4 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ __('Latest Articles') }}</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 my-4">
                @foreach ($articles as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>