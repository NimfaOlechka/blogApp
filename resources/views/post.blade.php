{{-- @extends('components.layout')
@section('content')
    <article>
        <h1>            
            <?= $post->title; ?>            
        </h1>

        <div>
            {!! $post->body!!}
        </div>

        <a href="/">Go Back to all posts</a>   
    </article> 
@endsection --}}

<x-layout>
    <x-slot name="content">
        <article>
            <h1>            
                {{ $post->title; }}           
            </h1>
            <p>
                <a href="#">{{$post->category->name}}</a>
              </p>
    
            <div>
                {!! $post->body!!}
            </div>
    
            <a href="/">Go Back to all posts</a>   
        </article> 
    </x-slot>
  </x-layout>

