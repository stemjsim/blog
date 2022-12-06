@props(['category'])

<a href="/?category={{ $category->slug }}"
    class="px-3 py-1 border border-blue-400 rounded-full text-blue-400 text-xs uppercase font-semibold"
    style="font-size: 16px">{{ $category->name }}</a>
