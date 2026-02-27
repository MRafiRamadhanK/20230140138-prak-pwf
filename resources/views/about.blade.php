<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-2xl font-bold mb-4">Profil Mahasiswa</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-md shadow-sm border border-gray-100">
                            <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Nama</span>
                            <p class="text-lg font-medium text-gray-800 mt-1">{{ $nama }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-md shadow-sm border border-gray-100">
                            <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider">NIM</span>
                            <p class="text-lg font-mono text-purple-700 font-bold mt-1">{{ $nim }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-md shadow-sm border border-gray-100">
                            <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Program Studi</span>
                            <p class="text-lg font-medium text-gray-800 mt-1">{{ $program_studi }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-md shadow-sm border border-gray-100">
                            <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Hobi</span>
                            <p class="text-lg font-medium text-gray-800 mt-1">{{ $hobi }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
