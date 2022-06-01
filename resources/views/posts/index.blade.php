<x-layout>
    <x-slot name="slot">
        @include('posts._header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
            <x-post-grid :posts="$posts" />
            {{$posts->links()}}
            @endif
        </main>
    </x-slot>
</x-layout>