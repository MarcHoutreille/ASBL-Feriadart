<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <!-- FEATURED ARTIST -->
        <div class="container w-full flex flex-col md:flex-row px-4 py-4 mx-auto border-b-2 border-white">
            <div class="w-full h-86 md:p-8 overflow-hidden">
                <img alt="content" class="rounded-lg object-cover object-center h-full w-full" src="{{ $artist->img_01 }}">
            </div>
            <div class="w-full flex flex-col items-center justify-center text-center md:text-left md:p-8">
                <h2 class="md:text-4xl text-3xl mb-4 text-purple-700 uppercase font-mono">{{ __('Featured Artist') }}</h2>
                <h3 class="font-medium title-font mb-4 text-gray-900 text-lg italic">- {{ $artist->fname }} {{ $artist->lname }} -</h3>
                <div class="leading-relaxed text-lg mb-8">{!! $artist->bio !!}</div>
                <div class="flex justify-center mx-auto mb-4">
                    <a href="/artists/artist/{{ $artist->id }}" class="btn inline-flex text-purple-700 mb-4 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 py-2 px-6 focus:outline-none rounded text-lg">{{ __('View More') }}</a>
                </div>
            </div>
        </div>
        <!-- FEATURED EVENT -->
        <div class="container w-full flex flex-col md:flex-row px-4 py-4 mx-auto border-b-2 border-white">
            <div class="w-full flex flex-col items-center justify-center text-center md:text-left md:p-8"> 
                <h2 class="md:text-4xl text-3xl mb-4 text-purple-700 uppercase font-mono">{{ __('Call to artists') }}</h2>
                <h3 class="font-medium title-font mb-4 text-purple-700 text-lg">{{ __('Professional or amateur artist') }} ?</h3>
                <div class="leading-relaxed text-lg mb-8">{!! $event->inscription_txt !!}</div>
                <div class="flex justify-center mx-auto mb-4">
                    <a href="/events/{{ $event->slug }}" class="btn inline-flex text-purple-700 mb-4 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 py-2 px-6 focus:outline-none rounded text-lg">{{ __('View More') }}</a>
                </div>
            </div>
            <div class="w-full h-86 md:p-8 overflow-hidden">
                <img alt="content" class="rounded-lg object-cover object-center h-full w-full" src="{{ $event->inscription_img }}">
            </div>
        </div>
        <!-- NEXT EVENTS -->
        <div class="container w-full  px-4 py-4  md:p-10 mx-auto border-b-2 border-white">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 uppercase font-medium text-purple-700 font-mono">{{ __('Next Events') }}</h2>
            <div class="my-4 divide-y-2 divide-gray-100">
                @foreach ($events as $event)
                <x-event-calendar-card :event="$event" />
                @endforeach
            </div>
        </div>
        <!-- LAST ARTICLES -->
        <div class="container w-full p-8 md:p-12 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-8 font-medium text-purple-700 font-mono uppercase">{{ __('Latest Articles') }}</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 my-4">
                @foreach ($articles as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>