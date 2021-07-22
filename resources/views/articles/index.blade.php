<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
        <h1 class="text-center text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">{{ __('Articles') }}</h1>
            <div class="flex flex-wrap -m-4">
                @foreach ($articles as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>