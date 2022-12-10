<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/crane.png" alt="Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">

        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                </x-slot>
                @user
                    <x-dropdown-item href="/user/dashboard" :active="request()->is('user/dashboard')">
                        Dashboard
                    </x-dropdown-item>
                @enduser

                @admin
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                @endadmin

                <x-dropdown-item href="#" x-data="{}"
                    @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                <form id="logout-form" method="POST" action="/logout" class="hidden">
                    @csrf
                </form>
            </x-dropdown>
        @else
            <a href="/register" class="mx-2 text-xs font-bold uppercase">Register</a>
            <a href="/login" class="mx-2 text-xs font-bold uppercase">Log In</a>

        @endauth

        <a href="#newsletter"
            class="bg-green-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>
