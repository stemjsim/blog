@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-xl font-semibold mb-8 border-b">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-5">Links</h4>
            <ul>
                <li><a href="/admin/posts"
                        class="{{ request()->is('admin/posts') ? 'text-green-700 font-bold' : '' }}">All Posts</a>
                </li>
                <li><a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-green-700 font-bold' : '' }}">New Post</a>
                </li>

                <li><a href="/admin/users"
                        class="{{ request()->is('admin/users') ? 'text-green-700 font-bold' : '' }}">Users</a>
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
