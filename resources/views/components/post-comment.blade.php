@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex  space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{$comment->id}}" alt="" class="rounded-xl">
        </div>
        <div class="">
            <header class="mb-4">
                <h3 class="font-bold">
                    {{$comment->author->username}}
                </h3>
                <p class="text-xs">
                    Posted
                    <time>{{$comment->created_at->diffforHumans()}}</time>
                </p>
            </header>
            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>
</x-panel>
