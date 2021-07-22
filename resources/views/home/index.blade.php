<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <!-- FEATURED ARTIST -->
        <div class="container px-4 py-14 mx-auto flex flex-col w-full mx-auto">
            <div class="rounded-t-lg h-64 overflow-hidden">
                <img alt="content" class="object-cover object-center h-full w-full" src="{{ $artist->img_01 }}">
            </div>
            <div class="flex flex-col sm:flex-row mt-10">
                <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex flex-col items-center text-center justify-center">
                        <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $artist->fname }} {{ $artist->lname }}</h2>
                        <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                        <p class="text-base">Artist</p>
                    </div>
                </div>
                <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                    <p class="leading-relaxed text-lg mb-4">{!! $artist->bio !!}</p>
                    <a href="{{ $artist->url }}" class="text-indigo-500 inline-flex items-center">{{ __('Learn More') }}
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- FEATURED EVENT -->
        <div class="container flex px-4 py-14 mx-auto md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="Inscription" src="/images/feria-appel.jpg">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">APPEL AUX ARTISTES 📣
                    <br class="hidden lg:inline-block">Artiste professionnel·le ou amateur·e ?
                </h1>
                <p class="mb-8 leading-relaxed">Bonjour à tou·te·s, 🎨 Pourquoi ne pas décorer son intérieur ou offrir une oeuvre originale à ses proches créée et pensée par un artiste local? C’est ce que la Feria d’Art propose ! La Feria d’Art souhaite casser les codes du marché de l’art classique, et ce, en désacralisant l’achat d’une oeuvre d’art tout en offrant une expérience inclusive pour les artistes et le public. Nous vous annonçons avec enthousiasme que la première édition prendra place vendredi 18 et samedi 19 septembre 2020 dans la plus grande occupation temporaire de Belgique, à Bruxelles, au See U.</p>
                <div class="flex justify-center">
                    <a href="/events/feria-d-art-01" class="btn inline-flex text-white bg-yellow-300 hover:bg-yellow-200 border-0 py-2 px-6 focus:outline-none rounded text-lg">{{__('Learn more')}}</a>
                </div>
            </div>
        </div>
        <!-- NEXT EVENTS -->
        <div class="container px-5 py-10 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ __('Next Events') }}</h2>
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach ($events as $event)
                <x-event-calendar-card :event="$event" />
                @endforeach
            </div>
        </div>
        <!-- LAST ARTICLES -->
        <div class="container px-5 py-10 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ __('Latest Articles') }}</h2>
            <div class="flex flex-wrap -m-12">
                @foreach ($articles as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>