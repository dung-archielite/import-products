<x-layouts.master>
    @include('partials.navbar')
    <main>
        {{ $slot }}
    </main>
    @include('partials.footer')
</x-layouts.master>
