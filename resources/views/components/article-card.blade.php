<div class="p-12 md:w-1/2 flex flex-col items-start">
    <div>
        <img alt="{{ $article->name }}" src="{{ $article->img_src}}?sig={{ $article->id }}" class="w-full h-72 object-cover object-center rounded-t-lg mb-4">
    </div>
    <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ $article->created_at->format('Y-m-d') }}</span>
    <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $article->title }}</h2>
    <p class="leading-relaxed mb-4">{{ $article->excerpt }}</p>
    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
        <a href="{{ route('article.show', $article) }}" class="text-indigo-500 inline-flex items-center">{{ __('Read more') }}
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
    <!-- <a class="inline-flex items-center">
        <img alt="{{ $article->name }}" src="/images/FeriaLogoRound.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
        <span class="flex-grow flex flex-col pl-4">
            <span class="title-font font-medium text-gray-900">{{ $article->user->name }}</span>
            <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $article->user->email }}</span>
        </span>
    </a> -->
</div>