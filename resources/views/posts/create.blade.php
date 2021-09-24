<x-layout> 
    <x-panel class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">    
        
        <section class="mx-auto lg:grid lg:grid-cols-12 gap-x-10">              

                <div class="col-span-8">
                    <div class="lg:flex justify-between mb-6">
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
        </section>
            
        <section>

            
            <h1 class="text-blue-500 text-lg font-bold mb-4"> 
                Publish new post
            </h1>
            <form method="POST" action="/admin/posts"  enctype="multipart/form-data">
                @csrf
                {{--Title--}}
                <x-form.input name='title'/>
                {{--Slug--}}
                <x-form.textarea name='slug'/>
                {{--Excerpt--}}
                <x-form.textarea name='excerpt'/>
                {{--body--}}
                <x-form.textarea name='body' cols='30' rows='5'/>                
                {{--Category select --}}
                <x-form.field>
                    <x-form.label name='category'/>                    
    
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
                    <x-form.error name='category'/>
                </x-form.field>

                {{--Thumbnail--}}
                <x-form.input name='thumbnail' type='file' />

                <x-form.button> Publish </x-form.button>
            </form>

        </section>
           
        
    
    </x-panel>
  </x-layout>