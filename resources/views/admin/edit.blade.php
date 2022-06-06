<x-layout>
    <section class="px-6 py-7 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-4 border-b mb-8">Edit post</h1>
        <div class="flex">
            <x-links/>

            <main class="flex-1">
                <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <x-form.input name="title" value="{{$post->title}}"/>
                    <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
                    <x-form.textarea name='body' rows='5'>{{old('body',$post->body)}}</x-form.textarea>

                    <div class="flex">
                        <div class="flex-1">
                            <x-form.input name='thumbnail' type='file'>{{$post->thumbnail}}</x-form.input>
                        </div>
                        <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="rounded-xl ml-6" width="100">
                    </div>
      

                    <div class="mb-6">
                        <label class="block font-bold text-xs uppercase mb-1">
                            Category
                        </label>

                        <select name="category_id" class="overflow-auto border border-gray-500 w-full rounded-xl p-1">
                            @foreach ( $categories as $category )
                            <option value="{{$category->id}}"
                                {{old('category_id', $post->category->id) == $category->id ? 'selected' : ''}}
                                >
                                {{$category->name}}
                            </option>                     
                            @endforeach
                        </select>
                    </div>

                    <x-form.button>Edit</x-form.button>
                    
                </form>
            </main>
        </div>
    </section>
</x-layout> 