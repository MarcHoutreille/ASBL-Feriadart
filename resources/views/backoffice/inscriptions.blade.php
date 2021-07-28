<x-app-layout>
    <div class="flex flex-col pb-4">
        <h1 class="text-3xl sm:text-4xl font-medium title-font uppercase text-center text-purple-700 tracking-widest p-4">{{ __('Inscriptions') }}</h1>
        <!-- ADD INSCRIPTION BUTTON -->
        <div class="text-center mx-auto pb-4">
            <!-- VALIDATION ERRORS -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />
            <form action="{{ route('inscriptions.create') }}" method="GET">
                @csrf
                <button type="submit" class="mx-auto btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" id="addBtn">
                    {{ __('Add Inscription') }}
                </button>
            </form>
        </div>

        <!-- INSCRIPTIONS TABLE -->
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-11/12 divide-y divide-gray-200 mx-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Event') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Short bio') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Products') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Info') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Links') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Edit') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($inscriptions as $inscription)
                            <tr>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $inscription->event->img_src }}" alt="{{ $inscription->event->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $inscription->event->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $inscription->fname }}</div>
                                    <div class="text-sm text-gray-500">{{ $inscription->lname }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $inscription->bio }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{!! $inscription->products !!}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ $inscription->telephone }}</div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="mailto:{{ $inscription->email }}">{{ $inscription->email }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="{{ $inscription->url }}" target="_blank">{{ $inscription->url }}</a></div>
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="{{ $inscription->facebook }}" target="_blank">{{ $inscription->facebook }}</a></div>
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="{{ $inscription->instagram }}" target="_blank">{{ $inscription->instagram }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $inscription->img_01 }}" target="_blank">{{ $inscription->img_01 }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $inscription->img_02 }}" target="_blank">{{ $inscription->img_02 }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $inscription->img_03 }}" target="_blank">{{ $inscription->img_03 }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $inscription->img_04 }}" target="_blank">{{ $inscription->img_04 }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $inscription->img_05 }}" target="_blank">{{ $inscription->img_05 }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-right text-sm font-medium">
                                    @if(!$inscription->accepted)
                                    <div class="my-4">
                                        <a href="{{ route('inscriptions.show', $inscription) }}" class="text-green-600 hover:text-green-900">{{ __('Accept') }}</a>
                                    </div>
                                    @endif
                                    <div class="my-4">
                                        <a href="{{ route('inscriptions.edit', $inscription) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                    </div>
                                    @can('delete', $inscription)
                                    <form action="{{ route('inscriptions.destroy', $inscription) }}" method="POST" class="my-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD INSCRIPTION MODAL -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ (isset($edit) || isset($create)) ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-600 w-11/12 md:w-2/3 text-gray-800 rounded-lg shadow-xl -mt-4 border-yellow-300 border-2 focus:outline-none">
            <div class="flex justify-between items-center">
                <h2 class="text-yellow-300 text-lg font-bold p-2 mx-2">{{ isset($create) ? __('Add Inscription') : __('Update Inscription') }}</h2>
                <svg class="h-6 w-6 cursor-pointer text-yellow-300 hover:text-yellow-500 rounded-full mx-2" id="closeModalX" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ isset($edit) ? route('inscriptions.update', $inscriptionToEdit) : route('inscriptions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-sm">
                    <div class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-600 md:px-4">
                        <div class="bg-white w-full tw-h-full md:w-1/2-screen shadow md:rounded-lg flex flex-wrap p-4">
                            @isset($edit)
                            @method('PUT')
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="event_id" class="pb-2 text-gray-700 font-semibold">{{ __('Event') }}</label>
                                <select name="event_id" required>
                                    @foreach($events as $event)
                                    <option value={{ $event->id }} {{ $inscriptionToEdit->event->id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="accepted" class="pb-2 text-gray-700 font-semibold">{{ __('Status') }}</label>
                                <select name="accepted" required>
                                    <option value=1 {{ $inscriptionToEdit->accepted ? 'selected' : '' }}>{{ __('Accepted') }}</option>
                                    <option value=0 {{ $inscriptionToEdit->accepted ? '' : 'selected' }}>{{ __('Rejected') }}</option>
                                </select>
                            </div>
                            @endisset
                            @isset($create)
                            <div class="w-full flex-col flex p-2">
                                <label for="event_id" class="pb-2 text-gray-700 font-semibold">{{ __('Event') }}</label>
                                <select name="event_id" required>
                                    @foreach($events as $event)
                                    <option value={{ $event->id }} {{ $event->id == 1 ? 'selected' : '' }}>{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endisset
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="fname" class="pb-2 text-gray-700 font-semibold">{{ __('First name') }}</label>
                                <input type="text" name="fname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->fname }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="lname" class="pb-2 text-gray-700 font-semibold">{{ __('Last name') }}</label>
                                <input type="text" name="lname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->lname }}" @endisset required />
                            </div>
                            <div class="w-full flex-col flex p-2">
                                <label for="bio" class="pb-2 text-gray-700 font-semibold">{{ __('Short bio') }}</label>
                                <input type="text" name="bio" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->bio }}" @endisset required />
                            </div>
                            <div class="w-full flex-col flex p-2">
                                <label for="products" class="pb-2 text-gray-700 font-semibold">{{ __('Products') }}</label>
                                <textarea name="products" id="products" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5" required>@isset($edit) {{ $inscriptionToEdit->products }} @endisset</textarea>
                            </div>
                            <div class="col w-full md:w-1/2">
                                <div class="w-full flex-col flex p-2">
                                    <label for="telephone" class="pb-2 text-gray-700 font-semibold">{{ __('Telephone') }}</label>
                                    <input type="tel" name="telephone" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->telephone }}" @endisset required />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="email" class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->email }}" @endisset required />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="url" class="pb-2 text-gray-700 font-semibold">{{ __('Website') }} ({{ __('Optional')}})</label>
                                    <input type="url" placeholder="http://" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->url }}" @endisset />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="facebook" class="pb-2 text-gray-700 font-semibold">{{ __('Facebook') }} ({{ __('Optional')}})</label>
                                    <input type="url" placeholder="http://" name="facebook" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->facebook }}" @endisset />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="instagram" class="pb-2 text-gray-700 font-semibold">{{ __('Instagram') }} ({{ __('Optional')}})</label>
                                    <input type="url" placeholder="http://" name="instagram" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->instagram }}" @endisset />
                                </div>
                            </div>
                            <div class="col w-full md:w-1/2">
                                <div class="w-full flex-col flex p-2">
                                    <label for="img01" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 1</label>
                                    <input type="file" name="img01" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @if (isset($edit)) value="{{ $inscriptionToEdit->img_01 }}" @else required @endif />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="img02" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 2 ({{ __('Optional')}})</label>
                                    <input type="file" name="img02" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="img03" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 3 ({{ __('Optional')}})</label>
                                    <input type="file" name="img03" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="img04" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 4 ({{ __('Optional')}})</label>
                                    <input type="file" name="img04" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                                <div class="w-full flex-col flex p-2">
                                    <label for="img05" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }} 5 ({{ __('Optional')}})</label>
                                    <input type="file" name="img05" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center md:justify-end space-x-3 mt-4 mr-4">
                    <button class="btn text-lg text-center text-yellow-300 bg-purple-700 hover:bg-purple-500 border-2 border-yellow-300 focus:outline-none rounded py-2 px-6 mb-4" type="button" id="closeModal">{{ __('Cancel') }}</button>
                    <button class="btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" type="submit">{{ isset($edit) ? __('Update') : __('Add') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('products');
    </script>
</x-app-layout>