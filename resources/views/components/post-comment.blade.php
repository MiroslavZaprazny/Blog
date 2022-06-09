@props(['comment'])
<article class="flex bg-gray-50 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="{{ asset('storage/' . auth()->user()->picture) }}" alt=""
            class="rounded-full w-16 h-16 object-cover">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->user->name }}</h3>
            <p class="text-xs">

                <time> {{ $comment->created_at->diffForHumans() }} </time>
            </p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
