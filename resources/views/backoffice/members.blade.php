<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="flex flex-col py-14">

        <!-- Add Member Button -->
        <div class="mx-auto pb-14">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />

            <form action="{{ route('members.create') }}" method="GET">
                @csrf
                <button type="submit" class="px-6 py-3 bg-green-700 text-white rounded shadow" id="addEvent-btn">
                    {{ __('Add Member') }}
                </button>
            </form>
        </div>

        <!-- Members Table -->
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-11/12 divide-y divide-gray-200 mx-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Occupation') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Short Bio') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Picture') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Contact') }}
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
                            @foreach ($members as $member)
                            <tr>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $member->img_src }}" alt="{{ $member->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $member->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $member->title }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{!! $member->bio !!}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="{{ $member->img_src }}" target="_blank">{{ $member->img_src }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="mailto:{{ $member->email }}">{{ $member->email }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900"><a class="hover:text-blue-400" href="{{ $member->url }}" target="_blank">{{ $member->url }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $member->facebook }}" target="_blank">{{ $member->facebook }}</a></div>
                                    <div class="text-sm text-gray-500"><a class="hover:text-blue-400" href="{{ $member->instagram }}" target="_blank">{{ $member->instagram }}</a></div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-right text-sm font-medium">
                                    <div class="my-4">
                                        <a href="{{ route('members.edit', $member) }}" class="text-indigo-600 hover:text-indigo-900 my-4">{{ __('Edit') }}</a>
                                    </div>
                                    @can('delete', $member)
                                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="my-4">
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

    <!-- Add Member Modal -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ (isset($edit) || isset($create)) ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gray-200 w-2/3 py-2 px-3 rounded shadow-xl text-gray-800 mt-3">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">{{ isset($create) ? __('Add Member') : __('Update member') }}</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ isset($edit) ? route('members.update', $memberToEdit) : route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-sm">
                    <div class="md:p-12 bg-gray-200">
                        <div class="bg-white w-full tw-h-full md:w-1/2-screen shadow md:rounded-lg flex flex-wrap p-4">
                            @isset($edit)
                            @method('PUT')
                            @endisset
                            @isset($create)
                            @endisset
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="name" class="pb-2 text-gray-700 font-semibold">{{ __('Name') }}</label>
                                <input type="text" name="name" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->name }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="title" class="pb-2 text-gray-700 font-semibold">{{ __('Occupation') }}</label>
                                <input type="text" name="title" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->title }}" @endisset required />
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="bio" class="pb-2 text-gray-700 font-semibold">{{ __('Short Bio') }}</label>
                                <textarea name="bio" id="bio" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5" required>@isset($edit) {{ $memberToEdit->bio }} @endisset</textarea>
                            </div>
                            <div class="w-full flex-col flex p-3">
                                <label for="img" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }}</label>
                                <input type="file" name="img" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @if (isset($edit)) value="{{ $memberToEdit->img_src }}" @else required @endif />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="email" class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->email }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="url" class="pb-2 text-gray-700 font-semibold">{{ __('Website') }}</label>
                                <input type="url" placeholder="http://" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->url }}" @endisset />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="facebook" class="pb-2 text-gray-700 font-semibold">{{ __('Facebook') }}</label>
                                <input type="url" placeholder="http://" name="facebook" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->facebook }}" @endisset />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-3">
                                <label for="instagram" class="pb-2 text-gray-700 font-semibold">{{ __('Instagram') }}</label>
                                <input type="url" placeholder="http://" name="instagram" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->instagram }}" @endisset />
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('bio');
    </script>
</x-app-layout>