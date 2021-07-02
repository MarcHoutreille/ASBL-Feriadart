<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container mx-auto flex px-5 py-14 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="Inscription" src="https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/117037004_658765718067234_5865890609677179388_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=973b4a&_nc_ohc=Lm1_fQfgys0AX-8ga7k&_nc_ht=scontent.fcrl1-1.fna&oh=bab8aa631390e2787998de4b316e852e&oe=60E004D4">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">APPEL AUX ARTISTES 📣
                    <br class="hidden lg:inline-block">Artiste professionnel·le ou amateur·e ?
                </h1>
                <p class="mb-8 leading-relaxed">Bonjour à tou·te·s, 🎨 Pourquoi ne pas décorer son intérieur ou offrir une oeuvre originale à ses proches créée et pensée par un artiste local? C’est ce que la Feria d’Art propose ! La Feria d’Art souhaite casser les codes du marché de l’art classique, et ce, en désacralisant l’achat d’une oeuvre d’art tout en offrant une expérience inclusive pour les artistes et le public. Nous vous annonçons avec enthousiasme que la première édition prendra place vendredi 18 et samedi 19 septembre 2020 dans la plus grande occupation temporaire de Belgique, à Bruxelles, au See U.</p>
                <div class="flex justify-center">
                    <a href="/events/feria-d-art-01"class="btn inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">{{__('Learn more')}}</a>
                </div>
            </div>
        </div>

        <div class="container px-5 py-10 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ __('Latest Articles') }}</h2>
            <div class="flex flex-wrap -m-12">
                @foreach ($articles as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>

        <div class="container px-5 py-10 mx-auto">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ __('Next Events') }}</h2>
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach ($events as $event)
                <x-event-calendar-card :event="$event" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>