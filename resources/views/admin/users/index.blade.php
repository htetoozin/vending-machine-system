<x-app-layout>
    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.users.create') }}"
                    class="inline-flex items-center text-white
                    bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4
                    focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5
                    py-2.5 text-center me-2 mb-2">
                    Create
                </a>
            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <x-table :theads=$theads>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->email }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->role }}
                            </th>
                            <td class="px-6 py-4">

                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="inline-flex items-center px-4 py-2 mr-2 text-sm font-medium text-blue-600 bg-blue-100 border border-transparent rounded-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                    Edit
                                </a>


                                <button
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 bg-red-100 border border-transparent rounded-md hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                                    Delete
                                </button>
                            </td>

                        </tr>
                    @endforeach
                </x-table>

            </div>

        </div>
    </div>
</x-app-layout>
