<x-layouts.master>
    @include('partials.navbar', ['bgColor' => 'border-b border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-800'])

    <main>
        <div class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
            {{ $slot }}
        </div>
    </main>

    @include('partials.footer', ['bgColor' => 'bg-white py-6 border-t border-gray-200 dark:bg-gray-800 dark:border-gray-800'])
</x-layouts.master>
