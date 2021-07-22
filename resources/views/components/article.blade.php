<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-4 py-24 mx-auto">
        <div class="flex flex-wrap -m-12 grid grid-cols-1 lg:grid-cols-2">
            <div class="p-12 lg:w-full flex flex-col items-start order-last lg:order-first">
                <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ $article->created_at->format('Y-m-d') }}</span>
                <div class="inline-flex items-center mt-4 mb-4">
                    <img alt="blog" src="/images/FeriaLogoRound.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                    <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900">{{ $article->user->name }}</span>
                        <span class="text-blue-400 text-xs tracking-widest mt-0.5"><a href="mailto:{{ $article->user->email }}">{{ $article->user->email }}</a></span>
                    </span>
                </div>
                <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $article->title }}</h2>
                <div>
                    {!! $article->body !!}
                </div>
                <div class="flex items-center flex-wrap pb-4 mt-4 mb-4 border-b-2 border-gray-100 w-full">
                    <a href="{{ $article->url }}" target="_blank" class="text-indigo-500 inline-flex items-center">{{ __('Learn more') }}
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-full flex justify-center items-center order-first lg:order-last">
                <img src="{{ $article->img_src }}" alt="{{ $article->title }}" />
            </div>
        </div>
    </div>
</section>