<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.index') }}" class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                            <h2 class="text-2xl font-bold tracking-tight">Product Details</h2>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('product.edit', $product->id) }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg transition shadow-sm text-sm font-medium">
                                Edit Product
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-gray-100 dark:border-gray-700 pt-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider mb-4">Basic Information</h3>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm text-gray-500 dark:text-gray-400">Product Name</dt>
                                    <dd class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $product->name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500 dark:text-gray-400">Inventory Quantity</dt>
                                    <dd class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $product->quantity }} units</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500 dark:text-gray-400">Unit Price</dt>
                                    <dd class="text-lg font-semibold text-gray-900 dark:text-gray-100 italic">Rp. {{ number_format($product->price, 0, ',', '.') }}</dd>
                                </div>
                            </dl>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider mb-4">Metadata</h3>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm text-gray-500 dark:text-gray-400">Owner ID</dt>
                                    <dd class="text-base text-gray-900 dark:text-gray-100">{{ $product->user_id }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500 dark:text-gray-400">Created At</dt>
                                    <dd class="text-base text-gray-900 dark:text-gray-100">{{ $product->created_at->format('d M Y, H:i') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500 dark:text-gray-400">Last Updated</dt>
                                    <dd class="text-base text-gray-900 dark:text-gray-100">{{ $product->updated_at->format('d M Y, H:i') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-12 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product permanentely?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete this product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
