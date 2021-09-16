@auth
<x-panel>
    <form method="POST" action="/posts/{{$post->slug}}/comments" >
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="50" class="rounded-full">
            <h1 class="ml-4">Do you have comments?</h1>
        </header>

        <div class="m-2 border border-gray-200 rounded-xl ">                                

            <textarea class="w-full border-gray-100 rounded-xl text-sm p-2" 
                   cols="30" rows="5"                                           
                   name="body"                                          
                   placeholder="Leave your comment her..."                                           
                   required
            ></textarea>
            @error('body')
                <p class="text-red-500 text-s mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <x-submit-button>
                Post
            </x-submit-button>
        </div>    
    </form>
</x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class=" text-blue-300 hover:underline">Register</a>
        or <a href="/login" class="text-blue-300 hover:underline">Log in</a>
        to leave a comment.
    </p>
@endauth