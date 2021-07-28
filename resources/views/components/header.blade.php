<nav x-data="{ open: false }" class="bg-gradient-to-b from-purple-700 to-purple-600 border-b-8 border-yellow-300 px-2 py-4">
    <!-- PRIMARY NAVIGATION MENU -->
    <div class="flex justify-between">
        <div class="w-full flex justify-around font-mono font-semibold uppercase text-base lg:text-xl">
            <!-- LOGO -->
            <div class="flex-shrink-0 flex items-center ml-12 md:mx-4">
                <a href="{{ route('home') }}"><img class="h-20 md:h-14 rounded-full" src="/images/FeriaLogoGeel.png" alt="logo"></a>
            </div>
            <!-- NAVIGATION LINKS -->
            <div class="w-full hidden md:flex md:items-center md:justify-between px-2">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-nav-link>
                <x-nav-link :href="route('events')" :active="request()->routeIs('events')">
                    {{ __('Events') }}
                </x-nav-link>
                <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                    {{ __('Gallery') }}
                </x-nav-link>
                <x-nav-link :href="route('articles')" :active="request()->routeIs('articles')">
                    {{ __('Articles') }}
                </x-nav-link>
                <x-nav-link :href="route('guestbook')" :active="request()->routeIs('guestbook')">
                    {{ __('Guestbook') }}
                </x-nav-link>
                <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-nav-link>
                @if (Route::has('login'))
                @auth
                <x-nav-link :href="route('backoffice.index')" :active="request()->routeIs('backoffice.index')">
                    {{ __('Backoffice') }}
                </x-nav-link>
                @endauth
                @endif
                @if(count(config('app.languages')) > 1 )
                <!-- LANGUAGE BUTTON -->
                <div class="flex justify-center my-auto">
                    <button type="button" onclick="myFunction()" class="dropbtn bg-purple-600 text-sm font-medium text-yellow-300 hover:bg-yellow-300 hover:text-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-gray-100 rounded-md border border-gray-300 shadow-sm px-3 py-2" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <div id="myDropdown" class="dropdown-content invisible absolute origin-top-right z-10 mt-12 rounded-md shadow-lg bg-yellow-300 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-300" -->
                            @foreach(config('app.languages') as $langLocale => $langName)
                            <a href="{{ route('lang.switch', $langLocale) }}" class="block text-sm text-purple-600 hover:bg-purple-600 hover:text-yellow-300 px-3 py-2" role="menuitem" tabindex="-1" id="menu-item-0">
                                {{ strtoupper($langLocale) }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- Hamburger -->
        <div class="flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('events')" :active="request()->routeIs('events')">
                {{ __('Events') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                {{ __('Gallery') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles')" :active="request()->routeIs('articles')">
                {{ __('Articles') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('guestbook')" :active="request()->routeIs('guestbook')">
                {{ __('Guestbook') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
            @if (Route::has('login'))
            @auth
            <x-responsive-nav-link :href="route('backoffice.index')" :active="request()->routeIs('backoffice.index')">
                {{ __('Backoffice') }}
            </x-responsive-nav-link>
            @endauth
            @endif
        </div>
        <!-- RESPONSIVE LANGUAGE BUTTON -->
        @if(count(config('app.languages')) > 1 )
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex justify-center my-auto">
                <button type="button" onclick="myResponsiveFunction()" class="responsivedropbtn bg-purple-600 text-sm font-medium text-yellow-300 hover:bg-yellow-300 hover:text-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-gray-100 rounded-md border border-gray-300 shadow-sm px-3 py-2" id="responsive-menu-button" aria-expanded="true" aria-haspopup="true">
                    {{ strtoupper(app()->getLocale()) }}
                </button>
                <div id="myResponsiveDropdown" class="dropdown-content invisible absolute origin-top-right z-10 mt-12 rounded-md shadow-lg bg-yellow-300 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="responsive-menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-300" -->
                        @foreach(config('app.languages') as $langLocale => $langName)
                        <a href="{{ route('lang.switch', $langLocale) }}" class="block text-sm text-purple-600 hover:bg-purple-600 hover:text-yellow-300 px-3 py-2" role="menuitem" tabindex="-1" id="menu-item-0">
                            {{ strtoupper($langLocale) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</nav>