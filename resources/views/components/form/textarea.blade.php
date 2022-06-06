@props(['name', 'rows' => '3'])
<div class="mb-6">
   <x-form.label name="{{$name}}"/>

   <textarea name="{{$name}}" rows="{{$rows}}" 
   class="w-full border border-gray-500 rounded-xl outline focus:outline-0 p-2" 
   style="resize: none">{{$slot ?? old('name')}}</textarea>

   <x-form.error name="{{$name}}"/>
</div>