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
                            <h1 class="text-2xl font-semibold">Create Product</h1>
                        </div>
                        <div class="divide-y divide-gray-200 mt-9">
                            <form method="POST" action="{{ route('admin.products.store') }}"
                                class="mt-8 space-y-4 text-base
                                leading-6">
                                @csrf
                                <div class="relative">
                                    <x-input-label for="name" value="Name" required />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        value="{{ old('name') }}" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="relative mt-4">
                                    <x-input-label for="price" value="Price" required />
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                        value="{{ old('price') }}" required autofocus autocomplete="price" />

                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <div class="relative mt-4">
                                    <x-input-label for="quantity_available" value="Quantity Available" required />
                                    <x-text-input id="quantity_available" class="block mt-1 w-full" type="number"
                                        name="quantity_available" value="{{ old('quantity_available') }}" required
                                        autofocus autocomplete="quantity_available" />

                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <x-submit-button label="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
