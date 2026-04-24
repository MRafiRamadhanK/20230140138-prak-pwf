<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex justify-between items-start mb-8">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('product.index') }}" class="p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Product Detail</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Viewing product #{{ $product->id }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <x-edit-button :url="route('product.edit', $product->id)" />
                            <x-delete-button :action="route('product.delete', $product->id)" />
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
