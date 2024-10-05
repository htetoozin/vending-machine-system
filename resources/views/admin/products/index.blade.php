<x-app-layout>
    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.products.index') }}" method="GET">
                <div class="flex mb-4">
                    <div class="mr-6">
                        <select id="order_by" name="order_by"
                            class="w-40 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-2.5">
                            <option value="">Order By Name</option>
                            <option value="asc">ASC</option>
                            <option value="desc">DESC</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>

                </div>
            </form>
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.products.create') }}"
                    class="inline-flex items-center text-white 
                    bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4
                    focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5
                    py-2.5 text-center me-2 mb-2">
                    Create
                </a>
            </div>



            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <x-table :theads=$theads>
                    @foreach ($products as $product)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->price }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->quantity_available }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="inline-flex space-x-2">
                                    <!-- Purchase Button -->
                                    <a href="{{ route('admin.purchases.create', $product->id) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-green-500 border border-transparent rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                        Purchase
                                    </a>
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 border border-transparent rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 bg-red-100 border border-transparent rounded-md hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>


                        </tr>
                    @endforeach
                </x-table>



            </div>
            <div class="mt-3">
                {{ $products->links() }}
            </div>


        </div>
    </div>
</x-app-layout>
