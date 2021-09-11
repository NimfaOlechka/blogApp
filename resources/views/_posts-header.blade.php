<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        My <span class="text-blue-500">amazing place</span> blogs-paradise
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>
                <x-slot name="trigger">
                    <button  class="py-2 pl-3 pr-9d text-sm text-left font-semibold w-full lg:w-32 inline-flex">
                        {{ isset($currentCategory)? ucwords($currentCategory->name) : 'Categories' }}
                        <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
                    </button>
                </x-slot>

                <x-dropdown-item href="/" :active="request()->is('home')">All</x-dropdown-item>
                {{-- <x-dropdown-item href="/" :active="request()->is('home')">All</x-dropdown-item> --}}
                {{-- :active = 'request()->is("/categories/{{$category->slug}}")'  - another way of the check--}}
                @foreach ($categories as $category)               
                    <x-dropdown-item 
                        href="/categories/{{$category->slug}}"
                        :active="isset($currentCategory) && $currentCategory->is($category)"                        
                        >{{ucwords($category->name)}}
                    </x-dropdown-item>                    
                @endforeach      

            </x-dropdown>            
        </div>
    

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search')}}">
            </form>
        </div>
    </div>
  </header>