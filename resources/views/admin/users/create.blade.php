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
                            <h1 class="text-2xl font-semibold">Create User</h1>
                        </div>
                        <div class="divide-y divide-gray-200 mt-9">
                            <form method="POST" action="{{ route('admin.users.store') }}"
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
                                    <x-input-label for="email" value="Email" required />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        value="{{ old('email') }}" required autofocus autocomplete="email" />

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="relative mt-4">
                                    <x-input-label for="Role" value="Role" required />

                                    <select id="role_id" name="role_id"
                                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->value }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>
                                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                                </div>

                                <div class="relative mt-4">
                                    <x-input-label for="password" value="Password" required />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" value="{{ old('password') }}" required autofocus />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="relative mt-4">
                                    <x-input-label for="password_confirmation" value="Confirm Password" required />
                                    <x-text-input class="block mt-1 w-full" id="password_confirmation" type="password"
                                        name="password_confirmation" required autofocus />


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
