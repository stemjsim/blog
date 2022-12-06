<x-layout>

    <form method="POST" action='{{ url('/uploads') }}' enctype="multipart/form-data" style="margin-top: 3rem;">
        @csrf
        <input type="file" name="upload">
        <input type="submit" name="Save Upload">
    </form>

    @if (!empty($id))
        <br>
        <a href="{{ url('/uploads', [$id, $originalName]) }}">{{ $id }} {{ $originalName }}</a>
        <br>
        @if (substr($mimeType, 0, 5) == 'image')
            <img height="25%" width="25%" src="{{ url('/uploads', [$id, $originalName]) }}" alt="">
        @endif
    @endif

    <a href=" {{ url('/uploads') }}">uploads</a>

    @isset($id)
        {{ $id }}
        <br>
        {{ $path }}
        <br>
        {{ $originalName }}
        <br>
        {{ $mimeType }}
    @endisset

</x-layout>
