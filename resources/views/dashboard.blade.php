<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Your role is <div
                        class="inline-flex items-center rounded-md bg-{{ auth()->user()->statusLabel() }}-600 px-2 py-1 text-xs font-medium  ring-1 ring-inset">
                        {{ auth()->user()->role }}</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
