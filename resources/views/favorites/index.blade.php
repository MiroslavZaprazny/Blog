<x-layout>
    <div 
    class= 'lg:grid lg:grid-cols-6'
    >
    @foreach ($posts as $post)
    <article 
    class="col-span-2 transition-colors 
    duration-300 hover:bg-gray-100 border 
    border-black border-opacity-0 
    hover:border-opacity-5 rounded-xl max-w-lg"
    >

    <div class="py-6 px-5">
        @if (isset($post['thumbnail']))

            <img src="{{ asset('storage/' . $post['thumbnail']) }}" alt="Blog Post illustration" class="rounded-xl"
            style="max-height: 400px">
        @else
        <div class="">
            <img src="/images/illustration-3.png" alt="Blog Post illustration" 
            class="rounded-xl"
            >
        </div>
        @endif

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="mb-2 flex justify-end">
                  <form action="/favorites/delete/{{$post['id']}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="post_id" value="{{$post['id']}}">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 rounded-xl text-xs py-2 px-3">
                        Remove from favorites
                    </button>
                  </form>                        
                </div>
                <div class="flex justify-between">
                    <div class="mr-2">
                        <a href="/?category={{ $post['category']['name'] }}"
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $post['category']['name'] }}</a>
                    </div>
                <div class="mt-4 flex-1">
                    <h1 class="text-3xl">
                        {{ $post['title'] }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post['created_at']}}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ $post['excerpt'] }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    @if (!$post['user']['picture'])
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    @else
                        <img src="{{ asset('storage/' . $post['user']['picture']) }}" alt="Your profile picture"
                            class="rounded-2xl w-14 h-14 object-cover">
                    @endif
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?user={{ $post['user']['username'] }}">{{ $post['user']['name'] }}
                            </a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post['title'] }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
    @endforeach
    </div>
</x-layout>