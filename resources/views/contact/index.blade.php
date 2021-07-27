<x-guest-layout>
    <section class="container p-4 mx-auto text-purple-700 body-font relative">
        <div class="flex flex-col text-center w-full mb-4">
            <h1 class="sm:text-4xl text-3xl font-medium title-font uppercase mb-4 text-purple-700 tracking-widest">{{ __('Contact Us') }}</h1>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <!-- VALIDATION ERRORS -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />
            <!-- CONTACT FORM -->
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap">
                    <div class="p-2 w-full sm:w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-lg text-purple-700">{{ __('Name')}}</label>
                            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>
                    </div>
                    <div class="p-2 w-full sm:w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-lg text-purple-700">{{ __('Email')}}</label>
                            <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-lg text-purple-700">{{ __('Message')}}</label>
                            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <input type="hidden" id="front" name="front">
                        <button type="submit" class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4">{{ __('Send') }}</button>
                    </div>
                    <div class="p-2 w-full border-t border-gray-200 text-center">
                        <a href="mailto:contact@feriadart.art" class="text-lg text-indigo-500">contact@feriadart.art</a>
                        <p class="leading-normal my-4">
                            Feria d'Art ASBL<br>
                            0753.565.581<br>
                            Rue Washington 208<br>
                            1050, Bruxelles
                        </p>
                        <span class="inline-flex">
                            <!-- TWITTER LOGO -->
                            <!-- <a class="mr-4 text-purple-700">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                            </a> -->
                            <!-- FACEBOOK LOGO -->
                            <a href="https://www.facebook.com/FeriadArt" target="_blank" class="mr-4 text-purple-700">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <!-- INSTAGRAM LOGO -->
                            <a href="https://www.instagram.com/feriadart" target="_blank" class="text-purple-700">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>