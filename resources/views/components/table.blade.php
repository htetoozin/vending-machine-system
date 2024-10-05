@props(['theads', 'action' => true])

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($theads as $label => $thead)
                <th scope="col" class="px-6 py-3">
                    {{ $thead }}
                </th>
            @endforeach

            @if ($action)
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            @endif

        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
