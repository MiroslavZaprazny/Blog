<x-layout>
    <section class="px-6 py-7 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-4 border-b mb-8">Publish new post</h1>
        <div class="flex">
            <x-links/>

            <main class="flex-1">
                <form action="/admin/posts" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="title"/>
                    <x-form.textarea name="excerpt"/>
                    <x-form.textarea name='body' rows='5'/>
                    <x-form.input name='thumbnail' type='file'/>

                    <div class="mb-6">
                        <label class="block font-bold text-xs uppercase mb-1">
                            Category
                        </label>

                        <select name="category_id" class="overflow-auto border border-gray-500 w-full rounded-xl p-1">
                            @foreach ( $categories as $category )
                            <option value="{{$category->id}}"
                                {{old('category_id') == $category->id ? 'selected' : ''}}
                                >
                                {{$category->name}}
                            </option>                     
                            @endforeach
                        </select>
                    </div>

                    <x-form.button>Submit</x-form.button>
                    
                </form>
            </main>
        </div>
    </section>
</x-layout> 