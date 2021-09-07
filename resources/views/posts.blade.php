{{-- @extends('layout')

@section('banner')
<h1 id="test">Hi my wonderful girl!</h1>
@endsection

@section('content')
  @foreach ($posts as $post)
    <article class="{{$loop->even ? 'foobar':''}}">
      <h1>
          <a href="/posts/{{$post->slug;}}">
            {{$post->title}} 
          </a>
      </h1>
      <div>
        {{$post->excerpt}}
      </div>
    </article>
  @endforeach
@endsection --}}

<x-layout>
  <x-slot name="content">
      @foreach ($posts as $post)
        <article>
          <h1>
              <a href="/posts/{{$post->slug;}}">
                {{$post->title}} 
              </a>
          </h1>
          <div>
            {{$post->excerpt}}
          </div>
        </article>
      @endforeach
  </x-slot>
</x-layout>