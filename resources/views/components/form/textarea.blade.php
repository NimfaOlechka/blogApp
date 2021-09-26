@props(['name', 'cols' => '30', 'rows'=>'2'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea 
           class="border border-gray-200 rounded p-2 w-full"
           cols="{{ $cols }}"
           rows="{{ $rows }}"           
           name="{{ $name }}"   
           id="{{ $name }}" 
           required
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>