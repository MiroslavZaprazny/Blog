<x-layout>
    <section class="px-6 py-7 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-4 border-b mb-8">Publish new category</h1>
        <div class="flex">
            <x-links/>
            <div class="flex-1">
                <form action="/admin/categories" method="post" class="flex-1">
                    @csrf
                    <x-form.input name="name"/>
                    <x-form.button>Submit</x-button>
                </form>
            </div>
        </div>
    </section>
</x-layout>