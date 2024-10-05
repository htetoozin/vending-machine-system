<x-app-layout>
    <div class="mt-12">
        <div class="bg-gray-100">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-300 to-indigo-400 transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <div class="border-b border-gray-300">
                            <h1 class="text-2xl font-semibold">Create {{ auth()->user()->name }}'s Purchase</h1>
                        </div>
                        <div class="divide-y divide-gray-200 mt-9">
                            <form method="POST" action="{{ route('admin.purchases.store', $product->id) }}"
                                class="mt-8 space-y-4 text-base
                                leading-6">
                                @csrf
                                <div class="relative">
                                    <x-input-label for="name" value="Name" required />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        value="{{ $product->name }}" required autofocus autocomplete="name" readonly />
                                    <input hidden name="product_id" value={{ $product->id }} />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>


                                <div class="relative mt-4">
                                    <x-input-label for="qty" value="Purchase QTY" required />
                                    <x-text-input id="qty" class="block mt-1 w-full" type="number" name="qty"
                                        value="{{ old('qty') }}" required autofocus autocomplete="purchase_qty" />

                                    <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                                </div>
                                <x-submit-button label="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if ($transactions->count() > 0)
                <div class="relative py-3 sm:max-w-xl sm:mx-auto mt-9">
                    <x-table :theads=$theads :action="false">
                        @foreach ($transactions as $transaction)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->product?->name }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->price }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->qty }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->total_amount }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->created_at->format('d/m/Y h:i:s A') }}
                                </th>



                            </tr>
                        @endforeach
                    </x-table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
