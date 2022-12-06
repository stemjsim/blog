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
                <textarea name="body" class="w-full text-small focus:outline-none focus:ring" rows="2"
                    placeholder="Add a comment" required></textarea>

                <x-form.error name="body" />

                <div class="flex justify-end mt-1">
                    <x-form.button>Share</x-form.button>
                </div>
            </div>



        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-semibold text-green-500 hover:underline">Register</a>
        Or
        <a href="/login" class="text-semibold text-green-500 hover:underline">Log in</a>
        to leave a comment.
    </p>
@endauth
