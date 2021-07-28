<section class="container w-full text-gray-600 body-font px-4 py-4 mx-auto overflow-hidden">
    <div class="text-center mx-auto">
        <!-- VALIDATION ERRORS -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-success-message class="mb-4" />
    </div>
    <div class="flex flex-wrap grid grid-cols-1 lg:grid-cols-2">
        <div class="p-4 flex flex-col items-start">
            <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY HH:mm') }} - {{ \Carbon\Carbon::parse($event->date_end)->isoFormat('D/M/YYYY HH:mm') }}</span>
            <h1 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $event->name }}</h1>
            <div>
                {!! $event->description !!}
            </div>
            <div class="w-full flex items-center flex-wrap mt-4 mb-4">
                <a href="{{ $event->url }}" target="_blank" class="inline-flex items-center text-indigo-500 hover:text-indigo-700">{{ __('Learn more') }}
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <span class="flex flex-col flex-grow pr-4">
                    <span class="font-medium text-blue-400 hover:text-blue-700"><a href="mailto:{{ $event->email }}">{{ $event->email }}</a></span>
                    <span class="font-medium text-gray-900 tracking-widest">{{ $event->telephone }}</span>
                </span>
                <span class="flex flex-col flex-grow">
                    <span class="font-medium text-gray-900"><a>{{ $event->place }}</a></span>
                    <span class="font-medium text-blue-400 hover:text-blue-700"><a href="http://maps.google.com/?q={{ $event->address }}+{{ $event->place }}" target="_blank">{{ $event->address }}</a></span>
                </span>
            </div>
            <!-- BUTTONS -->
            <div class="flex flex-col sm:flex-row self-center items-center justify-items-center py-4">
                <form class="sm:mx-4" action="{{ route('artists.inscription', $event) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" id="addBtn">
                        {{ __('Inscription') }}
                    </button>
                </form>
                <a href="{{ route('artists', $event) }}" class="sm:mx-4 btn text-lg text-center text-yellow-300 bg-purple-700 hover:bg-purple-500 border-2 border-yellow-300 focus:outline-none rounded py-2 px-6 mb-4">
                    {{ __('View Artists') }}
                </a>
            </div>
        </div>
        <div class="flex justify-center items-center p-4">
            <img src="{{ $event->img_src }}" alt="{{ $event->name }}" />
        </div>
    </div>

    <!-- INSCRIPTION MODAL -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ $create ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-600 w-11/12 md:w-2/3 text-gray-800 rounded-lg shadow-xl -mt-4 border-yellow-300 border-2 focus:outline-none">
            <div class="flex justify-between items-center">
                <h2 class="text-yellow-300 text-lg font-bold p-2 mx-2">{{ __('Sign up') }}</h2>
                <svg class="h-6 w-6 cursor-pointer text-yellow-300 hover:text-yellow-500 rounded-full mx-2" id="closeModalX" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ route('inscriptions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-sm">
                    <div class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-600 md:px-4">
                        <div class="bg-white w-full tw-h-full md:w-1/2-screen shadow md:rounded-lg flex flex-wrap p-4">
                            <div class="w-full flex-col flex p-2">
                                <label for="event_id" class="pb-2 text-gray-700 font-semibold">{{ __('Event') }}</label>
                                <select name="event_id" required>
                                    <option value={{ $event->id }} selected>{{ $event->name }}</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="fname" class="pb-2 text-gray-700 font-semibold">{{ __('First name') }}</label>
                                <input type="text" name="fname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="lname" class="pb-2 text-gray-700 font-semibold">{{ __('Last name') }}</label>
                                <input type="text" name="lname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                            </div>
                            <div class="w-full flex-col flex p-2">
                                <label for="bio" class="pb-2 text-gray-700 font-semibold">{{ __('Short bio') }}</label>
                                <input type="text" name="bio" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                            </div>
                            <div class="w-full flex-col flex p-2">
                                <label for="products" class="pb-2 text-gray-700 font-semibold">{{ __('Products') }}</label>
                                <textarea name="products" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5" required></textarea>
                            </div>
                            <div class="col w-full md:w-1/2">
                                <div class="w-full flex-col flex p-2">
                                    <label for="telephone" class="pb-2 text-gray-700 font-semibold">{{ __('Telephone') }}</label>
                                    <input type="tel" name="telephone" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="email" class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="url" class="pb-2 text-gray-700 font-semibold">{{ __('Website') }} ({{ __('Optional')}})</label>
                                    <input type="url" placeholder="http://" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="facebook" class="pb-2 text-gray-700 font-semibold">{{ __('Facebook') }} ({{ __('Optional')}})</label>
                                    <input type="url" placeholder="http://" name="facebook" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="instagram" class="pb-2 text-gray-700 font-semibold">{{ __('Instagram') }} ({{ __('Optional')}})</label>
                                    <input type="url" placeholder="http://" name="instagram" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                            </div>
                            <div class="col w-full md:w-1/2">
                                <div class="w-full flex-col flex p-2">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 1</label>
                                    <input type="file" name="img01" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" required />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 2 ({{ __('Optional')}})</label>
                                    <input type="file" name="img02" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 3 ({{ __('Optional')}})</label>
                                    <input type="file" name="img03" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 4 ({{ __('Optional')}})</label>
                                    <input type="file" name="img04" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 5 ({{ __('Optional')}})</label>
                                    <input type="file" name="img05" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center md:justify-end space-x-3 mt-4 mr-4">
                    <input type="hidden" id="front" name="front" value="true" />
                    <button class="btn text-lg text-center text-yellow-300 bg-purple-700 hover:bg-purple-500 border-2 border-yellow-300 focus:outline-none rounded py-2 px-6 mb-4" type="button" id="closeModal">{{ __('Cancel') }}</button>
                    <button class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" type="submit">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- INSCRIPTION BUTTON JAVASCRIPT -->
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const overlay = document.querySelector('#overlay');
        const delBtn = document.querySelector('#addBtn');
        const closeBtn = document.querySelector('#closeModalX');
        const closeBtn2 = document.querySelector('#closeModal');
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