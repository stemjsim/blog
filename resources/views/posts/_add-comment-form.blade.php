@auth
    <x-panel>
        <form method="post" action="/posts/{{ $post->slug }}/comments" class="">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">Add your thoughts</h2>
            </header>


            <div class="mt-6">
                <textarea name="body" class="w-full text-small focus:outline-none focus:ring" rows="5"
                    placeholder="Add a comment" required></textarea>

                <x-form.error name="body" />
            </div>


            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Share</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a>
        <a href="/login" class="hover:underline">Log in</a>
        to leave a comment.
    </p>
@endauth
