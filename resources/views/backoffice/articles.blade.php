<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="flex flex-col py-14">

        <!-- Add Comment Button -->
        <div class="mx-auto pb-14">
            <form action="{{ route('articles.create') }}" method="GET">
            @csrf
                <button class="px-6 py-3 bg-green-700 text-white rounded shadow" id="addEvent-btn">
                    {{ __('Add Article')}}
                </button>
            </form>
        </div>

        <!-- Articles Table -->
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-11/12 divide-y divide-gray-200 mx-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Date') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Author') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Title') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Excerpt') }}
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Body') }}
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
                            @foreach ($articles as $article)
                            <tr>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $article->img_src }}" alt="{{ $article->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $article->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $article->author }}</div>
                                    <div class="text-sm text-gray-500">{{ $article->contact }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $article->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $article->slug }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal">
                                    <div class="text-sm text-gray-900">{{ $article->excerpt }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ $article->body }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ $article->url }}</div>
                                    <div class="text-sm text-gray-500">{{ $article->img_src }}</div>
                                </td>
                                <td class="px-4 py-4 whitespace-normal text-right text-sm font-medium">
                                    <a href="{{ route('articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900 my-4">{{ __('Edit') }}</a>
                                    @can('delete', $article)
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="my-4">
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
                <h4 class="text-lg font-bold">{{ isset($create) ? __('Add Article') : __('Update Article') }}</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="{{ isset($edit) ? route('articles.update', $articleToEdit) : route('articles.store') }}" method="POST">
                @csrf
                <div class="mt-2 text-sm">
                    <div class="md:p-12 bg-gray-200 flex flex-row flex-wrap">
                        <div class="md:w-1/2-screen m-0 p-5 bg-white w-full tw-h-full shadow md:rounded-lg">
                            @isset($edit)
                            @method('PUT')
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Date') }}</label>
                                <input type="datetime-local" name="created_at" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" value="{{ date('Y-m-d\TH:i', strtotime($articleToEdit->created_at)) }}" />
                            </div>
                            @endisset
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Title') }}</label>
                                <input type="text" name="title" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $articleToEdit->title }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Excerpt') }}</label>
                                <input type="text" name="excerpt" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $articleToEdit->excerpt }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Body') }}</label>
                                <textarea name="body" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="10">@isset($edit) {{ $articleToEdit->body }} @endisset</textarea>
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Author') }}</label>
                                <input type="text" name="author" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $articleToEdit->author }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Contact Info') }}</label>
                                <input type="text" name="contact" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $articleToEdit->contact }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Article URL') }}</label>
                                <input type="text" name="url" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $articleToEdit->url }}" @endisset />
                            </div>
                            <div class="flex-col flex py-3">
                                <label class="pb-2 text-gray-700 font-semibold">{{ __('Image') }}</label>
                                <input type="text" name="img_src" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" @isset($edit) value="{{ $articleToEdit->img_src }}" @endisset />
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