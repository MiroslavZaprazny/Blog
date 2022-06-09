@if (session()->has('success'))
    <div class="fixed bg-blue-500 text-white bottom-2 left-2 p-3 rounded-xl"
        x-data="{show :true}"
        x-init = "setTimeout(()=> show = false, 4000)"  
        x-show = "show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        >
        <p>{{session('success')}}</p>
    </div>
@endif