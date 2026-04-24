<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                            Status Akun: <span class="text-indigo-600 dark:text-indigo-400 font-bold uppercase">{{ Auth::user()->role }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
