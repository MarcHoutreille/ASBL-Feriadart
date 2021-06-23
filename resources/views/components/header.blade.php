<header class="text-gray-700 underline ">
    <div class="h-0  overflow-hidden xs:h-30 md:h-60 ">
        <img class="invisible sm:visible" src="/images/FeriaBijtels.png" alt="Feria D'art">
    </div>

    <nav class="relative bg-gray-400 md:text-lg md:h-18 p-3">
        <div class="justify-around  sm:flex mx-4">
            <a href="{{ route('home') }}" class=" ml-2 sm:mx-1"><img class="m-auto rounded-full h-12" src="images/FeriaLogoWhite.png" alt="logo"></a>
            <a href="{{ route('home') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('home')) text-white @endif">{{ __('Home') }}</a>
            <a href="{{ route('events') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('events')) text-white @endif">{{ __('Events') }}</a>
            <a href="{{ route('gallery') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('gallery')) text-white @endif">{{ __('Gallery') }}</a>
            <a href="{{ route('articles') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('articles')) text-white @endif">{{ __('Articles') }}</a>
            <a href="{{ route('about') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('about')) text-white @endif">{{ __('About Us') }}</a>
            <a href="{{ route('guestbook') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('guestbook')) text-white @endif">{{ __('Guestbook') }}</a>
            <a href="{{ route('contact') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('contact')) text-white @endif">{{ __('Contact') }}</a>
            @if (Route::has('login'))@auth 
            <a href="{{ route('backoffice.index') }}" class=" ml-2 text-center block mt-2 hover:text-white @if (request()->routeIs('backoffice.index')) text-white @endif">{{ __('Backoffice') }}</a>
            @endauth
            @endif
        </div>
    </nav>
</header>