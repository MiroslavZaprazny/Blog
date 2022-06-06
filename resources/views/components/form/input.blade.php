@props(['name','type' => 'text',])
<div class="mb-6">
    <x-form.label name="{{$name}}"/>
    <input type="{{$type}}" name="{{$name}}" 
    class="border border-gray-500 rounded-xl w-full p-2"
    {{$attributes(['value' =>old($name)])}}
    >

    <x-form.error name="{{$name}}"/>
</div>