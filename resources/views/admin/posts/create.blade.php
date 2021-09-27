<x-layout> 
    <x-setting heading="Publish New Post">
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
    </x-setting>    
</x-layout>