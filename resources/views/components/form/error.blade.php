@props(['name'])

@error($name)
        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
@enderror