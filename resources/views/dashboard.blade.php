<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-{{ auth()->user()->statusLabel() }}-500 rounded-lg">

                <div class="p-6 text-white">
                    Your role is {{ auth()->user()->role }}.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
