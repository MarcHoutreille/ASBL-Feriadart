<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscriptions') }}
        </h2>
    </x-slot>

    <div class="flex flex-col py-14">

        <!-- Add Event Button -->
        <div class="mx-auto pb-14">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />

            <form action="{{ route('inscriptions.create') }}" method="GET">
            @csrf
                <button class="px-6 py-3 bg-green-700 text-white rounded shadow" id="addEvent-btn">
                    {{ __('Add Inscription')}}
                </button>
            </form>
        </div>

        <!-- Inscriptions Table -->
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
                                    {{ __('Short Bio') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Products') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Contact') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Links') }}
                                </th>
                                <th scope="col" class="relative px-4 py-3">
                                    <span class="sr-only">{{ __('Edit') }}</span>
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
                                    <div class="text-sm text-gray-900">{{ $inscription->products }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ $inscription->telephone }}</div>
                                    <div class="text-sm text-gray-500">{{ $inscription->email }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ $inscription->url }}</div>
                                    <div class="text-sm text-gray-500">{{ $inscription->img_src }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-right text-sm font-medium">
                                    <div class="my-4">
                                        <a href="{{ route('inscriptions.edit', $inscription) }}" class="text-indigo-600 hover:text-indigo-900 my-4">{{ __('Edit') }}</a>
                                    </div>
                                    @can('delete', $inscription)
                                    <form action="{{ route('inscriptions.destroy', $inscription) }}" method="POST" class="my-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
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

    <!-- Add Event Modal -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ (isset($edit) || isset($create)) ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gray-200 w-2/3 py-2 px-3 rounded shadow-xl text-gray-800 mt-6">
            <div class="flex justify-between items-center">
            <h4 class="text-lg font-bold">{{ isset($create) ? __('Add Inscription') : __('Update Inscription') }}</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ isset($edit) ? route('inscriptions.update', $inscriptionToEdit) : route('inscriptions.store') }}" method="POST">
                @csrf
                <div class="mt-2 text-sm">
                    <div class="md:p-12 bg-gray-200 flex flex-row flex-wrap">
                        <div class="md:w-1/2-screen m-0 p-5 bg-white w-full tw-h-full shadow md:rounded-lg">
                            @isset($edit)
                            @method('PUT')
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Event') }}</label>
                                <select name="event_id">
                                    @foreach($events as $event)
                                    <option value={{ $event->id }} {{ $inscriptionToEdit->event->id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endisset
                            @isset($create)
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Event') }}</label>
                                <select name="event_id">
                                    @foreach($events as $event)
                                    <option value={{ $event->id }} {{ $event->id == 1 ? 'selected' : '' }}>{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endisset
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('First Name') }}</label>
                                <input type="text" name="fname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->fname }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Last Name') }}</label>
                                <input type="text" name="lname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->lname }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Short Bio') }}</label>
                                <input type="text" name="bio" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->bio }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Products') }}</label>
                                <textarea name="products" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5">@isset($edit) {{ $inscriptionToEdit->products }} @endisset</textarea>
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Telephone') }}</label>
                                <input type="tel" name="telephone" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->telephone }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->email }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Event URL') }}</label>
                                <input type="text" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->url }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Image Link') }}</label>
                                <input type="text" name="img_src" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $inscriptionToEdit->img_src }}" @endisset />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 flex justify-end space-x-3">
                    <button class="px-3 py-1 hover:text-red-800 hover:bg-red-600 hover:bg-opacity-50 rounded" id="close-modal2">{{ __('Cancel') }}</button>
                    <button class="px-3 py-1 text-gray-200 bg-green-800 hover:bg-green-600 rounded" type="submit">{{ isset($edit) ? __('Update') : __('Add') }}</button>
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

</x-app-layout>