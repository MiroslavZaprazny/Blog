@props(['post'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        @if ($post->thumbnail)
            <div class="flex lg:mr-8">
                <a href="posts/{{ $post->title }}">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration"
                        class="rounded-xl  max-w-sm">
                </a>
            </div>
        @else
            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl max-w-sm mr-8">
        @endif

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/?category={{ $post->category->name }}"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                        style="font-size: 10px">{{ $post->category->name }}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $post->title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    @if (!$post->user->picture)
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    @else
                        <img src="{{ asset('storage/' . $post->user->picture) }}" alt="Your profile picture"
                            class="rounded-2xl w-14 h-14 object-cover">
                    @endif
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?user={{ $post->user->username }}">{{ $post->user->name }}
                            </a>
                        </h5>
                    </div>
                </div>

                <div class="flex">
                    <a href="/posts/{{ $post->title }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
