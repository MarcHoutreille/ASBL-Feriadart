<x-app-layout>
    <div class="h-64">
        <h1 class="text-3xl sm:text-4xl font-medium title-font uppercase text-center text-purple-700 tracking-widest p-4">{{ __('Backoffice') }}</h1>
        <div class="bg-white overflow-hidden text-center shadow-sm sm:rounded-lg border-b border-gray-200 p-4">
            {{ __('Hello') }} {{ Auth::user()->name }}!
        </div>
    </div>
</x-app-layout>