<x-app-layout>
    <div class="flex flex-col pb-4">
        <h1 class="text-3xl sm:text-4xl font-medium title-font uppercase text-center text-purple-700 tracking-widest p-4">{{ __('Members') }}</h1>
        <!-- ADD MEMBER BUTTON -->
        <div class="text-center mx-auto pb-4">
            <!-- VALIDATION ERRORS -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" />
            <form action="{{ route('members.create') }}" method="GET">
                @csrf
                <button type="submit" class="mx-auto btn text-lg text-center text-purple-700 bg-yellow-300 hover:bg-yellow-200 border-2 border-purple-700 focus:outline-none rounded py-2 px-6 mb-4" id="addBtn">
                    {{ __('Add Member') }}
                </button>
            </form>
        </div>

        <!-- MEMBERS TABLE -->
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
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
                                    {{ __('Short bio') }}
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
                                            <div class="text-sm font-medium text-gray-900">{{ $member->fname }}</div>
                                            <div class="text-sm font-medium text-gray-500">{{ $member->lname }}</div>
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

    <!-- ADD MEMBER MODAL -->
    <div class="bg-black bg-opacity-50 absolute inset-0 {{ (isset($edit) || isset($create)) ? 'flex' : 'hidden' }} justify-center items-start" id="overlay">
        <div class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-600 w-11/12 md:w-2/3 text-gray-800 rounded-lg shadow-xl -mt-4 border-yellow-300 border-2 focus:outline-none">
            <div class="flex justify-between items-center">
                <h2 class="text-yellow-300 text-lg font-bold p-2 mx-2">{{ isset($create) ? __('Add Member') : __('Update member') }}</h2>
                <svg class="h-6 w-6 cursor-pointer text-yellow-300 hover:text-yellow-500 rounded-full mx-2" id="closeModalX" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ isset($edit) ? route('members.update', $memberToEdit) : route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-sm">
                <div class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-600 md:px-4">
                        <div class="bg-white w-full tw-h-full md:w-1/2-screen shadow md:rounded-lg flex flex-wrap p-4">
                            @isset($edit)
                            @method('PUT')
                            @endisset
                            @isset($create)
                            @endisset
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="fname" class="pb-2 text-gray-700 font-semibold">{{ __('First name') }}</label>
                                <input type="text" name="fname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->fname }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="lname" class="pb-2 text-gray-700 font-semibold">{{ __('Last name') }}</label>
                                <input type="text" name="lname" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->lname }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="title" class="pb-2 text-gray-700 font-semibold">{{ __('Occupation') }}</label>
                                <input type="text" name="title" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->title }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="img" class="pb-2 text-gray-700 font-semibold">{{ __('Image') }}</label>
                                <input type="file" name="img" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @if (isset($edit)) value="{{ $memberToEdit->img_src }}" @else required @endif />
                            </div>
                            <div class="w-full flex-col flex p-2">
                                <label for="bio" class="pb-2 text-gray-700 font-semibold">{{ __('Short bio') }}</label>
                                <textarea name="bio" id="bio" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="5" required>@isset($edit) {{ $memberToEdit->bio }} @endisset</textarea>
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="email" class="pb-2 text-gray-700 font-semibold">{{ __('Email') }}</label>
                                <input type="email" name="email" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->email }}" @endisset required />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="url" class="pb-2 text-gray-700 font-semibold">{{ __('Website') }} ({{ __('Optional')}})</label>
                                <input type="url" placeholder="http://" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->url }}" @endisset />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="facebook" class="pb-2 text-gray-700 font-semibold">{{ __('Facebook') }} ({{ __('Optional')}})</label>
                                <input type="url" placeholder="http://" name="facebook" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->facebook }}" @endisset />
                            </div>
                            <div class="w-full md:w-1/2 flex-col flex p-2">
                                <label for="instagram" class="pb-2 text-gray-700 font-semibold">{{ __('Instagram') }} ({{ __('Optional')}})</label>
                                <input type="url" placeholder="http://" name="instagram" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $memberToEdit->instagram }}" @endisset />
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
        CKEDITOR.replace('bio');
    </script>
</x-app-layout>