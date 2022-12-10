@props(['heading'])

<section class="py-8 max-w-6xl mx-auto">
    <h1 class="text-xl font-semibold mb-8 border-b">{{ $heading }}</h1>

    <div class="flex">
        @admin
            <aside class="w-28 flex-shrink-0">
                <h4 class="font-semibold mb-5">Links</h4>
                <ul>
                    <li><a href="/admin/posts"
                            class="{{ request()->is('admin/posts') ? 'text-green-700 font-bold' : '' }}">All Posts</a>
                    </li>
                    <li><a href="/admin/posts/create"
                            class="{{ request()->is('admin/posts/create') ? 'text-green-700 font-bold' : '' }}">New Post</a>
                    </li>

                    <li><a href="/admin/users"
                            class="{{ request()->is('admin/users') ? 'text-green-700 font-bold' : '' }}">All Users</a>
                    </li>

                    <li><a href="/admin/users/create"
                            class="{{ request()->is('admin/users/create') ? 'text-green-700 font-bold' : '' }}">New User</a>
                    </li>
                </ul>
            </aside>
        @endadmin

        @user
            <aside class="w-28 flex-shrink-0">
                <h4 class="font-semibold mb-5">Links</h4>
                <ul>
                    <li><a href="/user/dashboard"
                            class="{{ request()->is('user/dashboard') ? 'text-green-700 font-bold' : '' }}">My Posts</a>
                    </li>

                    <li><a href="/user/posts/create"
                            class="{{ request()->is('user/posts/create') ? 'text-green-700 font-bold' : '' }}">New Post</a>
                    </li>

                    {{-- <li><a href="/user/edit" class="{{ request()->is('user/edit') ? 'text-green-700 font-bold' : '' }}">My
                            Profile</a>
                    </li> --}}
                </ul>
            </aside>
        @enduser


        {{-- Area for tables next to the menu  --}}
        <main class="flex-1">
            <x-panel class="mx-auto bg-green-100">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
