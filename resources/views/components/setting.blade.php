{{-- @props(['heading'])

<x-panel class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">    
    <section class="mx-auto lg:grid lg:grid-cols-12 gap-x-10">  
        <div class="col-span-8">
             <x-back-button />
        </div>
    </section>

    <section>        
        <h1 class="text-blue-500 text-lg font-bold mb-4"> 
            {{$heading}}
        </h1>

        {{$slot}}

    </section>

</x-panel> --}}

@props(['heading'])

<section class="py-8 max-w-4xl mx-auto"> 
    <h1 class="text-blue-500 text-lg font-bold mb-8 pb-2 border-b"> 
        {{$heading}}
    </h1>

    <div class="flex">
        <aside class="w-36 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500': ''}}">All posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500': ''}}">New Post</a>
                </li>
            </ul>
        </aside>
    
        <main class="flex-1">        
    
            <x-panel class="max-w-6xl mx-auto mt-2 lg:mt-2 space-y-6"> 
    
               
    
                {{$slot}}        
            </x-panel>
        </main>
    </div> 
    
        
</section>