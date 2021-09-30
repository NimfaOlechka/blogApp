<x-layout> 
    <x-setting :heading="'Edit post: '. $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{--Title--}}
            <x-form.input name='title' :value="old('title', $post->title)" />
            {{--Slug--}}
            <x-form.textarea name='slug'>{{ old('slug', $post->slug) }}</x-form.textarea>
            {{--Excerpt--}}
            <x-form.textarea name='excerpt'>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            {{--body--}}
            <x-form.textarea name='body' cols='30' rows='5'>{{ old('body', $post->body) }}</x-form.textarea>                
            {{--Category select --}}
            <x-form.field>
                <x-form.label name='category'/>                    

                    <select class="" name="category_id" id="category">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp   

                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                        @endforeach                       

                    </select>    
                <x-form.error name='category'/>
            </x-form.field>
            <x-form.field>
                <x-form.label name='author'/>                    

                    <select class="" name="user_id" id="user">
                        @php
                            $users = \App\Models\User::all();
                        @endphp   

                        @foreach ($users as $user)
                            <option value="{{$user->id}}"
                                {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}
                                >{{ ucwords($user->username) }}</option>
                        @endforeach                       

                    </select>    
                <x-form.error name='user'/>
            </x-form.field>
            {{--Thumbnail--}}
            <div class="flex mt-6 mb-6">
                <div class="flex-2 mr-4">
                    <img src="{{ asset('storage/'.$post->thumbnail)}}" alt="" class="rounded-xl" width="150">
                </div>
                    <x-form.input name='thumbnail' type='file' :value="old('thumbnail', $post->thumbnail)"/>
                    
            </div>

            <x-form.button> Save changes </x-form.button>
        </form>
    </x-setting>    
</x-layout>