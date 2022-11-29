@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-xl font-semibold mb-8 border-b">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-5">Links</h4>
            <ul>
                <li><a href="/admin/dashboard"
                        class="{{ request()->is('admin/dashboard') ? 'text-green-700 font-bold' : '' }}">Dashboard</a>
                </li>
                <li><a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-green-700 font-bold' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>




        <main class="flex-1">
            <x-panel class="max-w-md mx-auto">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
