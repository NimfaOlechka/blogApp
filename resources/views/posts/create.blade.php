<x-layout> 
    <x-panel class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">    
        
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">              

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>
                    </div>
                </div>
        </article>
            
        <section>
            <form method="POST" action="/admin/posts" >
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                           for="title"
                    >
                        Title
                    </label>
    
                    <input class="border border-gray-400 p-2 w-full rounded-xl"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title')}}"
                            required
                    >
    
                    @error('title')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                        for="title"
                    >
                        Excerpt
                    </label>
    
                    <textarea class="border border-gray-400 p-2 w-full rounded-xl"
                           name="excerpt"  
                           required
                    >{{ old('excerpt')}}</textarea>
    
                    @error('excerpt')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                           for="slug"
                    >
                        Slug
                    </label>
    
                    <textarea class="border border-gray-400 rounded-xl p-2 w-full"
                           type="text"
                           name="slug"    
                           required
                    >{{ old('slug')}}</textarea>
    
                    @error('slug')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                           for="body"
                    >
                        article
                    </label>
    
                    <textarea class="w-full border border-gray-400 rounded-xl text-sm p-2" 
                           cols="30" rows="5"
                           name="body"
                           id="body"
                           required
                    >{{ old('body')}}</textarea>
    
                    @error('body')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                           for="body"
                    >
                        Category
                    </label>
    
                    <select class="" name="category_id" id="category">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp   

                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                        @endforeach                       

                    </select>
    
                    @error('category')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button> Publish </x-submit-button>
            </form>

        </section>
           
        
    
    </x-panel>
  </x-layout>