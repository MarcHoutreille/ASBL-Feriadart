<x-guest-layout>
    <section class="container p-4 mx-auto text-gray-600 body-font">
        <h1 class="text-center sm:text-4xl text-3xl font-medium title-font uppercase mb-4 text-purple-700 tracking-widest">{{ __('Guestbook')}}</h1>

        <!-- Validation Errors -->
        <div class="flex justify-center">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />
        </div>

        <!-- Add Comment Button -->
        <div class="flex justify-center">
            <button class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" id="addEvent-btn">
                {{ __('Leave a comment')}}
            </button>
        </div>

        <!-- Guestbook Comments -->
        @foreach($guests as $guest)
        @if($guest->accepted)
        <div class="container my-8 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <p class="leading-relaxed text-lg mb-2">{{ $guest->message }}</p>
                <span class="inline-block h-1 w-10 rounded bg-indigo-500 mb-2"></span>
                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">{{ $guest->name }}</h2>
                <p class="text-gray-500">{{ $guest->title }}</p>
            </div>
        </div>
        @endif
        @endforeach

        <!-- Add Comment Modal -->
        <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-start" id="overlay">
            <div class="bg-gray-200 w-2/3 py-2 px-3 rounded shadow-xl text-gray-800 mt-6">
                <div class="flex justify-between items-center">
                    <h4 class="text-lg font-bold">{{ __('Leave a comment') }}</h4>
                    <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <form action="{{ route('guest.store') }}" method="POST">
                    @csrf
                    <div class="mt-2 text-sm">
                        <div class="md:p-12 bg-gray-200 flex flex-row flex-wrap">
                            <div class="md:w-1/2-screen m-0 p-5 bg-white w-full tw-h-full shadow md:rounded-lg">
                                <div class="flex-col flex py-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" placeholder="e.g. John Doe" required>
                                </div>
                                <div class="flex-col flex py-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Occupation') }}</label>
                                    <input type="text" name="title" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" placeholder="e.g. Painter" required>
                                </div>
                                <div class="flex-col flex py-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" placeholder="e.g. johndoe@mail.com" required>
                                </div>
                                <div class="flex-col flex py-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Message') }}</label>
                                    <textarea name="message" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 flex justify-end space-x-3">
                        <input type="hidden" id="front" name="front">
                        <button class="px-3 py-1 hover:text-red-800 hover:bg-red-600 hover:bg-opacity-50 rounded" id="close-modal2">{{ __('Cancel') }}</button>
                        <button class="px-3 py-1 text-gray-200 bg-green-800 hover:bg-green-600 rounded" type="submit">{{ __('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Button Javascript -->
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const overlay = document.querySelector('#overlay');
                const delBtn = document.querySelector('#addEvent-btn');
                const closeBtn = document.querySelector('#close-modal');
                const closeBtn2 = document.querySelector('#close-modal2');
                const toggleModal = () => {
                    overlay.classList.toggle('hidden');
                    overlay.classList.toggle('flex');
                }
                delBtn.addEventListener('click', toggleModal);
                closeBtn.addEventListener('click', toggleModal);
                closeBtn2.addEventListener('click', toggleModal);
            });
        </script>

    </section>
</x-guest-layout>