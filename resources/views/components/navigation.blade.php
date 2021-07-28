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
                <x-nav-link :href="route('backoffice.index')" :active="request()->routeIs('backoffice.index')">
                    {{ __('Backoffice') }}
                </x-nav-link>
                <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                    {{ __('Articles') }}
                </x-nav-link>
                <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                    {{ __('Events') }}
                </x-nav-link>
                <x-nav-link :href="route('inscriptions.index')" :active="request()->routeIs('inscriptions.index')">
                    {{ __('Inscriptions') }}
                </x-nav-link>
                <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                    {{ __('Members') }}
                </x-nav-link>
                <x-nav-link :href="route('files.index')" :active="request()->routeIs('files.index')">
                    {{ __('Gallery') }}
                </x-nav-link>
                <x-nav-link :href="route('guest.index')" :active="request()->routeIs('guest.index')">
                    {{ __('Guestbook') }}
                </x-nav-link>
                <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                    {{ __('Contact') }}
                </x-nav-link>
                <!-- LOGOUT DROPDOWN -->
                <x-dropdown align="right" width="36">
                    <x-slot name="trigger">
                        <button class="flex items-center text-base font-mono font-medium text-gray-200 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
            <x-responsive-nav-link :href="route('backoffice.index')" :active="request()->routeIs('backoffice.index')">
                {{ __('Backoffice') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                {{ __('Articles') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                {{ __('Events') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('inscriptions.index')" :active="request()->routeIs('inscriptions.index')">
                {{ __('Inscriptions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                {{ __('Members') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('files.index')" :active="request()->routeIs('files.index')">
                {{ __('Files') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('guest.index')" :active="request()->routeIs('guest.index')">
                {{ __('Guestbook') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>