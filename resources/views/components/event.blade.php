<section class="container w-full text-gray-600 body-font px-4 py-4 mx-auto overflow-hidden">
    <div class="text-center mx-auto">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-success-message class="mb-4" />
    </div>
    <div class="flex flex-wrap -m-12 grid grid-cols-1 lg:grid-cols-2">
        <div class="p-12 md:w-full flex flex-col items-start order-last lg:order-first">
            <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY HH:mm') }} - {{ \Carbon\Carbon::parse($event->date_end)->isoFormat('D/M/YYYY HH:mm') }}</span>
            <h1 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $event->name }}</h1>
            <div>
                {!! $event->description !!}
            </div>
            <div class="flex items-center flex-wrap mt-4 mb-4 w-full">
                <a href="{{ $event->url }}" target="_blank" class="text-indigo-500 inline-flex items-center">{{ __('Learn more') }}
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="inline-flex items-center mb-4">
                <!-- <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center"> -->
                <span class="flex-grow flex flex-col px-4">
                    <span class="title-font font-medium text-blue-400"><a href="mailto:{{ $event->email }}">{{ $event->email }}</a></span>
                    <span class="text-xs tracking-widest mt-0.5 text-gray-900 ">{{ $event->telephone }}</span>
                </span>
                <span class="flex-grow flex flex-col px-4">
                    <span class="title-font font-medium text-gray-900"><a>{{ $event->place }}</a></span>
                    <span class="text-blue-400 text-xs tracking-widest mt-0.5"><a href="http://maps.google.com/?q={{ $event->address }}+{{ $event->place }}" target="_blank">{{ $event->address }}</a></span>
                </span>
            </div>
            <!-- Inscription Button -->
            <div class="flex flex-col sm:flex-row self-center items-center justify-items-center py-4">
                <form class="sm:mx-4" action="{{ route('artists.inscription', $event) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" id="addEvent-btn">
                        {{ __('Inscription') }}
                    </button>
                </form>
                <a href="{{ route('artists', $event) }}" class="sm:mx-4 btn text-lg text-center text-yellow-300 bg-purple-700 hover:bg-purple-500 border-2 border-yellow-300 focus:outline-none rounded py-2 px-6 mb-4">
                    {{ __('View Artists') }}
                </a>
            </div>
        </div>
        <div class="w-full flex justify-center items-center order-first lg:order-last">
            <img src="{{ $event->img_src }}" alt="{{ $event->name }}" />
        </div>
    </div>

    <!-- Inscription Modal -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ $create ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gray-200 w-2/3 py-2 px-3 rounded shadow-xl text-gray-800 mt-3">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">{{ __('Sign Up') }}</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ route('inscriptions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-sm">
                    <div class="md:p-12 bg-gray-200">
                        <div class="bg-white w-full tw-h-full md:w-1/2-screen shadow md:rounded-lg flex flex-wrap p-4">
                            <div class="w-full flex-col flex p-4">
                                <label for="event_id" class="pb-2 text-gray-700 font-semibold">{{ __('Event') }}</label>
                                <select name="event_id" required>
                                    <option value={{ $event->id }} selected>{{ $event->name }}</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="fname" class="pb-2 text-gray-700 font-semibold">{{ __('First Name') }}</label>
                                <input type="text" name="fname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="lname" class="pb-2 text-gray-700 font-semibold">{{ __('Last Name') }}</label>
                                <input type="text" name="lname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="bio" class="pb-2 text-gray-700 font-semibold">{{ __('Short Bio') }}</label>
                                <input type="text" name="bio" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="products" class="pb-2 text-gray-700 font-semibold">{{ __('Products') }}</label>
                                <textarea name="products" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5" required></textarea>
                            </div>
                            <div class="col w-full md:w-1/2">
                                <div class="w-full flex-col flex p-3">
                                    <label for="telephone" class="pb-2 text-gray-700 font-semibold">{{ __('Telephone') }}</label>
                                    <input type="tel" name="telephone" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label for="email" class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label for="url" class="pb-2 text-gray-700 font-semibold">{{ __('Website') }}</label>
                                    <input type="url" placeholder="http://" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label for="facebook" class="pb-2 text-gray-700 font-semibold">{{ __('Facebook') }}</label>
                                    <input type="url" placeholder="http://" name="facebook" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label for="instagram" class="pb-2 text-gray-700 font-semibold">{{ __('Instagram') }}</label>
                                    <input type="url" placeholder="http://" name="instagram" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                            </div>
                            <div class="col w-full md:w-1/2">
                                <div class="w-full flex-col flex p-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image Link 1') }}</label>
                                    <input type="file" name="img01" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image Link 2') }}</label>
                                    <input type="file" name="img02" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image Link 3') }}</label>
                                    <input type="file" name="img03" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image Link 4') }}</label>
                                    <input type="file" name="img04" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-3">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image Link 5') }}</label>
                                    <input type="file" name="img05" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 flex justify-end space-x-3">
                    <input type="hidden" id="front" name="front" value="true" />
                    <button class="px-3 py-1 hover:text-red-800 hover:bg-red-600 hover:bg-opacity-50 rounded" id="close-modal2">{{ __('Cancel') }}</button>
                    <button class="px-3 py-1 text-gray-200 bg-green-800 hover:bg-green-600 rounded" type="submit">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
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
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('products');
</script>