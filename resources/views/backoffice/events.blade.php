<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl sm:text-4xl font-medium title-font uppercase text-center text-purple-700 tracking-widest">
            {{ __('Events') }}
        </h1>
    </x-slot>

    <div class="flex flex-col pb-4">
        <!-- ADD EVENT BUTTON -->
        <div class="text-center mx-auto pb-4">
            <!-- VALIDATION ERRORS -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />
            <form action="{{ route('events.create') }}" method="GET">
                @csrf
                <button type="submit" class="mx-auto btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" id="addBtn">
                    {{ __('Add Event') }}
                </button>
            </form>
        </div>

        <!-- EVENTS TABLE -->
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-11/12 divide-y divide-gray-200 mx-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Dates') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Event') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Inscription') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Info') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Files') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Edit') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($events as $event)
                            <tr>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $event->img_src }}" alt="{{ $event->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $event->date_start }}
                                            </div>
                                            <div class="text-sm font-medium text-gray-500">
                                                {{ $event->date_end }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $event->name }}</div>
                                    <div class="text-sm text-gray-500">{!! $event->description !!}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $event->inscription_img }}</div>
                                    <div class="text-sm text-gray-500">{!! $event->inscription_txt !!}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ $event->telephone }}</div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="mailto:{{ $event->email }}">{{ $event->email }}</a></div>
                                    <div class="text-sm text-gray-900">{{ $event->place }}</div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="https://www.google.com/maps?q={{ $event->address }}" target="_blank">{{ $event->address }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="{{ $event->url }}" target="_blank">{{ $event->url }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $event->img_src }}" target="_blank">{{ $event->img_src }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-right text-sm font-medium">
                                    @if(!$event->open)
                                    <div class="my-4">
                                        <a href="{{ route('events.show', $event) }}" class="text-green-600 hover:text-green-900">{{ __('Open') }}</a>
                                    </div>
                                    @endif
                                    <div class="my-4">
                                        <a href="{{ route('events.edit', $event) }}" class="text-indigo-600 hover:text-indigo-900 my-4">{{ __('Edit') }}</a>
                                    </div>
                                    @can('delete', $event)
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="my-4">
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

    <!-- ADD EVENT MODAL -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ (isset($edit) || isset($create)) ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gray-200 w-2/3 py-2 px-3 rounded shadow-xl text-gray-800 mt-3">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">{{ isset($create) ? __('Add Event') : __('Update Event') }}</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="closeModalX" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ isset($edit) ? route('events.update', $eventToEdit) : route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-sm">
                    <div class="md:p-12 bg-gray-200">
                        <div class="bg-white w-full tw-h-full md:w-1/2-screen shadow md:rounded-lg flex flex-wrap p-4">
                            @isset($edit)
                            @method('PUT')
                            <div class="w-full flex-col flex p-3">
                                <label for="open" class="pb-2 text-gray-700 font-semibold">{{ __('Status') }}</label>
                                <select name="open" required>
                                    <option value=1 {{ $eventToEdit->open ? 'selected' : '' }}>{{ __('Open') }}</option>
                                    <option value=0 {{ $eventToEdit->open ? '' : 'selected' }}>{{ __('Close') }}</option>
                                </select>
                            </div>
                            @endisset
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="date_start" class="pb-2 text-gray-700 font-semibold">{{ __('Start Date') }}</label>
                                <input type="datetime-local" name="date_start" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ date('Y-m-d\TH:i', strtotime($eventToEdit->created_at)) }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="date_end" class="pb-2 text-gray-700 font-semibold">{{ __('End Date') }}</label>
                                <input type="datetime-local" name="date_end" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ date('Y-m-d\TH:i', strtotime($eventToEdit->created_at)) }}" @endisset required />
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="name" class="pb-2 text-gray-700 font-semibold">{{ __('Event Name') }}</label>
                                <input type="text" name="name" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $eventToEdit->name }}" @endisset required />
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="url" class="pb-2 text-gray-700 font-semibold">{{ __('Facebook Event URL') }}</label>
                                <input type="url" placeholder="http://" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $eventToEdit->url }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="img" class="pb-2 text-gray-700 font-semibold">{{ __('Event Image') }}</label>
                                <input type="file" name="img" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @if (isset($edit)) value="{{ $eventToEdit->img_src }}" @else required @endif />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="inscriptionimg" class="pb-2 text-gray-700 font-semibold">{{ __('Inscription Image') }}</label>
                                <input type="file" name="inscriptionimg" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @if (isset($edit)) value="{{ $eventToEdit->inscription_img }}" @else required @endif />
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="description" class="pb-2 text-gray-700 font-semibold">{{ __('Description') }}</label>
                                <textarea name="description" id="description" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="10" required>@isset($edit) {{ $eventToEdit->description }} @endisset</textarea>
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="inscription_txt" class="pb-2 text-gray-700 font-semibold">{{ __('Inscription Text') }}</label>
                                <textarea name="inscription_txt" id="inscription_txt" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="10" required>@isset($edit) {{ $eventToEdit->inscription_txt }} @endisset</textarea>
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="place" class="pb-2 text-gray-700 font-semibold">{{ __('Place') }}</label>
                                <input type="text" name="place" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $eventToEdit->place }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="address" class="pb-2 text-gray-700 font-semibold">{{ __('Address') }}</label>
                                <input type="text" name="address" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $eventToEdit->address }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="telephone" class="pb-2 text-gray-700 font-semibold">{{ __('Telephone') }}</label>
                                <input type="tel" name="telephone" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $eventToEdit->telephone }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="email" class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $eventToEdit->email }}" @endisset required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 flex justify-end space-x-3">
                    <button class="px-3 py-1 hover:text-red-800 hover:bg-red-600 hover:bg-opacity-50 rounded" id="closeModal">{{ __('Cancel') }}</button>
                    <button class="px-3 py-1 text-gray-200 bg-green-800 hover:bg-green-600 rounded" type="submit">{{ isset($edit) ? __('Update') : __('Add') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('inscription_txt');
    </script>
</x-app-layout>