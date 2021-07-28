<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl sm:text-4xl font-medium title-font uppercase text-center text-purple-700 tracking-widest">
            {{ __('Backoffice') }}
        </h1>
    </x-slot>

    <div class="h-64">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-b border-gray-200 p-4">
            {{ __('Hello') }} {{ Auth::user()->name }}!
        </div>
    </div>
</x-app-layout>