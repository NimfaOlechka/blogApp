@props(['trigger'])
   <div x-data="{show: false}" @click.away="show=false">
       {{-- Trigger --}}
       <div @click="show = !show">
            {{$trigger}}
       </div>
   
        {{-- Links --}}
        <div x-show.transition="show" class="py-3 absolute bg-gray-100 w-full mt-2 rounded-xl font-semibold z-50 overflow-auto max-h-52" style="display: none">
            {{$slot}}  
        </div>
</div>