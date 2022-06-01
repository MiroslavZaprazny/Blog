<div x-data="{show : false}" @click.away = "show = false">
    <button @click = "show = !show"
     class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex">   
     {{isset($currentCategory) ? $currentCategory->name : 'Categories'}}
 
     <x-down-arrow class=" absolute pointer-events-none" 
     style="right: 12px;" width="22"/>
    </button>
    <div x-show="show" class="py-1 absolute bg-gray-100 mt-1 rounded-xl w-full z-50 max-h-52 overflow-auto" style="display:none;">
        @foreach ($categories as $category )
        <a href="/?category={{$category->name}}& {{http_build_query(request()->except('category','page'))}}" 
            class="block text-left px-3 text-sm leading-6 
            hover:bg-blue-500 hover:text-white
            {{isset($currentCategory) && $currentCategory->id == $category->id ? "bg-blue-500 text-white" : ''}}
            ">
            {{$category->name}}</a>                  
        @endforeach
    </div>
</div>