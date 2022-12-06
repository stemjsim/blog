@props(['name'])

{{-- @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror --}}
@error($name)
    @if ($errors->any())
        {!! implode('', $errors->all('<p class="text-red-500 text-xs mt-2">:message</p>')) !!}
    @endif
@enderror
