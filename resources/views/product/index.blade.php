<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Product List</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your product inventory</p>
                        </div>
                        @can('manage-products')
                            <x-add-product :url="route('product.create')" :name="'Product'"/>
                        @endcan
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700">
                                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 font-medium uppercase text-xs text-gray-500 dark:text-gray-400">Name</th>
                                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 font-medium uppercase text-xs text-gray-500 dark:text-gray-400">Category</th>
                                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 font-medium uppercase text-xs text-gray-500 dark:text-gray-400">Qty</th>
                                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 font-medium uppercase text-xs text-gray-500 dark:text-gray-400">Price</th>
                                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 font-medium uppercase text-xs text-gray-500 dark:text-gray-400 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ $product->category->name ?? '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ $product->quantity }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-600 dark:text-gray-400">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <a href="{{ route('product.show', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View</a>
                                            <a href="{{ route('product.edit', $product->id) }}" class="text-amber-600 hover:text-amber-900 text-sm font-medium">Edit</a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                            No products found. Start by adding one!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
