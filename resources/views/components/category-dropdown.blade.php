
<x-dropdown>
    <x-slot name="trigger">
        <button  class="py-2 pl-3 pr-9d text-sm text-left font-semibold w-full lg:w-32 inline-flex">
            {{ isset($currentCategory)? ucwords($currentCategory->name) : 'Categories' }}                        
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item 
        href="/?{{ http_build_query(request()->except('category','author','page')) }}" 
        :active="request()->is('home')"> All
    </x-dropdown-item>
    {{-- <x-dropdown-item href="/" :active="request()->is('home')">All</x-dropdown-item> --}}
    {{-- :active = 'request()->is("/categories/{{$category->slug}}")'  - another way of the check--}}
    @foreach ($categories as $category)               
        <x-dropdown-item 
            href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category','author','page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)"                        
            >{{ucwords($category->name)}}
        </x-dropdown-item>                    
    @endforeach      

</x-dropdown>       